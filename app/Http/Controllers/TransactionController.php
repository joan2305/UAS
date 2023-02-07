<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function checkOut($id){
        if(Auth::user()->id != $id){
            abort(404);
        }else{
            $transaction = new Transaction();
            $transaction->id;
            $transaction->user_id = $id;
            $transaction->save();

            $carts = Cart::where('user_id', Auth::user()->id)->get();
            foreach($carts as $cart){
                $price = $cart->product->price * $cart->quantity;
                TransactionDetail::create([
                    'transaction_id' => $transaction->id,
                    'product_id' => $cart->product->id,
                ]);

                $product= Product::findorfail($cart->product->id);
                $product->isSold=1;
                $product->save();
                $cart->delete();
            }
            return view('checkout');
        }
    }
}