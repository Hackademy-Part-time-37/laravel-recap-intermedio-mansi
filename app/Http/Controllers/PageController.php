<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function homepage()
    {
        $posts = Post::where('is_active', true)->get();
        return view('pages.homepage', compact('posts'));
    }
}
