<?
//функция вывода форм редактирования созданных тестов по типу пользователя
function getForm($type,$usertests, $orgtests, $schooltests, $univertests)
{
	switch($type)
	{
		case '1': return userForm($usertests); break; //пользователь 
		case '2': return userForm($usertests); break; //студент 
		case '3': return userForm($usertests); break; //школьник 
		case '4': return teacherForm($usertests, $schooltests, $univertests); break; //учитель -
		case '5': return userForm($usertests); break; //рабочий 
		case '6': return chiefForm($usertests, $orgtests); break; //начальник 
		default: return 'Некорректный тип пользователя!'; break;
	}
	
}

//функция генерирует форму с тестами созданными пользователем
function userForm($usertests)
{
	return usetTests($usertests);
}

//функция выводит вопросы теста для редактирования, удаления и добавления
function questionsForm(array $content, $type, $test_id)
{

	$result='Всего вопросов в тесте: <b>'.count($content).'</b><center>';
	$num=1;
	
	foreach($content as $question)
	{
		$result.='<form action="/authorization/editquestion" method="post">
		<label for="question">Вопрос № '.$num.':</label><br>
		<textarea name="question" cols="60" rows="12">'.$question['question'].'</textarea><br>
		<label for="answer">Ответ на вопрос:</label><br>
		<input type="text" name="answer" maxlength="255" size="50" value="'.$question['answer'].'"><br>
		<label for="var1">Варианты ответа:</label><br>
		';
		//вывод вариантов ответа на вопрос
		for($i=1;$i<=30;$i++)
		{
			if($question['var'.$i]!=NULL)
			{
				$answ_count=$i;
				$result.=$i.') <input type="text" name="var'.$i.'" value="'.$question['var'.$i].'"><br>';	
			}
		}
		$num++;
		$result.='<br>
		<input type="hidden" name="test_type" value="'.$type.'">
		<input type="hidden" name="test_id" value="'.$test_id.'">
		<input type="hidden" name="answer_count" value="'.$answ_count.'">
		<input type="hidden" name="question_id" value="'.$question['id'].'">
		<input type="submit" name="question_save" value="Сохранить изменения"><br>
		<input type="submit" name="question_delete" value="Удалить вопрос"><br><br><br><hr>
		
		</form>
		';
	}
	
	return $result.'<br><form method="post" action="">
	<p><b>Добавление нового вопроса</b></p><p id="add_about"><i>Введите количество вариантов ответа:</i></p>
	<input type="text" id="var_new" name="vars" value="3" size="3" maxlength="2">
	<input type="button" id="add_new" name="add_question" value="Добавить вопрос"><br></form></center>';
	
}

//функция возвращает формы для редактирования статьей пользователя
function getArticles($articles)
{
	//проверка пришедших данных, ожидается ассоциативный массив
	if(is_array($articles))
	{
		$num=1;
		foreach($articles as $article)
		{
			$string.='<h1>Статья № '.$num.'</h1><center><form action="/articles/editarticle" method="post"><label for="title">Заголовок статьи:</label><br>
			<input type="text" size=80 maxlength="255" name="title" value="'.$article['title'].'"><br>
			<label for="description">Краткое описание статьи:</label><br>
			<textarea name="description" cols="70" rows="3">'.$article['meta_description'].'</textarea><br>
			
			<label for="text">Полный текст статьи:</label><br>
			<textarea name="text" cols="80" rows="45">'.$article['text'].'</textarea><br>
			<label for="keywords">Ключевые слова:</label><br>
			<input type="text" size="104" maxlength="255" name="keywords" value="'.$article['meta_key'].'"><br>
			<label for="image">Путь к адресу заглавного изображения к статье:</label><br>
			<input type="text" size="104" maxlength="255" name="image" value="'.$article['img'].'"><br>
			<a href="/articles/editcomments/article/'.$article['id'].'">&nbsp;Коментарии к статье&nbsp;</a>
			<h5 id="h5_article">Дата добавления: '.$article['date'].'<br>Всего просмотров: '.$article['count'].'<br>
			Голосов: '.$article['votes'].'<br>Оценка: '.$article['rating'].'
			</h5><input type="hidden" name="article_id" value="'.$article['id'].'">
			<span id="article_buttons"><input type="submit" name="edit" value="Сохранить изменения"><br>
			<input type="submit" name="delete" value="Удалить статью"></center></form></span>
			
			<hr>
			
			';
			$num++;
		}
		
		return $string;
	}
	else
	{
		return '<p>Вы еще не создали ни одной статьи!</p><span id="add_test_error"><a href="/articles/addarticle"><< К форме создания статей</a></span>';
	}
}


//функция для вывода формы добавления статьи
function addArticle()
{
	return '<p>Заполните все нижеслудующие поля для создания новой статьи и нажмите на кнопку "Добавить":</p>
	<form action="/articles/addarticle" method="post">
	<label for="title">Заголовок статьи:</label><br>
	<input type="text" name="title" size="100" maxlength="255" value=""><br>
	<label for="description">Введите краткое описание статьи:</label><br>
	<input type="text" size="100" maxlength="255" name="description" value=""><br>
	<label for="keywords">Введите ключевые слова через запятую:</label><br>
	<input type="text" name="keywords" size="100" maxlength="255" value=""><br>
	<label for="text">Введите полный текст статьи:</label><br>
	<textarea name="text" cols="77" rows="50"></textarea><br>
	<label for="image">Введите адрес к заглавной картинке:</label><br>
	<input type="text" name="image" size="100" maxlength="255" value="http://'.$_SERVER['HTTP_HOST'].'/css/img/no_img.gif"><br>
	<span id="add_button"><input type="submit" name="add" value="Добавить"></span>
	</form>';
}

//функция для вывода и добавление комментариев к статье
function showComments($article_id, $comments)
{
	$login='';
	
	if(!empty($_SESSION['loginfo']['login']))
		$login=$_SESSION['loginfo']['login'];
	
	$addcomment='<center><form action="#comments" method="post">
	<p>Добавить новый комментарий:</p>
	<label for="comment_txt">Введите текст комментария:</label><br>
	<textarea name="comment_txt" cols="60" rows="4"></textarea><br>
	<label for="name">Введите Ваше имя:</label><br>
	<input type="text" name="name" size="60" maxlength="55" value="'.$login.'"><br>
	<label for="captcha">Введите цифры с картинки:</label><br>
	<img src="http://'.$_SERVER['HTTP_HOST'].'/server/views/captcha.php"/><br>
	<input type="text" maxlength="50" size="30" name="captcha" value=""><br>
	<input type="hidden" name="article_id" value="'.$article_id.'">
	<input type="submit" name="addcomment" value="Добавить комментарий">
	</form></center>';
	
	if(is_string($comments) and isset($_POST['addcomment']))
	{
		return '<span id="comments"><h4>'.$comments.'</h4><br><span id="add_test_error"><a href=""><< Вернутся к списку комментариев</a></span><br><br><br><br>';
		
	}
	elseif(is_array($comments))
	{
	
	$content='<span id="comments"><h4>Комментарии:</h4><br>';
	
		foreach($comments as $comment)
		{
			if(!empty($comment['text']))
			{
				$content.='<p><b>'.$comment['author'].'</b><i> добавил комментарий: '.$comment['date'].'</i></p>
				<p>'.$comment['text'].'</p><hr>';
			}
		
		}
	
	   return  $content.$addcomment;
	

	}
	else return '<span id="comments"><h4>'.$comments.'</h4></span>'.$addcomment;

}

