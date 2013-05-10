<? //класс для регистрации пользователей
class Registration
{
	//поле с массивом информации о пользователе
	private static $user=array();
	
	//подключение к базе данных
	private static function db()
	{
		require_once('DBconnection.php');
		return DBconnection::getDB();
	}
	
	//метод возвращает идентификатор последний таблицы c производит префиксный инкримент
	private static function getTableId($table)
	{
		/* если тестов нет устанавливаем заначение автоинкримента равным 1, 
		иначе номер теста приравниевается инкременту последного теста из базы */
			
			$db=self::db();
			$select=$db->prepare("SELECT id FROM $table WHERE id=(select max(id) from $table)");
			$select->execute();
			$result=$select->fetch(PDO::FETCH_NUM);
			if($select->rowCount()==0)
			{
				$db->exec('SET FOREIGN_KEY_CHEKS=0');
		        $db->exec('ALTER TABLE $table AUTO_INCREMENT=1');
				$db->exec('SET FOREIGN_KEY_CHEKS=1');
				$id=1;
			}
			else
				$id=(int)$result[0]; 
			
		return ++$id;
	}
	
	//регистрация пользователя в базе данных
	public static function register($login,$password,$fio,$email,$date,$type,$tel,$address,$birthdate,$about,$image,$city,$country)
	{
		$db=self::db();
	    self::$user['login']=$db->quote($login);
		self::$user['password']=$db->quote($password);
		self::$user['fio']=$db->quote($fio);
		self::$user['email']=$db->quote($email);
		self::$user['birthdate']=$db->quote($birthdate); 
		self::$user['type']=$db->quote($type);
		self::$user['tel']=$db->quote($tel);
		self::$user['address']=$db->quote($address);
		self::$user['date']=$db->quote($date);
		self::$user['about']=$db->quote($about);
		self::$user['image']=$db->quote($image);
		self::$user['city']=$db->quote($city);
		self::$user['country']=$db->quote($country);
		
		$id=self::getTableId('users');
		
		$query='INSERT INTO users (`id`,`country_id`,`city_id`,`login`,`password`,`type_id`,`fio`,`email`,`tel`,`address`,`date`,`about`,`image`,`birthdate`) VALUES ('.$id.', '.self::$user['country'].', '.self::$user['city'].', '.self::$user['login'].', '.self::$user['password'].', '.self::$user['type'].', '.self::$user['fio'].', '.self::$user['email'].', '.self::$user['tel'].', '.self::$user['address'].', '.self::$user['date'].', '.self::$user['about'].', '.self::$user['image'].', '.self::$user['birthdate'].')';
		
		$result=$db->query($query);

		if($result)
			 return true;
		else return false;
		
		}
	
	private function __construct(){}
	private function __clone(){}
	private function __wakeup(){}
	private function __sleep(){}
	
	//функция возвращает массив с информацией о пользователе
	public static function getUser()
	{
		return self::$user;
	}

	
	//метод возвращает строку со списком городов
	public static function getCities($country_id)
	{
		$db=self::db();
		$country_id=$db->quote($country_id);
		
		$query=$db->prepare("SELECT id, name FROM cities WHERE country_id=$country_id");
		$query->execute();
		
		if($query->errorCode()!=00000)
		 return '<option value="0">Ошибка при выборке!</option>';
		 
		if($query->rowCount()!=0)
		{   
			foreach($query->fetchAll(PDO::FETCH_ASSOC) as $city)
				{
					$opt.='<option value="'.$city['id'].'">'.$city['name'].'</option>';
				}
	
				return $opt;
		}
		else{return '<option value="0">Городов нет в базе!</option>';}
	}
	
	//метод возвращает строку со списком стран
	public static function getCountries()
	{
		$db=self::db();
		$query=$db->query('SELECT id, name FROM countries');
		if($query->rowCount()!=0)
		{   
		$opt='<option value="0">Выберите страну \/</option>';
			foreach($query->fetchAll(PDO::FETCH_ASSOC) as $country)
				{
					$opt.='<option value="'.$country['id'].'">'.$country['name'].'</option>';
				}
	
				return $opt;
		}
		else{return false;}
	}
	
	//метод возвращает строку со списком типов пользователей
	public static function getTypes()
	{
		$db=self::db();
		$query=$db->query('SELECT id, name FROM types');
		if($query->rowCount()!=0)
		{   
			foreach($query->fetchAll(PDO::FETCH_ASSOC) as $type)
				{
					if($type['id']==1)
					 	$opt.='<option selected="selected" value="'.$type['id'].'">'.$type['name'].'</option>';
					 else
					    $opt.='<option value="'.$type['id'].'">'.$type['name'].'</option>';
				}
	
				return $opt;
		}
		else{return false;}
	}
	
	//метод возвращает имя пользователя по его идентификатору
	public static function getUserLogin($id)
	{
		$db=self::db();
		$query=$db->prepare("SELECT login FROM users WHERE id='$id'");
		$query->execute();
		if($query->rowCount()!=0)
		{
		    $row=$query->fetch(PDO::FETCH_NUM);
			return $row[0];
		}
		else{return 'Такого пользователя не существует!';}
	}
	
	//метод возвращает email пользователя по его идентификатору
	public static function getUserEmail($id)
	{
		$db=self::db();
		$query=$db->prepare("SELECT email FROM users WHERE id='$id'");
		$query->execute();
		if($query->rowCount()!=0)
		{
		    $row=$query->fetch(PDO::FETCH_NUM);
			return $row[0];
		}
		else{return 'Такого email не существует!';}
	}
	
	//метод возвращает тип пользователя по переданному идентификатору 
	public static function getUserType($id)
	{
		$db=self::db();
		$query=$db->prepare("SELECT name FROM types WHERE id='$id'");
		$query->execute();
		if($query->rowCount()!=0)
		{
		    $row=$query->fetch(PDO::FETCH_NUM);
			return $row[0];
		}
		else{return 'Такого типа пользователя не существует!';}
	}
	
	//метод возвращает страну пользователя по её идентификатору 
	public static function getUserCountry($id)
	{
		$db=self::db();
		$query=$db->prepare("SELECT name FROM countries WHERE id='$id'");
		$query->execute();
		if($query->rowCount()!=0)
		{
		    $row=$query->fetch(PDO::FETCH_NUM);
			return $row[0];
		}
		else{return 'Такой страны нет в базе!';}
	}
	
	//метод возвращает город пользователя по идентификатору 
	public static function getUserCity($id)
	{
		$db=self::db();
		$query=$db->prepare("SELECT name FROM cities WHERE id='$id'");
		$query->execute();
		if($query->rowCount()!=0)
		{
		    $row=$query->fetch(PDO::FETCH_NUM);
			return $row[0];
		}
		else{return 'Такого города нет в базе!';}
	}
	
}

?>