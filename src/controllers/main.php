<?php

require_once './src/model.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
  $_POST = filter_input_array(INPUT_POST, [
    'id' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
    'title' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
    'note' => FILTER_SANITIZE_FULL_SPECIAL_CHARS
  ]);
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  $_GET = filter_input_array(INPUT_GET, [
    'action' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
    'id' => FILTER_SANITIZE_FULL_SPECIAL_CHARS
  ]);
}

$id = $_GET['id'] ?? null;

$id_secondary = $_POST['id'] ?? null;
$title = $_POST['title'] ?? null;
$note = $_POST['note'] ?? null;

$action = $_GET['action'] ?? null;

switch($action){
  case 'create':
    if($title && $note){
      create($title, $note);
      header('Location: /');
    }else{
      header('Location: /?error=EMPTY_FIELD');
    }
    break;
  case 'update':
    if ($id_secondary && $title && $note) {
      update($id_secondary, $title, $note);
      header('Location: /?mode=update');
    } else {
      header('Location: /?error=EMPTY_FIELD');
    }
    break;
  case 'delete':
    if ($id) {
    delete($id);
    header('Location: /?mode=delete');
    } else {
      header('Location: /?error=404');
    }
    break;
  default:
  return;
}

function main () {
  $notes = getAll();
  require_once './templates/main.php';
}