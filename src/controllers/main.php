<?php

require_once './src/model.php';

$action = $_GET['action'] ?? null;
$id = $_GET['id'] ?? null;

$title = $_POST['title'] ?? null;
$note = $_POST['note'] ?? null;

switch($action){
  case 'create':
    createNote();
    break;
  case 'update':
    editNote($id, $title, $note);
    break;
  case 'delete':
    deleteNote($id);
    break;
  default:
  return;
}

function main () {
  $notes = getAll();
  require_once './templates/main.php';
}