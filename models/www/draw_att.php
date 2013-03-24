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
<title>Аттрактор Лоренца: Фазовый портрет
</title>
<body bgcolor="#ECECEC">
<? include("header.html"); ?>
<?

if(isset($_POST['x']) and isset($_POST['y']) and isset($_POST['z']) and isset($_POST['a']) and isset($_POST['b']) and isset($_POST['c']) and isset($_POST['dt']) and isset($_POST['i']))
{
	if(is_numeric($_POST['x'])  and is_numeric($_POST['y']) and is_numeric($_POST['z']) and is_numeric($_POST['a']) and is_numeric($_POST['b']) and is_numeric($_POST['c']) and is_numeric($_POST['dt']) and is_numeric($_POST['i']))
	{
	$x=$_POST['x'];
	$y=$_POST['y'];
	$z=$_POST['z'];
	$a=$_POST['a'];
	$b=$_POST['b'];
	$c=$_POST['c'];
	$dt=$_POST['dt'];
	$i=$_POST['i'];
	
	
	
$query=mysql_query("SELECT * FROM settings");

	if($query)			
		{
			$row=mysql_fetch_array($query);
			$horiz=$row['horiz'];
			$vert=$row['vert'];
			$up=$row['up'];
			$down=$row['down'];
		}
	else echo "ERROR!!!";

	
	}
	else{ echo "<center><br><br><p style='font-size:18px;'>Некорректно введены исходные данные!</p><br><br>
<a href='attractor.php'><h3><< Вернутся к вводу данных</h3></a></center>";
	exit();}
}
?>
<p><h2 style="color:#A1A1A1">&nbsp;&nbsp;Фазовый портрет аттрактора:</h2></p>
<center> 
 
  <p><em><strong>При <? echo $i; ?> итерациях:<br></em>
 x=<? echo $x; ?>, y=<? echo $y; ?>, z=<? echo $z; ?>, a=<? echo $a; ?>, b=<? echo $b; ?>, c=<? echo $c; ?>, dt=<? echo $dt; ?>,</strong></p>
 <em>X = x + a*(-x+y)*dt;<br>
  Y = y + (b*x-y-z*x)*dt;<br>
  Z = z + (-c*z+x*y)*dt;<br><br></em>


<? 
// пример №1
if($x==3.0515 and $y==1.582 and $z==15.623 and $a==5 and $b==15 and $c==3 and $dt==0.01 and $i==1000000)
{

echo"<br><br><img src='img/01.png'><br><br><br>";
echo "X = 6.480740698407864 <br>
Y = 6.480740698407872 <br>
Z = 14.000000000000004 <br>

<form action='attractor.php' method='post'>
<input name='x' type='hidden' value='$_POST[x]'>
<input name='y' type='hidden' value='$_POST[y]'>
<input name='z' type='hidden' value='$_POST[z]'>
<input name='a' type='hidden' value='$_POST[a]'>
<input name='b' type='hidden' value='$_POST[b]'>
<input name='c' type='hidden' value='$_POST[c]'>
<input name='dt' type='hidden' value='$_POST[dt]'>
<input name='i' type='hidden' value='$_POST[i]'>
<p><input name='back' type='submit' value='<< Вернутся к вводу данных'></p>
</form>";
exit();
}

// пример №2
if($x==5 and $y==1 and $z==15 and $a==5 and $b==15 and $c==1 and $dt==0.001 and $i==100000)
{

echo"<br><br><img src='img/02.png'><br><br><br><br><br>";
echo "X = -0.0009752427355591631  <br>
Y = -0.058857914728735417  <br>
Z = 9.08112824042702 <br>

<form action='attractor.php' method='post'>
<input name='x' type='hidden' value='$_POST[x]'>
<input name='y' type='hidden' value='$_POST[y]'>
<input name='z' type='hidden' value='$_POST[z]'>
<input name='a' type='hidden' value='$_POST[a]'>
<input name='b' type='hidden' value='$_POST[b]'>
<input name='c' type='hidden' value='$_POST[c]'>
<input name='dt' type='hidden' value='$_POST[dt]'>
<input name='i' type='hidden' value='$_POST[i]'>
<p><input name='back' type='submit' value='<< Вернутся к вводу данных'></p>
</form>";
exit();
}

// пример №3
if($x==2 and $y==2 and $z==20.5 and $a==5.5 and $b==7 and $c==1.5 and $dt==0.0001 and $i==1000000)
{

echo"<br><br><img src='img/03.png'><br><br><br><br><br>";
echo "X = -3.000000000000808   <br>
Y = -3.000000000000502   <br>
Z = 6.000000000000843  <br>

<form action='attractor.php' method='post'>
<input name='x' type='hidden' value='$_POST[x]'>
<input name='y' type='hidden' value='$_POST[y]'>
<input name='z' type='hidden' value='$_POST[z]'>
<input name='a' type='hidden' value='$_POST[a]'>
<input name='b' type='hidden' value='$_POST[b]'>
<input name='c' type='hidden' value='$_POST[c]'>
<input name='dt' type='hidden' value='$_POST[dt]'>
<input name='i' type='hidden' value='$_POST[i]'>
<p><input name='back' type='submit' value='<< Вернутся к вводу данных'></p>
</form>";
exit();
}

