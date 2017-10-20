<?php
	session_start();
	$conexao=mysql_connect("localhost", "root", "bcd127");
mysql_select_db("dblivraria");
$linha = 0;
$status="Ativar";
if(isset($_GET["modo"])){
	
	$modo=$_GET["modo"];
		if ($modo=="excluir"){
			$cod = $_GET["codautor"];
			$sql="delete from tblautor where codautor=".$cod;
			
			//echo($sql);
			mysql_query($sql);

		}else if($modo=="status"){
			$cod = $_GET["codautor"];
			$sqlinativo="update tblautor set statusautor=0";
			mysql_query($sqlinativo);
			$sqlativo="update tblautor set statusautor='1' where codautor=".$cod;
			mysql_query($sqlativo);
			//header("location:adm_all_autor.php");
					
			
		}
}
?>

<!DOCTYPE html >
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
				<a href="adm_autor.php"><img src="imagens/a-vector-illustration-of-a-wooden-sign-455498.jpg" class="img_voltar"/></a>
			</div>
			<div class="all_autor">
				<table class="table_autor">
					<tr height="30px" class="cor">
					<td width="158" align="center">
						Nome
					</td>
					<td width="157" align="center">
						Descrição
					</td >
					<td width="157" align="center">
						Foto
					</td>
					<td width="158" align="center">
						Opção
					</td>
			</tr>
			<?php
				$sql="select * from tblautor
						order by codautor desc";
				$select=mysql_query($sql);
				while($rs=mysql_fetch_array($select)){
					$des=$rs["statusautor"];
					if($des==1){
						$status="Desativar";
					}else{
							$status="Ativar";
						}
				

			?>
			<tr height="30px" bgcolor="<?php if($linha % 2){ echo "#D8DFFA"; } else { echo "#FFFFFF"; } ?>">
				<td width="300" >
					<?php echo($rs["tituloautor"])?>
				</td>
				<td width="300">
					<div class="td_desc">
					<?php echo($rs["descricaoautor"])?>
					</div>
				</td >
				<td width="300">
					<img src="<?php echo($rs["fotoautor"])?>" class="foto_autor">
				</td>
				<td align="center" width="300">
					<a href="adm_cad_autor.php?modo=editar&codautor=<?php echo($rs["codautor"]) ?>"> Editar </a> | <a href="adm_all_autor.php?modo=excluir&codautor=<?php echo($rs["codautor"]) ?>">Excluir</a> 
					| <a href="adm_all_autor.php?modo=status&codautor=<?php echo($rs["codautor"]) ?>"><?php echo($status)?></a>
				</td>
			</tr>
			<?php
					$linha++;
				}
			?>
		</table>
			</div>
		</div>
    </div>
	<footer class="rodape1">
       Desenvolvido por Amanda Rafaela Barreto de Melo
    </footer>
</body>
</html>
