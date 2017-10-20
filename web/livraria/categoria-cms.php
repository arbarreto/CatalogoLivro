<?php include("conexao.php")?>
<?php include("nome-login.php")?>
<?php
	$categoria = "";
	
	$botao = "salvar";
	
	if(isset($_POST["btnsalvar"]))
	{	
		$botao = $_POST["btnsalvar"];
		$categoria = $_POST["txtcategoria"];
		
		if($botao == "salvar")
		{
			$sql = "insert into categoria (nome_categoria) ";
			$sql = $sql. "values('".$categoria."') ";
		}
		elseif($botao == "editar")
		{
			$sql = "update categoria set nome_categoria = '".$categoria."' ";
			$sql = $sql."where cod_categoria = ".$_SESSION['excluir_editar'] ;
		}
		mysqli_query($conexao, $sql);
		
		header("location:categoria-cms.php");
	}	
?>
<?php
	if(isset($_GET["modo"]))
	{
		$modo = $_GET["modo"];	
		$_SESSION['excluir_editar'] = $_GET["codigo"];
		
		if($modo == "excluir")
		{
			$sql = "delete from categoria where cod_categoria = ".$_SESSION['excluir_editar'];
			mysqli_query($conexao, $sql);
			header("location:categoria-cms.php");
		}
		elseif($modo == "editar")
		{
			$botao = "editar";
			$sql = "select * from categoria where cod_categoria = ".$_SESSION['excluir_editar']; 
			$select = mysqli_query($conexao, $sql);
					
			$rs = mysqli_fetch_array($select);
			
			$categoria = $rs["nome_categoria"];
		}
	}
?>
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
					<a href="adm-produtos.php"> &laquo; </a>
				</div>
				<div class="clear"> </div>
				<h2>Cadastro/Edição Categoria </h2>
				<div class="conteudo-categoria">
					<div class="cadastrar-categoria">
						<form action="categoria-cms.php" method="post">
							<p>	<label> Nome da Categoria </label> <input type="text" name="txtcategoria" maxlength="60" value="<?php echo($categoria)?>" required> </p>
							<p>	<input type="submit" name="btnsalvar" value="<?php echo($botao);?>"> </p> 
						</form>
					</div>
					<div class="visualiar-categoria">
						<table id="tabela-categoria">
							<tr class="tr-visualizacao">
								<td>Categorias</td>
							</tr>
							<?php
							
								$sql = "select * from categoria order by nome_categoria ";
								$select = mysqli_query($conexao, $sql);
									
								$contador = "";
								
								while($rs = mysqli_fetch_array($select))
								{
									if($contador %2==0) $cor="#474F59";
									else $cor="#5B6066";
						
							?>
									<tr class="tr-dois" bgcolor="<?php echo($cor)?>">
										<td> <?php echo($rs["nome_categoria"])?> </td>
										<td>
											<center>
												<div class="editar">
													<a href="categoria-cms.php?modo=editar&codigo=<?php echo($rs["cod_categoria"])?>"> 
														<img src="imagens/edit.png" alt="">
														Editar  
													</a>
												</div>
											</center>	
										</td>
										<td> 
											<center>
												<div class="excluir">
													<a href="categoria-cms.php?modo=excluir&codigo=<?php echo($rs["cod_categoria"])?>"> 
														<img src="imagens/delete.png" alt="">
														Excluir 
													</a>
												</div>	
											</center>
										</td>	
									</tr>
							<?php
									$contador++;
								}
							?>
						</table>
					</div>
				</div>
			</div>            
            <footer>
				<?php include("rodape-cms.html")?>
            </footer>
        </div>
	</body>
</html>