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

	$sql = "select "; 
	$sql = $sql."l.cod_livro, l.nome_livro, l.foto_livro, l.preco_livro, l.desc_livro, ";
    $sql = $sql."a.nome_autor "; 
	$sql = $sql."from livro as l ";
	$sql = $sql."inner join autor as a ";
	$sql = $sql."on (l.cod_autor = a.cod_autor) ";
	
	$select = mysqli_query($conexao, $sql);

	while($rs = mysqli_fetch_array($select))
	{
		//O COMANDO JSON_ENCODE TRANSFORMA O RESULTADO DO DB 
		//E O CONVERTE EM LISTA NO FORMATO JSON
		$json = json_encode($rs);
		
		echo $json ."<br><br>";
		
		/*
		echo $rs["nome_livro"];
		echo $rs["foto_livro"];
		echo $rs["preco_livro"];
		echo $rs["desc_livro"];
		echo $rs["nome_autor"];
		*/
	}
	
?>