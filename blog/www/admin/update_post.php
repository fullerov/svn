<?
include("lock.php");


if(isset($_POST['title'])){$title=$_POST['title'];}
if(isset($_POST['meta_d'])){$meta_d=$_POST['meta_d'];}
if(isset($_POST['meta_k'])){$meta_k=$_POST['meta_k'];}
if(isset($_POST['date'])){$date=$_POST['date'];}
if(isset($_POST['description'])){$description=$_POST['description'];}
if(isset($_POST['text'])){$text=$_POST['text'];}
if(isset($_POST['author'])){$author=$_POST['author'];}
if(isset($_POST['id'])){$id=$_POST['id'];}
if(isset($_POST['cat'])){$cat=$_POST['cat'];}
if(isset($_POST['img'])){$img=$_POST['img'];}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<strong>
<head>


<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Обновление заметки...</title>
<link href="style2.css" rel="stylesheet" type="text/css" />
<style type="text/css">
body {
	background-color: #FFF;
}
body,td,th {
	color: #000;
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
          <td width="737" align="center" valign="top" class="back"><p class="add_news_title">
          
          <?
if($title!="" and $meta_d!="" and $meta_k!="" and $date!="" and $description!="" and $text!="" and $author!="" and $cat!="" and $img!="") 
{
   $result=mysql_query("UPDATE date SET title='$title', meta_d='$meta_d', meta_k='$meta_k', date='$date', description='$description', text='$text', author='$author', cat='$cat', img='$img' WHERE id='$id'",$db);
  
   if($result)
   { 
   echo "<br>Заметка успешно отредактированна!<br><br>";
   }
   else {echo "<br>Заметка не обновлена! Проверте данные на наличие ошибок!<br><br><a href='edit_post.php'><< Назад к вводу данных</a><br><br>";}
}

else{
	 echo "<br>Вы должны ввести данные во все поля! Заметка не отредактированна!<br><br><a href='edit_post.php'><< Назад к вводу данных</a><br><br>";
	 }
		  
		  
		  ?>
         </p>
          
          </td>
        </tr>
    </table></th>
  </tr>
  <!--Подключаем нижний блок-->
  <? include("blocks/footer.php"); ?>
</table>
</body>
</strong>
</html>