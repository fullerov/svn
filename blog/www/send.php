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
if(isset($_POST['primer']))
{
$primer=$_POST['primer'];
}
if(isset($_POST['submit']))
{
$submit=$_POST['submit'];	
}
if(isset($_POST['title']))
{
$title=$_POST['title'];	
}
if(isset($_POST['address']))
{
$address=$_POST['address'];	
}




if(isset($submit))
{
	if(isset($name)){$name=trim($name);}
	else{$name="";}
	if(isset($title)){$title=trim($title);}
	else{$title="";}
	if(isset($text)){$text=trim($text);}
	else{$text="";}
	if(isset($address)){$address=trim($address);}
	else{$address="";}
	
	if(empty($name) or empty($text) or empty($address) or empty($title))
	{
	
	exit("<p>Вы ввели данные не во все поля! Вернитесь назад и повторите ввод данных!<br>
		<a href='contact.php'><< Вернуться назад</a>");
	}
	
	$name=stripslashes($name);
	$name=htmlspecialchars($name);
	$text=stripslashes($text);
	$text=htmlspecialchars($text);
	
	$address=stripslashes($address);
	$address=htmlspecialchars($address);
    $title=stripslashes($title);
	$title=htmlspecialchars($title);
	
	
	
	$pr_query=mysql_query("SELECT primer FROM post WHERE id=2",$db);
	$pr_row=mysql_fetch_array($pr_query);
	
	if($primer==$pr_row['primer'])
	{
		$adr_q=mysql_query("SELECT * FROM options WHERE id=1",$db);
		$adr_r=mysql_fetch_array($adr_q);
		$send_to=$adr_r['address'];
		$f_mail=$adr_r['f_mail'];
		$date=date("Y-m-d");
		

		$message="Отправитель: ".$name."\n\nАдрес отправителя: \n".$address."\n\nТекст письма: \n".$text."\n\nДата добавления: ".$date."";
		if($f_mail==0)
		{
			$query_add=mysql_query("INSERT INTO mails (`name`, `e_mail`, `title`, `text`, `date`) VALUES ('$name',  '$address',  '$title',  '$text',  '$date')");
		if(!$query_add)
			exit(mysql_error($query_add)); 
		}
		else
		{
			mail($send_to,$title,$message,"content-type:text/plain; charset=utf8");
		}
		
		$new_mess=mysql_query("UPDATE options SET new_mail='1' WHERE id='1'",$db);
		if(!$new_mess)
		{echo mysql_error($new_mess); exit();}
		
echo "<html><head>
	<meta http-equiv='Refresh' content='0; URL=index.php'>
	</head></html>";
	
	exit();
	}
	else
	{

	exit("<p>Вы ввели неправильное решение примера! Вернитесь назад и решите его ещё раз!<br>
		<a href='contact.php'><< Вернуться назад</a>");
	}
}




?>