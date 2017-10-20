<?php include("conexao.php")?>
<?php include("nome-login.php")?>
<?php
	$cod_livro_mes = "";
	
	$botao = "salvar";
	
	if(isset($_POST["btnsalvar"]))
	{	
		$botao = $_POST["btnsalvar"];
		
		$cod_livro = $_POST["sltNomeLivro"];
		$cod_estatus = $_POST["sltAtribuir"];
			
		$sql = "select * from livro_mes where cod_livro_mes = ".$cod_livro." ";
		$sql = $sql ."and cod_estatus = ".$cod_estatus." ";
		$select = mysqli_query($conexao, $sql);
		
		if($botao == "salvar")
		{
			$sql = "insert into livro_mes (cod_livro, cod_estatus) ";
			$sql = $sql."values ('".$cod_livro."','".$cod_estatus."') ";
		}
		elseif($botao == "editar")
		{
			$sql = "update livro_mes set cod_estatus = '".$cod_estatus."' ";
			$sql = $sql . "where cod_livro_mes = ".$_SESSION['excluir_editar'];
		}
		mysqli_query($conexao, $sql);
		header("location:livro-mes-cms.php");
	}
?>
<?php
	$cod_livro_mes = "";
	
	if(isset($_GET["modo"]))		
	{	
		$modo = $_GET["modo"];
		
		$_SESSION['excluir_editar'] = $_GET["codigo"];
		
		if($modo == "excluir")
		{
			$sql = "delete from livro_mes where cod_livro_mes = ".$_SESSION['excluir_editar']; 
			
			mysqli_query($conexao, $sql);
			
			header("location:livro-mes-cms.php");
		}	
		elseif($modo == "editar")	
		{	
			$botao = "editar";
			
			$sql = "select "; 
			$sql = $sql."l.nome_livro , l.desc_livro, l.foto_livro, l.cod_livro as livroa , ";
			$sql = $sql."a.nome_autor, ";
			$sql = $sql."e.texto, ";
			$sql = $sql."m.cod_livro_mes, m.cod_estatus, m.cod_livro as livrom ";
			$sql = $sql."from livro as l ";
			$sql = $sql."inner join livro_mes as m ";
			$sql = $sql."on (l.cod_livro = m.cod_livro) ";
			$sql = $sql."inner join autor as a ";
			$sql = $sql."on (l.cod_autor = a.cod_autor) ";
			$sql = $sql."inner join estatus as e ";
			$sql = $sql."on (m.cod_estatus = e.cod_estatus) ";
			$sql = $sql."where m.cod_livro_mes = ".$_SESSION['excluir_editar'];
		
			$select = mysqli_query($conexao, $sql);
			
			$rs = mysqli_fetch_array($select);
			
			$cod_livro_mes = $rs["cod_livro_mes"];
			$cod_livro = $rs["livrom"];
			$cod_livro_a = $rs["livroa"];
			$nome_livro = $rs["nome_livro"];
			$cod_estatus = $rs["cod_estatus"];
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
				<div class="conteudo-livro-mes">
					
					<form name="livro-mes-cms" method="post" action="livro-mes-cms.php">
						<h2> Ativar/Desativar Livro Do Mês </h2>
						<div class="livro-mes-cadastro">
							<p> 
								<label> Selecione um Livro: </label> 
								<select name="sltNomeLivro"> 
									<option value="" > Selecione um Livro</option> 
										<?php
										
											$itemselecionado="";
											$sql = "select * from livro order by nome_livro ";
											
											$select = mysqli_query($conexao, $sql);
				
											while($rs = mysqli_fetch_array($select))
											{
												if ($rs["cod_livro"] == $cod_livro_a) { $itemselecionado = "selected"; } 
												else { $itemselecionado=""; }
										?>	
												<option value="<?php echo($rs["cod_livro"])?>" <?php echo($itemselecionado) ?>> 
													<?php echo($rs["nome_livro"])?> 
												</option> 
										<?php	
										   }
										?>		
								</select>
							</p>
							<p>
								<label>Atribuir</label> 
								<select name="sltAtribuir"> 
									<option value="" > Atibuir </option> 
										<?php
										
											$itemselecionado="";
											$sql = "select * from estatus ";
										
											$select = mysqli_query($conexao, $sql);
				
											while($rs = mysqli_fetch_array($select))
											{
												if ($rs["cod_estatus"]==$cod_estatus) { $itemselecionado = "selected"; } 
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
							<p> <input type="submit" name="btnsalvar" value="<?php echo ($botao)?>"> </p>
						</div>
						<div class="livro-mes-exibir">
							<table class="tbl-livro-mes-visualizacao"> 
								<tr class="tr-visualizacao"> 
									<td> Capa </td>
									<td> Titulo </td>
									<td> status </td>
								</tr>
								<?php
									//a variavel sql recebe o select do banco
									//é otimo colocar espacos antes das aspas depois do final do comando
									$sql = "select ";
									$sql = $sql ."m.cod_livro_mes, l.nome_livro, l.foto_livro, e.texto ";
									$sql = $sql ."FROM livro AS l ";
									$sql = $sql ."INNER JOIN livro_mes AS m ";
									$sql = $sql ."ON(m.cod_livro=l.cod_livro) ";
									$sql = $sql ."INNER JOIN estatus AS e ";
									$sql = $sql ."ON (e.cod_estatus=m.cod_estatus) ";
									$sql = $sql ."order by m.cod_estatus ;";
									
									$select = mysqli_query($conexao, $sql);
										
									$contador = "";
										
									while($rs = mysqli_fetch_array($select))
									{
										if($contador %2==0) $cor="#474F59";
								
										else $cor="#5B6066";
								?>
										<tr class="tr-dois" bgcolor="<?php echo($cor)?>">
											<td>
												<center> 
													<div class="img-livro">
														<img src="<?php echo($rs["foto_livro"]);?>" alt="" title=""/>
													</div>
												</center>
											</td>
											
											<td> <?php echo($rs["nome_livro"]);?> </td>
											
											<td> <?php echo($rs["texto"]);?></td>

											<td>
												<div class="editar">
													<a href="livro-mes-cms.php?modo=editar&codigo=<?php echo($rs["cod_livro_mes"])?>"> 
														<img src="imagens/edit.png" alt="">
														Editar  
													</a>
												</div>
											</td>
											<td>
												<div class="excluir">
													<a href="livro-mes-cms.php?modo=excluir&codigo=<?php echo($rs["cod_livro_mes"])?>"> 
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
				<?php include("rodape-cms.html")?>
			</footer>
        </div>
	</body>
</html>