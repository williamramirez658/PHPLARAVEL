<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Product;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    function show(){
        $invoices = Invoice::all();
        //return dd($invoices); 
        return view('invoice.list',compact('invoices')); // ['invoices' => $invoices]
    }
    
        function form(){
            $products = Product::all();
            return view('invoice.form',['products'=>$products]); 
        }
}
