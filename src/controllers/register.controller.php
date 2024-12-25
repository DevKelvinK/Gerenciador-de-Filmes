<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  $validation = Validation::validate([
    'nome' => ['required'],
    'email' => ['required', 'email', 'unique:users'],
    'senha' => ['required', 'min:8', 'max:30', 'strong']
  ], $_POST);
  
  // Armazenar valores do form na SESSION.
  flash()->put('formData', $_POST);

  if ($validation->notPassed('register')) {
    header('location: /login');
    exit();
  }

  $database->query(
    query: "insert into users ( name, email, password ) values ( :name, :email, :password )",
    params: [
      'name' => $_POST['nome'],
      'email' => $_POST['email'],
      'password' => password_hash($_POST['senha'], PASSWORD_BCRYPT),
    ]
  );

  flash()->put('message', 'Cadastro realizado com sucesso!');

  header('location: /login');
  exit();
}

header('location: /login');
exit();