//функция редактирования комментариев к стаьте
function editComments($comments, $num)
{
	if(count($comments)==0)
	{
		return '<h4>К статье №'.$num.' еще не добавлено комментариев!</h4><br><span id="add_test_error"><a href="/articles/myarticles"><< Вернутся назад к моим статьям</a></span>';
	}
	else
	{
		if(is_array($comments))
		{
		$content='<h4>Всего '.count($comments).' комментарий(-ев) к статье № '.$num.':</h4><br>';
		$i=1;
		foreach($comments as $comment)
		{
			if(!empty($comment['text']))
			{
				$content.='<form action="" method="post">
				<h5>Комментарий № '.$i.'</h5>
				<p><b>'.$comment['author'].'</b><i> добавил комментарий: '.$comment['date'].'</i></p>
				<textarea cols="70" rows="5" name="comment_txt">'.$comment['text'].'</textarea><br>
				<input type="hidden" name="comment_id" value="'.$comment['id'].'">
				<input type="hidden" name="article_id" value="'.$num.'">
				<input type="submit" name="delete" value="Удалить комментарий">
				<input type="submit" name="edit" value="Сохранить изменения"><hr>				
				</form>';
			}
			$i++;
		
		}
	
	   return  $content.'<br><span id="add_test_error"><a href="/articles/myarticles"><< Вернутся назад к моим статьям</a></span>';
		}
			else return $comments.'<br><span id="add_test_error"><a href="/articles/myarticles"><< Вернутся назад к моим статьям</a></span>';
	}
}

function getCities($id, array $cities)
{
	foreach($cities as $city)
	{
		if($city['id']==$id)
		 	$result.='<option selected="selected" value="'.$city['id'].'">'.$city['name'].'</option>';
		else
			$result.='<option value="'.$city['id'].'">'.$city['name'].'</option>';
	}
	
	return $result;
}

//функция выводит организации пользователя для редактирования!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
function getMyOrganizations(array $data, $cities)
{
	$content='Всего организаций добавленных Вами: <b>'.count($data).'</b><br><br>';

	if(count($data)!=0)
	{
		$num=1;

		foreach($data as $org)
		{
		$content.='<form action="/organizations/my" method="post">
		<h5>Организация № '.$num.'</h5>
		<a href="/organizations/orgworkers/id/'.$org['id'].'">>> Сотрудники организации</a><br><br>
		<label for="name">Название организации:</label><br>
		<input type="text" name="name" size="105" maxlength="255" value="'.$org['name'].'"><br>
		<label for="about">О организиции:</label><br>
		<textarea name="about" cols="80" rows="9" >'.$org['about'].'</textarea><br>
		<img src="'.$org['image'].'"><br>
		<label for="image">Адрес лейбла/герба Вашей организации:</label><br>
		<input type="text" size="80" maxlength="255" name="image" value="'.$org['image'].'"><br>
		<label for="site">Адрес сайта добавляемой организации:</label><br>
		<input type="text" name="site" size="80" maxlength="255" value="'.$org['site'].'"><br>
		<label for="email">Адрес электронной почты организации:</label><br>
		<input type="email" size="80" maxlength="255" name="email" value="'.$org['email'].'"><br>
		<label for="tel">Телефон организации:</label><br>
		<input type="tel" size="80" maxlength="255" name="tel" value="'.$org['tel'].'"><br>
		<label for="city">Город, где расположена организация:</label>
		<select name="city">'.getCities($org['city_id'], $cities).'</select><br>
		<label for="address">Адрес организации:</label><br>
		<input type="text" size="80" maxlength="255" name="address" value="'.$org['address'].'"><br>
		<input type="hidden" name="org_id" value="'.$org['id'].'"><br>
		<input type="submit" name="save" value="Сохранить изменения">
		<input type="submit" name="delete" value="Удалить организацию"><br><br><hr>
		</form>';
		$num++;
		}
		$content.='<span id="add_test_error"><a href="/organizations/add">Добавить ещё организацию >></a></span><br><br><br>';
	}
	else
		$content.='<span id="add_test_error"><a href="/organizations/add">Добавте Вашу организацию >></a></span><br><br><br>';
	
	return $content;
}

//функция возвращает строку с названиями организаций пользователя
function getUserOrganizations(array $orgs, $id)
{
	$result;
	foreach($orgs as $org)
	{
		if($id==$org['id'])
			$result.='<option selected="selected" value="'.$org['id'].'">'.$org['name'].'</option>';
		else
			$result.='<option value="'.$org['id'].'">'.$org['name'].'</option>';
	}
	return $result;
}

//функция выводит формы для редактирования сотрудников
function getWorkersList($workers, $content, array $orgs)
{
	if(is_array($workers))
	{	//если пользователь еще не добавил ни одного сотрудника
		if(count($workers)==0)
		{
			$str.='Вы еще не добавили ни одного сотрудника!<br><span id="add_test_error"><a href="/organizations/addworker">Добавить сотрудника >></a></span><br><br><br>';
		}
		
		else
		{
			//проверка пришедших даных по организациям пользователя и вызов функции для генерации строки со списком организаций
			$str.=$content.'<br>Всего <b>'.count($workers).'</b> cотрудника(-ов)';
			
			
			$num=1;
			foreach($workers as $worker)
			{
				$str.='<h5>Сотрудник № '.$num.'</h5><center>
				<form action="/organizations/workers" method="post">
				<label for="org_id">Организация сотрудника:</label><br>
				<select name="org_id">'.getUserOrganizations($orgs, $worker['org_id']).'</select><br>
				<label for="fio">Ф.И.О. сотрудника:</label><br>
				<input type="text" name="fio" size="70" maxlength="255" value="'.$worker['fio'].'"><br>
				<label for="address">Адрес сотрудника:</label><br>
				<input type="text" name="address" size="70" maxlength="255" value="'.$worker['address'].'"><br>
				<label for="tel">Телефон сотрудника:</label><br>
				<input type="tel" name="tel" size="70" maxlength="255" value="'.$worker['tel'].'"><br>
				<label for="email">Электронная почта сотрудника:</label><br>
				<input type="email" name="email" size="70" maxlength="255" value="'.$worker['email'].'"><br>
				<label for="date">Дата добавления сотрудника:</label><br>
				<input type="date" name="date" size="70" maxlength="100" value="'.$worker['date'].'"><br>
				<input type="hidden" name="worker_id" value="'.$worker['id'].'"> 
				<input type="submit" name="save" value="Сохранить изменения"><input type="submit" name="delete" value="Удалить сотрудника и его результаты"></form></center><hr>
 				';
				$num++;
			}	
			
			$str.='<br><br><span id="add_test_error"><a href="/organizations/addworker">Добавить сотрудника >></a></span><br><br><br>';
		}
		
		return $str;
	}
	else return $str;
	
}

