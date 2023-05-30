<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Domain\Services\IPostService;
use App\Models\Post;
use Exception;

class PostController extends Controller
{
    private IPostService $postService;

    public function __construct(IPostService $postService, private readonly Post $post)
    {

        $this->postService = $postService;
    }

    public function index()
    {
        $posts = Post::all();
        return view('index', [
            'posts' => $posts
        ]);
    }

    public function update(Request $request)
    {
        try {
            DB::beginTransaction();
            $this->postService->updatePost($request);
            DB::commit();
            return redirect()->route('home');
            // return Response([
            //     'message' => 'success',
            // ], 200);
        } catch (\Throwable $e) {
            DB::rollback();
            return Response([
                'message' => $e->getMessage()
            ], 404);
        }
    }

    public function edit($id)
    {
        $result = $this->post->where('posts.id', $id)->first();
        return view('edit', [
            'post' => $result->toArray()
        ]);
    }

    public function store(Request $request)
    {
        $post = new Post;
        $post->title = $request->title;
        $post->content = $request->content;
        $faker = \Faker\Factory::create('en_EN');
        $post->hash_id = $faker->uuid();
        $post->save();
        return redirect()->route('home');
    }

    public function destroy(int $id)
    {
        try {
            DB::beginTransaction();
            $this->postService->deletePost($id);
            DB::commit();
            return redirect()->route('home');
            // return Response([
            //     'message' => 'success',
            // ], 200);
        } catch (\Throwable $e) {
            DB::rollback();
            return Response([
                'message' => $e->getMessage()
            ], 404);
        }
    }

    public function show(int $id)
    {
        try {
            return response()->json($this->postService->getPostById($id));
        } catch (\Throwable $e) {
            throw new Exception($e->getMessage());
        }
    }
}
