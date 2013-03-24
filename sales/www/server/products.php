<?
//продукция
//сохранение изменения
if(isset($_POST['edit_prod']) and !empty($_POST['prod_id']))
{
	if(!empty($_POST['shop_id']) and !empty($_POST['edit_model']) and !empty($_POST['edit_data'])  and !empty($_POST['edit_img']) and !empty($_POST['edit_brand']) and !empty($_POST['edit_price']) and !empty($_POST['edit_war']) and !empty($_POST['type_id']))
	{
	$prod_id=(int)$_POST['prod_id'];
	$shop_id=(int)$_POST['shop_id'];
	$edit_brand=$_POST['edit_brand'];
	$edit_model=$_POST['edit_model'];
	$edit_data=$_POST['edit_data'];
	$edit_img=$_POST['edit_img'];
	$edit_price=$_POST['edit_price'];
	$edit_war=$_POST['edit_war'];
	$type_id=$_POST['type_id'];
	
	$update=$mysql->query("UPDATE products SET shop_id='$shop_id', type_id='$type_id', brand='$edit_brand', model='$edit_model', data='$edit_data', img='$edit_img', price='$edit_price', warranty='$edit_war' WHERE id='$prod_id'");
	if($update)
	{$content='Информация о продукции под <b>№ '.$prod_id.'</b> успешно обновлена!';}
	else{$content='<b>Ошибка при обновлении информации о продукции!</b>';}
	
	}
	else{$content='<b>Поля не должны быть пусты!</b>';}
	
	$title='Изменение продукции';
}
else{
//изменение продукции
if(isset($_GET['edit_product']))
{
	$title='Редактирование продукции';
	if(!empty($_GET['edit_product']) and is_numeric($_GET['edit_product']))
	{
		$edit_product=$_GET['edit_product'];
		$select=$mysql->query("SELECT * FROM products WHERE id='$edit_product'");
		if($select)
		{
			$row=$select->fetch_array();
			
		 $query_shop="SELECT id, name FROM shops";
	     $result_shop=$mysql->query($query_shop);
	    for($i=0;$row_shop=$result_shop->fetch_array();$i++)
		{
			if($row_shop['id']==$row['shop_id'])
			{$cn_sh[$i]='<input type="radio" checked="checked" name="shop_id" value="'.$row_shop['id'].'"> '.$row_shop['name'].'<br>';}
			else
			{$cn_sh[$i]='<input type="radio" name="shop_id" value="'.$row_shop['id'].'"> '.$row_shop['name'].'<br>';}
		}
		 
		 $query_type="SELECT id, name FROM product_type";
	     $result_type=$mysql->query($query_type);
	      
		 for($i=0;$row_type=$result_type->fetch_array();$i++)
		  {
			  if($row_type['id']==$row['type_id'])
			  {$cn_tp[$i]='<input type="radio" checked="checked" name="type_id" value="'.$row_type['id'].'">'.$row_type['name'].'<br>';}
			  else {$cn_tp[$i]='<input type="radio" name="type_id" value="'.$row_type['id'].'">'.$row_type['name'].'<br>';}
		  }
		  
	    $content='<form method="post" action="'.$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'].'"><table border=1><tr id="table_head"><td>Магазин&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td>Тип&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td>Брэнд</td><td>Модель</td></tr><tr><td>'.implode($cn_sh).'</td><td>'.implode($cn_tp).'</td><td><input type="text" name="edit_brand" value="'.$row['brand'].'"></td><td><input type="text" name="edit_model" value="'.$row['model'].'"></td></tr><tr id="table_head"><td>Данные</td><td>Путь к картинке</td><td>Цена</td><td>Гарантия</td></tr><td>
		
		<textarea rows=11 name="edit_data">'.$row['data'].'</textarea>
		
		</td><td><label for="edit_img">Например:<br><br>http://www.image.org/img.jpg</label><br><br><br><br><input type="text" name="edit_img" size=30 value="'.$row['img'].'"></td><td><input type="text" name="edit_price" value="'.$row['price'].'"></td><td><input type="text" name="edit_war" value="'.$row['warranty'].'"></tr></table><br><br><input type="submit" name="edit_prod" value="Сохранить изменения"><input type="hidden" name="prod_id" value="'.$row['id'].'">
		</form>';
		}
		else{$content='<b>Ошибка при выборке из базы!</b>';}
	}
	else{$content='<b>Некорректный параметр запроса!</b>';}
}
else{
//добавление продукта
if($_SESSION['type']=='admin' and isset($_POST['add_product']))
{
	$title='Добавление товара';
	
	if(empty($_POST['pic']) or empty($_POST['shop_name']) or empty($_POST['type_name']) or empty($_POST['brand']) or empty($_POST['model']) or empty($_POST['data']) or empty($_POST['price']) or empty($_POST['warr']))
	{$content='<b>При добавлении продукции не должно быть пустых полей!</b>';}
	else{
		
	$pic=$_POST['pic'];
	$shop_name=$_POST['shop_name'];
	$type_name=$_POST['type_name'];
	$brand=$_POST['brand'];
	$model=$_POST['model'];
	$data=$_POST['data'];
	$price=$_POST['price'];
	$warr=$_POST['warr'];
	   
	  $insert=$mysql->query("INSERT INTO products (`id`,`shop_id`,`type_id`,`brand`,`model`,`data`,`img`,`price`,`warranty`) VALUES (NULL,'$shop_name','$type_name','$brand','$model','$data','$pic','$price','$warr')");
	  if($insert)
	  {$content='Продукт успешно добавлен в базу!';}
	  else{$content='<b>При добавлении продукции возникли ошибки!</b>';}
		
		}
	
	
	
}
else
{
	 //сделать заказ
	 if($_SESSION['type']=='user' and isset($_GET['orderid']) and !empty($_GET['orderid']))
	 {
	$keywords='заказать, заказать товар, сделать заказ';
	$title='Сделать заказ';
	$description='Страница заказа продукции в системе "Интернет-продажи"';
		 
		 
		 $order=$_GET['orderid'];
		 $query=$mysql->query("SELECT * FROM products WHERE id='$order'");
		 $row=$query->fetch_array();
		 
		 $query_shop="SELECT * FROM `shops` WHERE id='$row[shop_id]'";
	     $result_shop=$mysql->query($query_shop);
	     $row_shop=$result_shop->fetch_array();
		 
		 $query_type="SELECT * FROM `product_type` WHERE id='$row[type_id]'";
	     $result_type=$mysql->query($query_type);
	     $row_type=$result_type->fetch_array();
		 
		 $content='<span id="info_txt">Ваш заказ:</span><br><br><table width="780" border="1">'.
		'<tr id="table_head"><td>№</td><td>Название магазина</td><td>Тип</td><td>Брэнд</td><td>Модель</td><td>Данные</td><td>Картинка        </td><td>Цена</td><td>Гарантия</td></tr><tr><td>'.$row['id'].'</td><td>'.$row_shop['name'].'</td><td>'.$row_type['name'].'        </td><td>'.$row['brand'].'</td><td>'.$row['model'].'</td><td>'.$row['data'].'</td><td><img src="'.$row['img'].'" height="100" width="140" /></td><td>'.$row['price'].'</td><td>'.$row['warranty'].'</td></table><br><br>'.'<a id="link_ok" href="?link=products&orderid='.$order.'&ok=true">Подтвердить заказ</a><a id="link_ok" href="?link=products&orderid='.$order.'&ok=false">Отменить заказ</a>';
		
		
		//подтвердить заказ
		 if(isset($_GET['ok']) and $_GET['ok']=='true')
		 {
			 $content='<span id="info_txt">Ваш заказ:</span><br><br><table width="780" border="1">'.
		'<tr id="table_head"><td>№</td><td>Название магазина</td><td>Тип</td><td>Брэнд</td><td>Модель</td><td>Данные</td><td>Картинка        </td><td>Цена</td><td>Гарантия</td></tr><tr><td>'.$row['id'].'</td><td>'.$row_shop['name'].'</td><td>'.$row_type['name'].'        </td><td>'.$row['brand'].'</td><td>'.$row['model'].'</td><td>'.$row['data'].'</td><td><img src="'.$row['img'].'" height="100" width="140" /></td><td style="color:darkred; font-weight:bold;">'.$row['price'].'</td><td>'.$row['warranty'].'</td></table><br><br>'.'<form action="?link=products&orderid='.$order.'&ok=true" method="post">
			 <label for="date">Доставить товар к дате:</label>
			 <input type="text" size="33" maxlength="100" name="date" value="'.date('Y-m-d').'">
			 <br>
			 <label for="quantity">Введите количество единиц товара:</label>
			 <input type="text" size="20" maxlength="100" name="quantity" value="1">
			 <br>
			 <label for="tel">Введите номер Вашего телефона:</label>
			 <input type="text" size="23" maxlength="150" name="tel" value="">
			 <br>
			 <label for="address">Введите Ваш адрес:</label>
			 <input type="text" size="38" maxlength="255" name="address" value="">
			 <br>
			 <label for="time">Доставить ко времени:</label>
			 <input type="text" size="13" maxlength="100" name="time" value="15:00">
			 <input style="cursor:pointer;" type="submit" name="submit" value="Сделать заказ"></form> <br><br><a id="link_ok" href="?link=products&orderid='.$order.'&ok=false">Отменить заказ</a>';
			 
			 if(isset($_POST['date']) and isset($_POST['quantity']) and isset($_POST['tel']) and isset($_POST['address']) 
			 and isset($_POST['time']) and isset($_POST['submit']))
			 {
				 
				 if(empty($_POST['date']) or empty($_POST['quantity']) or empty($_POST['tel']) or empty($_POST['address']) or empty($_POST['time']) or !is_numeric($_POST['quantity']))
				 {
					 $content='<br><br>Вернитесь <b><a href="index.php?link=products&orderid='.$order.'">назад</a></b> и заполните все поля формы корректно!';
				 }
				 else
				 {
				 
				 $date=$_POST['date'];
				 $quantity=$_POST['quantity'];
				 $tel=$_POST['tel'];
				 $address=$_POST['address'];
				 $time=$_POST['time'];
				 $shop_id=$row['shop_id'];
				 $product_id=$row['id'];
				 
				 $get_fio=$mysql->query("SELECT id FROM users WHERE login='$_SESSION[login]'");
				 $row_fio=$get_fio->fetch_array();
				 $fio=$row_fio[0];
		
				 
				 $insert=$mysql->query("INSERT INTO orders (`shop_id`,`product_id`,`fio`,`date`,`quantity`,`tel`,`confirm`) VALUES ('$shop_id','$product_id','$fio','$date','$quantity','$tel','1')");
				 
				 $delivery=$mysql->query("INSERT INTO deliveries(`fio`,`address`,`time`,`date`,`confirm`) VALUES ('$fio','$address','$time','$date','0')");
				 if($insert and $delivery)
				 {
				 $content='Ваш заказ успешно занесен в базу, и в скором времени Вы получите свой товар!<br><br> Вы можете видеть список заказов <b><a href="index.php?link=orders">здесь</a></b>';
				 }
				 else{$content='<b>Ошибка при вставке данных в базу!</b>';}
				 }
			 }
			 
			 
		 }
		 //отменить заказ
		 if(isset($_GET['ok']) and $_GET['ok']=='false')
		 {
			 header('Location: ../index.php?link=products');
		 }
		
	 }
	 
	 else
	 { 
	 
	$keywords='продукция, товары, список товаров';
	$title='Продукция';
	$description='Страница ассортимента интернет-магазинов в системе "Интернет-продажи"';
	 
	 $query='SELECT * FROM `products`';
	 $result=$mysql->query($query);
	
if($result)
{
	
	
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
		
		//если зашел администратор
		elseif($_SESSION['type']=='admin' and !empty($_SESSION['logpass']))
		{
	 $res_shop=$mysql->query('SELECT `id`,`name` FROM `shops`');
	  if($res_shop)
	  {
	 for($i=0;$row_sh=$res_shop->fetch_array();$i++)
	 {
		 $cnt_sh[$i]='<input type="radio" name="shop_name" value="'.$row_sh['id'].'">'.$row_sh['name'].'<br>';
	 }
	  }
	 $res_type=$mysql->query('SELECT `id`,`name` FROM `product_type`');
	  if($res_type)
	  {
	 for($i=0;$row_tp=$res_type->fetch_array();$i++)
	 {
		 $cnt_tp[$i]="<input type='radio' name='type_name' value='$row_tp[id]'> $row_tp[name]<br>";
	 }
	  }
			//удаление продукта
			
			if(isset($_POST['del_product']) and isset($_POST['delete_pr']))
			{
				if(!empty($_POST['del_product']))
				{
				$del_product=(int)$_POST['del_product'];
				$sel_pr=$mysql->query("SELECT id FROM products WHERE id='$del_product'");
				$row_s=$sel_pr->fetch_array();
				
				if(!empty($row_s))
				{
				$mysql->query('SET FOREIGN_KEY_CHECKS=0');
				$delete=$mysql->query("DELETE FROM products WHERE id='$del_product'");
				
				if($delete)
				{$content='Продукт <b>№ '.$del_product.'</b> успешно удалён!';}
				else{ $content='<b>Ошибка при удалении продукта!</b>'; }
				
				$mysql->query('SET FOREIGN_KEY_CHECKS=1');
				}
				else{$content='<b>Такого продукта нет в базе!</b>';}
				}
				else{$content='<b>Пустые значения недопустимы!</b>';}
			}
			else{
			
			
			for($i=0;$row=$result->fetch_array(MYSQLI_ASSOC);$i++)
		{
			
	 $query_type="SELECT * FROM `product_type` WHERE id='$row[type_id]'";
	 $result_type=$mysql->query($query_type);
	 $row_type=$result_type->fetch_array();
	
	 $query_shop="SELECT * FROM `shops` WHERE id='$row[shop_id]'";
	 $result_shop=$mysql->query($query_shop);
	 $row_shop=$result_shop->fetch_array();
	
	
	$cont[$i]=sprintf('<tr><td><a id="get_link" href="index.php?link=products&edit_product=%s">%s</a></td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td><img src="%s" height="100" width="140" /></td><td>%s</td><td>%s</td></tr>',
	$row['id'],$row['id'],$row_shop['name'],$row_type['name'],$row['brand'],$row['model'],$row['data'],$row['img'],$row['price'],$row['warranty']);	
		}
		

		$cnt=implode($cont);
		$content='<span id="info_txt">Для редактирования информации о товаре, нажмите на его номер:</span><br><br><table width="780" border="1">'.
		'<tr id="table_head"><td>№</td><td>Название магазина</td><td>Тип</td><td>Брэнд</td><td>Модель</td>
		<td>Данные</td><td>Картинка</td><td>Цена</td><td>Гарантия</td></tr>
	    '.$cnt.'</table><br><br><span id="info_txt">Для удаления продукции введите её номер и нажмите на кнопку удалить:</span><br><br><form method="post" acion="index.php?link=products">
		<input type="text" size="40" maxlength="255" name="del_product">
		<input type="submit" name="delete_pr" value="Удалить"></form><br><br>  
			<span id="info_txt">Для добавления продукта заполните все нижеследующие поля и нажмите на кнопку "Добавить":</span>
			<br><br><form action="'.$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'].'" method="post">
			<table border="1"><tr id="table_head"><td><b>Магазин</b></td><td><b>Тип</b></td><td><b>Брэнд</b></td><td><b>Модель</b></td></tr><tr><td>'.implode($cnt_sh).'</td><td>'.implode($cnt_tp).'</td><td><input type="text" size=10 maxlength="255" name="brand"></td><td><input type="text" size=19 maxlength="255" name="model"></td></tr>
			
			<tr id="table_head"><td><b>Данные</b></td><td><b>Полный путь к картинке</b></td><td><b>Цена</b></td><td><b>Гарантия</b></td></tr><tr>
			<td><textarea name="data" rows=6 cols=30 ></textarea></td><td><label for="pic">Например:<br><br>http://www.image.org/img.jpg<br><br></label><input type="text" size=25 maxlength="255" value="http://'.$_SERVER['HTTP_HOST'].'/css/img/none.gif" name="pic"></td><td><input type="text" size=10 maxlength="255" value="10$" name="price"></td><td><input type="text" size=19 maxlength="255" name="warr" value="12 месяцев"></td></tr></table><br>
			<input type="submit" name="add_product" value="Добавить продукт">
			</form>';
			}
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
	else{ $content='Продукции ещё нет!';
	if($_SESSION['type']=='admin')
	{   
	  $res_shop=$mysql->query('SELECT `id`,`name` FROM `shops`');
	  if($res_shop)
	  {
	 for($i=0;$row_sh=$res_shop->fetch_array();$i++)
	 {
		 $cnt_sh[$i]='<input type="radio" name="shop_name" value="'.$row_sh['id'].'">'.$row_sh['name'].'<br>';
	 }
		
	 $res_type=$mysql->query('SELECT `id`,`name` FROM `product_type`');
	  if($res_type)
	  {
	 for($i=0;$row_tp=$res_type->fetch_array();$i++)
	 {
		 $cnt_tp[$i]='<input type="radio" name="type_name" value="'.$row_tp['id'].'">'.$row_tp['name'].'<br>';
	 }
	 
			$content='Продукции ещё нет!<br><br>  
			<span id="info_txt">Для добавления продукта заполните все нижеследующие поля и нажмите на кнопку "Добавить":</span>
			<br><br><form action="'.$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'].'" method="post">
			<table border="1"><tr id="table_head"><td><b>Магазин</b></td><td><b>Тип</b></td><td><b>Брэнд</b></td><td><b>Модель</b></td></tr><tr><td>'.implode($cnt_sh).'</td><td>'.implode($cnt_tp).'</td><td><input type="text" size=10 maxlength="255" name="brand"></td><td><input type="text" size=19 maxlength="255" name="model"></td></tr>
			
			<tr id="table_head"><td><b>Данные</b></td><td><b>Полный путь к картинке</b></td><td><b>Цена</b></td><td><b>Гарантия</b></td></tr><tr>
			<td><textarea name="data" rows=6 cols=30 ></textarea></td><td><label for="pic">Например:<br><br>http://www.image.org/img.jpg<br><br></label><input type="text" size=25 maxlength="255" value="http://'.$_SERVER['HTTP_HOST'].'/css/img/none.gif" name="pic"></td><td><input type="text" size=10 maxlength="255" value="10$" name="price"></td><td><input type="text" size=19 maxlength="255" name="warr" value="12 месяцев"></td></tr></table><br>
			<input type="submit" name="add_product" value="Добавить продукт">
			</form>';
			
	    $mysql->query('SET FOREIGN_KEY_CHEKS=0');
		$nul=$mysql->query('ALTER TABLE products AUTO_INCREMENT=1');
	    if(!$nul)
		{echo 'Ошибка обнуления авто-инкремента!';}
		$mysql->query('SET FOREIGN_KEY_CHEKS=1');
	 
	 }
	  else{$content='<b>Нет типов продукции в базе данных!</b>';
	  
	  	$mysql->query('SET FOREIGN_KEY_CHEKS=0');
		$nul=$mysql->query('ALTER TABLE products AUTO_INCREMENT=1');
	    if(!$nul)
		{echo 'Ошибка обнуления авто-инкремента!';}
		$mysql->query('SET FOREIGN_KEY_CHEKS=1');
	  
	  }
			
	  }
	  else{$content='<b>Магазинов нет в базе!</b>';}
			
	    $mysql->query('SET FOREIGN_KEY_CHEKS=0');
		$nul=$mysql->query('ALTER TABLE products AUTO_INCREMENT=1');
	    if(!$nul)
		{echo 'Ошибка обнуления авто-инкремента!';}
		$mysql->query('SET FOREIGN_KEY_CHEKS=1');
	}
	
	 }
}
else{$content='<b>Ошибка при обработке запроса к БД!</b>';}
	 }
	
}
}
}
?>