<?
//модель содержащая методы для работы с университетами
class Universities
{
	//поле содержащее экземпляр данного класса
	private static $univer;
	
	private function __construct(){}
	
	public static function get()
	{
		if(self::$univer instanceof self)
			return self::$univer;
		else
			return self::$univer=new Universities();
	}
	
	private function db()
	{
		require_once('DBConnection.php');
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
	
	//метод добавляет новый университет!!!!!!!!!!!!!!!!!!!!
	public function addUniversity($user_id, $name, $about, $image, $site, $email, $tel, $city, $address)
	{
		$db=self::db();
		$user_id=$db->quote($user_id);
		$name=$db->quote($name);
		$about=$db->quote($about);
		$image=$db->quote($image);
		$site=$db->quote($site);
		$email=$db->quote($email);
		$tel=$db->quote($tel);
		$city=$db->quote($city);
		$address=$db->quote($address);
		
		$check=self::checkUniver($name, $site, $email, $city);
		$id=self::getTableId('universities');
		
		if($check==true)
		{
			$insert=$db->prepare("INSERT INTO universities(`id`,`city_id`,`user_id`,`name`,`address`,`tel`,`email`,`site`,`about`,`image`) VALUES ('$id', $city, $user_id, $name, $address, $tel, $email, $site, $about, $image)");
			$insert->execute();
			if($insert->errorCode()==00000)
				return true;
			else return false;
		}
		else return false;	
	}
	
	//метод проверки на наличия университета в базе данных, если университета нет в БД возвращается true
	private function checkUniver($name, $site, $email, $city)
	{
		$db=$this->db();
		$select=$db->prepare("SELECT id FROM universities WHERE name=$name AND site=$site AND email=$email AND city_id=$city");
		$select->execute();
		if($select->errorCode()==00000)
		{
			if($select->rowCount()==0)
				return true;
			else return false;
		}
		else return false;
	}
	
	//метод возвращает университеты созданные пользователем в виде ассойиативного массива
	public function getMyUniver($user_id)
	{
		$db=$this->db();
		$user_id=$db->quote($user_id);
		
		$select=$db->prepare("SELECT id, city_id, user_id, name, address, tel, email, site, about, image FROM universities WHERE user_id=$user_id");
		$select->execute();
		
		if($select->errorCode()==00000)
			 return $select->fetchAll(PDO::FETCH_ASSOC);
		else return false;
	}
	
	//метод возвращает строку со списком городов
	public function getCities()
	{
		$db=self::db();
		$query=$db->query('SELECT id, name FROM cities');
		if($query->rowCount()!=0)
		    return $query->fetchAll(PDO::FETCH_ASSOC);
		else return false;
	}
	
	//метод для редактирования университета пользователя
	public function editMyUniver($univer_id, $user_id, $name, $image, $city, $address, $about, $site, $email, $tel)
	{
		$db=$this->db();
		$univer_id=$db->quote($univer_id);
		$user_id=$db->quote($user_id);
		$name=$db->quote($name);
		$image=$db->quote($image);
		$city=$db->quote($city);
		$address=$db->quote($address);
		$about=$db->quote($about);
		$site=$db->quote($site);
		$email=$db->quote($email);
		$tel=$db->quote($tel);
		
		$update=$db->prepare("UPDATE universities SET name=$name, address=$address, tel=$tel, email=$email, site=$site, about=$about, image=$image, city_id=$city WHERE user_id=$user_id AND id=$univer_id");
		$update->execute();
		
		if($update->errorCode()==00000)
			return true;
		else return false;
		
	}
	
	//метод для удаления университета из базы данныхя!!!!!!!!!!!
	public function deleteMyUniver($univer_id, $user_id)
	{
		$db=$this->db();
		$univer_id=$db->quote($univer_id);
		$user_id=$db->quote($user_id);
		
		$delete=$db->prepare("DELETE FROM universities WHERE id=$univer_id AND user_id=$user_id");
		$delete->execute();
		
		if($delete->errorCode()==00000)
			 return true;
		else return false;
			
	}
	
	//метод возвращает ассоциативный массив с данными о студентах добавленных пользователем
	public function getMyStudents($user_id)
	{
		$db=$this->db();
		$univers=self::getMyUniver($user_id);
		
		$query="SELECT id, city_id, university_id, group_id, course_id, specialty_id, fio, date, address, email, tel FROM students WHERE ";
		
		$cnt=count($univers);
		$num=1;
		
		foreach($univers as $univer)
		{
			if($cnt==$num)
				$query.="university_id='".$univer['id']."';";
			else
				$query.="university_id='".$univer['id']."' OR ";
			$num++;
		}
		
		$students=$db->prepare($query);
		$students->execute();
		
		if($students->errorCode()==00000)
		{
			if($students->rowCount()==0)
			   return false;
			else
			   return $students->fetchAll(PDO::FETCH_ASSOC);	
		}
		else return false;	
	}
}

?>