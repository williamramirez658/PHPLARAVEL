<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    function products(){
        return $this->belongsToMany(Product::class,'invoice_details')->withPivot('price','quantity');
    }
}
