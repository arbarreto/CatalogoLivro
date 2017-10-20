<?php
	session_start();
	$select="";
	$lista="";
	
	//Conexão com o Banco de Dados MySQL
	//estabelece a conexão com a base de dados MySQL
	$conexao = mysql_connect( $_SESSION['ip_db'] ,$_SESSION ['usuario_db'],$_SESSION ['senha_db']);

	//Especifica qual a data base será utilizado
	mysql_select_db($_SESSION ['db_utilizado']);
	
	if(isset($_POST["btnok"]))
	{	
		$_SESSION['nome'] = $_POST["txtnome"];
		$_SESSION['senha'] = $_POST["txtsenha"];
		
		$sql = "select nome_login, senha from usuario where nome_login='".$_SESSION['nome']."' and senha='".$_SESSION['senha']."'"; 

		$select = mysql_query($sql);
		
		if($lista = mysql_fetch_array($select))
		{
			header("location:cms.php");
		}
		else{
			?>
				<script> alert("Usuário não Encotrado") </script>
			<?php
		}
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
							<img id="icone" alt="" src="imagens/sobre.png">
						</div>
						
						<div class="login"> <!--Inicio Login-->
							<form name="livraria_" method="post" action="sobre.php">
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
								<li onmouseover="mudaFoto('imagens/home.png')" onmouseout="mudaFoto('imagens/sobre.png')"> <a href="index.php"> Home 			</a> </li>
                                <li onmouseover="mudaFoto('imagens/loja.png')" onmouseout="mudaFoto('imagens/sobre.png')"> <a href="lojas.php"> Nossas Lojas 		</a> </li>
                                <li onmouseover="mudaFoto('imagens/livro.png')" onmouseout="mudaFoto('imagens/sobre.png')"> <a href="livro.php"> Livro do Mês		</a> </li>
								<li onmouseover="mudaFoto('imagens/autor.png')" onmouseout="mudaFoto('imagens/sobre.png')"> <a href="autor.php"> Autores em Destaque </a> </li>
								<li onmouseover="mudaFoto('imagens/promocao.png')" onmouseout="mudaFoto('imagens/sobre.png')"> <a href="promocao.php"> Promoções		</a> </li>
                                <li onmouseover="mudaFoto('imagens/sobre.png')" onmouseout="mudaFoto('imagens/sobre.png')"> <a href="sobre.php"> Sobre a Livraria	</a> </li>
								<li onmouseover="mudaFoto('imagens/contato.png')" onmouseout="mudaFoto('imagens/sobre.png')"> <a href="contato.php"> Fale Conosco		</a> </li>
                            </ul>
                		</nav> <!--Fim Nav-->
						
                    </div> <!--Fim Navegacao-->
                    
                </div> <!--Fim Limite Header-->
            
            </header> <!--Fim Header-->
            
			<div class="limite_sobre"> <!--Inicio Limite sobre-->
				
                <div class="redes_sociais"> <!--Inicio Redes Sociais-->
					<?php include("redes-sociais.php")?>
				</div> <!--Fim Redes Sociais-->
				
				<div class="corpo_sobre"> <!--Inicio corpo livro-->
					<div class="sobre_titulo"> 
						<p>SOBRE NÓS</p> 
					</div>
					
					<div class="sobre_detalhes">
						
						<div class="sobre_foto">
							<img alt="" title="" src="imagens/livraria-01.png">
						</div>
						
						<div class="sobre_localizacao">
							<p> Endereço: Centro Brazil</p>
							<p> Fone: +55 011 4141 8896</p>
							<p> Email: WoodyWoodpecker@gmail.com</p>
						</div>
						
						<div class="sobre_nos">
							<p>
								A Woody Woodpecker foi criada em 2016 que propõe como forma de aprendizado para o possível aperfeiçoamento ao conhecimento em PHP juntamente com a linguagem de programação SQL . E não foi uma tarefa fácil.
							</p>
						</div>
						
						<div class="foto_sobre">
							<img alt="" title="" src="imagens/livraria-02.png">
						</div>
						
						<div class="foto_sobre_">
							<img alt="" title="" src="imagens/livraria-03.png">
						</div>
					</div>
					
				</div> <!--Fim Corpo livro-->

				<div class="topo">
					<?php include("subir.php")?>
				</div>
				
			</div><!--Fim Limite sobre-->

             <footer> <!--Inicio Footer-->
				<?php include("rodape.html")?>	
            </footer> <!--Fim Footer-->
        
        </div> <!--Fim Principal-->
	</body>
</html>