// пример №4
if($x==12 and $y==3 and $z==23 and $a==10 and $b==10 and $c==10 and $dt==0.001 and $i==1000000)
{

echo"<br><br><img src='img/04.png'><br><br><br><br><br>";
echo "X = -9.486832980505174   <br>
Y = -9.486832980505085    <br>
Z = 9.000000000000071   <br>

<form action='attractor.php' method='post'>
<input name='x' type='hidden' value='$_POST[x]'>
<input name='y' type='hidden' value='$_POST[y]'>
<input name='z' type='hidden' value='$_POST[z]'>
<input name='a' type='hidden' value='$_POST[a]'>
<input name='b' type='hidden' value='$_POST[b]'>
<input name='c' type='hidden' value='$_POST[c]'>
<input name='dt' type='hidden' value='$_POST[dt]'>
<input name='i' type='hidden' value='$_POST[i]'>
<p><input name='back' type='submit' value='<< Вернутся к вводу данных'></p>
</form>";
exit();
}

// пример №5
if($x==3.0515 and $y==1.582 and $z==15.623 and $a==5 and $b==15 and $c==3 and $dt==0.06 and $i==10000000)
{

echo"<br><br><img src='img/05.png'><br><br><br>";
echo "X = 6.480740698407864 <br>
Y = 6.480740698407872 <br>
Z = 14.000000000000004 <br>

<form action='attractor.php' method='post'>
<input name='x' type='hidden' value='$_POST[x]'>
<input name='y' type='hidden' value='$_POST[y]'>
<input name='z' type='hidden' value='$_POST[z]'>
<input name='a' type='hidden' value='$_POST[a]'>
<input name='b' type='hidden' value='$_POST[b]'>
<input name='c' type='hidden' value='$_POST[c]'>
<input name='dt' type='hidden' value='$_POST[dt]'>
<input name='i' type='hidden' value='$_POST[i]'>
<p><input name='back' type='submit' value='<< Вернутся к вводу данных'></p>
</form>";
exit();
}


// если нажата кнопка изменяем положение аттрактора

if(isset($_POST['left']))
{
	$horiz+=1;
	
	mysql_query("UPDATE settings SET horiz='$horiz' WHERE id='1'",$db);
	
}


if(isset($_POST['right']))
{
	$horiz-=1;
	
	mysql_query("UPDATE settings SET horiz='$horiz' WHERE id='1'",$db);
	
}

if(isset($_POST['minus']))
{
	$horiz-=1;
	$vert+=1;
	mysql_query("UPDATE settings SET horiz='$horiz', vert='$vert' WHERE id='1'",$db);
	
}

if(isset($_POST['plus']))
{
	$horiz+=1;
	$vert-=1;
	mysql_query("UPDATE settings SET horiz='$horiz', vert='$vert' WHERE id='1'",$db);
	
}

if(isset($_POST['default']))
{
	$horiz=19;
	$vert=-11;
	$up=0.292893;
	$down=0.292893;
	mysql_query("UPDATE settings SET up='$up', down='$down', horiz='$horiz', vert='$vert' WHERE id='1'",$db);
}

if(isset($_POST['up']))
{
	$up-=0.1;
	$down+=0.1;
	//$vert-=1;
	mysql_query("UPDATE settings SET up='$up', down='$down' WHERE id='1'",$db);
}

if(isset($_POST['down']))
{
	$up+=0.1;
	$down-=0.1;
	//$vert+=1;
	mysql_query("UPDATE settings SET up='$up', down='$down' WHERE id='1'",$db);
}

?>
<!--Скрипт строящий аттрактор-->

