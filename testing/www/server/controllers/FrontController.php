<?
//класс по шалону singleton обрабатывающий запросы
class FrontController
{
	protected  $controller, $action, $params, $body;
	private static $obj;
	//возвращение текущего класса
	public static function get()
	{
		if(self::$obj instanceof FrontController)
		{
			return self::$obj;
		}
		else
		{
			return self::$obj = new self;
		}
	}
	
	private function __clone(){}
	private function __wakeup(){}
	private function __sleep(){}
	
	private function __construct()
	{
	//обработка запроса
		$request=$_SERVER['REQUEST_URI'];
		//проверка корректности запроса *
	/*	if($request=='/' or $request=='/about' or $request=='/authorization')
		{}
		else{header('Location: ../');}*/
		//разбивка строки в массив
		$splits=explode('/',trim($request,'/'));
		//выбор контроллера
		$this->controller=!empty($splits[0]) ? ucfirst($splits[0].'Controller'): 'IndexController';
		//выбор action-а
		$this->action=!empty($splits[1]) ? $splits[1].'Action': 'indexAction';
		//проверка строки запроса и разделение ключей и их значений
		if(!empty($splits[2]))
		{
			$keys = array();
			$values = array();
			
			for($i=2;$i<count($splits);$i++)
			{
				if($i%2==0)
					$keys[]=$splits[$i];
				else $values[]=$splits[$i]; 
			}
			
			$prms=array();
			$i=0;
			while($i<count($keys))
			{
				$prms[$keys[$i]]=$values[$i];
				$i++;
			}

			$this->params=$prms;
		}
	
	}
	//вызов контроллеров
	public function route()
	{
		
		if(class_exists($this->getController()))
		{
			$rc=new ReflectionClass($this->getController());
			if($rc->implementsInterface('IController'))
			{
				if($rc->hasMethod($this->getAction()))
				{
					$controller=$rc->newInstance();
					$method=$rc->getMethod($this->getAction());
					$method->invoke($controller);
				}
				else { throw new Exception('Неверный Action!'); }
			}
			else { throw new Exception('Неверный Interface!'); }
		}
		else { throw new Exception('Неверный Controller!'); }
		
	}
	//возврает параметры "ключ"->"значение"
	function getParams()
	{
		return $this->params;
	}
	//возварщает контроллер
	function getController()
	{
		return $this->controller;
	}
	//возварщает аction
	function getAction()
	{
		return $this->action;
	}
	//возварщает вид
	function getBody()
	{
		return $this->body;
	}
	//установка вида
	function setBody($body)
	{
		$this->body=$body;
	}
	
	
}

?>