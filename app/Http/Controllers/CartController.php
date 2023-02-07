<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function store($id, Request $request){
        $userid = Auth::user()->id;        $add = false;
        $cart = Cart::where('user_id', Auth::user()->id)->where('product_id', $id)->get()->first();
        if($cart==null){
            Cart::create([
                'product_id' => $id,
                'user_id' => Auth::user()->id,
            ]);        
            return redirect()->route('home')->with('message',__('home.cart_success'));
        }
        return redirect()->route('home')->with('message',__('home.cart_fail'));
    }
    public function index(){
        $total = Cart::join('products', 'carts.product_id','=', 'products.id')->sum('price');
        $ctr = Cart::where('user_id', Auth::user()->id)->count();
        return view('cart', compact('total'), compact('ctr'));
    }

    
}