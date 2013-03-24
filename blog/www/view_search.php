<? include("blocks/bd.php"); ?>
<?
if(isset($_POST['search']))
{
	$search=$_POST['search'];
	$search=trim($search);
}

if(isset($_POST['submit']))
{
	$submit=$_POST['submit'];
}

if(isset($submit))
{
	if(empty($search) or strlen($search)<3)
	{
		exit("<p><b>Строка запроса пуста, либо содержит менее трёх символов!</b> <br><a href='index.php'><< Вернутся назад</a></p>");
	}
	
	$search=stripslashes($search);
	$search=htmlspecialchars($search);
}
else
{
	$search="*  *  *";
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf8" />

<title><? echo "Поиск - $search"; ?></title>
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
		   $result = mysql_query("SELECT * FROM date WHERE text LIKE '%" . $search . "%' ORDER BY id DESC");
		   //$result=mysql_query("SELECT * FROM date WHERE MATCH(text) AGAINST('$search')",$db);
 
		   if($result){
		$myrow=mysql_fetch_array($result);
		echo"<p>Результат поиска по "."<b>".$search."</b>:</p>"; 
		if(mysql_num_rows($result)>1)
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
		   else{ echo "<center>Ничего не найдено!</center>";}
		   }
		   else{ echo"Ошибка в запросе к БД!";}
		?>
            
         </td>
      </tr>
    </table></td>
  </tr>
  <? include("blocks/footer.php"); ?>
</table>
</body>
</html>