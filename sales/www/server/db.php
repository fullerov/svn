<?

//Соединение с базой данных, запуск сессий

ob_start();
session_start();

define('host','openserver');
define('user','admin');
define('password','admin');
define('database','internet_sales');

$mysql=new MySQLi(host,user,password,database);

?>