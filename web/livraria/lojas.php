<?php include("conexao.php")?>
<?php include("login.php")?>
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
							<img id="icone" alt="" src="imagens/loja.png">
						</div>
						
						<div class="login"> <!--Inicio Login-->
							<form name="livraria_" method="post" action="lojas.php">
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
								<li onmouseover="mudaFoto('imagens/home.png')" onmouseout="mudaFoto('imagens/loja.png')"> <a href="index.php"> Home 			</a> </li>
                                <li onmouseover="mudaFoto('imagens/loja.png')" onmouseout="mudaFoto('imagens/loja.png')"> <a href="lojas.php"> Nossas Lojas 		</a> </li>
                                <li onmouseover="mudaFoto('imagens/livro.png')" onmouseout="mudaFoto('imagens/loja.png')"> <a href="livro.php"> Livro do Mês		</a> </li>
								<li onmouseover="mudaFoto('imagens/autor.png')" onmouseout="mudaFoto('imagens/loja.png')"> <a href="autor.php"> Autores em Destaque </a> </li>
								<li onmouseover="mudaFoto('imagens/promocao.png')" onmouseout="mudaFoto('imagens/loja.png')"> <a href="promocao.php"> Promoções		</a> </li>
                                <li onmouseover="mudaFoto('imagens/sobre.png')" onmouseout="mudaFoto('imagens/loja.png')"> <a href="sobre.php"> Sobre a Livraria	</a> </li>
								<li onmouseover="mudaFoto('imagens/contato.png')" onmouseout="mudaFoto('imagens/loja.png')"> <a href="contato.php"> Fale Conosco		</a> </li>
                            </ul>
                		</nav> <!--Fim Nav-->
						
                    </div> <!--Fim Navegacao-->
                    
                </div> <!--Fim Limite Header-->
            
            </header> <!--Fim Header-->
            
			<div class="limite_loja"> <!--Inicio Limite Slide-->
				
                <div class="redes_sociais"> <!--Inicio Redes Sociais-->
					<?php include("redes-sociais.php")?>
				</div> <!--Fim Redes Sociais-->
				
				<div class="corpo_lojas">
					<div class="lojas_titulo"> 
						<p>LOJAS</p> 
					</div>
					
						<?php	
							$sql = "select * from lojas ";
								
							$select = mysqli_query($conexao, $sql);
								
							while($rs = mysqli_fetch_array($select))
							{
						?>
					<div class="loja_detalhe">
								
						<div class="loja_descricao">
							
							<p> Endereço: <?php echo($rs["endereco"]);?> </p>
							<p> Telefone: <?php echo($rs["telefone"]);?> </p>
							<p> Email: <?php echo($rs["email"]);?> </p>
						
						</div>
						<div class="loja_img">
							<img alt="" title="" src="<?php echo($rs["foto_loja"]);?>">
						</div>
					</div>
						<?php
							
							}
						?>
				</div>
				
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