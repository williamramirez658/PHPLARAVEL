<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
class ControllerCategories extends Controller
{
    function show(){
        $listCategories =Categories::all(); //Select * from categories
        return view('categories/list', ['categories' =>$listCategories]);
    }
}
