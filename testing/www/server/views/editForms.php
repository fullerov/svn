<?
//функция вывода форм создания теста для соответствующего типа пользователя
function getForm($type,$content)
{
	switch($type)
	{
		case '3': return userForm($content); break; //ученик
		case '1': return userForm($content); break; //пользователь
		default: return userForm($content); break;
	}
	
}

//функция генерирует форму с тестами созданными пользователем
function userForm(array $content)
{
	if(count($content)!=0)
	{
	$result='Всего создано тестов: <b>'.count($content).'</b><br><br>
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
		return 'Вы не создали ни одного теста!';
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
		return '<p>Вы еще не создали ни одной статьи!</p>';
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
?>