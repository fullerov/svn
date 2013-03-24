<?
//типы продукции
//изменение названия типа продукции
if(isset($_POST['new_name']))
{
	if(!empty($_POST['typename']) and isset($_POST['typeid']))
	{
	
	$typename=$_POST['typename'];
	$typeid=$_POST['typeid'];
	$update=$mysql->query("UPDATE product_type SET name='$typename' WHERE id='$typeid'");
	
	if($update)
	{$content='Название типа продукции успешно изменено на <b>'.$typename.'</b>!';}
	else{$content='<b>Ошибка при изменении названия типа продукции!</b>';}
	
	}
	else{$content='<b>Название типа продукции не может быть пустым!</b>';}
	$title='Изменение названия типа продукции';
}
else
{
//редактирование типа продукции
if($_SESSION['type']=='admin' and isset($_POST['del_t']))
{//удаление продукции
	if(!empty($_POST['n_type']))
	{
		$n_type=$_POST['n_type'];
		
		$mysql->query('SET FOREIGN_KEY_CHECKS=0');
		$del_products=$mysql->query("DELETE FROM products WHERE type_id='$n_type'");
		$del_type=$mysql->query("DELETE FROM product_type WHERE id='$n_type'");
		
		if($del_type and $del_products)
		{$content='Тип продукции успешно удалён!';}
		else{$content='<b>Ошибка при удалении продукции!</b>';}
		
		$mysql->query('SET FOREIGN_KEY_CHECKS=1');
		
	}
	else{$content='<b>Вы не выбрали тип продукции для удаления!</b>';}
	
	$title='Удаление типа продукции';
}
elseif($_SESSION['type']=='admin' and isset($_POST['edit_t']))
{//редактирование названия вида продукции
	if(!empty($_POST['n_type']))
	{
		$n_type=$_POST['n_type'];
		$select=$mysql->query("SELECT id, name FROM product_type WHERE id='$n_type'");
		if(!$select)
		{$content='<b>Ошибка при выборке названия из базы</b>';}
		$row=$select->fetch_array();
		$name=(string)$row[1];
		$id=(int)$row[0];
		$content='<form action="'.$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'].'" method="post">
		<input type="hidden" name="typeid" value="'.$id.'">
		<input type="text" name="typename" size="30" maxlength="255" value="'.$name.'">&nbsp;<input type="submit" name="new_name" value="Изменить низвание">';
	}
	else{$content='<b>Вы должны выбрать тип продукции который хотите изменить и ввести его новое название!</b>';}
	
	$title='Редактирование типа продукции';

}
elseif($_SESSION['type']=='admin' and isset($_POST['name_t']) and isset($_POST['add_t']))
{//добавление продукции

	if(!empty($_POST['name_t']))
	{
		$name_t=(string)$_POST['name_t'];
		$insert=$mysql->query("INSERT INTO product_type (`name`) VALUES ('$name_t')");
		if($insert)
		{$content='Добавлен новый тип продукции: <b>'.$name_t.'</b>!';}
		else{$content='<b>Ошибка при добавлении типа продукции!</b>';}
	}
	else{$content='<b>Название типа продукции не может быть пустым!</b>';}
	
	$title='Добавление типа продукции';
}
else{
//если зашел админ
if(isset($_SESSION['logpass']) and $_SESSION['type']=='admin')
{
	$title="Типы продукции";
	
	$result=$mysql->query('SELECT * FROM `product_type` ORDER BY id');

if($result)
{
for($i=0;$row=$result->fetch_array(MYSQL_ASSOC);$i++)
{
	$cnt[$i]='<input type="radio" name="n_type" value="'.$row['id'].'"> '.$row['name'].'<br>';
	
}
}
else{$content='<b>Ошибка при выборке данных!</b>';}
$rez=implode($cnt);
$content='<form method="post" action="'.$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'].'"><span id="info_txt">Выберите одни из типов продукции для редактирования и нажмите соответствующую кнопку:</span><br><br>'.$rez.'<br>
<label for="del_t">При удалении типа продукции также удаляются все товары данного вида!</label><br><br>
<input type="submit" name="del_t" value="Удалить">&nbsp;<input type="submit" value="Изменить" name="edit_t"></form><br><br><span id="info_txt">Для добавления типа продукции, введите его название и нажмите на кнопку "Добавить":</span><br><br><form action="'.$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'].'" method="post"><input type="text" name="name_t" size="45" maxlength="255">&nbsp;<input type="submit" name="add_t" value="Добавить">';
}
else
{
if(isset($_GET['type_id']))
{
	$type_id=$_GET['type_id'];
	$result=$mysql->query("SELECT * FROM products WHERE type_id='$type_id'");
	if($result)
	{
		if($result->num_rows=='0')
		{$content='<b>Такого типа продукции нет в базе!</b>';}
		else
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
	$content='<table width="780" border="1">'.
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
	$content='<table width="780" border="1">'.
	'<tr id="table_head"><td>№</td><td>Название магазина</td><td>Тип</td><td>Брэнд</td><td>Модель</td>
	<td>Данные</td><td>Картинка</td><td>Цена</td><td>Гарантия</td></tr>
	'.$cnt.'</table><br><br><span id="info_txt">Только пользователи могут делать заказы...</span>';
				
				}
		}
	}
	else{$content='<b>Такого типа продукции нет в базе!</b>';}
	$keywords='виды, типы, продукции';
	$title='Виды продукции';
	$description='Виды определенной продукции';
}

//не выбран тип продукции

if(!isset($_GET['type_id']))
{

$result=$mysql->query('SELECT * FROM `product_type` ORDER BY id');

if($result)
{
for($i=0;$row=$result->fetch_array(MYSQL_ASSOC);$i++)
{
	$cnt[$i]='<li><a href="?link=type&type_id='.$row['id'].'">'.$row['name'].'</a></li>';
	
}

$rez=implode($cnt);
$content='<p style="font-weight:bold; font-size:14px; color:gray;">Список продукции по видам :</p><ul>'.$rez.'</ul>';

}
else{//если продукции в базе нет, обнуляем автоинкремент
	
	         $mysql->query('SET FOREIGN_KEY_CHEKS=0');
		     $nul=$mysql->query('ALTER TABLE product_type AUTO_INCREMENT=1');
	         if(!$nul)
		     {echo 'Ошибка обнуления авто-инкремента!';}
		     $mysql->query('SET FOREIGN_KEY_CHEKS=1');
	        
			 $content='<b>В базе нет продукции!</b>';


}
	
	$keywords='виды, типы, продукции';
	$title='Виды продукции';
	$description='Виды определенной продукции';

}
}
}
}
?>