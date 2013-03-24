<? include("lock.php");
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<script language="JavaScript" type="text/javascript" src="../editor/openwysiwyg/wysiwyg.js"></script>
<script language="JavaScript" type="text/javascript" src="../editor/jquery.js"></script>
<strong>
<head>


<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Редактирование страницы</title>
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
          <td width="737" align="center" valign="top" class="back"><p class="articles_title">Редактирование страниц на сайте</p>
           
           <?
		   if(!isset($_GET['id']))
		   {    echo "<p align='left' style='color:#C8C8C8; margin:30px;'><i>Для редактирования страницы нажмите на её название:</i></p>";
		   		$result=mysql_query("SELECT id, title FROM settings",$db);
				$myrow=mysql_fetch_array($result);
				
				do
				{
					printf("<p class='edit_news'><a href='edit_pages.php?id=%s'> %s</a></p>",$myrow['id'],$myrow['title']);
				}
				while($myrow=mysql_fetch_array($result));
		   }
		   else
		   {
			$id=$_GET['id'];
			
			$result=mysql_query("SELECT * FROM settings WHERE id='$id'",$db);
			$myrow=mysql_fetch_array($result);
			   
print <<<HERE
<form id="form1" name="form1" method="post" action="update_pages.php">
              <p><hr /></p>
              <p>
                <label for="title">Введите название страницы:<br />
                  <br />
                </label>
                <input value="$myrow[title]" name="title" type="text" id="title" size="40" />
              </p>
              <p>
                <label for="meta_d">Введите краткое описание страницы:<br />
                  <br />
                </label>
                <input value="$myrow[meta_d]" name="meta_d" type="text" id="meta_d" value="" size="40" />
              </p>
              <p>
                <label for="meta_k">Введите ключевые слова для страницы:<br />
                  <br />
                </label>
                <input value="$myrow[meta_k]" name="meta_k" type="text" id="meta_k" size="47" />
              </p>
      
              <p><hr /></p>
        
                <label for="text">Введите текст страницы (с тегами):</label>
              </p>
              <p>
                <textarea name="text" id="text_edippage" cols="70" rows="20">$myrow[text]</textarea><script language="JavaScript">
  generate_wysiwyg('text_edippage');
</script>
                <label for="date"><br />
                  <br />
                </label>
                 <br /> <hr  /> <br  />
				 <input name="id" type="hidden" value="$myrow[id]" />
                  <input type="submit" name="submit" id="submit" value="Сохранить изменения" />
                  <input name="reset" type="reset" value="Сброс" />
				  <br />
                  <br />
                </label>
              </p>
            </form>
HERE;
			   
			   
		   }
		   ?>
           
          <p>&nbsp;</p></td>
        </tr>
    </table></th>
  </tr>
  <!--Подключаем нижний блок-->
  <? include("blocks/footer.php"); ?>
</table>
</body>
</strong>
</html>