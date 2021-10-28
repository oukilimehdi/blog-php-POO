<?php

require '../models/Article.php';
require '../models/Comment.php';

$commentaire = new Comment;
if(isset($_GET['id']) && !empty($_GET['id'])){
    $id= htmlspecialchars($_GET['id']);
    $commentaire->delete($id);
    header('Location:  ../index.php');

} else {
    header('Location:  ../index.php');
}

$task= "";
if($_GET['task'] == "insert") {
    if(isset($_POST['author']) && isset($_POST['content']) && $_POST['article_id']) {
        $author = htmlspecialchars($_POST['author']);
        $content = htmlspecialchars($_POST['content']);
        $id = htmlspecialchars($_POST['article_id']);

        $commentaire->insert($author, $content, $id);
        header('Location:  ../index.php');
    }
}