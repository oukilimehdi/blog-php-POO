<?php

namespace Models;

abstract class Main {

    protected $pdo;
    protected $table;

    public function __construct(){
        $this->pdo = \Database::getPdo();
    }

    /**
     * Retourne un item recherché par son id
     */
    public function find(int $id){

        $query = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE id = :id");
        // On exécute la requête en précisant le paramètre :article_id 
        $query->execute(['id' => $id]);

        // On fouille le résultat pour en extraire les données réelles de l'article
        $item = $query->fetch();

        return $item;
    }

    /**
     * supprime un item
     * @return void
     */
    public function delete(int $id):void {
        $query = $this->pdo->prepare("DELETE FROM {$this->table} WHERE id = :id");
        $query->execute(['id' => $id]);
    }


    /**
     * Retourne une liste classée par date de création
     * @return array
     */
    public function findAll(?string $order= ""): array{
        
        $sql = "SELECT * FROM {$this->table} ";

        if($order) {
            $sql.= "ORDER BY ". $order;
        }
        $resultats = $this->pdo->query($sql);
        $articles = $resultats->fetchAll();

        return $articles;
    }

    

}