<?php
namespace App\Providers;

use App\Domain\Repositories\PostRepository;
use Illuminate\Support\ServiceProvider;
use App\Domain\Repositories\IPostRepository;

class RepositoryServiceProvider extends ServiceProvider {
    /**
     * register services
     *
     * @return void;
     */
     public function register(): void
     {
        $this->app->bind(IPostRepository::class, PostRepository::class);
     }
}
?>
