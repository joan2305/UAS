<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'product_id'];
    protected $guarded = ['id'];
    
    public function user(){
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    public function transactiondetail(){
        return $this->hasMany('App\Model\TransactionDetail');
    }
}