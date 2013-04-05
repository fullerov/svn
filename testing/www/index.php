<? 
session_start();
try{
//пути до файлов с классами	
set_include_path(get_include_path()
.PATH_SEPARATOR.'server/controllers'
.PATH_SEPARATOR.'server/models'
.PATH_SEPARATOR.'server/views');
//автозагрузка объявленых классов
function __autoload($name)
{require_once $name.'.php';}
//вызов класса-обработчика запросов
$front=FrontController::get();
$front->route();
echo $front->getBody();
}

//при возникновении ошибки
catch(Exception $e)
{echo '<center><b>Ошибка в файле'.$e->getFile().'<br>На строке '.$e->getLine().'<br>'.$e->getMessage().'</b></center>';}

?>




 

