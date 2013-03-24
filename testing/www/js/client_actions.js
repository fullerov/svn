$(document).ready(function() { 

//функция добавления вопроса
$('#add').click(function(){
	
	var txtar=document.getElementsByTagName('textarea'); 
	var txt=document.getElementsByClassName('answ');
	
	var qstn=txtar.length; // количество вопросов
	var answr=txt.length; //количество ответов
	
	//количество вариантов ответа для каждого вопроса
	var oneanswr=answr/qstn;  
	var addqstn=++qstn;
	
	//динамическая генерация формы добавления вопроса
	var str='<br><label id="question_label">Введите вопрос №'+addqstn+':</label><br><textarea name="question'+addqstn+'" rows="10" cols="60"></textarea><br><label>Введите ответ на вопрос:</label><br><input type="text" name="answer'+addqstn+'" size="70" maxlength="255"><br><label>Введите варианты ответа:</label><br><span id="vars">';
	
	var i=0;
	while(i<oneanswr)
	{
		var j=++i;
		str+='<span id="num_answer">'+j+')</span> <input class="answ" type="text" name="q'+addqstn+'var'+j+'" size="60" maxlength="255"><br>';
	}
	
	str+='</span><br><br>';
	
	//вывод сгенерированной формы перед кнопкой "Добавить еще вопрос"
	$(this).before(str);
	
	//установка количества добавленых вопросов в скрытое поле
	getQuantity();
	
	});
	
	 //функция вычисляет количество отображенных на экране полей ввода вопроса
	 function getQuantity()
	 {
		var newvalue=document.getElementById('hidden_q');
		newvalue.value=document.getElementsByTagName('textarea').length;
	 }
	 
	 //задается изначальное количесиво отображенных полей для ввода вопросов
	 getQuantity();
	 
});