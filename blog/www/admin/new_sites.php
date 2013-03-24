<? include("lock.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<strong>
<head>


<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Добавление ссылки на ресурс</title>
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
          <td width="737" align="center" valign="top" class="back"><p class="articles_title">Добавление ссылки на сайт</p>
           
            <form id="form1" name="form1" method="post" action="add_sites.php">
              <p><hr /></p>
              <p>
                <label for="title">Введите название ресурса:<br />
                  <br />
                </label>
                <input name="title" type="text" id="title" size="40" />
              </p>
              <p>
                <label for="url">Введите гиперссылку на ресурс: <i>(без http://)</i><br />
                  <br />
                </label>
                <input name="url" type="text" id="url" value="www.links.org"  size="40" />
              </p>
                <br />
                 <br /> <hr  /> <br  />
                  <input type="submit" name="submit" id="submit" value="Добавить ссылку" /><input name="reset" type="reset" value="Сброс" />
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