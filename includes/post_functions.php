<?php

declare(strict_types=1);

require_once __DIR__ . '/../config/database.php';

function allPosts(): array
{
    return db()->query('SELECT id, title, body, created_at FROM posts ORDER BY created_at DESC')->fetchAll();
}

function findPost(int $id): ?array
{
    $statement = db()->prepare('SELECT id, title, body, created_at FROM posts WHERE id = :id');
    $statement->execute(['id' => $id]);
    return $statement->fetch() ?: null;
}

function createPost(string $title, string $body): int
{
    $statement = db()->prepare('INSERT INTO posts (title, body) VALUES (:title, :body)');
    $statement->execute(['title' => $title, 'body' => $body]);
    return (int) db()->lastInsertId();
}

function updatePost(int $id, string $title, string $body): void
{
    $statement = db()->prepare('UPDATE posts SET title = :title, body = :body WHERE id = :id');
    $statement->execute(['id' => $id, 'title' => $title, 'body' => $body]);
}
