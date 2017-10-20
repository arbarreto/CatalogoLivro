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
				
				<div class="voltar">
					<a href="cms.php"> &laquo; </a>
				</div>
				<div class="clear"> </div>
				
				<div class="conteudo-adm-conteudo">
					
					<div class="height-center"> </div>
					
					<div class="padding-adm-conteudo"> </div>
					<div class="width-adm-conteudo">
						<a href="lojas-cms.php"> 
							<img src="imagens/manutencao.png" alt="" title="">
							CRUD Lojas 
						</a>
					</div>
					<div class="width-adm-conteudo">
						<a href="autores-cms.php"> 
							<img src="imagens/manutencao.png" alt="" title="">
							CRUD Autor 
						</a>
					</div>
					<div class="width-adm-conteudo">
						<a href="autores-destaque-cms.php"> 
							<img src="imagens/autor-destaque.png" alt="" title="">
							Ativar/Desativar Autores Destaque
						</a>
					</div>
					<div class="width-adm-conteudo">
						<a href="livro-mes-cms.php"> 
							<img src="imagens/livro-mes.png" alt="" title="">
							Ativar/Destivar Livro Do Mês
						</a>
					</div>
				</div>	
            </div>
            
            <footer>
				<?php include("rodape-cms.html")?>
            </footer>
        </div>
        
	</body>
</html>
