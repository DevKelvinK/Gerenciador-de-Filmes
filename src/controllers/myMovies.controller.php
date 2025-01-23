<?php

// Verificação se o usuário está logado!
if (!auth()) {
  abort(403, 'Você precisa estar logado para acessar essa página.');
}

$movies = Movie::myMovies(auth()->id);

view("app", compact('movies') , "myMovies");