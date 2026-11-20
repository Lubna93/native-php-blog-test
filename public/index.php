<?php

declare(strict_types=1);
require_once __DIR__ . '/../includes/post_functions.php';
$posts = allPosts();
?>
<!doctype html>
<html lang="en"><head><meta charset="utf-8"><title>Legacy Blog</title></head><body>
<h1>Legacy Blog</h1><p><a href="create.php">Create post</a></p>
<?php foreach ($posts as $post): ?>
<article><h2><a href="show.php?id=<?= (int) $post['id'] ?>"><?= htmlspecialchars($post['title'], ENT_QUOTES, 'UTF-8') ?></a></h2></article>
<?php endforeach; ?>
</body></html>
