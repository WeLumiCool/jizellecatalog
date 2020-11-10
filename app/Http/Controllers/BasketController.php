<?php

namespace App\Http\Controllers;

use App\Category;
use App\Mail\send;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Session\SessionServiceProvider;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use phpDocumentor\Reflection\DocBlock\Tags\See;

class BasketController extends Controller
{
    public function index()
    {
//        $count = Session::get('cart');

        $products = Session::get('cart');


        return view('basket.index',['products' => $products]);
    }

    public function add(Request $request)
    {
        $product = Product::find($request->product);

        $parameters = collect();
        if ($request->kind == 2) {
        foreach ($request->parameters as $key => $item) {
            foreach ($product->sizes as $key2 => $size) {
                if ($key == $key2) {
                    $parameters->push(['size' => $size->size, 'count' => $item]);
                }
            }
        }
        }
        elseif ($request->kind == 1) {
            $parameters = $request->parameters;
        }
//        dd($parameters);

        if (Session::has('cart'))
        {
            $basket = Session::get('cart');
            $check = 0;
            foreach ($basket as $key => $item) {
                if ($item['id'] == $product->id)
                {
                   $item['content'] = $parameters;
                   $basket[$key] = $item;
                   $check = 1;

                   $price_of_item = 0;
                   if ($request->kind == 2){
                   foreach ($item['content'] as $parameter)
                   {
                           $price_of_item = $price_of_item + ($parameter['count'] * Product::find((int)$item['id'])->price);
                   }
                   }
                   elseif ($request->kind == 1){
                       $price_of_item = $request->total;
                   }
                   $item['price'] = $price_of_item;
                   $item['kind'] = $request->kind;
                }
            }
            Session::put('cart', $basket);
            if ($check == 0) {
                $price_of_item = 0;
                if ($request->kind == 2){
                foreach ($parameters as $parameter)
                {
                        $price_of_item = $price_of_item + ($parameter['count'] * $product->price);
                }
                }
                elseif ($request->kind == 1)
                {
                    $price_of_item = $request->total;
                }
                Session::push('cart', ['id' => $product->id, 'content' => $parameters, 'price' => $price_of_item, 'kind' => $request->kind]);
                $basket = Session::get('cart');
            }
        }
        else
        {
            $price_of_item = 0;
            if ($request->kind == 2){
            foreach ($parameters as $parameter)
            {
                    $price_of_item = $price_of_item + ($parameter['count'] * $product->price);
            }
            }
            elseif ($request->kind == 1)
            {
                $price_of_item = $request->total;
            }
            Session::push('cart', ['id' => $product->id, 'content' => $parameters, 'price' => $price_of_item, 'kind' => $request->kind]);
            $basket = Session::get('cart');
        }

//        $product = Product::find($request->id);
//        if (Session::has($product))
//        Session::flush();
//        Session::save();
//        dd(Session::get('cart'));
//        Session::push('cart',$request->id);
//        if (Session::has('cart')) {
//            $basket = Session::get('cart');
//            $check = 0;
//            foreach ($basket as $key => $item) {
//                if ($item['id'] == $request->id && $item['color'] == $request->color && $item['size'] == $request->size) {
//                    $item['count'] = $item['count'] + $request->count;
//                    $basket[$key] = $item;
//                    $check = 1;
//                }
//            }
//            Session::put('cart', $basket);
//            if ($check == 0) {
//                Session::push('cart', ['id' => $request->id, 'size' => $request->size, 'color' => $request->color, 'count' => $request->count]);
//                $basket = Session::get('cart');
//            }
//        }
//        else
//        {
//            Session::push('cart', ['id' => $request->id, 'size' => $request->size, 'color' => $request->color, 'count' => $request->count]);
//            $basket = Session::get('cart');
//        }

//        $basket = array_unique($basket);
//        dd($input);
//        $total = 0;
//        foreach ($basket as $item) {
//            $temp = Product::find($item['id'])->price * $item['count'];
//            $total = $total + $temp;
//        }
        $total = 0;
        foreach ($basket as $cart) {
            $total = $total + $cart['price'];
        }
        Session::put('total',$total);
        Session::put('count',count($basket));
        Session::save();

        return response()->json([
            'status' => 'success',
            'count' => count($basket)
        ]);
    }

    public function delete(Request $request)
    {

        $session = Session::get('cart');
//        $session = array_unique($session);


        $total = 0;
        $index = 0;
        foreach ($session as $key => $cart)
        {
            if ($cart['id'] == $request->id){
                $total = Session::get('total') - $cart['price'];
//                dd($key);
                $index = $key;
            }
        }
        unset($session[$index]);
//        dd($session);

        Session::put('total',$total);
        Session::put('count', count($session));
        Session::put('cart',$session);
//        dd(Session::get('cart').)

        return response()->json([
            'status' => 'success',
            'count' => count($session),
            'total' => $total
        ]);
    }

    public function send(Request $request)
    {
        $name = $request->name;
        $phone = $request->phone;
        $city = $request->city;
        $products = Session::get('cart');
        $total = Session::get('total');
        Session::flush();

        Mail::to('catalog@jizelle.ru')->send(new send($name, $phone, $city, $products, $total));

        return view('basket.success');
    }
}
