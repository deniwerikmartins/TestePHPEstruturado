<?php

date_default_timezone_set("America/Sao_Paulo");

try{
    $con = new PDO('mysql:host=localhost;dbname=teste','root','');
} catch (PDOException $exception){
    die("erro ao conectar ao banco de dados");
}

$id = $_POST["id"];
$id_do_modulo = $_POST["modulo"];
$titulo = $_POST["titulo"];
$descricao = $_POST["descricao"];
$alteracao = new DateTime("NOW");
$alteracao = $alteracao->format("Y-m-d H:i:s");

if (isset($_POST["status"])){
    $status = 1;
} else {
    $status = 0;
}

$query = $con->prepare("
    UPDATE atividades 
    SET id_do_modulo = :id_do_modulo, 
    titulo = :titulo,
    descricao = :descricao,
    data_de_alteracao = :alteracao,
    status = :status
    WHERE id = :id    
");

$result = $query->execute([
    'id_do_modulo' => $id_do_modulo,
    'titulo' => $titulo,
    'descricao' => $descricao,
    'alteracao' => $alteracao,
    'status' => $status,
    'id' => $id
]);

if ($result){
    header('Location: /listar-atividades.php');
}




