<?php include("conexao.php")?>
<?php include("login.php")?>
<?php
	$nome="";
	$sexo="";
	$profissao="";
	$telefone="";
	$celular="";
	$email="";
	$home="";
	$link="";
	$sugestoes="";
	$informacoes="";
	
	if(isset($_POST["btnsalvar"]))
	{	
		//Variaveis que vieram via POST no botao Salvar
		$nome = $_POST["txtnome"];
		$sexo = $_POST["rdosexo"];
		$profissao = $_POST["txtprofissao"];
		$telefone = $_POST["txttelefone"];
		$celular = $_POST["txtcelular"];
		$email = $_POST["txtemail"];
		$home = $_POST["txthome"];
		$face = $_POST["txtface"];
		$sugestoes = $_POST["txtsugestoes"];
		$informacoes = $_POST["txtinformacoes"];
			
		$sql = "insert into contato(nome, sexo, profissao, telefone, celular, email, home, face, sugestoes, informacoes)";
		$sql = $sql."values('".$nome."','".$sexo."','".$profissao."','".$telefone."','".$celular."','".$email."','".$home."','".$face."','".$sugestoes."','".$informacoes."')";

		mysqli_query($conexao, $sql);
		
		header("location:contato.php");
	}	
?>
<!doctype html>
<html lang="pt-br">
	<head>
		<?php include ("cabecalho.html") ?>
	</head>
	<body>
		<div class="principal"> <!--Inicio Pricipal-->
		
        	<header><!--Inicio Header-->
            	
                <div class="limite_header"> <!--Inicio Limite Header-->
                	
					<div class="logo"> <!--Inicio logo-->
                    	 
                    </div> <!--Fim Logo-->
					
                    <div class="navegacao"> <!--Inicio Navegacao-->
						
						<div class="imgJquery">
							<img id="icone" alt="" src="imagens/contato.png">
						</div>
						
						<div class="login"> <!--Inicio Login-->
							<form name="livraria_" method="post" action="contato.php">
                                <p> 
									Usuário <input type="text" name="txtnome" value=""> 
									Senha 	<input type="password"  maxlength="10" name="txtsenha">
									<input type="submit" name="btnok" value="ok">
                                </p>
                            </form> 
                     	</div> <!--Fim Login-->
						<span class="menu"> MENU </span>
						<nav> <!--Inicio Nav-->
							<?php include("menu-cel.html") ?>
                            <ul class="lstmenu">  
								<li onmouseover="mudaFoto('imagens/home.png')" onmouseout="mudaFoto('imagens/contato.png')"> <a href="index.php"> Home 			</a> </li>
                                <li onmouseover="mudaFoto('imagens/loja.png')" onmouseout="mudaFoto('imagens/contato.png')"> <a href="lojas.php"> Nossas Lojas 		</a> </li>
                                <li onmouseover="mudaFoto('imagens/livro.png')" onmouseout="mudaFoto('imagens/contato.png')"> <a href="livro.php"> Livro do Mês		</a> </li>
								<li onmouseover="mudaFoto('imagens/autor.png')" onmouseout="mudaFoto('imagens/contato.png')"> <a href="autor.php"> Autores em Destaque </a> </li>
								<li onmouseover="mudaFoto('imagens/promocao.png')" onmouseout="mudaFoto('imagens/contato.png')"> <a href="promocao.php"> Promoções		</a> </li>
                                <li onmouseover="mudaFoto('imagens/sobre.png')" onmouseout="mudaFoto('imagens/contato.png')"> <a href="sobre.php"> Sobre a Livraria	</a> </li>
								<li onmouseover="mudaFoto('imagens/contato.png')" onmouseout="mudaFoto('imagens/contato.png')"> <a href="contato.php"> Fale Conosco		</a> </li>
                            </ul>
                		</nav> <!--Fim Nav-->
						
                    </div> <!--Fim Navegacao-->
                    
                </div> <!--Fim Limite Header-->
            
            </header> <!--Fim Header-->
            
			<div class="limite_formulario"> <!--Inicio Limite Slide-->
				
                <div class="redes_sociais"> <!--Inicio Redes Sociais-->
					<?php include("redes-sociais.php")?>
				</div> <!--Fim Redes Sociais-->
				
				<div class="corpo_cadastro"> <!--Inicio formCadastro--> 
					<div class="fale_contato">
						<p> Deixe um Recado</p>
					</div>
					<form class="formulario" name="contato" method="post" action="contato.php">
						<div class="cadastro">
							<div class="alinhamento">
							
								<p> <label> Nome: </label><input type="text" name="txtnome" value="" maxlength="50" required> </p>	
								<p> 
									<label> Sexo:</label> 
									<input type="radio" name="rdosexo" value="F" checked>Feminino 
									<input type="radio" name="rdosexo" value="M" >Masculino
								</p>
								<p> <label> Profissão: </label> <input type="text" name="txtprofissao" value="" maxlength="50" required> </p>
								<p> <label> Telefone:</label> <input type="text" name="txttelefone" maxlength="10" value=""> </p>
								<p> <label> Celular: </label> <input type="text" name="txtcelular" value="" maxlength="11" required> </p>
								<p> <label> Email: </label> <input type="text" name="txtemail" value="" maxlength="25" required> </p>
								<p> <label> Home Page: </label> <input type="text" name="txthome" value="" maxlength="25"> </p>
								<p> <label> Link no Facebook: </label> <input type="text" name="txtface" value="" maxlength="25"> </p>
								<p> <label> Sugestões/Criticas: </label> <textarea name="txtsugestoes" cols="20" rows="5"> </textarea> </p>
								<p> <label> Informações de Produtos: </label> <textarea name="txtinformacoes" cols="20" rows="5"> </textarea> </p>
								<p> <input type="submit" name="btnsalvar" value="Enviar"> </p>
							</div>
						</div>
					</form>

				</div> <!--Fim formCadastro-->

				<div class="topo">
					<?php include("subir.php")?>
				</div>
			</div>
            <footer> <!--Inicio Footer-->
				<?php include("rodape.html")?>	
            </footer> <!--Fim Footer-->
        </div> <!--Fim Principal-->
	</body>
</html>