<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HeaderTransaction;
use App\DetailTransaction;
use App\Phone;
use App\Cart;
use Session;
use Cookie;
use Auth;
use DB;

class CartController extends Controller
{
    //
    public function index(Request $request){
    	$cart = Session::get('cart');
        if(!$cart){
           return view('member.cart');
        }

        return view('member.cart',['carts' => $cart->items, 'totalPrice' => $cart->totalPrice, 'totalQty' => $cart->totalQty]);
    }

    public function checkCart(Request $request){

        $cart = Session::get('cart');
        //jika button payment diklik
        if(isset($_POST['payment'])){
            //validasi
            if(empty($request->money)){
                return redirect('/cart')->withErrors('Payment box must be filled first');
            }
            if((int)$request->money < $cart->totalPrice){
                return redirect('/cart')->withErrors('Insufficient money');
            }else{
                //jika berhasil complete payment
                if(!empty($cart)){

                    //input cart ke header transaction
                    $header = new HeaderTransaction();
                    $header->status = "success";
                    $header->date = date('Y-m-d H:i:s');
                    $header->user_id = Auth::id();
                    $header->save();

                    //input cart ke detail transaction
                    foreach ((array)$cart as $c) {
                        foreach ((array)$c as $i) {
                            $detail = new DetailTransaction();
                            $detail->header_id = $header->id;
                            $detail->phone_id = $i['item']['id'];
                            $detail->qty = $i['qty'];
                            $detail->save();

                            $phone = Phone::find($i['item']['id']);
                            $phone->stock -= $i['qty'];
                            $phone->save();
                        }
                    break;
                    }
                Session::forget('cart');
                return redirect('/dashboard');
                }
            }
        //jika delete button diklik
        }else if(isset($_POST['delete'])){

            $cart->totalQty -= $cart->items[$_POST['delete']]['qty'];
            $cart->totalPrice -= $cart->items[$_POST['delete']]['price'] * $cart->items[$_POST['delete']]['qty'];
            unset($cart->items[$_POST['delete']]);
            return redirect()->back();
        }

        return redirect('/cart')->withErrors('Success Payment');
    }
}

