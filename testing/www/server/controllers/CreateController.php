<? 
//контроллер вызываемый по запросу /create
class CreateController implements IController
{
	//действие вызываемое изначально
	function indexAction()
	{//если пользователь вернулся на текущую страницу не создав тест, удаляем переменную в сессии
		if(isset($_SESSION['test']))
		{unset($_SESSION['test']);}
		
		$fc=FrontController::get();
		//создание экземпляра модели "вида"
		$view=new View();
		$view->keywords='Дистанционное тестирование, тестирование школьников, тестирование студентов, тестирование сотрудников, онлайн, тестирование, пройти тестирование, создать тест, о ИС, описание';
		$view->description='Информационная система дистанционного тестирования знаний, для студентов, пользователей, школьников и сотрудников предприятий. Вы можете легко создать или пройти тест...';
		$view->title='Создать тест';
		
		//если пользователь не зарегистрирован выводим предупреждение, иначе передаём данные виду с формой для создания тестов
		if(is_array($_SESSION['loginfo']) and !empty($_SESSION['loginfo']))
		{
			$result=$view->render('../views/create.php');
		}
		else
		{ 
			$view->content='<span id="create_guest">Только <a title="Зарегистрироватся" href="/registration">зарегистрировавшиеся</a> пользователи могут создавать тесты!</span>';
			$result=$view->render('../views/default.php');
		}
		$fc->setBody($result);
	}
	
	//действие вызываемое при создании пользовательского теста, вывод формы для добавления вопросов
	function usertestAction()
	{
		$fc=FrontController::get();
		$view=new View();
		$view->keywords='Дистанционное тестирование, тестирование школьников, тестирование студентов, тестирование сотрудников, онлайн, тестирование, пройти тестирование, создать тест, Добавление вопросов';
		$view->description='Информационная система дистанционного тестирования знаний, для студентов, пользователей, школьников и сотрудников предприятий. Вы можете легко создать или пройти тест...';
		$view->title='Добавление вопросов';

		//проверка существование отправленных формой переменных
		if(isset($_POST['test_name']) and isset($_POST['user_id']) and isset($_POST['country_id']) and isset($_POST['city_id']) and isset($_POST['test_description']) and isset($_POST['test_question']) and isset($_POST['test_min']) and isset($_POST['test_theme'])  and isset($_POST['test_new_theme']) and isset($_POST['test_var']))
		{
			//если параметры не пусты создаем сессию с пришедшими данными
			if(!empty($_POST['test_name']) and !empty($_POST['user_id']) and !empty($_POST['country_id']) and !empty($_POST['city_id']) and !empty($_POST['test_description']) and !empty($_POST['test_question']) and !empty($_POST['test_min']) and !empty($_POST['test_theme']) and !empty($_POST['test_var']) and !empty($_POST['test_description']) and ((int)$_POST['test_var']!=0) and ((int)$_POST['test_min']!=0))
			{
				
				//если пользователь не нашел нужной темы, то добавляем тему пользователя
				if(!empty($_POST['test_new_theme']) and !is_numeric($_POST['test_new_theme']))
				{
					$new_theme_id=Create::addNewUserTheme($_POST['test_new_theme'], $_POST['new_theme_descr']);
					if($new_theme_id=='false')
						echo 'Ошибка при добавлении новой темы!';
					else
						$_SESSION['test']['test_theme']=$new_theme_id;
				}
				else
				{$_SESSION['test']['test_theme']=$_POST['test_theme'];}
				
				//добавляем данные с формы к ассоциативному массиву сессии
				$_SESSION['test']['test_name']=$_POST['test_name'];
				$_SESSION['test']['user_id']=$_POST['user_id'];
				$_SESSION['test']['country_id']=$_POST['country_id'];
				$_SESSION['test']['city_id']=$_POST['city_id'];
				$_SESSION['test']['test_description']=$_POST['test_description'];
				$_SESSION['test']['test_question']=$_POST['test_question'];
				$_SESSION['test']['test_min']=$_POST['test_min'];
				$_SESSION['test']['test_new_theme']=$_POST['test_new_theme'];
				$_SESSION['test']['test_var']=$_POST['test_var'];
				
				$view->content=true;
				$view->title='Добавление вопросов';
				$result=$view->render('../views/create.php');
				
			}
			else{
				$view->title='Ошибка при создании теста';
				$view->content='<span id="add_test_error">Вы должны заполнить поля формы корректно! И без пустых значений!<br><a href="/create"><< Вернутся и заполнить поля ещё раз</a></span>';
				$result=$view->render('../views/default.php');
				}
			
			
		}
		else{}
		
		$fc->setBody($result);
	}
	
	//метод вызываемый при добавлении теста
	function addAction()
	{
		$fc=FrontController::get();
		$view=new View();
		
		//если пользователь нажал на кнопку "создать тест"
		if(isset($_POST['quantity']) and isset($_POST['add_test']))
		{
		//проверка корректности значения скрытого поля с количеством вопросов
		if((int)($_POST['quantity'])!=0 or !empty($_SESSION['test']))
		{		
			//заносим пришедшие данные в сессию и отправляем её к модели для записи в БД
			$qnt=$_POST['quantity'];
			$answ=$_SESSION['test']['test_var'];
			
			
			for($i=1;$i<=$qnt;$i++)
			{
				
			$_SESSION['test']['question'.$i]=$_POST['question'.$i];
			$_SESSION['test']['answer'.$i]=$_POST['answer'.$i];
				
				for($j=1;$j<=$answ;$j++)
				{
						$_SESSION['test']['q'.$i.'var'.$j]=$_POST['q'.$i.'var'.$j];
				}
			}
			//вызом метода модели для добавления теста
			$result=Create::addUserTest($_SESSION['test'],$qnt,$answ);
			
			//проверка корректности добавления теста и вывод соответствующих сообщений
			if($result==true)
			{
				$view->content='Ваш тест успешно добавлен!<br><br><span id="back_link"><a href="/execute"><< Вернутся к тестам</a></span>';
				unset($_SESSION['test']);

			}
			else
			{
				$view->content='<span id="add_test_error">При добавлении теста возникли ошибки!<br>Код ошибки: '.$result.'<br><br><a href="../"><< Вернутся на главную</a></span>';
			}
			
			
		}//если пользователь зашел без необходимых параметров выводим предупреждение
		else{$view->content='Обнаружено несоответствие! Пожалуйста попробуйте создать тест еще раз!';}
		
		$view->keywords='Дистанционное тестирование, тестирование школьников, тестирование студентов, тестирование сотрудников, онлайн, тестирование, пройти тестирование, создать тест, добавить тест, пользовательский тест';
		$view->description='Информационная система дистанционного тестирования знаний, для студентов, пользователей, школьников и сотрудников предприятий. Вы можете легко создать тест...';
		$view->title='Добавление теста...';
		$result=$view->render('../views/default.php');
		$fc->setBody($result);
		}//если пользователь зашел не с требуемой страницы, то перенаправляем его
		else{header('Location: ../create');}
	}
}

?>