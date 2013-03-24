<div align="center" id="footer"><img  src="css/img/footer.png" /> <p style="margin-top:-20px; margin-right:410px; color:#FFFEFA; font-style:italic;">Шаповалов А.А. ИС-1-08</p>

<?
$selec_prodt=$mysql->query('SELECT id FROM products');
$num_prod=$selec_prodt->num_rows;
$selec_shops=$mysql->query('SELECT id FROM shops');
$num_shops=$selec_shops->num_rows;

$selec_tel=$mysql->query('SELECT tel FROM shops LIMIT 6');


for($i=0;$row_tel=$selec_tel->fetch_array();$i++)
{
	$cnt_tel[$i]=$row_tel['tel'].'<br>';
}


echo '<p style="margin-top:-36px; margin-left:200px; color:#FDF9F4;">Всего <b>'.$num_prod.'</b> товар (-ов) в <b>'.$num_shops.'</b> магазинах (-е)</p>';

echo '<p style="margin-top:-113px; font-size:12px; margin-left:850px; color:#F4EDE6;">'.implode($cnt_tel).'</p>';
?>

</div>
<?
//завершение подключение к базе данных
ob_end_flush();
$mysql->close();
?>