<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\HeaderTransaction;
use App\User;
use DB;


class UserController extends Controller
{
    
    public function doRegistration(Request $request){
        //validasi input
        $this->validate($request, [
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users',
            'password' => 'min:5|alpha_num',
            'confirm' => 'required_with:password|same:password',
            'picture' => 'required',
            'gender' => 'required',
            'dob' => 'required|date|before:-10 years|date_format:Y-m-d',
            'address' => 'required|min:10'
        ]);
        //menyimpan dalam database
      User::create([
          'name' => $request->name,
          'email' => $request->email,
          'password' => bcrypt($request->password),
          'picture' => '/storage/profile/'. $request->picture,
          'gender' => $request->gender,
          'dob' => $request->dob,
          'address'=> $request->address,    
      ]);

    return redirect('/');
    }

    public function doLogin(Request $request){
        //cek autentikasi benar
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $email = $request->email;
        $password = $request->password;
        $check = $request->check;
        $credentials = ['email' => $email,'password' => $password];

        if(Auth::attempt($credentials)){
            //cek input login
            Session::put('userId',Auth::user()->id);
            Session::put('userRole',Auth::user()->role);

            //jika remember me diklik maka akan menyimpan cookie email dan password
            if(!empty($_POST['check'])){
                Cookie::queue('userEmail', Auth::user()->email, 60);
                Cookie::queue('userPassword', Auth::user()->password, 60);
            }
            return redirect('/dashboard');
        }else{
            return redirect()->back()->withErrors('Wrong email or password');
        }
    }

    public function dashboard(){
        //cek apakah user rolenya member/admin
        if(Auth::check()) {
            if (Session::get('userRole') == 'admin') {
                return view('admin.dashboard');
            } else if (Session::get('userRole') == 'member'){
                return view('member.dashboard');
            }
        }
        return back();
    }

    public function doLogout(){
        //melakukan logout dan menghapus semua session dan cookie yang ada
        Auth::logout();
        Session::flush();
        setcookie("userEmail","", time() - 3600);
        setcookie("userPassword","", time() - 3600);
        setcookie("userName","", time() - 3600);

        return redirect('/');
    }

    public function doUpdate(Request $request){

        $this->validate($request, [
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users',
            'picture' => 'required',
            'gender' => 'required',
            'dob' => 'required|date|before:-10 years|date_format:Y-m-d',
            'address' => 'required|min:10'
        ]);

        User::find(Session::get('userId'))->update([
            'name' => $request->name,
            'email' => $request->email,
            'picture' => '/storage/profile/' . $request->picture,
            'gender' => $request->gender,
            'dob' => $request->dob,
            'address' => $request->address,
        ]);

        return redirect('/dashboard');
    }

    public function insertmember(Request $request){
          $this->validate($request, [
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users',
            'password' => 'min:5|alpha_num',
            'confirm' => 'required_with:password|same:password',
            'picture' => 'required',
            'gender' => 'required',
            'dob' => 'required|date|before:-10 years|date_format:Y-m-d',
            'address' => 'required|min:10'
          ]);

          User::create([
              'name' => $request->name,
              'email' => $request->email,
              'password' => bcrypt($request->password),
              'picture' => '/storage/profile/'. $request->picture,
              'gender' => $request->gender,
              'dob' => $request->dob,
              'address'=> $request->address,    
          ]);

        return view('admin.insertMember')->withErrors('Success Input Member');
      }

    public function manageMember(Request $request){     
        //jika yang dipilih updateButton      
        if(isset($_POST['updateButton'])){
            //menyimpan id updateButton ke variabel x
            $x = $_POST['updateButton'];
            // redirect('/addToCart')->with(['getId' => $getId]);
            //menyimpan pada cookie variabel x dengan nama targetId
            Cookie::queue('targetId', $x, 60);
            return redirect()->route('updateMember', ['targetId' => $x]);
            // return view('admin.updateMember',['targetId' => $_POST['updateButton']]);
        //jika yang dipilih deleteButton
        }else if(isset($_POST['deleteButton'])){
            //mendelete pada tabel User di id deleteButton
            User::find($_POST['deleteButton'])->delete();
            //redirect ke route manageMember
            return redirect('/manageMember');
        }
    }

    public function updateMember(Request $request){
        
        $targetId = Cookie::get('targetId');
        //validasi
        $this->validate($request, [
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users',
            'picture' => 'required',
            'gender' => 'required',
            'dob' => 'required|date|before:-10 years|date_format:Y-m-d',
            'address' => 'required|min:10'
        ]);
        //update sesuai dengan id yang sedang login
        DB::table('users')->where('id',$targetId)->update([
            'name' => $request->name,
            'email' => $request->email,
            'picture' => '/storage/profile/' . $request->picture,
            'gender' => $request->gender,
            'dob' => $request->dob,
            'address' => $request->address,
        ]);

        return redirect('/manageMember');
    }

    public function getCurrUserId(){
        //mengambil userId yang ada di session dengan nama UserId
        $currUserId = Session::get('userId');
        //redirect ke route transactionHistory dengan passing currUserId dengan nama id
        return redirect()->route('transactionHistory', ['id' => $currUserId]);
    }

    public function viewTransactionList(Request $request){
            //mengambil id transaction
            $targetId = $_POST['detailButton'];
            //mencari id headertransaction
            $headerId = HeaderTransaction::where('id', $targetId)->first()->user_id;

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
            //mengembalikan ke view transactionDetail pada folder member dengan passing data detail_transaction, totalQuantity, dan totalPrice
            return view('member.transactionDetail', ['user_id' => $headerId, 'detail_transactions'=>$detail_transactions, 'totalQuantity'=>$totalQuantity , 'totalPrice'=>$totalPrice]); 
    }

}
