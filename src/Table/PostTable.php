<?php

namespace App\Table;

use App\{Connection, Model\Post, paginatedQuery};
use PDO;

class PostTable extends Table
{
    protected $table = "post";
    protected $class = Post::class;

    public function findPaginatedForCategory(int $categoryID): array
    {
        $paginatedQuery = new paginatedQuery(
            "SELECT p.*
                FROM $this->table p
                JOIN post_category pc ON pc.post_id = p.id
                WHERE pc.category_id = $categoryID
                ORDER BY created_at DESC",
            "SELECT COUNT(category_id) FROM post_category WHERE category_id = $categoryID",
        );
        $posts = $paginatedQuery->getItems(Post::class);
        (new CategoryTable($this->pdo))->hydratePosts($posts);
        return [$posts, $paginatedQuery];
    }

    public function attachAll(PDO $pdo, Post $post): void
    {
        (new CategoryTable($pdo))->attachItems($post->getID(), $_POST['categories_ids']);
        if (isset($_POST['images_ids'])) {
            (new ImageTable($pdo))->attachItems($post->getID(), $_POST['images_ids']);
        }
        if (isset($_POST['files_ids'])) {
            (new FileTable($pdo))->attachItems($post->getID(), $_POST['files_ids']);
        }
    }
}