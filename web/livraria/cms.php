<?php include("conexao.php")?>
<?php include("nome-login.php")?>
<!doctype html>
<html lang="pt-br">
	<head>
    	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>CMS -Sistema de Gerenciamento do Site</title>	
		<link rel="stylesheet" type="text/css" href="css/cssCms.css">
    </head>

	<body>
    	<div class="principal">
        	
            <?php include ("header.php")?>	
			
            <div class="conteudo-cms">
				
				<ul style="list-style-type:none;">
					<li> <a href="adm-conteudo.php"> adm conteúdo</a> </li>
					<li><a href="lojas-cms.php"> crud lojas </a> </li>
					<li><a href="autores-cms.php"> crud autores </a></li>
					<li><a href="autores-destaque-cms.php"> ativar/desativar autores destaque </a> </li>
					<li><a href="livro-mes-cms.php">ativar/desativar livro do mês </a> </li>
					<li><a href="admContato.php"> adm contato</a></li>
					<li><a href="adm-produtos.php"> adm produtos</a></li>
					<li><a href="livro-cms.php"> crud livro</a></li>
					<li><a href="categoria-cms.php"> crud categoria</a></li>
					<li><a href="subcategoria-cms.php"> crud subcategoria</a></li>
					<li><a href="grafico.php"> gráfico de produtos</a></li>
					<li><a href="admUsuario.php"> adm usuario</a></li>
					<li><a href="admCadUsua.php"> crud usuarios </a></li>
					<li><a href="admTipoUsua.php"> crud funções</a></li>
					
				</ul>
				
			</div>            
            <footer>
				<?php include("rodape-cms.html")?>
            </footer>
        </div>
	</body>
</html>
