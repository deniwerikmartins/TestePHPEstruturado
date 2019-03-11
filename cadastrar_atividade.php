<?php

try{
    $con = new PDO('mysql:host=localhost;dbname=teste','root','');
} catch (PDOException $exception){
    die("erro ao conectar ao banco de dados");
}

if(!isset($_POST["modulo"])){
    die("módulo não selecionado");
}

$id_do_modulo = $_POST["modulo"];
$titulo = $_POST["titulo"];
$descricao = $_POST["descricao"];

if (isset($_POST["status"])){
    $status = 1;
} else {
    $status = 0;
}

$query = $con->prepare("
    INSERT INTO atividades (id_do_modulo,titulo,descricao,status) VALUES (:id_do_modulo,:titulo,:descricao,:status)
");

$result = $query->execute([
    'id_do_modulo' => $id_do_modulo,
    'titulo' => $titulo,
    'descricao' => $descricao,
    'status' => $status
]);

if ($result){
    header('Location: /listar-atividades.php');
}




