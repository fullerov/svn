<?
//функция вывода форм редактирования созданных тестов по типу пользователя
function getForm($type,$usertests, $orgtests, $schooltests, $univertests)
{
	switch($type)
	{
		case '1': return userForm($usertests); break; //пользователь +
		case '2': return userForm($usertests); break; //студент -
		case '3': return userForm($usertests); break; //школьник -
		case '4': return teacherForm($usertests, $schooltests, $univertests); break; //учитель -
		case '5': return userForm($usertests); break; //рабочий +
		case '6': return chiefForm($usertests, $orgtests); break; //начальник +
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
			<input type="submit" name="save" value="Сохранить изменения"> <input type="submit" name="delete" value="Удалить ВУЗ">
			<br><br><hr></form>';
			$num++;
		}
		
		return $result.='<span id="add_test_error"><a href="/universities/add">Добавить ВУЗ > > </a></span><br><br><br>';
	}	
	else return 'Ошибка при выборке университетов пользователя!';
}

//функция выводит форму с данными о студентах!!!!!!!!!!!!
function getMyStudents($mystudents)
{
	if(is_array($mystudents))
	{
		foreach($mystudents as $student)
		{
			
		}
	}
	else return 'Вы еще не добавляли студнетов в базу!<br><span id="add_test_error"><a href="/universities/addstudent">Добавить студента > > </a></span><br><br>';
}

//функция выводит форму для добавления нового студента!!!!!!!!!!!!
function addNewStudent($addstudent)
{
	return $addstudent.'<br>';
}

?>