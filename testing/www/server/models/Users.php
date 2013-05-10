<?
//класс по шаблону Singletone реализующий пользовательскую бизнес-логику
class Users
{
	//поле содержащее экземпляр данного класса
	private static $user;
	
	private function __construct(){}
	private function __clone(){}
	private function __wakeup(){}
	private function __sleep(){}

	
	public static function get()
	{
		if(self::$user instanceof self)
			return self::$user;
		else
			return self::$user=new Users();
	}
	
	private function db()
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
	
	//метод возвращает массив с данными о пользователях и созданных ими тестов
	public function getAllUsersAndTests()
	{
		$db=$this->db();
		
		$select_users=$db->prepare("SELECT id, login, (SELECT name FROM countries WHERE id=country_id) AS country, (SELECT name FROM cities WHERE id=city_id)AS city, (SELECT name FROM types WHERE id=type_id) AS type, fio, email, about, image FROM users");
		$select_users->execute();
		$select_tests=$db->prepare("SELECT id, user_id, (SELECT name FROM user_themes WHERE id=theme_id)AS theme, name, description, time_min, rating, date, quantity, results, count FROM user_test_name");
		$select_tests->execute();
		
		if($select_users->errorCode()==00000 and $select_tests->errorCode()==00000)
		{
			$res['users']=$select_users->fetchAll(PDO::FETCH_ASSOC);
			$res['tests']=$select_tests->fetchAll(PDO::FETCH_ASSOC);
			return $res;
		}
		else return false;
	}
}
?>