<?
//класс ответственный за выборку статей из базы
class Articles
{
	//подключение к базе данных
	private static function db()
	{
		require_once('DBconnection.php');
		return DBconnection::getDB();
	}
	
	//метод возвращает массив со всеми статьями
	function getList()
	{
		$db=self::db();
		$query=$db->prepare('SELECT id, user_id, title, date, text, img, rating, votes FROM articles');
		$query->execute();
	
		if($query->rowCount()!=0)
		{
			return $query->fetchAll(PDO::FETCH_ASSOC);
		}
		else
		{
			return 'В базе данных нет ни одной статьи!';
		}
		
	}
	
	//метод возвращает статью по переданному идентификатору
	function getArticle($id)
	{
		if(is_int($id))
		{
			$db=self::db();
			$query=$db->prepare("SELECT * FROM articles WHERE id='$id'");
			$query->execute();
	
			if($query->rowCount()!=0)
			{
				return $query->fetch(PDO::FETCH_ASSOC);
			}
			else
			{
				return 'В базе данных нет такой статьи!';
			}
		}
		else{return 'Параметр должен быть целочисленный!';}
	}
	
	function addArticle(){}
	
	function delArticle(){}
	
	function editArticle(){}

	function __construct(){}
	
	private function __clone(){}
	private function __wakeup(){}
	private function __sleep(){}
	
	
}



?>