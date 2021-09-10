<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Brand;

class ProductController extends Controller
{
    
    function __construct(){
        $this->middleware('auth');
    }
        
    function show(){

        $unalista = product::all();
        return view('product/list', ['miListaDeProductos' => $unalista]);

    }
        function form($id = null){
            $product = new Product();
            $brands = Brand::all();
            if($id!=null){
                $product = Product::findOrFail($id);
                
            }

            return view('product/form',[
                'product'=>$product,
                'brands'=>$brands
            
            ]);
        }

        function save(Request $request){

            $request->validate([
                "name"=>'required|max:50',
                "cost"=>'required|numeric',
                "price"=>'required|numeric',
                "quantity"=>'required|numeric',
                "brand"=>'required|max:50',

            ]);

            $product = new Product();
            if($request->id > 0){
                $product = Product::findOrFail($request->id);
            }
            $product->name = $request->name;
            $product->cost = $request->cost;
            $product->price = $request->price;
            $product->quantity = $request->quantity;
            $product->brand_id = $request->brand;

            $product->save();

            return redirect('/products')->with('message', 'Producto guardado con exito');

}
            function delete($id){
                $product = product::findOrFail($id);
                $product->delete();

                return redirect('/products')->with('message', 'Producto eliminado con exito');
}

}