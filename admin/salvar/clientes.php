<?php
session_start();
include "libs/docs.php";
//verificar se esta logado
if (!isset($_SESSION['submarino']['id'])) exit;

if ($_POST) {
    foreach ($_POST as $key => $value) {

        $$key = trim($value);

        if (empty($nome)) {

            $titulo = "Erro";
            $mensagem = "Preencha o nome";
            $icone = "error";
            mensagem($titulo, $mensagem, $icone);

            exit;
        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $titulo = "Erro";
            $mensagem = "Digite um E-mail valido";
            $icone = "error";
            mensagem($titulo, $mensagem, $icone);
            exit;
        }

        if (empty($id)) {

            $senha = password_hash($senha, PASSWORD_DEFAULT);

            $sql = "
            INSERT INTO clientes 
            VALUES(
                NULL,
                :nome,
                :email,
                :senha,
                :cep,
                :logradouro,
                :numero,
                :complemento,
                :bairro,
                :cidade_id,
                :cpf,
                :dataNascimento,
                :celular
            )
            ";

            $consulta = $pdo->prepare($sql);
            $consulta->bindParam(":nome", $nome);
            $consulta->bindParam(":email", $email);
            $consulta->bindParam(":cep", $cep);
            $consulta->bindParam(":logradouro", $logradouro);
            $consulta->bindParam(":numero", $numero);
            $consulta->bindParam(":complemento", $complemento);
            $consulta->bindParam(":bairro", $bairro);
            $consulta->bindParam(":cidade_id", $cidade_id);
            $consulta->bindParam(":cpf", $cpf);
            $consulta->bindParam(":dataNascimento", $dataNascimento);
            $consulta->bindParam(":celular", $celular);
            $consulta->execute();
        }
    }
}
