<?php include("conexao.php")?>
<?php include("nome-login.php")?>
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
					<a href="adm-produtos.php"> &laquo; </a>
				</div>
				<div class="clear"> </div>
				<h2> Gráfico</h2>
				<div class="grafico">
					<table id="tabela-grafico">
						<?php
						
							$porcento = 100;
						
							$sql = "select l.cod_livro, l.foto_livro, l.nome_livro, l.desc_livro, ";
							$sql = $sql."l.preco_livro, sum(l.visualizacao) as visualizacao, ";
							$sql = $sql."a.cod_autor, a.nome_autor as nomeautor, ";	
							$sql = $sql."s.cod_subcategoria, s.nome_subcategoria ";	
							$sql = $sql."from livro as l ";	
							$sql = $sql."left join autor as a ";	
							$sql = $sql."on (l.cod_autor = a.cod_autor) ";	
							$sql = $sql."inner join subcategoria as s ";	
							$sql = $sql."on (l.cod_subcategoria = s.cod_subcategoria) ";	
							$sql = $sql."group by nome_livro ";	
							$sql = $sql."order by visualizacao desc";	
						
							$select = mysqli_query($conexao, $sql);
							
							$linhas = mysqli_num_rows($select);
							
							print_r($linhas."LINHAS"); ?> <br><br><br><?php
							
							$sql2 = "select sum(visualizacao)as visualizacao from livro ";
							
							$select2 = mysqli_query($conexao, $sql2);
							
							while ($rs2 = mysqli_fetch_array($select2)){  $total = $rs2["visualizacao"];  }
							
							print_r ($total."TOTAL VIEW");
							
							$contador = "";
							
							while($rs = mysqli_fetch_array($select))
							{
								$visu = $rs["visualizacao"];
								$visu = $visu ."%";
								
								if($contador %2==0) $cor="#474F59";
								else $cor="#5B6066";
						?>
								<tr class="tr-dois" bgcolor="<?php echo($cor)?>">
									<td> <?php echo($rs["nome_livro"])?> </td>
									<td>
										<center> 
											<div class="img-livro">
												<img src="<?php echo($rs["foto_livro"]);?>" alt="" title=""/>
											</div>
										</center>
									</td>
									<td id="total" style=" width:400px ;">
										<div style=" width: <?php echo $visu ?> ; height: 20px; background-color:<?php printf( "#%06X\n", mt_rand( 0, 0x222222 )) ?> ; border-radius: 10px; ">
										
										</div>
									</td>
									<td> <?php echo($rs["visualizacao"])?> VISUALIZAÇÕES </td>
								</tr>
						<?php
								$contador++;
							}
						?>
					</table>	
				</div>
			</div>		
			<footer>
				<?php include("rodape-cms.html")?>
			</footer>
        </div>
		
	</body>
</html>


