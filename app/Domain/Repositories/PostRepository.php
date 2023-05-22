<?php
namespace App\Domain\Repositories;

use App\Domain\Entities\Post as PostEntity;
use App\Models\Post;
use Exception;

interface IPostRepository {
    /**
     * @param int $postId
     * @return void
     */
    public function fetchPostById (int $postId): ?PostEntity;
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
    public function fetchPostById (int $postId): ?PostEntity {
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
}
?>
