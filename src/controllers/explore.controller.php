<?php
$message = $_REQUEST['message'] ?? '';
$search = $_REQUEST['pesquisar'] ?? '';

if (!auth()) {
  abort(403, 'Você precisa estar logado para acessar essa página.');
}

// Armazenar valores do form na SESSION.
flash()->put('formData', $_POST);

$movies = $database->query(
  query: "select * from movies where title like :filter or category like :filter or year_of_release like :filter",
  class: Movie::class,
  params: ['filter' => "%$search%"]
)->fetchAll();

view('app', compact('message', 'movies', 'search'), 'explore');

// $fileAvatar = $_FILES['avatar'] ?? [''];

// if (!$fileAvatar) {
//   $newName = md5(rand());
//   $extension = pathinfo($fileAvatar['name'], PATHINFO_EXTENSION);
//   $dirAvatar = "images/covers/$newName.$extension";
//   move_uploaded_file($fileAvatar['tmp_name'], __DIR__ . '/../../public/assets/' . $dirAvatar);

//   //passar mensage que imagem foi carregada com sucesso.
// }