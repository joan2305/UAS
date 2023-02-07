<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Product::where('isSold','=','0')->paginate(10);
        return view('home', compact('products'));
    }
    public function loginIndex()
    {
        return view('auth.login');
    } 
    public function registerIndex()
    {
        return view('auth.register');
    }
    public function profileIndex(){
        return view('profile.profile');
    }
    public function maintenanceIndex(){
        return view('profile.editAccount');
    }
    public function updateAccIndex($id){
        $user = User::findorfail($id);
        return view('profile.update', compact('user'));
    }
    public function search(Request $request){
        $searchResult = Product::where('name', 'like', '%' . $request->searchInput . '%')->where('isSold','=','0')->paginate(10);

        return view('search', ['products' => $searchResult]);
    }
}