<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function register(Request $request){
        $request->validate([
            'first_name' => ['required', 'string', 'max:25'],
            'last_name' => ['required', 'string', 'max:25'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users', ''],
            'password' => ['required', 'string', 'min:8', 'confirmed', 'alpha_num','regex:/[0-9]/'],
            'role' => ['required', 'in:User,Admin'],
            'gender' => ['required', 'in:Male,Female'],
            'display_picture' => 'required|image|mimes:jpg,png',
        ]);
        // dd($request->name);
        $file = $request->file('display_picture');
        $fullFileName = $file->getClientOriginalName();
        $fileName = pathinfo($fullFileName)['filename'];
        $extension = $file->getClientOriginalExtension();   
        $coverName = $fileName . '-' . Str::random(10) . '-' . date('YmdHis') . '.' . $extension;
        $file->storeAs('public/images/dp', $coverName);
        
        $newUser = new User();
        $newUser->firstName = $request->input('first_name');
        $newUser->lastName = $request->input('last_name');
        $newUser->email = $request->input('email');
        $newUser->password = Hash::make($request->input('password'));
        $newUser->role = $request->role;
        $newUser->gender = $request->gender;
        $newUser->displayPicture = $coverName;
        $newUser->originalImageName = $fullFileName;
        
        $newUser->save();
        return redirect()->route('loginIndex');
    }
    public function logout(){
        //INSERT CODE HERE
        Auth::logout();
        return redirect()->route('home');
    }
    public function login(Request $request){
        $credential = $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:8'
        ]);
        
        if(!Auth::attempt($credential, $request->remember)){
            return redirect()->back()->withErrors(__('home.invalidCr'));
        }
        return redirect()->route('home');
    }
    public function edit($id, Request $request){
        $user = User::findorfail($id);
        if(Auth::user()->id!=$id){
            return abort(404);
        }
        else{
            if($request->file('display_picture') == null &&  $request->password==null){
                $request->validate([
                    'first_name' => [ 'required', 'string', 'max:25'],
                    'last_name' => ['required', 'string', 'max:25'],
                    'email' => ['required', 'string', 'email', 'max:255','unique:users,email,'.$user->id],
                    
                    'gender' => ['in:Male,Female'],
                ]);
                $user->update([
                    'firstName' => $request->first_name,
                    'lastName' => $request->last_name,
                    'email' => $request->email,
                    // 'password' => Hash::make($request->input('password')),
                    'gender' =>$request->gender
                ]);
                

            }else if($request->file('display_picture') == null &&  $request->password!=null){
                $request->validate([
                    'first_name' => [ 'required', 'string', 'max:25'],
                    'last_name' => ['required', 'string', 'max:25'],
                    'email' => ['required', 'string', 'email', 'max:255','unique:users,email,'.$user->id],
                    'password' => ['required', 'string', 'min:8', 'confirmed', 'alpha_num','regex:/[0-9]/'],
                    'gender' => ['in:Male,Female'],
                ]);
                $user->update([
                    'firstName' => $request->first_name,
                    'lastName' => $request->last_name,
                    'email' => $request->email,
                    'password' => Hash::make($request->input('password')),
                    'gender' =>$request->gender
                ]);
            }else{
                $file = $request->file('display_picture');
                $fullFileName = $file->getClientOriginalName();
                $fileName = pathinfo($fullFileName)['filename'];
                $extension = $file->getClientOriginalExtension();
                $coverName = $fileName . '-' . Str::random(10) . '-' . date('YmdHis') . '.' . $extension;
                $file->storeAs('public/images/dp', $coverName);

                if(Storage::exists('public/images/dp/'. $user->displayPicture)){
                    Storage::delete('public/images/dp/' . $user->displayPicture);
                }
                $user->update([
                    'firstName' => $request->first_name,
                    'lastName' => $request->last_name,
                    'email' => $request->email,
                    'password' => Hash::make($request->input('password')),
                    'gender' =>$request->gender,
                    'displayPicture' =>$coverName,
                    'originalImageName' =>$fullFileName,
                ]);
            }
            return redirect()->route('profileIndex')->with('success','test');
        }
    }

    public function updateRole($id, Request $request){
        if(Auth::user()->role!="Admin"){
            abort(404);
        }else{
            $user = User::findorfail($id);
            $user->update([
               'role'=> $request->role 
            ]);
            return redirect()->route('toMaintenanceIndex')->with('success');
        }
    }
}