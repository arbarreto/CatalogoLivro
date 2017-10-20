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
							<img id="icone" alt="" src="imagens/autor.png">
						</div>
						
						<div class="login"> <!--Inicio Login-->
							<form name="livraria_" method="post" action="autor.php">
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
								<li onmouseover="mudaFoto('imagens/home.png')" onmouseout="mudaFoto('imagens/autor.png')"> <a href="index.php"> Home 			</a> </li>
                                <li onmouseover="mudaFoto('imagens/loja.png')" onmouseout="mudaFoto('imagens/autor.png')"> <a href="lojas.php"> Nossas Lojas 		</a> </li>
                                <li onmouseover="mudaFoto('imagens/livro.png')" onmouseout="mudaFoto('imagens/autor.png')"> <a href="livro.php"> Livro do Mês		</a> </li>
								<li onmouseover="mudaFoto('imagens/autor.png')" onmouseout="mudaFoto('imagens/autor.png')"> <a href="autor.php"> Autores em Destaque </a> </li>
								<li onmouseover="mudaFoto('imagens/promocao.png')" onmouseout="mudaFoto('imagens/autor.png')"> <a href="promocao.php"> Promoções		</a> </li>
                                <li onmouseover="mudaFoto('imagens/sobre.png')" onmouseout="mudaFoto('imagens/autor.png')"> <a href="sobre.php"> Sobre a Livraria	</a> </li>
								<li onmouseover="mudaFoto('imagens/contato.png')" onmouseout="mudaFoto('imagens/autor.png')"> <a href="contato.php"> Fale Conosco		</a> </li>
                            </ul>
                		</nav> <!--Fim Nav-->
						
                    </div> <!--Fim Navegacao-->
                    
                </div> <!--Fim Limite Header-->
            
            </header> <!--Fim Header-->
            
			<div class="limite_autor"> <!--Inicio Limite Autor-->
				
                <div class="redes_sociais"> <!--Inicio Redes Sociais-->
					<?php include("redes-sociais.php")?>
				</div> <!--Fim Redes Sociais-->
           
				<div class="corpo_autor"> <!--Inicio corpo livro-->
					<div class="nome_titulo"> 
						<p>AUTORES EM DESTAQUE</p> 
					</div>
						<?php
			
							$sql = "select ";
							$sql = $sql ."a.cod_autor, a.nome_autor, a.dt_nasc, a.foto_autor, a.bibliografia ";
							$sql = $sql ."FROM autor AS a ";
							$sql = $sql ."INNER JOIN autores_destaque AS d ";
							$sql = $sql ."ON (d.cod_autor=a.cod_autor) ";
							$sql = $sql ."INNER JOIN estatus AS e ";
							$sql = $sql ."ON(e.cod_estatus=d.cod_estatus) ";
							$sql = $sql ."WHERE e.cod_estatus=1; ";
							
							$select = mysqli_query($conexao, $sql);
							
							while($rs = mysqli_fetch_array($select, MYSQLI_ASSOC))
							{
						?>
					<div class="autor_detalhes">
							
						<div class="autor_foto">
							<img alt="" title="" src="<?php echo($rs["foto_autor"])?>">
						</div>
							
						<div class="autor_caracteristicas">
							<p> Nome: <?php echo($rs["nome_autor"]);?></p>
							<p> Nascimento: <?php echo($rs["dt_nasc"]);?> </p>
							<p> Bibliografia: <?php echo($rs["bibliografia"]);?> </p>
						</div>
						
					</div>
						<?php 
							}
						?>
				</div> <!--Fim Corpo autor-->
					
				<div class="topo">
					<?php include("subir.php")?>
				</div>
			</div><!--Fim Limite Autor-->
            <footer> <!--Inicio Footer-->
				<div class="limite_footer">
					<div class="direitos">
						<p> Wood Woodpeaker © Todos os direitos reservados. 2016 </p>
					</div>
					<div class="redes_sociais_"> <!--Inicio Redes Sociais-->
						<a href="https://www.facebook.com/" target="_blank"> 	<img alt="" title="" src="imagens/face.png" > 	</a>
					</div> <!--Fim Redes Sociais-->
					<div class="redes_sociais_"> <!--Inicio Redes Sociais-->
						<a href="https://plus.google.com/" target="_blank">  	<img alt="" title="" src="imagens/google.png" > </a>
					</div> <!--Fim Redes Sociais-->
					<div class="redes_sociais_"> <!--Inicio Redes Sociais-->
						<a href="https://twitter.com/" target="_blank"> 		<img alt="" title="" src="imagens/twitter.png" > </a>
					</div> <!--Fim Redes Sociais-->
					<div class="redes_sociais_"> <!--Inicio Redes Sociais-->
						<a href="https://www.youtube.com/" target="_blank"> 	<img alt="" title="" src="imagens/youtube.png" > </a>
					</div> <!--Fim Redes Sociais-->
				</div>	
            </footer> <!--Fim Footer-->
        
        </div> <!--Fim Principal-->
	</body>
</html>