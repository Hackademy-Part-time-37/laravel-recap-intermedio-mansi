<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostStoreRequest;
use App\Mail\CreateArticleMail;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostStoreRequest $request)
    {
        $path_image = '';
        if ($request->hasFile('image')) {
            $path_image = $request->file('image')->store('public/images');
        }
        $post =  Post::create([
            "title" => $request->title,
            "body" => $request->body,
            "is_active" => $request->is_active ? true : false,
            'user_id' => Auth::user()->id,
            "slug" => Str::of($request->title)->slug('-'),
            'image' => $path_image,

        ]);
        $data = ['title' => $post->title];

        Mail::to(Auth::user()->email)->send(new CreateArticleMail($data));
        return to_route('posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {

        $path_image = $post->image;
        if ($request->hasFile('image')) {
            $path_image = $request->file('image')->store('public/images');
        }

        $post->update([
            "title" => $request->title,
            "body" => $request->body,
            "is_active" => $request->is_active ? true : false,
            'user_id' => Auth::user()->id,
            'image' => $path_image
        ]);

        return to_route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return to_route('posts.index');
    }
}
