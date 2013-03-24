<? include("lock.php");
$user_q=mysql_query("SELECT * FROM userlist ORDER BY id DESC",$db);
$user_r=mysql_fetch_array($user_q);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>


<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Управление пользователями</title>
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
          <td width="737" align="center" valign="top" class="back"><p class="articles_title">Редактируйте данные пользователей, либо удаляйте их, нажав соответствующую кнопку:</p>
          
            <br />
             <br />
           <?
		   
if(isset($_POST['n_mail']))
{
$is_ok=mysql_query("UPDATE options SET new_mail='0' WHERE id=1",$db);
unset($is_ok);  unset($_POST['ok']); 
}
else{}

		   // изменение данных пользователя
		  
		  if(isset($_POST['ch_submit']) and isset($_POST['id']))
		  {
			  $id_u=$_POST['id'];
			  $fio=$_POST['fio'];
			  $login=$_POST['login'];
			  $e_mail=$_POST['e_mail'];
			  $type=$_POST['type'];
			  
			  $change_q=mysql_query("UPDATE userlist SET fio='$fio', type='$type', user='$login', e_mail='$e_mail' WHERE id='$id_u'",$db);
				if($change_q)
				{
				echo"<p style='color:white'><br>Данные пользователя № $id_u успешно изменены!</p>";
				exit();
			    unset($id_u); unset($fio); unset($login); unset($e_mail); unset($change_q); unset($_POST['login']); unset($_POST['fio']);  unset($_POST['e_mail']); unset($_POST['id']);
				}
				else{echo "Обнаружены ошибки! Данные пользователя не изменены!";}
		  }
		  
		  // удаление пользователя
		  
		  if(isset($_POST['d_submit']) and isset($_POST['id']))
		  {
			  $id=$_POST['id'];
			  $drop_q=mysql_query("DELETE FROM userlist WHERE id='$id'",$db);
				if($drop_q)
				{
				echo"<p style='color:white'><br>Пользователь № $id успешно удалён!</p>";
				exit();
			    unset($id); unset($drop_q); unset($_POST['login']); unset($_POST['fio']);  unset($_POST['e_mail']); unset($_POST['id']);
				}
				else{echo "Обнаружены ошибки! Пользователь не удалён!";}
		  }
		   
			
		   else
		   {
			   if(mysql_num_rows($user_q)>0)
			   {
			   do
			   {
				  echo "<form action='users.php' method='post'>
				  <p style='font-size:14px; border:1px solid white;'>Пользователь № $user_r[id]</p>
				  <p align='left' style='margin-left:100px'><i>Логин:</i><input name='login' type='text' value='$user_r[user]'   size=23/> </p>
				  <p align='left' style='margin-left:100px'><i>Ф.И.О.:</i><input name='fio' type='text' value='$user_r[fio]'   size=23/> </p>
				  <p align='left' style='margin-left:100px'><i>e-mail:</i><input name='e_mail' type='text' value='$user_r[e_mail]' size=23 /> </p>
				  <p align='left' style='margin-left:100px'><i>Тип:</i>
				  <select style='margin-left:16px;' name='type'>";
				   if($user_r['type']=='admin')
				   {
					   echo "<option selected>admin</option><option>user</option>";
				   }
				   else
				   {
					   echo "<option selected>user</option><option>admin</option>";
				   }
				 
				  echo "</select><input name='id' type='hidden' value='$user_r[id]' size=30 />
				  <a style='text-decoration:none; color:darkgray; font-size:13px;' href='mailto:$user_r[e_mail]'><p>Отправить сообщение</p></a>
				  <p><input name='d_submit' type='submit' value='Удалить' /><input name='ch_submit' type='submit' value='Изменить' /></p>
				  <hr />
				  </form>";
				  
			   }
			   while($user_r=mysql_fetch_array($user_q));			   
			   }
			   else{ echo "<p>Пользователей в базе нет!</p>";}
		   }
		   
		   
		  
		   
           ?>
           <br />
          </td>
        </tr>
    </table></th>
  </tr>
  <!--Подключаем нижний блок-->
  <? include("blocks/footer.php"); ?>
</table>
</body>
</html>