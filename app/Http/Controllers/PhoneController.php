<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Comment;
use App\Phone;
use App\Brand;
use Cookie;

class PhoneController extends Controller
{
    //
    public function index(){
        //halaman awal
    	$phones = Phone::simplePaginate(8);
    	return view('member.phoneList', ['phones' => $phones]);
    }

    public function show(Request $request){
        //search by name / brand
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
            return view('member.phoneList', ['phones' => $phones, 'search' => $request->search, 'selection' => $request->selection]);
        }
		// if(isset($_POST['searchButton'])){
	 //    	if($_POST['selection'] == 'name'){
	 //    		$phones = Phone::where('name','LIKE','%'.$request->search.'%')->simplePaginate(8);
	    	
  //           }else if($_POST['selection'] == 'brand'){
  //               $brand_phone = DB::table('brands')
		// 		->select('brands.id')
		// 		->join('phones','phones.id','=','brands.id')
		// 		->where('brands.name', 'LIKE', '%' .$request->search. '%')
		// 		->get()->first();
  //               $phones = Phone::where('brand_id', $brand_phone->id)->simplePaginate(8);
  //           // return view('member.phoneList',['phones' => $phones])->withErrors('Brand not found'));
  //           }

  //           return view('member.phoneList',['phones' => $phones])->withInput(Input::all());
  //   	}

        //jika button buy diklik
        if(isset($_POST['btnBuy'])){
            // ambil id button
            $getId = Phone::where('id',$_POST['btnBuy'])->first()->id;

            Cookie::queue('getId', $getId);
            return redirect('/addToCart');
        }
    }
}
