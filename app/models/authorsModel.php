<?php 
namespace App\Models\AuthorsModel;

use \PDO;

function findAll(PDO $connexion, int $limit = 15):array {
$sql = "SELECT *, a.id AS authorID
        FROM authors a
        ORDER BY created_at DESC
        LIMIT :limit;
        ";
$rs = $connexion->prepare($sql);
$rs->bindValue(':limit', $limit, PDO::PARAM_INT);
$rs->execute();
return $rs->fetchAll(PDO::FETCH_ASSOC);
}

function findOneById(PDO $connexion, int $id):array {
        $sql = "SELECT *, a.id AS authorID, b.title AS bookTitle
                FROM authors a
                INNER JOIN books b ON b.author_id = a.id
                WHERE a.id = :id;
                ";
        $rs = $connexion->prepare($sql);
        $rs->bindValue(':id', $id, PDO::PARAM_INT);
        $rs->execute();
        return $rs->fetch(PDO::FETCH_ASSOC);
        }
?>