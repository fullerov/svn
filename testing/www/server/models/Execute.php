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
	
	//метод возвращает массив с пользовательскими тестами из указанного диапазона
	public static function getUserTests($first, $last)
	{
		if ($first==0 || $first ==1) { $first=0; } else { --$first; }
	    ++$last;
		$db=self::db();
		$select=$db->prepare("SELECT `id`, `user_id`, `country_id`, `city_id`, `theme_id`, `name`, `description`, `time_min`, `rating`, `date`, `quantity`, `results`, `count` FROM user_test_name WHERE id > $first AND id < $last");
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
	
	//вывод типа организационного теста по идентификатору 
	public static function getOrgTestTheme($id)
	{
		$db=self::db();
		$select=$db->prepare("SELECT themes FROM org_themes WHERE id='$id' LIMIT 1");
		$select->execute();
		
		if($select->errorCode()==00000)
		{
			$res=$select->fetch(PDO::FETCH_ASSOC);
			return $res['themes'];
		}
		else
		{return 'Возникла ошибка при выборке темы теста!<br>Код ошибки: '.$select->errorCode();}
		
	}
	
	//метод возвращает массив с данными выбранного пользователем теста
	 public static function getTestById($id, $type)
	 {
		$db=self::db();
		$table=self::getTestsTableByType($type);
		$select=$db->prepare("SELECT id, test_id, question, answer, time_sec, var1, var2, var3, var4, var5, var6, var7, var8, var9, var10, var11, var12, var13, var14, var15, var16, var17, var18, var19, var20, var21, var22, var23, var24, var25, var26, var27, var28, var29, var30 FROM $table WHERE test_id='$id'");
		$select->execute();
		
		if($select->errorCode()==00000)
		{
			return $select->fetchAll(PDO::FETCH_ASSOC);
		}
		else
		{return 'Возникла ошибка при выборке теста!<br>Код ошибки: '.$select->errorCode();}
		 
	 }
	 
	 //метод возвращает имя и время на выполнения теста!!!!!!!!!!!!!!!!!!!!!!
	 public static function getTestData($id, $type)
	 {
		 $db=self::db();
		 
		 //передача типа теста методу и возврат имени таблицы с описанием теста
		 $table=self::getTestnameTableByType($type);
		 
		 if($type=='org')
			 $select=$db->prepare("SELECT id, name, time_min, org_id FROM $table WHERE id='$id'");
		 else 
		 	 $select=$db->prepare("SELECT id, name, time_min FROM $table WHERE id='$id'");
		 
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
	 
	//метод возвращает массив с организационными тестами из указанного диапазона!!!!!!!!!!
	public static function getOrgTests($first, $last)
	{
		if ($first==0 || $first ==1) { $first=0; } else { --$first; }
	    ++$last;
		$db=self::db();
		$select=$db->prepare("SELECT `id`, `user_id`, `country_id`, `city_id`, `theme_id`, `org_id`, `name`, `description`, `time_min`, `rating`, `date`, `quantity`, `results`, `count` FROM org_test_name WHERE id > $first AND id < $last");
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
	
	//метод записывает результаты прохождения теста пользователем если он есть в списке тестируемых, возвращает строковой результат
	public static function setOrgResult(array $results, $fio, $address, $tel)
	{
		$db=self::db();
		$fio=$db->quote($fio);
		$address=$db->quote($address);
		$tel=$db->quote($tel);
		$org_id=$db->quote($results['org_id']);
		$test_id=$db->quote($results['test_id']);
		$result=$db->quote($results['result']);
		$time_min=$db->quote($results['time_min']);
		$date=$db->quote($results['date']);
		
		//проверка на наличие пользователя в базе данных
		$check=self::checkListEmployer($fio, $address, $tel, $org_id);
		
		if($check==false)
			return 'Такого сотрудника нет в базе данных!';
		//если сотрудник есть в списке проверяем прошёл ли он уже тест
		if(((int)$check)!=0)
		{
			$employee_id=(int)$check;
			$test=self::checkResultEmployer($employee_id, $test_id, $org_id);
			
			if($test==true)
			   return 'Вы уже проходили этот тест!';
			elseif($test==false)
			{
				$id=self::getTableId('org_results');
				$insert=$db->prepare("INSERT INTO org_results(`id`, `test_id`, `employee_id`, `org_id`, `result`, `date`, `time_min`) VALUES ('$id', $test_id, '$employee_id', $org_id, $result, $date, $time_min)");
				$insert->execute();
				
				if($insert->errorCode()==00000)
					return 'Ваш результат успешно занесен в базу данных!';
				else return 'Возникла ошибка при занесении результата в базу данных!';
			}
			else
				return 'Ошибка при выборке результатов прохождения теста!';
			
		}
		else return 'Ошибка при выборке сотрудника за базы данных!';
	}
	
	//метод проверяет наличие сотрудника в базе данных, если пользователья нет в базе возвращает false иначе id сотрудника
	private static function checkListEmployer($fio, $address, $tel, $org_id)
	{
		$db=self::db();
		
		$select_id=$db->prepare("SELECT id FROM org_employers WHERE fio=$fio AND address=$address AND org_id=$org_id AND tel=$tel");
		$select_id->execute();
		
		if($select_id->errorCode()==00000)
		{
			if($select_id->rowCount()!=0)
			{
				$row=$select_id->fetch(PDO::FETCH_ASSOC);
				return $row['id'];
			}
			else return false;
			
		}
		else return 'error';

	}
	
	//метод проверяет наличие сотрудника в списке прошедших тест, если пользователь прошел тест возвращаем истину иначе ложь
	private static function checkResultEmployer($employee_id, $test_id, $org_id)
	{
		$db=self::db();
		
		$select_id=$db->prepare("SELECT id FROM org_results WHERE test_id=$test_id AND employee_id='$employee_id' AND org_id=$org_id");
		$select_id->execute();
		
		if($select_id->errorCode()==00000)
		{
			if($select_id->rowCount()!=0)
				 return true;
			else return false;
			
		}
		else return 'error';

	}
}
?>