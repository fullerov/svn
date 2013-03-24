<? include("lock.php");
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<script language="JavaScript" type="text/javascript" src="../editor/openwysiwyg/wysiwyg.js"></script>
<script language="JavaScript" type="text/javascript" src="../editor/jquery.js"></script>
<strong>
<head>


<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Редактирование заметки</title>
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
    <th height="158" class="back"><table width="1000" border="0" align="left" cellpadding="1" cellspacing="0" class="table">
        <tr>
        <!--Подключаем левый блок сайта-->
          <? include("blocks/left.php"); ?>
          <td width="737" align="center" valign="top" class="back"><p class="add_news_title"><p align="center" class="articles_title">Редактирование заметок на блоге</p>
           
           <?
		   if(!isset($_GET['id']))
		   {
			    echo "<p align='left' style='color:#C8C8C8; margin:30px;'><i>Для редактирования заметки нажмите на её название:</p></i>";
		   		$result=mysql_query("SELECT id, title FROM date",$db);
				$myrow=mysql_fetch_array($result);
				
				do
				{
					printf("<p class='edit_post'><a href='edit_post.php?id=%s'>%s. %s</a></p>",$myrow['id'],$myrow['id'],$myrow['title']);
				}
				while($myrow=mysql_fetch_array($result));
		   }
		   else
		   {
			$id=$_GET['id'];
			
			$result=mysql_query("SELECT * FROM date WHERE id='$id'",$db);
			$myrow=mysql_fetch_array($result);
			   
		echo "<hr /><p>Выберите категорию:</p><form id='form1' name='form1' method='post' action='update_post.php'>
<p>
<select name='cat'>";
		
		$cat_query=mysql_query("SELECT id, title FROM categories",$db);
		$cat_row=mysql_fetch_array($cat_query);
		$rows=mysql_num_rows($cat_query);
		
		do
		{
			if($myrow['cat']==$cat_row['id'])
			{
				printf("<option value='%s' size='$rows' selected>%s</option>",$cat_row['id'],$cat_row['title']);
			}
			else
			{
			   printf("<option value='%s' size='$rows'>%s</option>",$cat_row['id'],$cat_row['title']);
			}
		}
		while($cat_row=mysql_fetch_array($cat_query));
			    
			 
			  
			  
	
			   
			   
print <<<HERE
              </select>
              <p>
                <label for="title">Введите название заметки:<br />
                  <br />
                </label>
                <input value="$myrow[title]" name="title" type="text" id="title" size="40" />
              </p>
              <p>
                <label for="meta_d">Введите краткое описание заметки:<br />
                  <br />
                </label>
                <input value="$myrow[meta_d]" name="meta_d" type="text" id="meta_d" value="" size="40" />
              </p>
              <p>
                <label for="meta_k">Введите ключевые слова для заметки:<br />
                  <br />
                </label>
                <input value="$myrow[meta_k]" name="meta_k" type="text" id="meta_k" size="47" />
              </p>
			   <p>
                <label for="img">Введите путь к картинке (50х50 пикс.):<br />
                  <br />
                </label>
                <input value="$myrow[img]" name="img" type="text" id="img" size="47" />
              </p>
                <label for="date">Введите дату добавления заметки: 
                  <input value="$myrow[date]" name="date" type="text" id="date" size="10" />
                  <br />
                </label>
              </p>
              <p><hr /></p>
              <p>
                <label for="description">Введите описание заметки:</label>
              </p>
              <p>
                <textarea name="description" id="description_ep" cols="70" rows="5">$myrow[description]</textarea><script language="JavaScript">
  generate_wysiwyg('description_ep');
</script>
                <label for="date">                  <br />
                  <br />
                </label>
                <label for="text">Введите полный текст заметки:</label>
              </p>
              <p>
                <textarea name="text" id="text_ep" cols="70" rows="20">$myrow[text]</textarea><script language="JavaScript">
  generate_wysiwyg('text_ep');
</script>
                <label for="date"><br />
                  <br />
                </label>
                <label for="author">Введите автора (источник) заметки: </label>
              </p>
              <p>
                <input value="$myrow[author]" name="author" type="text" id="author" size="40" />
                <label for="date">  <br />
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