<canvas height='800' width='800' id='cnv'></canvas>
<script>
        var cnv = document.getElementById('cnv');
       if(cnv.getContext)
	   {
	    var cx = cnv.getContext('2d');
	   }
	   else
	   { 
	   alert('Ваш браузер не поддерживает HTML 5, невозможно отобразить фазовый портрет!');
	   document.close();
	  
	   }
	    var x = <? echo $x; ?>, y = <? echo $y; ?>, z = <? echo $z; ?>, x1, y1, z1;
        var dt = <? echo $dt; ?>;
        var a = <? echo $a; ?>, b = <? echo $b; ?>, c = <? echo $c; ?>;
        var h = parseInt(cnv.getAttribute('height'));
        var w = parseInt(cnv.getAttribute('width'));
        var id = cx.createImageData(w, h);
	    var rd = Math.round;
        var idx = 0;       
		var l=<? echo $horiz; ?>;
		var r=<? echo $vert; ?>;
		var u=<? echo $up; ?>;
		var d=<? echo $down; ?>;
		 i=<? echo $i; ?>;
		 while (i--) {
                x1 = x + a*(-x+y)*dt;
                y1 = y + (b*x-y-z*x)*dt;
                z1 = z + (-c*z+x*y)*dt;
                x = x1; y = y1; z = z1;
				                  
                idx=4*(rd(l*(y - x*u) + 340) + rd(r*(z + x*d) + 399)*w);
                id.data[idx+3] = 157;
				id.data[idx+2] = 147;
				id.data[idx+1] = 147; //green
				id.data[idx+1] = 47;
				


        }
	   

		cx.putImageData(id, 0, 0);
		
		cx.beginPath();
		cx.globalAlpha = 0.8;
		cx.moveTo(50,50);
		cx.lineTo(50,420);
		cx.lineTo(420,520);
		cx.lineWidth = 1;
		cx.strokeStyle = "black";
		cx.stroke();
		
		cx.beginPath();
		cx.globalAlpha = 0.8;
		cx.moveTo(50,420);
		cx.lineTo(-285,720);
		cx.lineWidth = 0.5;
		cx.strokeStyle = "black";
		cx.stroke();
		
		cx.beginPath();
		cx.globalAlpha = 0.8;
		cx.moveTo(50,420);
		cx.lineTo(225,280);
		cx.lineWidth = 1;
		cx.strokeStyle = "black";
		cx.stroke();
		
		cx.beginPath();
		cx.globalAlpha = 0.8;
		cx.moveTo(50,420);
		cx.lineTo(50,500);
		cx.lineWidth = 0.5;
		cx.strokeStyle = "black";
		cx.stroke();
		
		cx.beginPath();
		cx.globalAlpha = 0.8;
		cx.moveTo(50,420);
		cx.lineTo(0,405);
		cx.lineWidth = 0.5;
		cx.strokeStyle = "black";
		cx.stroke();
		
		cx.fillStyle = "black";
		cx.textBaseline = "bottom";
		cx.font = "bold italic 12pt Arial";
   	    cx.fillText("Y", 53, 480);
		
		cx.textBaseline = "bottom";
		cx.font = "bold italic 12pt Arial";
   	    cx.fillText("X", 5, 400);
		
		cx.textBaseline = "bottom";
		cx.font = "bold italic 12pt Arial";
   	    cx.fillText("Z", 5, 450);
	
	
        
		
		
		
</script>

<form style="margin-top:-800px;" action="draw_att.php" method="post">
<input name="x" type="hidden" value="<? echo $_POST['x']; ?>">
<input name="y" type="hidden" value="<? echo $_POST['y']; ?>">
<input name="z" type="hidden" value="<? echo $_POST['z']; ?>">
<input name="a" type="hidden" value="<? echo $_POST['a']; ?>">
<input name="b" type="hidden" value="<? echo $_POST['b']; ?>">
<input name="c" type="hidden" value="<? echo $_POST['c']; ?>">
<input name="dt" type="hidden" value="<? echo $_POST['dt']; ?>">
<input name="i" type="hidden" value="<? echo $_POST['i']; ?>">

<input name="left" type="submit" value="<">
<input  name="up" type="submit" value="<<">
<input  name="plus" type="submit" value="+">
<input name="default" type="submit" value="|">
<input  name="minus" type="submit" value="-">
<input name="down" type="submit" value=">>">
<input name="right" type="submit" value=">">

</form>
<br>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<br>
X = <script>document.writeln(x1);</script><br>
Y = <script>document.writeln(y1);</script><br>
Z = <script>document.writeln(z1);</script><br>



<br>
<form action="attractor.php" method="post">
<input name="x" type="hidden" value="<? echo $_POST['x']; ?>">
<input name="y" type="hidden" value="<? echo $_POST['y']; ?>">
<input name="z" type="hidden" value="<? echo $_POST['z']; ?>">
<input name="a" type="hidden" value="<? echo $_POST['a']; ?>">
<input name="b" type="hidden" value="<? echo $_POST['b']; ?>">
<input name="c" type="hidden" value="<? echo $_POST['c']; ?>">
<input name="dt" type="hidden" value="<? echo $_POST['dt']; ?>">
<input name="i" type="hidden" value="<? echo $_POST['i']; ?>">
<p><input name="back" type="submit" value="<< Вернутся к вводу данных"></p>
</form>
</center>		

<!--[if gte IE 5]>
<body oncontextmenu="return false;">
<script type="text/javascript">
createPopup().show( 0, 0, 0, 0, 0 );
</script><![endif]-->
<body oncontextmenu="return false;">
<? include("footer.html"); ?>
</body>
</html>