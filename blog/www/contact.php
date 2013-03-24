<? include("blocks/bd.php"); 

$con_q=mysql_query("SELECT * FROM contacts WHERE id=1",$db);
$con_r=mysql_fetch_array($con_q);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf8" />
<meta name="keywords" content="<? echo $con_r['key'];?>" />
<meta name="description" content="<? echo $con_r['title'].", ".$con_r['text']; ?>" />

<title><? echo $con_r['title']; ?></title>
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
       <p>
<?
	   
echo "<h2 align='center' style='font-size:18px; margin-bottom:27px;'>$con_r[title]:</h2>";

$post_query=mysql_query("SELECT img FROM post WHERE id=2",$db);
$post_row=mysql_fetch_array($post_query);

?>

<p><? echo $con_r['text']; ?></p><br />
<form action="send.php" method="post" name="send">
<center><p style="margin-bottom:-10px; font-weight:600; color:gray;"><? echo $con_r['fio']; ?></p>
<p><input type="text" name="name" maxlength="40" size="20">
</p>
<p style="margin-bottom:-10px; font-weight:600; color:gray;"><? echo $con_r['e_mail']; ?></p>
<p><input type="text" name="address" maxlength="40" size="20">
</p>
<p style="margin-bottom:-10px; font-weight:600; color:gray;"><? echo $con_r['m_title']; ?></p>
<p><input type="text" name="title" maxlength="40" size="20">
</p>
<p style="margin-bottom:-10px; font-weight:600; color:gray;"><? echo $con_r['m_text']; ?></p>
<p><textarea name="text" cols="55" rows="5"></textarea></p>
<p style="color:#585858; font-style:italic; font-weight:500;">

<p style="margin-bottom:-10px; font-weight:600; color:gray;" >Решите пример:</p>
<br />
<img src="<? echo $post_row['img']; ?>" width="118" height="64"/>
<p style="margin-left:192px; margin-top:-43px;"><input type="text"  name="primer" size="4"  maxlength="6 "/></p><br />
 
<input type="submit" name="submit" value="<? echo $con_r['n_button']; ?>"/></h1></p></center>

</form>

       
       </p></td>
      </tr>
    </table></td>
  </tr>
  <? include("blocks/footer.php"); ?>
</table>
</body>
</html>