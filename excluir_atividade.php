<?php

try{
    $con = new PDO('mysql:host=localhost;dbname=teste','root','');
} catch (PDOException $exception){
    die("erro ao conectar ao banco de dados");
}

$id = $_GET["id"];

$query = $con->prepare("
    DELETE FROM atividades 
    WHERE id = :id    
");

$result = $query->execute([
    'id' => $id
]);

if ($result){
    header('Location: /listar-atividades.php');
}




