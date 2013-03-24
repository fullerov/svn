<? 
//пользователи
//ограничение доступа
if($_SESSION['type']!='admin')
{exit('Доступ на страницу запрещен!');}
else
{
//сохранение изменений
if(isset($_POST['save_info']))
{
	if(!empty($_POST['new_type']) and !empty($_POST['usr_id']) and !empty($_POST['new_fio']) and !empty($_POST['new_mail']))
	{
		$new_type=$_POST['new_type'];
		$usr_id=$_POST['usr_id'];
		$new_fio=$_POST['new_fio'];
		$new_mail=$_POST['new_mail'];
		
		$update=$mysql->query("UPDATE users SET fio='$new_fio', e_mail='$new_mail', type='$new_type' WHERE id='$usr_id'");
		if($update)
		{
			$content='Информация о пользователе под <b>№ '.$usr_id.'</b> успешно обновлена!';
		}
		else{$content='<b>Ошибка при обновлении информации о пользователе!</b>';}
	}
	else{$content='<b>Поля не должны содержать пустые значения!</b>';}
	
	$title='Изменение информации о пользователе';
}
else{
//редактирование пользователя
if($_SESSION['type']=='admin' and isset($_POST['edit_user']))
{
	if(!empty($_POST['id_user']))
	{
	$id_user=$_POST['id_user'];
	$select=$mysql->query("SELECT id, fio, login, e_mail, type FROM users WHERE id='$id_user'");
	$row=$select->fetch_array();
	
	if($row['type']=='user')
	{$type='<input type="radio" name="new_type" checked="checked" value="user"> user<br><br><input type="radio" name="new_type" value="admin"> admin';}
	else{$type='<input type="radio" name="new_type" value="user"> user<br><br><input type="radio" name="new_type" checked="checked" value="admin"> admin';}
	
	$content='<span id="info_txt">После редактирования пользователя нажмите кнопку "Сохранить изменения"</span><br><br><form method="post" action="'.$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'].'"><table border=1><tr id="table_head"><td>№</td><td>Ф.И.О.</td><td>Логин</td><td>e-mail</td><td>Тип</td></tr><tr><td><input type="hidden" name="usr_id" value="'.$row['id'].'">'.$row['id'].'</td><td><input type="text" name="new_fio" value="'.$row['fio'].'"></td><td>'.$row['login'].'</td><td><input type="text" name="new_mail" value="'.$row['e_mail'].'"></td><td>'.$type.'</td></tr></table><br><br><input type="submit" name="save_info" value="Сохранить изменения"></form>';
	}
	else{$content='<b>Вы не выбрали пользователя для редактирования!</b>';}
	$title='Редактирование пользователя';
}
else{
//удаление пользователя
if(isset($_POST['del_user']) and $_SESSION['type']=='admin')
{
	if(!empty($_POST['id_user']))
	{
		$id_user=(int)$_POST['id_user'];
		$mysql->query('SET FOREIGN_KEY_CHECKS =0');
		$delete=$mysql->query("DELETE FROM users WHERE id='$id_user'");
		$del_deliveries=$mysql->query("DELETE FROM deliveries WHERE fio='$id_user'");
		$del_orders=$mysql->query("DELETE FROM orders WHERE fio='$id_user'");
		$mysql->query('SET FOREIGN_KEY_CHECKS =1');
		
		if($delete and $del_deliveries and $del_orders)
		{$content='Пользователь под номером <b>№ '.$id_user.'</b> успешно удалён!';}
		else{$content='<b>Ошибка при удалении пользователя!</b>';}
	}
	else{$content='<b>Вы должны выбрать номер пользователя, для его удаления!</b>';}
	
	$title='Удаление пользователя';
}
else
{
//вывод списка пользователей

	$select=$mysql->query("SELECT id, fio, login, e_mail, type FROM users");
	
	for($i=0;$row=$select->fetch_array();$i++)
	{
		$cnt[$i]='<tr><td><b>'.$row['id'].'</b><input type="radio" name="id_user" value="'.$row['id'].'"></td><td>'.$row['fio'].'</td><td>'.$row['login'].'</td><td>'.$row['e_mail'].'</td><td>'.$row['type'].'</td></tr>';
	}
	
$content='<span id="info_txt">Информация о пользователях:</span><br><br><form method="post" action="'.$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'].'"><table border=1><tr id="table_head"><td>№</td><td>Ф.И.О.</td><td>Логин</td><td>e-mail</td><td>Тип</td></tr>'.implode($cnt).'</table><br><br><label for="del_user">При удалении пользователя также удаляются все его заказы</label><br><br><input type="submit" name="del_user" value="Удалить">&nbsp;<input type="submit" name="edit_user" value="Изменить"><br><br><span id="info_txt">Для редкатирования пользователя выберите его номер и нажмите кнопку "Изменить"<br><br>Для удаления пользователя выберите его номер и нажмите кнопку "Удалить"</span>';
$title='Список пользователей';
}
}
}
}
?>