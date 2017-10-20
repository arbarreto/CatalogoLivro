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
							<img id="icone" alt="" src="imagens/home.png">
						</div>
						
						<div class="login"> <!--Inicio Login-->
							<form name="livraria_" method="post" action="index.php">
                                <p> 
									Usuário: <input type="text" name="txtnome" value=""> 
									Senha: 	 <input type="password"  maxlength="10" name="txtsenha">
									<input type="submit" name="btnok" value="ok">
                                </p>
                            </form> 
                     	</div> <!--Fim Login-->
						<span class="menu"> MENU </span>
						<nav> <!--Inicio Nav-->
							
							<?php include("menu-cel.html") ?>
							
                            <ul class="lstmenu">  
								<li onmouseover="mudaFoto('imagens/home.png')" onmouseout="mudaFoto('imagens/home.png')"> <a href="index.php"> Home 			</a> </li>
                                <li onmouseover="mudaFoto('imagens/loja.png')" onmouseout="mudaFoto('imagens/home.png')"> <a href="lojas.php"> Nossas Lojas 		</a> </li>
                                <li onmouseover="mudaFoto('imagens/livro.png')" onmouseout="mudaFoto('imagens/home.png')"> <a href="livro.php"> Livro do Mês		</a> </li>
								<li onmouseover="mudaFoto('imagens/autor.png')" onmouseout="mudaFoto('imagens/home.png')"> <a href="autor.php"> Autores em Destaque </a> </li>
								<li onmouseover="mudaFoto('imagens/promocao.png')" onmouseout="mudaFoto('imagens/home.png')"> <a href="promocao.php"> Promoções		</a> </li>
                                <li onmouseover="mudaFoto('imagens/sobre.png')" onmouseout="mudaFoto('imagens/home.png')"> <a href="sobre.php"> Sobre a Livraria	</a> </li>
								<li onmouseover="mudaFoto('imagens/contato.png')" onmouseout="mudaFoto('imagens/home.png')"> <a href="contato.php"> Fale Conosco		</a> </li>
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
                	<?php include("slider.php") ?>
				</div> <!--Fim Slide-->
           
			</div><!--Fim Limite Slide-->
			
			<div class="limite_corpo" > <!--Inicio Limite_corpo-->
				
				<div class="categoria">  <!--Inicio Categoria-->
					
					<ul class="lstcategoria"> 
						<?php 
							$sql = "select * from categoria order by nome_categoria ";
						
							$select = mysqli_query($conexao, $sql);
							
							while($rs = mysqli_fetch_array($select))
							{
								
						?>		
								<li id="lstcategoria-" > 
									<?php echo($rs["nome_categoria"])?>			
									<ul class="subsltsubcategoria">
										
										<?php
											$sql2 = "select ";
											$sql2 = $sql2 . "c.cod_categoria, c.nome_categoria, ";
											$sql2 = $sql2 . "s.cod_subcategoria, s.nome_subcategoria ";
											$sql2 = $sql2 . "from categoria as c ";
											$sql2 = $sql2 . "inner join subcategoria as s ";
											$sql2 = $sql2 . "on (c.cod_categoria = s.cod_categoria) ";
											$sql2 = $sql2 . "where s.cod_categoria = ".$rs["cod_categoria"] ." ";
											$sql2 = $sql2 . "order by nome_subcategoria ";

											$select2 = mysqli_query($conexao, $sql2);
								
											while($rssub = mysqli_fetch_array($select2))
											{
										?>
												<li id="subsltsubcategoria-"> 
													<a href="index.php?modo=filtro&id=<?php echo($rssub["cod_subcategoria"])?>"> 
														<?php echo($rssub["nome_subcategoria"])?> 
													</a>
												</li>
										<?php 
											}
										?>
									</ul>	
								</li>
						<?php 
							}
						?>
									
                    </ul>
						
				</div> <!-- im categoria-->
				<div class="pesquisa">
					<form name="pesquisa" method="post" action="index.php" id="form_cel">
						<input type="text" placeholder="pesquisar" id="pesquisa_" name="txtpesquisa" value="">
						<input type="submit" name="btnpesquisar" value="" id="btnpesquisar_">
					</form>
				</div>
				<div class="produtos"> <!--Inicio Produtos--> 
					
					<?php
						
						if(isset ($_POST["btnpesquisar"]))
						{
							$pesquisa = $_POST["txtpesquisa"];	
							
							$sql = "select l.cod_livro, l.foto_livro, l.nome_livro, l.desc_livro, l.preco_livro, ";
							$sql = $sql."a.cod_autor, a.nome_autor as nomeautor ";	
							$sql = $sql."from livro as l ";	
							$sql = $sql."left join autor as a ";	
							$sql = $sql."on (l.cod_autor = a.cod_autor) ";
							$sql = $sql."where nome_livro like '".$pesquisa."%' or desc_livro like '".$pesquisa."%'";
							
							?><a href="index.php"><?php echo ("VOLTAR");?></a><?php
						}
						elseif (isset ($_GET["modo"])){
							
							$id = $_GET["id"];
							
							$sql = "select l.cod_livro, l.foto_livro, l.nome_livro, l.desc_livro, l.preco_livro, ";
							$sql = $sql."a.cod_autor, a.nome_autor as nomeautor, ";	
							$sql = $sql."s.nome_subcategoria ";	
							$sql = $sql."from livro as l ";	
							$sql = $sql."left join autor as a ";	
							$sql = $sql."on (l.cod_autor = a.cod_autor) ";	
							$sql = $sql."inner join subcategoria as s ";	
							$sql = $sql."on (l.cod_subcategoria = s.cod_subcategoria) ";	
							$sql = $sql."where s.cod_subcategoria = " .$id  ;	
							$sql = $sql." order by nome_livro ";	
							
							?><a href="index.php"><?php echo ("VOLTAR");?></a><?php
						}
						else
						{
					?>
					<?php 
							$sql = "select l.cod_livro, l.foto_livro, l.nome_livro, l.desc_livro, l.preco_livro, ";
							$sql = $sql."a.cod_autor, a.nome_autor as nomeautor ";	
							$sql = $sql."from livro as l ";	
							$sql = $sql."left join autor as a ";	
							$sql = $sql."on (l.cod_autor = a.cod_autor) ";	
							
						}
						
						$select = mysqli_query($conexao, $sql);
						
						while($rs = mysqli_fetch_array($select))
						{
					?>
					
					<div class="item_um">
					
						<div class="produtos_bd">
							<img alt="img" src="<?php echo($rs["foto_livro"]);?>" />
						</div>
						<p> Nome: <?php echo($rs["nome_livro"]);?> </p>
						<div class="desc"> 
                        	<p id="decri"> Descrição: <?php echo($rs["desc_livro"])?> </p> 
						</div>
						<p> Preço: R$ <?php echo($rs["preco_livro"])?> </p>
						<p> <span> <a href="livro-detalhes.php?id=<?php echo ($rs["cod_livro"])?>"> Detalhes </a> </span> </p>
					</div>
					
					<?php
						}
						mysqli_close($conexao);
					?>	
					
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