<link href="../style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
function hide()
{
	document.getElementById("frm_input").style.visibility="hidden";
	
}

</script>
<td width="25%" valign="top" class="left" >
<?

$left_query=mysql_query("SELECT * FROM options WHERE id=1");
$left_row=mysql_fetch_array($left_query);
?>
<?
//Авторизация
if(isset($_SESSION['auth']) and isset($_SESSION['login']) and $_SESSION['auth']!="")
{
	echo "<i><b><p style='color:#A5BAAB;'>Здравствуйте, $_SESSION[login]!</p></b></i>
	<form action='$_SERVER[PHP_SELF]?$_SERVER[QUERY_STRING]' method='post'>
	<center><input type='submit' style='cursor:pointer; background-color:#E3E3E3; color:#999999; font-weight:bolder; margin-left:2px; margin-top:-5px;' name='clear' value='Выход'/></center>
	</form>
	";
}
else{echo enter();}

if(isset($_SESSION['type']) and $_SESSION['type']=='admin')
{
	echo "<center><a href='/admin' style='color:#999999; font-weight:bolder; margin-left:3px; margin-top:60px;'>Администраторская</a></center>";
	
}

if(isset($_POST['clear']))
{session_destroy();
header("Location: $_SERVER[PHP_SELF]?$_SERVER[QUERY_STRING]");

}

function enter()
{
 return "<form style='visibility:visible' id='frm_input' name='inp' method='post' action='$_SERVER[PHP_SELF]?$_SERVER[QUERY_STRING]'>
	<p style='color:darkgrey;'><b>Вход на сайт:</b></p>
	<p style='margin-left:20px; margin-left:35px;'><i>Логин:</i><br> <input name='login' type='text' size='19' maxlength='25' /><br>
	<i>Пароль:</i><br> <input name='password' type='password' size='19' maxlength='25' /></p>
	<p><center><input style='background-color:#e3e3e3; border:none; cursor:pointer; margin-bottom:2px; color:white; font-weight:bold;' type='submit' name='enter' onclick='hide()' value='Вход' />
	</form>
	<form name='reg' method='post' action='registration.php'>
	<input style='background-color:#e3e3e3; border:none; cursor:pointer; color:white; font-weight:bold; font-style:italic;' name='register' type='submit' value='Регистрация' /></center></p>
	</form><hr>";
}
			
	if(isset($_POST['enter'])){
		
		if((isset($_POST['login']) and isset($_POST['password']) and !empty($_POST['login']) and !empty($_POST['password'])) or (!isset($_SESSION['auth'])))
		{
			$login=$_POST['login'];
			$login=trim($login);
			$login=stripslashes($login);
			$login=htmlspecialchars($login);
			
			$password=$_POST['password'];
			$password=trim($password);
			$password=stripslashes($password);
			$password=htmlspecialchars($password);
			$password=crypt($password,"b4");
			
			
			$come_q=mysql_query("SELECT user, pass, type FROM userlist WHERE user='$login' and pass='$password'");
			$come_r=mysql_fetch_array($come_q);
			
			if($_POST['login']=="" or $_POST['password']=="" or !$come_q)
			{echo"<i><b><p style='color:darkred;'>Заполните все поля!</p></b></i>";}
			
			elseif($come_q and $come_r['user']==$login and $come_r['pass']==$password)
				{
					$_SESSION['login']=$login;
					$_SESSION['auth']=md5($password.$login);
					$_SESSION['type']=$come_r['type'];
					echo "<i><b><p style='color:#A5BAAB;'>Здравствуйте, $_SESSION[login]!</p></b></i>";
					header("Location: $_SERVER[PHP_SELF]?$_SERVER[QUERY_STRING]");
				}
		     else{ echo "<i><b><p style='color:darkred'>Некорректный логин или пароль!</p></b></i>"; }
		
		}
		 
	    
	}
	
	

?>

<div class="nav_title"><? echo $left_row['cat_n'];?></div> 
<?
//вывод категорий
$query2=mysql_query("SELECT id, title FROM categories");

if(!$query2)
{
	echo "<p>Query to database is not valid! Say it to your admin: </p>";
	exit(mysql_error());	
}

if(mysql_num_rows($query2)<1)
{
	echo "<p>The table is empty!</p>";
                exit();
}

else
{
$row2=mysql_fetch_array($query2);

do
{
	
printf("<p class='nav_links'><img src='../img/arr.jpg'><a class='nav_links' href='view_cat.php?cat=%s'>%s</a></p>",$row2['id'],$row2['title']);

}
while($row2=mysql_fetch_array($query2));
}
?>

<br />
<div class="nav_title"><? echo $left_row['last5'];?></div> 
<?
// последние записи
$post_querys=mysql_query("SELECT id,title FROM date ORDER BY date DESC, id DESC LIMIT 5");

