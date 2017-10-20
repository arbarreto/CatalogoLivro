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
							<img id="icone" alt="" src="imagens/promocao.png">
						</div>
						
						<div class="login"> <!--Inicio Login-->
							<form name="livraria_" method="post" action="promocao.php">
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
								<li onmouseover="mudaFoto('imagens/home.png')" onmouseout="mudaFoto('imagens/promocao.png')"> <a href="index.php"> Home 			</a> </li>
                                <li onmouseover="mudaFoto('imagens/loja.png')" onmouseout="mudaFoto('imagens/promocao.png')"> <a href="lojas.php"> Nossas Lojas 		</a> </li>
                                <li onmouseover="mudaFoto('imagens/livro.png')" onmouseout="mudaFoto('imagens/promocao.png')"> <a href="livro.php"> Livro do Mês		</a> </li>
								<li onmouseover="mudaFoto('imagens/autor.png')" onmouseout="mudaFoto('imagens/promocao.png')"> <a href="autor.php"> Autores em Destaque </a> </li>
								<li onmouseover="mudaFoto('imagens/promocao.png')" onmouseout="mudaFoto('imagens/promocao.png')"> <a href="promocao.php"> Promoções		</a> </li>
                                <li onmouseover="mudaFoto('imagens/sobre.png')" onmouseout="mudaFoto('imagens/promocao.png')"> <a href="sobre.php"> Sobre a Livraria	</a> </li>
								<li onmouseover="mudaFoto('imagens/contato.png')" onmouseout="mudaFoto('imagens/promocao.png')"> <a href="contato.php"> Fale Conosco		</a> </li>
                            </ul>
                		</nav> <!--Fim Nav-->
						
                    </div> <!--Fim Navegacao-->
                    
                </div> <!--Fim Limite Header-->
            
            </header> <!--Fim Header-->
            
			<div class="limite_slide"> <!--Inicio Limite Slide-->
				
                <div class="redes_sociais"> <!--Inicio Redes Sociais-->
					<?php include("redes-sociais.php")?>
				</div> <!--Fim Redes Sociais-->
                
                <div class="slide"> <!--Inicio Slide-->
                	<section id="fotos">
						<h2>foi o W3C que pediu</h2>
						<section id="botao">
							<h2>foi o W3C que pediu</h2>
							<a href="#" class="anterior">&laquo; </a>
							<a href="#" class="proximo">&raquo; </a>
						</section>
						<ul>
							<li>
								<span>
									Aqui e para vir a imagem UM
								</span>
								
								<img src="imagens/img_1.jpg" alt="" title="">
							</li>
							<li>
								<span>
									Aqui e para vir a imagem DOIS
								</span>
								
								<img src="imagens/img_2.jpg" alt="" title="">
							</li>
							<li>
								<span>
									Aqui e para vir a imagem TRES
								</span>
								
								<img src="imagens/img_3.jpg" alt="" title="">
							</li>
							<li>
								<span>
									Aqui e para vir a imagem QUATRO
								</span>
								
								<img src="imagens/img_4.jpg" alt="" title="">
							</li>
							<li>
								<span>
									Aqui e para vir a imagem CINCO
								</span>
								
								<img src="imagens/img_5.jpg" alt="" title="">
							</li>
						</ul>
					</section>
				
				</div> <!--Fim Slide-->
           
			</div><!--Fim Limite Slide-->
			
			<div class="limite_corpo" > <!--Inicio Limite_corpo-->
				
				<div class="categoria">  <!--Inicio Categoria-->
					<ul class="lstcategoria">  
						<li> <a href="#"> Item 1 </a> </li>
                        <li> <a href="#"> Item 2 </a> </li>
						
                    </ul>
				</div> <!-- im categoria-->
				
				<div class="produtos"> <!--Inicio Produtos--> 
				
				<h1> PROMOCAO</h1>
					
						
					
				</div> <!--Fim Produtos-->
				
				<div class="topo">
					<?php include("subir.php")?>
				</div>
				
			</div>	<!--Fim Limite_corpo-->

             <footer> <!--Inicio Footer-->
				<?php include("rodape.html")?>	
            </footer> <!--Fim Footer-->
        
        </div> <!--Fim Principal-->
	</body>
	
</html>