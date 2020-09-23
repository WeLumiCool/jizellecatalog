<?php

namespace App\Http\Controllers;

use App\Image;
use App\Wish;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic;

class WishController extends Controller
{
    //

    public function wishes()
    {
        $wishes = Wish::all();

        return view('wish_list',['wishes' => $wishes]);
    }

    public function wish_list(Request $request)
    {
//        dd($request->all());
        $wish = new Wish();
        $wish->name = $request->name;
        $wish->email = $request->email;
        $wish->phone = $request->phone;
        $wish->comment = $request->desc;
        $wish->save();

        if (isset($request->photos)){
        foreach ($request->photos as $photo) {
            $img = new Image();
                $image = $photo;
                $fileName = 'wishes/' . uniqid('wish_image') . '.jpg';
                $image = ImageManagerStatic::make($image);
            $image = $image->resize(500, null, function ($constraint) {
                return $constraint->aspectRatio();
            })
                ->stream('jpg', 80);
                Storage::disk('local')->put('public/' . $fileName, $image);
                $img->photo = $fileName;
                $img->wish_id = $wish->id;
                $img->save();
        }
        }

        Mail::to('catalog@jizelle.ru')->send(new \App\Mail\Wish());
        return response()->json([
            'status' => 'success',
        ]);
    }
}
