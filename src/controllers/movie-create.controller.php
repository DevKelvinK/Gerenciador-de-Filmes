<?php

if (!auth()) {
  abort(403, 'Você precisa estar logado para acessar essa página.');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $user_id = auth()->id;
  $title = $_POST['titulo'];
  $category = $_POST['categoria'];
  $year_of_release = $_POST['ano_de_lancamento'];
  $description = $_POST['descricao'];
  $fileCover = $_FILES['capa'];

  $randomName = md5(rand());
  $extension = pathinfo($fileCover['name'], PATHINFO_EXTENSION);
  $cover =  "$randomName.$extension";
  move_uploaded_file($fileCover['tmp_name'], __DIR__ . '/../../public/assets/' . "images/covers/$cover");

  $validation = Validation::validate([
    'capa' => ['required',]
  ], ['capa' => $cover]);

  $validation = Validation::validate([
    'titulo' => ['required', 'min:3'],
    'categoria' => ['required'],
    'ano_de_lancamento' => ['required', 'min:1800', 'max:2025'],
    'descricao' => ['required', 'min:10'],
  ], $_POST);

  if ($validation->notPassed()) {
    // Armazenar valores do form na SESSION.
    flash()->put('formData', $_POST);

    header('location: /movie-create');
    exit();
  }

  // Se passar de tudo isso, vamos adiconar o filme no BD
  $database->query(
    query: 
      "insert into movies (title, category, year_of_release, description, cover, user_id) 
      values (:title, :category, :year_of_release, :description, :cover, :user_id)",
    params: compact('title', 'category', 'year_of_release', 'description', 'cover', 'user_id')
  );

  unset($_FILES);
  unset($_POST);

  flash()->put('message', 'Filme adicionado com sucesso!');

  header('location: /myMovies');
  exit();
}

view("app", [], "movie-create");