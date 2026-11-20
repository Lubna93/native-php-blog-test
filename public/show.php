<?php

declare(strict_types=1);
require_once __DIR__ . '/../includes/post_functions.php';
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
$post = $id ? findPost($id) : null;
if (!$post) { http_response_code(404); echo 'Post not found'; exit; }
?>
<!doctype html>
<html lang="en"><head><meta charset="utf-8"><title><?= htmlspecialchars($post['title'], ENT_QUOTES, 'UTF-8') ?></title></head><body>
<p><a href="index.php">Back</a></p>
<h1><?= htmlspecialchars($post['title'], ENT_QUOTES, 'UTF-8') ?></h1>
<p><?= nl2br(htmlspecialchars($post['body'], ENT_QUOTES, 'UTF-8')) ?></p>
<p><a href="edit.php?id=<?= (int) $post['id'] ?>">Edit</a></p>
</body></html>
