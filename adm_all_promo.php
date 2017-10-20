<?php
	session_start();
	$conexao=mysql_connect("localhost", "root", "bcd127");
mysql_select_db("dblivraria");
$linha = 0;
$status="Ativar";
if(isset($_GET["modo"])){
	
	$modo=$_GET["modo"];
		if ($modo=="excluir"){
			$cod = $_GET["codpromo"];
			$sql="delete from tblpromocao where codpromo=".$cod;
			
			//echo($sql);
			mysql_query($sql);

		}else if($modo=="status"){
			$cod = $_GET["codpromo"];
			$sqlinativo="update tblpromocao set statuspromo=0";
			mysql_query($sqlinativo);
			$sqlativo="update tblpromocao set statuspromo='1' where codpromo=".$cod;
			mysql_query($sqlativo);
			
			
			
		}		
}
?>

<!DOCTYPE html >
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Livraria Woody Woodpecker SA</title>
<link rel="icon" type="image/jpg" href="imagens/s.png" />
<link rel="stylesheet" type="text/css" href="css/style.css">
<script src="js/jquery11.js"></script>
</head>
<body>
	<header>
		<div>
			<img src="imagens/construcao.png" class="slide1"/>
        </div>
	</header>
    <div class="principal">
    	<div class="cabecalho">
			<div class="adm">
				<a href="adm_conteudo.php"><img src="imagens/320x320xdefault-avatar_0.png,qitok=0jZKd6f2.pagespeed.ic.M1QG-KQ9bS (1).png" class="imgadm"/></a>
					<div class="titulo">
						<a href="adm_conteudo.php">Adm. Conteúdo</a>
					</div>
			</div>
			<div class="adm">
				<a href="adm_faleconosco.php"><img src="imagens/operator_support_girl-128.png" class="imgadm"/></a>
					<div class="titulo">
						<a href="adm_faleconosco.php">Adm. Fale Conosco</a>
					</div>
			</div>
			<div class="adm">
				<a href="adm_produto.php"><img src="imagens/44322.png" class="imgadm"/></a>
					<div class="titulo">
						<a href="adm_produto.php">Adm. Produtos</a>
					</div>
			</div>
			<div class="adm">
				<a href="adm_user.php"><img src="imagens/advisors1.png" class="imgadm"/></a>
				<div class="titulo">
						<a href="adm_user.php">Adm. Usuários</a>
					</div>
			</div>
			<div class="bv">
				Bem vindo, <?php echo $_SESSION['nomeuser']; ?>
			</div>
			<div class="logout">
					<a href="home.php">Logout</a>
			</div>
		</div>
		<div class="fita">
		</div>
		<div class="consulta">
			<div>
				<a href="adm_promocao.php"><img src="imagens/a-vector-illustration-of-a-wooden-sign-455498.jpg" class="img_voltar"/></a>
			</div>
			<div class="all_autor">
				<table class="table_autor">
					<tr height="30px" class="cor">
					<td width="158" align="center">
						Data Inicial
					</td>
					<td width="158" align="center">
						Data Final
					</td>
					<td width="157" align="center">
						Nome
					</td >
					<td width="157" align="center">
						Livros
					</td>
					<td width="158" align="center">
						Opção
					</td>
			</tr>
			<?php
				$sql="select * from tblpromocao
						order by codpromo desc";
				$select=mysql_query($sql);
				
				while($rs=mysql_fetch_array($select)){
					
					$des=$rs["statuspromo"];
					if($des==1){
						$status="Desativar";
					}else{
							$status="Ativar";
						}
			?>
			<tr height="30px" bgcolor="<?php if($linha % 2){ echo "#D8DFFA"; } else { echo "#FFFFFF"; } ?>">
				<td width="300" align="center">
					<?php echo($rs["dtInicio"])?>
				</td>
				<td width="300" align="center">
					<?php echo($rs["dtFinal"])?>
				</td>
				<td width="300"align="center">
					<?php echo($rs["nomepromo"])?>
				</td >
				<?php 
					
					$sql2="select lp.codlivro,lp.codpromo, l.codlivro, l.titulolivro
					from tbllivro_promo as lp 
					inner join tbllivro as l 
					on(l.codlivro=lp.codlivro)
]					where codpromo=".$_SESSION["cod"];
						
					$select2 = mysql_query($sql2);
					
				 ?>
				<td width="300"align="center">
					<select name="cboprodutos" >					
						<?php  while($result=mysql_fetch_array($select2)){ 	 ?>
							<option value="<?php echo($result["codlivro"]); ?> "> <?php echo($result["titulolivro"]); ?> </option>
							<?php
								}
							?>
						</select>
				</td>
				<td align="center" width="300">
					<a href="adm_cad_promo.php?modo=editar&codpromo=<?php echo($rs["codpromo"]) ?>"> Editar </a> | <a href="adm_all_promo.php?modo=excluir&codpromo=<?php echo($rs["codpromo"]) ?>">Excluir</a> 
					| <a href="adm_all_promo.php?modo=status&codpromo=<?php echo($rs["codpromo"]) ?>"><?php echo($status)?></a>
				</td>
			</tr>
			<?php
					$linha++;
				}
			?>
		</table>
			</div>
		</div>
    </div>
	<footer class="rodape1">
       Desenvolvido por Amanda Rafaela Barreto de Melo
    </footer>
</body>
</html>

