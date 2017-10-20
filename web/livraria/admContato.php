<?php include("conexao.php")?>
<?php include("nome-login.php")?>
<?php	
		/******************/
		/**METODO DELETAR**/
		/******************/
	if(isset($_GET ["codigo"]))
	{
		if($_GET ["codigo"] != "")
		{
			$sql = "delete from contato where cod_contato = ".$_GET ["codigo"];
				
			mysqli_query($conexao, $sql);
				
			header("location:admContato.php");
		}
	}
?>
<!doctype html>
<html lang="pt-br">
	<head>
    	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>CMS -Sistema de Gerenciamento do Site</title>
		
		<link rel="stylesheet" type="text/css" href="css/cssCms.css"/> 
    </head>

	<body>
    	<div class="principalAdmContato">
		
			<?php include ("header.php")?>
			
			<div class="conteudo-cms-adm-contato">
				
				<div class="voltar">
					<a href="cms.php"> &laquo; </a>
				</div>
				<div class="clear"> </div>
				<h3> Consulta/Exclusão de Contatos </h3> 
				<div class="conteudo-adm-contato">
					
					<table class="tbl-visualizacao-contato">
						<tr class="tr-visualizacao">
							<td>Nome</td>
							<td>Sexo</td>
							<td>Profissão</td>
							<td>Telefone</td>
							<td>Celular</td>
							<td>Email</td>
							<td>Home Page</td>
							<td>Facebook</td>
							<td>Sugestões/Críticas</td>
							<td>Produtos</td>
						</tr>
						<?php
								
							$sql="select * from contato order by cod_contato desc";
								
							//Executa o select no banco e 
							//grava na variavel '$select' o resultado da busca
							$select = mysqli_query($conexao, $sql);
			
							//Extrutura de repetição, onde acontece a conversão do resultado obitido pelo
							//BD que foi armazenado na variável $select para um ARRAY, 
							//ou seja uma matriz
							$contador="";
							
							//Variavel rs=RecordSet
							//A variavel rs pega do BD e exibe os dados na tela
							while($rs = mysqli_fetch_array($select))
							{
								//Colorir as linhas 
								if($contador %2==0) $cor="#474F59";
								
								else $cor="#5B6066";
						?>
								<tr class="tr-dois-" bgcolor="<?php echo ($cor) ?>">
								
									<!-- as variaveis que virao do data base-->
									<td> <?php echo($rs["nome"]) ?> </td>
									<td> <?php echo($rs["sexo"]) ?> </td>
									<td> <?php echo($rs["profissao"]) ?> </td>
									<td> <?php echo($rs["telefone"]) ?> </td>
									<td> <?php echo($rs["celular"]) ?> </td>
									<td> <?php echo($rs["email"]) ?> </td>
									<td> <?php echo($rs["home"]) ?> </td>
									<td> <?php echo($rs["face"]) ?> </td>
									<td> <?php echo($rs["sugestoes"]) ?> </td>
									<td> <?php echo($rs["informacoes"]) ?> </td>
									<td>
										<!-- O caractere "?" coringa eh ultilizado para separar a URL das Variaveis -->
										<!-- A variavel codigo recebe o campo cod que vem do banco -->
										<div class="excluir">
											<a href="admContato.php?codigo=<?php echo($rs["cod_contato"]) ?>"> 
												<img src="imagens/delete.png" alt="">
												Excluir 
											</a>
										</div>			
									</td>
									
								</tr>
						<?php
								$contador++;
							}
						?>
					</table>
				</div>
					
			</div>
			<footer>
				<?php include("rodape-cms.html")?>
			</footer>
        </div>
	</body>
</html>