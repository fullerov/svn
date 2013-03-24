<? 
//подключение к базе данных и контроллеру, который отвечает на запросы пользователя
require('server/db.php');
include('server/action.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!--Вывод ключевых слов в переменной-->
<meta name="keywords" content="<? echo $keywords; ?>" />
<!--Вывод описания страницы в переменной-->
<meta name="description" content="<? echo $description; ?>" />
<!--Подключение библиотеки JQuery и скрипта ответственного за изменение стилей-->
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/style.js"></script>
<!--Подключение каскадной таблицы стилей-->
<link rel="stylesheet" href="css/style.css"  />
<!--Вывод заголовка страницы в переменной-->
<title><? echo $title;?></title>
</head>

<body>
<noscript><p id="noscript">Для работы с ИС включите поддержку JavaScript в веб-браузере!!!</p></noscript>
<div id="site">
<!--Верхний колонтитул-->
<? include('blocks/header.php')?>
<!--Верхнее меню-->
<? include('blocks/top_menu.php')?>
<!--Боковое меню-->
<? include('blocks/left_menu.php')?>
<!--Контент-->
<div id="content">
<? echo $content; ?>
</div>
<!--Нижний колонтитул-->
<? include('blocks/footer.php')?>
</div>
</body>
</html>

