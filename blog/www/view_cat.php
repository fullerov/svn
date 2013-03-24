<? include("blocks/bd.php"); ?>
<?

if(isset($_GET['cat']))
{
	$cat=$_GET['cat'];
}
else{ $cat=1;}

if(!preg_match("|^[\d]+$|",$cat)){ exit("Некорректный параметр в URL !<br><a href='index.php'><< Вернуться на ресурс</a>"); }

$query=mysql_query("SELECT * FROM categories WHERE id='$cat'",$db);

if(!$query)
{
	echo "<p>Query is not valid! Say this code error to your admin: </p>";
	exit(mysql_error());	
}

if(mysql_num_rows($query)>0)
{
    $row=mysql_fetch_array($query);
	
}

else
{

	echo "<p align='center' style='font-weight:bold'>Такой категории нет!<br><br><a href='index.php'><< Вернуться на ресурс</a></p>";
	exit();
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf8" />
<meta name="keywords" content="<? echo $row['meta_k']; ?>" />
<meta name="description" content="<? echo $row['meta_d']; ?>" />

<title><? echo "Категория: ".$row['title']; ?></title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<table width="900" border="0" align="center" cellpadding="0" cellspacing="0">
  <? include("blocks/header.php"); ?> 
  <tr bgcolor="#FFFFFF">
    <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <? include("blocks/left.php"); ?>
        <td width="75%" valign="top"><p><? echo $row['text']; 
		
$em_query=mysql_query("SELECT * FROM date WHERE cat='$cat'");

if(mysql_num_rows($em_query)<1)
{
$start=0; $num=0;
echo "<p align='center' style='font-weight:bold'>В категории нет записей!</p>";
echo " </td>
      </tr>
    </table></td>
  </tr>";
   include("blocks/footer.php");
   echo"</table>";
   exit();
}
else
{
	$result77 = mysql_query("SELECT str FROM navig", $db);
$myrow77 = mysql_fetch_array($result77);
$num = $myrow77["str"];
// Извлекаем из URL текущую страницу
@$page = $_GET['page'];
// Определяем общее число сообщений в базе данных
$result00 = mysql_query("SELECT COUNT(*) FROM date WHERE cat='$cat'");
$temp = mysql_fetch_array($result00);
$posts = $temp[0];
// Находим общее число страниц
$total = (($posts - 1) / $num) + 1;
$total =  intval($total);
// Определяем начало сообщений для текущей страницы
$page = intval($page);
// Если значение $page меньше единицы или отрицательно
// переходим на первую страницу
// А если слишком большое, то переходим на последнюю
if(empty($page) or $page < 0) $page = 1;
  if($page > $total) $page = $total;
// Вычисляем начиная с какого номера
// следует выводить сообщения
$start = $page * $num - $num;
// Выбираем $num сообщений начиная с номера $start
}
		
		?></p>

            <?
	
		   $result=mysql_query("SELECT * FROM date WHERE cat='$cat' ORDER BY id LIMIT $start, $num",$db);
		   $myrow=mysql_fetch_array($result);
		   
		   if(mysql_num_rows($result)>0)
		   {
		   
 do
 {          
 
 $r=$myrow['rating']/$myrow['q_vote'];
 $r=intval($r);
  
      printf("
	  
	
	  <table align='center' width='640' border='1' cellspacing='0' cellpadding='0' bordercolor='#DADADA'>
            <tr>
              <td class='post_title' height='42' align='center' valign='top' >
			  <img width='50' height='50' src='%s' align='left' class='m_img'/>
			  <a class='post_link' href='view_post.php?id=%s'><p class='post_name'>%s</p></a>
			  <p class='post_add'>Добавлено: %s </td>
            </tr>
            <tr >
              <td class='post' height='66' align='center' valign='top'><p class='post_descr'>%s</p>
			  <br><img align='right' src='img/%s.png'></td>
            </tr>
            <tr>
              <td class='post_title' height='20' align='center' valign='top'><p class='post_author_cat'>Автор: %s </p><p class='post_cat_views'>Просмотров: %s</p></td>
            </tr>
          </table><br>", $myrow['img'], $myrow['id'], $myrow["title"], $myrow["date"], $myrow["description"], $r, $myrow["author"], $myrow['view']);
 }
 while($myrow=mysql_fetch_array($result));
		echo"<center>";  
		  // Проверяем нужны ли стрелки назад
if ($page != 1) $pervpage = '<a href=view_cat.php?cat='.$cat.'&page=1>Первая</a> | <a href=view_cat.php?cat='.$cat.'&page='. ($page - 1) .'>Предыдущая</a> | ';
// Проверяем нужны ли стрелки вперед
if ($page != $total) $nextpage = ' | <a href=view_cat.php?cat='.$cat.'&page='. ($page + 1) .'>Следующая</a> | <a href=view_cat.php?cat='.$cat.'&page=' .$total. '>Последняя</a>';

// Находим две ближайшие станицы с обоих краев, если они есть
if($page - 5 > 0) $page5left = ' <a href=view_cat.php?cat='.$cat.'&page='. ($page - 5) .'>'. ($page - 5) .'</a> | ';
if($page - 4 > 0) $page4left = ' <a href=view_cat.php?cat='.$cat.'&page='. ($page - 4) .'>'. ($page - 4) .'</a> | ';
if($page - 3 > 0) $page3left = ' <a href=view_cat.php?cat='.$cat.'&page='. ($page - 3) .'>'. ($page - 3) .'</a> | ';
if($page - 2 > 0) $page2left = ' <a href=view_cat.php?cat='.$cat.'&page='. ($page - 2) .'>'. ($page - 2) .'</a> | ';
if($page - 1 > 0) $page1left = '<a href=view_cat.php?cat='.$cat.'&page='. ($page - 1) .'>'. ($page - 1) .'</a> | ';

if($page + 5 <= $total) $page5right = ' | <a href=view_cat.php?cat='.$cat.'&page='. ($page + 5) .'>'. ($page + 5) .'</a>';
if($page + 4 <= $total) $page4right = ' | <a href=view_cat.php?cat='.$cat.'&page='. ($page + 4) .'>'. ($page + 4) .'</a>';
if($page + 3 <= $total) $page3right = ' | <a href=view_cat.php?cat='.$cat.'&page='. ($page + 3) .'>'. ($page + 3) .'</a>';
if($page + 2 <= $total) $page2right = ' | <a href=view_cat.php?cat='.$cat.'&page='. ($page + 2) .'>'. ($page + 2) .'</a>';
if($page + 1 <= $total) $page1right = ' | <a href=view_cat.php?cat='.$cat.'&page='. ($page + 1) .'>'. ($page + 1) .'</a>';

// Вывод меню если страниц больше одной

if ($total > 1)
{
Error_Reporting(E_ALL & ~E_NOTICE);
echo "<div class=\"pstrnav\">";
echo $pervpage.$page5left.$page4left.$page3left.$page2left.$page1left.'<b>'.$page.'</b>'.$page1right.$page2right.$page3right.$page4right.$page5right.$nextpage;
echo "</div>";

echo"</center>";  
}
		  
		   }
		   else{ exit("<p align='center' style='font-weight:bold'>В категории нет записей!</p>");}
		 ?>
            
         </td>
      </tr>
    </table></td>
  </tr>
  <? include("blocks/footer.php"); ?>
</table>
</body>
</html>