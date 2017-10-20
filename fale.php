<?php

$conexao=mysql_connect("localhost", "root", "bcd127");
mysql_select_db("dblivraria");

$nome="";
$tel="";
$cel="";
$email="";
$sexo="";
$profissao="";
$home="";
$link="";
$info="";
$suge="";

	if(isset($_POST['btnenviar'])){
		$nome=$_POST['txtnome'];
		$tel=$_POST['txttel'];
		$cel=$_POST['txtcel'];
		$email=$_POST['txtemail'];
		$sexo=$_POST['rdosexo'];
		$profissao=$_POST['txtprof'];
		$home=$_POST['txthome'];
		$link=$_POST['txtfb'];
		$info=$_POST['txtinfo'];
		$suge=$_POST['txtsuge'];
		
		
		$sql="insert into tblfaleConosco (nome, tel, cel, email, sexo, profissao, home, link, info, suge) 
		values('".$nome."','".$tel."','".$cel."','".$email."','".$sexo."','".$profissao."','".$home."','".$link."','".$info."','".$suge."')";
		
		mysql_query($sql);
	}

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
 <script language="JavaScript">
 function mascara(t, mask){
 var i = t.value.length;
 var saida = mask.substring(1,0);
 var texto = mask.substring(i)
 if (texto.substring(0,1) != saida){
 t.value += texto.substring(0,1);
 }
 }
 </script>
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
						<input type="password" name="txtsenha" value="" >
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
			<div class="fale">
				<form name="frmfale" method="post" action="fale.php">
					Nome:</br>
					<input type="text" name="txtnome" value="" size="50" required class="form"></br>
					Telefone:</br>
					<input type="text" name="txttel" value="" size="50" maxlength="12" onkeypress="mascara(this, '## ####-####')" class="form"></br>
					Celular:</br>
					<input type="text" name="txtcel" value="" size="50" required maxlength="13" onkeypress="mascara(this, '## #####-####')" class="form"></br>
					E-mail:</br>
					<input type="email" name="txtemail" value="" size="50" required class="form"></br>
					Sexo:   
					<input type="radio" name="rdosexo" value="Feminino" checked class="form2">Feminino     
					<input type="radio" name="rdosexo" value="Masculino" class="form2">Masculino</br>
					Profissão:</br>
					<input type="text" name="txtprof" value="" size="50" required class="form" ></br>
					Home Page:</br>
					<input type="text" name="txthome" value="" size="50" class="form"></br>
					Link no Facebook:</br>
					<input type="url" name="txtfb" value="" size="50" class="form"></br>
					Infromações de produtos:</br>
					<textarea rows="4" cols="40" name="txtinfo" class="form2"></textarea></br>
					Sugestões/Criticas:</br>
					<textarea rows="4" cols="40" name="txtsuge" class="form2"></textarea></br>
					<input type="submit" name="btnenviar" value="Enviar" class="btn">
				</form>
			</div>
        </div>
		
    </div>
	<footer class="rodape">
       <img src="imagens/rodape.jpg" class="imgrodape"/>
    </footer>
</body>
</html>
