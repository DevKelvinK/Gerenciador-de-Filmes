<?php

function view($view, $data = [], $component = null) {
  foreach ($data as $key => $value) {
    $$key = $value;
  }

  require "../src/views/templates/index.template.php";
}

function input($type, $name, $placeholder, $classIcon, $form = '') { 
  
  require "../src/views/partials/_input.php";
}

function abort($code, $message)
{
  http_response_code($code);
  
  view("httpErrors", compact('code', 'message'));
  
  die();
}

function flash()
{
  return new Flash;
}

function auth() {
  if(! isset($_SESSION['auth'])) {
    return null;
  }
  
  return $_SESSION['auth'];
}

function config($key = null)
{
  $config = require 'config.php';

  if (strlen($key) > 0) {
    return $config[$key];
  }

  return $config;
}

// Debugging
function dump($dump) {
  echo '<pre class="text-red-500">';
  var_dump($dump);
  echo '</pre>';
}

function dd($dump)
{
  dump($dump);
  die();
}

function printLog($text, $var) {
  echo '<pre class="text-red-500">';
  echo $text;
  echo print_r($var);
  echo '</pre>';
}
