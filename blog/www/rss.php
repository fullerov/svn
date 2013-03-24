<?
include("blocks/bd.php");
header("Content-type: text/xml");
echo "<?xml version=\"1.0\" encoding=\"utf8\"?>";
$mail_q=mysql_query("SELECT address, s_name FROM options WHERE id=1",$db);
$mail_r=mysql_fetch_array($mail_q);
?>

<rss version="2.0">
<channel>
<title>Заметки от <? echo $mail_r['s_name']?></title>
<link><? echo "http://".$_SERVER['SERVER_NAME']."/"; ?></link>
<description>Интересные заметки от '<? echo $mail_r['s_name']; ?>'</description>
<language>ru</language>
<?
$rss_q=mysql_query("SELECT id, description, img, title FROM date ORDER BY 'id'",$db);
$rss_r=mysql_fetch_array($rss_q);


do
{
	printf("
<item>
<title>%s</title>
<link>http://$_SERVER[SERVER_NAME]/view_post.php?id=%s</link>
<description>%s</description>
<author>%s</author>
<guid>http://$_SERVER[SERVER_NAME]/view_post.php?id=%s</guid>
</item>",$rss_r['title'], $rss_r['id'],$rss_r['description'],$mail_r['address'],$rss_r['id']);
}
while($rss_r=mysql_fetch_array($rss_q))

?>

</channel>
</rss>