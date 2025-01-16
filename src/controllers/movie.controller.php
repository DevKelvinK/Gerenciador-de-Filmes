<?php

if (!auth()) {
  abort(403, 'Você precisa estar logado para acessar essa página.');
}

$movie_id = $_GET['id'];

$movie = Movie::get($movie_id);

$ratings = $database->query(
  query: "
    select 
      (SELECT count(*) FROM ratings countR WHERE countR.user_id = r.user_id ) as rated_movies, 
      r.*
    from
      ratings r 
    where 
      movie_id = :movie_id",
  class: Rating::class,
  params: compact('movie_id')
)->fetchAll();

view("app", compact('movie', 'ratings'), "movie");
