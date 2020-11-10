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

    public function show($id)
    {
        $new = News::find($id);

        return view('news.show', ['new' => $new]);
    }
}
