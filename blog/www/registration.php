<? include("blocks/bd.php"); 

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf8" />
<meta name="keywords" content="регистрация, зарегистрироваться, стать пользователем, войти на сайт" />
<meta name="description" content="Форма регистрации пользователей" />

<title>Регистрация</title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<table width="900" border="0" align="center" cellpadding="0" cellspacing="0">
  <? include("blocks/header.php"); ?> 
  <tr bgcolor="#FFFFFF">
    <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <? include("blocks/left.php"); ?>
        <td width="75%" align="left" valign="top">
       <p>
<?
	   
echo "<h2 align='center' style='font-size:18px; margin-bottom:27px;'>Регистрация нового пользователя</h2>";

$post_query=mysql_query("SELECT img, primer FROM post WHERE id=2",$db);
$post_row=mysql_fetch_array($post_query);

?>

<?

if(isset($_POST['submit_r']))
{
	
if(isset($_POST['primer']) and isset($_POST['fio']) and isset($_POST['login']) and isset($_POST['password']) and isset($_POST['e_mail']) and $_POST['primer']==$post_row['primer'] and !empty($_POST['fio']) and !empty($_POST['login']) and !empty($_POST['password']) and !empty($_POST['e_mail']))
{
	$fio=$_POST['fio'];
	$fio=trim($fio);
	$fio=stripslashes($fio);
	$fio=htmlspecialchars($fio);
	
	$login=$_POST['login'];
	$login=trim($login);
	$login=stripslashes($login);
	$login=htmlspecialchars($login);
	
	$password=$_POST['password'];
	$password=trim($password);
	$password=stripslashes($password);
	$password=htmlspecialchars($password);
	$password=crypt($password,"b4");
	
	$e_mail=$_POST['e_mail'];
	$e_mail=trim($e_mail);
	$e_mail=stripslashes($e_mail);
	$e_mail=htmlspecialchars($e_mail);
	$qr=mysql_query("SELECT id FROM userlist");
	$num=mysql_num_rows($qr);
	$num++;
	
	$reg_q=mysql_query("INSERT INTO `userlist` (`id` ,`user` ,`pass` ,`type` ,`e_mail` ,`fio`) VALUES ('$num',  '$login',  '$password', 'user', '$e_mail', '$fio');",$db);
	if($reg_q)
	{echo "<p>Регистрация прошла успешно!</p>";
	unset($fio); unset($login);unset($password); unset($e_mail); unset($reg_q); unset($_POST['fio']); unset($_POST['login']); unset($_POST['password']); unset($_POST['e_mail']); unset($num);}
	else{echo "<p>Такой пользователь уже существует!</p>";
	unset($fio); unset($login);unset($password); unset($e_mail); unset($reg_q); unset($_POST['fio']); unset($_POST['login']); unset($_POST['password']); unset($_POST['e_mail']); unset($num);}
}

else
{
	echo"<p><b>Заполните все поля корректно!</b></p>

<p>Для того чтобы зарегистрироваться, Вам необходимо заполнить все нижеследующие поля!</p><br />
<form action='registration.php' method='post' name='send'>
<center>
<p style='margin-bottom:-10px; font-weight:600; color:gray;'>Введите Ф.И.О.:</p>
<p><input type='text' name='fio' maxlength='70' size='20'>
</p>
<p style='margin-bottom:-10px; font-weight:600; color:gray;'>Введите логин:</p>
<p><input type='text' name='login' maxlength='40' size='20'>
</p>
<p style='margin-bottom:-10px; font-weight:600; color:gray;'>Введите пароль:</p>
<p><input type='password' name='password' maxlength='40' size='20'>
</p>
<p style='margin-bottom:-10px; font-weight:600; color:gray;'>Введите Ваш e-mail:</p>
<p><input type='text' name='e_mail' maxlength='40' size='20'>
</p>

<br />
<p style='margin-bottom:-10px; font-weight:600; color:gray;' >Решите пример:</p>
<br />
<img src='$post_row[img]' width='118' height='64'/>
<p style='margin-left:192px; margin-top:-43px;'>
<input type='text'  name='primer' size='4'  maxlength='6 '/></p><br />
<input type='submit' name='submit_r' value='Регистрация'/></h1></p></center>

</form>"; unset($_POST['submit_r']); unset($_POST['primer']); unset($_POST['login']);
}
}

else 
{
echo "
<p>Для того чтобы зарегистрироваться, Вам необходимо заполнить все нижеследующие поля!</p><br />
<form action='registration.php' method='post' name='send'>
<center>
<p style='margin-bottom:-10px; font-weight:600; color:gray;'>Введите Ф.И.О.:</p>
<p><input type='text' name='fio' maxlength='70' size='20'>
</p>
<p style='margin-bottom:-10px; font-weight:600; color:gray;'>Введите логин:</p>
<p><input type='text' name='login' maxlength='40' size='20'>
</p>
<p style='margin-bottom:-10px; font-weight:600; color:gray;'>Введите пароль:</p>
<p><input type='password' name='password' maxlength='40' size='20'>
</p>
<p style='margin-bottom:-10px; font-weight:600; color:gray;'>Введите Ваш e-mail:</p>
<p><input type='text' name='e_mail' maxlength='40' size='20'>
</p>

<br />
<p style='margin-bottom:-10px; font-weight:600; color:gray;' >Решите пример:</p>
<br />
<img src='$post_row[img]' width='118' height='64'/>
<p style='margin-left:192px; margin-top:-43px;'>
<input type='text'  name='primer' size='4'  maxlength='6 '/></p><br />
<input type='submit' name='submit_r' value='Регистрация'/></h1></p></center>

</form>
";
}
?>
       
       </p></td>
      </tr>
    </table></td>
  </tr>
  <? include("blocks/footer.php"); ?>
</table>
</body>
</html>