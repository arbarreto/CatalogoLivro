<?php
	if(isset($_POST["btnok"]))
	{	
		$_SESSION['nome'] = $_POST["txtnome"];
		$_SESSION['senha'] = $_POST["txtsenha"];
		
		$sql = "select nome_login, senha from usuario where nome_login='".$_SESSION['nome']."' and senha='".$_SESSION['senha']."'"; 

		$select = mysqli_query($conexao ,$sql);
		
		if($lista = mysqli_fetch_array($select)){ header("location:cms.php"); }
		else{ ?> <script> alert("Usuário não Encotrado") </script> <?php }
	}
?>