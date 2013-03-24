<tr>
<td  background="../img/foot.jpg" style="color: #B2C2B7; font-weight:700; font-family:'Comic Sans MS', cursive"><br /><br /><center>
<?

$copy_q=mysql_query("SELECT copy_r FROM options WHERE id=1");
$copy_r=mysql_fetch_array($copy_q);

echo $copy_r['copy_r'];
ob_end_flush();
?>

</center><br /></td>
</tr>