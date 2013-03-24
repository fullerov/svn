<?
//если время доставки пришло и прошло заданное число дней с момента, то заказ считается доставленым
$now=date('Y-m-d');
$select_deliveries=$mysql->query('SELECT date FROM deliveries');

for($i=0;$row=$select_deliveries->fetch_array(MYSQL_ASSOC);$i++)
{
	if($row['date']==$now)
	$insert=$mysql->query("UPDATE deliveries SET confirm='1' WHERE date='$now'");
}


?>