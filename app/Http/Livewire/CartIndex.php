<?php

namespace App\Http\Livewire;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CartIndex extends Component
{
    public $data;
    public $total = 0;
    public $ctr = 0;
    protected $listeners=[
      'cartStored'=>'handledStored'  
    ];
    public function render()
    {
        $this->data = Cart::where('user_id', Auth::user()->id)->latest()->get();
        $this->total = Cart::join('products', 'carts.product_id','=', 'products.id')->sum('price');
        $this->ctr = Cart::where('user_id', Auth::user()->id)->count();
        return view('livewire.cart-index');
    }

    public function destroy($id){
        if($id){
            $cart = Cart::findorfail($id);
            $cart->delete();
            $this->render();
        }
        
    }
}