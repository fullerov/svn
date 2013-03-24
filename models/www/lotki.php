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
<title>Модель "Хищник - жертва": результат
</title>
<body bgcolor="#ECECEC">
<? include("header.html"); ?>
<h2 style="color:#A1A1A1">&nbsp;&nbsp;Результат:</h2>

 <?

	if(isset($_POST['t']) and is_numeric($_POST['t']) and isset($_POST['r']) and is_numeric($_POST['r']) and isset($_POST['a']) and is_numeric($_POST['a']) and isset($_POST['q']) and is_numeric($_POST['q']) and isset($_POST['f']) and is_numeric($_POST['f'])  and isset($_POST['x']) and is_numeric($_POST['x']) and isset($_POST['y']) and is_numeric($_POST['y']))
	{
	
	$j=0;
	$t=$_POST['t'];
	$r=$_POST['r']; 
	$a=$_POST['a']; 
	$q=$_POST['q'];
	$f=$_POST['f'];
	$n[$t];
	$n[0]=$_POST['x'];
	$c[$t];
	$c[0]=$_POST['y'];
	/*if($t>255)
	{
	echo "<center><br><p><b>Интервал времени превышен! Диапазон значений от 0 до 255!</b><br><br><a href='m_lotki.php'><< Назад к вводу данных</a></p></center>";
	exit();}
	}
	else
	{
		
		exit();
	}*/
	}
	?>
    
  <center>
  <p><em><strong>За <? echo $t; ?> единиц времени:<br></em>
 r=<? echo $r; ?>, a=<? echo $a; ?>, q=<? echo $q; ?>, f=<? echo $f; ?>, x=<? echo $n[0]; ?>, y=<? echo $c[0]; ?> </strong></p>
  </center>
<br><br>
<center>
<canvas height='600' width='800' id='cnv'></canvas>
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
	   
	    var i=0;
		var t=<? echo $t; ?>;
		n=new Array(t);
		n[0]=<? echo $n[0]; ?>;
		c= new Array(t);
		c[0]=<? echo $c[0]; ?>;
		var a=<? echo $a; ?>;
		var r=<? echo $r; ?>;
		var q=<? echo $q; ?>;
		var f=<? echo $f; ?>;
	    var x=0,y=0;
        var h = parseInt(cnv.getAttribute('height'));
        var w = parseInt(cnv.getAttribute('width'));
        var id = cx.createImageData(w, h);
	    var rd = Math.round;
        var idx = 0;   
		  

			
		 while (i<t)
        {
            n[i+1] = n[i] + r * n[i] - a * c[i] * n[i];
            c[i+1] = c[i] + f * a * c[i] * n[i] - q * c[i];
		    x=n[i]; y=c[i];          
            
			idx=4*(rd(0.5*(y - x*0.2) + 380) + rd(0.5*(y + x*0.2) + 169)*w);
                id.data[idx+3] = 255;
				id.data[idx+2] = 255;
				id.data[idx+1] = 40; //green
				id.data[idx+0] = 40; 

			i++;

        }
	   

	    cx.putImageData(id, 0, 0);
	    cx.beginPath();
		cx.globalAlpha = 0.8;
		cx.moveTo(50,50);
		cx.lineTo(50,420);
		cx.lineTo(765,420);
		cx.lineWidth = 1;
		cx.strokeStyle = "black";
		cx.stroke();
		
		cx.beginPath();
		cx.globalAlpha = 0.8;
		cx.moveTo(50,420);
		cx.lineTo(-285,420);
		cx.lineWidth = 0.5;
		cx.strokeStyle = "black";
		cx.stroke();
	
		cx.beginPath();
		cx.globalAlpha = 0.8;
		cx.moveTo(50,420);
		cx.lineTo(50,470);
		cx.lineWidth = 0.5;
		cx.strokeStyle = "black";
		
	
		cx.fillStyle = "black";
		cx.textBaseline = "bottom";
		cx.font = "bold  12pt Arial";
   	    cx.fillText("Y", 32, 465);
		
		cx.textBaseline = "bottom";
		cx.font = "bold  12pt Arial";
   	    cx.fillText("X", 5, 415);
		
		cx.fillStyle = "darkgray";
		cx.textBaseline = "bottom";
		cx.font = "italic 9pt Arial";
   	    cx.fillText("Жертвы", 711, 436);

		cx.font = "italic 9pt Arial";
   	    cx.fillText("Хищники", 0, 50);
		cx.stroke();
		
	




