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
							<img id="icone" alt="" src="imagens/livro.png">
						</div>
						
						<div class="login"> <!--Inicio Login-->
							<form name="livraria_" method="post" action="livro.php">
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
								<li onmouseover="mudaFoto('imagens/home.png')" onmouseout="mudaFoto('imagens/livro.png')"> <a href="index.php"> Home 			</a> </li>
                                <li onmouseover="mudaFoto('imagens/loja.png')" onmouseout="mudaFoto('imagens/livro.png')"> <a href="lojas.php"> Nossas Lojas 		</a> </li>
                                <li onmouseover="mudaFoto('imagens/livro.png')" onmouseout="mudaFoto('imagens/livro.png')"> <a href="livro.php"> Livro do Mês		</a> </li>
								<li onmouseover="mudaFoto('imagens/autor.png')" onmouseout="mudaFoto('imagens/livro.png')"> <a href="autor.php"> Autores em Destaque </a> </li>
								<li onmouseover="mudaFoto('imagens/promocao.png')" onmouseout="mudaFoto('imagens/livro.png')"> <a href="promocao.php"> Promoções		</a> </li>
                                <li onmouseover="mudaFoto('imagens/sobre.png')" onmouseout="mudaFoto('imagens/livro.png')"> <a href="sobre.php"> Sobre a Livraria	</a> </li>
								<li onmouseover="mudaFoto('imagens/contato.png')" onmouseout="mudaFoto('imagens/livro.png')"> <a href="contato.php"> Fale Conosco		</a> </li>
                            </ul>
                		</nav> <!--Fim Nav-->
						
                    </div> <!--Fim Navegacao-->
                    
                </div> <!--Fim Limite Header-->
            
            </header> <!--Fim Header-->
            
			<div class="limite_livro"> <!--Inicio Limite livro-->
				
                <div class="redes_sociais"> <!--Inicio Redes Sociais-->
					<?php include("redes-sociais.php")?>
				</div> <!--Fim Redes Sociais-->
                
                <div class="corpo_livro"> <!--Inicio corpo livro-->
					<div class="livro_titulo"> 
						<p>LIVRO DO MÊS</p> 
					</div>
					
					<div class="livro_detalhes">
						
						<?php
							//a variavel sql recebe o select do banco
							//é otimo colocar espacos antes das aspas depois do final do comando
							$sql = "select ";
							$sql = $sql."l.foto_livro, l.nome_livro, l.desc_livro, l.preco_livro, ";	
							$sql = $sql."a.nome_autor ";	
							$sql = $sql."FROM livro AS l ";	
							$sql = $sql."INNER JOIN autor AS a ";	
							$sql = $sql."ON(l.cod_autor=a.cod_autor) ";	
							$sql = $sql."INNER JOIN livro_mes AS m ";	
							$sql = $sql."ON(l.cod_livro=m.cod_livro) ";	
							$sql = $sql."INNER JOIN estatus AS e ";	
							$sql = $sql."ON(e.cod_estatus=m.cod_estatus) ";
							$sql = $sql."WHERE e.cod_estatus = 1 ";
							$sql = $sql."limit 1 ";
								
							$select = mysqli_query($conexao, $sql);
								
							while($rs = mysqli_fetch_array($select, MYSQLI_ASSOC))
							{
						?>
						
						<div class="livro_capa">
							<img alt="" title="" src="<?php echo($rs["foto_livro"]);?>">
						</div>
						
						<div class="livro_caracteristicas">
							<p> Nome:  <?php echo($rs["nome_livro"]);?></p>
							<p> Autor: <?php echo($rs["nome_autor"]);?></p>
							<p> Preço: <?php echo($rs["preco_livro"]);?></p>
						</div>
						
						<div class="livro_mais">
							<p> Descrição: <?php echo($rs["desc_livro"]);?> </p>
						</div>
					</div>
						<?php 
							}
						?>
				</div> <!--Fim Corpo livro-->
      
				<div class="topo">
					<?php include("subir.php")?>
				</div>
				
			</div>

             <!--Fim Footer-->
        
        </div> <!--Fim Principal-->
		<footer> <!--Inicio Footer-->
			<?php include("rodape.html")?>	
        </footer>
	</body>
</html>