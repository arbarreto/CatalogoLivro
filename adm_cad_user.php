<?php
	session_start();
	
	$conexao=mysql_connect("localhost", "root", "bcd127");
mysql_select_db("dblivraria");

$modo="";
$nome="";
$user="";
$senha="";
$tipo="";
$botao="Cadastrar";

if(isset($_GET["modo"])){
		$modo=$_GET["modo"];
	if($modo=="editar"){

			$_SESSION["cod"]=$_GET["coduser"];
			$sql="select * from tbluser where coduser=".$_SESSION["cod"];

			//echo($sql);
			
			$select=mysql_query($sql);
	
			$rsconsulta=mysql_fetch_array($select);
			
			$nome=$rsconsulta["nomeuser"];
			$user=$rsconsulta["usuario"];
			$senha=$rsconsulta["senha"];
			$tipo=$rsconsulta["codtipo"];
			$botao="Editar";
		}
	}
	
	if(isset($_POST['btncadastrar'])){
		$nome=$_POST['txtnome'];
		$user=$_POST['txtuser'];
		$senha=$_POST['txtsenha'];
		$tipo=$_POST['txtnivel'];
		$operacao=$_POST["btncadastrar"];
		
		if($operacao=="Cadastrar"){
		$sql="insert into tbluser (nomeuser, usuario, senha, codtipo) 
		values('".$nome."','".$user."','".$senha."','".$tipo."')";
		}elseif($operacao=="Editar"){
			$sql="update tbluser set nomeuser='".$nome."', usuario='".$user."', senha='".$senha."', codtipo='".$tipo."' where coduser='".$_SESSION["cod"]."'";
			//echo($sql);
		}
		mysql_query($sql);
		
		header("location:adm_all_user.php");
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
				<a href="adm_user.php"><img src="imagens/a-vector-illustration-of-a-wooden-sign-455498.jpg" class="img_voltar"/></a>
			</div>
			<div class="cad_user">
				<form name="frmuser" method="post" action="adm_cad_user.php">
					Nome:</br>
					<input type="text" name="txtnome" value="<?php echo($nome) ?>" size="50" required class="form"></br>
					Nome de Usuário:</br>
					<input type="text" name="txtuser" value="<?php echo($user) ?>" size="50" required class="form"></br>
					Senha:</br>
					<input type="password" name="txtsenha" value="<?php echo($senha) ?>" size="50" required class="form"></br>
					<?php $sql="select * from tbltipouser where codtipo>0 ";
								if($modo=="editar"){
									$sql= $sql."and codtipo <>".$tipo;
								}
							//echo($sql);	
						$select=mysql_query($sql);
					?>
					Nível:</br>
					<select name="txtnivel" class="select" required>
						<?php if($modo==""){?>
							<option value="" selected>  Selecione o Nível  </option>
							<?php while ($rs=mysql_fetch_array($select)){ ?>
							<option value="<?php echo($rs["codtipo"]); ?>" > <?php echo($rs["nometipo"]); ?> </option>
							<?php }
						}
							elseif($modo=="editar"){
								$sqleditar="select * from tbltipouser where codtipo=".$tipo."";
								$selecteditar=mysql_query($sqleditar);
							
								$rseditar=mysql_fetch_array($selecteditar);
							
							?>
								<option value="<?php echo($rseditar["codtipo"]); ?>" selected>  <?php echo($rseditar["nometipo"]); ?>  </option>
								<?php while ($rs=mysql_fetch_array($select)){ ?>
								<option value="<?php echo($rs["codtipo"]); ?>" > <?php echo($rs["nometipo"]); ?> </option>
								<?php }
								
							}?>
					</select></br></br>
					<input type="submit" name="btncadastrar" value="<?php echo($botao)?>" class="btn">
				</form>
			</div>
		</div>
    </div>
	<footer class="rodape1">
       Desenvolvido por Amanda Rafaela Barreto de Melo
    </footer>
</body>
</html>
