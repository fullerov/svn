<? 
	include("db.php");
	
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
<title>Модель "Хищник-Жертва"
</title>

</head>
<body bgcolor="#ECECEC">
<? include("header.html"); ?>
<center>
<h3>Модель Лотки — Вольтерра (<em>Хищник-Жертва</em>)</h3>

<?

if(isset($_POST['back']))
{
$t=$_POST['t']; 
$r=$_POST['r'];  
$a=$_POST['a']; 
$q=$_POST['q']; 
$f=$_POST['f']; 
$x=$_POST['x']; 
$y=$_POST['y']; 
}
else
{
$t=200; 
$r=0.2; 
$a=0.005; 
$q=0.1; 
$f=0.1;
$x=150;
$y=50;
}
?>
<p style="color:#A1A1A1"><b>Исходная система уравнений:</b></p>
<p>
<img src="img/lotki.png">
<form action="lotki.php" method="post">

  <label>
</p>
<h3 >Введите исходные данные для построения модели:</h3></label>
<p><strong>t =</strong><input name="t" type="text" value="<? echo $t; ?>" size="10" maxlength="30"></p>
<p><strong>r =</strong><input name="r" type="text" value="<? echo $r; ?>" size="10" maxlength="30"></p>
<p><strong>a =</strong><input name="a" type="text" value="<? echo $a; ?>" size="10" maxlength="30"></p>
<p><strong>q =</strong><input name="q" type="text" value="<? echo $q; ?>" size="10" maxlength="30"></p>
<p><strong>f =</strong><input name="f" type="text" value="<? echo $f; ?>" size="10" maxlength="30"></p>
<p><strong>x =</strong><input name="x" type="text" value="<? echo $x; ?>" size="10" maxlength="30"></p>
<p><strong>y = </strong><input name="y" type="text" value="<? echo $y; ?>" size="10" maxlength="30"></p>
<input name="submit" value=" П о с т р о и т ь " type="submit">
</form>
<p>
<strong>r</strong> — коэффициент рождаемости;<br>
<strong>a</strong> — коэффициент пропорциональности, характеризующий вымирание жертв вследствие их встречи с хищником;<br>
<strong>f</strong> — коэффициент пропорциональности, характеризующий потребность в пище хищника; <br>
<strong>q</strong> — коэффициент смертности;<br>
</p>
<br><br>
<< <a href="index.php"><i><strong>На главную</strong></i></a></center>
<? include("footer.html"); ?>
</body>
</html>