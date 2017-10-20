<?php
	session_start();
	$conexao=mysql_connect("localhost", "root", "bcd127");
mysql_select_db("dblivraria");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Livraria Woody Woodpecker SA</title>
<link rel="icon" type="image/jpg" href="imagens/s.png" />
<link rel="stylesheet" type="text/css" href="css/estilo.css">
<script src="js/jquery11.js"></script>
</head>
<script>
		jQuery(document).ready(function ($) {


			setInterval(function () {
				moveRight();
			}, 3000);


	var slideCount = $('#slider ul li').length;
	var slideWidth = $('#slider ul li').width();
	var slideHeight = $('#slider ul li').height();
	var sliderUlWidth = slideCount * slideWidth;
	
	$('#slider').css({ width: slideWidth, height: slideHeight });
	
	$('#slider ul').css({ width: sliderUlWidth, marginLeft: - slideWidth });
	
    $('#slider ul li:last-child').prependTo('#slider ul');

    function moveLeft() {
        $('#slider ul').animate({
            left: + slideWidth
        }, 200, function () {
            $('#slider ul li:last-child').prependTo('#slider ul');
            $('#slider ul').css('left', '');
        });
    };

    function moveRight() {
        $('#slider ul').animate({
            left: - slideWidth
        }, 200, function () {
            $('#slider ul li:first-child').appendTo('#slider ul');
            $('#slider ul').css('left', '');
        });
    };

    $('a.control_prev').click(function () {
        moveLeft();
    });

    $('a.control_next').click(function () {
        moveRight();
    });

});    

</script>
<body>
	<header>
		<div class="menu">
			<img src="imagens/placanatural.png" class="cabecalho"/>
				<nav>
					<ul>
						 <li><a href="home.php">Home</a></li>
						 <li><a href="autores.php">Autores em destaque</a></li>
						 <li><a href="livro.php">Livro do mês</a></li>
						 <li><a href="promo.php">Promoções</a></li>
						 <li><a href="sobre.php">Sobre a livraria</a></li>
						 <li><a href="lojas.php">Nossas Lojas</a></li>
						 <li><a href="fale.php">Fale conosco</a></li>
					</ul>
				</nav>
				<div class="login">
					<form name="frmlogin" method="post" action="loginadm.php">
						Usuário:
						<input type="text" name="txtusu" value="">
				</div>
				<div class="login">
						Senha:</br>
						<input type="password" name="txtsenha" value="">
				</div>
				<div class="ok">
						</br>
						<input type="submit" name="btnok" value="Ok">
					</form>
				</div>
		</div>
	</header>
    <div class="principal">
    	<div class="slide">
			<div id="slider">
			  <a href="#" class="control_next">></a>
			  <a href="#" class="control_prev"><</a>
			  <ul>
				<li><img src="imagens/propaganda.png" class="imgslide"/></li>
				<li><img src="imagens/prpaganda2.png" class="imgslide"/></li>
				<li><img src="imagens/RIRI.png" class="imgslide"/></li>
				<li><img src="imagens/livraria.jpg" class="imgslide"/></li>
			  </ul>  
			</div>
			<!--
			<div class="slider_option">
			  <input type="checkbox" id="checkbox">
			  <label for="checkbox">Autoplay Slider</label>
			</div> -->
        </div>
		<div class="social">
		<img src="imagens/facebook-icon.png" class="ftsocial"/>
	</div>
	<div class="social2">
		<img src="imagens/twitter.png" class="ftsocial"/>
	</div>
	<div class="social3">
		<img src="imagens/wood-instagram-icon.png" class="ftsocial"/>
	</div>
        <div class="conteudo">
        	<div class="sem">
						<div class="titulo">
					Categorias
				</div> 
				<div>
					<ul class="categoria">
						<li><a href="home.php">Lançamentos</a></li>
						<li><a href="home.php">Pré-Vendas</a></li>
						<li><a href="home.php">Mais Vendidos</a></li>
						<li><a href="home.php">Administração</a></li>
						<li><a href="home.php">Agropecuária</a></li>
						<li><a href="home.php">Artes</a></li>
						<li><a href="home.php">Autoajuda</a></li>
						<li><a href="home.php">Ciências Biológicas</a></li>
						<li><a href="home.php">Ciências Exatas</a></li>
						<li><a href="home.php">Ciências Humanas e Sociais</a></li>
						<li><a href="home.php">Contabilidade</a></li>
						<li><a href="home.php">Cursos e Idiomas</a></li>
						<li><a href="home.php">Dicionários e Manuais</a></li>
						<li><a href="home.php">Didáticos</a></li>
						<li><a href="home.php">Direito</a></li>
						<li><a href="home.php">Economia</a></li>
						<li><a href="home.php">Engenharia e Tecnologia</a></li>
						<li><a href="home.php">Esoterismo</a></li>
						<li><a href="home.php">Esporte e Lazer</a></li>
						<li><a href="home.php">Gastronomia</a></li>
						<li><a href="home.php">Geografia e História</a></li>
						<li><a href="home.php">Informática</a></li>
						<li><a href="home.php">Linguística</a></li>
						<li><a href="home.php">Literatura Estrangeira</a></li>
						<li><a href="home.php">Literatura Infojuvenil</a></li>
						<li><a href="home.php">Literatura Nacional</a></li>
						<li><a href="home.php">Medicina</a></li>
						<li><a href="home.php">Religião</a></li>
						<li><a href="home.php">Turismo</a></li>
					</u>
				</div>
            </div>
			<?php
				$sql="select p.codpromo, lp.codpromo
					from tblpromocao as p
					inner join tbllivro_promo as lp
					on (p.codpromo = lp.codpromo)
					order by codlp desc";
				$select=mysql_query($sql);
				while($rs=mysql_fetch_array($select)){

			?>
			<div class="livro">
            	<div class="foto">
					<img src="<?php echo($rs["fotoloja"])?>" class="imgfoto"/>
                </div>
                <div class="sobre">
                	
                </div>
                <div class="sobre">
					
                </div>
                <div class="sobre">
                	
                </div>
            </div>
			<?php
				}
			?>
        </div>
		<d
    </div>
	<footer class="rodape">
       <img src="imagens/rodape.jpg" class="imgrodape"/>
    </footer>
</body>
</html>
