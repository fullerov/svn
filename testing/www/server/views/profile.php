<!--Вид профиля пользователя-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!--Вывод ключевых слов-->
<meta name="keywords" content="<? echo $this->keywords; ?>" />
<!--Вывод описания страницы-->
<meta name="description" content="<? echo $this->description; ?>" />
<!--Если выключен JS-->
<noscript><b style="color:red;">Включите поддержку Javascript в своем браузере!</b>
<script type="text/javascript" src="http://<? echo $_SERVER['HTTP_HOST'];?>/js/style.js"></script>
<link rel="stylesheet" href="http://<? echo $_SERVER['HTTP_HOST'];?>/css/style.css" />
</noscript>
<!--Подключение библиотеки JQuery-->
<script type="text/javascript" src="http://<? echo $_SERVER['HTTP_HOST'];?>/js/jquery.js"></script>
<!--Проверка браузера и подключение соответствующих стилей CSS и сценариев Javascript-->
<script type="text/javascript" src="http://<? echo $_SERVER['HTTP_HOST'];?>/js/checking.js"></script>
<!--Подключение клиентской логики на Javascript-->
<script type="text/javascript" src="http://<? echo $_SERVER['HTTP_HOST'];?>/js/client_actions.js"></script>
<!--Подключение визуального редактора-->
<script type="text/javascript" src="http://<? echo $_SERVER['HTTP_HOST'];?>/js/wysiwyg.js"></script>
<!--Вывод названия страницы-->
<title><? echo $this->title; ?></title>
</head>

<body>
<div id="site">
<!--Верхний колонтитул-->
<? include('blocks/header.php'); ?>
<!--Верхнее меню-->
<? include('blocks/top_menu.php'); ?>
<!--Боковое меню-->
<? include('blocks/left_menu.php'); ?>
<!--Вывод контента-->
<div id="content">
<? //проверка типа переданного параметра вывод данных о пользователе
if(is_array($this->content))
{
	printf('<h2 id="profile_login">%s</h2> 
	<img title="%s" src="http://'.$_SERVER['HTTP_HOST'].'/%s">
	<p>Информация о пользователе <b>%s</b>:</p>
	<p>Адрес: <b>%s</b>, город <b>%s</b>, <b>%s</b></p>
	<p>Ф.И.О.: <b>%s</b> дата рождения: <b>%s</b></p>
	<p>e-mail: <b>%s</b>, тел.: <b>%s</b>, тип: <b>%s</b></p>
	<p>Дата регистрации: <b>%s</b></p>
	<p>О себе: <i>%s</i></p><br><br>',$this->content['login'], $this->content['login'],$this->content['image'],$this->content['login'],Registration::getUserCountry($this->content['country_id']),Registration::getUserCity($this->content['city_id']),$this->content['address'],$this->content['fio'],$this->content['birthdate'],$this->content['email'],$this->content['tel'],Registration::getUserType($this->content['type_id']),$this->content['date'],$this->content['about']);
	
}
else{header('Location: ../');}
?>
</div>
<!--Нижний колонтитул-->
<? include('blocks/footer.php'); ?>
</div></body></html>