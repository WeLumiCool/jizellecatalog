<?php

namespace App\Http\Controllers;

use App\Mail\send;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Session\SessionServiceProvider;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class BasketController extends Controller
{
    public function index()
    {
        $count = Session::get('cart');

        $products = Product::find($count);

        return view('basket.index',['products' => $products]);
    }

    public function add(Request $request)
    {

//        dd(Session::all());
//        $product = Product::find($request->id);
//        if (Session::has($product))

        Session::push('cart',$request->id);
        $basket = Session::get('cart');
        $basket = array_unique($basket);
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
        $session = array_unique($session);
       if (($key = array_search($request->id, $session)) !== false) {
        unset($session[$key]);
        }
        Session::put('count', count($session));
        Session::put('cart',$session);
//        dd(Session::get('cart').)

        return response()->json([
            'status' => 'success',
            'count' => count($session)
        ]);
    }

    public function send(Request $request)
    {
        $name = $request->name;
        $phone = $request->phone;
        $products = Product::find(Session::get('cart'));
        Session::flush();

        Mail::to('catalog@jizelle.ru')->send(new send($name, $phone, $products));

        return view('basket.success');
    }
}
