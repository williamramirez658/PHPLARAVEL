<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    function __construct(){
        $this->middleware('auth');
    }

    
    function show(){
        $list = Category::all();//select * from categories
        return view('category/list', ['categories' => $list]);
    }

    function form($id = null){
        $category = new Category();
        if($id!=null){
            $category = Category::findOrFail($id);
        }
        return view('category/form',['category' => $category]);
    }

    function save(Request $request){
        //$request->name;
        //$POST['name]

        $request->validate([
            "name"=>'required|max:50',           
        ]);
        
        $category = new Category();
        if($request->id > 0){
            $category = Category::findOrFail($request->id);
        }
        $category->name = $request->name;       

        $category->save();

        return redirect('/categories')->with('message', 'Categoría Guardada');
    }

    function delete($id){
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect('/categories')->with('message', 'Categoría Eliminada Correctamente!');
        
    }
}