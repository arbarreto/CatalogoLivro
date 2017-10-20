<?php include("conexao.php")?>
<?php include("nome-login.php")?>
<?php 
	$nome_autor = "";
	$dt_nasc = "";
	$bibliografia = "";
	
	//a variavel botao serve para diferenciar entre inserir e atualizar
	$botao = "salvar";
	
	if(isset($_POST["btnsalvar"]))
	{
		$botao = $_POST["btnsalvar"];

		//upload_dir e a variavel que recebe o caminho da pasta onde os aquivos irao ser armazenados
		$upload_dir="arquivos/";
			
		$nome_autor = $_POST["txtnomeautor"];
		$dt_nasc = $_POST["txtdtnascautor"];
		$bibliografia = $_POST["txtbibliografia"];
		
		//O comando FILES pega o arquivo selecionado
		/*
			o comando BASENAME seleciona so o nome do aquivo 
			ou seja impede que venha o complemento do mesmo
			Ex: c:\user\desktop\imagem.jpg
			ultilizando BASENAME ele retorna "imagem.jpg"
		*/
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
					$sql = "insert into autor(nome_autor, foto_autor, dt_nasc, bibliografia) ";
					$sql = $sql."values('".$nome_autor."','".$upload_file."','".$dt_nasc."','".$bibliografia."') ";
					
				}		
				elseif($botao == "editar"){
			
					$sql = "update autor set nome_autor = '".$nome_autor."', foto_autor = '".$upload_file."', dt_nasc = '".$dt_nasc."', bibliografia = '".$bibliografia."' ";
					$sql = $sql."where cod_autor = ".$_SESSION['excluir_editar'];
				}	
			}
			else { ?> <script> alert("Arquivo inválido.") </script> <?php }
		}
		mysqli_query($conexao, $sql);			
		header("location:autores-cms.php");
	}
?>
<?php
	if(isset($_GET["modo"]))
	{
		$modo = $_GET["modo"];
		
		$_SESSION['excluir_editar'] = $_GET["codigo"];
		
		if($modo == "excluir")
		{
			$sql = "delete from autor where cod_autor= ".$_SESSION['excluir_editar'];
			
			mysqli_query($conexao, $sql);
			
			header("location:autores-cms.php");
		}
		elseif($modo == "editar")
		{
			$botao = "editar";
			
			$sql = "select * from autor where cod_autor = ".$_SESSION['excluir_editar'];
			
			$select = mysqli_query($conexao, $sql);
				
			$rs = mysqli_fetch_array($select, MYSQLI_ASSOC);
			
			$nome_autor = $rs["nome_autor"];
			$dt_nasc = $rs["dt_nasc"];
			$bibliografia = $rs["bibliografia"];
			$foto_autor = $rs["foto_autor"];
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
					<a href="adm-conteudo.php"> &laquo; </a>
				</div>
				<div class="clear"> </div>
				
				<div class="conteudo-autores-cms">
					<h2> Cadastro de Autores </h2>
					<form name="autores-cms" enctype="multipart/form-data" method="post" action="autores-cms.php">
						<div class="autores-cadastro">
							<p> <label> Escolha a foto:</label> <input type="file" name="up_arquivo" value="<?php echo($foto_autor);?>"></p>
							<p> <label> Nome do Autor: </label> <input type="text" name="txtnomeautor" maxlength="60" value="<?php echo($nome_autor);?>" required> </p>
							<p>	<label> Data de nascimento:</label> <input type="text" name="txtdtnascautor" maxlength="60" value="<?php echo($dt_nasc);?>"></p>			
						</div>
						<div class="autores-cadastro">
							<p> 
								<label> Bibliografia: </label> <textarea name="txtbibliografia" cols="20" rows="4"> <?php echo($bibliografia) ?></textarea>
								<input type="submit" name="btnsalvar" value="<?php echo($botao);?>" /> </p>
						</div>
					</form>
					<div class="autores-visualizacao">
						<table class="tbl-visualizacao-a"> 
							<tr class="tr-visualizacao"> 
								<td> Nome do Autor </td>
								<td> Data de Nascimento </td>
								<td> Bibliografia </td>
								<td> Foto </td>
							</tr>
							<?php
								//a variavel sql recebe o select do banco
								//é otimo colocar espacos antes das aspas depois do final do comando
								$sql = "select * from autor order by nome_autor";
									
								//echo($sql);
								$select = mysqli_query($conexao, $sql);
									
								$contador = "";
									
								while($rs = mysqli_fetch_array($select))
								{
									if($contador %2==0) $cor="#474F59";
								
									else $cor="#5B6066";
							?>
									<tr class="tr-dois" bgcolor="<?php echo($cor)?>">
										<td> <?php echo($rs["nome_autor"]);?> </td>
										<td> <?php echo($rs["dt_nasc"]);?> </td>
										<td> <?php echo($rs["bibliografia"]);?> </td>
										<td>
											<center> 
												<div class="img-autores">
													<img src="<?php echo($rs["foto_autor"])?>" alt="" title=""/>
												</div>
											</center>
										</td>
										<td>
											<div class="excluir">
												<a href="autores-cms.php?modo=editar&codigo=<?php echo($rs["cod_autor"])?>"> 
													<img src="imagens/edit.png" alt="">
													Editar  
												</a>
											</div>
										</td>
										<td> 
										<div class="editar">	
											<a href="autores-cms.php?modo=excluir&codigo=<?php echo($rs["cod_autor"])?>"> 
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
