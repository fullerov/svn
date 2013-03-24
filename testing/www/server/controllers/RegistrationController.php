<?
//контроллер вызываемый по запросу /registration
class RegistrationController implements IController
{
	
	function indexAction()
	{
		//если пользователь уже вошел на сайт то перенаправляем его с данной страницы
		if(is_array(unserialize(($_SESSION['loginfo']))))
		{
			header('Location: ../');
		}
		$fc=FrontController::get();
		
		//десериализация массива с городами
        $cities=Registration::getCities();

		//передача строки со странами
        $countries=Registration::getCountries();

		//передача строки с типами пользователей
        $types=Registration::getTypes();
		
		//создание экземпляра модели "вида" для авторизации пользователя
		$view=new View();
		$view->cities=$cities;
		$view->countries=$countries;
		$view->content='';
		$view->types=$types;
		$view->keywords='Дистанционное тестирование, тестирование школьников, тестирование студентов, тестирование сотрудников, онлайн, тестирование, пройти тестирование, создать тест, о ИС, описание';
		$view->description='Информационная система дистанционного тестирования знаний, для студентов, пользователей, школьников и сотрудников предприятий. Вы можете легко создать или пройти тест, результаты будут добавлены в базу';
		$view->title='Регистрация';
		$result=$view->render('../views/registration.php');
		$fc->setBody($result);
		
	}
	
	//корректируем введеные пользователем данные
	private function correct($value)
	{
		return trim(stripslashes(htmlspecialchars($value)));
	}
	//проверка корректности адреса электронной почты
	private function emailCheck($email)
	{
		$email=trim(stripslashes(htmlspecialchars($email)));
		
		if(preg_match('/^[a-za-я0-9A-Z\-\_]{1,100}@[a-zа-я0-9].[a-zа-я{1,8}]/',$email))
		{
			return strtolower($email);
		}
		else
		{return false;}
		
	}
	//проверка корректности телефона
	private function telCheck($tel)
	{
		$tel=trim(stripslashes(htmlspecialchars($tel)));
		
		if(preg_match('/^[0-9]{4,100}/',$tel))
		{
			return $tel;
		}
		else
		{return false;}
		
	}
	//функция регистрации пользователя
	function registerAction()
	{
		
		if($_SERVER['REQUEST_METHOD']=='POST')
		{
			if($_SESSION['captcha']==crypt($_POST['captcha'],'x)p_q1'))
			{
				
				if(!empty($_POST['fio']) and !empty($_POST['login']) and !empty($_POST['password']) and
				   !empty($_POST['email']) and !empty($_POST['tel']) and !empty($_POST['address']) and
				   !empty($_POST['city']) and !empty($_POST['country']) and !empty($_POST['type']) and !empty($_POST['birthdate']))
					{
						if(!empty($_POST['about']) and !empty($_POST['pic']))
						{
							$about=$this->correct($_POST['about']);
							$image=$this->correct($_POST['pic']);
						}
						else{$image='none';$about='none';}
						
						$fio=$this->correct($_POST['fio']);
						$login=strtolower($this->correct($_POST['login']));
						$password=crypt($_POST['password'],'w16_5N-');
						$email=$this->correct($_POST['email']);
						$tel=$this->correct($_POST['tel']);
						$address=$this->correct($_POST['address']);
						$city=$this->correct($_POST['city']);
						$country=$this->correct($_POST['country']);
						$type=$this->correct($_POST['type']);
						$birthdate=$this->correct($_POST['birthdate']);
						
						if($this->emailCheck($email)!=false)
						{
					 		  if($this->telCheck($tel)!=false)
								{
								
								$date=date('Y-m-d');
								$res=Registration::register($login,$password,$fio,$email,$date,$type,$tel,$address,$birthdate,$about,$image,$city,$country);
                                  if($res)
                                   {//при успешной регистрации перенаправление на страницу профиля пользователя
	                                 $_SESSION['loginfo']=Registration::getUser();
								     header('Location: ../authorization/profile');
                                   }
                                  else
								  {
									  $title='Ошибка при регистрации';
								      $content='При регистрации нового пользователя возникла ошибка!';
								  }
								}
								else
								{
								$title='Ошибка при регистрации';
								$content='Вы некорректно ввели номер телефона!';
								}
						}
						else
						{
						$title='Ошибка при регистрации';
						$content='Вы некорректно ввели e-mail!';
						}
						
						
						
						
					}
					else
					{
						$title='Ошибка при регистрации';
						$content='Вы должны заполнить все поля корректно!';
					}
				
			}
				
			else
			{
				$content='Символы с картинки введены некорректно!';
				$title='Ошибка при регистрации';
			}
			
			$fc=FrontController::get();
			$action=$fc->getAction();
			$view=new View();
		    $view->content='<a id="error_txt" href="/registration">'.$content.'</a>';
			$view->keywords='';
			$view->description='Завершение регистрации';
			$view->title=$title;
			$result=$view->render('../views/default.php');
			$fc->setBody($result);
			unset($_POST['captcha']);
		
		}
		else{header('Location: ../');}
	}
	

}

?>