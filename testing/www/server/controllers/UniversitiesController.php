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
	
	//метод выводит университеты добавленные пользователем!!!!!!!!!
	function myAction()
	{
		if($_SESSION['loginfo']['type_id']==4)
		{
		$fc=FrontController::get();
		//создание экземпляра модели "вида"
		$view=new View();
		//получаем данные об университетах добавленных пользователем
		$view->myunivers=Universities::get()->getMyUniver($_SESSION['loginfo']['id']);
		$view->cities=Universities::get()->getCities();
		$view->keywords='Дистанционное тестирование, тестирование школьников, тестирование студентов, тестирование сотрудников, онлайн, тестирование, пройти тестирование, создать тест, о ИС, описание';
		$view->description='Информационная система дистанционного тестирования знаний, для студентов, пользователей, школьников и сотрудников предприятий. Вы можете легко создать или пройти тест...';
		$view->title='Мои университеты';
		$result=$view->render('../views/university.php');
		$fc->setBody($result);
		}
		else header('Location: ../');
	}
	
	//метод добавляет новый университет пользователя в базу
	function addAction()
	{	//если зашел пользователь с рангом "учитель"
		if($_SESSION['loginfo']['type_id']==4)
		{
		$fc=FrontController::get();
		//создание экземпляра модели "вида"
		$view=new View();
		//действие при добавлении университета
		if(isset($_POST['add']))
		{
			//проверка наличия необходимых данных для добавления университета
			if(!empty($_POST['name']) and !empty($_POST['about']) and !empty($_POST['image']) and !empty($_POST['site']) and !empty($_POST['email']) and !empty($_POST['tel']) and !empty($_POST['city']) and !empty($_POST['address']) and !empty($_POST['user_id']))
			{
			$view->content=Universities::get()->addUniversity($_POST['user_id'], $_POST['name'], $_POST['about'], $_POST['image'], $_POST['site'], $_POST['email'], $_POST['tel'], $_POST['city'], $_POST['address']);
			($view->content)? $view->content='Университет успешно добавлен!': $view->content='Данный университет уже добавлен в базу!';
			$view->title='Университет успешно добавлен';
			$view->content.='<br><span id="add_test_error"><a href="/universities/my">< < Назад к моим университетам</a></span>';
			}
			else
				$view->content='Необходимые данные для добавления университета не найдены!<br><span id="add_test_error"><a href="/universities/add">< < Добавить ВУЗ</a></span>';
			
			$result=$view->render('../views/default.php');
		}
		else
		{
			$view->user_id=$_SESSION['loginfo']['id'];
			$view->cities=Organizations::get()->getCities();
			$view->title='Добавление университета...';
			$result=$view->render('../views/university.php');
		}
	
		$view->keywords='Дистанционное тестирование, тестирование школьников, тестирование студентов, тестирование сотрудников, онлайн, тестирование';
		$view->description='Информационная система дистанционного тестирования знаний, для студентов, пользователей, школьников и сотрудников предприятий. Вы можете легко создать или пройти тест...';
		$fc->setBody($result);
		}
		else header('Location: ../');
	}
	
	//метод для редактирования университетов пользователя
	function edituniverAction()
	{
		//если зашел пользователь с рангом "учитель"
		if($_SESSION['loginfo']['type_id']==4)
		{
		$fc=FrontController::get();
		//создание экземпляра модели "вида"
		$view=new View();
		//действие при редактировании университета
		if(isset($_POST['save']))
		{
			if(!empty($_POST['name']) and !empty($_POST['image']) and !empty($_POST['city']) and !empty($_POST['address']) and !empty($_POST['about']) and !empty($_POST['site']) and !empty($_POST['email']) and !empty($_POST['tel']) and !empty($_POST['univer_id']))
			{
				$view->title='Редактирование университета...';
				$view->content=Universities::get()->editMyUniver($_POST['univer_id'], $_SESSION['loginfo']['id'], $_POST['name'], $_POST['image'], $_POST['city'], $_POST['address'], $_POST['about'], $_POST['site'], $_POST['email'], $_POST['tel']);
				($view->content)? $view->content='Информация о университете успешно сохранена!': $view->content='При редактировании информации о университете возникли ошибки!';	
				$view->content.='<br><span id="add_test_error"><a href="/universities/my"><< К моим университетам</a></span>';
			}
			else
			{
				$view->title='Необходимые данные не найдены';
				$view->content='Необходимые данные для редактирования университета не найдены!<br><span id="add_test_error"><a href="/universities/my"><< К моим университетам</a></span>';
			}
			
		}
		//действие при удалении университета
		elseif(isset($_POST['delete']))
		{
			if(!empty($_POST['univer_id']))
			{
				$view->title='Удаление университета...';
				$view->content=Universities::get()->deleteMyUniver($_POST['univer_id'], $_SESSION['loginfo']['id']);
				($view->content)? $view->content='Данные о университете, студентах, тестах данного университета и результатов их прохождения успешно удалены!': $view->content='При удалении университета из базы данных возникла ошибка!';	
				$view->content.='<br><span id="add_test_error"><a href="/universities/my"><< К моим университетам</a></span>';
			}
			else
			{
				$view->title='Необходимые данные не найдены';
				$view->content='Необходимые данные для удаления университета не найдены!<br><span id="add_test_error"><a href="/universities/my"><< К моим университетам</a></span>';
			}
		}
		
		$view->keywords='Дистанционное тестирование, тестирование школьников, тестирование студентов, тестирование сотрудников, онлайн, тестирование';
		$view->description='Информационная система дистанционного тестирования знаний, для студентов, пользователей, школьников и сотрудников предприятий. Вы можете легко создать или пройти тест...';
		$result=$view->render('../views/default.php');
		$fc->setBody($result);
		
		}
		else header('Location: ../');
	}
	
	//метод выводит студентов добавленных пользователем
	function mystudentsAction()
	{
		if($_SESSION['loginfo']['type_id']==4)
		{
		$fc=FrontController::get();
		//создание экземпляра модели "вида"
		$view=new View();
		//получаем данные об университетах добавленных пользователем
		$view->mystudents=Universities::get()->getMyStudents($_SESSION['loginfo']['id']);
	
		$view->keywords='Дистанционное тестирование, тестирование школьников, тестирование студентов, тестирование сотрудников, онлайн, тестирование, пройти тестирование, создать тест, о ИС, описание';
		$view->description='Информационная система дистанционного тестирования знаний, для студентов, пользователей, школьников и сотрудников предприятий. Вы можете легко создать или пройти тест...';
		$view->title='Мои студенты';
		$result=$view->render('../views/students.php');
		$fc->setBody($result);
		}
		else header('Location: ../');
	}
	
	//метод добавляет студента в базу данных
	function addstudentAction()
	{
		if($_SESSION['loginfo']['type_id']==4)
		{
		$fc=FrontController::get();
		//создание экземпляра модели "вида"
		$view=new View();
		//получаем данные об университетах добавленных пользователем
		$view->addstudent='Заполните все нижеследующие поля и нажмите на кнопку "Добавить":';
	
		$view->keywords='Дистанционное тестирование, тестирование школьников, тестирование студентов, тестирование сотрудников, онлайн, тестирование, пройти тестирование, создать тест, о ИС, описание';
		$view->description='Информационная система дистанционного тестирования знаний, для студентов, пользователей, школьников и сотрудников предприятий. Вы можете легко создать или пройти тест...';
		$view->title='Добавить студента';
		$result=$view->render('../views/students.php');
		$fc->setBody($result);
		}
		else header('Location: ../');
		
	}
}

?>