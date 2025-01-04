<?php

if (!auth()) {
  abort(403, 'Você precisa estar logado para acessar essa página.');
}

view("app", [] , "myMovies");