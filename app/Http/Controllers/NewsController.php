<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::all()->reverse();

        return view('news.list', ['news' => $news]);
    }

    public function show(Request $request)
    {
        $new = News::find($request->id);

        return view('news.show', ['new' => $new]);
    }
}
