<?
//заказы

	if($_SESSION['type']=='user')
	 {
	 $q=$mysql->query("SELECT id FROM users WHERE login='$_SESSION[login]'");
	 if($q)
	 {
	 $r=$q->fetch_array(); 
	 $query="SELECT * FROM `orders` WHERE fio='$r[0]'";
	 $result=$mysql->query($query);
	 $del_order='<br><br><span id="info_txt">Для того чтобы удалить заказ, введите его номер в текстовое поле и нажмите кнопку "Удалить"...</span><br><br>'.'<form method="post" action="'.$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'].'">
	 <label for="num_order">Введите номер заказа:</label>
	 <input type="text" name="num_order" size=20 maxlength=255>
	 <input type="submit" name="del" value="Удалить">
	 </form>';
	 }
	 }
	 elseif($_SESSION['type']=='admin')
	 {
		 
		 $result=$mysql->query('SELECT * FROM `orders`');
		 $del_order='<br><br><span id="info_txt">Для того чтобы удалить заказ, введите его номер в текстовое поле и нажмите кнопку "Удалить"...</span><br><br>'.'<form method="post" action="'.$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'].'">
	 <label for="num_order">Введите номер заказа:</label>
	 <input type="text" name="num_order" size=20 maxlength=255>
	 <input type="submit" name="del" value="Удалить">
	 </form>';

	 }
	 
	 
	
	
if($result)
{
	if($result->num_rows!='0')
	{
	for($i=0;$row=$result->fetch_array(MYSQLI_ASSOC);$i++)
		{
			
	 $query_shop="SELECT * FROM `shops` WHERE id='$row[shop_id]'";
	 $result_shop=$mysql->query($query_shop);
	 $row_shop=$result_shop->fetch_array();
			
	 $query_fio="SELECT fio FROM `users` WHERE id='$row[fio]'";
	 $result_fio=$mysql->query($query_fio);
	 $row_fio=$result_fio->fetch_array();
	
	if($row['confirm']=='0')
	{$confirm='Нет';}
	else{$confirm='Да';}
	
	$cont[$i]=sprintf('<tr><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td></tr>',
	$row['id'],$row_shop['name'],$row['product_id'],$row_fio['fio'],$row['date'],$row['quantity'],$row['tel'],$confirm);
		}
		
	$cnt=implode($cont);
	$content='<table width="780" border="1">'.
	'<tr id="table_head"><td>№</td><td>Название магазина</td><td>№ продукта</td><td>Ф.И.О.</td><td>Дата</td>
	<td>Количество</td><td>Телефон</td><td>Подтверждение заказа</td></tr>
	'.$cnt.'</table>'.$del_order;
	}
	else{ $content='<b>Заказов нет!</b>';
		  if($_SESSION['type']=='admin')
		   {
			 $mysql->query('SET FOREIGN_KEY_CHEKS=0');
		     $nul=$mysql->query('ALTER TABLE orders AUTO_INCREMENT=1');
	         if(!$nul)
		     {echo 'Ошибка обнуления авто-инкремента!';}
		     $mysql->query('SET FOREIGN_KEY_CHEKS=1');
		  }
	 }
}
else{$content='<b>Ошибка при обработке запроса к БД!</b>';}


//удаление заказа
	
	if(isset($_POST['del']) and isset($_POST['num_order']))
	{
		if(!empty($_POST['num_order']))
		{
			$login=$_SESSION['login'];
			$num_order=(float)$_POST['num_order'];
			
			//user
			if($_SESSION['type']=='user')
			{
			$get_fio=$mysql->query("SELECT id FROM users WHERE login='$login'");
			$row=$get_fio->fetch_array();
			$fio=$row['id'];
			$mysql->query('SET FOREIGN_KEY_CHECKS =0');
			$select_order=$mysql->query("SELECT id FROM orders WHERE id='$num_order' AND fio='$fio'");
			$select_delivery=$mysql->query("SELECT order_id FROM deliveries WHERE order_id='$num_order' AND fio='$fio'");
			$mysql->query('SET FOREIGN_KEY_CHECKS =1');
			
			$fetch_ord=$select_order->fetch_array();
			$fetch_del=$select_delivery->fetch_array();

			if(!empty($fetch_ord) and !empty($fetch_del))
			{
				
			$mysql->query('SET FOREIGN_KEY_CHECKS =0');
			$del_delivery=$mysql->query("DELETE FROM deliveries WHERE order_id='$num_order' AND fio='$fio'");
		    $del_order=$mysql->query("DELETE FROM orders WHERE id='$num_order' AND fio='$fio'");
			$mysql->query('SET FOREIGN_KEY_CHECKS =1');
			
			if($del_delivery and $del_order)
			{$content='Заказ <b>№ '.$num_order.'</b> успешно удален!';}
			else{$content='<b>Ошибка при удалении заказа!</b>';}
			
			}
			else{$content='<b>Введён некорректный номер заказа!</b>';}
			}
			
			//admin
			if($_SESSION['type']=='admin')
			{
				
			$select_order=$mysql->query("SELECT id FROM orders WHERE id='$num_order'");
			$select_delivery=$mysql->query("SELECT order_id FROM deliveries WHERE order_id='$num_order'");
			
			$fetch_ord=$select_order->fetch_array();
			$fetch_del=$select_delivery->fetch_array();
			
			if(!empty($fetch_ord) and !empty($fetch_del))	
			{
			$mysql->query('SET FOREIGN_KEY_CHECKS =0');
			$del_delivery=$mysql->query("DELETE FROM deliveries WHERE order_id='$num_order'");
		    $del_order=$mysql->query("DELETE FROM orders WHERE id='$num_order'");
			$mysql->query('SET FOREIGN_KEY_CHECKS =1');
			
			if($del_delivery and $del_order)
			{$content='Заказ <b>№ '.$num_order.'</b> успешно удален!';}
			else{$content='<b>Ошибка при удалении заказа!</b>';}
			
			}
			else{$content='<b>Введён некорректный номер заказа!</b>';}
			}

		
			
		}
		else{$content='<br><br><span id="info_txt">Вы должны указать номер заказа корректно!</span><br><br>';}
	}
	
	
	$keywords='заказы, заказать товар, заказать онлайн';
	$title='Заказы продукции';
	$description='Заказы продукции в системе "Интернет-продажи"';
?>