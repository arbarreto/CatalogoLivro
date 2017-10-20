<?php
	session_start();
$conexao=mysql_connect("localhost", "root", "bcd127");
mysql_select_db("dblivraria");

	$nome="";
	$usuario="";
	$senha="";
	$consulta="";

		if(isset($_POST['btnok'])){

			$usuario=$_POST['txtusu'];
			$senha=$_POST['txtsenha'];
			

			$sql = "select coduser, nomeuser from tbluser where usuario='".$usuario."' and senha ='".$senha."'";
			$consulta=mysql_query($sql);
			$resultado=mysql_fetch_assoc($consulta);

				if($resultado){
					$_SESSION['nomeuser']=$resultado['nomeuser'];
					header("Location:loginadm.php");
				}else{
					echo'<script> alert ("Usuário ou Senha incorreto"); </script>';
				}
				
				mysql_close();
		}

?>