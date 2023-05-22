<?php

namespace App\Domain\Entities;

use DateTime;
use Illuminate\Support\Facades\Date;

class Post
{
    public readonly int $id;

    public readonly string $hash_id;

    public readonly string $title;

    public readonly string $content;

    public readonly ?DateTime $createdAt;

    public readonly ?DateTime $updatedAt;

    public function __construct (array $attributes) {
        $this->id = $attributes['id'];
        $this->hash_id = $attributes['hash_id'] ?? '';
        $this->title = $attributes['title'] ?? '';
        $this->content = $attributes['content'] ?? '';

        $this->createdAt = isset($attributes['created_at']) ?
            Date::parse($attributes['created_at'])->timezone(date_default_timezone_get()) :
            $attributes['createdAt'] ?? null;
        $this->updatedAt = isset($attributes['updated_at']) ?
            Date::parse($attributes['updated_at'])->timezone(date_default_timezone_get()) :
            $attributes['updatedAt'] ?? null;
    }
}
?>
