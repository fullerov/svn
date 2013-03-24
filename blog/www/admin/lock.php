<? 
ob_start();
session_start();
$db=mysql_connect("openserver","blog","12345");
mysql_select_db("blog",$db);

if(!isset($_SESSION['auth']) or !isset($_SESSION['login']) or $_SESSION['type']!="admin")
{
Header ("WWW-Authenticate: Basic realm=\"Admin Page\"");
Header ("HTTP/1.0 401 Unauthorized");
header("Location: ../");
exit();
}

/*if (!isset($_SERVER['PHP_AUTH_USER']))
{
Header ("WWW-Authenticate: Basic realm=\"Admin Page\"");
Header ("HTTP/1.0 401 Unauthorized");
exit();
}

else {
			
	
        if (!get_magic_quotes_gpc()) {
                $_SERVER['PHP_AUTH_USER'] = mysql_escape_string($_SERVER['PHP_AUTH_USER']);
                $_SERVER['PHP_AUTH_PW'] = mysql_escape_string($_SERVER['PHP_AUTH_PW']);
				
        }
        $query = "SELECT pass FROM userlist WHERE user='".$_SERVER['PHP_AUTH_USER']."'";
        $lst = @mysql_query($query);


		
        if (!$lst)
        {
Header ("WWW-Authenticate: Basic realm=\"Admin Page\"");
Header ("HTTP/1.0 401 Unauthorized");
exit();
        }

        if (mysql_num_rows($lst) == 0)
        {
Header ("WWW-Authenticate: Basic realm=\"Admin Page\"");
Header ("HTTP/1.0 401 Unauthorized");
exit();
        }

        $pass =  @mysql_fetch_array($lst);
		
        if ($_SERVER['PHP_AUTH_PW']!= $pass['pass'])
        {
Header ("WWW-Authenticate: Basic realm=\"Admin Page\"");
Header ("HTTP/1.0 401 Unauthorized");
exit();
        }
		
		if($_SERVER['PHP_AUTH_PW']== $pass['pass'])
		{
			$_SESSION['add']=$_SERVER['PHP_AUTH_PW'].$_SERVER['PHP_AUTH_USER'];
		}
		
		if(!isset($_SESSION['add']))
		{
			Header ("WWW-Authenticate: Basic realm=\"Admin Page\"");
			Header ("HTTP/1.0 401 Unauthorized");
			exit();
		}
}*/
?>