document.write("<canvas style='margin-left:10px;' height='1100' width='500' id='canvas'></canvas>");


 var canvas = document.getElementById('canvas');
 var canvas1 = canvas.getContext('2d');
		canvas1.beginPath();
		canvas1.globalAlpha = 0.8;

		
		
		i=0;
		while(i<t)
		{
			canvas1.lineTo(i*2,c[i]);
			i++;
		}
	    
		document.write("<br><br><br><i>Результат вычислений:</i><br><br><table width='700' border='' cellspacing='1' cellpadding='0' align='center' style='text-align: center;'><tr>");
document.write("<td><b>Время (t)</b></td><td><b>Жертвы (x)</b></td><td><b>Хищники (y)</b></td>");	
		
		canvas1.lineWidth = 0.5;
		canvas1.strokeStyle = "red";
		canvas1.stroke();
		canvas1.moveTo(0,155);
		canvas1.beginPath();
		i=0;
		
		while(i<t)
		{
			
			canvas1.lineTo(i*2,n[i]);
			
			document.write("</tr><td>");
			document.write(i+1);
			document.write("</td><td>");
			document.write(n[i]);
			document.write("</td><td>");
			document.write(c[i]);
			document.write("</td>");
			
			i++;
			
			
		}
	    
		
		canvas1.lineWidth = 0.5;
		canvas1.strokeStyle = "green";
		canvas1.stroke();
		
		canvas1.beginPath();
		canvas1.globalAlpha = 0.8;
		canvas1.moveTo(0,1090);
		canvas1.lineTo(500,1090);
		canvas1.lineWidth = 0.3;
		canvas1.strokeStyle = "black";
		canvas1.stroke();
		
		canvas1.beginPath();
		canvas1.globalAlpha = 0.8;
		canvas1.moveTo(0,0);
		canvas1.lineTo(0,1100);
		canvas1.lineWidth = 0.5;
		canvas1.strokeStyle = "black";
		canvas1.stroke();

		canvas1.beginPath();
		canvas1.fillStyle = "darkgray";
		canvas1.textBaseline = "bottom";
		canvas1.font = "10pt Arial";
   	    canvas1.fillText("Жертвы", 10, 1050);
		canvas1.stroke();
		
		canvas1.beginPath();
		canvas1.fillStyle = "darkgray";
		canvas1.textBaseline = "bottom";
		canvas1.font = "10pt Arial";
   	    canvas1.fillText("Хищники", 10, 1075);
		canvas1.stroke();
		
		canvas1.beginPath();
		canvas1.moveTo(10,1050);
		canvas1.lineTo(105,1050);
		canvas1.lineWidth = 0.8;
		canvas1.strokeStyle = "red";
		canvas1.stroke();
		
		canvas1.beginPath();
		canvas1.moveTo(10,1075);
		canvas1.lineTo(105,1075);
		canvas1.lineWidth = 0.8;
		canvas1.strokeStyle = "green";
		canvas1.stroke();
		
		canvas1.beginPath();
		canvas1.fillStyle = "dark";
		canvas1.textBaseline = "bottom";
		canvas1.font = "italic 10pt Arial";
   	    canvas1.fillText("Время", 450, 1087);
		canvas1.stroke();
		
		canvas1.beginPath();
		canvas1.fillStyle = "dark";
		canvas1.textBaseline = "bottom";
		canvas1.font = "italic 10pt Arial";
   	    canvas1.fillText("Численность", 5, 15);
		canvas1.stroke();
		
		document.write("</tr></table>");
		
</script>

</center>

<center>
<br>
<form action="m_lotki.php" method="post">
<input name="t" type="hidden" value="<? echo $_POST['t']; ?>">
<input name="r" type="hidden" value="<? echo $_POST['r']; ?>">
<input name="a" type="hidden" value="<? echo $_POST['a']; ?>">
<input name="q" type="hidden" value="<? echo $_POST['q']; ?>">
<input name="f" type="hidden" value="<? echo $_POST['f']; ?>">
<input name="x" type="hidden" value="<? echo $_POST['x']; ?>">
<input name="y" type="hidden" value="<? echo $_POST['y']; ?>">

<p><input name="back" type="submit" value="<< Вернутся к вводу данных"></p>
</form>
</center>		

 <!--[if gte IE 5]>
<body oncontextmenu="return false;">
<script type="text/javascript">
createPopup().show( 0, 0, 0, 0, 0 );
</script><![endif]-->

<? include("footer.html"); ?>
<body oncontextmenu="return false;"> 
</body>
</html>