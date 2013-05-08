<? 
//контроллер вызываемый по запросу /users
class UsersController implements IController
{
	function indexAction()
	{
		$fc=FrontController::get();
		//создание экземпляра модели "вида"
		$view=new View();
		$view->userstests=Users::get()->getAllUsersAndTests();
		$view->keywords='Дистанционное тестирование, тестирование школьников, тестирование студентов, тестирование сотрудников, онлайн, тестирование, пройти тестирование, создать тест, о ИС, описание';
		$view->description='Информационная система дистанционного тестирования знаний, для студентов, пользователей, школьников и сотрудников предприятий. Вы можете легко создать или пройти тест...';
		$view->title='Пользователи и их тесты';
		$result=$view->render('../views/default.php');
		$fc->setBody($result);
		
	}
}

?>