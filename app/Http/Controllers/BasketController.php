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



//        $product = Product::find($request->id);
//        if (Session::has($product))
//        Session::flush();
//        Session::save();
//        dd(Session::get('cart'));
//        Session::push('cart',$request->id);
        if (Session::has('cart')) {
            $basket = Session::get('cart');
            $check = 0;
            foreach ($basket as $key => $item) {
                if ($item['id'] == $request->id && $item['color'] == $request->color && $item['size'] == $request->size) {
                    $item['count'] = $item['count'] + $request->count;
                    $basket[$key] = $item;
                    $check = 1;
                }
            }
            Session::put('cart', $basket);
            if ($check == 0) {
                Session::push('cart', ['id' => $request->id, 'size' => $request->size, 'color' => $request->color, 'count' => $request->count]);
                $basket = Session::get('cart');
            }
        }
        else
        {
            Session::push('cart', ['id' => $request->id, 'size' => $request->size, 'color' => $request->color, 'count' => $request->count]);
            $basket = Session::get('cart');
        }

//        $basket = array_unique($basket);
//        dd($input);
        $total = 0;
        foreach ($basket as $item) {
            $temp = Product::find($item['id'])->price * $item['count'];
            $total = $total + $temp;
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
        unset($session[$request->id]);

        $total = 0;
        foreach ($session as $item) {
            $temp = Product::find($item['id'])->price * $item['count'];
            $total = $total + $temp;
        }
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
