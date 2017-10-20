<?php include("conexao.php")?>
<?php include("nome-login.php")?>
<?php
	$telefone = "";
	$email = "";
	$endereco = "";
	
	//a variavel botao serve para diferenciar entre inserir e atualizar
	$botao = "salvar";
	
	if(isset($_POST["btnsalvar"]))
	{
		$botao = $_POST["btnsalvar"];

		//upload_dir e a variavel que recebe o caminho da pasta onde os aquivos irao ser armazenados
		$upload_dir="arquivos/";
			
		$telefone = $_POST["txttelloja"];
		$email = $_POST["txtemail"];
		$endereco = $_POST["txtendereco"];
		
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
					$sql = "insert into lojas(foto_loja, telefone, email, endereco) ";
					$sql = $sql."values('".$upload_file."','".$telefone."','".$email."','".$endereco."') ";
				}		
				elseif($botao == "editar"){
			
					$sql = "update lojas set foto_loja = '".$upload_file."', telefone = '".$telefone."', email = '".$email."', endereco = '".$endereco."' ";
					$sql = $sql."where cod_loja = ".$_SESSION['excluir_editar'];
				}	
			}
			else { ?> <script> alert("Arquivo inválido.") </script> <?php }
		}
		mysqli_query($conexao, $sql);
					
		header("location:lojas-cms.php");
	}
?>
<?php 
	if(isset($_GET["modo"]))
	{
		$modo = $_GET["modo"];
		
		$_SESSION['excluir_editar'] = $_GET["codigo"];
		
		if($modo == "excluir")
		{
			$sql = "delete from lojas where cod_loja= ".$_SESSION['excluir_editar'];
			
			mysqli_query($conexao, $sql);
			
			header("location:lojas-cms.php");
		}
		elseif($modo == "editar")
		{
			$botao = "editar";
			
			$sql = "select * from lojas where cod_loja = ".$_SESSION['excluir_editar'];
			
			$select = mysqli_query($conexao, $sql);
				
			$rs = mysqli_fetch_array($select, MYSQLI_ASSOC);
			
			$foto_loja = $rs["foto_loja"];
			$telefone = $rs["telefone"];
			$email = $rs["email"];
			$endereco = $rs["endereco"];

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
				
				<div class="conteudo-lojas-cms">
					<h2> Cadastro de Lojas </h2> 
					<!-- Colocar enctype="multipart/form-data" no form senao nao ira funcionar-->
					<form name="lojas-cms" enctype="multipart/form-data" method="post" action="lojas-cms.php">
						
						<div class="loja-cadastro">
							
							<p> 
								<label> Escolha a foto:</label> 
								<input type="file" name="up_arquivo" value="<?php echo($foto_loja);?>">
								<label> Digite o telefone</label> 
								<input type="text" name="txttelloja" maxlength="10" value="<?php echo($telefone);?>">
							</p>
							<p>	
								<label> Digite o email</label> 
								<input type="text" name="txtemail" value="<?php echo($email);?>"> 
								<label> Digite o Endereco com numero</label> 
								<input type="text" name="txtendereco" value="<?php echo($endereco);?>"> 
							
								<input type="submit" name="btnsalvar" value="<?php echo($botao)?>" >
							</p>
						</div>
					</form>
					<div class="lojas-visualizacao">
						<table class="tbl-visualizacao"> 
							<tr class="tr-visualizacao"> 
								<td> Telefone </td>
								<td> Endereco </td>
								<td> Email </td>
								<td> Foto </td>
							</tr>
							<?php
								//a variavel sql recebe o select do banco
								//é otimo colocar espacos antes das aspas depois do final do comando
								$sql = "select * from lojas order by cod_loja desc";
									
								//echo($sql);
								$select = mysqli_query($conexao, $sql);
									
								$contador = "";
								
								while($rs = mysqli_fetch_array($select, MYSQLI_ASSOC))
								{
									if($contador %2==0) $cor="#474F59";
								
									else $cor="#5B6066";
							?>
									<tr class="tr-dois" bgcolor="<?php echo($cor)?>">
										<td> <?php echo($rs["telefone"]);?> </td>
										<td> <?php echo($rs["endereco"]);?> </td>
										<td> <?php echo($rs["email"]);?> </td>
										<td>
											<center> 
												<div class="img-lojas">
													<img src="<?php echo($rs["foto_loja"]);?>" alt="" title="" >
												</div>
											</center>
										</td>
										<td>
											<div class="editar">
												<a href="lojas-cms.php?modo=editar&codigo=<?php echo($rs["cod_loja"])?>">
													<img src="imagens/edit.png" alt="">
													Editar  
												</a>
											</div>		
										</td>
										<td> 
											<div class="excluir">
												<a href="lojas-cms.php?modo=excluir&codigo=<?php echo($rs["cod_loja"])?>"> 
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