<?php

try{
    $host = "localhost:3306";
    $dbname = "notesdb";
    $user = "root";
    $password = "prout123=";
    $db = new PDO("mysql:host=$host;dbname=$dbname;charset=UTF8", "$user", "$password");
}catch(PDOException $e){
    throw new Error($e->getMessage());
}

function getAll(){
    global $db;

    $statement = $db->prepare("SELECT * FROM notes");
    $statement->execute();
    return $statement->fetchAll();
}

function getNote($id)
{
    global $db;

    $statement = $db->prepare("SELECT title, note FROM notes WHERE id = $id");
    $statement->execute();

    return $statement->fetchAll();
}

function createNote(){
    global $db;

    $statement = $db->prepare("INSERT INTO notes (title, note) VALUE (DEFAULT, DEFAULT)");
    $statement->execute();
}

function deleteNote($id){
    global $db;

    $statement = $db->prepare("DELETE FROM notes WHERE id = $id");
    $statement->execute();
}

function editNote($id, $title, $note){
    global $db;

    $statement = $db->prepare("UPDATE notes SET title = '$title', note = '$note' WHERE id = $id");
    $statement->execute();
}