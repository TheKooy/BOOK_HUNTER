<?php 
//ROUTER PRINCIPAL 

// ROUTE DES AUTHORS
// PATTERN: /?authors
// CTRL: authorsController
// ACTION: indexAction
if (isset($_GET['authors'])) :
    include_once '../app/controllers/authorsController.php';
    \App\Controllers\AuthorsController\indexAction($connexion);

// ROUTE DES BOOKS
// PATTERN: /?books
// CTRL: booksController
// ACTION: indexAction
elseif (isset($_GET['books'])) :
    include_once '../app/controllers/booksController.php';
    \App\Controllers\BooksController\indexAction($connexion);

// ROUTE PAR DEFAUT
// PATTERN: /
// CTRL: pagesController
// ACTION: homeAction
else :
include_once '../app/controllers/pagesController.php';
\App\Controllers\PagesController\homeAction($connexion);
endif;
?>