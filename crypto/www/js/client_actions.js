//функция отсчитывает время в минтах от заданного значения!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
function getTimer(time_min)
{
	
}

$(document).ready(function() { 

//функция добавляет вопрос к редактируемому тесту
$('#add_new').click(function(){
	
	var vars=document.getElementById("var_new").value;
	$(this).hide();
	$("#var_new").hide();
	$("#add_about").hide();
	
	var add='<p>Введите вопрос:</p><form method="post" action="';
	var url=document.URL;
	add+=url+'/addquestion/new"><textarea cols="80" rows="11" name="question"></textarea><p>Введите ответ на вопрос:</p><input type="text" name="answer" size="90" maxlength="255" value=""><br><p>Введите варианты ответа:</p>';	
	
	if(vars>30)
		vars=30;
		
	for(i=0;i<vars;i++)
	{
		var num=i+1;
		add+='<input type="text" name="var'+num+'" size="80" maxlength="255" value=""><br>';
	}
	
	add+='<input type="hidden" name="count" value="'+num+'"><input type="submit" name="add_question" value="Добавить новый вопрос">';
	
	$(this).after(add);
	
	});

//функция добавляет еще один вопрос при создании теста 
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
		if(newvalue!=null)
		{
		newvalue.value=document.getElementsByTagName('textarea').length;
		}
	 }
	 //вызов функции только на конкретном адресе
	 function checkURL()
	 {
		var url=document.URL;
		var res=url.indexOf('create/usertest',0);
		if(res!=-1)
		{
			getQuantity();
		}
	 }
	
	//поверка текущего адреса
	checkURL();


});