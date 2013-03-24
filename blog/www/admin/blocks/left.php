<link href="../style2.css" rel="stylesheet" type="text/css" />
<td width="263" height="142" valign="top" bgcolor="#FFFFFF" class="left">

<font color="#666666"><center><a style="text-decoration:none;" href="../admin/index.php"><p class="title_left">У п р а в л е н и е<br />  с а й т о м</p></a></center><br />
</font></center>

<p align="center" class="admin_unit">Заметки:</p>
<div class="left" id="coolmenu">
  <p><a style="text-align:center" href="new_post.php">Добавить</a>
    <a style="text-align:center" href="edit_post.php">Редактировать</a>
    <a style="text-align:center" href="del_post.php">Удалить</a>

   
   <br />
   
   </div><center>

<p align="center" class="admin_unit">Категории:</p>
<div class="left" id="coolmenu">
  <p><a href="new_cat.php">Добавить</a>
    <a href="edit_cat.php">Редактировать</a>
    <a href="del_cat.php">Удалить</a>

    <br />
   
</div><center> 

<p align="center" class="admin_unit">Ссылки на сайты:</p>
<div class="left" id="coolmenu">
  <p><a href="new_sites.php">Добавить</a>
    <a href="edit_sites.php">Редактировать</a>
    <a href="del_sites.php">Удалить</a>

    <br />

</div><center>

<p align="center" class="admin_unit">Страницы:</p>
<div class="left" id="coolmenu">
  <p>
  <a href="new_page.php">Добавить</a>
  <a href="edit_pages.php">Редактировать</a>
  <a href="del_page.php">Удалить</a>   
    <br />
</div><center>

<p align="center" class="admin_unit">Модули:</p>
<div class="left" id="coolmenu">
  <p>
  <a href="contacts.php"><i>Обратная связь</i></a>
  <a href="comments.php"><i>Комментарии</i></a>
  <a href="mails.php"><i>Сообщения</i></a>  
  <a href="users.php"><i>Пользователи</i></a>   
    <br />
</div><center>

<div class="left" id="coolmenu2"><p class="admin_unit"></p>
<font color="#666666"><br />
<center>
<?

if(isset($_POST['back']))
{
header("Location: ../");
}
else
{
echo "<form action='index.php' method='post'>
<input name='back' type='submit' value='На сайт ' />
</form>";
}
if(isset($_POST['exit']))
{
	session_destroy();
	header("Location: ../");
}
else
{
echo "<form action='index.php' method='post'>
<input name='exit' type='submit' value='Выход' />
</form>";
}
?>
</center><br />
 <br />


</td>