if(!$post_querys)
{
	echo "<p>Query to database is not valid! Say it to your admin: </p>";
	exit(mysql_error());	
}

if(mysql_num_rows($post_querys)<1)
{
	echo "<p>The table is empty!</p>";
                exit();
}

else
{
$posts_row=mysql_fetch_array($post_querys);

do
{
	
printf("<p class='nav_links'><img src='../img/arr3.jpg'><a class='nav_links' href='view_post.php?id=%s'>%s</a></p>",$posts_row['id'],$posts_row['title']);

}
while($posts_row=mysql_fetch_array($post_querys));
}
?>

<br />
<div class="nav_title"><? echo $left_row['archiv'];?></div> 
<?
// архив
$arch_query=mysql_query("SELECT DISTINCT left(date,7) AS month FROM date ORDER BY month DESC LIMIT 5");

if(!$arch_query)
{
	echo "<p>Query to database is not valid! Say it to your admin: </p>";
	exit(mysql_error());	
}

if(mysql_num_rows($arch_query)<1)
{
	echo "<p>The table is empty!</p>";
                exit();
}

else
{
$arch_row=mysql_fetch_array($arch_query);

do
{
	
printf("<p><a class='nav_links_d' style='margin-left:50px' align='center' href='view_date.php?date=%s'>- %s -</a></p>",$arch_row['month'],$arch_row['month']);

}
while($arch_row=mysql_fetch_array($arch_query));
}
?>
<br />
<!--Поиск-->
<div class="nav_title"><? echo $left_row['search'];?></div> 
<p class="search_desc">Три и более символа</p>
<form action="view_search.php" method="post" name="form_s">
<input class="search_field" type="text" name="search" size="27" maxlength="40"/>
<p><input style="cursor:pointer; background-color:#E3E3E3; color:#999999; font-weight:bolder; margin-left:2px; margin-top:-10px;" type="submit" name="submit" value="П о и с к" /></p>
</form>
<br />

<div class="nav_title"><? echo $left_row['recom'];?></div> 
<?
// ссылки
$link_query=mysql_query("SELECT title, url FROM links ORDER BY id DESC");
$link_row=mysql_fetch_array($link_query);

do
{
	printf("<p class='point'><a class='nav_links' style='background-color:#EBEBEB' href='http://%s/'> %s </a></p>",$link_row['url'],$link_row['title']);
}
while($link_row=mysql_fetch_array($link_query));
?>


<br />
<div class="nav_title"><? echo $left_row['statist'];?></div> 
<?
// статистика
function online()
{
	$ip=getenv("HTTP_X_FORWARDED_FOR");
	if(empty($ip) || $ip=='unknown'){ $ip=getenv("REMOTE_ADDR");}
	
	//drop old sessions
	mysql_query("DELETE FROM online WHERE UNIX_TIMESTAMP() - UNIX_TIMESTAMP(time) > 300") or die("Can't delete old session");
	
	//user checking and add
	$select=mysql_query("SELECT ip FROM online WHERE ip='$ip'") or die("Can't select double"); 
	$tmp=mysql_fetch_row($select);
	if($ip==$tmp[0])
	{
		mysql_query("UPDATE online SET time=NOW() WHERE ip='$ip'") or die("Can't update");
	}
	else
	{
		mysql_query("INSERT INTO online (ip,time) VALUES ('$ip',NOW())") or die("Can't insert");
	}
	
	//reading results
	$select=mysql_query("SELECT COUNT(*) FROM online") or die("Can't select result");
	$tmp=mysql_fetch_row($select);
	$result=$tmp['0'];
	return $result;
}

echo "<p class='stat_str'>На ресурсе <b>".online()."</b> чел.</p>";

$stat_query=mysql_query("SELECT COUNT(*) FROM date");
$stat_row=mysql_fetch_array($stat_query);

echo "<p class='stat_str'>Записей в блоге: "."<b>".$stat_row['0']."</b></p>";

$stat_query=mysql_query("SELECT COUNT(*) FROM settings");
$stat_row=mysql_fetch_array($stat_query);

echo "<p class='stat_str'>Страниц в блоге: "."<b>".$stat_row['0']."</b></p>";
$stat_query=mysql_query("SELECT COUNT(*) FROM comments");
$stat_row=mysql_fetch_array($stat_query);

echo "<p class='stat_str'>Комментариев в блоге: "."<b>".$stat_row['0']."</b></p><br>";

$st_q=mysql_query("SELECT stat FROM options WHERE id=1",$db);
$st_r=mysql_fetch_array($st_q);
print "<p>".$st_r['stat']."</p>";
?>
<br />
<br />


</td>