<?
//модель для создания тестов
class Create
{
	private function __construct(){}
	private function __clone(){}
	private function __wakeup(){}
	private function __sleep(){}
	
	//соединение с базой данных
	private static function db()
	{
		require_once('DBconnection.php');
		return DBconnection::getDB();
	}
	
	//метод возвращает все существующие типы пользовательских тестов из базы
	static public function getUserTestsTypes()
	{
		$db=self::db();
		$query=$db->prepare('SELECT id, name, description FROM user_themes');
		$query->execute();
		if($query->rowCount()!=0)
		{
			return $query->fetchAll(PDO::FETCH_ASSOC);
		}
		else{return 'пусто';}
	}
	
	//метод добавляет новыё пользовательский тест
	static public function addUserTest($session_test, $questions, $answers)
	{
		    $test_name=$session_test['test_name'];
			$user_id=(int)$session_test['user_id'];
			$country_id=(int)$session_test['country_id'];
			$city_id=(int)$session_test['city_id'];
			$test_description=$session_test['test_description'];
			$test_question=$session_test['test_question'];
			$test_min=$session_test['test_min'];
			$test_theme=$session_test['test_theme'];
			$test_new_theme=$session_test['test_new_theme'];
			$test_var=$session_test['test_var'];
			$quantity=(int)$questions;
			$answers=(int)$answers;
			$date=date('Y-m-d');
			
			//формирование строки запроса к БД
			
			$query='INSERT INTO ';
			for($i=1;$i<=$quantity;$i++)
			{
				for($j=1;$j<$answers;$j++)
				{}
			}
			
			
	}
}
?>