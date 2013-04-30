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

//функиця возвращает название университетского теста
function getUniverTestname($test_id, $testinfo)
{
	if(is_array($testinfo))
	{
		foreach($testinfo as $test)
		{
			if($test['id']==$test_id)
			$res=$test['name'];
		}
	}
	else $res='Ошибка';
	
	return $res;
	
}

//функиця возвращает Ф.И.О. студента прошедшего тест
function getStudentFio($student_id, $testinfo)
{
	if(is_array($testinfo))
	{
		foreach($testinfo as $test)
		{
			if($test['id']==$student_id)
			$res=$test['fio'];
		}
	}
	else $res='Ошибка';
	
	return $res;
	
}

//функиця возвращает название университета в котором числится тестируемый
function getUniverName($univer_id, $testinfo)
{
	if(is_array($testinfo))
	{
		foreach($testinfo as $test)
		{
			if($test['id']==$univer_id)
			$res=$test['name'];
		}
	}
	else $res='Ошибка';
	
	return $res;
	
}

//функиця возвращает название специальности которую получает тестируемый
function getSpecName($spec_id, $testinfo)
{
	if(is_array($testinfo))
	{
		foreach($testinfo as $test)
		{
			if($test['id']==$spec_id)
			$res=$test['name'];
		}
	}
	else $res='Ошибка';
	
	return $res;
	
}

//функиця возвращает номер курса на котором учится тестируемый
function getCourseNum($course_id, $testinfo)
{
	if(is_array($testinfo))
	{
		foreach($testinfo as $test)
		{
			if($test['id']==$course_id)
			$res=$test['course'];
		}
	}
	else $res='Ошибка';
	
	return $res;
	
}

//функиця возвращает название группы в которой учится тестируемый
function getGroupName($group_id, $testinfo)
{
	if(is_array($testinfo))
	{
		foreach($testinfo as $test)
		{
			if($test['id']==$group_id)
			$res=$test['name'];
		}
	}
	else $res='Ошибка';
	
	return $res;
	
}

//функиця возвращает название факультета на котором учится тестируемый
function getFacName($fac_id, $testinfo)
{
	if(is_array($testinfo))
	{
		foreach($testinfo as $test)
		{
			if($test['id']==$fac_id)
			$res=$test['name'];
		}
	}
	else $res='Ошибка';
	
	return $res;
	
}

//функция возвращает время за которое тестируемый прошел тест в минутах
function getTimeMin($time_min)
{
	if($time_min==0)
		$res='менее мин.';
	else 
		$res=$time_min.' мин.';
		
	return $res;
}

//функция выводит результаты прохождения всех тестов созданных учителем
function allResults($students, $studtestinfo, $pupils)
{
	if(is_array($students))
	{
		$result='<h3>Результаты прохождения университетских тестов:</h3>';
		$count=count($students);
		
		if($count==0)
		  $result.='<p>Студенты ещё не прошли ни одного Вашего теста...</p>';
		else
		{
			$result.='<p>Всего студентов прошедших тесты: <b>'.$count.'</b></p>
			<table border="1" cellpadding="2" cellspacing="2">
			<tr><th>Название теста</th><th>Ф.И.О. студента</th><th>Университет</th><th>Специальность</th><th>Курс</th><th>Группа</th><th>Факультет</th><th>Результат в %</th><th>Дата</th><th>Время</th></tr>';
			foreach($students as $student)
			{
				$result.='<tr>
				<td>'.getUniverTestname($student['test_id'],$studtestinfo['tests']).'</td>
				<td>'.getStudentFio($student['student_id'], $studtestinfo['students']).'</td>
				<td>'.getUniverName($student['univer_id'], $studtestinfo['univers']).'</td>
				<td>'.getSpecName($student['specialty_id'], $studtestinfo['spec']).'</td>
				<td>'.getCourseNum($student['course_id'], $studtestinfo['course']).'</td>
				<td>'.getGroupName($student['group_id'], $studtestinfo['group']).'</td>
				<td>'.getFacName($student['faculty_id'], $studtestinfo['fac']).'</td>
				<td>'.$student['result'].'</td>
				<td>'.$student['date'].'</td>
				<td>'.getTimeMin($student['time_min']).'</td>
				</tr>';
			}
			
			$result.='</table>';
		}
		
	}
	
	return $result;
}

?>
