<?php

unset($_SESSION["flash_formData"]);

// Verificação se o usuário está logado!
if (!auth()) {
  abort(403, 'Você precisa estar logado para acessar essa página.');
}

$movies = Movie::myMovies(auth()->id);

$search = $_REQUEST['pesquisar'] ?? '';

if ($search != '') {
  // Armazenar valores do form na SESSION.
  flash()->put('formData', $_POST);

  $movies = Movie::all($search);
}

view("app", compact('movies', 'search'), "myMovies");
