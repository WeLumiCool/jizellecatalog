<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;

class ProductController extends Controller
{

    public function change_cat(Request $request)
    {
        $id = $request->id;

        Session::put('category', $id);
        Session::put('refresh', 1);

        return redirect()->to(URL::previous());
    }

    public function index (Request $request)
    {
//        dd(Session::get('refresh'));
        if (Session::has('refresh') && Session::get('refresh') == 1)
        {
            $id = null;
            $type = null;
            Session::put('refresh',0);
            return redirect()->route('catalog');

        }
        else
        {
            $id = $request->category;
            $type = $request->type;
        }

        $cat_id = Session::has('category') ? Session::get('category') : 15;
        $categories = Category::where('parent_id', $cat_id)->get();

        return view('catalog.show', ['categories' => $categories, 'id' => $id, 'id2' => $type, 'cat_id' => $cat_id]);
    }



    public function filter(Request $request)
    {
        $params = $request->params;
        $color = $request->color;
        $price = $request->price;
        $type = $request->type;
        $cat_id = $request->cat_id;
        $cats = Category::where('parent_id', $cat_id)->get();
        if ($params && $params != 'archive') {
            $cats = $cats->whereIn('id', $params);
        }
        else
        {
            $products = Product::where('active', 1)->get();
        }
        if ($params != 'archive'){
        $products = collect();
        foreach ($cats as $cat) {
            $products = $products->merge($cat->products);
        }
            $products = $products->unique('id');
            $products = $products->where('active', 0);
        }
//        dd($country);

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

        if ($request->type && $request->type != 'none')
        {
            $temp = collect();
            foreach ($products as $product) {
                if ($product->type)
                {
                    if ($product->type->id == $type)
                    {
                        $temp->push($product);
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

    public function location()
    {
        return view('location');
    }

    public function show(Request $request)
    {
//            dd(Session::get('cart'));
        $product = Product::find($request->product);
        $check = 0;
        if (Session::has('cart')) {
            $carts = Session::get('cart');
            foreach ($carts as $cart) {
                if ($cart['id'] == $product->id) {
                    $bask = $cart;
                    $check = 1;
                }
            }
        }
        if ($check == 0)
        {
            $bask = null;
        }
        $total = 0;
        if (Session::get('cart')) {
        foreach (Session::get('cart') as $parameter)
        {
            if ($parameter['id'] == $product->id)
            {
                $total = $parameter['price'];
            }

        }
        }
//        dd($total);
        return view('catalog.single',['product' => $product, 'bask' => $bask, 'total' => $total]);
    }
}
