// JavaScript style
$(document).ready(function() {
//авторизация

	//изменение стиля кнопки "Авторизация" при нажатии и отображение формы авторизации
	$("#auth").toggle(function(){ 
    $(this).css({"color":"#BFAC9B","font-style":"normal","background-color":"#F0E8DF"});
	$("#auth_block").css({"visibility":"visible","height":"112px"});
		},function(){	
	$(this).css({"color":"#FFF","font-style":"normal","background-color":"#D0C0B1"});
	$("#auth_block").css({"visibility":"hidden","height":"0px"});
			});
			
	//изменение стиля кнопок "Вход" и "Регистрация" при наведении курсора
	$("#auth_button").hover(function(){
		$(this).css({"color":"#FFF","background-color":"#CABAAA"});
		},function(){
	    $(this).css({"color":"#CABAAA","background-color":"transparent"});
		});
	$("#reg_button").hover(function(){
		$(this).css({"color":"#FFF","background-color":"#CABAAA"});
		},function(){
	    $(this).css({"color":"#CABAAA","background-color":"transparent"});
		});

//изменение стиля ссылок бокового меню
	$("#left_menu p a").hover(function(){
		
		$("#menu_name").css("color","#FFF");
		$(this).css({"color":"#FCF8F3","background-color":"#CEBEAE"});	
		
		},function(){
			
			$("#menu_name").css("color","#E1E1E1");
			$(this).css({"color":"#D0C0B1","background-color":"transparent"});
			});
			
	 //изменение ссылок верхнего меню
	 $("#top_menu a").hover(function(){
		 
		 $(this).css({"color":"#FFF","font-style":"normal","background-color":"#D6C7B8"});
		 
		 },function(){
			 
		 $(this).css({"color":"#D6C7B8","font-style":"normal","background-color":"#F2EBE3"});
		 
			 });
		
			
			
//конец функции ready			
});