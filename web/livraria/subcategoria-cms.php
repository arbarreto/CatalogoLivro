<?php include("conexao.php")?>
<?php include("nome-login.php")?>
<?php
	$categoria ="";
	$subcategoria ="";
	
	$botao = "salvar";
	
	if(isset($_POST["btnsalvar"]))
	{
		$botao = $_POST["btnsalvar"];
		
		$categoria =$_POST["sltcategoria"];
		$subcategoria =$_POST["txtsubcategoria"];
		
		if($botao == "salvar")
		{
			$sql = "insert into subcategoria (nome_subcategoria, cod_categoria) ";
			$sql = $sql."values( '".$subcategoria."','".$categoria."') ";
		}		
		elseif($botao == "editar"){
	
			$sql = "update subcategoria set nome_subcategoria = '".$subcategoria."', cod_categoria = '".$categoria."' ";
			$sql = $sql."where cod_subcategoria = ".$_SESSION['excluir_editar'];
		}
		mysqli_query($conexao, $sql);
		header("location:subcategoria-cms.php");
	}
?>
<?php
	if(isset($_GET["modo"]))
	{	
		$modo = $_GET["modo"];
		
		$_SESSION['excluir_editar'] = $_GET["codigo"];
		
		if($modo == "excluir")
		{
			$sql = "delete from subcategoria where cod_subcategoria = ".$_SESSION['excluir_editar'];
			
			mysqli_query($conexao, $sql);
			header("location:subcategoria-cms.php");
		}
		elseif($modo == "editar")
		{
			$botao = "editar";
			
			$sql = "select * from subcategoria where cod_subcategoria = ".$_SESSION['excluir_editar'];
			
			
			$select = mysqli_query($conexao, $sql);
				
			$rs = mysqli_fetch_array($select);
			
			$subcategoria = $rs["nome_subcategoria"];
			$cod_categoria = $rs["cod_categoria"];
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
				<h2>Cadastro/Edição Subcategoria </h2>
				<div class="conteudo-categoria">
					<div class="cadastrar-subcategoria">
						<form action="subcategoria-cms.php" method="post">
							<p> 
								<label> Selecione Uma Categoria </label>
								<select name="sltcategoria">
									<option value="" selected > Selecione uma Categoria </option>
									<?php
										$itemselecionado="";
										
										$sql = "select * from categoria order by nome_categoria ";	
										$select = mysqli_query($conexao, $sql);
										
										while($rs = mysqli_fetch_array($select))
										{
											if ($rs["cod_categoria"]==$cod_categoria) { $itemselecionado = "selected"; } 
											else { $itemselecionado=""; }
									?>
											<option value="<?php echo($rs["cod_categoria"])?>" <?php echo($itemselecionado)?> > 
												<?php echo($rs["nome_categoria"])?> 
											</option>
									<?php
										}
										?>
								</select>
							</p>
							<p>	
								<label> Nome da Subcategoria </label> 
								<input type="text" name="txtsubcategoria" maxlength="60" value="<?php echo($subcategoria)?>" required> 
							</p>
							<p>	<input type="submit" name="btnsalvar" value="<?php echo($botao);?>"> </p> 
						</form>
					</div>
					<div class="subcategoria-visualizacao">
						<table class="tbl-visualizacao-subcategoria"> 
							<tr class="tr-visualizacao"> 
								<td> Categoria </td>
								<td> Subcategria </td>
							</tr>
						
							<?php
								$sql ="select "; 
								$sql = $sql."c.cod_categoria, c.nome_categoria as categoria, ";
								$sql = $sql."s.nome_subcategoria as subcategoria, s.cod_subcategoria ";
								$sql = $sql."from categoria as c ";
								$sql = $sql."inner join subcategoria as s ";
								$sql = $sql."on (c.cod_categoria = s.cod_categoria) ";
								$sql = $sql."order by nome_subcategoria ";  
								
								$select = mysqli_query($conexao, $sql);
										
								$contador = "";
									
								while($rs = mysqli_fetch_array($select))
								{
									if($contador %2==0) $cor="#474F59";
									else $cor="#5B6066";
							?>
									<tr class="tr-dois" bgcolor="<?php echo($cor)?>">
										<td> <?php echo($rs["categoria"])?> </td>
										<td> <?php echo($rs["subcategoria"])?> </td>
										<td>
											<center>
												<div class="editar">
													<a href="subcategoria-cms.php?modo=editar&codigo=<?php echo($rs["cod_subcategoria"])?>"> 
														<img src="imagens/edit.png" alt="">
														Editar  
													</a>
												</div>
											</center>	
										</td>
										<td> 
											<center>
												<div class="excluir">
													<a href="subcategoria-cms.php?modo=excluir&codigo=<?php echo($rs["cod_subcategoria"])?>"> 
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


