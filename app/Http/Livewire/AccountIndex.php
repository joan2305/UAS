<?php

namespace App\Http\Livewire;

use App\Models\Transaction;
use App\Models\Transactiondetail;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class AccountIndex extends Component
{
    public $data;
    public function render()
    {
        $this->data = User::where('id','!=',Auth::user()->id)->latest()->get();
        return view('livewire.account-index');
    }
    public function destroy($id){
        if($id){
            $user = User::findorfail($id);
            if(Storage::exists('public/images/dp/'. $user->displayPicture)){
                Storage::delete('public/images/dp/' . $user->displayPicture);
            }
            $transactions = Transaction::where('user_id','=',$user->id)->get();
            
            foreach($transactions as $transaction){
               $details = DB::table('transactiondetails')->where('transaction_id', '=', $transaction->id)->delete();
               
               
               $transaction->delete();
            }
            $user->delete();
            // $this->resetInput();
            $this->render();
        }
    }
}