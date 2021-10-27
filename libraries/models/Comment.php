<?php

namespace Models;


class Comment extends Main {


    protected $table = "comments";

    /**
     * Retourne la liste des commentaires d'un article
     * @return array
     */
    public function findAllwithArticle($id):array {

        $query = $this->pdo->prepare("SELECT * FROM comments WHERE article_id = :article_id");
        $query->execute(['article_id' => $id]);
        $commentaires = $query->fetchAll();

        return $commentaires;
    }

    
    /**
     * inserer un commentaire
     * @return void
     */
    public function insert(string $author, string $content, int $article_id):void {
      
        $query = $this->pdo->prepare('INSERT INTO comments SET author = :author, content = :content, article_id = :article_id, created_at = NOW()');
        $query->execute(compact('author', 'content', 'article_id'));
    }

}