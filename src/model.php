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

function createNote(){
    global $db;

    $statement = $db->prepare("INSERT INTO notes (title, note) VALUE (DEFAULT, DEFAULT)");
    $statement->execute();
}