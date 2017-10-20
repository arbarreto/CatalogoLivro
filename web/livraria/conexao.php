<?php
	session_start();
	
	$select="";
	$lista="";
	
	$_SESSION['ip_db'] = "localhost";
	$_SESSION ['usuario_db'] = "root";
	$_SESSION ['senha_db'] = "bcd127";
	$_SESSION ['db_utilizado'] = "db_livraria";
	
	//Conexão com o Banco de Dados MySQL
	//estabelece a conexão com a base de dados MySQL
	$conexao = mysqli_connect( $_SESSION['ip_db'], $_SESSION ['usuario_db'], $_SESSION ['senha_db'], $_SESSION ['db_utilizado']);

	if(! $conexao){ die("Connection failed: " . mysqli_connect_error()); }	
?>