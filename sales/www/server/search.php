<?

// поиск 

if(isset($_POST['search']))
{
	if(empty($_POST['search']))
	{
		$content='<b>Строка запроса пуста!</b>';
	}
	else
	{
	$search=trim($_POST['search']);
	$search=htmlspecialchars($search);
	$search=stripslashes($search);
	$result=$mysql->query("SELECT * FROM products WHERE model LIKE '%" . $search . "%' OR brand LIKE '%" . $search . "%' OR data LIKE '%" . $search . "%' OR price LIKE '%" . $search . "%' OR warranty LIKE '%" . $search . "%' ORDER BY id DESC");
	
	if($result)
	{
		if($result->num_rows!='0')
		{
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
	$content='Результат поиска <b>'.$search.'</b>:<br><br>'.'<table width="780" border="1">'.
	'<tr id="table_head"><td>№</td><td>Название магазина</td><td>Тип</td><td>Брэнд</td><td>Модель</td>
	<td>Данные</td><td>Картинка</td><td>Цена</td><td>Гарантия</td></tr>
	'.$cnt.'</table><br><br><span id="info_txt">Для того чтобы сделать заказ продукции нажмите на её номер...</span>';
	
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
	
	$cont[$i]=sprintf('<tr><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td><img src="%s" height="100" width="140" /></td><td>%s</td><td>%s</td></tr>',
	$row['id'],$row_shop['name'],$row_type['name'],$row['brand'],$row['model'],$row['data'],$row['img'],$row['price'],$row['warranty']);
	         }
			 
	$cnt=implode($cont);
	$content='Результат поиска <b>'.$search.'</b>:<br><br>'.'<table width="780" border="2" cellpadding="1" cellspacing="1">'.
	'<tr id="table_head"><td>№</td><td>Название магазина</td><td>Тип</td><td>Брэнд</td><td>Модель</td>
	<td>Данные</td><td>Картинка</td><td>Цена</td><td>Гарантия</td></tr>
	'.$cnt.'</table><br><br><span id="info_txt">Только пользователи могут делать заказы...</span>';
				
				}
			
	
	
		}
		else{$content='<b>Ничего не найдено! Измените текст запроса!</b>';}
		
	}
	else{$content='<b>Ошибка при запросе к БД!</b>';}
	}
}

if(!isset($_POST['submit']))
{
	$content='<form method="post" action="'.$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'].'">'.
	'<label for="search">Введите запрос для поиска продукции:</label><br>'.'
	<input type="text" name="search" size="50" maxlength="255" value="">
	<input type="submit" name="submit" value="Поиск">
	</form><br>
	';
	}

	
	$keywords='поиск, поиск товара';
	$title='Поиск';
	$description='Страница для поиска продукции в системе "Интернет-продажи"';
?>