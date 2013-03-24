<? include("lock.php");

$con_q=mysql_query("SELECT * FROM contacts WHERE id=1",$db);
$con_r=mysql_fetch_array($con_q);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>


<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Обратная связь</title>
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
          <td width="737" align="center" valign="top" class="back"><p class="articles_title">Здесь Вы можете настроить форму обратной связи </p>
            
             <br />
           <?
		   // изменение названия 
		   if(isset($_POST['edit']))
		   {
			   if(isset($_POST['title']) and 
			   isset($_POST['text']) and 
			   isset($_POST['fio']) and 
			   isset($_POST['e_mail']) and 
			   isset($_POST['m_title']) and 
			   isset($_POST['m_text']) and 
			   isset($_POST['key']) and 
			   isset($_POST['n_button']) and 
			   isset($_POST['flag']) and
			   !empty($_POST['title']) and 
			   !empty($_POST['text']) and 
			   !empty($_POST['fio']) and 
			   !empty($_POST['e_mail']) and 
			   !empty($_POST['m_title']) and 
			   !empty($_POST['m_text']) and  
			   !empty($_POST['key']) and 
			   !empty($_POST['n_button']))
			  { 
			    $title=$_POST['title'];
				$text=$_POST['text'];
				$fio=$_POST['fio'];
				$e_mail=$_POST['e_mail'];
				$m_title=$_POST['m_title'];
				$m_text=$_POST['m_text'];
				$key=$_POST['key'];
				$n_button=$_POST['n_button'];
				$flag=$_POST['flag'];
			  	
				
				$cont_u=mysql_query("UPDATE `contacts` SET `title`= '$title', `fio`= '$fio', `e_mail`= '$e_mail', `m_title`= '$m_title', `m_text`= '$m_text', `flag`= '$flag', `key`= '$key', `text`='$text', `n_button`='$n_button' WHERE `id`=1",$db);

				if($cont_u)
				{
				echo"<p style='color:white'><br>Названия модулей успешно изменены!</p>";
				unset($title); unset($text); unset($cont_u); unset($fio); unset($e_mail); unset($m_title); 
				unset($m_text); unset($key); unset($n_button); unset($title); unset($flag); 
				
				unset($_POST['text']); unset($_POST['title']); unset($_POST['fio']); unset($_POST['e_mail']); 
				unset($_POST['m_title']); unset($_POST['m_text']); unset($_POST['key']); unset($_POST['n_button']); unset($_POST['flag']);
				}
				else{echo "Обнаружены ошибки! Данные не изменены!<br>".mysql_error();}
			  }
			  else{ echo "<p style='color:white'><br>Вы должны ввести данные во все поля!</p>";}
			   
		   }
		   else
		   {
		   echo "
           <form action='contacts.php' method='post'>
		   <p>Отображать форму отправки сообщений\писем ?";
		   $q_flag=mysql_query("SELECT flag FROM contacts WHERE id=1",$db);
		   $r_flag=mysql_fetch_array($q_flag);
		   if($r_flag['flag']==1)
		   {
		   echo "<p><input name='flag' type='radio' value='1' checked /> Да 
		   <input name='flag' type='radio' value='0' /> Нет
		   </p>";
		   }
		   else
		   {
		   echo "<p><input name='flag' type='radio' value='1' /> Да 
		   <input name='flag' type='radio' value='0'checked /> Нет
		   </p>";
		   }
		   
           echo "<hr/> <p style='margin-bottom:-1px;'><i>Название модуля:</i></p>
		   <input name='title' type='text' value='$con_r[title]' />
		   <p style='margin-bottom:-1px;'><i>Текст описания:</i></p>
		   <input name='text' type='text' value='$con_r[text]' />
           <p style='margin-bottom:-1px;'><i>Ввод Ф.И.О.:</i></p>
		   <input name='fio' type='text' value='$con_r[fio]' />
		   <p style='margin-bottom:-1px;'><i>Ввод e-mail:</i></p>
		   <input name='e_mail' type='text' value='$con_r[e_mail]' />
		   <p style='margin-bottom:-1px;'><i>Ввод заголовка письма:</i></p>
		   <input name='m_title' type='text' value='$con_r[m_title]' />
		   <p style='margin-bottom:-1px;'><i>Ввод текста письма:</i></p>
		   <input name='m_text' type='text' value='$con_r[m_text]' />
		   <p style='margin-bottom:-1px;'><i>Ввод ключевых слов формы:</i></p>
		   <input name='key' type='text' value='$con_r[key]' />
		   <p style='margin-bottom:-1px;'><i>Ввод названия кнопки отправки:</i></p>
		   <input name='n_button' type='text' value='$con_r[n_button]' />
		   <br><br><input name='edit' type='submit' value='Сохранить' style='margin-top:-5px; margin-bottom:6px;' />
           </form>";
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