<? 
	include("db.php");
	
	mysql_query("UPDATE settings SET horiz='19', vert='-11', up='0.292893', down='0.292893' WHERE id='1'",$db);
?>

<html>
<style type="text/css">
<!--
a:link {
	color:#414958;
	text-decoration: underline; /* если только ссылки не должны выглядеть исключительно своеобразно, то для быстрого зрительного распознавания рекомендуется использовать подчеркивание */
}
a:visited {
	color: #4E5869;
	text-decoration: underline;
}
a:hover, a:active, a:focus { /* эта группа селекторов обеспечивает пользователю, работающему с клавиатурой, такие же возможности наведения, как и при использовании мыши. */
	text-decoration: none;
}


-->
</style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<head>
<title>Аттрактор Лоренца
</title>

</head>
<body bgcolor="#ECECEC">
<? include("header.html"); ?>
<center>
<h3>Аттрактор Лоренца</h3>

<?
$x=5;
$y=1;
$z=15;
$a=5;
$b=15;
$c=1;
$dt=0.001;
$i=40000;

if(isset($_POST['back']))
{
	if(isset($_POST['x']) and isset($_POST['y']) and isset($_POST['z']) and isset($_POST['a']) and isset($_POST['b']) and isset(			$_POST['c']) and isset($_POST['dt']) and isset($_POST['i']))
{
	$x=$_POST['x'];
	$y=$_POST['y'];
	$z=$_POST['z'];
	$a=$_POST['a'];
	$b=$_POST['b'];
	$c=$_POST['c'];
	$dt=$_POST['dt'];
	$i=$_POST['i'];
	
	
}
}
if(isset($_POST['p1']))
{
$x=3.0515;
$y=1.582;
$z=15.623;
$a=5;
$b=15;
$c=3;
$dt=0.01;
$i=1000000;
}

if(isset($_POST['p2']))
{
$x=5;
$y=1;
$z=15;
$a=5;
$b=15;
$c=1;
$dt=0.001;
$i=100000;
}

if(isset($_POST['p3']))
{
$x=2;
$y=2;
$z=20.5;
$a=5.5;
$b=7;
$c=1.5;
$dt=0.0001;
$i=1000000;
}

if(isset($_POST['p4']))
{
$x=12;
$y=3;
$z=23;
$a=10;
$b=10;
$c=10;
$dt=0.001;
$i=1000000;
}

if(isset($_POST['p5']))
{
$x=3.0515;
$y=1.582;
$z=15.623;
$a=5;
$b=15;
$c=3;
$dt=0.06;
$i=10000000;
}

?><p style="color:#A1A1A1"><b>Исходная система уравнений:</b></p>
<p>
<img src="img/formuly_lorentsa.png">
<form action="draw_att.php" method="post">

  <label>
</p>
<h3 >Введите исходные данные для построения аттрактора:</h3></label>
<p><strong>x =</strong><input name="x" type="text" value="<? echo $x; ?>" size="10" maxlength="30"></p>
<p><strong>y =</strong><input name="y" type="text" value="<? echo $y; ?>" size="10" maxlength="30"></p>
<p><strong>z =</strong><input name="z" type="text" value="<? echo $z; ?>" size="10" maxlength="30"></p>
<p><strong>a =</strong><input name="a" type="text" value="<? echo $a; ?>" size="10" maxlength="30"></p>
<p><strong>b =</strong><input name="b" type="text" value="<? echo $b; ?>" size="10" maxlength="30"></p>
<p><strong>c =</strong><input name="c" type="text" value="<? echo $c; ?>" size="10" maxlength="30"></p>
<p><strong>dt = </strong><input name="dt" type="text" value="<? echo $dt; ?>" size="10" maxlength="30"></p>
<p><strong>Количество итераций = </strong><input name="i" type="text" value="<? echo $i; ?>" size="10" maxlength="30"></p>
<input name="submit" value=" П о с т р о и т ь " type="submit">
</form>
<form action="attractor.php" method="post">
<input style="font-style:italic" name="p1" value="Пример №1" type="submit">
<input style="font-style:italic" name="p2" value="Пример №2" type="submit">
<input style="font-style:italic" name="p3" value="Пример №3" type="submit">
<input style="font-style:italic" name="p4" value="Пример №4" type="submit">
<input style="font-style:italic" name="p5" value="Пример №5" type="submit">
</form>
<br><br>
<< <a href="index.php"><i><strong>На главную</strong></i></a></center>
<? include("footer.html"); ?>
</body>
</html>