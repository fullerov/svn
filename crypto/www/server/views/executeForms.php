<?
//функция выводит список пользовательских тестов
function getUserTests($tests)
	{
		$str='<h2><a href="/execute/usertest/all" title="Все пользовательские тесты">Пользовательские тесты:</a></h2>
			 <span class="execute_test">';
		//если функция принимает значение типа массив, то выводим тесты, иначе выводим тест ошибки
		if(is_array($tests))
		{
			foreach($tests as $test)
			{
				$str.='<br><h3><a href="/execute/usertest/id/'.$test['id'].'" title="Пройти тест...">'.$test['name'].'</a></h3>
				<p>'.$test['description'].'<p>
				<br><h5> Тема теста: <a href="search/usertest/id/'.$test['theme_id'].'">'.Execute::getUserTestTheme($test['theme_id']).'</a> Тест добавил: <a href="mailto:'.Registration::getUserEmail($test['user_id']).'">'.Registration::getUserLogin($test['user_id']).'</a><h6>Дата добавления: '.$test['date'].'</h6></h5><br>';
				
			}
			return $str.'</span>';
		}
		else{ return $str.'<br></span>'.$tests;}
		
		
	}

//функция выводит бланк и тестовыми вопросами	!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
function beginUserTest($tests,$id)
{
	if(is_array($tests))
	{
		$str='Ответьте на следующие вопросы и нажмите на кнопку "Готово"<hr><form action="/execute/result" method="post">';
		for($i=0;$i<count($tests);$i++)
		{
			$num=$i+1;
			$str.= '<h4>'.($num).') Вопрос: </h4><br>
				<p id="question">'.$tests[$i]['question'].'</p>
				<h5>Выберите вариант ответа:</h5>
				';
			
			$str.='<p class="select_answ">';
			for($j=1;$j<=30;$j++)
			{
				
				if($tests[$i]['var'.$j]!=NULL)
					$str.=''.$j.'.<input type="radio" name="q'.$num.'" value="'.$tests[$i]['var'.$j].'">'.$tests[$i]['var'.$j].'<br>';
			}
			
			$str.='</p><hr></span>';	
			//установка текущего идентификатора вопроса
			$_SESSION['exec']['q'.$num]=$tests[$i]['id'];	
		}
		$str.='<span id="done"><input type="submit" name="submit" value="Готово"></span>
		</form>';
		
		//установка данных о пройденом тесте в сессию
		$_SESSION['exec']['type']='user';
		$_SESSION['exec']['id']=$id;
		$_SESSION['exec']['count']=count($tests);
		return $str;
	}
	else{return $tests;}
}

?>