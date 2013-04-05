<? 
//контроллер вызываемый по запросу /universities
class UniversitiesController implements IController
{
	function indexAction()
	{
		$fc=FrontController::get();
		//создание экземпляра модели "вида"
		$view=new View();
		$view->content='Университеты';
		$view->keywords='Дистанционное тестирование, тестирование школьников, тестирование студентов, тестирование сотрудников, онлайн, тестирование, пройти тестирование, создать тест, о ИС, описание';
		$view->description='Информационная система дистанционного тестирования знаний, для студентов, пользователей, школьников и сотрудников предприятий. Вы можете легко создать или пройти тест...';
		$view->title='Университеты';
		$result=$view->render('../views/default.php');
		$fc->setBody($result);
		
	}
}

?>