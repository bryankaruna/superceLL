<?php

namespace App;

use Session;

class Cart
{
    //class untuk menampung item pada cart
    public $items = null;
    public $totalQty = 0;
    public $totalPrice = 0;

    //konstruktor
    public function __construct($myCart){
        if($myCart){
            $this->items = $myCart->items;
            $this->totalQty = $myCart->totalQty;
            $this->totalPrice = $myCart->totalPrice;
        }
    }

    //fungsi untuk menambah item
    public function add($item, $id, $qty){
        $temp = ['qty' => $qty, 'price' => $item->price, 'item' => $item];
        if($this->items){
            if(array_key_exists($id, $this->items)){
                $temp = $this->items[$id];
                $temp['qty'] += $qty;
            }
        }
        $this->items[$id] = $temp;
        $this->totalQty += $qty;
        $this->totalPrice += $temp['price'] * $qty;
    }
}
