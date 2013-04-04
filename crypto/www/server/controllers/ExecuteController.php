<? 
//контроллер вызываемый по запросу /execute
class ExecuteController implements IController
{
	//метод вызываемый изначально
	function indexAction()
	{
		$fc=FrontController::get();
		//создание экземпляра модели "вида"
		$view=new View();
		$view->keywords='Дистанционное тестирование, тестирование школьников, тестирование студентов, тестирование сотрудников, онлайн, тестирование, пройти тестирование, список всех тестов';
		$view->description='Информационная система дистанционного тестирования знаний, для студентов, пользователей, школьников и сотрудников предприятий. Вы можете легко создать или пройти тест...';
		
		//получение информации о пльзовательских тестов из БД указание диапазона выборки тестов
		$result=$view->usertests=Execute::getUserTests(1, 100);
		//проверка наличия тестов в базе данных
		if($result==false)
		{
			$view->content='<b>В базе данных еще нет ни одного теста!</b>';
			$view->title='Нет тестов в БД';
			$result=$view->render('../views/default.php');
		}
		else
		{
			$view->content='Для того чтобы пройти тест, кликните по заголовку теста:';
			$view->title='Все тесты';
			$result=$view->render('../views/execute.php');
		}
		
		$fc->setBody($result);
		
	}
	
	//метод вызываемый при выборе пользовательского теста для прохождения
	function usertestAction()
	{
		//создание экземпляра модели "вида"
		$fc=FrontController::get();
		$view=new View();
		//получение параметров из строки запроса
		$url=$fc->getParams();
		//вывод названия исполняемого теста
		$testname=Execute::getTestData($url['id'],'user');
		//вывод теста из базы по передаваемому параметру - идентификатору теста
		$test=Execute::getUserTestById($url['id']);
		$view->timer=$testname['time_min'];
		$view->title=$testname['name'];
		$view->content=$test;
		$view->id=$url['id'];
		$view->keywords='Дистанционное тестирование, тестирование школьников, тестирование студентов, тестирование сотрудников, онлайн, тестирование, пройти тестирование, список всех тестов';
		$view->description='Информационная система дистанционного тестирования знаний, для студентов, пользователей, школьников и сотрудников предприятий. Вы можете легко создать или пройти тест...';
		
		$result=$view->render('../views/testing.php');
		$fc->setBody($result);
	}
	
	//метод возвращает результат прохождения теста в представление
	function resultAction()
	{
		//создание экземпляра модели "вида"
		$fc=FrontController::get();
		$view=new View();
		
		//если существуют необходимые переменные, то выводим результат, иначе вывод ошибки 
		if(!empty($_SESSION['exec']['type']) and !empty($_SESSION['exec']['id']) and !empty($_SESSION['exec']['count']) and isset($_POST['submit']) and isset($_POST['q1']) and isset($_SESSION['exec']['q1']))
		{
			//формируем массив с ответами на вопросы
			for($i=1;$i<=$_SESSION['exec']['count'];$i++)
			{
				$results[$_SESSION['exec']['q'.$i]]=$_POST['q'.$i];
			}
			
		//вызываемый метод класса возвращает результат проверки прохождения теста
		$result=Execute::getResult($_SESSION['exec'], $results);
		
		if(!is_numeric($result))
			$result='Возникли ошибки при проверке прохождения теста!';
		
		$view->title='Результат';
		$r_answers=$_SESSION['exec']['count']*($result/100);
		$view->content='Вопросов: '.$_SESSION['exec']['count'].'<br>Верных ответов: '.$r_answers.'<br>Результат: '.$result.'%';
		$result=$view->render('../views/testing.php');
		}
		else
		{
		$view->title='Ошибка';
		$view->content='Необходимые для проверки результата данные не найдены!';
		$result=$view->render('../views/default.php');
		}

		$view->keywords='Дистанционное тестирование, тестирование школьников, тестирование студентов, тестирование сотрудников, онлайн, тестирование, пройти тестирование, список всех тестов';
		$view->description='Информационная система дистанционного тестирования знаний, для студентов, пользователей, школьников и сотрудников предприятий. Вы можете легко создать или пройти тест...';
		$fc->setBody($result);
	}
}

?>