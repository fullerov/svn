<?
//доставка

if($_SESSION['type']!='admin')
{exit('Доступ на страницу запрещен!');}
else{
     $query='SELECT * FROM `deliveries`';
	 $result=$mysql->query($query);

if($result)
{
	//удалить доставленые заказы
	if(isset($_POST['del_delivery']))
{
	$select_d=$mysql->query("SELECT order_id FROM deliveries WHERE confirm='1'");
	
	if($select_d)
	{
	$mysql->query('SET FOREIGN_KEY_CHECKS =0');
	for($i=0;$row=$select_d->fetch_array();$i++)
	{
		$drop_deliveries=$mysql->query("DELETE FROM deliveries WHERE confirm='1'");
		$drop_orders=$mysql->query("DELETE FROM orders WHERE id='$row[order_id]'");
	}
	$mysql->query('SET FOREIGN_KEY_CHECKS =1');
	header('Location: ../index.php?link=deliveries');
	}

}	
	
	
	if($result->num_rows!='0')
	{
	for($i=0;$row=$result->fetch_array(MYSQLI_ASSOC);$i++)
		{
			
	 $query_fio="SELECT fio FROM `users` WHERE id='$row[fio]'";
	 $result_fio=$mysql->query($query_fio);
	 $row_fio=$result_fio->fetch_array();
	 
	 
		if($row['confirm']=='0')
		{$confirm='Недоставлено';}
		else{$confirm='Доставлено';}
		
	$cont[$i]=sprintf('<tr><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td></tr>',
	$row['order_id'],$row_fio['fio'],$row['address'],$row['time'],$row['date'],$confirm);
		}
		
	$cnt=implode($cont);
	
	$content='<table width="780" border="1">'.
	'<tr id="table_head"><td>№ заказа</td><td>Ф.И.О.</td><td>Адрес</td><td>Время доставки</td><td>Дата доставки</td>
	<td>Подтверждение</td></tr>
	'.$cnt.'</table><br><br><form action="'.$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'].'" method="post">
	<input type="submit" name="del_delivery" value="Удалить доставленые заказы"></form>';
	}
	else{ $content='<b>Доставок нет!</b>';
	      $nul=$mysql->query('ALTER TABLE deliveries AUTO_INCREMENT = 1');
		  if(!$nul)
		  {echo 'Ошибка обнуления авто-инкремента!';}
	 }
}
else{$content='<b>Ошибка при обработке запроса к БД!</b>';}





	$keywords='доставка, доставка товаров, проверка исполнения заказа';
	$title='Доставка продукции';
	$description='Доставка продукции заказаной в системе "Интернет-продажи"';
}
?>