<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;

class BrandController extends Controller
{
    
    function __construct(){
        $this->middleware('auth');
    }
        
    function show(){

        $list = brand::all();
        return view('brand/list', ['brands' => $list]);

    }
    function form($id = null){
        $brand = new Brand();
        if($id!=null){
            $brand = Brand::findOrFail($id);
            
        }

        return view('brand/form',['brand'=>$brand]);
    }

    function save(Request $request){
        
        $request->validate([
            "name"=>'required|max:50',

        ]);


        $brand = new brand();
            if($request->id > 0){
                $brand = Brand::findOrFail($request->id);
            }
        
        $brand->name = $request->name;

        $brand->save();

        return redirect('/brands')->with('message', 'Marca guardada con exito');;
}

        function delete($id){
        $brand = brand::findOrFail($id);
        $brand->delete();

        return redirect('/brands')->with('message', 'Marca eliminada con exito');;

}

}