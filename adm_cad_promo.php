<?php
	session_start();
	
	$conexao=mysql_connect("localhost", "root", "bcd127");
mysql_select_db("dblivraria");

$modo="";
$nome="";
$dtinicio="";
$dtFinal="";
$botao="Cadastrar";

	if(isset($_POST['btncadastrar'])){
		$nome=$_POST['txtnome'];
		$dtinicio=$_POST['txtdtinicio'];
		$dtfinal=$_POST['txtdtfinal'];
		$operacao=$_POST["btncadastrar"];
		
		$_SESSION["cod"]=$_GET["codpromo"];
		if($operacao=="Cadastrar"){
		$sql="insert into tblpromocao (nomepromo, dtInicio, dtfinal) 
		values('".$nome."','".$dtinicio."','".$dtFinal."')";
		header("location:adm_insert_promo.php");
		}elseif($operacao=="Editar"){
			$sql="update tblpromocao set nomepromo='".$nome."', dtInicio='".$dtinicio."', dtfinal='".$dtfinal."' where codpromo='".$_SESSION["cod"]."'";
			header("location:adm_all_promo.php");
		}
		//echo($sql);
		mysql_query($sql);
		
	}
	if(isset($_GET["modo"])){
		$modo=$_GET["modo"];
	if($modo=="editar"){

			$_SESSION["cod"]=$_GET["codpromo"];
			$sql="select * from tblpromocao where codpromo=".$_SESSION["cod"];

			//echo($sql);
			
			$select=mysql_query($sql);
	
			$rsconsulta=mysql_fetch_array($select);
			
			$nome=$rsconsulta["nomepromo"];
			$dtinicio=$rsconsulta["dtInicio"];
			$dtFinal=$rsconsulta["dtFinal"];
			$botao="Editar";
			
		}
	} 
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Livraria Woody Woodpecker SA</title>
<link rel="icon" type="image/jpg" href="imagens/s.png" />
<link rel="stylesheet" type="text/css" href="css/style.css">
<script src="js/jquery11.js"></script>
</head>
<body>
	<header>
		<div>
			<img src="imagens/construcao.png" class="slide1"/>
        </div>
	</header>
    <div class="principal">
    	<div class="cabecalho">
			<div class="adm">
				<a href="adm_conteudo.php"><img src="imagens/320x320xdefault-avatar_0.png,qitok=0jZKd6f2.pagespeed.ic.M1QG-KQ9bS (1).png" class="imgadm"/></a>
					<div class="titulo">
						<a href="adm_conteudo.php">Adm. Conteúdo</a>
					</div>
			</div>
			<div class="adm">
				<a href="adm_faleconosco.php"><img src="imagens/operator_support_girl-128.png" class="imgadm"/></a>
					<div class="titulo">
						<a href="adm_faleconosco.php">Adm. Fale Conosco</a>
					</div>
			</div>
			<div class="adm">
				<a href="adm_produto.php"><img src="imagens/44322.png" class="imgadm"/></a>
					<div class="titulo">
						<a href="adm_produto.php">Adm. Produtos</a>
					</div>
			</div>
			<div class="adm">
				<a href="adm_user.php"><img src="imagens/advisors1.png" class="imgadm"/></a>
				<div class="titulo">
						<a href="adm_user.php">Adm. Usuários</a>
					</div>
			</div>
			<div class="bv">
				Bem vindo, <?php echo $_SESSION['nomeuser']; ?>
			</div>
			<div class="logout">
					<a href="home.php">Logout</a>
			</div>
		</div>
		<div class="fita">
		</div>
		<div class="consulta">
			<div>
				<a href="adm_promocao.php"><img src="imagens/a-vector-illustration-of-a-wooden-sign-455498.jpg" class="img_voltar"/></a>
			</div>
			<div class="cad_user">
				<form name="frmautor" method="post" action="">
					Nome da Promoção:</br>
					<input type="text" name="txtnome" value="<?php echo($nome) ?>" size="50" required class="form"></br>
					Data Inicial:</br>
					<input type="text" name="txtdtinicio" value="<?php echo($dtinicio) ?>" size="50" required class="form"></br>
					Data Final:</br>
					<input type="text" name="txtdtfinal" value="<?php echo($dtFinal) ?>" size="50" required class="form"></br>
					<input type="submit" name="btncadastrar" value="<?php echo($botao) ?>" class="btn">
				</form>
			</div>
		</div>
    </div>
	<footer class="rodape1">
       Desenvolvido por Amanda Rafaela Barreto de Melo
    </footer>
</body>
</html>
