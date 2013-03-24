<? 
include("lock.php");
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<strong>
<head>


<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Удаление заметок</title>
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
          <td width="737" align="center" valign="top" class="back"><p class="articles_title">Удаление заметок</p>
          <i><p align="left" style='color:#C8C8C8; margin:30px;'> Выберите заметку для удаления:</p></i>
           <form action="drop_post.php" method="post">
           <?
		   
		   		$result=mysql_query("SELECT id, title FROM date",$db);
				$myrow=mysql_fetch_array($result);
				
				do
				{
					printf("<p class='edit_news'><input type='radio' name='id' value='%s'></input><label> %s. %s</label></p>",$myrow['id'],$myrow['id'],$myrow['title']);
				}
				while($myrow=mysql_fetch_array($result));
		  
		   ?>
           <input name="submit" type="submit" value="Удалить заметку" />
          
           </form>
          <p>&nbsp;</p></td>
        </tr>
    </table></th>
  </tr>
  <!--Подключаем нижний блок-->
  <? include("blocks/footer.php"); ?>
</table>
</body>
</strong>
</html>