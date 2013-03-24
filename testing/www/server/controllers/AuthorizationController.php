<?
//контроллер вызываемый по запросу /authorization
class AuthorizationController implements IController
{
	function indexAction()
	{
		$fc=FrontController::get();
		
		//проверка и корректировка введеных пользователем данных
			if(isset($_POST['login']) and isset($_POST['password']))
			{ 
				if(!empty($_POST['login']) and !empty($_POST['password']))
				{
					$login=htmlspecialchars(stripslashes(trim($_POST['login'])));
					$password=htmlspecialchars(stripslashes(trim($_POST['password'])));
					//создание экземпляра модели Check "проверка пользователя из базы данных"
					$check=new Check($login,$password);
					$user=$check->getResult();
					if(is_array($user))
					{//перенаправляем пользователя на страницу с его профилем
						$_SESSION['loginfo']=$check->getResult(); 
						header('Location: authorization/profile');
					}
					else{$content='<b>'.$check->getResult().'</b>';}
				}
				else{$content='<b>Пустые значения недопустимы!</b>';}
				
		$view=new View();
		$view->content=$content;
		$view->keywords='Дистанционное тестирование, тестирование школьников, тестирование студентов, тестирование сотрудников, онлайн, тестирование, пройти тестирование, создать тест, о ИС, описание';
		$view->description='Информационная система дистанционного тестирования знаний, для студентов, пользователей, школьников и сотрудников предприятий. Вы можете легко создать или пройти тест, результаты будут';
		$view->title='Ошибка авторизации';
		$result=$view->render('../views/default.php');
		$fc->setBody($result);
		       
			}
		else
		{
			header('Location: ../');
		}
		
		
		
		
	}
	
	function exitAction()
	{
		//уничтожение сессии и перенаправление на главную страницу
		session_destroy();
		header('Location: ../');
	}
	
	function profileAction()
	{
		//если в переменной сессии массив, то выводим данные о пользователе
		if(is_array($_SESSION['loginfo']))
		{
		$fc=FrontController::get();
		$view=new View();
		$view->content=$_SESSION['loginfo'];
		$view->keywords='Дистанционное тестирование, тестирование школьников, тестирование студентов, тестирование сотрудников, онлайн, тестирование, пройти тестирование, создать тест, о ИС, описание';
		$view->description='Информационная система дистанционного тестирования знаний, для студентов, пользователей, школьников и сотрудников предприятий. Вы можете легко создать или пройти тест, результаты будут';
		$view->title='Пользователь: '.$_SESSION['loginfo']['login'];
		$result=$view->render('../views/profile.php');
		$fc->setBody($result);
		}
		else{header('Location: ../');}
	}
}

?>