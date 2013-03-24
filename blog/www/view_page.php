<? include("blocks/bd.php"); ?>
<?

if(isset($_GET['id']))
{
$id=$_GET['id'];
$query=mysql_query("SELECT * FROM settings WHERE id='$id'",$db);

if(!preg_match("|^[\d]+$|",$id)){ exit("Некорректный параметр в URL !<br><a href='index.php'><< Вернуться на ресурс</a>"); }

if(!$query)
{
	echo "<p>Query is not valid! Send this code to your admin: </p>";
	exit(mysql_error());	
}

if(mysql_num_rows($query)<1)
{
	exit("<center><b><p>Выбранной Вами страницы не существует!</p></center><br><a href='index.php'><< Назад в блог</a></b>");
}

else
{
$row=mysql_fetch_array($query);
}

}
else {exit("<center><p>Вы обратились к базе без необходимого параметра!</p></center><br><a href='index.php'><< Назад в блог</a>");}
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
        <td width="75%" align="left" valign="top">
        <p class="post_view_title"><? echo $row['title']; ?></p>
        <p><? echo $row['text']; ?>
		</p>
        </td>
      </tr>
    </table></td>
  </tr>
  <? include("blocks/footer.php"); ?>
</table>
</body>
</html>