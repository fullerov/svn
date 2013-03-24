<? include("lock.php");
$ml_q=mysql_query("SELECT address FROM options WHERE id=1",$db);
$ml_r=mysql_fetch_array($ml_q);

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
          <td width="737" align="center" valign="top" class="back"><p class="articles_title">Добро пожаловать в административный раздел!</p>
          <p class="news"> Здесь Вы можете редактировать, обновлять и удалять материалы расположенные на Вашем сайте. В левой части расположено меню, посредством которого Вы будете управлять содержимым новостей, статей и прочих разделов сайта. Просто выберите соответствующий раздел и нужный Вам пункт, в зависимости от того что Вы хотите сделать: редактировать, добавить или удалить материал.</p>
           
           <?
		   
		   echo "<br />
           <h3>Ваш e-mail:</h3>
           <form action='change.php' method='post'>
           <input name='mail' type='text' value='$ml_r[address]' />
           <input name='submit' type='submit' />
           </form>";
		   
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