<link href="../style.css" rel="stylesheet" type="text/css" />
<tr>
<td  background="../img/head2.jpg" width="906" height="150" style="font-family:'Comic Sans MS', cursive">

<?

$name_q=mysql_query("SELECT s_name, slogan FROM options WHERE id=1");
$name_r=mysql_fetch_array($name_q);

echo "<a style='color: #A5BAAB; font-size:54px; font-weight:700;  margin-left:35px; margin-top:80px;'>".$name_r['s_name']."</a>";
echo "<br><a style='color:#B2C2B7; font-size:24px; font-weight:600; margin-left:470px;'><i>".$name_r['slogan']."</i></a>";

?>

</td>
</tr>
<tr>
<td bgcolor="#E3E3E3"><table height="50" width="906" bgcolor="#CCCCCC" />
<a href="../rss.php"><img  style="margin-top:2px; margin-bottom:-15px;" src="../img/rss.gif" /></a>


<center>
<?
$res=mysql_query("SELECT title, id FROM settings");
$roww=mysql_fetch_array($res);

do
{
	printf("- <a class='menu_page' href='view_page.php?id=%s'>%s</a> ",$roww['id'],$roww['title']);
}
while($roww=mysql_fetch_array($res));

$cont_q=mysql_query("SELECT flag, title FROM contacts WHERE id=1");
$cont_r=mysql_fetch_array($cont_q);
if($cont_r['flag']==1)
echo "- <a class='menu_page' href='contact.php'>$cont_r[title]</a> - <a class='menu_page' href='crypto.php'> Шифрование</a>";	


?>-</center>
</td>
</tr>