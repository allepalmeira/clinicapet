// Animação Banner
$('.banner').slick({
	slidesToShow: 1,
	slidesToScroll: 1,
	autoplay: true,
	dots: true,
	autoplaySpeed: 5000,
});
$('.depoimentoCarrocel').slick({
	slidesToShow: 1,
	slidesToScroll: 1,
	autoplay: true,
	autoplaySpeed: 5000,
});
// Animação WOW
new WOW().init();
//MENU FIXO
window.onscroll = function(){
	var top = window.pageYOffset || document.documentElement.scrollTop;
	
	
	if(top > 400){ //SE
		//console.log(top);
		document.getElementById("Menu").classList.add("menuFixo");
	}else{ //SENÃO
		//console.log("Menor que 400");
		document.getElementById("Menu").classList.remove("menuFixo");
	}
};
// ################# INSTAGRAM :)
// CRIAR VARIÁVEIS PARA GUARDAR INFORMAÇÕES:
// let - De bloco / var - Global / const - Única 
let token = "3620118499.8718157.fc3fd9fcaece4e6da8472a30f933b708&amp";
let qtdImagens = 20;
let bloco = document.getElementById("instagram");
let galeria = document.createElement("script");
// CRIAR FUNÇÃO PARA CARREGAR O CONTEÚDO
window.galeriaInsta = function(objeto){
	
	
	for(let x in objeto.data){
		
		//console.log(objeto.data[x].tags);
		bloco.innerHTML += `<div class="slide">
			<a href="${objeto.data[x].link}" target="_blank">
				<img src="${objeto.data[x].images.thumbnail.url}" alt="${objeto.data[x].tags}">
			</a>
		</div>`
		
	}
	
	var largura = window.innerWidth;
	
	window.addEventListener('resize', function(){
		console.log("Largura" + largura);
	});
	
	console.log("Largura - " + largura);
	
	// Largura Mobile
	if(largura <= 480){ // SE
		var qtdImg = 2;
	
	// Largura Tablet
	}else if(largura <= 768){ // SENÃO SE
		var qtdImg = 4;	
	
	// Largura Desktop
	}else if(largura <= 1200){// SENÃO
		var qtdImg = 6;
		
	// Largura Acima de 1200
	}else{
		var qtdImg = 9;
	};
	
	$('.instaCar').slick({
		slidesToShow: qtdImg,
		slidesToScroll: 1,
		autoplay: true,
		autoplaySpeed: 4000,
	});
	
};
galeria.setAttribute("src", "https://api.instagram.com/v1/users/self/media/recent?access_token=" + token + "&count=" + qtdImagens + "&callback=galeriaInsta");
document.body.appendChild(galeria);
