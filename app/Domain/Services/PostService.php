<?php
namespace App\Domain\Services;

use Exception;
use App\Domain\Entities\Post as PostEntity;
use App\Domain\Repositories\IPostRepository;
use Illuminate\Support\Facades\Response;

interface IPostService {
    /**
     * @param int $postId
     * @return PostEntity
     */
    public function getPostById(int $postId): PostEntity;

    /**
     * @param int $postId
     * @return
     */
    public function deletePost(int $postId): void;
}

class PostService implements IPostService {
    private IPostRepository $postRepository;

    public function __construct(IPostRepository $postRepository) {
        $this->postRepository = $postRepository;
    }

    public function getPostById(int $postId): PostEntity {
        return $this->postRepository->fetchPostById($postId);
    }

    public function deletePost(int $postId): void {
        $this->postRepository->deletePost($postId);
    }
}
?>
