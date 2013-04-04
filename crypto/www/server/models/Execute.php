<? //класс реализующий прохождение тестов
class Execute
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
	
	//метод возвращает массив с пользовательскими тестами из указанного диапазона
	public static function getUserTests($first, $last)
	{
		if ($first==0 || $first ==1) { $first=0; } else { --$first; }
	    ++$last;
		$db=self::db();
		$select=$db->prepare("SELECT `id`, `user_id`, `country_id`, `city_id`, `theme_id`, `name`, `description`, `time_min`, `rating`, `date`, `quantity`, `results` FROM user_test_name WHERE id > $first AND id < $last");
		$select->execute();
		if($select->rowCount()==0)
		{return false;}
		//проверка на корректность исполнения запроса
		if($select->errorCode()==00000)
		{
			return $select->fetchAll(PDO::FETCH_ASSOC);
		}
		else{return 'Возникла ошибка при выборке данных!<br>Код ошибки: '.$select->errorCode();}
		
	}
	
	//вывод типа пользовательского теста по идентификатору 
	public static function getUserTestTheme($id)
	{
		$db=self::db();
		$select=$db->prepare("SELECT name FROM user_themes WHERE id='$id' LIMIT 1");
		$select->execute();
		
		if($select->errorCode()==00000)
		{
			$res=$select->fetch(PDO::FETCH_ASSOC);
			return $res['name'];
		}
		else
		{return 'Возникла ошибка при выборке темы теста!<br>Код ошибки: '.$select->errorCode();}
		
	}
	
	//метод возвращает массив с данными выбранного пользователем теста
	 public static function getUserTestById($id)
	 {
		 
		$db=self::db();
		$select=$db->prepare("SELECT id, test_id, question, answer, time_sec, var1, var2, var3, var4, var5, var6, var7, var8, var9, var10, var11, var12, var13, var14, var15, var16, var17, var18, var19, var20, var21, var22, var23, var24, var25, var26, var27, var28, var29, var30 FROM user_tests WHERE test_id='$id'");
		$select->execute();
		
		if($select->errorCode()==00000)
		{
			return $select->fetchAll(PDO::FETCH_ASSOC);
		}
		else
		{return 'Возникла ошибка при выборке теста!<br>Код ошибки: '.$select->errorCode();}
		 
	 }
	 
	 //метод возвращает имя и время на выполнения теста
	 public static function getTestData($id, $type)
	 {
		 $db=self::db();
		 
		 //передача типа теста методу и возврат имени таблицы с описанием теста
		 $table=self::getTestnameTableByType($type);
		 
		 $select=$db->prepare("SELECT name, time_min FROM $table WHERE id='$id'");
		 $select->execute();
		 
		 if($select->errorCode()==00000)
		 {
			 $res=$select->fetch(PDO::FETCH_ASSOC);
			 return $res;
		 }
		 else{ return 'Возникла ошибка при выборке данных о тесте теста!<br>Код ошибки: '.$select->errorCode();}
	 }
	 
	 //метод возвращает имя таблицы с впоросами тестов по предаваемому пареметру - типу теста
	 private static function getTestsTableByType($type)
	 {
		 switch($type)
		 {
			 case 'user': $table='user_tests'; break;
			 case 'university': $table='university_tests'; break;
			 case 'org': $table='org_tests'; break;
			 case 'school': $table='school_tests'; break;
		 }
		 return $table;
	 }
	 
	 //метод возвращает имя таблицы с описанием теста по предаваемому пареметру - типу теста
	 private static function getTestnameTableByType($type)
	 {
		 switch($type)
		 {
			 case 'user': $table='user_test_name'; break;
			 case 'university': $table='university_test_name'; break;
			 case 'org': $table='org_test_name'; break;
			 case 'school': $table='school_test_name'; break;
		 }
		 return $table;
	 }
	 
	 //метод возвращает результат прохождения теста
	 public static function getResult($exec, $results)
	 {
		$type=$exec['type'];	//тип теста
		$id=$exec['id'];		//идентификатор теста
		$count=$exec['count']; //количество вопросов
		 
		 $db=self::db();
		 //передача типа теста методу и возврат имени таблицы с вопросами теста
		 $table=self::getTestsTableByType($type);
		 
		 $select=$db->prepare("SELECT `id`, `answer` FROM $table WHERE test_id='$id'");
		 $select->execute();
		 $rows=$select->fetchAll(PDO::FETCH_ASSOC);
		 
		 //установка начального количества баллов
		 $res=0;
		 
		 foreach($rows as $row)
		 {
			if($results[$row['id']]==$row['answer'])
			{
				$res++;
			}
		 }

		 //вывод процента правильных ответов
		 $res=100*($res/$count);
		 
		 return $res;
		 
	 }
}
?>