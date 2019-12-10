<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Phone;
use App\Cart;
use App\User;
use Session;
use Cookie;
use Auth;
use DB;
 
class AddToCartController extends Controller
{

	public function index(){
	    $getId = Cookie::get('getId');

	    if(!empty($getId)){
	        $buyPhoneName = Phone::where('id', $getId)->first()->name;
	        $comments = Comment::where('phone_id', $getId)->get();
	        //join table phone dan brand
            $buyPhone = DB::table('phones')
            ->select('phones.id','phones.image','phones.desc','brands.name','phones.price','phones.stock')
            ->join('brands', 'brands.id', '=', 'phones.brand_id')
            ->where('phones.id', '=', $getId)
            ->get()->first();
	        
	        return view('member.addToCart', ['buyPhone'=> $buyPhone, 'buyPhoneName' => $buyPhoneName, 'comments' => $comments]);
	    }

	    return redirect()->back();
	}


    public function insert(Request $request){
    	
    	if(isset( $_POST['btnComment'] )){
	    	if(isset($request->comment)){
	    		$phone = Phone::where('id',(int)$_POST['btnComment'])->first();

	    		$comment = new Comment();
	    		$comment->comment = $request->comment;
	    		$comment->created_at = date('Y-m-d H:i:s');
	    		$comment->user_id = Auth::user()->id; 
	    		$comment->phone_id = (int)$_POST['btnComment'];
	    		//asosiasi tabel komen dan phone
	    		$comment->phone()->associate($phone);
	    		$comment->save();

				return redirect('/addToCart');
		    }
		    return redirect('/addToCart')->withErrors('Comment is empty');
    	}else if(isset($_POST['btnAdd'])){
    		$id = (int)$_POST['btnAdd'];
    		$phone = Phone::find($id);
    		$qty = $request->qty;

    		//validasi
    		if($qty > $phone->stock){
			    return redirect('/addToCart')->withErrors('Not enough stock');
    		}
    		//memasukan data ke cart
    		$myCart = Session::has('cart') ? Session::get('cart') : null;
    		$cart = new Cart($myCart);
    		$cart->add($phone, $id, $qty);

    		// dd($cart);
    		$request->session()->put('cart', $cart);
    		return redirect('/cart');
    	}
	}
}
