<?

if(isset($_GET['exit']))
{
	session_destroy();
	header("Location: ../");
}


if(isset($_SESSION['login']))
{
	echo '<a href="'.$_SERVER['PHP_SELF'].'?exit&'.$_SERVER['QUERY_STRING'].'" id="exit" style="cursor:pointer; color:#D8C8BA; font-style:normal;background-color:#F2EBE3; font-weight:bold; border:none; margin-right:70px;">&nbsp;Выход&nbsp;</a>';
	$reg_user=$_SESSION['login'];
}
else
{
	echo '<button id="auth">&nbsp;Авторизация&nbsp;</button>';
}

?>