//функция для добавления нового сотрудника
function addWorker($addworker, array $orgs)
{
	if(count($orgs)==0)
		return '<p>Вы ещё не добавили ни одной организации для сотрудников!</p><span id="add_test_error"><a href="/organizations/add">Добавить новую организацию >></a></span><br><br><br>';
	else
		return $addworker.':<br><br><center><form action="/organizations/addworker" method="post">
	<label for="fio">Введите Ф.И.О. сотрудника:</label><br>
	<input type="text" name="fio" size=60 maxlength="255"><br>
	<label for="address">Введите адрес сотрудника:</label><br>
	<input type="text" name="address" size="60" maxlength="255"><br>
	<label for="tel">Введите телефон сотрудника:</label><br>
	<input type="tel" name="tel" maxlength="255" size="60"><br>
	<label for="email">Введите адрес электронной почты сотрудника:</label><br>
	<input type="email" name="email" maxlength="255" size="60"><br>
	<label for="orgs">Выберите организацию для сотрудника:</label>
	<select name="orgs">'.getUserOrganizations($orgs, -2).'</select><br>
	<input type="submit" name="add" value="Добавить">
 	</form></center>
	';	
}

//функция генерирует форму с организационными тестами созданными пользователем !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
function chiefForm($usertests, $orgtests)
{
	return usetTests($usertests).'<hr>'.orgTests($orgtests);
}

//функция редактирования пользовательских тестов
function usetTests($content)
{

	if(count($content)!=0)
	{
	$result='Всего создано пользовательских тестов: <b>'.count($content).'</b><br><br>
	<h3>Пользовательские тесты</h3>
	<table border="1" cellpadding="2" cellspacing="2"><tr><th>№</th><th>Название теста</th><th>Описание</th><th>Время на тест в мин.</th><th>Вопросы</th><th>Тема</th><th>Действие</th></tr>
	';

		//выборка тематики пользовательских тестов
		$types=Create::getUserTestsTypes();
		
	foreach($content as $item)
	{	
	$result.='<tr><form method="post" action="/authorization/edittest"><td>'.$item['id'].'</td><td>
	<textarea name="test_name" cols="20" rows="5">'.$item['name'].'</textarea><center><i>Добавлен: '.$item['date'].'</i></center></td><td>
	<textarea name="test_description" cols="20" rows="5">'.$item['description'].'</textarea></td>
	<td><input size="6" maxlength="3" type="text" value="'.$item['time_min'].'" name="test_time"></td>
	<td><input type="submit" name="tests" value="'.$item['quantity'].' +/-"></td>
	<td><select name="test_theme">';
	
	//выборка тем пользовательских тестов
	foreach($types as $k=>$v)
		{
			if($v['id']==$item['theme_id'])
				$result.='<option selected="selected" value="'.$v['id'].'">'.$v['name'].'</option>';
			else
				$result.='<option value="'.$v['id'].'">'.$v['name'].'</option>';
		}
	
	$result.='</select></td>
	<td><input type="hidden" name="test_id" value="'.$item['id'].'">
	<input type="hidden" name="test_type" value="user">
	<center>
	<input type="submit" name="edit" value="Сохранить"><input type="submit" name="del" value="Удалить"></center>
	</form></td>
	</tr>';
	
	
	}
	
	return $result.'</table><br>
	<i>Измененения вступят в силу после нажатия кнопки "Сохранить", для того чтобы удалить тест, нажмиет на кнопку "Удалить" в соответствующем поле столбца "Действие", а для редактирования вопросов теста нажмите на кнопку с количеством вопросов в столбце "Вопросы"</i><br><br>';
	}
	else
		return 'Вы не создали ни одного пользовательского теста!<br><span id="add_test_error"><a href="/create"><< К форме создания тестов</a></span>';
		
}

//функция редактирования организационных тестов!!!!!!!!!!!!!!!!!!!!!!!!!
function orgTests($content)
{
	if(count($content)!=0)
	{
	$result='Всего создано организационных тестов: <b>'.count($content).'</b><br><br>
	<h3>Тесты организаций</h3>
	<table border="1" cellpadding="2" cellspacing="2"><tr><th>№</th><th>Название теста</th><th>Описание</th><th>Время на тест в мин.</th><th>Вопросы</th><th>Тема</th><th>Организация</th><th>Действие</th></tr>
	';

		
	foreach($content as $item)
	{	
	$result.='<tr><form method="post" action="/authorization/editorgtest"><td>'.$item['id'].'</td><td>
	<textarea name="test_name" cols="20" rows="5">'.$item['name'].'</textarea><center><i>Добавлен: '.$item['date'].'</i></center></td><td>
	<textarea name="test_description" cols="20" rows="5">'.$item['description'].'</textarea></td>
	<td><input size="6" maxlength="3" type="text" value="'.$item['time_min'].'" name="test_time"></td>
	<td><input type="submit" name="tests" value="'.$item['quantity'].' +/-"></td>
	<td><select name="test_theme">';
	
	//выборка тематики организационных тестов
		$types=Organizations::get()->getTestsTypes();
		
	//выборка тем
	foreach($types as $k=>$v)
		{
			if($v['id']==$item['theme_id'])
				$result.='<option selected="selected" value="'.$v['id'].'">'.$v['themes'].'</option>';
			else
				$result.='<option value="'.$v['id'].'">'.$v['themes'].'</option>';
		}
	
	$result.='</select></td>
	<td><select name="test_org">';
	
	//выборка тестируемых организаций 
		$orgs=Organizations::get()->myOrganiztions($_SESSION['loginfo']['id']);
		
	//выборка организаций
	foreach($orgs as $k=>$v)
		{
			if($v['id']==$item['org_id'])
				$result.='<option selected="selected" value="'.$v['id'].'">'.$v['name'].'</option>';
			else
				$result.='<option value="'.$v['id'].'">'.$v['name'].'</option>';
		}
	
	
	$result.='</select></td>
	<td><input type="hidden" name="test_id" value="'.$item['id'].'">
	<input type="hidden" name="test_type" value="org">
	<center>
	<input type="submit" name="edit" value="Сохранить"><input type="submit" name="del" value="Удалить"></center>
	</form></td>
	</tr>';
	
	
	}
	
	return $result.'</table><br>
	<i>Измененения вступят в силу после нажатия кнопки "Сохранить", для того чтобы удалить тест, нажмиет на кнопку "Удалить" в соответствующем поле столбца "Действие", а для редактирования вопросов теста нажмите на кнопку с количеством вопросов в столбце "Вопросы"</i><br><br>';
	}
	else
		return 'Вы не создали ни одного организационного теста!<br><span id="add_test_error"><a href="/create"><< К форме создания тестов</a></span>';
		
}

//функция выводит информацию об организации пользователя если он есть в списках иначе вывод соответствующего сообщения
function getWorkerOrg($worker_org)
{
	if(is_array($worker_org))
	{
		foreach($worker_org as $org)
		{
			$myorg.='<h4>'.$org['name'].'</h4>
			<img src="'.$org['image'].'"><br>
			<h5>Информация:</h5>
			<p>'.$org['about'].'</p>
			<h5>Сайт:</h5>
			<h6><a href="http://'.$org['site'].'">'.$org['site'].'</a></h6>
			<h5>Адрес:</h5>
			<p>'.$org['address'].'</p>
			<h5>e-mail:</h5>
			<h6><a href="mailto:'.$org['email'].'">'.$org['email'].'</a></h6>
			<h5>Телефон:</h5>
			<p>'.$org['tel'].'</p>
			';	
		}
		
		return $myorg;
	}
	else return 'Вас нет в списках сотрудников организаций!';
}

