<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\HeaderTransaction;
use App\Phone;
use App\Brand;
use File;

class AdminController extends Controller
{
    public function insertphone(Request $request){
        //validasi dulu input pada form
        $validation = Validator::make($request->all(), [
            'name' => 'required | min:3 | unique:phones',
            'brand_id' => 'required',
            'image' => 'required|image',
            'desc' => 'required',
            'price' => 'required | numeric | min: 1000',
            'discount' => 'required',
            'stock' => 'required'
        ]);

        //jika validasi salah kembali dengan error dan input sebelumnya
        if($validation->fails()){
            return redirect()->back()->withErrors($validation)->withInput(Input::all());
        }

        //jika validasi berhasil, pindahkan image ke storage
        $image = $request -> file('image');
        $imageName = $image->getClientOriginalName();
        $formatName = time().'_'.$imageName;
        $image->move('storage/img/', $formatName);

        //jika phone baru akan masuk table phones
        DB::table('phones')->insert([
            'name' => $request->name,
            'brand_id' => $request->brand_id,
            'image' => '/storage/img/'.$formatName,
            'desc' => $request->desc,
            'price' => $request->price,
            'discount' => $request->discount,
            'stock' => $request->stock
        ]);

        //return homepage
        return redirect('/dashboard');
    }

    public function managePhone(Request $request){
        //jika yang dipencet searchButton
        if(isset($_POST['searchButton'])){
            if($_POST['selection'] == 'name'){
                $phones = Phone::where('name','LIKE','%'.$request->search.'%')->simplePaginate(8);
            }else if($_POST['selection'] == 'brand'){
                 if(is_null($request->search)){
                    $phones = Phone::where('brand_id','LIKE','%'.$request->search.'%')->simplePaginate(8);
                }else{
                    $brand_phone = DB::table('brands')
                    ->select('brands.id')
                    ->join('phones','phones.id','=','brands.id')
                    ->where('brands.name', 'LIKE', '%' .$request->search. '%')
                    ->get()->first();
                    if(!is_null($brand_phone))
                        $phones = Phone::where('brand_id', $brand_phone->id)->simplePaginate(8);
                    else
                        $phones = null;
                }
            }
            return view('admin.managePhone', ['phones' => $phones, 'search' => $request->search, 'selection' => $request->selection]);
        }
        
        //jika yg dipencet btnUp return named route
        if(isset($_POST['btnUp'])){
            return redirect()->route('updatePhone', ['id' => $_POST['btnUp']]);
        }
        
        //jika yg dipencet btnDel
        if(isset($_POST['btnDel'])){
            //mencari data pada tabel Phone dimana value btnDel ditemukan
            $targetPhone = $_POST['btnDel'];
            $findPhone = Phone::find($targetPhone);
            //menghapus file image dan data
            File::delete(public_path().$findPhone->image);
            $findPhone->delete();
            //return ke route managePhone
            return redirect('/managePhone');
        }
    } 
    
    public function updatephone(Request $request){
        //mencari target phone
        $findPhone = Phone::find($_POST['targetid']);

        //validasi jika input nama sama tidak perlu cek unique
        if($findPhone->name == $request->name){
            $validation = Validator::make($request->all(), [
                'name' => 'required|min:3|',
                'brand_id' => 'required',
                'image' => 'required|image',
                'desc' => 'required',
                'price' => 'required | numeric | min: 1000',
                'discount' => 'required',
                'stock' => 'required'
            ]);
        }else{
            $validation = Validator::make($request->all(), [
                'name' => 'required|min:3|unique:phones',
                'brand_id' => 'required',
                'image' => 'required|image',
                'desc' => 'required',
                'price' => 'required | numeric | min: 1000',
                'discount' => 'required',
                'stock' => 'required'
            ]); 
        }
        
        //mengeluarkan error ketika data yang dimasukkan tidak valid.
        if($validation->fails()){
            return redirect()->back()->withErrors($validation)->withInput(Input::all());
        }

        //edit nama image yang diupload
        $image = $request -> file('image');
        $imageName = $image->getClientOriginalName();
        $formatName = time().'_'.$imageName;
        $image->move('storage/img/', $formatName);

        //menghapus image sebelumnya
        File::delete(public_path().$findPhone->image);

        //meng-update data findphone
        $findPhone->name = $request->name;
        $findPhone->brand_id = $request->brand_id;
        $findPhone->image = '/storage/img/'.$formatName;
        $findPhone->desc = $request->desc;
        $findPhone->price = $request->price;
        $findPhone->discount = $request->discount;
        $findPhone->stock = $request->stock;
        $findPhone->save();
        //return ke route managePhone
        return redirect('/managePhone');
    }

