<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function detail($id){
        $product = Product::where('id', $id)->where('isSold', false)->get()->first();
        return view('products.index', compact('product'));    
    }
}