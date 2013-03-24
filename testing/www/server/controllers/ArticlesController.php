<?
//контроллер вызываемый по запросу /articles
class ArticlesController implements IController
{
	function indexAction()
	{
		//вывод всех статей из базы данных
		$articles=new Articles();
		$content=$articles->getList();

		//вывод контента в вид статей
		$fc=FrontController::get();
		$view=new View();
		$view->content=$content;
		$view->keywords='Дистанционное тестирование, тестирование школьников, тестирование студентов, тестирование сотрудников, онлайн, тестирование, пройти тестирование, создать тест, о ИС, описание, статьи';
		$view->description='Информационная система дистанционного тестирования знаний, для студентов, пользователей, школьников и сотрудников предприятий. Вы можете легко создать или пройти тест...';
		$view->title='Все статьи';
		$result=$view->render('../views/articles.php');
		$fc->setBody($result);
	}
	
	function getAction()
	{//вывод запрашиваемой статьи из базы
		
		$fc=FrontController::get();
		$url=$fc->getParams();
		$article=new Articles();
		$content=$article->getArticle((int)$url['id']);
		
		$view=new View();
		$view->content=$content;
		$view->keywords=$content['meta_key'];
		$view->description=$content['meta_description'];
		$view->title=$content['title'];
		$result=$view->render('../views/article.php');
		$fc->setBody($result);
	}
	
}

?>