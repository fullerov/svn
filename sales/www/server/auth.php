<?

if(isset($_GET['auth']) && $_GET['auth']=='true')
{
	if(isset($_POST['log']) && isset($_POST['pass']))
	{
		if(empty($_POST['log']) or empty($_POST['pass']))
		{
			$reg_user='Пустые значения недопустимы!';
		}
		else
		{
			
		$log=trim($_POST['log']);
		$pass=trim($_POST['pass']);
		$pass=crypt($pass,'Sl');
		$logto=$mysql->query("SELECT login, type FROM users WHERE login='$log'");
		$passto=$mysql->query("SELECT password FROM users WHERE login='$log'");
		
				if($logto and $passto)
						{
							$rowl=$logto->fetch_row();
							$rowp=$passto->fetch_row();
							
							if($log==$rowl[0])
							{
								if($pass==$rowp[0])
								{
									$_SESSION['type']=$rowl[1];
									$_SESSION['login']=$log;
									$_SESSION['logpass']=crypt($log.$pass);
								}
								else {$reg_user='Неверный пароль!';}
							}
							else{$reg_user='Неверный логин!';}
						}
				else
						{
								$reg_user='Ошибка авторизации!';
						}
		
		}
	}
	
}

?>