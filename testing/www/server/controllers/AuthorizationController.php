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
	
	//метод для выхода из системы
	function exitAction()
	{
		//уничтожение сессии и перенаправление на главную страницу
		session_destroy();
		header('Location: ../');
	}
	
	//метод выводит профиль пользователя
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
	
	//метод выводит все тесты пользователя
	function mytestsAction()
	{
		//если в переменной сессии массив, то выводим данные о пользователе
		if(is_array($_SESSION['loginfo']))
		{
		$fc=FrontController::get();
		$view=new View();
		$view->keywords='Дистанционное тестирование, тестирование школьников, тестирование студентов, тестирование сотрудников, онлайн, тестирование, пройти тестирование, создать тест, о ИС, описание';
		$view->description='Информационная система дистанционного тестирования знаний, для студентов, пользователей, школьников и сотрудников предприятий. Вы можете легко создать или пройти тест, результаты будут';
		$view->title='Тесты: '.$_SESSION['loginfo']['login'];
		
		//выводим тесты пользователя
		$view->usertests=Edit::getMyUserTests($_SESSION['loginfo']);
		$view->orgtests=Edit::getMyOrgTests($_SESSION['loginfo']);
		$view->schooltests=Edit::getMySchoolTests($_SESSION['loginfo']);
		$view->univertests=Edit::getMyUniverTests($_SESSION['loginfo']);
		
		//отправляем данные в представление
		$result=$view->render('../views/edit.php');

		}//если зашел не пользователь перенаправляем
		else header('Location:../');
		$fc->setBody($result);
	}
		
	//метод измененяет/удаленяет тест пользователя
	function edittestAction()
	{
		//если в переменной сессии массив, то выводим данные о пользователе
		if(is_array($_SESSION['loginfo']))
		{
		$fc=FrontController::get();
		$view=new View();
		$view->keywords='Дистанционное тестирование, тестирование школьников, тестирование студентов, тестирование сотрудников, онлайн, тестирование, пройти тестирование, создать тест, о ИС, описание';
		$view->description='Информационная система дистанционного тестирования знаний, для студентов, пользователей, школьников и сотрудников предприятий. Вы можете легко создать или пройти тест, результаты будут';
		$params=$fc->getParams();
		
		//если пользователь добавляет новый вопрос к тесту
		if($params['addquestion']=='new' and isset($_POST['question']) and isset($_POST['answer']) and isset($_POST['add_question']) and isset($_POST['count']))
		{
			if(empty($_POST['question']) or empty($_POST['answer']))
			{$empty=true;}
			
			for($i=1;$i<=$_POST['count'];$i++)
			{
				if(!empty($_POST['var'.$i]))
					$vars[]=trim($_POST['var'.$i]);
				else $empty=true;
			}
			
			//если все данные корректны то отправляем их модели на добавление
			if(!isset($empty))
			{
				$add=Edit::addQuestion($_SESSION['test_id'], $_POST['question'], $_POST['answer'], $vars, $_SESSION['test_type']);
				
				($add)? $view->content='Вопрос успешно добавлен!' : $view->content='Ошибка при добавлении вопроса! '; 
				
				$view->title='Добавление нового вопроса';
				$view->content.='<br><span id="add_test_error"><a href="/authorization/mytests"><< Вернутся назад к моим тестам</a></span>';
			}
			else
			{
				$view->title='Путстые значения!';
				$view->content='Пустые знанчения не допустимы! ';
				$view->content.='<br><span id="add_test_error"><a href="/authorization/mytests"><< Вернутся назад к моим тестам</a></span>';
			}
			
			
			
			$result=$view->render('../views/default.php');
		}
		else
		{
			
		$view->title='Изменение теста';
				
			//проверка пришедших данных на корректность
			if(isset($_POST['test_id']) and !empty($_POST['test_name']) and !empty($_POST['test_description']) and !empty($_POST['test_time']) and isset($_POST['test_type']))
			{
				//если пользователь хочет изменить тест
				if(isset($_POST['edit']))
				{
					$edit=Edit::saveTest($_POST['test_id'], $_POST['test_name'], $_POST['test_description'], $_POST['test_time'], $_POST['test_theme'], $_SESSION['loginfo']['type_id']);
					($edit) ? $view->content='Тест №'.$_POST['test_id'].' успешно изменен!' : 
							  $view->content='При изменении теста №'.$_POST['test_id'].' возникли ошибки!';
					
					$view->content.='<br><span id="add_test_error"><a href="/authorization/mytests"><< Вернутся назад к моим тестам</a></span>';		$view->title='Изменение теста';
					$result=$view->render('../views/default.php');
				}
				//если пользователь хочет удалить тест
				if(isset($_POST['del']))
				{
					$delete=Edit::deleteTest($_POST['test_id'],$_SESSION['loginfo']['type_id']);
					($delete) ? $view->content='Тест №'.$_POST['test_id'].' успешно удалён!' :  
								$view->content='При удалении теста №'.$_POST['test_id'].' возникли ошибки!'; 
								
					$view->content.='<br><span id="add_test_error"><a href="/authorization/mytests"><< Вернутся назад к моим тестам</a></span>';		$view->title='Удаление теста';
					$result=$view->render('../views/default.php');
				}
				//если пользователь хочет изменять/удалять вопросы теста
				if(isset($_POST['tests']))
				{
					
					$get=Edit::getQuestions($_POST['test_id'], $_POST['test_type']);
					if(is_array($get))
					{
					$view->content=$get;
					$view->type=$_POST['test_type'];
					$view->test_id=$_POST['test_id'];
					$_SESSION['test_type']=$_POST['test_type'];
					$_SESSION['test_id']=$_POST['test_id'];
					
					$view->title='Вопросы теста: '.$_POST['test_name'];
					$result=$view->render('../views/edit.php');
					}
					else{
							$view->content='Возникли ошибки при выборке вопросов теста!<br><span id="add_test_error"><a href="/authorization/mytests"><< Вернутся назад к моим тестам</a></span>';
						    $view->title='Ошибка при выборке вопросов';
							$result=$view->render('../views/default.php');
						}
				}
			
			}
			else{
				$view->content='Поля не должны содержать пустых значений!<br><span id="add_test_error"><a href="/authorization/mytests"><< Вернутся назад к моим тестам</a></span>';
				$result=$view->render('../views/default.php');
			 	}
		}
		
		$fc->setBody($result);
		}//если зашел не пользователь перенаправляем
		else{header('Location: ../');}
		
	}
	
	//метод измененяет/удаленяет/добавляет вопросы к тесту
	function editquestionAction()
	{
		//если в переменной сессии массив, то выводим данные о пользователе
		if(is_array($_SESSION['loginfo']))
		{
		$fc=FrontController::get();
		$view=new View();
		$view->keywords='Редактирование вопросов теста';
		$view->description='Информационная система дистанционного тестирования знаний, для студентов, пользователей, школьников и сотрудников предприятий. Вы можете легко создать или пройти тест';
		$view->title='Изменение вопросов теста';
		
		//проверка пришедших данных
		if(isset($_POST['question_id']) and !empty($_POST['question']) and !empty($_POST['answer']) and !empty($_POST['answer_count']) and !empty($_POST['var1']) and isset($_POST['test_type']) and isset($_POST['test_id']))
		{
			//изменение вопроса пользователем
			if(isset($_POST['question_save']))
			{
				//запись ответов на вопрос в массив
				for($i=1;$i<=$_POST['answer_count'];$i++)
					{	
						if(!empty($_POST['var'.$i]))
						$vars[]=$_POST['var'.$i];
						else{$var=false;}
					}
				//если ответы содержат значения и не пусты
				if(is_array($vars) and !isset($var))
				{
					//отправление данных на выполнение модели
					$save=Edit::saveQuestion($_POST['question_id'], $_POST['question'], $_POST['answer'], $vars, $_POST['test_type']);
					//проверка результата изменения вопроса
					($save) ? $view->content='Вопрос успешно изменен!' : $view->content='При редактировании вопроса возникли ошибки'; 
					$view->title='Редактирование вопроса';
					$view->content.='<br><span id="add_test_error"><a href="/authorization/mytests"><< Вернутся назад к моим тестам</a></span>';
				}
				//если один из вариантов ответа на вопрос пуст 
				else
				{
					$view->content='Ответ на вопрос не должен содержать пустое значение!';
					$view->content.='<br><span id="add_test_error"><a href="/authorization/mytests"><< Вернутся назад к моим тестам</a></span>';
				}
				
			}//удаление вопроса пользователем
			elseif(isset($_POST['question_delete']))
			{
				
				$delete=Edit::deleteQuestion($_POST['question_id'], $_POST['test_type'], $_POST['test_id']);
				($delete) ? $view->content='Вопрос успешно удалён!' : $view->content='При удалении вопроса возникли ошибки'; 
				
				$view->content.='<br><span id="add_test_error"><a href="/authorization/mytests"><< Вернутся назад к моим тестам</a></span>';
				
			}//если не была нажата соответствующая кнопка
			else{header('Location: ../');}
		
		}
		else
		{//при некорректности пришедших данных
			$view->content='Вопросы и варианты ответов не должны создержать пустых значений!<br><span id="add_test_error"><a href="/authorization/mytests"><< Вернутся назад к моим тестам</a></span>';
			$view->title='Ошибка при изменении вопросов';
		}
		$result=$view->render('../views/default.php');
		$fc->setBody($result);
	}//если зашел не пользователь перенаправляем
		else{header('Location: ../');}
	}
	
	//метод измененяет/удаленяет организационный тест 
	function editorgtestAction()
	{
		//если в переменной сессии массив, то выводим данные о пользователе
		if(is_array($_SESSION['loginfo']))
		{
		$fc=FrontController::get();
		$view=new View();
		$view->keywords='Дистанционное тестирование, тестирование школьников, тестирование студентов, тестирование сотрудников, онлайн, тестирование, пройти тестирование, создать тест, о ИС, описание';
		$view->description='Информационная система дистанционного тестирования знаний, для студентов, пользователей, школьников и сотрудников предприятий. Вы можете легко создать или пройти тест, результаты будут';
		$params=$fc->getParams();
		
		//если пользователь добавляет новый вопрос к тесту
		if($params['addquestion']=='new' and isset($_POST['question']) and isset($_POST['answer']) and isset($_POST['add_question']) and isset($_POST['count']))
		{
			if(empty($_POST['question']) or empty($_POST['answer']))
			{$empty=true;}
			
			for($i=1;$i<=$_POST['count'];$i++)
			{
				if(!empty($_POST['var'.$i]))
					$vars[]=trim($_POST['var'.$i]);
				else $empty=true;
			}
			
			//если все данные корректны то отправляем их модели на добавление
			if(!isset($empty))
			{
				$add=Edit::addQuestion($_SESSION['test_id'], $_POST['question'], $_POST['answer'], $vars, $_SESSION['test_type']);
				
				($add)? $view->content='Вопрос успешно добавлен!' : $view->content='Ошибка при добавлении вопроса! '; 
				
				$view->title='Добавление нового вопроса';
				$view->content.='<br><span id="add_test_error"><a href="/authorization/mytests"><< Вернутся назад к моим тестам</a></span>';
			}
			else
			{
				$view->title='Путстые значения!';
				$view->content='Пустые знанчения не допустимы! ';
				$view->content.='<br><span id="add_test_error"><a href="/authorization/mytests"><< Вернутся назад к моим тестам</a></span>';
			}
			
			
			
			$result=$view->render('../views/default.php');
		}
		else
		{
			
		$view->title='Изменение теста';
				
			//проверка пришедших данных на корректность
			if(isset($_POST['test_id']) and !empty($_POST['test_name']) and !empty($_POST['test_description']) and !empty($_POST['test_time']) and isset($_POST['test_type']) and !empty($_POST['test_org']))
			{
				//если пользователь хочет изменить тест!!!!!!!!!!!
				if(isset($_POST['edit']))
				{
					$edit=Edit::saveOrgTest($_POST['test_id'], $_POST['test_org'], $_POST['test_name'], $_POST['test_description'], $_POST['test_time'], $_POST['test_theme'], $_SESSION['loginfo']['type_id']);
					($edit) ? $view->content='Тест №'.$_POST['test_id'].' успешно изменен!' : 
							  $view->content='При изменении теста №'.$_POST['test_id'].' возникли ошибки!';
					
					$view->content.='<br><span id="add_test_error"><a href="/authorization/mytests"><< Вернутся назад к моим тестам</a></span>';		$view->title='Изменение теста';
					$result=$view->render('../views/default.php');
				}
				//если пользователь хочет удалить тест
				if(isset($_POST['del']))
				{
					$delete=Edit::deleteOrgTest($_POST['test_id']);
					($delete) ? $view->content='Тест №'.$_POST['test_id'].' успешно удалён!' :  
								$view->content='При удалении теста №'.$_POST['test_id'].' возникли ошибки!'; 
								
					$view->content.='<br><span id="add_test_error"><a href="/authorization/mytests"><< Вернутся назад к моим тестам</a></span>';		$view->title='Удаление теста';
					$result=$view->render('../views/default.php');
				}
				//если пользователь хочет изменять/удалять вопросы теста
				if(isset($_POST['tests']))
				{
					
					$get=Edit::getQuestions($_POST['test_id'], $_POST['test_type']);
					if(is_array($get))
					{
					$view->content=$get;
					$view->type=$_POST['test_type'];
					$view->test_id=$_POST['test_id'];
					$_SESSION['test_type']=$_POST['test_type'];
					$_SESSION['test_id']=$_POST['test_id'];
					
					$view->title='Вопросы теста: '.$_POST['test_name'];
					$result=$view->render('../views/edit.php');
					}
					else{
							$view->content='Возникли ошибки при выборке вопросов теста!<br><span id="add_test_error"><a href="/authorization/mytests"><< Вернутся назад к моим тестам</a></span>';
						    $view->title='Ошибка при выборке вопросов';
							$result=$view->render('../views/default.php');
						}
				}
			
			}
			else{
				$view->content='Поля не должны содержать пустых значений!<br><span id="add_test_error"><a href="/authorization/mytests"><< Вернутся назад к моим тестам</a></span>';
				$result=$view->render('../views/default.php');
			 	}
		}
		
		$fc->setBody($result);
		}//если зашел не пользователь перенаправляем
		else{header('Location: ../');}
		
	}
}

?>