<?
//модель "Вид"
class View
{
	//метод подключает вида прередаваемый в параметре для отправления данных
	public function render($file)
	{
		ob_start();
		include(dirname(__FILE__).'/'.$file);
		return ob_get_clean();
	}
	

}

?>