<div id="top_menu">
<?
if(!empty($_SESSION['loginfo']))
{
	//вывод имени пользователя из сериализованной стрки сессии
	$arr=$_SESSION['loginfo'];
	echo "<button title='Меню пользователя' id='profile'>$arr[login]</button>";
}
else
{	//гость
	echo '<button id="auth">&nbsp;Авторизация&nbsp;</button>
		  <a href="/users">&nbsp;Пользователи&nbsp;</a>
          <a href="/schools">&nbsp;Школы&nbsp;</a>
          <a href="/universities">&nbsp;Университеты&nbsp;</a>
          <a href="/organizations">&nbsp;Организации&nbsp;</a>';
}
	
	if($_SESSION['loginfo']['type_id']==6)		//начальник +
		echo '<a href="/organizations/my">&nbsp;Мои организации&nbsp;</a> 
		<a href="/organizations/workers">&nbsp;Мои сотрудники&nbsp;</a> 
		<a href="/organizations/results">&nbsp;Результаты тестов&nbsp;</a>';
	elseif($_SESSION['loginfo']['type_id']==1) //пользователь +
	{
	   echo '<a href="/users">&nbsp;Пользователи&nbsp;</a>
          <a href="/schools">&nbsp;Школы&nbsp;</a>
          <a href="/universities">&nbsp;Университеты&nbsp;</a>
          <a href="/organizations">&nbsp;Организации&nbsp;</a>';	
	}
	elseif($_SESSION['loginfo']['type_id']==2) //студент -
	{
		echo '<a href="/">&nbsp;Мой университет&nbsp;</a>
          <a href="/">&nbsp;Мои результаты&nbsp;</a>
          <a href="/">&nbsp;Тесты моей группы&nbsp;</a>
          <a href="/">&nbsp;Тесты моего курса&nbsp;</a>';		
	}
	elseif($_SESSION['loginfo']['type_id']==3) //школьник -
	{
		echo '<a href="/">&nbsp;Моя школа&nbsp;</a>
          <a href="/">&nbsp;Мои результаты&nbsp;</a>
          <a href="/">&nbsp;Тесты школы&nbsp;</a>';	
	}
	elseif($_SESSION['loginfo']['type_id']==4) //учитель +
	{
		echo '<a href="/authorization/results">&nbsp;Результаты&nbsp;</a>
		  <a href="/universities/my">&nbsp;Мои университеты&nbsp;</a>
          <a href="/schools/my">&nbsp;Мои школы&nbsp;</a>
          <a href="/schools/mypupils">&nbsp;Мои ученики&nbsp;</a>
          <a href="/universities/mystudents">&nbsp;Мои студенты&nbsp;</a>
		  ';		
	}
	elseif($_SESSION['loginfo']['type_id']==5) //рабочий +
	{
		echo '<a href="/organizations/worker">&nbsp;Моя организация&nbsp;</a>
          <a href="/organizations/myresults">&nbsp;Мои результаты&nbsp;</a>
          <a href="/organizations/orgtests">&nbsp;Тесты организации&nbsp;</a>';
	}
?> 

</div>


