<? include("blocks/bd.php"); ?>
<?

if(isset($_GET['id']))
{
	$id=$_GET['id'];
	if(!preg_match("|^[\d]+$|",$id)){ exit("Некорректный параметр в URL !<br><a href='index.php'><< Вернуться на ресурс</a>"); }
}
else{ $id=1;}

$query=mysql_query("SELECT * FROM date WHERE id='$id'",$db);

if(!$query)
{
	echo "<p>Query is not valid! Say this code error to your admin: </p>";
	exit(mysql_error());	
}

if(mysql_num_rows($query)<1)
{
	echo "<p align='center' style='font-weight:bold'>Такой страницы нет!<br><br><a href='index.php'><< Вернуться на ресурс</a></p>";
	exit();
}

else
{
$row=mysql_fetch_array($query);
$new_view=$row['view']+1;
$update=mysql_query("UPDATE date SET view='$new_view' WHERE id='$id'",$db);

}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf8" />
<meta name="keywords" content="<? echo $row['meta_k']; ?>" />
<meta name="description" content="<? echo $row['meta_d']; ?>" />

<title><? echo $row['title']; ?></title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<table width="900" border="0" align="center" cellpadding="0" cellspacing="0">
  <? include("blocks/header.php"); ?> 
  <tr bgcolor="#FFFFFF">
    <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <? include("blocks/left.php"); ?>
        <td width="75%" valign="top">

         <?
		   
		   
      printf("<h1 style='font-size:16px' class='post_view_title'>%s</h1><p class='post_date'>Добавлено: %s</p><p>%s</p><h1 style='font-size:11px' class='post_author'><br>Автор: %s</h1><p class='post_views'>Просмотров: %s</p>", $row['title'], $row['date'], $row['text'], $row['author'], $row['view']);
?>
<center>
<form action="vote_res.php" method="post" name="vr" target="_parent">
<p style="color:#85A589; "><i>Оцените прочитанное:</i> <b> &nbsp;1 <input type="radio" name="score" value="1" />
 2 <input type="radio" name="score" value="2" />
 3 <input type="radio" name="score" value="3" />
 4 <input type="radio" name="score" value="4" />
 5</b> <input type="radio" name="score" value="5" checked="checked" />
 
 <input name="id" type="hidden" value="<? echo $id; ?>" />
<input class="submit_button" type="submit" name="submit" value="Оценить" />
</p>

</form>
</center>
<?

echo "<hr/><p class='post_comm'>Комментарии:</p>";

$comm_query=mysql_query("SELECT * FROM comments WHERE post='$id'",$db);

if(mysql_num_rows($comm_query)>0)
{
	$comm_row=mysql_fetch_array($comm_query);
	
	do
	{
		printf("<div class='post_div'><p><em>Комментатор:</em> <strong>%s</strong></p><p class='post_add'>Добавлено: %s</p><p>%s</p></div>", $comm_row['author'],$comm_row['date'], $comm_row['text']);
	}
	while($comm_row=mysql_fetch_array($comm_query));	
}
else
{
	echo "<p>Комментариев нет, Вы можете оставить свой комментрий первым!</p>";	
}

		  
		 ?>
         <? $post_query=mysql_query("SELECT img FROM post WHERE id='1'",$db);
		 	$post_row=mysql_fetch_array($post_query);

if(isset($_SESSION['auth']) and $_SESSION['auth']!="" and isset($_SESSION['login']))
{		 
printf("<br /><hr /><br />       
<p class='post_comment'>Добавить комментарий:</p>
 <form name='form' method='post' action='comment.php'>
 <p style='color:#585858; font-style:italic; font-weight:500;'>Ваше имя: 
 <input type='text' name='name' maxlength='40' size='20' value='%s' /></p>
 <p style='color:#585858; font-style:italic; font-weight:500; margin-bottom:-10px'>Текст комментария:</p>
 <p><textarea name='text' cols='55' rows='5'></textarea></p>
 <p style='color:#585858; font-style:italic; font-weight:500;'>Решите пример: </p>
 <img src='%s' width='118' height='64' style='margin-left:12px;' /><h1 style='margin-top:-45px; margin-left:130px'> = <input style='margin-left:10px' type='text' name='primer' size='4' style='margin-left:150px' maxlength='6'/></h1><br />
 
<center><p><input type='submit' name='submit' value='Комментировать' /></p></center>
 <input name='id' type='hidden' value='%s' />
 </form>
",$_SESSION['login'],$post_row['img'],$id);
}
else { echo"<br><hr><p class='nav_links'><i>Для того чтобы оставить комментарий, Вы должны авторизироваться на сайте!</i></p>"; }
 
 ?> 
<br />
            
         </td>
      </tr>
    </table></td>
  </tr>
  <? include("blocks/footer.php"); ?>
</table>
</body>
</html>