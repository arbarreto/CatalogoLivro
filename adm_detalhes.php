<?php
	session_start();
	
	$conexao=mysql_connect("localhost", "root", "bcd127");
mysql_select_db("dblivraria");

		$linha=0;
			$cod=$_GET["cod"];

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
				<a href="adm_faleconosco.php"><img src="imagens/a-vector-illustration-of-a-wooden-sign-455498.jpg" class="img_voltar"/></a>
			</div>
			<table class="detalhes">
			<?php
				$sql="select * from tblfaleconosco where cod=".$cod;

				$select=mysql_query($sql);
				while($rs=mysql_fetch_array($select)){

			?>
			<tr class="corsim_cornao">
				<td>
					Nome:
				</td>
				<td>
					<?php echo($rs["nome"])?>
				</td >
				
			</tr>
			<tr>
				<td>
					Telefone:
				</td>
				<td>
					<?php echo($rs["tel"])?>
				</td >
				
			</tr>
			<tr class="corsim_cornao">
				<td>
					Celular:
				</td>
				<td>
					<?php echo($rs["cel"])?>
				</td >
				
			</tr>
			<tr>
				<td>
					E-mail:
				</td>
				<td>
					<?php echo($rs["email"])?>
				</td >
				
			</tr>
			<tr class="corsim_cornao">
				<td>
					Sexo:
				</td>
				<td>
					<?php echo($rs["sexo"])?>
				</td >
				
			</tr>
			<tr>
				<td >
					Profissão:
				</td>
				<td>
					<?php echo($rs["profissao"])?>
				</td >
				
			</tr>
			<tr class="corsim_cornao">
				<td>
					Home Page:
				</td>
				<td>
					<?php echo($rs["home"])?>
				</td >
				
			</tr>
			<tr>
				<td>
					Link Facebook:
				</td>
				<td>
					<?php echo($rs["link"])?>
				</td >
				
			</tr>
			<tr class="corsim_cornao">
				<td>
					<div class="td_info_suge">
					Informações do Produto:
					</div>
				</td>
				<td>
					<div class="td_info_suge">
					<?php echo($rs["info"])?>
					</div>
				</td >
				
			</tr>
			<tr>
				<td>
					<div class="td_info_suge">
					Sugestões:
					</div>
				</td>
				<td>
					<div class="td_info_suge">
					<?php echo($rs["suge"])?>
					</div>
				</td >
				
			</tr>
			<?php
					$linha++;
				}
			?>
		</table>
		</div>
    </div>
	<footer class="rodape1">
       Desenvolvido por Amanda Rafaela Barreto de Melo
    </footer>
</body>
</html>
