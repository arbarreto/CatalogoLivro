<?php
	$sql = "select nome_usuario, nome_login, senha from usuario where nome_login='".$_SESSION['nome']."' and senha='".$_SESSION['senha']."'";

	$select = mysqli_query($conexao ,$sql);

	$lista = mysqli_fetch_array($select);
		
	if ($_SESSION['nome'] == "" || $_SESSION['senha'] == "" ){ header("location:index.php"); }
	
	$nome_aparecer = $lista['nome_usuario'];
	
	$adm = 1;
	$ct = 2;
	$op = 3;
	
?>