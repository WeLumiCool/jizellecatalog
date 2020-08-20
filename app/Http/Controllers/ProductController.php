<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function filter(Request $request)
    {
        $params = $request->params;
        $color = $request->color;
        $price = $request->price;
        $cats = Category::all();
        if ($params) {
            $cats = $cats->whereIn('id', $params);
        }


        $products = collect();
        foreach ($cats as $cat) {
            $products = $products->merge($cat->products);
        }
//        dd($country);
        $products = $products->unique('id');
//        if ($country == null) {
//            $announces = $announces->all();
////            $products = $products->where('type', $type);
//        }

//        if ($color != null && $color != 'none')
//        {
//            $products = $products->where('locate', $country);
////            dd($announces);
//        }
//        dd($products);
        if ($request->color && $request->color != 'none'){
        $temp = collect();
        foreach ($products as $product)
        {
            if ($product->colors)
            {
                foreach ($product->colors as $item) {
                    if ($item->id == $color)
                    {
                        $temp->push($product);
                    }
                }
            }
        }
        $products = $temp;
        }

        if ($request->price == '1')
        {
            $products = $products->sortByDesc('price');
        }
        elseif ($request->price == '0')
        {
            $products = $products->sortBy('price');
        }
        else {
            $products = $products->reverse();
        }
//        $products = Product::whereHas('colors', function($temp){
//            $temp->where('id', 1);
//        })->get();
//        dd($products);
//        $products = Product::query($products)->paginate(9);
        //        $products = $products->paginate(9);
//        dd(count($products));
        return response()->json([
            'html' => view('catalog.list', [
                'products' => $products,
            ])->render(),
            'products' => $products,
            'count' => count($products),
            'filters' => $request->query->all(),
//            'products' => $products,
        ]);
    }

    public function search(Request $request) {
        $value = $request->value;
        $products = Product::where('title','like',"%$value%")->orWhere('article','like',"%$value%")->orWhere('price','like',"%$value%")->get();

        if ($value == null)
        {
            $products = null;
        }
        return response()->json([
           'html' => view('catalog.search', [
               'products' => $products,
           ])->render(),
        ]);
    }
}