//функция возвращает список тестов организации для прохождения
function getOrgTests($orgtests)
{
	if(is_array($orgtests))
	{
		$tests='Всего тестов: <b>'.count($orgtests).'</b><br>';
		foreach($orgtests as $test)
		{
			$tests.='<center><h4>'.$test['name'].'</h4></center>
			<h5>Описание теста:</h5>
			<p>'.$test['description'].'</p>
			<h5>Дата добавления: '.$test['date'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Вопросов в тесте: '.$test['quantity'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Время на выполнение: '.$test['time_min'].' мин.</h5>
			<center><h4><a href="/execute/orgtest/id/'.$test['id'].'">Пройти тест  > ></a></h4></center><br><hr>
			';
		}	
		return $tests;
	}
	else return 'Для данной организации ещё не создано тестов!';
}

//функция возвращает результат прохождения тестов пользователем
function getWorkerResults($workerresults)
{
	if(is_array($workerresults))
	{
		$results='Результаты <b>'.count($workerresults).'</b> теста(-ов) пройденых мной:';
		
		$num=1;
		foreach($workerresults as $test)
		{
			$results.='<h4><a href="/execute/orgtest/id/'.$test['test_id'].'">Тест № '.$num.'</a> пройден: '.$test['date'].' числа, результат: '.$test['result'].'% от 100%,  тест пройден за: '.$test['time_min'].' мин. </h4><br><hr>';
			$num++;
		
		}
		
		
		return $results;
	}
	else return 'Вы ещё не прошли ни одного теста!<h4><a href="/organizations/orgtests">Пройти тесты для сотрудников моей организации  > ></a></h4>';	
}

//функция возвращает форму с информацией об университетмах добавленных пользователем!!!!!!!!!!!!!!!!!!!
function getMyUniversities($myunivers, $cities)
{	
	if(is_array($myunivers))
	{
		if(count($myunivers)==0)
			return 'Вы еще не добавляли университетов!<br><span id="add_test_error"><a href="/universities/add">Добавить ВУЗ > > </a></span>';
		
		$result='Всего ВУЗ`ов добавленых Вами <b>'.count($myunivers).'</b>:<br>';
		$num=1;
		foreach($myunivers as $univer)
		{
			$result.='<h5>ВУЗ № '.$num.'</h5>
			<form action="/universities/edituniver" method="post">
			<label for="name">Название университета:</label><br>
			<input type="text" size="70" maxlength="255" name="name" value="'.$univer['name'].'"><br>
			<img src="'.$univer['image'].'"/><br>
			<label for="image">Адрес изображения:</label><br>
			<input type="text" size="70" maxlength="255" name="image" value="'.$univer['image'].'"><br>
			<label for="city">Город в котором расположен униерситет:</label>
			<select name="city">'.getCities($univer['city_id'], $cities).'</select><br>
			<label for="address">Адрес университета:</label><br>
			<input type="text" size="70" maxlength="255" name="address" value="'.$univer['address'].'"><br>
			<label for="about">О университете:</label><br>
			<textarea name="about" cols="54" rows="6">'.$univer['about'].'</textarea><br>
			<label for="site">Адрес сайта университета:</label><br>
			<input type="text" size="70" maxlength="255" name="site" value="'.$univer['site'].'"><br>
			<label for="email">Адрес электронной почты университета:</label><br>
			<input type="email" size="70" maxlength="255" name="email" value="'.$univer['email'].'"><br>
		    <label for="tel">Номер телефона:</label><br>
			<input type="tel" size="70" maxlength="255" name="tel" value="'.$univer['tel'].'"><br>
			<input type="hidden" name="univer_id" value="'.$univer['id'].'">
			<input type="submit" name="faculty" formaction="/universities/myfaculties" value="Факультеты университета">
			<input type="submit" name="save" value="Сохранить изменения"> <input type="submit" name="delete" value="Удалить ВУЗ">
			<br><br><hr></form>';
			$num++;
		}
		
		return $result.='<span id="add_test_error"><a href="/universities/add">Добавить ВУЗ > > </a></span><br><br><br>';
	}	
	else return 'Ошибка при выборке университетов пользователя!';
}

//функция выводит форму с данными о студентах дли их удаления или обновления!!!!!!!!!!!!
function getMyStudents($mystudents,$cities)
{
	if(is_array($mystudents))
	{
		$cts=getCities('0', $cities);
		
		$result='Всего Вами добавлено студентов: <b>'.count($mystudents).'<b><br><br>';
		
		foreach($mystudents as $student)
		{
			$result.='<form method="post" action="/universities/mystudents">
			<label for="fio">Ф.И.О. студента:</label><br>
			<input type="text" maxlength="255" size="65" name="fio" value="'.$student['fio'].'"><br>
			<label for="email">Адрес электронной почты студента:</label><br>
			<input type="email" maxlength="255" size="65" name="email" value="'.$student['email'].'"><br>
			<label for="tel">Номер телефона студента:</label><br>
			<input type="tel" maxlength="255" size="65" name="tel" value="'.$student['tel'].'"><br>
			<label for="address">Адрес студента:</label><br>
			<input type="text" maxlength="255" size="65" name="address" value="'.$student['address'].'"><br>
			<label for="date">Дата зачисления студента в ВУЗ:</label><br>
			<input type="date" maxlength="255" size="65" name="date" value="'.$student['date'].'"><br>
			<p id="pspoiler">Дополнительные параметры +</p>
			<div id="spoiler">
			<label for="city">Город в котором расположен ВУЗ:</label>
	<select id="ucity" onchange="getUniver()" name="city"><option value="0">Выберите город \/</option>
	'.$cts.'</select><br>
	
	<label id="label_univer" for="univer">ВУЗ в котором учится студент:</label>
	<select id="univer" onchange="getFaculty()" name="univer"></select><br>
	
	<label id="label_faculty" for="faculty">Факультет:</label>
	<select id="faculty" onchange="getCourse()" name="faculty"></select><br>
	
	<label id="label_course" for="course">Курс на котором обучается студент:</label>
	<span id="course"><select name="course"></select><br></span>
	
	<label id="label_group" for="group">Группу студента:</label>
	<select id="group" name="group"></select><br>
	
			</div>
			<input type="hidden" name="student_id" value="'.$student['id'].'">
			<input type="submit" name="delete" value="Удалить студента и его результаты"><input type="submit" name="save" value="Сохранить изменения">
			</form>
			';
		}
		
		return $result.'<br><span id="add_test_error"><a href="/universities/addstudent">Добавить студента > > </a></span><br><br><br><br>';
	}
	else return 'Вы еще не добавляли студнетов в базу!<br><span id="add_test_error"><a href="/universities/addstudent">Добавить студента > > </a></span><br><br>';
}

//функция выводит форму для добавления нового студента!!!!!!!!!!!!
function addNewStudent($addstudent, $cities)
{
	$cts=getCities('0', $cities);
	return $addstudent.'<br><br>
	<form action="/universities/addstudent" method="post">
	<label for="fio">Введите Ф.И.О. студента:</label><br>
	<input type="text" size="65" maxlength="255" name="fio"><br>
	<label for="email">Введите адрес электронной почты студента:</label><br>
	<input type="email" size="65" maxlength="255" name="email"><br>
	<label for="tel">Введите телефон студента:</label><br>
	<input type="tel" size="65" maxlength="255" name="tel"><br>
	<label for="address">Введите адрес студента:</label><br>
	<input type="tel" size="65" maxlength="255" name="address"><br>
	<label for="date">Введите дату зачисления студента в ВУЗ:</label><br>
	<input type="date" size="65" maxlength="255" name="date"><br>
	<label for="city">Город в котором расположен ВУЗ студента:</label>
	<select id="ucity" onchange="getUniver()" name="city"><option value="0">Выберите город \/</option>
	'.$cts.'</select><br>
	
	<label id="label_univer" for="univer">Выберите ВУЗ в котором учится студент:</label>
	<select id="univer" onchange="getFaculty()" name="univer"></select><br>
	
	<label id="label_faculty" for="faculty">Выберите факультет:</label>
	<select id="faculty" onchange="getCourse()" name="faculty"></select><br>
	
	<label id="label_course" for="course">Выберите курс на котором обучается студент:</label>
	<span id="course"><select name="course"></select><br></span>
	
	<label id="label_group" for="group">Выберите группу студента:</label>
	<select id="group" name="group"></select><br>
	
	<input type="submit" name="add" value="Добавить студента">
	</form>
	';
}


//функция возвращает максимальное значение курса передаваемого в многомерном массиве
function getCountCourse(array $courses, $fac_id)
{
		foreach($courses as $k=>$v)
		{
			if($v['faculty_id']==$fac_id)
				$res[]=$v['course'];
		}
		
		return count($res);
}

//функция возвращает количество специальностей на факультете
function getCountSpec(array $spec, $fac_id)
{
	foreach($spec as $k=>$v)
		{
			if($v['faculty_id']==$fac_id)
				$res[]=$v['id'];
		}
		
	return count($res);
}

//функция выводит строку со специальностями факультета
function getFacSpec(array $spec, $fac_id)
{
		foreach($spec as $k=>$v)
		{
			if($v['faculty_id']==$fac_id)
				$res[]=$v['name'];
		}
		
	return @implode(',',$res);
}

//функция выводит форму со списком факультетов университета для редактирования!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
function getFaculty($univer, $faculties, $courses, $specs)
{
	if(is_array($faculties))
	{
		$result='Всего факультетов в ВУЗ`е: <b>'.count($faculties).'</b><br>';
		
		$num=1;
		foreach($faculties as $fac)
		{
			$result.='<form action="/universities/myfaculties" method="post">
			<h5>Факультет № '.$num.'</h5>
			<label for="name">Название факультета:</label><br>
			<input type="text" maxlength="255" size="100" name="name" value="'.$fac['name'].'"<br>
			<input type="hidden" id="fac_id" name="fac_id" value="'.$fac['id'].'"><br>
			<label for="courses">Курсов на факультете:</label>
			<input type="number" name="courses" max="8" min="0" value="'.getCountCourse($courses, $fac['id']).'"><br>
			<label for="specs">Специальности факультета (добавлять через запятую, удалять слева на право) всего: <b>'.getCountSpec($specs, $fac['id']).'</b></label><br>		<input type="text" name="specs" size="100" maxlength="255" value="'.getFacSpec($specs, $fac['id']).'"><br>
			<input type="submit" name="groups" title="Редактирование и добавление групп" value="Студенческие группы факультета" formaction="/universities/mygroups">
			<input type="submit" title="Будут удалены все студенты и результаты прохождения тестов!" name="delete" value="Удалить факультет">
			<input type="submit" name="edit" value="Сохранить изменения"><hr>
			</form>';
			$num++;
		}
		
		return $result.'<p id="info">Для того чтобы добавить новый факультет, нажмите на ссылку:</p>
		<form action="/universities/addfaculty" method="post">
		<input type="hidden" name="univer_id" value="'.$univer.'">
		<h5 id="add_faculty">Добавить факультет > > </h5>
		</form>';
	}
	else
	{
		return '<p id="info">Вы ещё не добавляли факультеты к данному ВУЗ`у!</p>
		<form action="/universities/addfaculty" method="post">
		<input type="hidden" name="univer_id" value="'.$univer.'">
		<h5 id="add_faculty">Добавить факультет > > </h5>
		</form>
		';	
		
	}	
	
}

//функция возвращает строку c отмеченным параметром специальности
function selectedSpec(array $specs,$specialty_id)
{
	foreach($specs as $sp)
	{
		if($sp['id']==$specialty_id)
			$res.='<option selected="selected" value="'.$sp['id'].'">'.$sp['name'].'</option>';	
		else 
			$res.='<option value="'.$sp['id'].'">'.$sp['name'].'</option>';	
	}
	return $res;
}

//функция возвращает строку c отмеченным параметром курса
function selectedCourses(array $courses,$course_id)
{
	foreach($courses as $crss)
	{
		if($crss['id']==$course_id)
			$res.='<option selected="selected" value="'.$crss['id'].'">'.$crss['course'].'</option>';	
		else 
			$res.='<option value="'.$crss['id'].'">'.$crss['course'].'</option>';	
	}
	return $res;
}

//функция выводит список студенческих групп
function getGroups($fac_id, $groups, array $specs, array $courses)
{
	if(is_array($groups))	
	{
		
		
		if(count($groups)==0)	
			return '<b>Вы еще не добавляли студенческие группы к данному факультету!</b>
			<center><form action="/universities/mygroups" method="post">
			<input type="hidden" name="fac_id" value="'.$fac_id.'">
			<h5 id="add_group" onclick="getSpecCour()">Добавить студенческую группу > ></h5>
			</form></center>
			';
		
		$num=1;
		foreach($groups as $group)
		{
			
			$grps.='<form action="/universities/editgroups" method="post">
			<input type="hidden" name="group_id" value="'.$group['id'].'">
			<h5>Группа № '.$num.'</h5>
			<label for="name">Название группы:</label><br>
			<input type="text" name="name" maxlength="255" size="70" value="'.$group['name'].'"><br>
			<label for="year">Год набора группы:</label>
			<input type="number" max="3000" min="1950" name="year" value="'.$group['year'].'">
			<label for"course">Курсы:</label>
			<select name="course">'.selectedCourses($courses,$group['course_id']).'</select><br>
			<label for="spec">Специальности:</label><br>
			<select name="spec">'.selectedSpec($specs,$group['specialty_id']).'</select><br><br>
			<input type="submit" formaction="/universities/lessons" name="lessons" value="Предметы группы">
			<input type="submit" name="save" value="Сохранить изменения">
			<input type="submit" title="...и всех студентов данной группы с результатами прохождения тестов!" name="delete" value="Удалить группу">
			<hr></form>
			';
			$num++;
		}	
		
		return $grps.'<center><form action="/universities/mygroups" method="post">
			<input type="hidden" name="fac_id" value="'.$fac_id.'">
			<h5 id="add_group" onclick="getSpecCour()">Добавить студенческую группу > ></h5>
			</form></center>
			';;
	}
	else return 'Ошибка при выборке групп!';
}

//функция возвращает форму для редактирования предметов группы!!!!!!!!!!!!!!!!!!!!!!!!!
function getLessons($lessons, $group)
{
	$cnt=count($lessons);
	if($cnt!=0)
	{
		$res='<p>Всего предметов в данной группе: <b>'.$cnt.'</b></p>';
			
			$num=1;
			foreach($lessons as $lesson)
			{
				$res.='<form action="" method="post">
				<h5>Предмет № '.$num.'</h5>
				<label for="name">Название:</label><br>
				<input type="text" name="name" maxlength="255" size="60" value="'.$lesson['name'].'"><br>
				<input type="hidden" name="id" value="'.$lesson['id'].'">
				<input type="submit" name="save" value="Сохранить изменения">
				<input type="submit" name="delete" title="Также будут удалены тесты созданые для этого предмета и результаты их прохождения!" value="Удалить предмет">		<hr>
				</form>
				';
				$num++;
			}
			
		return $res.'<form action="/universities/lessons" method="post">
	<input type="hidden" name="group_id" value="'.$group.'">
	<h5 id="addlesson">Добавить предмет > ></h5>
	</form>';
	}
	else return '<b>Вы еще не добавляли предметов для данной группы студентов!</b>
	<form action="/universities/lessons" method="post">
	<input type="hidden" name="group_id" value="'.$group.'">
	<h5 id="addlesson">Добавить предмет > ></h5>
	</form>
	';
}

//функция выводит тесты учителя
function teacherForm($usertests, $schooltests, $univertests)
{
	return usetTests($usertests).'<hr>'.univerTests($univertests);
}

//функция выводит университетские тесты для редактирования!!!!!!!!!!!!!!!!!!!!!!!!!!!!
function univerTests($content)
{
	if(count($content)!=0)
	{
	$result='Всего создано университетских тестов: <b>'.count($content).'</b><br>
	<h3>Университетские тесты</h3>';

	//выборка тематики пользовательских тестов
	$univers=Universities::get()->getUniverIdName($_SESSION['loginfo']['id']);
		
	foreach($content as $item)
	{	
	$result.='<form method="post" action="/authorization/editunivertest"><h4>Тест № '.$item['id'].'</h4><h5>Добавлен: '.$item['date'].'</h5>
	<label for="test_name">Название теста:</label><br>
	<input type="text" name="test_name" maxlength="255" size="100" value="'.$item['name'].'"><br>
	<label for="test_description">Описание теста:</label><br>
	<textarea name="test_description" cols="77" rows="5">'.$item['description'].'</textarea><br>
	<label for="test_time">Время на выполнение теста:</label>
	<input size="4" maxlength="3" type="text" value="'.$item['time_min'].'" name="test_time"> мин.<br>
	<label for="tests">Вопросы теста:</label>
	<input type="submit" name="tests" value="'.$item['quantity'].' +/-"><br>
	<p id="pspoiler2">Дополнительные параметры созданного теста +</p>
	<div id="spoiler2">
	<label for="univer_id" id="univer_label">Университет:</label>
	<select name="univer" id="univer" onchange="getFaculty()">
	<option value="0">Выберите университет для изменения теста \/</option>
	';
	
	//выборка университетов
	foreach($univers as $k=>$v)
		{
			if($v['id']==$item['theme_id'])
				$result.='<option selected="selected" value="'.$v['id'].'">'.$v['name'].'</option>';
			else
				$result.='<option value="'.$v['id'].'">'.$v['name'].'</option>';
		}
	
	$result.='</select><br>
	
	
	<label id="label_faculty" for="faculty">Выберите факультет:</label>
	<select id="faculty" onchange="getCourse()" name="faculty"></select><br>
	
	<label id="label_course" for="course">Выберите курс:</label>
	<span id="course"><select name="course"></select><br></span>
	
	<label id="label_group" for="group">Выберите тестируемую группу:</label>
	<select id="group" onchange="getLessons()" name="group"></select><br>
	
	<label id="label_lessons" for="group">Выберите предмет:</label>
	<select id="lessons" name="lessons"></select><br>
	
	</div>
	';
	
	$result.='<input type="hidden" name="test_id" value="'.$item['id'].'">
	<center>
	<input type="submit" name="edit" value="Сохранить"><input type="submit" name="delete" value="Удалить"></center><hr>
	</form>';
	
	
	}
	
	return $result.'<br>
	<i>Измененения вступят в силу после нажатия кнопки "Сохранить", для того чтобы удалить тест, нажмиет на кнопку "Удалить", а для редактирования вопросов теста нажмите на кнопку с количеством вопросов в столбце "Вопросы"</i><br><br>';
	}
	else
		return 'Вы не создали ни одного университетского теста!<br><span id="add_test_error"><a href="/create"><< К форме создания тестов</a></span>';
}

//функция выводит университет студента и список всех тестов для данного университета
function getStudentUniver($myuniver, $univertests)
{
	if(is_array($myuniver))
	{
		$res='<h3>'.$myuniver['name'].'</h3>
		<img src="'.$myuniver['image'].'"><br><br>
		<b>Описание: </b><br>'.$myuniver['about'].'<br><br>
		<b>Город: </b>'.$myuniver['city_id'].'<br><br>
		<b>Адрес: </b>'.$myuniver['address'].'<br><br>
		<b>Телефон: </b>'.$myuniver['tel'].'<br><br>
		<b>Адрес электронной почты: </b><a href="mailto:'.$myuniver['email'].'">'.$myuniver['email'].'</a><br><br>
		<b>Адрес сайта: </b><a href="http://'.$myuniver['site'].'">'.$myuniver['site'].'</a><br><br>';
		
		if(is_array($univertests))
		{
			$res.='<center><h4>Всего создано тестов для ВУЗ`а: '.count($univertests).'</h4><br><br>';
			
			$num=1;
			foreach($univertests as $test)
			{
				$res.='<h4>'.$num.'. <a title="Пройти тест..." href="/execute/univertest/id/'.$test['id'].'">'.$test['name'].'</a></h4>';
				$num++;
			}
			$res.='</center><br><br><br><br><br><br>';
			
			
		}
		else
			$res.='<h5>Для данного ВУЗ`а ещё не создано тестов!</h5>';
		
		return $res;
	}
	else
		return '<b>Вас нет в списках студентов какого-либо ВУЗ`а!</b>';
}

//функция выводит группу студента и созданные для данной группы тесты
function getStudentGroupTests($mygroup, $grouptests)
{
	if(is_array($mygroup))
	{
		$res='<h3>Студенческая группа: '.$mygroup['name'].'</h3>
		<b>Год набора группы: </b>'.$mygroup['year'].' <br>
		<b>Специальность: </b>'.$mygroup['specialty_id'].' <br>
		<b>Курс: </b>'.$mygroup['course_id'].' <br>
		<b>Студентов в группе: </b>'.$mygroup['students'].' <br>
		';
		
		if(is_array($grouptests))
		{
			$num=1;
			$res.='<center><h4>Всего созданно тестов для данной группы: '.count($grouptests).'</h4><br>';
			foreach($grouptests as $test)
			{
				$res.='<hr><h4>'.$num.'. <a title="Пройти тест..." href="/execute/univertest/id/'.$test['id'].'">'.$test['name'].'</a></h4><br>
				<b>Время на выполнение теста: </b>'.$test['time_min'].' мин.<br>
				<p><i>Описание теста:</i><br>'.$test['description'].'</p><br>';
				$num++;	
			}	
			
			return $res.'</center>';
		}
		else 
			$res.='<h5>Для данной студенческой группы ещё не создано тестов!</h5>';
		
		
		return $res;
	}
	else	
		 return '<b>Вы не числитесь ни в одной студенческой группе!</b>';
}

//возвращаем предметы и тесты созданные для них
function getTestsByLessons($mylessons, $lessonstests)
{
	if(is_array($mylessons))
	{
		$res='<h1>Всего предметов: '.count($mylessons).'</h1>
		Всего тестов: <b>'.count($lessonstests).'</b><br><br>';
		
		
		$num=1;
		foreach($mylessons as $lesson)
		{
			$res.='<h3>'.$num.'. '.$lesson['name'].':</h3><br>';
			
			if(is_array($lessonstests))
			{
				
				
				foreach($lessonstests as $test)
				{
				
					if($lesson['id']==$test['lesson_id'])
					{
					
				    $res.=' <center><b> - Название теста: <a title="Пройти тест..." href="/execute/univertest/id/'.$test['id'].'">'.$test['name'].'</a></b>	</center><br><br>
					<i><b>Описание теста: </b>'.$test['description'].'</i><br><br>
					Время на выполнение теста: <b>'.$test['time_min'].' мин.</b><br>
					Количество вопросов в тесте: <b>'.$test['quantity'].'</b><br><br>';
					$i=true;
					}
					
				
				}
				
					if(!isset($i))
					$res.=' <center>- <b>Для данного предмета ещё не создано тестов!</b><br></center>';
					unset($i);
			}
			else
				 $res.=' - <b>Для данного предмета ещё не создано тестов!</b><br>';
			
			$num++;	
			$res.='<hr><br>';
		}
		
		return $res;
	}
	else return '<b>Для Вашей группы еще не добавлено ни одного предмета!</b>';
	
}

//функция возвращает все школы добавленные пользователем
function getMySchools($myschools, $cities)
{	

	if(is_array($myschools))
	{
		if(count($myschools)==0)
			return 'Вы еще не добавляли школ!<br><span id="add_test_error"><a href="/schools/add">Добавить школу > > </a></span>';
		
		$result='Всего школ добавленых Вами <b>'.count($myschools).'</b>:<br>';
		$num=1;
		foreach($myschools as $school)
		{
			$result.='<h5>Порядковый номер школы № '.$num.'</h5>
			<form action="/schools/edit" method="post">
			<label for="name">Название школы:</label><br>
			<input type="text" size="70" maxlength="255" name="name" value="'.$school['name'].'"><br>
			<img src="'.$school['image'].'"/><br>
			<label for="image">Адрес изображения:</label><br>
			<input type="text" size="70" maxlength="255" name="image" value="'.$school['image'].'"><br>
			<label for="city">Город в котором расположена школа:</label>
			<select name="city">'.getCities($school['city_id'], $cities).'</select><br>
			<label for="address">Адрес школы:</label><br>
			<input type="text" size="70" maxlength="255" name="address" value="'.$school['address'].'"><br>
			<label for="about">О школе:</label><br>
			<textarea name="about" cols="54" rows="6">'.$school['about'].'</textarea><br>
			<label for="site">Адрес сайта школы:</label><br>
			<input type="text" size="70" maxlength="255" name="site" value="'.$school['site'].'"><br>
			<label for="email">Адрес электронной почты школы:</label><br>
			<input type="email" size="70" maxlength="255" name="email" value="'.$school['email'].'"><br>
		    <label for="tel">Номер телефона:</label><br>
			<input type="tel" size="70" maxlength="255" name="tel" value="'.$school['tel'].'"><br>
			<input type="hidden" name="school_id" value="'.$school['id'].'">
			<input type="hidden" name="user_id" value="'.$_SESSION['loginfo']['id'].'">
			<input type="submit" name="classes" formaction="/schools/classes" value="Классы школы">
			<input type="submit" name="save" value="Сохранить изменения"> <input type="submit" name="delete" value="Удалить школу">
			<br><br><hr></form>';
			$num++;
		}
		
		return $result.='<span id="add_test_error"><a href="/schools/add">Добавить школу > > </a></span><br><br><br>';
	}	
	else return 'Ошибка при выборке школ пользователя!';
}

//выводим классы школы
function getClasses($classes, $school_id)
{
	if(is_array($classes))
	{
		$result='<h4>Всего добавлено классов к школе: '.count($classes).'</h4><br><br>';
		
		$num=1;
		foreach($classes as $classes)
		{
			$result.='<h5>Класс № '.$num.'</h5><form action="/schools/classes" method="post">
			<label for="name">Название класса:</label><br>
			<input type="text" name="name" value="'.$classes['name'].'" size="75"><br>
			<input type="hidden" name="class_id" value="'.$classes['id'].'">
			<input type="submit" name="lessons" formaction="/schools/lessons" value="Предметы для данного класса">
			<input type="submit" name="save" value="Сохранить изменения">
			<input type="submit" title="Удаляет все результаты прохождения тестов, тесты, и учеников класса!" name="delete" value="Удалить класс"><hr>
			</form>';
			$num++;	
		}
		
		$result.='<form action="/schools/classes" method="post">
		<input type="hidden" name="school_id" value="'.$school_id.'">
		<h5 title="Добавить новый класс..." id="add_class">Добвать класс > ></h5>
		</form>
		';
		
		return $result;
	}
	else 
		return '<b>Ошибка при выборке классов!</b>';
}

//функция выводит все предметы для данного класса
function getSchoolLessons($lessons, $class_id)
{
	if(is_array($lessons))
	{
		$result='<h4>Всего предметов для данного класса: '.count($lessons).'</h4><br><br>';
		
		$num=1;
		foreach($lessons as $lesson)
		{
			$result.='<h5>Предмет № '.$num.'</h5><form action="/schools/lessons" method="post">
			<label for="name">Название предмета:</label><br>
			<input type="text" name="name" value="'.$lesson['name'].'" size="75"><br>
			<input type="hidden" name="lesson_id" value="'.$lesson['id'].'">
			<input type="submit" name="save" value="Сохранить изменения">
			<input type="submit" title="Удаляет все результаты прохождения тестов, тесты, и учеников класса!" name="delete" value="Удалить предмет"><hr>
			</form>';
			$num++;	
		}
		
		$result.='<form action="/schools/lessons" method="post">
		<input type="hidden" name="class_id" value="'.$class_id.'">
		<h5 title="Добавить новый предмет..." id="add_lesson">Добвать предмет > ></h5>
		</form>
		';
		
		return $result;
	}
	else 
		return '<b>Ошибка при выборке предметов класса!</b>';
}

//функция возвращает всех школьников добавленых пользователем
function getMyPupils($mypupils, $cities)
{
	if(is_array($mypupils))
	{
		
		$cts=getCities('0', $cities);
		
		$result='Всего Вами добавлено школьников: <b>'.count($mypupils).'<b><br><br>';
		
		foreach($mypupils as $pupil)
		{
			$result.='<form method="post" action="/schools/mypupils">
			<label for="fio">Ф.И.О. ученика:</label><br>
			<input type="text" maxlength="255" size="65" name="fio" value="'.$pupil['fio'].'"><br>
			<label for="email">Адрес электронной почты ученика:</label><br>
			<input type="email" maxlength="255" size="65" name="email" value="'.$pupil['email'].'"><br>
			<label for="tel">Номер телефона ученика:</label><br>
			<input type="tel" maxlength="255" size="65" name="tel" value="'.$pupil['tel'].'"><br>
			<label for="address">Адрес ученика:</label><br>
			<input type="text" maxlength="255" size="65" name="address" value="'.$pupil['address'].'"><br>
			<p id="pspoiler3">Дополнительные параметры +</p>
			<div id="spoiler3">
		
			<label id="label_scity" for="city">Город в котором расположена школа ученика:</label>
			<select id="scity" onchange="getSchool()" name="city"><option value="0">Выберите город \/</option>'.$cts.'
			</select><br>
			<label id="label_school" for="school">Выберите школу:</label>
			<select id="school" onchange="getClass()" name="school"></select><br>
	
			<label id="label_class" for="class">Выберите класс в котором учится школьник:</label>
			<select id="class" onchange="getButton()" name="class"></select><br>
			</div>
	
			
			<br>
			<input type="hidden" name="pupil_id" value="'.$pupil['id'].'">
			<input type="submit" name="save" value="Сохранить изменения">
			<input type="submit" name="delete" value="Удалить ученика и его результаты"><hr>
			</form>
			';
		}
		
		return $result.'<br><span id="add_test_error"><a href="/schools/addpupil">Добавить ученика > > </a></span><br><br><br><br>';
	}
	else return 'Вы еще не добавляли школьников в базу!<br><span id="add_test_error"><a href="/schools/addpupil">Добавить ученика > > </a></span><br><br>';
}

//функция выводит форму для добавления нового ученика
function addNewPupil($addpupil, $cities)
{
	$cts=getCities('0', $cities);

	return $addpupil.'<br><br>
	<form action="/schools/addpupil" method="post">
	<label for="fio">Введите Ф.И.О. школьника:</label><br>
	<input type="text" size="65" maxlength="255" name="fio"><br>
	<label for="email">Введите адрес электронной почты ученика:</label><br>
	<input type="email" size="65" maxlength="255" name="email"><br>
	<label for="tel">Введите телефон ученика:</label><br>
	<input type="tel" size="65" maxlength="255" name="tel"><br>
	<label for="address">Введите адрес школьника:</label><br>
	<input type="tel" size="65" maxlength="255" name="address"><br>
	<label for="city">Город в котором расположена школа ученика:</label>
	<select id="scity" onchange="getSchool()" name="city"><option value="0">Выберите город \/</option>'.$cts.'
	</select><br>
	<label id="label_school" for="school">Выберите школу:</label>
	<select id="school" onchange="getClass()" name="school"></select><br>
	
	<label id="label_class" for="class">Выберите класс в котором учится школьник:</label>
	<select id="class" onchange="getButton()" name="class"></select><br>
	
	<input type="submit" id="addbutton" name="add" value="Добавить ученика">
	</form>
	';
}

//функция выводит школу и список созданных для неё тестов
function getPupilSchool($myschool, $schooltests)
{
	if(is_array($myschool))
	{
		$res='<h3>'.$myschool['name'].'</h3>
		<img src="'.$myschool['image'].'"><br><br>
		<b>Описание: </b><br>'.$myschool['about'].'<br><br>
		<b>Город: </b>'.$myschool['city_id'].'<br><br>
		<b>Адрес: </b>'.$myschool['address'].'<br><br>
		<b>Телефон: </b>'.$myschool['tel'].'<br><br>
		<b>Адрес электронной почты: </b><a href="mailto:'.$myschool['email'].'">'.$myschool['email'].'</a><br><br>
		<b>Адрес сайта: </b><a href="http://'.$myschool['site'].'">'.$myschool['site'].'</a><br><br>';
		
		if(is_array($schooltests))
		{
			$res.='<center><h4>Всего создано тестов для школы: '.count($schooltests).'</h4><br><br>';
			
			$num=1;
			foreach($schooltests as $test)
			{
				$res.='<h4>'.$num.'. <a title="Пройти тест..." href="/execute/schooltest/id/'.$test['id'].'">'.$test['name'].'</a></h4>';
				$num++;
			}
			$res.='</center><br><br><br><br><br><br>';
			
			
		}
		else
			$res.='<h5>Для данной школы ещё не создано тестов!</h5>';
		
		return $res;
	}
	else
		return '<b>Вас нет в списках учеников каких-либо школ!</b>';
}

//функция возвращает списки предметов и созданых для них тестов
function getSchoolTestsByLessons($mylessons, $lessonstests)
{
	if(is_array($mylessons))
	{
		$res='<h1>Всего предметов: '.count($mylessons).'</h1>
		Всего тестов: <b>'.count($lessonstests).'</b><br><br>';
		
		
		$num=1;
		foreach($mylessons as $lesson)
		{
			$res.='<h3>'.$num.'. '.$lesson['name'].':</h3><br>';
			
			if(is_array($lessonstests))
			{
				foreach($lessonstests as $test)
				{
					if($lesson['id']==$test['lesson_id'])
					{
					
				    $res.=' <center><b> - Название теста: <a title="Пройти тест..." href="/execute/schooltest/id/'.$test['id'].'">'.$test['name'].'</a></b>	</center><br><br>
					<i><b>Описание теста: </b>'.$test['description'].'</i><br><br>
					Время на выполнение теста: <b>'.$test['time_min'].' мин.</b><br>
					Количество вопросов в тесте: <b>'.$test['quantity'].'</b><br><br>';
					$i=true;
					}
					
				
				}
				
					if(!isset($i))
					$res.=' <center>- <b>Для данного предмета ещё не создано тестов!</b><br></center>';
					unset($i);
			}
			else
				 $res.=' - <b>Для данного предмета ещё не создано тестов!</b><br>';
			
			$num++;	
			$res.='<hr><br>';
		}
		
		return $res;
	}
	else return '<b>Для Вашего класса еще не добавлено ни одного предмета!</b>';
}

//функция выводит информацию о классе ученика и тестах созданных для данного класса
function getPupilClassTests($myclass, $classtests)
{
	if(is_array($myclass))
	{
		$res='<h3>Класс: '.$myclass['name'].'</h3>
		<b>Учеников в классе: </b>'.$myclass['count'].' <br>
		';
		
		if(is_array($classtests))
		{
			$num=1;
			$res.='<center><h4>Всего созданно тестов для данного класса: '.count($classtests).'</h4><br>';
			foreach($classtests as $test)
			{
				$res.='<hr><h4>'.$num.'. <a title="Пройти тест..." href="/execute/schooltest/id/'.$test['id'].'">'.$test['name'].'</a></h4><br>
				<b>Время на выполнение теста: </b>'.$test['time_min'].' мин.<br>
				<p><i>Описание теста:</i><br>'.$test['description'].'</p><br>';
				$num++;	
			}	
			
			return $res.'</center>';
		}
		else 
			$res.='<h5>Для данного класса школы ещё не создано тестов!</h5>';
		
		
		return $res;
	}
	else	
		 return '<b>Вы не числитесь ни в одном классе школы!</b>';
}

?>