<? include("lock.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<script language="JavaScript" type="text/javascript" src="../editor/openwysiwyg/wysiwyg.js"></script>
<script language="JavaScript" type="text/javascript" src="../editor/jquery.js"></script>
<strong>
<head>


<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Добавление заметки</title>
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
          <td width="737" align="center" valign="top" class="back"><p class="articles_title">Добавление заметки на сайт</p>
           
            <form id="form1" name="form1" method="post" action="add_post.php">
              <p><hr /></p>
              <p>
                <label for="title">Введите название заметки:<br />
                  <br />
                </label>
                <input name="title" type="text" id="title" size="40" />
              </p>
              <p>
                <label for="meta_d">Введите краткое описание заметки:<br />
                  <br />
                </label>
                <input name="meta_d" type="text" id="meta_d" value="" size="40" />
              </p>
              <p>
                <label for="meta_k">Введите ключевые слова для заметки:<br />
                  <br />
                </label>
                <input name="meta_k" type="text" id="meta_k" size="47" />
              </p>
              <p>
                <label for="meta_cat">Выберите категорию для заметки:<br />
                  <br />
                </label>
                <select name="cat">
<?

$query=mysql_query("SELECT id, title FROM categories",$db);

if(!$query)
{
	echo "<p>Query to database is not valid! Say it to your admin: </p>";
	exit(mysql_error());	
}

if(mysql_num_rows($query)<1)
{
	echo "<p>The table is empty!</p>";
                exit();
}

else
{
$row=mysql_fetch_array($query);
do
{
printf("<option value='%s'>%s</option>",$row['id'],$row['title']);
}
while($row=mysql_fetch_array($query));
}
?>
                </select>
              </p>
              <p>
                <label for="meta_img">Введите путь к картинке (50х50 пикс.):<br />
                  <br />
                </label>
                <input name="img" type="text" id="img" size="47" />
              </p>
              <p>
                <label for="date">Дата добавления заметки: 
                  <input name="date" type="text" id="date" value="<? echo date('Y-m-d'); ?>" size="10" />
                  <br />
                </label>
              </p>
              <p><hr /></p>
              <p>
                <label for="description">Введите описание заметки:</label>
              </p>
              <p>
                <textarea name="description" id="description_np" cols="70" rows="5"></textarea><script language="JavaScript">
  generate_wysiwyg('description_np');
</script>
                <label for="date">                  <br />
                  <br />
                </label>
                <label for="text">Введите полный текст заметки:</label>
              </p>
              <p>
                <textarea name="text" id="text_np" cols="70" rows="20"></textarea><script language="JavaScript">
  generate_wysiwyg('text_np');
</script>
                <label for="date"><br />
                  <br />
                </label>
                <label for="author">Введите автора (источник) заметки: </label>
              </p>
              <p>
                <input name="author" type="text" id="author" size="40" />
                <label for="date">  <br />
                 <br /> <hr  /> <br  />
                  <input type="submit" name="submit" id="submit" value="Добавить заметку" /><input name="reset" type="reset" value="Сброс" />
<br />
                  <br />
                </label>
              </p>
            </form>
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