<?
include("blocks/bd.php");

if(isset($_POST['id'])){$id=$_POST['id'];}
if(isset($_POST['score'])){$score=$_POST['score'];}


$query=mysql_query("SELECT q_vote, rating FROM date WHERE id='$id'",$db);

if(!$query)
{
	echo "<p>Query to database is not valid! Say it to your admin: </p>";
	exit(mysql_error());	
}

if(mysql_num_rows($query)<=0)
{
	echo "<p>The table is empty!</p>";
    exit();
}

else
{
$row=mysql_fetch_array($query);

$rating=$row['rating'] + $score;
$vote=$row['q_vote']+1;

$update=mysql_query("UPDATE date SET rating='$rating', q_vote='$vote' WHERE id=$id",$db);

if($update)
{
	echo "<html><head>
	<meta http-equiv='Refresh' content='0; URL=view_post.php?id=$id'>
	</head></html>";
	
	exit();
}

}

?>
