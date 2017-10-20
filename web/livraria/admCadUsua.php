<?php include("conexao.php")?>
<?php include("nome-login.php")?>
<?php
	$nome = "";
	$login = "";
	$senha = "";
	
	//a variavel botao serve para diferenciar entre inserir e atualizar
	$botao = "salvar";
	
	if(isset($_POST["btnsalvar"]))
	{	
		$botao = $_POST["btnsalvar"];
		
		//Variaveis que vieram via POST no botao Salvar
		$nome = $_POST["txtNameUser"];
		$user = $_POST["txtUserName"];
		$senha = $_POST["txtUserSenha"];
		$senha_con = $_POST["txtUserSenhaCon"];
		$funcao = $_POST["sltFuncaoUsuario"];
		
		if($senha != $senha_con)
		{
			?> <script> alert("As senhas não conferem") </script> <?php
		}
		else
		{	
			if($botao == "salvar")
			{
				$sql = "insert into usuario(nome_usuario, nome_login, senha, cod_funcao) ";
				$sql = $sql."values('".$nome."','".$user."','".$senha."','".$funcao."' ) "; 
			}
			elseif($botao == "editar")
			{
				$sql = "update usuario set nome_usuario = '".$nome."', nome_login = '".$user."', senha = '".$senha."',cod_funcao = '".$funcao."' "; 
				$sql = $sql." where cod_usuario = ".$_SESSION['excluir_editar'];
				
			}
			mysqli_query($conexao, $sql);
			
			?><!--script> alert("Cadastro Efetuado com Sucesso"); </script--><?php
			header("location:admCadUsua.php");
		}
	}
	if(isset($_GET["modo"]))
	{
		$modo = $_GET["modo"];
		
		$_SESSION['excluir_editar'] = $_GET["codigo"];
		
		if($modo == "excluir")
		{
			$sql = "delete from usuario where cod_usuario= ".$_SESSION['excluir_editar'];
			
			mysqli_query($conexao, $sql);
			
			header("location:admCadUsua.php");
		}
		elseif($modo == "editar")
		{
			$botao = "editar";
			
			$sql = "select * from usuario where cod_usuario = ".$_SESSION['excluir_editar'];
			
			$select = mysqli_query($conexao, $sql);
				
			$rs = mysqli_fetch_array($select);
			
			$nome = $rs["nome_usuario"];
			$login = $rs["nome_login"];
			$senha = $rs["senha"];
			$codfuncao = $rs["cod_funcao"];

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
				
				<div class="admCadastroUsuario">
					
					<h2> Cadastrar/Editar Usuário </h2>
					<form name="admCadUser" method="post" action="admCadUsua.php">
						
						<div class="cadastroUsuario">
							<p> <label> Nome: </label> <input type="text" name="txtNameUser" maxlength="60" value="<?php echo($nome);?>" required> </p>
							<p>	<label> Nome De usuário: </label> <input type="text" name="txtUserName" maxlength="20" value="<?php echo($login);?>" required> </p> 
							<p>
								<label>Selecione uma Função </label> 
								<select name="sltFuncaoUsuario"> 
									<option value="" > Selecione uma Função </option> 
										<?php
										
											$itemselecionado="";
											$sql = "select * from funcao order by nome_funcao ";
										
											$select = mysqli_query($conexao, $sql);
				
											while($rs = mysqli_fetch_array($select))
											{
												if ($rs["cod_funcao"]==$codfuncao) { $itemselecionado = "selected"; } 
												else { $itemselecionado=""; }
										?>	
												<option value="<?php echo($rs["cod_funcao"])?>" <?php echo($itemselecionado) ?>> 
													<?php echo($rs["nome_funcao"])?> 
												</option> 
										<?php	
										   }
										?>	
								</select>
								
							</p>
						</div>
						<div class="cadastroUsuario"> 
							
							<p>	<label> Digite sua Senha: </label> <input type="password"  maxlength="10" name="txtUserSenha" value="<?php echo($senha);?>" required> </p>
							<p>	<label> Digite sua Senha Novamente: </label> <input type="password"  maxlength="10" value="<?php echo($senha);?>" name="txtUserSenhaCon" required> </p>
							<p> <input type="submit" name="btnsalvar" value="<?php echo($botao);?>"> </p>
						</div>
						<div class="consultaUsuario"> 
							<table class="tbl-usuario"> 
								<tr class="tr-visualizacao"> 
									<td> Nome </td>
									<td> Nome de Usuário </td>
									<td> Função </td>
								</tr>
								<?php
									//a variavel sql recebe o select do banco
									//é otimo colocar espacos antes das aspas depois do final do comando
									$sql = "select ";
									$sql = $sql."u.cod_usuario, u.nome_usuario, u.nome_login, ";
									$sql = $sql."f.nome_funcao ";
									$sql = $sql."from usuario as u ";
									$sql = $sql."inner join funcao as f ";
									$sql = $sql."on (u.cod_funcao = f.cod_funcao) ";
									$sql = $sql."order by nome_funcao ";
		
									//echo($sql);
									$select = mysqli_query($conexao, $sql);
									
									$contador = "";
									
									while($rs = mysqli_fetch_array($select))
									{
										if($contador %2==0) $cor="#474F59";
								
										else $cor="#5B6066";
								?>
										<tr class="tr-dois" bgcolor="<?php echo($cor)?>">
											<td> <?php echo($rs["nome_usuario"])?> </td>
											<td> <?php echo($rs["nome_login"])?> </td>
											<td> <?php echo($rs["nome_funcao"])?> </td>
											<td>
												<center>
													<div class="editar">
														<a href="admCadUsua.php?modo=editar&codigo=<?php echo($rs["cod_usuario"])?>"> 
															<img src="imagens/edit.png" alt="">
															Editar  
														</a>
													</div>
												</center>	
											</td>
											<td> 
												<center>
													<div class="excluir">
														<a href="admCadUsua.php?modo=excluir&codigo=<?php echo($rs["cod_usuario"])?>"> 
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
					</form>
				</div>
			</div>	
			<footer>
				<?php include("rodape-cms.html")?>
			</footer>
        </div>
	</body>
</html>