<?
//время доставки
include('server/time.php');

//пользователи
if(isset($_GET['link']) and $_GET['link']=='users')
{
	include('server/users.php');
}

//регистрация
if(isset($_GET['link']) and $_GET['link']=='reg')
{
	include('server/registration.php');
}
//авторизация
if(isset($_GET['auth']) and $_GET['auth']=='true')
{
	include('server/auth.php');
}
//товары
if(isset($_GET['link']) and $_GET['link']=='products')
{
	include('server/products.php');
}
//магазины
elseif(isset($_GET['link']) and $_GET['link']=='shops')
{
	include('server/shops.php');
}
//заказы
elseif(isset($_GET['link']) and $_GET['link']=='orders')
{
	include('server/orders.php');
}
//доставка
elseif(isset($_GET['link']) and $_GET['link']=='deliveries')
{
	include('server/deliveries.php');
}
//поиск
elseif(isset($_GET['link']) and $_GET['link']=='search')
{
	include('server/search.php');
}
//цены
elseif(isset($_GET['link']) and $_GET['link']=='type')
{
	include('server/type.php');
}
//изначальное/о системе
elseif((isset($_GET['link']) and $_GET['link']=='about') or (!isset($_GET['link'])))
{
	include('server/about.php');
}
//строка запроса пуста и существует
elseif(isset($_GET['link']) and $_GET['link']=='')
{
	$content='<b>Неверный запрос!!!</b>';
	$keywords='Неверный запрос';
	$title='Неверный запрос';
	$description='Неверный запрос к системе';
}


?>