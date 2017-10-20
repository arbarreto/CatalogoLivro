<?php include("conexao.php")?>
<?php include("nome-login.php")?>
<?php
	/**CADASTRAR/ EDITAR/ EXCLUIR USUÁRIOS**/
	$nome_funcao = "";
	
	//a variavel botao serve para diferenciar entre inserir e atualizar
	$botao = "salvar";
	
	if(isset($_POST["btnsalvar"]))
	{	
		$botao = $_POST["btnsalvar"];

		//Variaveis que vieram via POST no botao Salvar
		$nome_funcao = $_POST["txtFuncao"];
		
		if($botao == "salvar")
		{
			$sql = "insert into funcao(nome_funcao) ";
			$sql = $sql."values('".$nome_funcao."') ";
		}
		elseif($botao == "editar")
		{
			$sql = "update funcao set nome_funcao = '".$nome_funcao."' ";
			$sql = $sql."where cod_funcao = " .$_SESSION['codigo_deletar'] ;

		}
		mysqli_query($conexao, $sql);
		
		?> <!--script> alert("Cadastro Efetuado com Sucesso"); </script--> <?php
		header("location:admTipoUsua.php");
	}
	if(isset($_GET["modo"]))
	{
		//a variavel codigo_deletar recebe o que vem do link
		$_SESSION['codigo_deletar'] = $_GET["codigo"];
		
		$modo = $_GET["modo"];
		
		if($modo == "excluir")
		{
			//e preciso deletar algun tipo de relacionamento antes de deletar o principal
			//$sql = "delete from funcao_usuario where cod_funcao = ".$_SESSION['codigo_deletar'];
			
			$sql = "delete from funcao where cod_funcao = ".$_SESSION['codigo_deletar'];
			mysqli_query($conexao, $sql);
			
			header("location:admTipoUsua.php");
		}
		elseif($modo == "editar")
		{
			$botao = "editar";
			
			$sql = "select * from funcao where cod_funcao = ".$_SESSION['codigo_deletar'];
			
			$select = mysqli_query($conexao, $sql);
				
			$rs = mysqli_fetch_array($select);
			
			$nome_funcao = $rs["nome_funcao"];
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
					<a href="admUsuario.php"> &laquo; </a>
				</div>
				<div class="clear"> </div>
				<div class="admTipoUsuario">
					
					<h2> Cadastrar/Editar Função </h2>
					<form name="admtipoUser" method="post" action="admTipoUsua.php">
						<div class="cadastroTipoUsuario">
							<p>	<label> Nome Função </label> <input type="text" name="txtFuncao" maxlength="25" value="<?php echo($nome_funcao); ?>" required></p>
							<p>	<input type="submit" name="btnsalvar" value="<?php echo($botao);?>"> </p>
						</div>
					</form>	
					<div class="consultaTipoUsuario"> 
						<table class="tbl-tipo-usuario"> 
							<tr class="tr-visualizacao"> 
								<td> Função </td>
							</tr>
							<?php
								$sql = "select * from funcao order by nome_funcao ";
			
								$select = mysqli_query($conexao, $sql);
								
								$contador = "";
								
								while($rs = mysqli_fetch_array($select))
								{
									if($contador %2==0) $cor="#474F59";
							
									else $cor="#5B6066";
							?>
									<tr class="tr-dois" bgcolor="<?php echo($cor)?>">
										<td> <?php echo($rs["nome_funcao"])?> </td>
										<td>
											<center>
												<div class="editar">
													<a href="admTipoUsua.php?modo=editar&codigo=<?php echo($rs["cod_funcao"])?>"> 
														<img src="imagens/edit.png" alt="">
														Editar  
													</a>
												</div>
											</center>	
										</td>
										<td> 
											<center>
												<div class="excluir">
													<a href="admTipoUsua.php?modo=excluir&codigo=<?php echo($rs["cod_funcao"])?>"> 
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