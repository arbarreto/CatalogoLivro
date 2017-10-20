<?php
	session_start();

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
			<div class="menu_user">
				<a href="adm_livro.php"><img src="imagens/19-512.png" class="imgadm"/></a>
					<div class="titulo">
						<a href="adm_autor.php">Livros</a>
					</div>
			</div>
			<div class="menu_user">
				<a href="adm_categoria.php"><img src="imagens/120px-VisualEditor_-_Icon_-_Bullet-list-ltr.svg.png" class="imgadm"/></a>
					<div class="titulo">
						<a href="adm_categoria.php">Categorias</a>
					</div>
			</div>
			<div class="menu_user">
				<a href="adm_subcategoria.php"><img src="imagens/category-128.png" class="imgadm"/></a>
					<div class="titulo">
						<a href="adm_subcategoria.php">Sub Categorias</a>
					</div>
			</div>
			<div class="menu_user">
				<a href="adm_estatisticas.php"><img src="imagens/businessman118.png" class="imgadm"/></a>
					<div class="titulo">
						<a href="adm_estatisticas.php">Estatisticas</a>
					</div>
			</div>
		</div>
    </div>
	<footer class="rodape1">
       Desenvolvido por Amanda Rafaela Barreto de Melo
    </footer>
</body>
</html>
