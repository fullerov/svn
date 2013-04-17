<? 
//контроллер вызываемый по запросу /execute
class ExecuteController implements IController
{
	//метод вызываемый изначально!!!!!!!!!!!!!!!!!!!
	function indexAction()
	{
		$fc=FrontController::get();
		//создание экземпляра модели "вида"
		$view=new View();
		$view->keywords='Дистанционное тестирование, тестирование школьников, тестирование студентов, тестирование сотрудников, онлайн, тестирование, пройти тестирование, список всех тестов';
		$view->description='Информационная система дистанционного тестирования знаний, для студентов, пользователей, школьников и сотрудников предприятий. Вы можете легко создать или пройти тест...';
		
		//получение информации о тестах из БД, указание диапазона выборки тестов
		$view->usertests=Execute::getUserTests(1, 100);
		$view->orgtests=Execute::getOrgTests(1, 100);
		//проверка наличия тестов в базе данных
		if(is_array($view->orgtests) or is_array($view->usertests))
		{
			$view->content='Для того чтобы пройти тест, кликните по заголовку теста:';
			$view->title='Все тесты';
			$result=$view->render('../views/execute.php');
		}
		
		else
		{
			$view->content.='<b>В базе данных еще нет ни одного теста!</b>';
			$view->title='Нет пользовательских тестов в БД';
			$result=$view->render('../views/default.php');
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
		$test=Execute::getTestById($url['id'], 'user');
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
		$res=Execute::getResult($_SESSION['exec'], $results);
		
		if(!is_numeric($res))
			$res='Возникли ошибки при проверке прохождения теста!';
		
		$view->title='Ваш результат';
		$view->r_answers=$_SESSION['exec']['count']*($res/100);
		$view->res=$res;
		$view->count=$_SESSION['exec']['count'];
		$view->time=$_POST['time'];
		
		$result=$view->render('../views/testing.php');
		}
		else
		{
		$view->title='Ошибка';
		$view->content='Необходимые для проверки результата данные не найдены! Вы должны указать ответы на все вопросы!<br><h4><a href="/execute">Пройти тесты > ></a></h4>';
		$result=$view->render('../views/default.php');
		}

		$view->keywords='Дистанционное тестирование, тестирование школьников, тестирование студентов, тестирование сотрудников, онлайн, тестирование, пройти тестирование, список всех тестов';
		$view->description='Информационная система дистанционного тестирования знаний, для студентов, пользователей, школьников и сотрудников предприятий. Вы можете легко создать или пройти тест...';
		$fc->setBody($result);
	}
	
	//метод вызываемый при выборе организационного теста для прохождения!!!!!!!!!!!!!!!!!!!!!!!!!!
	function orgtestAction()
	{
		//создание экземпляра модели "вида"
		$fc=FrontController::get();
		$view=new View();
		//получение параметров из строки запроса
		$url=$fc->getParams();
		//вывод названия исполняемого теста
		$testname=Execute::getTestData($url['id'],'org');
		//вывод теста из базы по передаваемому параметру - идентификатору теста
		$test=Execute::getTestById($url['id'],'org');
		$view->timer=$testname['time_min'];
		$view->title=$testname['name'];
		$view->org_id=$testname['org_id'];
		$view->orgtest=$test;
		$view->id=$url['id'];
		$view->keywords='Дистанционное тестирование, тестирование школьников, тестирование студентов, тестирование сотрудников, онлайн, тестирование, пройти тестирование, список всех тестов';
		$view->description='Информационная система дистанционного тестирования знаний, для студентов, пользователей, школьников и сотрудников предприятий. Вы можете легко создать или пройти тест...';
		
		$result=$view->render('../views/testing.php');
		$fc->setBody($result);
	}
	
	//метод возвращает результат прохождения теста в представление!!!!!!!!!!!!!!!!
	function orgresultAction()
	{
		//создание экземпляра модели "вида"
		$fc=FrontController::get();
		$view=new View();
		
		//если существуют необходимые переменные, то выводим результат, иначе вывод ошибки 
		if(!empty($_SESSION['exec']['type']) and !empty($_SESSION['exec']['id']) and !empty($_SESSION['exec']['count']) and isset($_POST['submit']) and isset($_POST['q1']) and isset($_SESSION['exec']['q1']) and !empty($_POST['org_id']))
		{
			//формируем массив с ответами на вопросы
			for($i=1;$i<=$_SESSION['exec']['count'];$i++)
			{
				$results[$_SESSION['exec']['q'.$i]]=$_POST['q'.$i];
			}
			
		//вызываемый статический метод класса возвращает результат проверки прохождения теста
		$result=Execute::getResult($_SESSION['exec'], $results, $_POST['org_id']);
		//если тест прошел пользователь с типом регистрации сотрудник
		if($_SESSION['loginfo']['type_id']==5)
		{
		//проверка зарегистрированного сотрудника на наличие в списках тестируемых и запись данных в БД, возвращается строка 
		$view->check=Execute::setOrgResult($_SESSION['results'], $_SESSION['loginfo']['fio'], $_SESSION['loginfo']['address'], $_SESSION['loginfo']['tel']);
		unset($_SESSION['results']);
		}
		
		if(!is_numeric($result))
			$result='Возникли ошибки при проверке прохождения теста!';
		
		$view->title='Результат';
		$r_answers=$_SESSION['exec']['count']*($result/100);
		$view->count=$_SESSION['exec']['count'];
		$view->answers=$r_answers;
		$view->result=$result;
		$view->time=$_POST['time'];
		$view->org_id=$_POST['org_id'];
		$view->test_id=$_POST['test_id'];
		$result=$view->render('../views/testing.php');
		}
		else
		{
		$view->title='Ошибка';
		$view->content='Необходимые для проверки результата данные не найдены! Вы должны указать ответы на все вопросы!<br><h4><a href="/execute">Пройти тесты > ></a></h4>';
		$result=$view->render('../views/default.php');
		}

		$view->keywords='Дистанционное тестирование, тестирование школьников, тестирование студентов, тестирование сотрудников, онлайн, тестирование, пройти тестирование, список всех тестов';
		$view->description='Информационная система дистанционного тестирования знаний, для студентов, пользователей, школьников и сотрудников предприятий. Вы можете легко создать или пройти тест...';
		$fc->setBody($result);
	}
	
	//метод вызывает класс для добавления результата тестирования сотрудника в базу данных!!!!!!!!!!!!!!!!!!!!!!
	function addorgresultAction()
	{
		//создание экземпляра модели "вида"
		$fc=FrontController::get();
		$view=new View();
		$view->title='Добавление результата в БД';
		
		//если пришли необходиме данные проверяем наличие соответствующего сотрудника в базе и записываем результат теста
		if(is_array($_SESSION['results']) and !empty($_POST['fio']) and !empty($_POST['address']) and !empty($_POST['tel']))
		{
			$view->content=Execute::setOrgResult($_SESSION['results'], $_POST['fio'], $_POST['address'], $_POST['tel']);
			unset($_SESSION['results']);
		}
		else 
			$view->content='Вернитесь назад и заполните все поля коректно и без пустых значений!';
		
		$view->content.='<h4><a href="/execute">Вы можете пройти другие тесты > ></a></h4>';
		$result=$view->render('../views/default.php');
		$view->keywords='Дистанционное тестирование, тестирование школьников, тестирование студентов, тестирование сотрудников, онлайн, тестирование, пройти тестирование, список всех тестов';
		$view->description='Информационная система дистанционного тестирования знаний, для студентов, пользователей, школьников и сотрудников предприятий. Вы можете легко создать или пройти тест...';
		$fc->setBody($result);
	}
}

?>