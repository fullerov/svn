<? 
//магазины
//сохранение отредактированной информации в базу данных
if(isset($_POST['edit_shop']) and $_SESSION['type']=='admin')
{
	if(!empty($_POST['edit_shopid']) and !empty($_POST['edit_name']) and !empty($_POST['edit_address']) and !empty($_POST['edit_tel']) and !empty($_POST['edit_site']) and !empty($_POST['edit_email']))
	{
		$edit_shopid=$_POST['edit_shopid'];
		$edit_name=$_POST['edit_name'];
		$edit_address=$_POST['edit_address'];
		$edit_tel=$_POST['edit_tel']; 
		$edit_site=$_POST['edit_site'];
		$edit_email=$_POST['edit_email'];
		
		$update=$mysql->query("UPDATE shops SET name='$edit_name', address='$edit_address', tel='$edit_tel', site='$edit_site', email='$edit_email' WHERE id='$edit_shopid'");
		if($update)
		{$content='Информация о магазине <b> '.$edit_name.' </b>успешно обновлена!';}
		else{$content='<b>Ошибка при обновлении информации о магазине!</b>';}
	}
	else{$content='<b>Поля не должны содержать пустых значений!</b>';}
	
	$title='Обновление информации о магазине';
}
else{
//редактирование магазина
if(isset($_GET['shop_edit']) and $_SESSION['type']=='admin')
{
	if(!empty($_GET['shop_edit']) and is_numeric($_GET['shop_edit']))
	{
		$shop_id=(int)$_GET['shop_edit'];
		$get_shop=$mysql->query("SELECT * FROM shops WHERE id='$shop_id'");
		if($get_shop)
		{
			$row=$get_shop->fetch_array();
			$content='<form method="post" action="'.$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'].'"><table border=1><tr id="table_head"><td>№</td><td>Название</td><td>Адрес</td><td>Телефон</td><td>Сайт</td><td>e-mail</td></tr><tr><td><input type="hidden" name="edit_shopid" value="'.$row['id'].'">'.$row['id'].'</td><td><input type="text" name="edit_name" size="30" maxlength="255" value="'.$row['name'].'"></td><td><input type="text" name="edit_address" size="20" maxlength="255" value="'.$row['address'].'"></td><td><input type="text" name="edit_tel" size="10" maxlength="255" value="'.$row['tel'].'"></td><td><input type="text" name="edit_site" size="10" maxlength="255" value="'.$row['site'].'"></td><td><input type="text" name="edit_email" size="10" maxlength="255" value="'.$row['email'].'"></td></tr></table><br><input type="submit" name="edit_shop" value="Сохранить изменения"></form>';
		}
		else{$content='<b>Ошибка при выборке магазина!</b>';}
	}
	else{$content='<b>Некорректный параметр в строке запроса!</b>';}
	$title='Редактирование магазина';
}
else{
//добавление магазина
if(isset($_POST['add_shop']) and $_SESSION['type']=='admin')
{
	$title='Добавление магазина';
		
	if(empty($_POST['add_shop_email']) or empty($_POST['add_shop_site']) or empty($_POST['add_shop_tel']) or empty($_POST['add_shop_address']) or empty($_POST['add_shop_name']))
	{$content='<b>Пустые значения недопустимы!</b>';}
	else
	{
		$add_shop_email=$_POST['add_shop_email'];
		$add_shop_site=$_POST['add_shop_site'];
		$add_shop_tel=$_POST['add_shop_tel'];
		$add_shop_address=$_POST['add_shop_address'];
		$add_shop_name=$_POST['add_shop_name'];
		
		$insert=$mysql->query("INSERT INTO shops (`id`,`name`,`address`,`tel`,`site`,`email`) VALUES (NULL,'$add_shop_name','$add_shop_address','$add_shop_tel','$add_shop_site','$add_shop_email')");
		if($insert)
		{$content='Магазин успешно добавлен в базу данных!';}
		else{$content='<b>Возникли ошибки при добавлении магазина в базу данных!</b>';}
	}
}
else
{
//удаление магазина
if(isset($_POST['del_shop']) and isset($_POST['click_del']) and $_SESSION['type']=='admin')
		{
			$title='Удаление магазина';
			if(!empty($_POST['del_shop']))
			{
				$del_shop=(int)$_POST['del_shop'];
				$get_shops=$mysql->query("SELECT id FROM shops WHERE id='$del_shop'");
				$shop_row=$get_shops->fetch_array();
				if(!empty($shop_row))
				{
					$mysql->query('SET FOREIGN_KEY_CHECKS=0');
					$delete_product=$mysql->query("DELETE FROM products WHERE shop_id='$del_shop'");
					$delete_query=$mysql->query("DELETE FROM shops WHERE id='$del_shop'");
					
					if($delete_query and $delete_product)
					{
						$content='Магазин <b>№ '.$del_shop.'</b> успешно удален!';
					}
					else{$content='<b>Ошибка при удалении магазина!</b>';}
					
					$mysql->query('SET FOREIGN_KEY_CHECKS=1');
				}
				else{$content='<b>Такого магазина нет в базе данных!</b>';}
					
			}
			else{$content='<b>Пустые значения недопустимы!</b>';}
		}
else{

    if(isset($_GET['shop']))
	{
	
	$keywords='интернет-магазины, все онлайн магазины';
	$title='Магазины';
	$description='Страница интернет-магазинов в системе "Интернет-продажи"';
		
		$shop_id=$_GET['shop'];
		$shop_id=trim($shop_id);
		$shop_id=stripslashes($shop_id);
		if(is_numeric($shop_id))
		{
			$result=$mysql->query("SELECT * FROM products WHERE shop_id='$shop_id'");
			
			if($result)
			{
	 
	 $query="SELECT * FROM `products` WHERE shop_id=$shop_id";
	 $result=$mysql->query($query);


	
	if($result->num_rows!='0')
	{
		//если зашел пользователь
		if($_SESSION['type']=='user')
		{
	for($i=0;$row=$result->fetch_array(MYSQLI_ASSOC);$i++)
		{
			
	 $query_type="SELECT * FROM `product_type` WHERE id='$row[type_id]'";
	 $result_type=$mysql->query($query_type);
	 $row_type=$result_type->fetch_array();
	
	 $query_shop="SELECT * FROM `shops` WHERE id='$row[shop_id]'";
	 $result_shop=$mysql->query($query_shop);
	 $row_shop=$result_shop->fetch_array();
	
	
	$cont[$i]=sprintf('<tr><td><a id="get_link" href="?link=products&orderid=%s">%s</a></td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td><img src="%s" height="100" width="140" /></td><td>%s</td><td>%s</td></tr>',
	$row['id'],$row['id'],$row_shop['name'],$row_type['name'],$row['brand'],$row['model'],$row['data'],$row['img'],$row['price'],$row['warranty']);	
		}
		

		$cnt=implode($cont);
		$content='<table width="780" border="1">'.
		'<tr id="table_head"><td><i>№</i></td><td>Название магазина</td><td>Тип</td><td>Брэнд</td><td>Модель</td>
		<td>Данные</td><td>Картинка</td><td>Цена</td><td>Гарантия</td></tr>
	    '.$cnt.'</table><br><br><span id="info_txt">Для того чтобы сделать заказ продукции нажмите на её номер...</span>';
		}
		//если зашел гость
		else{
			for($i=0;$row=$result->fetch_array(MYSQLI_ASSOC);$i++)
		{
			
	 $query_type="SELECT * FROM `product_type` WHERE id='$row[type_id]'";
	 $result_type=$mysql->query($query_type);
	 $row_type=$result_type->fetch_array();
	
	 $query_shop="SELECT * FROM `shops` WHERE id='$row[shop_id]'";
	 $result_shop=$mysql->query($query_shop);
	 $row_shop=$result_shop->fetch_array();
	
	
	$cont[$i]=sprintf('<tr><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td><img src="%s" height="100" width="140" /></td><td>%s</td><td>%s</td></tr>',
	$row['id'],$row_shop['name'],$row_type['name'],$row['brand'],$row['model'],$row['data'],$row['img'],$row['price'],$row['warranty']);	
		}
		

		$cnt=implode($cont);
		$content='<table width="780" border="1">'.
		'<tr id="table_head"><td>№</td><td>Название магазина</td><td>Тип</td><td>Брэнд</td><td>Модель</td>
		<td>Данные</td><td>Картинка</td><td>Цена</td><td>Гарантия</td></tr>
	    '.$cnt.'</table><br><br><span id="info_txt">Только пользователи могут делать заказы...</span>';
			
			
			
			}
	
	}
	else{ $content='<b>В этом магазине нет товаров!</b>'; }
}
else{$content='<b>Ошибка при обработке запроса к БД!</b>';}
	 
	
			}
	       else{$content='<b>В этом магазине нет товаров!</b>';}
		
	$keywords="интернет-магазин $row_shop[name], онлайн магазин";
	$title="Магазин $row_shop[name]";
	$description='Страница товаров в интернет-магазине $row_shop[name]';
			
			
		}
		else{$content='<b>Неверный параметр указан в строке запроса магазина!</b>';}
	
	
	
	if(!isset($_GET['shop']))
	{
		
	$keywords='интернет-магазины, все онлайн магазины';
	$title='Магазины';
	$description='Страница интернет-магазинов в системе "Интернет-продажи"';
		
		$query='SELECT * FROM `shops`';
		$result=$mysql->query($query);
	
if($result)
{
	
	//если зашел админ
		if($_SESSION['type']=='admin')
		{
			if($result->num_rows!='0')
	{
	for($i=0;$row=$result->fetch_array(MYSQLI_ASSOC);$i++)
		{
	$cont[$i]=sprintf('<tr><td><a id="get_link" href="?link=shops&shop_edit=%s">%s</a></td><td>%s</td><td>%s</td><td>%s</td><td><a target="_blank" href="http://%s">%s</a></td><td>%s</td></tr>',
	$row['id'],$row['id'],$row['name'],$row['address'],$row['tel'],$row['site'],$row['site'],$row['email']);
		}
		
	$cnt=implode($cont);
	$content='<span id="info_txt">Для редактирования информации о магазине нажмите на его номер:</span><br><br><table width="780" border="1">'.
	'<tr id="table_head"><td><i>№</i></td><td>Название магазина</td><td>Адрес магазина</td><td>Номера телефа</td><td>Адрес сайта</td>
	<td>e-mail</td></tr>
	'.$cnt.'</table><br><br><span id="info_txt">Для удаления магазина введите его номер и нажмите на кнопку "Удалить":</span><br><br>
	<form action="'.$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'].'" method="post">
	<label for="del_shop">При удалении магазина также удалятся все его товары!</label><br><br>
	<input type="text" name="del_shop" size="50" maxlength="255">
	<input type="submit" name="click_del" value="Удалить">
	</form><br><br>
	<span id="info_txt">Для добавления магазина в базу, заполните все поля и нажмите на кнопку "Добавить":</span>
	<br><br>
	<form action="'.$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'].'" method="post">
	<table border=1 >
	<tr id="table_head"><td>Название</td><td>Адрес</td><td>Номер телефона</td><td>Адрес сайта</td><td>e-mail</td></tr><tr><td><input type="text" size="15" maxlength="255" name="add_shop_name"></td><td><input type="text" size="15" maxlength="255" name="add_shop_address"></td><td><input type="text" size="15" maxlength="255" name="add_shop_tel"></td><td><input type="text" size="20" maxlength="255" name="add_shop_site"></td><td><input type="text" size="20" mexlength="255" name="add_shop_email"</td></tr>
	</table>
	<br><input type="submit" name="add_shop" value="Добавить">
	</form>
	';
	}
	else{ $content='Таблица пуста!'; }
		
			
		}
		//если зашел пользователь
		
		else{
	if($result->num_rows!='0')
	{
	for($i=0;$row=$result->fetch_array(MYSQLI_ASSOC);$i++)
		{
	$cont[$i]=sprintf('<tr><td><a id="get_link" href="?link=shops&shop=%s">%s</a></td><td>%s</td><td>%s</td><td>%s</td><td><a target="_blank" href="http://%s">%s</a></td><td>%s</td></tr>',
	$row['id'],$row['id'],$row['name'],$row['address'],$row['tel'],$row['site'],$row['site'],$row['email']);
		}
		
	$cnt=implode($cont);
	$content='<table width="780" border="1">'.
	'<tr id="table_head"><td><i>№</i></td><td>Название магазина</td><td>Адрес магазина</td><td>Номера телефа</td><td>Адрес сайта</td>
	<td>e-mail</td></tr>
	'.$cnt.'</table><br><br><span id="info_txt">Для вывода списка продукции магазина, нажмите на его номер...</span>';
	}
	else{ $content='Таблица пуста!'; }
		}
}
else{$content='<b>Магазинов нет в БД!</b>';}
        $mysql->query('SET FOREIGN_KEY_CHEKS=0');
		$nul=$mysql->query('ALTER TABLE shops AUTO_INCREMENT=1');
	    if(!$nul)
		{echo 'Ошибка обнуления авто-инкремента!';}
		$mysql->query('SET FOREIGN_KEY_CHEKS=1');

	}
	
}
}
}
}
?>