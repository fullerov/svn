<div id="top_menu">
<?
if(!empty($_SESSION['loginfo']))
{
	//вывод имени пользователя из сериализованной стрки сессии
	$arr=$_SESSION['loginfo'];
	echo "<button title='Меню пользователя' id='profile'>$arr[login]</button>";
}
else
{
	echo '<button id="auth">&nbsp;Авторизация&nbsp;</button>';
}
	
	if($_SESSION['loginfo']['type_id']==6)
		echo '<a href="/organizations/my">&nbsp;Мои организации&nbsp;</a>';
?>


<a href="/users">&nbsp;Пользователи&nbsp;</a>
<a href="/schools">&nbsp;Школы&nbsp;</a>
<a href="/universities">&nbsp;Университеты&nbsp;</a>
<a href="/organizations">&nbsp;Организации&nbsp;</a>
</div>