    public function insertbrand(Request $request){
        //validasi data input.
        $validation = Validator::make($request->all(), [
            'name' => 'required|unique:brands'
        ]);
        //mengeluarkan error ketika data yang dimasukkan tidak valid.
        if($validation->fails()){
            return redirect()->back()->withErrors($validation)->withInput(Input::all());
        }
        //meng-insert data ke tabel brands
        DB::table('brands')->insert([
            'name' => $request->name
        ]);
        //return ke view pada folder admin dengan nama dashboard.
        return view('admin.dashboard');
    }

    public function manageBrand(Request $request){
              
        if(isset($_POST['updateButton'])){
            //menyimpan id pada updateButton ke dalam variabel.
            $x = $_POST['updateButton'];
            // redirect('/addToCart')->with(['getId' => $getId]);
            //menqueue cookie untuk menyimpan id dari detail button pada cookie.
            Cookie::queue('targetId', $x, 60);
            //mereturn ke route updateBrand dengan passing targetId.
            return redirect()->route('updateBrand', ['targetId' => $x]);
            // return view('admin.updateMember',['targetId' => $_POST['updateButton']]);
        }else if(isset($_POST['deleteButton'])){
            //melakukan delete pada id delete button ketika button delete di tekan.
            Brand::find($_POST['deleteButton'])->delete();
            //return ke route manageBrand.
            return redirect('/manageBrand');
        }
    }

    public function updatebrand(Request $request){
        //mengambil cookie yang sudah di queue sebelumnya.
        $targetId = Cookie::get('targetId');
        //validasi data
        $this->validate($request, [
            'name' => 'required|unique:brands',
        ]);
        
        //meng-update pada tabel brands di id yang sudah disimpan sebelumnya.
        DB::table('brands')->where('id',$targetId)->update([
            'name' => $request->name
        ]);

        //return ke route manageBrand.
        return redirect('/manageBrand');
    }

    public function transactionList(Request $request){
        if(isset($_POST['detailButton'])){
            //menyimpan id pada updateButton ke dalam variabel.
            $x = $_POST['detailButton'];
            // redirect('/addToCart')->with(['getId' => $getId]);
            //menqueue cookie untuk menyimpan id dari detail button pada cookie.
            Cookie::queue('targetId', $x, 60);
            // return redirect('/transactionDetail')->with(['targetId' => $x]);
            //mereturn ke route viewTransactionList dengan passing targetId.
            return redirect('/viewTransactionList')->with(['targetId' => $x]);
            // return view('admin.updateMember',['targetId' => $_POST['updateButton']]);
        }else if(isset($_POST['deleteButton'])){
            //melakukan delete pada id delete button ketika button delete di tekan.
            HeaderTransaction::find($_POST['deleteButton'])->delete();
            //return ke route transactionList.
            return redirect('/transactionList');
        }
    }

    public function viewTransactionList(Request $request){
            //mengambil cookie yang sudah di queue sebelumnya.
            $targetId = Cookie::get('targetId');
            //inisialisasi variabel
            $totalQuantity = 0;
            $totalPrice = 0;
            //melakukan join tabel detail_transaction dengan phone dan mengambil datanya.
            $detail_transactions = DB::table('detail_transactions')
                    ->join('phones','phones.id','=','detail_transactions.phone_id')
                    ->where('detail_transactions.header_id', $targetId)
                    ->get();
            
            foreach ($detail_transactions as $detail_transaction) {
                //menghitung totalQuantity dari tabel qty
                $subTotalPrice = 0;
                $totalQuantity += $detail_transaction->qty;
                //menyimpan price dari $detail_transaction yang merupakan hasil join tabel detail_transaction dan phone
                $subTotalPrice += $detail_transaction->price * $detail_transaction->qty;
                //grand total = price * totalquantity
                $totalPrice += $subTotalPrice;
            }
            //mengembalikan ke view transactionDetail pada folder admin dengan passing data detail_transaction, totalQuantity, dan totalPrice
            return view('admin.transactionDetail', ['detail_transactions'=>$detail_transactions, 'totalQuantity'=>$totalQuantity , 'totalPrice'=>$totalPrice]); 

    }

    public function back(){
        //me-redirect back ke halaman sebelumnya.
        return redirect()->back();
    }

}
