<?
include("lock.php");


if(isset($_POST['title'])){$title=$_POST['title'];}
if(isset($_POST['meta_k'])){$meta_k=$_POST['meta_k'];}
if(isset($_POST['text'])){$text=$_POST['text'];}
if(isset($_POST['meta_d'])){$meta_d=$_POST['meta_d'];}


?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<strong>
<head>


<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Добавление страницы...</title>
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
if($title!="" and $meta_k!="" and $text!="" and $meta_d!="" )
{
   $result=mysql_query("INSERT INTO settings (title, meta_d, meta_k, text) VALUES ('$title','$meta_d','$meta_k','$text')",$db);
  
   if($result)
   { 
   echo "<br>Cтраница успешно добавлена!<br><br>";
   }
   else {echo "<br>Страница не добавлена! Проверте данные на наличие ошибок!<br><br><a href='new_page.php'><< Назад к вводу данных</a><br><br>";}
}

else{
	 echo "<br>Вы должны ввести данные во все поля! Страница не добавлена!<br><br><a href='new_page.php'><< Назад к вводу данных</a><br><br>";
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