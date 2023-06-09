<?php
namespace App\Domain\Repositories;

use App\Domain\Entities\Post as PostEntity;
use App\Models\Post;
use Exception;
use Illuminate\Http\Request;
interface IPostRepository {
    /**
     * @param int $postId
     * @return PostEntity
     */
    public function fetchPostById (int $postId): PostEntity;

    /**
     * @param int $postId
     * @return void
     */
    public function deletePost(int $postId): void;

    /**
     * @param Request $request
     */
    public function updatePost(Request $request);
}

class PostRepository implements IPostRepository {
    /**
     * constructor for Post
     */
    public function __construct( private readonly Post $post
    ) {
    }

    /**
     * @param int $postId
     */
    public function fetchPostById (int $postId): PostEntity {
        $result = $this->post->where('posts.id', $postId);
        $post = $result->select(
            'posts.hash_id',
            'posts.id',
            'posts.title',
            'posts.content',
            'posts.created_at',
            'posts.updated_at',
        )->first();
        if (is_null($post)) {
            throw new Exception("not_found");
        }
        return new PostEntity($post->toArray());
    }

    /**
     * @param int $postId
     */
    public function deletePost(int $postId): void
    {
        $post = $this->post->where('posts.id', $postId);
        if ($post->doesntExist()) {
            throw new Exception('not_found');
        }
        $post->delete();
    }

    public function updatePost(Request $request)
    {
        $result = $this->post->where('posts.id', $request->id)->first();
        $result->title = $request->title;
        $result->content = $request->content;
        $result->save();
    }
}
