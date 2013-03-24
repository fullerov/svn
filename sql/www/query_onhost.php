<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<? include("db.php"); ?> 
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Результат обработки запроса</title>
<style type="text/css">
<!--
body {
    font: 100%/1.3 Verdana, Arial, Helvetica, sans-serif;
	background: #EEE;
	margin: 0;
	padding: 0;
	color:#5E5E5E;
}


a img {
 opacity:0.3; -moz-opacity:0.3; filter:alpha(opacity=40); border: none;
 }

a:hover img {
 opacity:1.0; -moz-opacity:1.0; filter:alpha(opacity=100);
 }
/* ~~ Селекторы элементов/тегов ~~ */
ul, ol, dl { /* Из-за различий между браузерами рекомендуется обнулять поля в списках. Для согласованности можно указать нужные величины либо здесь, либо в элементах списка (LI, DT, DD), которые они содержат. Помните, что сделанное здесь последовательно включается в список .nav, если только не будет прописан более конкретный селектор. */
	padding: 0;
	margin: 0;
}
h1, h2, h3, h4, h5, h6 {
	margin-top: 0;	 /* удаление верхнего поля позволяет обойти проблему выхода полей за границы содержащего их контейнера DIV. Оставшееся нижнее поле отделит его от любых последующих элементов. */
	padding-right: 15px;
	color:#CBCBCB;
	padding-left: 15px; /* добавление боковых полей к элементам внутри контейнеров DIV, а не к самим контейнерам избавляет от необходимости расчетов рамочной модели. В качестве альтернативы можно использовать вложенный контейнер DIV с боковыми полями. */
}
p {
	margin-top: 0;	 /* удаление верхнего поля позволяет обойти проблему выхода полей за границы содержащего их контейнера DIV. Оставшееся нижнее поле отделит его от любых последующих элементов. */
	padding-right: 15px;
	padding-left: 15px; /* добавление боковых полей к элементам внутри контейнеров DIV, а не к самим контейнерам избавляет от необходимости расчетов рамочной модели. В качестве альтернативы можно использовать вложенный контейнер DIV с боковыми полями. */
}
/* ~~ Оформление ссылок на вашем сайте должно оставаться в этом порядке, включая группу селекторов, создающих эффект наведения. ~~ */
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

/* ~~ этот контейнер окружает все остальные контейнеры DIV, задавая их ширину на процентной основе ~~ */
.container {
	width: 80%;
	max-width: 1260px;/* желательно задать максимальную ширину, чтобы макет не стал слишком широким на большом экране. Это повышает удобство чтения строк. В IE6 это объявление не соблюдается. */
	min-width: 780px;/* желательно задать минимальную ширину, чтобы макет не стал слишком узким. Это повышает удобство чтения строк в боковых столбцах. В IE6 это объявление не соблюдается. */
	background: #FFF;
	margin: 0 auto; /* автоматическое задание величин по бокам в совокупности с шириной центрирует макет. Это необязательно, если ширина контейнера составляет 100 %. */
}

/* ~~верхнему колонтитулу не задана ширина. Он растянется по всей ширине макета. Он содержит заполнитель для изображения, который должен быть заменен логотипом по ссылке~~ */
.header {
	background: #CCCCCC;
}

/* ~~ Информация по макету. ~~ 

1) Поля размещены только вверху и/или внизу DIV. Элементы в этом DIV имеют боковые поля. Это избавляет пользователя от необходимости расчетов рамочной модели. Помните, что при добавлении боковых полей или границы к самому DIV их ширина будет добавлена к задаваемой ширине, что образует "полную" ширину. Кроме того, можно удалить поля элемента в DIV и поместить внутри него второй DIV без ширины и с необходимыми по проекту полями.

*/
.content {
	padding: 10px 0;
}

/* ~~ Этот сгруппированный селектор выдает списки в пространстве .content ~~ */
.content ul, .content ol { 
	padding: 0 15px 15px 40px; /* это поле зеркально повторяет правое поле в правиле для заголовков и параграфов выше. Внизу поле помещено как граница между элементами списков, а слева — как отступ. Поля можно настраивать по желанию. */
}

/* ~~ Нижний колонтитул ~~ */
.footer {
    padding: 0px;
	background: #CCCCCC;
	text-align:center;
}

/* ~~ прочие классы float/clear ~~ */
.fltrt {  /* этот класс можно использовать для обтекания элемента справа на странице. Обтекаемый элемент должен предшествовать элементу, с которым он должен находиться рядом на странице. */
	float: right;
	margin-left: 8px;
}
.fltlft { /* этот класс можно использовать для обтекания элемента слева на странице. Обтекаемый элемент должен предшествовать элементу, с которым он должен находиться рядом на странице. */
	float: left;
	margin-right: 8px;
}
.clearfloat { /* этот класс можно поместить в теге <br /> или в пустом блоке DIV в качестве конечного элемента, следующего за последним обтекаемым DIV (внутри #container), если .#footer удален или извлечен из #container */
	clear:both;
	height:0;
	font-size: 1px;
	line-height: 0px;
}

