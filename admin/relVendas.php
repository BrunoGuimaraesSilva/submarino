<?php
	session_start();

	if ( ! isset ( $_SESSION['submarino']['id'] ) ) exit;
?>
<!DOCTYPE html>
<html>
<head>
	<title>Relatório de Vendas</title>
	<meta charset="utf-8">

	<!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    
	<link rel="stylesheet" type="text/css" href="css/sb-admin-2.min.css">
</head>
<body>
	<h1 class="text-center">Relatório de Vendas</h1>

	<a href="javascript:window.print()" class="btn btn-success float-right">
		<i class="fas fa-print"></i>
		Imprimir
	</a>

	<table class="table table-hover table-striped table-bordered">
		<thead>
			<th width="5%">ID</th>
			<th width="45%">Nome do Cliente</th>
			<th width="20%">Data</th>
			<th width="15%">Status</th>
			<th width="15%">Total</th>
		</thead>
	</table>
</body>
</html>
