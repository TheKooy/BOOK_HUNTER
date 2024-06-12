<?php 
//ROUTER PRINCIPAL 



// ROUTE DES AUTHORS
// PATTERN: /?authors
// CTRL: authorsController
// ACTION: indexAction

if (isset($_GET['authors'])) :
    include_once '../app/routers/authors.php';

// ROUTE DES BOOKS
// PATTERN: /?books
// CTRL: booksController
// ACTION: indexAction


elseif (isset($_GET['books'])) :
    include_once '../app/routers/books.php';

// ROUTE PAR DEFAUT
// PATTERN: /
// CTRL: pagesController
// ACTION: homeAction
else :

include_once '../app/controllers/pagesController.php';
\App\Controllers\PagesController\homeAction($connexion);
endif;
?>