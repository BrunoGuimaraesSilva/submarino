<?php
	
	$servidor = "172.18.0.1";
	//usuario de conexao com o banco
	$usuario  = "root";
	//senha de conexao com o banco
	$senha    = "password";
	//nome do banco de dados
	$banco    = "app_development";
	$porta    = "3306";

	//$con - conexao(servidor, usuario, senha, banco)
	$con = mysqli_connect($servidor,$usuario,$senha,$banco,$porta) or die ("Erro ao conectar no banco. Erro: ".mysqli_connect_error());
	//configurando os caracteres da conexao
	mysqli_set_charset($con,"utf8");
	