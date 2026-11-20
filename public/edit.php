<?php

declare(strict_types=1);
require_once __DIR__ . '/../includes/post_functions.php';
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
$post = $id ? findPost($id) : null;
if (!$post) { http_response_code(404); echo 'Post not found'; exit; }
$error = '';
$title = $post['title'];
$body = $post['body'];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim((string) ($_POST['title'] ?? ''));
    $body = trim((string) ($_POST['body'] ?? ''));
    if ($title === '' || $body === '') {
        $error = 'Title and body are required.';
    } else {
        updatePost($id, $title, $body);
        header('Location: show.php?id=' . $id, true, 303);
        exit;
    }
}
?>
<!doctype html>
<html lang="en"><head><meta charset="utf-8"><title>Edit post</title></head><body>
<h1>Edit post</h1><p><?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?></p>
<form method="post"><label>Title <input name="title" value="<?= htmlspecialchars($title, ENT_QUOTES, 'UTF-8') ?>"></label>
<label>Body <textarea name="body"><?= htmlspecialchars($body, ENT_QUOTES, 'UTF-8') ?></textarea></label>
<button type="submit">Save</button></form>
</body></html>
