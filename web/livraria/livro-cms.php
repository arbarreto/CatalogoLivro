<?php include("conexao.php")?>
<?php include("nome-login.php")?>
<?php
	$foto_livro = "";
	$nome_livro = "";
	$preco_livro = "";
	$cod_autor = "";
	$desc_livro = "";
	$cod_categoria = "";
	
	//a variavel botao serve para diferenciar entre inserir e atualizar
	$botao = "salvar";
	
	if(isset($_POST["btnsalvar"]))
	{
		$botao = $_POST["btnsalvar"];

		//upload_dir e a variavel que recebe o caminho da pasta onde os aquivos irao ser armazenados
		$upload_dir="arquivos/";
		
		$nome_livro = $_POST["txtlivro"];
		$preco_livro = $_POST["txtpreco"];
		$cod_autor = $_POST["sltNomeAutor"];
		$desc_livro = $_POST["txtdesclivro"];
		$cod_subcategoria = $_POST["sltsubcategoria"];
			
		$file_name=basename($_FILES["up_arquivo"]["name"]);
			
		//A variavel upload_file recebe o caminho de destino e o nome do arquivo 
		$upload_file = $upload_dir . $file_name;
			
		if(strstr($file_name,'.jpg') || strstr($file_name,'.jpeg') || strstr($file_name,'.gif') || strstr($file_name,'.png'))
		{
			//o comando move_uploaded_file copia o arquivo da maquina de usuario e coloca o mesmo no servidor 
			if(move_uploaded_file($_FILES["up_arquivo"]["tmp_name"],$upload_file))
			{
				if($botao == "salvar")
				{
					$sql = "insert into livro (foto_livro, nome_livro, preco_livro, cod_autor, desc_livro, cod_subcategoria) ";
					$sql = $sql."values('".$upload_file."','".$nome_livro."','".$preco_livro."','".$cod_autor."','".$desc_livro."', '".$cod_subcategoria."') ";
				}		
				elseif($botao == "editar"){
			
					$sql = "update livro set foto_livro = '".$upload_file."', nome_livro = '".$nome_livro."', ";
					$sql = $sql."preco_livro = '".$preco_livro."', cod_autor = '".$cod_autor."', desc_livro = '".$desc_livro."', cod_subcategoria = '".$cod_subcategoria."' ";
					$sql = $sql."where cod_livro = ".$_SESSION['excluir_editar'];
				}	
			}
			else { ?> <script> alert("Arquivo inválido.") </script> <?php }
		}
		mysqli_query($conexao, $sql);
		
		header("location:livro-cms.php");
	}
