<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Season;
use Illuminate\Http\Request;

class MogitateController extends Controller
{
    //
    public function index(Request $request)
    {
        $products =  Product::SortPrice($request->sort)->Paginate(6)->appends($request->all());
        return view('index', compact('products'));
    }

    public function search(Request $request)
    {
        $products = Product::ProductSearch($request->product_id)->KeywordSearch($request->keyword)->SortPrice($request->sort)->paginate(6)->appends($request->all());

        return view('index', compact('products'));
    }

    public function detail($productId)
    {
        $fruit = Product::with('seasons')->findOrFail($productId);
        $seasons = Season::all();
        return view('update', compact('fruit', 'seasons'));
    }

    public function update(Request $request)
    {  
        if ($request->has('back')) {
            return redirect('/products')->withInput();
        }

       
    }

    public function destroy($productId)
    {
        Product::find($productId->id)->delete();
        return redirect('/products/detail');
    }

    public function register()
    {
        return view('register');
    }
}
