<?php
    if ( ! isset ( $_SESSION['submarino']['id'] ) ) exit;

    if ( $_POST ) {
    	//recuperar os dados vindos do formulario
    	//echo "<prev>";
    	//print_r ( $_POST );

    	foreach ( $_POST as $key => $value ) {
    		//echo "<p>Key $key valor $value </p>";
    		$$key = trim ( $value );
    	}

    }

    include "libs/docs.php";

    //$email = "aa.com"; //para verificar se está validando o e-mail

    if ( empty( $nome ) ) {
    	$titulo = "Erro";
    	$mensagem = "Preencha o nome";
    	$icone = "error";
    	mensagem($titulo, $mensagem, $icone);
    	exit;
    } else if ( !filter_var($email, FILTER_VALIDATE_EMAIL) ) {
    	$titulo = "Erro";
    	$mensagem = "Digite um e-mail válido";
    	$icone = "error";
    	mensagem($titulo, $mensagem, $icone);
    	exit;
    } else if ( validaCpf($cpf) != 1 ) {
        //se não for verdadeiro
        $titulo = "Erro";
        $mensagem = validaCpf($cpf);
        $icone = "error";
        mensagem($titulo, $mensagem, $icone);
        exit;
    }

    //testando se está funciando as restrições de senha.
    //echo $validadeSenha = validarSenha($senha);

    //verificar se a senha foi digitada
    if ( !empty( $senha ) ) {
        //Validar senha - 8 letras 1 numero 1 especial
        $validarSenha = validarSenha($senha);

        if (! empty( $validarSenha ) ) {
            $titulo = "Erro";
            $mensagem = $validarSenha;
            $icone = "error";
            mensagem($titulo, $mensagem, $icone);
            exit;
        }
    }

    //verificar para fazer um insert ou update
    if ( empty( $id ) ) {

    	//criptografar a senha
    	$senha = password_hash($senha, PASSWORD_DEFAULT);

    	$sqlcli = "insert into cliente values ( NULL, :nome, :email, :senha, :cep, :logradouro, :numero, :complemento, :bairro, :cidade_id, :cpf, :dataNascimento, :celular)";
        $consulta = $pdo->prepare($sqlcli);
        $consulta->bindParam(":nome", $nome);
        $consulta->bindParam(":email", $email);
        $consulta->bindParam(":senha", $senha);
        $consulta->bindParam(":cep", $cep);
        $consulta->bindParam(":logradouro", $logradouro);
        $consulta->bindParam(":numero", $numero);
        $consulta->bindParam(":complemento", $complemento);
        $consulta->bindParam(":bairro", $bairro);
        $consulta->bindParam(":cidade_id", $cidade_id);
        $consulta->bindParam(":cpf", $cpf);
        $consulta->bindParam(":dataNascimento", $dataNascimento);
        $consulta->bindParam(":celular", $celular);


    } else if  ( !empty( $senha ) ) {
        //update com a senha
        $senha = password_hash($senha, PASSWORD_DEFAULT);
        $sql = "update cliente set nome = :nome, email = :email, senha = :senha, cep = :cep, logradouro = :logradouro, numero = :numero, complemento = :complemento, bairro = :bairro, cidade_id = :cidade_id, cpf = :cpf, dataNascimento = :dataNascimento, celular = :celular where id = :id limit 1";
        $consulta = $pdo->prepare($sqlcli);
        $consulta->bindParam(":nome", $nome);
        $consulta->bindParam(":email", $email);
        $consulta->bindParam(":senha", $senha);
        $consulta->bindParam(":cep", $cep);
        $consulta->bindParam(":logradouro", $logradouro);
        $consulta->bindParam(":numero", $numero);
        $consulta->bindParam(":complemento", $complemento);
        $consulta->bindParam(":bairro", $bairro);
        $consulta->bindParam(":cidade_id", $cidade_id);
        $consulta->bindParam(":cpf", $cpf);
        $consulta->bindParam(":dataNascimento", $dataNascimento);
        $consulta->bindParam(":celular", $celular);
        $consulta->bindParam(":id", $id);
    }

    else {
        //Update sem senha
        $sqlcli = "";
    }

    //VErificar qual SQL esta entrando primeiro
    //echo $sqlcli;
    //exit;

    //vereificar se executou
    if ( $consulta->execute() ) {
        $titulo = "Secesso";
        $mensagem = "Registro saldo com sucesso";
        $icone = "ok";
        mensagem($titulo, $mensagem, $icone);
        exit;
    } else {
        $titulo = "Erro";
        $mensagem = "Erro ao salvar registro";
        $icone = "erro";
        mensagem($titulo, $mensagem, $icone);
        exit;
    }
