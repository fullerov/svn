<?
//регистрация

	if(isset($_GET['send']) && $_GET['send']=='true')
	{
		if(isset($_POST['fio']) && !empty($_POST['fio']) && isset($_POST['login']) && !empty($_POST['login']) && 
		isset($_POST['password']) && !empty($_POST['password']) && isset($_POST['e_mail']) && !empty($_POST['e_mail']) )
		{
			if(isset($_POST['primer']) && !empty($_POST['primer']))
			{
				$primer=$_POST['primer'];
				$query='SELECT primer FROM `settings` WHERE id=1';
				$result=$mysql->query($query);
				$row=$result->fetch_array(MYSQLI_ASSOC);
				
				
				if($primer==$row['primer'])
				{
					$fio=trim($_POST['fio']);
					$fio=ucwords($fio);
					$fio=stripslashes($fio);
			        $fio=htmlspecialchars($fio);
					$login=trim($_POST['login']);
					$login=strtolower($login);
					$login=stripslashes($login);
			        $login=htmlspecialchars($login);
					$password=trim($_POST['password']);
					$password=strtolower($password);
					$password=stripslashes($password);
			        $password=htmlspecialchars($password);
					$password=crypt($password,'Sl');
					$e_mail=trim($_POST['e_mail']);
					$e_mail=strtolower($e_mail);
					$e_mail=stripslashes($e_mail);
			        $e_mail=htmlspecialchars($e_mail);
					
					$insert=$mysql->query("INSERT INTO users (`id`,`fio`,`login`,`password`,`e_mail`,`type`) VALUES (NULL, '$fio', '$login', '$password', '$e_mail','user')");
					
					if($insert)
					{
						$_SESSION['type']='user';
						$_SESSION['login']=$login;
						$_SESSION['logpass']=crypt($login.$password);
						$content='Пользователь <b>'.$login.'</b> успешно зарегистрирован!';
					}
					else $content='Внимание, <b>'.$fio.'</b>! Такой логин: <b>'.$login.'</b> уже существует!<br><br><a 
		style="text-decoration:none; color:darkblue; margin-left:200px; font-weight:bold;" href="../index.php?link=reg">
		<< Вернуться назад и заполнить форму ещё раз</a>'; 
		
				}
				else
				{
					$content='<b>Вы неверно решили пример!</b><br><br><a 
		style="text-decoration:none; color:darkblue; margin-left:200px; font-weight:bold;" href="../index.php?link=reg">
		<< Вернуться назад и заполнить форму ещё раз</a>';
				}
			}
			else{
				$content='<b>Вы должны решить пример!</b><br><br><a 
		style="text-decoration:none; color:darkblue; margin-left:200px; font-weight:bold;" href="../index.php?link=reg">
		<< Вернуться назад и заполнить форму ещё раз</a>';
				}
		}
		else
		{
			$content='<b>Вы должны заполнить все поля корректно!</b><br><br><a 
		style="text-decoration:none; color:darkblue; margin-left:200px; font-weight:bold;" href="../index.php?link=reg">
		<< Вернуться назад и заполнить форму ещё раз</a>';
		}
	
	}
	else
	{
		$content='
	<h3>Регистрация в ИС "Интернет-продажи":</h3>
	<p>Для регистрации в системе, заполните нижеследующую форму и нажмите на кнопку "Отправить".</p>
	<p><center>
	<form method="post" action="../index.php?link=reg&send=true">
	<label for="fio">Введите Ф.И.О.</label><br>
	<input type="text" name="fio" size="60" maxlength="255"><br>
	<label for="login">Введите логин</label><br>
	<input type="text" name="login" size="60" maxlength="255"><br>
	<label for="login">Введите пароль</label><br>
	<input type="password" name="password" size="60" maxlength="255"><br>
	<label for="login">Введите e-mail</label><br>
	<input type="text" name="e_mail" size="60" maxlength="255"><br>
	Решите пример<br><img src="css/img/primer.png"><br>
	<input type="text" name="primer" size="20" maxlength="255"><br>
	<input type="submit" name="submit" value="Отправить">
	</form></center>
	</p>
	';
	}
	
	$keywords='зарегистрироваться, регистрация';
	$title='Регистрация';
	$description='Страница регистрации пользователей в информационной системе "Интернет-продажи"';
?>