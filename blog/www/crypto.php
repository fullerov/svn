<? include("blocks/bd.php"); ?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf8" />
<meta name="keywords" content="<? echo $row['meta_k']; ?>" />
<meta name="description" content="<? echo $row['meta_d']; ?>" />

<title><? echo 'Шифрование'; ?></title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<table width="900" border="0" align="center" cellpadding="0" cellspacing="0">
  <? include("blocks/header.php"); ?> 
  <tr bgcolor="#FFFFFF">
    <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <? include("blocks/left.php"); ?>
        <td width="75%" align="left" valign="top">
        <p class="post_view_title"><? echo 'Парный шифр'; ?></p>
        <p><? 
		
		
		if(isset($_POST['text']) and !empty($_POST['text']))
	{
		
		$text=trim($_POST['text']);
		
		
		if(isset($_POST['code']))
		{
			//кодирование
			$array=array('a'=>'ю','б'=>'ж','в'=>'е','г'=>'л','д'=>'щ','е'=>'в','ж'=>'б','з'=>'к','и'=>'х','к'=>'з',
			'л'=>'г','м'=>'э','н'=>'р','о'=>'ь','п'=>'ф','р'=>'н','с'=>'ы','т'=>'я','у'=>'ш','ф'=>'п','х'=>'и','ц'=>'ч',
			'ч'=>'ц','ш'=>'у','щ'=>'д','ь'=>'о','ы'=>'с','э'=>'м','ю'=>'а','я'=>'т', 'А'=>'Ю','Б'=>'Ж','В'=>'Е','Г'=>'Л','Д'=>'Щ','Е'=>'В','Ж'=>'Б','З'=>'К','И'=>'Х','К'=>'З', 'Л'=>'Г','М'=>'Э','Н'=>'Р','О'=>'Ь','П'=>'Ф','Р'=>'Н','С'=>'Ы','Т'=>'Я','У'=>'Ш','Ф'=>'П','Х'=>'И','Ц'=>'Ч', 'Ч'=>'Ц','Ш'=>'У','Щ'=>'Д','Ь'=>'О','Ы'=>'С','Э'=>'М','Ю'=>'А','Я'=>'Т');
			
			$res=strtr($text,$array);
			
			echo "<p align='center'><b>Результат:</b></p><center><form  method='post'action='crypto.php' name='crypto' id='crypto'><textarea id='text' name='text' maxlength='10000'>$res</textarea><br>
<input type='submit' value='Шифровать' name='code'></form></center>";

		}
		
	}
	
else{
	
	echo "<p align='center'><b>Введите текст:</b></p><center><form  method='post'action='crypto.php' name='crypto' id='crypto'>
<textarea id='text' height='250' width='650' name='text' maxlength='10000'></textarea><br>
<input type='submit' value='Шифровать' name='code'>
</form></center>";
	
	}
		
		
		?>
		</p>
        </td>
      </tr>
    </table></td>
  </tr>
  <? include("blocks/footer.php"); ?>
</table>
</body>
</html>