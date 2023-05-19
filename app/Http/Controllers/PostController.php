<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\Post;

class PostController extends Controller
{

    public function index() {
        $posts = Post::all();
        // return response()->json($post);
        return view('index', [
            'posts' => $posts
        ]);
    }

    public function edit(string $id) {
        dd($id);
        return response()->json([
            'id' => $id
        ]);
    }

    public function store(Request $request) {
        $post = new Post;
        $post->title = $request->title;
        $post->content = $request->content;
        $post->save();
        return redirect()->route('post.create');
    }

    public function destroy(string $photo) {
        dd($photo);
    }
}
