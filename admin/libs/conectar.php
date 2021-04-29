<?php

	//criar uma conexao com um banco - PDO
	//constante
	define('SERVER','172.18.0.2');
	define('BANCO', 'app_development');
	define('USUARIO', 'root');
	define('SENHA', 'password');
	define('PORTA', '3306');

	try {
		//tentar realizar a conexão
		$pdo = new PDO("mysql:host=".SERVER.";dbname=".BANCO.";charset=utf8;",USUARIO,SENHA,);
		//echo '<p>Conectou</p>';


	} catch (PDOException $erro) {
		echo '<p>Erro ao tentar conectar no banco de dados:</p>';
		//mostrar a mensagem de erro da conexao
		echo $erro->getMessage();
	}