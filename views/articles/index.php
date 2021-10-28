<h1 style="text-align: center">Nos articles</h1>

<?php foreach ($articles as $article) : ?>
    <h2><?= $article['title'] ?></h2>
    <small>Ecrit le <?= $article['created_at'] ?></small>
    <p><?= $article['introduction'] ?></p>
    <a class="btn btn-info" href="../../controllers/article.php?task=show&id=<?= $article['id'] ?>">Lire la suite</a>
    <a class="btn btn-danger" href="../../controllers/article.php?&task=delete&id=<?= $article['id'] ?>" onclick="return window.confirm(`Êtes vous sur de vouloir supprimer cet article ?!`)">Supprimer</a>
<?php endforeach ?>