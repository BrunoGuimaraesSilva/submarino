<?php
//iniciar a sessao
session_start();

//verificar se esta logado
if (!isset($_SESSION['submarino']['id'])) exit;

//recuperar os dados
$id = trim($_POST["id"] ?? NULL);
$cpf = trim($_POST["cpf"] ?? NULL);

//verificar se esta em branco
if ((empty($cpf))) {
    echo "CPF invalido";
    exit;
}

//conectar no banco
include "libs/conectar.php";

//sql para buscar cpf - nao pode ser do mesmo id
$sql = "select id from cliente where cpf = :cpf AND id <> :id limit 1";
$consulta = $pdo->prepare($sql);
$consulta->bindParam(":id", $id);
$consulta->bindParam(":cpf", $cpf);
$consulta->execute();

//recuperar os dados da consulta
$dados = $consulta->fetch(PDO::FETCH_OBJ);

//mostrar erro se trouxer algum resultado
if (!empty($dados->id)) {
    echo "Esse CPF ja esta cadastrado";
    exit;
}
