<?php

namespace App\Http\Controllers\Frontend\Article;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SoundController extends Controller
{
    //
    public function index()
    {
        return view('frontend.article.sound.index');
    }
}
