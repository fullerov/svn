<? //модель для работы с организациями
class Organizations
{
	private function __construct(){}
	private function __clone(){}
	private function __wakeup(){}
	private function __sleep(){}
	
	//поле содержит экземпляр данного класса
	private static $object;
	
	//соединение с базой данных
	private function db()
	{
		require_once('DBconnection.php');
		return DBconnection::getDB();
	}
	
	//метод возвращающий экземпляр класса
	public function get()
	{
		if(self::$object instanceof self)
			return self::$object;
		else
			return self::$object=new Organizations();	
	}
	
	//метод создаёт новую организацию
	public function addOrganization(array $org)
	{}
	//метод для редактирования данных о организации
	public function editOrganization($org_id, array $data)
	{}
	//метод для удаления данных о организации
	public function deleteOrganization($org_id)
	{}
	//метод выводит все организации из заданного диапазона значений
	public function showOrganizations($first,$last)
	{
		
		
	}
	//метод возвращает организации пользователя
	public function myOrganiztions($user_id)
	{
	}
	
	
}
?>