<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function detail($id){
        $product = Product::findorfail($id);
        return view('products.index', compact('product'));    
    }
}