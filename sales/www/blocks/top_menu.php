<div id="top_menu">
<? include('server/onsite.php');?>
<a href="/index.php?link=shops">&nbsp;Магазины&nbsp;</a>
<a href="/index.php?link=products">&nbsp;Продукция&nbsp;</a>
<?
if(isset($_SESSION['logpass']) and $_SESSION['type']=='user')
{
	echo '<a href="/index.php?link=orders">&nbsp;Заказы&nbsp;</a>';
}

if(isset($_SESSION['logpass']) and $_SESSION['type']=='admin')
{
	echo '<a href="/index.php?link=orders">&nbsp;Заказы&nbsp;</a>&nbsp;<a href="/index.php?link=deliveries">&nbsp;Доставка&nbsp;</a>&nbsp;<a href="/index.php?link=users">&nbsp;Пользователи&nbsp;</a>';
}

?>

<span id="info"><? 
if(empty($reg_user))
{}
else{echo '<br>'.$reg_user;}
?></span>
</div>



