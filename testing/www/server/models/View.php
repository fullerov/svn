<?
//модель отображения
class View
{
	
	function render($file)
	{
		ob_start();
		include(dirname(__FILE__).'/'.$file);
		return ob_get_clean();
	}
	

}

?>