<? include("blocks/bd.php"); ?>
<?

$query=mysql_query("SELECT  title, meta_k, meta_d, text FROM settings WHERE page='index'",$db);

if(!$query)
{
	echo "<p>Query is not valid! Send this code to your admin: </p>";
	exit(mysql_error());	
}

if(mysql_num_rows($query)<1)
{
	echo "<p>The table is empty!</p>";
	exit();
}

else
{
$row=mysql_fetch_array($query);
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="alternate" type="application/rss+xml" title="Лента заметок" href="http://<? echo $_SERVER['SERVER_NAME']; ?>/rss.php" />
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
       
        
        <p><? echo $row['text']; ?></p></td>
      </tr>
    </table></td>
  </tr>
  <? include("blocks/footer.php"); ?>
</table>
</body>
</html>