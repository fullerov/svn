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
	
	//метод добавляет новый пользовательский тест
	static public function addUserTest(array $session_test, $questions, $answers)
	{	//объявление переменных и присвоение им соответствующих значений 
			$db=self::db();
		    $test_name=$session_test['test_name'];
			$user_id=$session_test['user_id'];
			$country_id=$session_test['country_id'];
			$city_id=$session_test['city_id'];
			$test_description=$session_test['test_description'];
			$test_question=$session_test['test_question'];
			$test_min=$session_test['test_min'];
			$test_theme=$session_test['test_theme'];
			$test_var=$session_test['test_var'];
			$quantity=$questions;
			$answers=$answers;
			$date=date('Y-m-d');
			
			//вызов метода возвращающего номер последнего идентификатора для таблицы с описанием теста
			$id=self::getTableId('user_test_name');

			//формирование строки запроса к БД для вставки теста и информации о нём
			$inrt_utn=$db->prepare("INSERT INTO user_test_name (`id`, `user_id`, `country_id`, `city_id`, `theme_id`, `name`, `description`, `time_min`, `rating`, `date`, `quantity`, `results`) VALUES ('$id', '$user_id', '$country_id', '$city_id', '$test_theme', '$test_name', '$test_description', '$test_min', NULL, '$date', '$quantity', NULL)");
			
			//вызов метода обнуляющего автоинкремент если таблица пуста
			$idt=self::getTableId('user_tests');
			
			//формирование строки запроса к БД для вставки вопросов теста
			$Nulls=30-$answers;
			for($i=1;$i<=$quantity;$i++,$idt++)
			{
				$query.="INSERT INTO user_tests (`id`,`test_id`, `question`, `answer`, `time_sec`, `var1`, `var2`, `var3`, `var4`, `var5`, `var6`, `var7`, `var8`, `var9`, `var10`, `var11`, `var12`, `var13`, `var14`, `var15`, `var16`, `var17`, `var18`, `var19`, `var20`, `var21`, `var22`, `var23`, `var24`, `var25`, `var26`, `var27`, `var28`, `var29`, `var30`) VALUES ('$idt', '$id', '".$session_test['question'.$i]."','".$session_test['answer'.$i]."', NULL, ";
				
				for($j=1;$j<=$answers;$j++)
				{
					$query.="'".$session_test['q'.$i.'var'.$j]."', ";
				}
				//если все существующие ответы теста уже вписаны, то вводим NULL
				for($n=1;$n<=$Nulls;$n++)
					{
						if($n==$Nulls)
						{$query.="NULL";}
						else{$query.="NULL, ";}
					}
				
				$query.="); ";
				
			}
			
			//вставка вопросов теста в БД
			$result=$db->prepare($query);
			$inrt_utn->execute();
			$result->execute();
			$error=$result->errorInfo();

			//проверка наличия ошибок при добавлении теста
			if($result->errorCode()==00000 and $inrt_utn->errorCode()==00000)
			{
				return true;
				unset($_SESSION['test']);
			}
			else{ return (string)($error[0].'<br>'.$error[2]);}	
	}
	
	//метод добавляет новую пользовательскую тему
	static public function addNewUserTheme($name, $description)
	{
		$db=self::db();
		
		//вызов метода для возврата идентификатора
		$id=self::getTableId('user_themes');
		
		$name=(string)$db->quote($name);
		$description=(string)$db->quote($description);
		
		$insert=$db->prepare("INSERT INTO user_themes (`id`, `name`, `description`) VALUES ('$id', $name, $description)");
		$insert->execute();
		
		//если не получилось вставить данные в базу выводим false, иначе идентификатор созданного теста
		if($insert->errorCode()!='00000')
		{return 'false';}
		else
		{
			$select=$db->prepare("SELECT id FROM user_themes WHERE name='$name' ORDER BY id DESC LIMIT 1");
			$select->execute();
			$id=$select->fetch(PDO::FETCH_NUM);
			return $id[0];
		}
	
		
		
	}
}
?>