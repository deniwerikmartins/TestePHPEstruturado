<?php

try{
    $con = new PDO('mysql:host=localhost;dbname=teste','root','');
} catch (PDOException $exception){
    die("erro ao conectar ao banco de dados");
}

$titulo = $_POST["titulo"];
$descricao = $_POST["descricao"];

if (isset($_POST["status"])){
    $status = 1;
} else {
    $status = 0;
}

$modulo = $con->prepare("
    INSERT INTO modulos (titulo,descricao,status) VALUES (:titulo,:descricao,:status)
");

$result = $modulo->execute([
    'titulo' => $titulo,
    'descricao' => $descricao,
    'status' => $status
]);

if ($result){
    header('Location: /listar-modulos.php');
}




