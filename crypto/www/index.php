<?
ob_start();
session_start();
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Crypto</title>
</head>
<body>
<?

if(isset($_SESSION['login']) and !empty($_SESSION['password']))
{
echo "<b>".$_SESSION['login']."</b> успешно авторизирован<br><br>"."<form method='post' action='index.php'><input type='submit' name='logoff' value='Выход'></form>";

include("crypto.php");
echo "</body></html>";

if(isset($_POST['logoff']))
{session_destroy(); header("Location: ../"); ob_end_flush();}
exit;
}
?>
<h2 style="color:gray">Авторизация</h2>
<form action="index.php" id="auth" method="post" >
<table align="center" border="1" cellpadding="2" cellspacing="1" width="210" >
<tr><td width="200"><label for="login">Введите логин:</label>
<input name="login" maxlength="255" size="32" type="text" value="<? 

if(isset($_POST['login'])&&$_POST['login']!="")
	echo $_POST['login']; 

?>" /></td></tr>
<tr><td><label for="password">Введите пароль:</label>
<input name="password" maxlength="255" size="32" type="password" /></td></tr>
<tr><td align="center"><input type="submit" value="Войти" name="submit" /><br><input type="submit" value="Зарегистрироватся" name="reg" /></td></tr>
</table>
</form>
<?
$db= new MySQLi("openserver","blog","12345","crypto"); 

if(!$db)
	echo 'Ошибка подключения к базе данных!';

if(isset($_POST['submit']))
{
	if(isset($_POST['login']) && $_POST['login']!="")
	{
		if(isset($_POST['password']) && $_POST['password']!="")
		{
			$login=trim($_POST['login']);
			$password=trim($_POST['password']);
			$password=crypt($password,"cR");
			
			$user=$db->query("SELECT login FROM users WHERE login='$login'");
			$res=$user->fetch_row();
			if($user && $res[0]==$login)
			{
				$parol=$db->query("SELECT password FROM users WHERE login='$login'");
				$res=$parol->fetch_row();
				if($res[0]==$password)
				{echo 'Пользователь <b>'.$login.'</b> успешно авторизирован!';
				$_SESSION['login']=$login;
				$_SESSION['password']=$password;
				header("Location: ../");
				}
				else{echo '<b>'.$login.'</b>-ом был введен неверный пароль!';}
			
			}
			else{echo 'Пользователя <b>'.$login.'</b> нет в базе даных! Зарегистрируйтесь!';}
		
				
			
		}
		else{echo 'Вы забыли ввести пароль!'; }
	}
	else{echo 'Вы забыли ввести логин!'; }
}


if(isset($_POST['reg']))
{
	if(isset($_POST['login']) && $_POST['login']!="")
	{
		if(isset($_POST['password']) && $_POST['password']!="")
		{
			$login=trim($_POST['login']);
			$password=trim($_POST['password']);
			$password=crypt($password,"cR");
			
			$ides=$db->query("SELECT id FROM users");
			$num=$ides->num_rows;
			$num++;
			$reg=$db->query("INSERT INTO users (`id`,`login`, `password`) VALUES ('$num','$login', '$password')");
			
			
			if($reg)
			{
				echo 'Пользователь <b>'.$login.'</b> успешно зарегистрирован!';
			
			}
			else{echo 'Такой пользователь уже есть в базе!';}
		
				
			
		}
		else{echo 'Вы забыли ввести пароль!'; }
	}
	else{echo 'Вы забыли ввести логин!'; }
}



$db->close();
ob_end_flush();
?>
</body>
</html>