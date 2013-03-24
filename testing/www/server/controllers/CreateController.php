<? 
//контроллер вызываемый по запросу /create
class CreateController implements IController
{
	//действие вызываемое изначально
	function indexAction()
	{
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
	
	//действие вызываемое при создании пользовательского теста
	function usertestAction()
	{
		$fc=FrontController::get();
		$view=new View();
		
		//вывод формы для добавления вопросов
		$view->keywords='Дистанционное тестирование, тестирование школьников, тестирование студентов, тестирование сотрудников, онлайн, тестирование, пройти тестирование, создать тест, Добавление вопросов';
		$view->description='Информационная система дистанционного тестирования знаний, для студентов, пользователей, школьников и сотрудников предприятий. Вы можете легко создать или пройти тест...';
		$view->title='Добавление вопросов';

		//проверка существование отправленных формай переменных
		if(isset($_POST['test_name']) and isset($_POST['user_id']) and isset($_POST['country_id']) and isset($_POST['city_id']) and isset($_POST['test_description']) and isset($_POST['test_question']) and isset($_POST['test_min']) and isset($_POST['test_theme'])  and isset($_POST['test_new_theme']) and isset($_POST['test_var']))
		{
			//если пареметры не пусты создаем сессию с пришедшими данными
			if(!empty($_POST['test_name']) and !empty($_POST['user_id']) and !empty($_POST['country_id']) and !empty($_POST['city_id']) and !empty($_POST['test_description']) and !empty($_POST['test_question']) and !empty($_POST['test_min']) and !empty($_POST['test_theme']) and !empty($_POST['test_var']))
			{
				$_SESSION['test']['test_name']=$_POST['test_name'];
				$_SESSION['test']['user_id']=$_POST['user_id'];
				$_SESSION['test']['country_id']=$_POST['country_id'];
				$_SESSION['test']['city_id']=$_POST['city_id'];
				$_SESSION['test']['test_description']=$_POST['test_description'];
				$_SESSION['test']['test_question']=$_POST['test_question'];
				$_SESSION['test']['test_min']=$_POST['test_min'];
				$_SESSION['test']['test_theme']=$_POST['test_theme'];
				$_SESSION['test']['test_new_theme']=$_POST['test_new_theme'];
				$_SESSION['test']['test_var']=$_POST['test_var'];
				
				$view->content=true;
				$view->title='Добавление вопросов';
				$result=$view->render('../views/create.php');
				
			}
			else{
				$view->title='Ошибка при создании теста';
				$view->content='<span id="add_test_error">Вы должны заполнить поля формы корректно! Без пустых значений!<br><a href="/create"><< Вернутся и заполнить поля ещё раз</a></span>';
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
			//заносим пришедшие данные в сессию и отправляем её к модели для занесения в БД
			
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
			
			$result=Create::addUserTest($_SESSION['test'],$qnt,$answ);
			
			if($result!=false)
			{
				$view->content='Ваш тест успешно добавлен!';
			}
			else
			{
				$view->content='При добавлении теста возникли ошибки!';
			}
			
			$view->content=$result;
			
		}
		else{$view->content='Обнаружено несоответствие! Пожалуйста попробуйте создать тест еще раз!';}
		
		$view->keywords='Дистанционное тестирование, тестирование школьников, тестирование студентов, тестирование сотрудников, онлайн, тестирование, пройти тестирование, создать тест, добавить тест, пользовательский тест';
		$view->description='Информационная система дистанционного тестирования знаний, для студентов, пользователей, школьников и сотрудников предприятий. Вы можете легко создать тест...';
		$view->title='Добавление теста...';
		$result=$view->render('../views/default.php');
		$fc->setBody($result);
		}
		else{header('Location: ../create');}
	}
}

?>