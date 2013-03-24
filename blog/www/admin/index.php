<? include("lock.php");
$ml_q=mysql_query("SELECT * FROM options WHERE id=1",$db);
$ml_r=mysql_fetch_array($ml_q);

$admn_q=mysql_query("SELECT user, pass FROM userlist WHERE id=1",$db);
$admn_r=mysql_fetch_array($admn_q);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>


<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Администраторский раздел</title>
<link href="style2.css" rel="stylesheet" type="text/css" />
<style type="text/css">
body {
	background-color: #FFF;
}
body,td,th {
	color: #A0A0A0;
}
</style>
</head>

<body>
<table width="1000" height="506" border="1" align="center" cellpadding="0" cellspacing="0" class="head_back">
<!--Подключаем шапку сайта-->
  <? include("blocks/header.php");?>
  <tr align="center">
    <th height="158" class="back"><table width="1000" border="0" align="left" cellpadding="0" cellspacing="0" class="table">
        <tr>
        <!--Подключаем левый блок сайта-->
          <? include("blocks/left.php"); ?>
          <td width="737" align="center" valign="top" class="back"><p class="articles_title">Добро пожаловать в административный раздел!</p>
          <p class="news"> Здесь Вы можете редактировать, обновлять и удалять материалы расположенные на Вашем сайте. В левой части расположено меню, посредством которого Вы будете управлять содержимым новостей, статей и прочих разделов сайта. Просто выберите соответствующий раздел и нужный Вам пункт, в зависимости от того что Вы хотите сделать: редактировать, добавить или удалить материал</p>
            
            <a href="cats.php" style="font-size:14px;" class="title_left">Редактирование названий разделов ресурса</a>
            <br /><br />
            <a href="../backup/dumper.php" style="font-size:14px;" class="title_left">Резервное копирование\восстановление базы данных</a> &nbsp;&nbsp;<a href="../backup/readme.txt" style="font-size:14px;" class="title_left"><i>Помощь</i></a>
            <br />
             <br />
           <?
		   // новый комментарий
		  
		   if($ml_r['new_comm']=='1')
		   {
		   echo "<hr>
		   <form action='comments.php' method='post'>
           <h3 style='color:darkred;'><i>Добавлен  новый  комментарий !</i></h3>
           <i><input name='ok' type='submit' value='Обзор' style='margin-top:-5px; margin-bottom:6px;' /></i>
           </form>";
		   }
		   else{}
		   // новое письмо
		  
		   if($ml_r['new_mail']=='1')
		   {
		   echo "<hr>
		   <form action='mails.php' method='post'>
           <h3 style='color:darkred;'><i>Отправлено новое сообщение !</i></h3>
           <i><input name='n_mail' type='submit' value='Обзор' style='margin-top:-5px; margin-bottom:6px;' /></i>
           </form>";
		   }
		   else{}
		   
		   
		   // изменение имени и пароля админа
		   if(isset($_POST['edit']))
		   {
			   if(isset($_POST['user']) and isset($_POST['pass']) and !empty($_POST['user']) and !empty($_POST['pass']))
			  { 
			    $user=$_POST['user'];
				$pass=$_POST['pass'];
			  	$add_u=mysql_query("UPDATE userlist SET user='$user', pass='$pass' WHERE id=1",$db);
				if($add_u)
				{
				echo"<p style='color:white'><br>Логин и пароль успешно изменен!</p>";
				unset($user); unset($pass); unset($add_u); unset($_POST['user']); unset($_POST['pass']); unset($_POST['edit']);
				}
				else{echo "Обнаружены ошибки! Данные не изменены!";}
			  }
			  else{ echo "<p style='color:white'><br>Вы должны ввести данные в оба поля: логин и пароль!</p>";}
			   
		   }
		   else
		   {
		   echo "<hr/>
           <h3>Данные администратора:</h3>
           <form action='index.php' method='post'>
           <p style='margin-bottom:-1px;'><i>Логин:</i></p>
		   <input name='user' type='text' value='$admn_r[user]' />
		   <p style='margin-bottom:-1px;'><i>Пароль:</i></p>
		   <input name='pass' type='password' value='$admn_r[pass]' />
           <br><br><input name='edit' type='submit' value='Изменить' style='margin-top:-5px; margin-bottom:6px;' /><hr/>
           </form>";
		   }
		   
		   // изменение почты админа
		   if(isset($_POST['submit']))
		   {
			   if(isset($_POST['mail']))
			  { 
			    $mail=$_POST['mail'];
			  	$add=mysql_query("UPDATE options SET address='$mail' WHERE id=1",$db);
				if($add)
				{
				echo"<p style='color:white'><br>Адрес почты администратора успешно изменен!</p>";
				unset($mail); unset($add); unset($_POST['mail']); unset($_POST['submit']);
				}
				else{echo "Обнаружены ошибки! Адрес почты не изменен!";}
			  }
			   
		   }
		   else
		   {
		   echo "
           <h3>e-mail администратора:</h3>
           <form action='index.php' method='post'>
           <input name='mail' type='text' value='$ml_r[address]' />
           <input name='submit' type='submit' value='Изменить' />
           </form>";
		   }
		   // наличие функции mail - платный хостинг?
		   if(isset($_POST['submit_mf']))
		   {
			   if(isset($_POST['fmail']))
			  { 
			    $fmail=$_POST['fmail'];
			  	$add_fm=mysql_query("UPDATE options SET f_mail='$fmail' WHERE id=1",$db);
				if($add_fm)
				{
				echo"<p style='color:white'><br>Маркер наличия функции отправки писем изменен!<br>
				Если письма не прихродят, измените данный параметр...</p>";
				unset($fmail); unset($add_fm); unset($_POST['fmail']); unset($_POST['submit_mf']);
				}
				else{echo "Обнаружены ошибки! Настройка отправки почты не изменена!";}
			  }
			   
		   }
		   else
		   {
			   echo "
          <br><hr><h3>Хостинг платный / есть функция отправки писем:</h3>
           <form action='index.php' method='post'>";
		   
			   if($ml_r['f_mail']=='1')
			   {
		   echo "
           <p>Да <input name='fmail' type='radio' value='1' checked />
		   Нет <input name='fmail' type='radio' value='0'/></p>";
			   }
		   else{
		   echo "
           <p>Да <input name='fmail' type='radio' value='1'  />
		   Нет <input name='fmail' type='radio' value='0' checked/></p>";
		   }
		   
		   echo " <input name='submit_mf' type='submit' value='Изменить' />
           </form>";
		   }
           // счетчики статистики
            if(isset($_POST['add']))
		   {
			   if(isset($_POST['stat']))
			  { 
			    $stat=$_POST['stat'];
			  	$add_s=mysql_query("UPDATE options SET stat='$stat' WHERE id=1",$db);
				if($add_s)
				{
				echo "<br><p style='color:white'>Блок счетчиков статистики изменен!</p>";
				unset($stat); unset($add_s); unset($_POST['stat']); unset($_POST['add']);
				}
				else{echo "Обнаружены ошибки! Счетчик не изменен!";}
			  }
			   
		   }
		   else
		   {
		   echo "<br /><hr/>
           <h3>Управление счетчиками статистики:</h3>
           <form action='index.php' method='post'>
           <textarea name='stat' cols='50' rows='5'>$ml_r[stat]</textarea>
           <br><input name='add' type='submit' value='Добавить' />
           </form><br>";
		   }
		  
		   
           ?>
          </td>
        </tr>
    </table></th>
  </tr>
  <!--Подключаем нижний блок-->
  <? include("blocks/footer.php"); ?>
</table>
</body>
</html>