<? include("blocks/bd.php");?>
<?php

if(isset($_POST['name']))
{
$name=$_POST['name'];
}
if(isset($_POST['text']))
{
$text=$_POST['text'];
}
if(isset($_POST['id']))
{
$id=$_POST['id'];
}
if(isset($_POST['primer']))
{
$primer=$_POST['primer'];
}
if(isset($_POST['submit']))
{
$submit=$_POST['submit'];	
}

if(isset($submit))
{
	if(isset($name)){$name=trim($name);}
	else{$name="";}
	if(isset($text)){$text=trim($text);}
	else{$text="";}
	
	if(empty($name) or empty($text))
	{ 
	
	ob_end_flush();
		exit("<p>Вы ввели данные не во все поля! Вернитесь назад и повторите ввод данных!<br>
		<a href='view_post.php?id=$id'><< Вернуться назад</a>");
	}
	
	$name=stripslashes($name);
	$name=htmlspecialchars($name);
	$text=stripslashes($text);
	$text=htmlspecialchars($text);
	
	$pr_query=mysql_query("SELECT primer FROM post WHERE id=1",$db);
	$pr_row=mysql_fetch_array($pr_query);
	
	if($primer==$pr_row['primer'])
	{
	
		$date=date("Y-m-d");
		$query_add=mysql_query("INSERT INTO comments (post, author, text, date) VALUES ('$id', '$name', '$text', '$date')");
		
		$adr_q=mysql_query("SELECT * FROM options WHERE id=1",$db);
		$adr_r=mysql_fetch_array($adr_q);
		
		$address=$adr_r['address'];
		$subject="Новый комментарий на ".$adr_r['s_name']."";
		
		$mess_query=mysql_query("SELECT title FROM date WHERE id='$id'",$db);
		$mess_row=mysql_fetch_array($mess_query);
		
		$title=$mess_row['title'];
		$message="Добавлен новый комментарий к странице - ".$title."\nКомментарий добавил: ".$name."\n\nТекст комментария:\n".$text."\n\nДата добавления: ".$date."\nСсылка на страницу: http://blog/view_post.php?id=".$id."";
	
		if($adr_r['f_mail']=='1')
		{
	mail($address,$subject,$message,"content-type:text/plain; charset=utf8");
	$add_new_comment=mysql_query("UPDATE options SET new_comm='1' WHERE id='1'",$db);
		}
		else
		{
			$add_new_comment=mysql_query("UPDATE options SET new_comm='1' WHERE id='1'",$db);
		}

	echo "<html><head>
	<meta http-equiv='Refresh' content='0; URL=view_post.php?id=$id'>
	</head></html>";
	
	ob_end_flush();
	exit();
	}
	else
	{
	
	ob_end_flush();
		exit("<p>Вы ввели неправильное решение примера! Вернитесь назад и решите его ещё раз!<br>
		<a href='view_post.php?id=$id'><< Вернуться назад</a>");
	}
}




?>
