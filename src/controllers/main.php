<?php

require_once './src/model.php';

$action = $_GET['action'] ?? null;

switch($action){
  case 'create':
    createNote();
    break;
  case 'update':
    break;
  case 'delete':
    break;
  default:
  return;
}

function main () {
  $notes = getAll();
  require_once './templates/main.php';
}