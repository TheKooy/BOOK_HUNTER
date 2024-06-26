<?php 
namespace App\Models\BooksModel;

use \PDO;

function findAll(PDO $connexion, int $limit = 15):array {
$sql = "    SELECT *, b.id AS bookID, a.id AS authorID, cats.id AS categoryID, cats.name AS categoryName
            FROM books b
            INNER JOIN authors a ON b.author_id = a.id
            INNER JOIN categories cats ON b.category_id = cats.id
            INNER JOIN books_has_tags bht ON bht.book_id = b.id
            ORDER BY b.created_at DESC
            LIMIT :limit;
            ";
$rs = $connexion->prepare($sql);
$rs->bindValue(':limit', $limit, PDO::PARAM_INT);
$rs->execute();
return $rs->fetchAll(PDO::FETCH_ASSOC);
}

function findOneById(PDO $connexion, int $id):array {
    $sql = "SELECT *, b.id AS bookID, a.firstname AS authorF, a.lastname AS authorL, cats.name AS categoryName
            FROM books b
            INNER JOIN authors a ON b.author_id = a.id
            INNER JOIN categories cats ON b.category_id = cats.id
            WHERE b.id = :id;
            ";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':id', $id, PDO::PARAM_INT);
    $rs->execute();
    return $rs->fetch(PDO::FETCH_ASSOC);
    }
?>
<!-- fait tous bugguer 
dans le select t.name AS tagName 
en dessous du from INNER JOIN tags t ON bht.tag_id = t.id
en dessous du from INNER JOIN users_notations un ON un.book_id = b.id -->