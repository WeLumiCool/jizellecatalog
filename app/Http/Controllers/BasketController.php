<?php

namespace App\Http\Controllers;

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
        $quantity = Session::get('quantity');
        $check = 0;
//        dd($quantity);
        foreach ($quantity as $item) {
            if($item['count'] < 10)
            {
                $check = 1;
            }
        }

        return view('basket.index',['products' => $products, 'check' => $check]);
    }

    public function add(Request $request)
    {
        if (Session::has('cart') && Session::has('quantity')) {
            $basket = Session::get('cart');
            $quantity = Session::get('quantity');
            $check = 0;
            $quan_check = 0;
            foreach ($quantity as $key => $item) {
                if ($item['id'] == $request->id && $item['color'] == $request->color) {
                    $item['count'] = $item['count'] + $request->count;
                    $quantity[$key] = $item;
                    $quan_check = 1;
                }
            }
            Session::put('quantity', $quantity);
            if ($quan_check == 0) {
                Session::push('quantity',['id' => $request->id, 'count' => $request->count, 'color' => $request->color]);
            }
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

            Session::push('quantity',['id' => $request->id, 'count' => $request->count, 'color' => $request->color]);
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
//        Session::flush();
        Session::save();

        $cache = 0;
        foreach (Session::get('quantity') as $item)
        {
            if ($item['id'] == $request->id)
            {
                $cache = $cache + $item['count'];
            }
        }

        $left = Product::find($request->id)->quantity - $cache;

        $procent = $left / (Product::find($request->id)->count / 100 );
        return response()->json([
            'status' => 'success',
            'count' => count($basket),
            'left' => $left,
            'procent' => $procent
        ]);
    }

    public function delete(Request $request)
    {
        $session = Session::get('cart');
        $quantity = Session::get('quantity');
        $deleted = $session[$request->id];
//        dd($deleted);
        unset($session[$request->id]);


        foreach ($quantity as $key => $item) {
            if ($item['id'] == $deleted['id'] && $item['color'] == $deleted['color'])
            {
                $item['count'] = $item['count'] - $deleted['count'];

                if ($item['count'] == 0)
                {
                        unset($quantity[$key]);
                }
                else
                {
                    $quantity[$key] = $item;
                }
            }
        }

        $total = 0;
        foreach ($session as $item) {
            $temp = Product::find($item['id'])->price * $item['count'];
            $total = $total + $temp;
        }
        Session::put('total',$total);
        Session::put('quantity', $quantity);
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

        foreach ($products as $item) {
            $product = Product::find($item['id']);
            $product->quantity = $product->quantity - $item['count'];
            $product->save();
        }
        Session::flush();

        Mail::to('catalog@jizelle.ru')->send(new send($name, $phone, $city, $products, $total));

        return view('basket.success');
    }
}
