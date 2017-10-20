<?php include("conexao.php")?>
<?php include("nome-login.php")?>
<?php
		##MODO SALVAR
	$cod_autor_destaque	= "";

	$botao = "salvar";
		
	if(isset($_POST["btnsalvar"]))
	{
		$botao = $_POST["btnsalvar"];
		
		$cod_autor = $_POST["sltNomeAutor"];
		$cod_estatus = $_POST["sltEstatus"];

		$sql = "select * from autores_destaque where cod_autor_destaque = ".$cod_autor.""; 
		$sql = $sql." and cod_estatus = ".$cod_estatus." ";	
		$select = mysqli_query($conexao, $sql);
				
		
		if($botao == "salvar")
		{	
			$sql = "insert into autores_destaque (cod_autor, cod_estatus) ";
			$sql = $sql."values ('".$cod_autor."','".$cod_estatus."') ";
		}
		elseif($botao == "editar")
		{
			$sql = "update autores_destaque set cod_estatus = '".$cod_estatus."' ";
			$sql = $sql . "where cod_autor_destaque = ".$_SESSION['excluir_editar'];
		}
		mysqli_query($conexao, $sql);
		header("location:autores-destaque-cms.php");
	}
?>
<?php
	if(isset($_GET["modo"]))
	{
		$modo = $_GET["modo"];
		
		$_SESSION['excluir_editar'] = $_GET["codigo"];
		
		if($modo == "excluir")
		{
			$sql = "delete from autores_destaque where cod_autor_destaque = ".$_SESSION['excluir_editar'];
					
			mysqli_query($conexao, $sql);
				
			header("location:autores-destaque-cms.php");
		}
		elseif($modo == "editar")
		{
			$botao = "editar";
			
			$sql = "select ";
			$sql = $sql."a.cod_autor as autora, a.nome_autor, ";
			$sql = $sql."d.cod_autor_destaque, d.cod_autor as autord, d.cod_estatus ";
			$sql = $sql."from autor as a ";
			$sql = $sql."inner join autores_destaque as d ";
			$sql = $sql."on (a.cod_autor = d.cod_autor) ";
			$sql = $sql."where d.cod_autor_destaque = ".$_SESSION['excluir_editar'];

			$select = mysqli_query($conexao, $sql);
				
			$rs = mysqli_fetch_array($select, MYSQLI_ASSOC);
			
			$cod_autor_destaque = $rs["cod_autor_destaque"];
			$cod_autor = $rs["autord"];
			$cod_autor_a = $rs["autora"];
			$cod_estatus = $rs["cod_estatus"];
			$nome_autor = $rs["nome_autor"];
			echo $cod_autor;
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
    	<div class="principal">

			<?php include ("header.php")?>
			
			<div class="conteudo-cms">
				<div class="voltar">
					<a href="adm-conteudo.php"> &laquo; </a>
				</div>
				<div class="clear"> </div>
				<div class="autores-destaque">
					<h2> Ativar e Desativar Autores em Destaque </h2>
					<form name="autores-destaque-cms" method="post" action="autores-destaque-cms.php">
						<div class="largura">
							<center> <span class="span-"> <?php echo ($botao)?> </span> </center>
							<p>
								<label>Selecione um autor</label> 
								<select name="sltNomeAutor"> 
										<option value="" > Selecione um Autor </option>
										<?php
											$itemselecionado="";
											$sql = "select * from autor order by nome_autor";
											
											$select = mysqli_query($conexao, $sql);
				
											while($rs = mysqli_fetch_array($select, MYSQLI_ASSOC))
											{
												if ($rs["cod_autor"] == $cod_autor_a) { $itemselecionado = "selected"; }
												else { $itemselecionado=""; }
										?>		
												<option value="<?php echo($rs["cod_autor"])?>" <?php echo($itemselecionado)?> > 
													<?php echo($rs["nome_autor"])?> 
												</option> 
										<?php
										   }
										?>	
								</select>
							</p>
							
							<p>
								<label>Atribuir</label>
								<select name="sltEstatus">
									<option value="" selected > Atibuir </option> 
										<?php
											$itemselecionado="";
											$sql = "select * from estatus ";
										
											$select = mysqli_query($conexao, $sql);
				
											while($rs = mysqli_fetch_array($select, MYSQLI_ASSOC))
											{
												if ($rs["cod_estatus"] == $cod_estatus) { $itemselecionado = "selected"; } 
												else { $itemselecionado=""; }
										?>	
												<option value="<?php echo($rs["cod_estatus"])?>" <?php echo($itemselecionado) ?>> 
													<?php echo($rs["texto"])?> 
												</option> 
										<?php	
										   }
										?>	
								</select>		
							</p>
							<p><input type="submit" name="btnsalvar" value="<?php echo ($botao)?>"> </p>
							
						</div>
					
						<div class="largura">
							<h3> Autores em destaque cadastrados e status</h3>
							<table class="tbl-autores-destaque-cadastrados"> 
								<tr class="tr-visualizacao"> 
									<td> Nome do Autor </td>
									<td> status </td>
								</tr>
								<?php
									//a variavel sql recebe o select do banco
									//é otimo colocar espacos antes das aspas depois do final do comando
									$sql = "select ";
									$sql = $sql . "a.nome_autor as autor, ";
									$sql = $sql . "ad.cod_autor_destaque, ";
									$sql = $sql . "e.cod_estatus, e.texto as texto ";
									$sql = $sql . "from autor as a ";
									$sql = $sql . "inner join autores_destaque as ad ";
									$sql = $sql . "on (a.cod_autor = ad.cod_autor) ";
									$sql = $sql . "inner join estatus as e ";
									$sql = $sql . "on (ad.cod_estatus = e.cod_estatus) order by cod_estatus ";
										
									//echo($sql);
									$select = mysqli_query($conexao, $sql);
										
									$contador = "";
										
									while($rs = mysqli_fetch_array($select, MYSQLI_ASSOC))
									{
										if($contador %2==0) $cor="#474F59";
								
										else $cor="#5B6066";
								?>
										<tr class="tr-dois" bgcolor="<?php echo($cor)?>">
											<td> <?php echo($rs["autor"]);?> </td>
											
											<td> <?php echo($rs["texto"]);?></td>
										
											<td>
												<div class="editar">
													<a href="autores-destaque-cms.php?modo=editar&codigo=<?php echo($rs["cod_autor_destaque"])?>"> 
														<img src="imagens/edit.png" alt="">
														Editar  
													</a>
												</div>
											</td>
											<td>
												<div class="excluir">
													<a href="autores-destaque-cms.php?modo=excluir&codigo=<?php echo($rs["cod_autor_destaque"])?>"> 
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
					</form>	
				</div>
			</div>	
			<footer>
				Desenvolvido por Diego Sena
			</footer>
        </div>
	</body>
</html>