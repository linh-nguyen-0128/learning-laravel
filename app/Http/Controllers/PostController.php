<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use App\Domain\Services\IPostService;
use App\Models\Post;
use Exception;

class PostController extends Controller {
    private IPostService $postService;

    public function __construct(IPostService $postService) {
        $this->postService = $postService;
    }

    public function index() {
        $posts = Post::all();
        return view('index', [
            'posts' => $posts
        ]);
    }

    public function edit(string $id) {
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

    public function destroy(int $id) {
        try {
            DB::beginTransaction();
            $this->postService->deletePost($id);
            DB::commit();
            return Response([
                'message' => 'success',
            ], 200);
        } catch (\Throwable $e) {
            DB::rollback();
            return Response([
                'message' => $e->getMessage()
            ], 404);
        }
    }

    public function show(int $id){
        try {
            return response()->json($this->postService->getPostById($id));
        } catch (\Throwable $e) {
            throw new Exception($e->getMessage());
        }
    }
}