?>
<?php 
	if(isset($_GET["modo"]))
	{
		$modo = $_GET["modo"];
		
		$_SESSION['excluir_editar'] = $_GET["codigo"];
		
		if($modo == "excluir")
		{
			$sql = "delete from livro where cod_livro = ".$_SESSION['excluir_editar'];
			
			mysqli_query($conexao, $sql);
			
			$sql = "delete from livro where cod_livro = ".$_SESSION['excluir_editar'];
			
			mysqli_query($conexao, $sql);
			
			header("location:livro-cms.php");
		}
		elseif($modo == "editar")
		{
			$botao = "editar";
			
			$sql = "select * from livro where cod_livro = ".$_SESSION['excluir_editar'];
			
			$select = mysqli_query($conexao, $sql);
				
			$rs = mysqli_fetch_array($select);
			
			$nome_livro = $rs["nome_livro"];
			$preco_livro = $rs["preco_livro"];
			$desc_livro = $rs["desc_livro"];
			$cod_autor = $rs["cod_autor"];
			$cod_subcategoria = $rs["cod_subcategoria"];
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
				
				<div class="conteudo-livro-mes">
					
					<!-- Colocar enctype="multipart/form-data" no form senao nao ira funcionar-->
					<form name="livro-cms" enctype="multipart/form-data" method="post" action="livro-cms.php">
						<h2> Cadastrar/Editar livros</h2>
						<div class="livro-cadastro">
							<p> <label> Escolha a foto:</label> <input type="file" name="up_arquivo" value=""></p>
							<p>	<label> Nome do Livro:</label> <input type="text" name="txtlivro" maxlength="60" value="<?php echo($nome_livro)?>"></p>
								
							<p>	<label> Preço do Livro:</label> <input type="text" name="txtpreco" value="<?php echo($preco_livro)?>"> </p>
							
							<p> 
								<label> Selecione um Autor </label> 
								<select name="sltNomeAutor"> 
									<option value="" selected > Selecione um Autor </option>	
									<?php
										$itemselecionado="";
										
										$sql = "select * from autor order by nome_autor ";	
										$select = mysqli_query($conexao, $sql);
							
										while($rs = mysqli_fetch_array($select))
										{
											if ($rs["cod_autor"]==$cod_autor) { $itemselecionado = "selected"; } 
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
								<label> Selecione a subcategoria</label>
								<select name="sltsubcategoria">
									<option value="" selected> Selecione uma subcategoria </option>
									<?php
										$itemselecionado="";
										
										$sql = "select * from subcategoria order by nome_subcategoria ";
										$select = mysqli_query($conexao, $sql);
										
										while($rs = mysqli_fetch_array($select))
										{
											if($rs["cod_subcategoria"]==$cod_subcategoria) { $itemselecionado = "selected"; }
											else { $itemselecionado=""; }	
									?>
											<option value="<?php echo($rs["cod_subcategoria"])?>" <?php echo($itemselecionado)?> >
												<?php echo($rs["nome_subcategoria"]) ?>
											</option>	
									<?php
										}
									?>
								</select>	
								<input type="submit" id="botaosalvar" name="btnsalvar" value="<?php echo($botao)?>" />
							</p>
						</div>
						<div class="livro-cadastro">
							<p> <label> Descrição </label> <textarea name="txtdesclivro" cols="20" rows="4"> <?php echo($desc_livro) ?></textarea> </p>
						</div>
					</form>
					<div class="livro-visualizacao">
						<table class="tbl-visualizacao-livro"> 
							<tr class="tr-visualizacao"> 
								<td> Nome Livro </td>
								<td> Preco </td>
								<td> Autor </td>
								<td> Descrição </td>
								<td> Subcategoria </td>
								<td> Capa </td>
							</tr>
							<?php
								//a variavel sql recebe o select do banco
								//é otimo colocar espacos antes das aspas depois do final do comando
								$sql = "select l.cod_livro, l.foto_livro, l.nome_livro, l.desc_livro, l.preco_livro, ";
								$sql = $sql."a.cod_autor, a.nome_autor as nomeautor, ";	
								$sql = $sql."s.cod_subcategoria, s.nome_subcategoria ";	
								$sql = $sql."from livro as l ";	
								$sql = $sql."left join autor as a ";	
								$sql = $sql."on (l.cod_autor = a.cod_autor) ";	
								$sql = $sql."inner join subcategoria as s ";	
								$sql = $sql."on (l.cod_subcategoria = s.cod_subcategoria) ";	
								$sql = $sql."order by nome_livro ";	
						
								$select = mysqli_query($conexao, $sql);
									
								$contador = "";
									
								while($rs = mysqli_fetch_array($select))
								{
									if($contador %2==0) $cor="#474F59";
								
									else $cor="#5B6066";
							?>
									<tr class="tr-dois" bgcolor="<?php echo($cor)?>">
										<td> <?php echo($rs["nome_livro"])?> </td>
										<td> <?php echo($rs["preco_livro"])?> </td>
										<td> <?php echo($rs["nomeautor"])?> </td>
										<td> <?php echo($rs["desc_livro"])?> </td>
										<td> <?php echo($rs["nome_subcategoria"])?> </td>
										<td>
											<center> 
												<div class="img-livro">
													<img src="<?php echo($rs["foto_livro"]);?>" alt="" title=""/>
												</div>
											</center>
										</td>
										<td>
											<div class="editar">
												<a href="livro-cms.php?modo=editar&codigo=<?php echo($rs["cod_livro"])?>"> 
													<img src="imagens/edit.png" alt="">
													Editar  
												</a>
											</div>	
										</td>
										<td> 
											<div class="excluir">
												<a href="livro-cms.php?modo=excluir&codigo=<?php echo($rs["cod_livro"])?>"> 
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
			</div>
            <footer>
				<?php include("rodape-cms.html")?>
            </footer>
        </div>
	</body>
</html>