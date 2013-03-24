<? include("lock.php");
$ml_q=mysql_query("SELECT * FROM options WHERE id=1",$db);
$ml_r=mysql_fetch_array($ml_q);

$admn_q=mysql_query("SELECT user, pass FROM userlist WHERE id=1",$db);
$admn_r=mysql_fetch_array($admn_q);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>


<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Редактирование названий разделов</title>
<link href="style2.css" rel="stylesheet" type="text/css" />
<style type="text/css">
body {
	background-color: #FFF;
}
body,td,th {
	color: #000;
}
</style>
</head>

<body>
<table width="1000" height="506" border="1" align="center" cellpadding="0" cellspacing="0" class="head_back">
<!--Подключаем шапку сайта-->
  <? include("blocks/header.php");?>
  <tr align="center">
    <th height="158" class="back"><table width="1000" border="0" align="left" cellpadding="0" cellspacing="0" class="table">
        <tr>
        <!--Подключаем левый блок сайта-->
          <? include("blocks/left.php"); ?>
          <td width="737" align="center" valign="top" class="back">
          <p class="news"> Здесь Вы можете редактировать названия разделов и категорий левого блока сайта</p>
           
           
           <?
		   
		      // изменение названия и слогана
		   if(isset($_POST['subb']))
		   {
			   if(isset($_POST['name_s']) and isset($_POST['slogan']))
			  { 
			    $s_name=$_POST['name_s'];
				$slogan=$_POST['slogan'];
			  	$add_cl=mysql_query("UPDATE options SET s_name='$s_name', slogan='$slogan' WHERE id=1",$db);
				if($add_cl)
				{
				echo"<p style='color:white'><br>Верхняя часть изменена!</p>";
				unset($s_name); unset($slogan); unset($add_cl); unset($_POST['name_s']); unset($_POST['slogan']);
				unset($_POST['subb']);
				}
				else{echo "Обнаружены ошибки! Верхняя часть не изменена!";}
			  }
			   
		   }
		   else
		   {
		   echo "<hr />
           <h3>Верхний блок:</h3>
           <form action='cats.php' method='post'>
           <p style='margin-bottom:-1px;'><i>Название ресурса:</i></p>
		   <input name='name_s' type='text' value='$ml_r[s_name]' />
		   <p style='margin-bottom:-1px;'><i>Слоган:</i></p>
		   <input name='slogan' type='text' value='$ml_r[slogan]' />
           <br><input name='subb' type='submit' value='Изменить' />
           </form>";
		   }
           
		  
           // изменение нижней строки копирайта
		   if(isset($_POST['sub']))
		   {
			   if(isset($_POST['copy_r']))
			  { 
			    $copy_r=$_POST['copy_r'];
			  	$add_c=mysql_query("UPDATE options SET copy_r='$copy_r' WHERE id=1",$db);
				if($add_c)
				{
				echo"<p style='color:white'><br>Строка копирайта изменена!</p>";
				unset($copy_r); unset($add_c); unset($_POST['copy_r']); unset($_POST['sub']);
				}
				else{echo "Обнаружены ошибки! Строка копирайта не изменена!";}
			  }
			   
		   }
		   else
		   {
		   echo "<hr />
           <h3>Строка копирайта:</h3>
           <form action='cats.php' method='post'>
           <input name='copy_r' type='text' value='$ml_r[copy_r]' />
           <input name='sub' type='submit' value='Изменить' />
           </form><br>";
		   }
		   
		   
		   // изменение названия категорий
		   if(isset($_POST['edit']))
		   {
			   if(isset($_POST['cat_n']) and !empty($_POST['cat_n']))
			  { 
			    $cat_n=$_POST['cat_n'];
			  	$add_c=mysql_query("UPDATE options SET cat_n='$cat_n' WHERE id=1",$db);
				if($add_c)
				{
				echo"<p style='color:white'><br>Название категории успешно изменено!</p>";
				unset($cat_n); unset($add_c); unset($_POST['cat_n']); unset($_POST['edit']);
				}
				else{echo "Обнаружены ошибки! Данные не изменены!";}
			  }
			  else{ echo "<p style='color:white'><br>Вы должны ввести данные поле!</p>";}
			   
		   }
		   else
		   {
		   echo "<hr/>
           <h3>Раздел категорий:</h3>
           <form action='cats.php' method='post'>
		   <input name='cat_n' type='text' value='$ml_r[cat_n]' />
		   <br><input name='edit' type='submit' value='Изменить' style='margin-top:5px; margin-bottom:6px;' /><hr/>
           </form>";
		   }
		   
		   // последние записи
		   if(isset($_POST['subm']))
		   {
			   if(isset($_POST['last5']))
			  { 
			    $last5=$_POST['last5'];
			  	$addl=mysql_query("UPDATE options SET last5='$last5' WHERE id=1",$db);
				if($addl)
				{
				echo"<p style='color:white'><br>Название последних записей изменено!</p>";
				unset($last5); unset($addl); unset($_POST['last5']); unset($_POST['subm']);
				}
				else{echo "Обнаружены ошибки! Название не изменено!";}
			  }
			   
		   }
		   else
		   {
		   echo "
           <h3>Категория полседних записей:</h3>
           <form action='cats.php' method='post'>
           <input name='last5' type='text' value='$ml_r[last5]' />
           <input name='subm' type='submit' value='Изменить' />
           </form>";
		   }
		  
           // архив записей
		   if(isset($_POST['submm']))
		   {
			   if(isset($_POST['archiv']))
			  { 
			    $archiv=$_POST['archiv'];
			  	$addar=mysql_query("UPDATE options SET archiv='$archiv' WHERE id=1",$db);
				if($addar)
				{
				echo"<p style='color:white'><br>Название архивной категории изменено!</p>";
				unset($archiv); unset($addar); unset($_POST['archiv']); unset($_POST['submm']);
				}
				else{echo "Обнаружены ошибки! Название не изменено!";}
			  }
			   
		   }
		   else
		   {
		   echo "
           <h3>Архив записей:</h3>
           <form action='cats.php' method='post'>
           <input name='archiv' type='text' value='$ml_r[archiv]' />
           <input name='submm' type='submit' value='Изменить' />
           </form>";
		   }
		  
           // ссылки
		   if(isset($_POST['subml']))
		   {
			   if(isset($_POST['recom']))
			  { 
			    $recom=$_POST['recom'];
			  	$addln=mysql_query("UPDATE options SET recom='$recom' WHERE id=1",$db);
				if($addln)
				{
				echo"<p style='color:white'><br>Название категории ссылок изменено!</p>";
				unset($recom); unset($addln); unset($_POST['recom']); unset($_POST['subml']);
				}
				else{echo "Обнаружены ошибки! Название не изменено!";}
			  }
			   
		   }
		   else
		   {
		   echo "
           <h3>Список ссылок:</h3>
           <form action='cats.php' method='post'>
           <input name='recom' type='text' value='$ml_r[recom]' />
           <input name='subml' type='submit' value='Изменить' />
           </form>";
		   }
		   
		
		// Поиск
		   if(isset($_POST['submls']))
		   {
			   if(isset($_POST['search']))
			  { 
			    $search=$_POST['search'];
			  	$addsr=mysql_query("UPDATE options SET search='$search' WHERE id=1",$db);
				if($addsr)
				{
				echo"<p style='color:white'><br>Название категории поиска изменено!</p>";
				unset($search); unset($addsr); unset($_POST['search']); unset($_POST['submls']);
				}
				else{echo "Обнаружены ошибки! Название не изменено!";}
			  }
			   
		   }
		   else
		   {
		   echo "
           <h3>Раздел поиска:</h3>
           <form action='cats.php' method='post'>
           <input name='search' type='text' value='$ml_r[search]' />
           <input name='submls' type='submit' value='Изменить' />
           </form>";
		   }
		   
		   // Статистика
		   if(isset($_POST['submlst']))
		   {
			   if(isset($_POST['statist']))
			  { 
			    $statist=$_POST['statist'];
			  	$addstt=mysql_query("UPDATE options SET statist='$statist' WHERE id=1",$db);
				if($addstt)
				{
				echo"<p style='color:white'><br>Название категории статистики изменено!</p>";
				unset($statist); unset($addstt); unset($_POST['statist']); unset($_POST['submlst']);
				}
				else{echo "Обнаружены ошибки! Название не изменено!";}
			  }
			   
		   }
		   else
		   {
		   echo "
           <h3>Раздел для статистики:</h3>
           <form action='cats.php' method='post'>
           <input name='statist' type='text' value='$ml_r[statist]' />
           <input name='submlst' type='submit' value='Изменить' />
           </form>";
		   }
		   
           ?>
           <br />
          </td>
        </tr>
    </table></th>
  </tr>
  <!--Подключаем нижний блок-->
  <? include("blocks/footer.php"); ?>
</table>
</body>
</html>