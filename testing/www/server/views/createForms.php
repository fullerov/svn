<?
//функция вывода форм создания теста для соответствующего типа пользователя
function getForm($type)
{
	if($type==1)
	{
		return userForm();
	}

}

//функция возвращает форму для создания пользовательского теста
function userForm()
	{
		//выборка тематики пользовательских тестов
		$types=Create::getUserTestsTypes();
		
		foreach($types as $k=>$v)
		{
			$test_types.='<option value="'.$v['id'].'">'.$v['name'].'</option>';
			$i++;
		}
		
		return '<h3>Создание пользовательского теста</h3>
		<center><form action="/create/usertest" method="post">
		<label for="test_name">Введите название создаваемого теста:</label><br>
		<input type="text" size="64" maxlength="255" name="test_name" value=""><br>
		<input type="hidden" maxlength="255" name="user_id" value="'.$_SESSION['loginfo']['id'].'">
		<input type="hidden" maxlength="255" name="country_id" value="'.$_SESSION['loginfo']['country_id'].'">
		<input type="hidden" maxlength="255" name="city_id" value="'.$_SESSION['loginfo']['city_id'].'">
		<label for="test_description">Введите описание теста:</label><br>
		<textarea name="test_description" rows="7" cols="50"></textarea><br>
		<label for="test_question">Введите количество вопросов в тесте:</label>
		<input type="text" size="5" maxlength="3" name="test_question"><br>
		<label for="test_var">Введите количество вариантов ответа на вопрос:</label>
		<input type="text" size="5" maxlength="3" name="test_var"><br>
		<label for="test_min">Максимальное время на выполнения теста в минутах:</label>
		<input type="text" size="5" maxlength="3" name="test_min"><br><br>
		<label for="test_theme">Выберите тематику теста:</label>
		<select name="test_theme">'.$test_types.'</select><br>
		<label for="test_new_theme"><i>если Вы не нашли соответствующей темы, создайте новую:</i></label><br>
		<input type="text" name="test_new_theme" maxlength="255" size="65"><br>
		<input type="submit" name="submit" value="Создать тест">
		</form></center>
		';
	}

//функция возвращает формы для создания вопросов к тесту, количество созданных форм определяется передаваемым параметром
function getQuestionsForms($quantity,$var)
{	
	//установка ограничения на количество ответов на вопрос
	if($var>30)
	{$var=30;}
	
	//установка ограничения на количество вопросов
	if($quantity>500)
	{$quantity=500;}
	
	$forms='<form action="http://'.$_SERVER['HTTP_HOST'].'/create/add" method="post">';
	
	for($i=0;$i<$quantity;$i++)
	{
		$forms.='<br><label id="question_label">Введите вопрос №'.($i+1).':</label><br>
				<textarea name="question'.($i+1).'" rows="10" cols="60"></textarea><br>
				<label>Введите ответ на вопрос:</label><br>
				<input type="text" name="answer'.($i+1).'" size="70" maxlength="255"><br>
				<label>Введите варианты ответа:</label><br>
				<span id="vars">
			
		';
		
			for($j=0;$j<$var;$j++)
			{
					$forms.='<span id="num_answer">'.($j+1).')</span> <input class="answ" type="text" name="q'.($i+1).'var'.($j+1).'" size="60" maxlength="255"><br>';

			}
			
			$forms.='</span>';
			
		
	}
	
	
	
	
	$forms.='<input type="hidden" id="hidden_q" name="quantity" value="">
	<br><input type="button" id="add" name="add_question" value="Добавить еще вопрос"><span id="create_test_button"><br>
	<input type="submit" name="add_test" value="Создать тест">
	</span></form>';
	
	return $forms;
}


?>