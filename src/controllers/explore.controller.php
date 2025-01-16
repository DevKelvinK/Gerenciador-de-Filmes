<?php

if (!auth()) {
  abort(403, 'Você precisa estar logado para acessar essa página.');
}

$message = $_REQUEST['message'] ?? '';

if ($_SERVER["REQUEST_METHOD"] == 'POST' && !isset($_POST["pesquisar"])) {
  $fileAvatar = $_FILES['avatar'];
  $user_id = auth()->id;

  $randomName = md5(rand());
  $extension = pathinfo($fileAvatar['name'], PATHINFO_EXTENSION);
  $newName =  "$randomName.$extension";
  move_uploaded_file($fileAvatar['tmp_name'], __DIR__ . '/../../public/assets/' . "images/avatares/$newName");

  $database->query(
    query: "update users set avatar = :avatar where id = :user_id;",
    params: [
      'avatar' => $newName,
      'user_id' => $user_id
    ]
  );

  $user = $database->query(
    query: "select * from users where id = :user_id",
    class: User::class,
    params: compact('user_id')
  )->fetch();

  $_SESSION['auth'] = $user;

  flash()->put('message', 'Avatar atualizado com sucesso!');

  unset($_FILES);
}

// Armazenar valores do form na SESSION.
flash()->put('formData', $_POST);

$search = $_REQUEST['pesquisar'] ?? '';

$movies = Movie::all($search);

view('app', compact('message', 'movies', 'search'), 'explore');
