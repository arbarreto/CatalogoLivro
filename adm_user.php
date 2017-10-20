<?php
	session_start();
	
	$conexao=mysql_connect("localhost", "root", "bcd127");
mysql_select_db("dblivraria");

		$linha = 0;
		
		if(isset($_GET["modo"])){
	
	$modo=$_GET["modo"];
	
		if ($modo=="excluir"){
			$cod = $_GET["cod"];
			$sql="delete from faleconosco where cod=".$cod;
			mysql_query($sql);
			
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
			<div class="menu_user">
				<a href="adm_cad_user.php"><img src="imagens/Register-512.png" class="imgadm"/></a>
					<div class="titulo">
						<a href="adm_cad_user.php">Cadastrar Novo</a>
					</div>
			</div>
			<div class="menu_user">
				<a href="adm_all_user.php"><img src="imagens/people-multiple-magnify-512-000000.png" class="imgadm"/></a>
					<div class="titulo">
						<a href="adm_all_user.php">Todos Usuários</a>
					</div>
			</div>
			<div class="menu_user">
				<a href="adm_cad_nivel.php"><img src="imagens/092024-glossy-black-icon-signs-first-aid.png" class="imgadm"/></a>
					<div class="titulo">
						<a href="adm_all_user.php">Adicionar Nível</a>
					</div>
			</div>
			<div class="menu_user">
				<a href="adm_all_nivel.php"><img src="imagens/1461621750_icon-40-clipboard-list.png" class="imgadm"/></a>
					<div class="titulo">
						<a href="adm_all_user.php">Todos Niveis</a>
					</div>
			</div>
			</div>
		</div>
    </div>
	<footer class="rodape1">
       Desenvolvido por Amanda Rafaela Barreto de Melo
    </footer>
</body>
</html>
