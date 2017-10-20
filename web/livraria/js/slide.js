$(function(){
	
	var liWidth = $("#fotos ul li").outerWidth(),
		speed 	= 2500,
		rotacao = setInterval(auto, speed);

	//Mosra os botoes quando o mouse passa em cima
	$("section#fotos").hover(function(){
		$("section#botao").fadeIn();
		clearInterval(rotacao); // clearInterval faz o slide parar quado o mouse estiver em cima
	}, function(){
		$("section#botao").fadeOut();
		rotacao = setInterval(auto, speed);
	});
	
	//Proximo
	$(".proximo").click(function(e){
		e.preventDefault();
		
		$("section#fotos ul").css({'width':'9999%'}).animate({left:-liWidth},function(){
			$("#fotos ul li").last().after($("#fotos ul li").first());
			$(this).css({'left':'0', 'width':'auto'});
		});		
	});
	
	//Anterior
	$(".anterior").click(function(e){
		e.preventDefault(); //cancela a operacao do link
		
		$("#fotos ul li").first().before($("#fotos ul li").last().css({'margin-left':-liWidth}));
		$("section#fotos ul").css({'width':'9999%'}).animate({left:liWidth}, function(){
			$("#fotos ul li").first().css({'margin-left':'0'});
			$(this).css({'left':'0', 'width':'auto'});
			
		});
	});
	
	function auto(){
		$(".proximo").click();
	}
	
});

function mudaFoto(foto){
	document.getElementById("icone").src = foto;
}


	
	