.headers
{
 opacity:1; -moz-opacity:1; filter:alpha(opacity=100); border: none;
}
-->
</style>

</head>

<body>

<div class="container">
  <div class="header" align="center"><a href="http://queries.tk/"><img class="headers" src="name.gif" alt="SQL" name="logo" width="780" height="120" id="Insert_logo" style="background: #C0C0C0; display:block;" /></a>

    <!-- end .header --></div>
  <div class="content">
    
    <p><BR />
      <?  

//восстановление исходной таблицы
   if(isset($_POST['rescue']))
   {
	   $drop=mysql_query("DROP TABLE `u567383400_sql.persons`",$db);
	   $drop_db=mysql_query("DROP DATABASE `u567383400_sql`",$db);
	   $create_db=mysql_query("CREATE DATABASE `u567383400_sql`",$db);
	   mysql_select_db("u567383400_sql",$db);
	   $make=mysql_query("CREATE TABLE `u567383400_sql`.`persons` (
`id` int(5) NOT NULL AUTO_INCREMENT,
`name` varchar(200) NOT NULL,
`last_name` varchar(200) NOT NULL,
`tel` varchar(35) NOT NULL,
`address` varchar(255) NOT NULL,
`gender` varchar(10) NOT NULL,
PRIMARY KEY (`id`)
) DEFAULT CHARSET=utf8;",$db);
	   $insert=mysql_query("INSERT INTO persons (`id`, `name`, `last_name`, `tel`, `address`, `gender`)
	    VALUES ('1', 'Инна', 'Орлова', '55-26-16', 'г. Бишкек ул. Заводская д. 15', 'жен.'), ('2', 'Алия', 'Кадырова', '55-89-16', 'г. Бишкек ул. Ленина д. 23', 'жен.'), 
		('3', 'Александр', 'Иванов', '65-22-12', 'г. Бишкек ул. Совхозная д. 5', 'муж.'), 
		('4', 'Аскар', 'Бакиев', '35-42-15', 'г. Бишкек пр. Мира д. 1', 'муж.'), 
		('5', 'Валерия', 'Ким', '45-52-65', 'г. Бишкек пр. Мира д. 1', 'жен.'), 
		('6', 'Анна', 'Алиева', '46-66-75', 'г. Бишкек пр. Мира д. 11', 'жен.'), 
		('7', 'Каролина', 'Фуллер', '56-56-65', 'г. Бишкек пр. Чуй д. 125', 'жен.'), 
		('8', 'Аэлита', 'Пак', '16-36-68', 'г. Бишкек ул. Ленина д. 50', 'жен.'), 
		('9', 'Виктор', 'Сидоров', '11-33-38', 'г. Бишкек ул. Лесная д. 22', 'муж.'), 
		('10', 'Александр', 'Сидоров', '41-53-38', 'г. Бишкек ул. Красной армии д. 234', 'муж.'), 
		('11', 'Иван', 'Сидоров', '17-38-39', 'г. Бишкек ул. 50-летия КССР д. 202', 'муж.'), 
		('12', 'Екатерина', 'Ким', '87-93-30', 'г. Бишкек ул. Лесная д. 212', 'жен.'), 
		('13', 'Леонид', 'Фролов', '34-33-32', 'г. Бишкек ул. Коммунаров д. 253', 'муж.');",$db);
	  
	  
	   if($insert)   
	   		echo"<br><p><center><b>База данных успешно восстановлена!</b></center></p>";
	   else
			echo "<p><center><em>Обнаружена ошибка, таблица не восстановлена:</em> <br><b style='color:#C3C3C3';>";
			echo mysql_error();	echo "</b></p></center>";
			
			
   }


// вывод данных
   if(isset($_POST['submit']))
{
echo "<p style='font-size:16px; font-weight:bold;'>Результат обработки запроса:</p><p style='color:#C3C3C3; font-size:13px; margin-top:-10px; font-weight:bold; text-align:center;'><br>";

	if(isset($_POST['query']))
	{
		
		 if(!empty($_POST['query']))
		{ 
		
// замена символов в строке запроса

		$q[]=$_POST['query'];
		$query="";
		foreach($q as $l)
{
    $l = str_replace(array('\\', '/'), '', $l);
    $query=$l;
}

//
		$query=trim($query);
		
		//вывод текста запроса на экран
		echo "$query</p><br>";
		
		$execute=mysql_query($query,$db);
		
		if($execute)
			{
				$num_row=mysql_num_rows($execute);
				$row=mysql_fetch_array($execute);
				$fields = mysql_num_fields($execute);
			}
			
	    if($num_row==0 and $fields!=0)
		{
			// вывод имени полей
			$j=0;
			echo "<table width='700' border='' cellspacing='1' cellpadding='0' align='center' style='text-align: center;'><tr>";
			
			do{
				
			$name = mysql_field_name($execute, $j);
			$j++;
			echo "<td><b>$name</b></td>";
			}
			while($j<$fields);
			
			echo "</tr></table><center><br><p><b>Таблица пуста!</b></p></center>";
			echo"<p>&nbsp;</p><br /><br /><br /><br />
    <p><a style='text-decoration:none; font-family:'Comic Sans MS', cursive;' href='index.php'><b><<<em> Назад к вводу запроса</em></b></a></p>
    <!-- end .content --></div>
  <div class='footer'>
    <center>
     <p style='color:#EFEFEF;'><strong>Queries.TK &copy;</strong> <em>- 2012 -   </em><em>By <a style='color:#EFEFEF; text-decoration:none;' href='mailto:mail@shapovalov.org'>Шаповалов А.А. ИС-1-08</a></em></p>
</center>
    <!-- end .footer --></div>
  <!-- end .container --></div>
</body>
</html>";
			exit();
		}
		
		
			
		//вывод результата в таблице
		if($row)
		{
			echo "<table width='700' border='' cellspacing='1' cellpadding='0' align='center' style='text-align: center;'>";
			
			// вывод имени полей
			$j=0;
			do{
				
			$name  = mysql_field_name($execute, $j);
			$j++;
			echo "<td><b>$name</b></td>";
			}
			while($j<$fields);
			
			
			//вывод строки таблицы
			
			do{
			echo "<tr>";

			//вывод столбца таблицы
			
			$ki=0;
			while($ki<$fields)
			{	
        echo "<td>$row[$ki]</td>";
		$ki++;
			}
			
			}
			while($row=mysql_fetch_array($execute));
			
			

			
			echo "</tr></table>";
			
		
				
				
				

			echo "<br><p align='center' style='color:#C3C3C3'><i>Количество записей в таблице: $num_row</i></p>";
			echo "<p align='center' style='color:#C3C3C3'><i>Количество полей в таблице: $j</i></p>";

			

			
			
		}
		else
		{
			echo "<p><center><em>Ошибка SQL запроса:</em> <br><b style='color:#C3C3C3';>";
			echo mysql_error();	echo "</b></p></center>";
		}
	}
	else
	{
		echo "<center><p>Строка запроса пуста! Вернитесь и введите в неё SQL запрос!</p></center>";	
	}
	
}
}

// удаление данных
   if(isset($_POST['del']))
{
echo "<p style='font-size:16px; font-weight:bold;'>Результат обработки запроса:</p><p style='color:#C3C3C3; font-size:13px; margin-top:-10px; font-weight:bold; text-align:center;'><br>";

	if(isset($_POST['query']))
	{
		 if(!empty($_POST['query']))
		{ 
		
		// замена символов в строке запроса

		$q[]=$_POST['query'];
		$query="";
		foreach($q as $l)
{
    $l = str_replace(array('\\', '/'), '', $l);
    $query=$l;
}

//

		$query=trim($query);
		
		//вывод текста запроса на экран
		echo "$query</p><br>";
		
		$execute=mysql_query($query,$db);
		if($execute)
		{
			echo "<center><p>Данные успешно удалены!</p></center>";	
		}
		else
		{
			echo "<p><center><em>Ошибка SQL запроса:</em> <br><b style='color:#C3C3C3';>";
			echo mysql_error();	echo "</b></p></center>";
		}
	}
	else
	{
		echo "<p><center>Строка запроса пуста! Вернитесь и введите в неё SQL запрос!</p></center>";	
	}
	
}
}

// ввод данных
   if(isset($_POST['insrt']))
{
echo "<p style='font-size:16px; font-weight:bold;'>Результат обработки запроса:</p><p style='color:#C3C3C3; font-size:13px; margin-top:-10px; font-weight:bold; text-align:center;'><br>";

	if(isset($_POST['query']))
	{
		 if(!empty($_POST['query']))
		{ 
		
		// замена символов в строке запроса

		$q[]=$_POST['query'];
		$query="";
		foreach($q as $l)
{
    $l = str_replace(array('\\', '/'), '', $l);
    $query=$l;
}

//
		$query=trim($query);
		
		//вывод текста запроса на экран
		echo "$query</p><br>";
		
		$execute=mysql_query($query,$db);
		if($execute)
		{
			echo "<center><p>Данные успешно добавлены!</p></center>";	
		}
		else
		{
			echo "<p><center><em>Ошибка SQL запроса:</em> <br><b style='color:#C3C3C3';>";
			echo mysql_error();	echo "</b></p></center>";
		}
	}
	else
	{
		echo "<p><center>Строка запроса пуста! Вернитесь и введите в неё SQL запрос!</p></center>";	
	}
	
}
}


// изменение таблицы
   if(isset($_POST['alter']))
{
echo "<p style='font-size:16px; font-weight:bold;'>Результат обработки запроса:</p><p style='color:#C3C3C3; font-size:13px; margin-top:-10px; font-weight:bold; text-align:center;'><br>";

	if(isset($_POST['query']))
	{
		 if(!empty($_POST['query']))
		{ 
		
		// замена символов в строке запроса

		$q[]=$_POST['query'];
		$query="";
		foreach($q as $l)
{
    $l = str_replace(array('\\', '/'), '', $l);
    $query=$l;
}

//
		$query=trim($query);
		
		//вывод текста запроса на экран
		echo "$query</p><br>";
		
		$execute=mysql_query($query,$db);
		if($execute)
		{
			echo "<center><p>Таблица успешно изменена!</p></center>";	
		}
		else
		{
			echo "<p><center><em>Ошибка SQL запроса:</em> <br><b style='color:#C3C3C3';>";
			echo mysql_error();	echo "</b></p></center>";
		}
	}
	else
	{
		echo "<p><center>Строка запроса пуста! Вернитесь и введите в неё SQL запрос!</p></center>";	
	}
	
}
}


// создание таблицы
   if(isset($_POST['create']))
{
echo "<p style='font-size:16px; font-weight:bold;'>Результат обработки запроса:</p><p style='color:#C3C3C3; font-size:13px; margin-top:-10px; font-weight:bold; text-align:center;'><br>";

	if(isset($_POST['query']))
	{
		 if(!empty($_POST['query']))
		{ 
		
// замена символов в строке запроса

		$q[]=$_POST['query'];
		$query="";
		foreach($q as $l)
{
    $l = str_replace(array('\\', '/'), '', $l);
    $query=$l;
}

//
		
		$query=trim($query);
		
		//вывод текста запроса на экран
		echo "$query</p><br>";
		
		$execute=mysql_query($query,$db);
		if($execute)
		{
			echo "<center><p>Объект создан!</p></center>";	
		}
		else
		{
			echo "<p><center><em>Ошибка SQL запроса:</em> <br><b style='color:#C3C3C3';>";
			echo mysql_error();	echo "</b></p></center>";
		}
	}
	else
	{
		echo "<p><center>Строка запроса пуста! Вернитесь и введите в неё SQL запрос!</p></center>";	
	}
	
}
}

// обновление данных
   if(isset($_POST['update']))
{
echo "<p style='font-size:16px; font-weight:bold;'>Результат обработки запроса:</p><p style='color:#C3C3C3; font-size:13px; margin-top:-10px; font-weight:bold; text-align:center;'><br>";

	if(isset($_POST['query']))
	{
		 if(!empty($_POST['query']))
		{ 

// замена символов в строке запроса

		$q[]=$_POST['query'];
		$query="";
		foreach($q as $l)
{
    $l = str_replace(array('\\', '/'), '', $l);
    $query=$l;
}

//

		$query=trim($query);
		
		//вывод текста запроса на экран
		echo "$query</p><br>";
		
		$execute=mysql_query($query,$db);
		if($execute)
		{
			echo "<center><p>Данные обновлены!</p></center>";	
		}
		else
		{
			echo "<p><center><em>Ошибка SQL запроса:</em> <br><b style='color:#C3C3C3';>";
			echo mysql_error();	echo "</b></p></center>";
		}
	}
	else
	{
		echo "<p><center>Строка запроса пуста! Вернитесь и введите в неё SQL запрос!</p></center>";	
	}
	
}
}

// при обращение к странице напрямую
if(!isset($_POST['update']) and !isset($_POST['create']) and !isset($_POST['insrt']) and !isset($_POST['del']) and !isset($_POST['submit']) and !isset($_POST['rescue']) and !isset($_POST['alter']))
{
	echo "<br><br><p align='center'><b>Вернитесь назад и введите SQL запрос!</b></p>";
}

?>
      
      
   </p>
    <p>&nbsp;</p><br /><br /><br /><br />
    <p><a style="text-decoration:none; font-family:'Comic Sans MS', cursive;" href="index.php"><b><<<em> Назад к вводу запроса</em></b></a></p>
</center><center><? include("stat.html"); ?></center>
   <!-- end .content --></div>
  <div class="footer">
    <center>
    <p style="color:#E7E7E7;"><strong>Queries.TK </strong><strong>&copy; </strong>  <em>v0.9</em> <em><a style="color:#EFEFEF; text-decoration:none;" href="mailto:mail@shapovalov.org">Шаповалов А.А. ИС-1-08</a></em></p>
</center>
    <!-- end .footer --></div>
  <!-- end .container --></div>
</body>
</html>