<?
//контраллер вызываемый изначально
class IndexController implements IController 
{
	function indexAction()
	{
		$fc=FrontController::get();
		$params=$fc->getParams();
		//создание экземпляра модели "вида"
		$view=new View();
		$view->content='Добро пожаловать! '.$params['name'];
		$view->keywords='Дистанционное тестирование, тестирование школьников, тестирование студентов, тестирование сотрудников, онлайн, тестирование, пройти тестирование, создать тест';
		$view->description='Информационная система дистанционного тестирования знаний, для студентов, пользователей, школьников и сотрудников предприятий. Вы можете легко создать или пройти тест';
		$view->title='Дистанционное тестирование';
		$result=$view->render('../views/default.php');
		$fc->setBody($result);
		
	}

}

?>