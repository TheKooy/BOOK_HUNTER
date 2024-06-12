<?php 
namespace App\Models\CategoriesModel;

use \PDO;

function findAll(PDO $connexion):array {
$sql = "SELECT *
        FROM categories cats
        ORDER BY cats.created_at DESC;
        ";
return $connexion->query($sql)->fetchAll(PDO::FETCH_ASSOC);
}
?>