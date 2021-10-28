<?php
require '../models/Article.php';
require '../models/Comment.php';

$task= "";
if(isset($_GET['task']) && !empty($_GET['task']) && isset($_GET['id']) && !empty($_GET['id'])){
    $task = htmlspecialchars($_GET['task']); 
    $id = htmlspecialchars($_GET['id']); 
}

$article = new Article;
$commentaire = new Comment;

switch ($task){
    case "show":
        $article = $article->find($id);
        $commentaires = $commentaire->findAllwithArticle($id);
        require '../views/articles/show.php';
        break;

    case "delete":        
        $article = $article->delete($id);
        header('Location: ../index.php');
        break;

    default:
        $articles = $article->findAll();
        ob_start();
        require '../views/articles/index.php';
}

$pageContent = ob_get_clean();
require '../views/layout.php';
