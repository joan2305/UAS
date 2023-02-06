<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    use HasFactory;
    protected $fillable = ['image', 'name', 'price', 'description', 'discount', 'originalPrice','grocer'];
    protected $guarded = ['id'];

    public function transactiondetail(){
        return $this->hasOne('App\Models\TransactionDetail');
    }
    public function cart(){
        return $this->hasMany('App\Models\Cart');
    }
}