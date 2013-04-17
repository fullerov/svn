<? //функции для вывода результатов тестирования

function getOrgResult(array $content, $test_name, $worker_fio, $org_name)
{
	if(count($content)!=0)
	{
	//выбока имен Ф.И.О. сотрудников
	if(is_array($worker_fio))
	{
		foreach($worker_fio as $fio)
		{
			$workerfio[$fio['id']]=$fio['fio'];
		}	
		
	}
	
	//выбока имен тестов
	if(is_array($test_name))
	{
		foreach($test_name as $name)
		{
			$testname[$name['id']]=$name['name'];
		}	
		
	}
	
	//выборка названий организаций
	if(is_array($org_name))
	{
		foreach($org_name as $name)
		{
			$orgname[$name['id']]=$name['name'];
		}	
	}
	
	$result='<h5>Результаты тестирования сотрудников Ваших организаций:</h5>
	<table cellpadding="2" cellspacing="2" border="1"><tr><th>Тест</th><th>Тестируемый</th><th>Организация</th><th>Результат в %</th><th>Дата прохождения теста</th><th>Затраченное время в мин.</th></tr>
	';
	
	foreach($content as $worker)
	{
		$result.='<tr><td>'.$testname[$worker['test_id']].'</td><td>'.$workerfio[$worker['employee_id']].'</td><td>'.$orgname[$worker['org_id']].'</td><td>'.$worker['result'].'</td><td>'.$worker['date'].'</td><td>'.$worker['time_min'].'</td></tr>';
	}
		
	$result.='</table>';
	}
	else $result='Ваши тесты ещё не проходил ни один сотрудник!';
	
	return $result;
	
	
}

?>
