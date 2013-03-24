<? include("blocks/bd.php"); ?>
<?
if(isset($_GET['date']))
{
	$date=$_GET['date'];
}
else
{
	echo "Не верный формат выбора дат! Повторите попытку более корректно, нажмите на ссылку в разделе архив!<br><a href='index.php'><< Вернуться назад</a>";
	exit();
}



$d_title=$date;
$date_begin=$date."-01";
$date++;
$date_end=$date."-01";

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf8" />

<title><? echo "Архив за $d_title"; ?></title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<table width="900" border="0" align="center" cellpadding="0" cellspacing="0">
  <? include("blocks/header.php"); ?> 
  <tr bgcolor="#FFFFFF">
    <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <? include("blocks/left.php"); ?>
        <td width="75%" valign="top"><br />

            <?
		   $result=mysql_query("SELECT * FROM date WHERE date>'$date_begin' AND date<'$date_end'",$db);
		   $myrow=mysql_fetch_array($result);
		   
		   if(mysql_num_rows($result)>0)
		   {
 do
 {      
 
 $r=$myrow['rating']/$myrow['q_vote'];
 $r=intval($r);
 
      printf("
	  
	
	  <table align='center' width='640' border='1' cellspacing='0' cellpadding='0' bordercolor='#DADADA'>
            <tr>
              <td class='post_title' height='42' align='center' valign='top' >
			  <img width='50' height='50' src='%s' align='left' class='m_img'/>
			  <a class='post_link' href='view_post.php?id=%s'><p class='post_name'>%s</p></a>
			  <p class='post_add'>Добавлено: %s </td>
            </tr>
            <tr >
              <td class='post' height='66' align='center' valign='top'><p class='post_descr'>%s</p>
			  <br><img align='right' src='img/%s.png'>
			  </td>
            </tr>
            <tr>
              <td class='post_title' height='20' align='center' valign='top'><p class='post_author_cat'>Автор: %s </p><p class='post_cat_views'>Просмотров: %s</p></td>
            </tr>
          </table><br>", $myrow['img'], $myrow['id'], $myrow["title"], $myrow["date"], $myrow["description"], $r, $myrow["author"], $myrow['view']);
 }
 while($myrow=mysql_fetch_array($result));
		   }
		  else
		  {
			echo "<p align='center' style='font-weight:bold'>За данную дату данных не обнаружено!<br></p>";
		  }
		 ?>
            
         </td>
      </tr>
    </table></td>
  </tr>
  <? include("blocks/footer.php"); ?>
</table>
</body>
</html>