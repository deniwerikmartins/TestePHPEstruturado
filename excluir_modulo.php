<?php

try{
    $con = new PDO('mysql:host=localhost;dbname=teste','root','');
} catch (PDOException $exception){
    die("erro ao conectar ao banco de dados");
}

$id = $_GET["id"];

$query = $con->prepare("
    DELETE FROM modulos
    WHERE id = :id
");

$result = $query->execute([
    'id' => $id
]);

if ($result){
    header('Location: /listar-modulos.php');
} else if($query->errorCode() == "23000"){
    die("Não é possivel remover um módulo que contenha atividades associadas");
}




