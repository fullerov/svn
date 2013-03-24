<? include("lock.php");
$comm_q=mysql_query("SELECT id, author, date, text FROM comments ORDER BY id DESC",$db);
$comm_r=mysql_fetch_array($comm_q);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>


<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Управление комментариями</title>
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
          <td width="737" align="center" valign="top" class="back"><p class="articles_title">Редактируйте либо удаляйте комментарии, нажав соответствующую кнопку:</p>
          
            <br />
             <br />
           <?
		   
if(isset($_POST['ok']))
{
$is_ok=mysql_query("UPDATE options SET new_comm='0' WHERE id=1",$db);
unset($is_ok);  unset($_POST['ok']); 
}
else{}

		   // удаление коментариев
		  
		  if(isset($_POST['d_submit']) and isset($_POST['id']))
		  {
			  $id=$_POST['id'];
			  $drop_q=mysql_query("DELETE FROM comments WHERE id='$id'",$db);
				if($drop_q)
				{
				echo"<p style='color:white'><br>Комментарий № $id успешно удалён!</p>";
				exit();
			    unset($id); unset($drop_q); unset($_POST['author']); unset($_POST['date']); unset($_POST['text']); unset($_POST['id']);
				}
				else{echo "Обнаружены ошибки! Комментарий не удалён!";}
		  }
		   
		   // редактирование комментариев
		   if(isset($_POST['submit']))
		   {
			   if(isset($_POST['author']) and isset($_POST['date']) and isset($_POST['text']) and isset($_POST['id']) and !empty($_POST['author']) and !empty($_POST['date']) and !empty($_POST['text']))
			  { 
			    $author=$_POST['author'];
				$date=$_POST['date'];
				$text=$_POST['text'];
				$id=$_POST['id'];
			  	$edit_q=mysql_query("UPDATE comments SET author='$author', text='$text', date='$date'  WHERE id='$id'",$db);
				if($edit_q)
				{
				echo"<p style='color:white'><br>Комментарий № $id успешно отредактирован!</p>";
				unset($author); unset($date); unset($text); unset($id); unset($edit_q); unset($_POST['author']); unset($_POST['date']); unset($_POST['text']); unset($_POST['id']);
				}
				else{echo "Обнаружены ошибки! Комментарий не изменён!";}
			  }
			  else{ echo "<p style='color:white'><br>Поля ввода данных не могут быть пусты!</p>";}
			   
		   }
		   else
		   {
			   if(mysql_num_rows($comm_q)>0)
			   {
			   do
			   {
				  echo"<form action='comments.php' method='post'>
				  <p style='font-size:14px; border:1px solid white;'>Комментарий № $comm_r[id]</p>
				  <p align='left' style='margin-left:100px'><i>Автор:</i><input name='author' type='text' value='$comm_r[author]'  /> </p>
				  <p align='left' style='margin-left:100px'><i>Добавлено:</i><input name='date' type='text' value='$comm_r[date]' size=7 /> </p>
				  <input name='id' type='hidden' value='$comm_r[id]' />
				  <textarea name='text' cols='65' rows='5'>$comm_r[text]</textarea><br>
				  <input name='reset' type='reset' value='Сброс' />
				  <input name='submit' type='submit' value='Редактировать' />
				  <input name='d_submit' type='submit' value='Удалить' />
				  <hr />
				  </form>";
				  
			   }
			   while($comm_r=mysql_fetch_array($comm_q));			   
			   }
			   else{ echo "<p>Комментариев в базе не обнаружено!</p>";}
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