<?php include("conexao.php")?>
<?php include("nome-login.php")?>
<!doctype html>
<html lang="pt-br">
	<head>
    	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>CMS -Sistema de Gerenciamento do Site</title>
		
		<link rel="stylesheet" type="text/css" href="css/cssCms.css"/>
    </head>
	<body>
    	<div class="principal">

			<?php include ("header.php")?>
			
			<div class="conteudo-cms">
				
				<div class="voltar">
					<a href="cms.php"> &laquo; </a>
				</div>
				<div class="clear"> </div>
				
				<div class="height-center"> </div>
				
				<div class="padding-adm-conteudo"> </div>
			
				<div class="width">
					<a href="admCadUsua.php"> 
						<img src="imagens/add-usuario.png" alt="" title="">
						Cadastrar Usuário 
					</a>
				</div>
				<div class="width">
					<a href="admTipoUsua.php"> 
						<img src="imagens/hierarquia.png" alt="" title="">
						Cadastrar Função 
					</a>
				</div>
			
			</div>		
			<footer>
				<?php include("rodape-cms.html")?>
			</footer>
        </div>
	</body>
</html>