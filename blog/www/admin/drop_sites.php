<? include("lock.php");


if(isset($_POST['id'])){$id=$_POST['id'];}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<strong>
<head>


<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Удаление ссылки...</title>
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
if(isset($id))
{
	
   $result=mysql_query("DELETE FROM links WHERE id='$id'",$db);
  
   if($result)
   { 
   echo "<br>Ссылка успешно удалена!<br><br>";
   }
   else {echo "<br>Ссылка не удалена! Проверте данные на наличие ошибок!<br><br><a href='del_sites.php'><< Назад к выбору категории</a><br><br>";}
   }
   
   
else{
	 echo "<br>Вы не выбрали ссылку для удаления! Ссылка не удалена!<br><br><a href='del_sites.php'><< Назад к вводу выбору категории</a><br><br>";
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