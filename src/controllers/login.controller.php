<?php

$message = $_REQUEST['message'] ?? '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $email = $_POST['email'];
  $password = $_POST['senha'];

  $validation = Validation::validate([
    'email' => ['required', 'email'],
    'senha' => ['required']
  ], $_POST);

  // Armazenar valores do form na SESSION.
  flash()->put('formData', $_POST);

  if ($validation->notPassed('login')) {
    header('location: /login');
    exit();
  }

  $user = $database->query(
    query: "select * from users where email = :email",
    class: User::class,
    params: compact('email')
  )->fetch();

  if ($user) {
    $validation = Validation::validate([
      'senha' => ["passwordMatch:$user->password"]
    ], $_POST);

    if ($validation->notPassed('login')) {
      header('location: /login');
      exit();
    }

    $_SESSION['auth'] = $user;
    flash()->put('message', 'Seja bem-vindo, ' . "<span class='text-teal-500 capitalize'>$user->name</span>" . '!');
    header('location: /explore');
    exit();

  } else {

    $validation->addValidationMessage('senha', 'Email ou senha incorretos!');
    if ($validation->notPassed('login')) {
      header('location: /login');
      exit();
    }
  }
}

view("login");
