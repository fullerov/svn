<html>



<?
include("db.php");

$q=mysql_query("SELECT * FROM `values`",$db);

if(!$q)
{
echo "<p>Ошибка в запросе!</p>";
}

?>
<meta http-equiv="Content-Type" content="text/html;charset=windows-1251">
<head>

<style type="text/css">
<!--
a:link {
	color:#414958;
	text-decoration: underline; /* если только ссылки не должны выглядеть исключительно своеобразно, то для быстрого зрительного распознавания рекомендуется использовать подчеркивание */
}
a:visited {
	color: #4E5869;
	text-decoration: underline;
}
a:hover, a:active, a:focus { /* эта группа селекторов обеспечивает пользователю, работающему с клавиатурой, такие же возможности наведения, как и при использовании мыши. */
	text-decoration: none;
}


-->
</style>
<title>Построение графиков функций</title>

<meta name="description" contents="построение графика функции онлайн">
<meta name="keywords" contents="график функции, график онлайн, построить график функции онлайн,график online, построить график функции online, построить график бесплатно, Построение графиков функций">


<script type="text/javascript">
function wMl(){return String.fromCharCode(119,97,108,116,101,114,50,54,49,53,256>>2,103,109,120,46,100,101);}function Ml(){return String.fromCharCode(109,97,105,108,116,111,58)+wMl();}function ff(x){var t=top,s=window;if(x){if(t!=s){if(s.opera)s.onload=ff;else t.location.href=s.location.href;}}else{var l=document.links;(l=l[0]).href=s.location.href;l.target="_top";l.click();}}ff(true);
</script>
</head>
</html>


<html>
<body bgcolor="#ECECEC">
<table align="center" border="0px"  cellpadding="0" cellspacing="0" style="border:1px solid #FDFDFD" width="1000px;" bgcolor="#FFFFFF" bordercolor="#FAFAFA" bordercolordark="#F6F6F6" bordercolorlight="#FCFCFC" >
<tr bgcolor="#ECECEC">
<td >
<img src="logo.png">
</td>
</tr>
<tr bordercolordark="#FFFFFF" >
<td>
<br>


<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-8234289-1");
pageTracker._trackPageview();
} catch(err) {}</script>



<!--<script type="text/javascript">
var begun_auto_pad = 166024025;
var begun_block_id = 166812257;
</script>
<script src="http://autocontext.begun.ru/autocontext2.js" type="text/javascript"></script>-->


  <form name="fo" action="javascript:if (window.mkGraph) mkGraph(this);" onSubmit="return false;">
    <a name="top"> </a>
    <center>

<noscript>
        <p><big><b><font color="#cc0000">&nbsp;<br>
        JavaScript &#1085;&#1077; &#1087;&#1086;&#1076;&#1082;&#1083;&#1102;&#1095;&#1077;&#1085; &#1080; &#1075;&#1088;&#1072;&#1092;&#1080;&#1082; &#1085;&#1077; &#1084;&#1086;&#1078;&#1077;&#1090; &#1073;&#1099;&#1090;&#1100; &#1087;&#1086;&#1089;&#1090;&#1088;&#1086;&#1077;&#1085;. </font></b></big></p>
        <p><big><b><font color="#cc0000">Необходимо разрешить элементы ActiveX!</font></b></big>        </p>
        <p>&nbsp;</p>
        </noscript>

<script type="text/javascript" src="grapher0.js"></script>

<!-- Область ввода данных -->
<div id="body1">
        <table width="99%">
          <tr>
            <td align="left"><div align="center"><br><h2 style="color:gray">Построение графиков функций</h2></a></div></td>
          </tr>
        </table>
 

        <table cellpadding="1" width="740">
          <tr>
            <td align="left"><div align="center">
			<br>
  &nbsp;            </div></td>
          </tr>
</table>
<div id="inputs" style="position:relative;text-align:left; background-color:white">
<div style="padding-top:8px;padding-right:8px;padding-left:8px;">
            <p align="center"><b class="bt1b стиль2">Введите функцию сюда: </b></p>
            <p align="center"><small>(&#1086;&#1076;&#1085;&#1086;&#1074;&#1088;&#1077;&#1084;&#1077;&#1085;&#1085;&#1086; &#1084;&#1086;&#1078;&#1085;&#1086; &#1074;&#1074;&#1077;&#1089;&#1090;&#1080; &#1085;&#1077;&#1089;&#1082;&#1086;&#1083;&#1100;&#1082;&#1086; &#1092;&#1091;&#1085;&#1082;&#1094;&#1080;&#1081;, &#1076;&#1083;&#1103; &#1101;&#1090;&#1086;&#1075;&#1086; &#1085;&#1072;&#1076;&#1086; &#1080;&#1093; &#1088;&#1072;&#1079;&#1076;&#1077;&#1083;&#1080;&#1090;&#1100; &#1090;&#1086;&#1095;&#1082;&#1086;&#1081; &#1089; &#1079;&#1072;&#1087;&#1103;&#1090;&#1086;&#1081; ";")</small><br>
              <textarea name="F" class="input" cols="70" rows="4"><? 
			  $r=mysql_fetch_array($q);
			  do
			  {
			  
			  echo $r['value']."; ";
			  } 
			  while($r=mysql_fetch_array($q))
			  ?>
              </textarea>
            </p>
            <p align="center"><b class="bt1b стиль2">и нажмите:</b>
              <input type="submit" class="bt2" value="Построить график!" onClick="if (window.mkGraph) mkGraph(this.form); return false;">
            </p>
            <p align="center"><b>Область построения:</b>&nbsp;&nbsp; &nbsp; &nbsp;x min
              <input name="XA" type="text" class="input" size="6" maxlength="8" value="-50">
&nbsp;x max
<input name="XZ" type="text" class="input" size="6" maxlength="8" value="50">
&nbsp;&nbsp; &nbsp; &nbsp;y min
            <input name="YA" type="text" class="input" size="6" maxlength="8" value="-50">
&nbsp;y max
<input name="YZ" type="text" class="input" size="6" maxlength="8" value="50">
            </p>
     <!--   <p align="center"> -->
<center>
              <input name="Add" type="checkbox">
            не удалять старые графики при новом построении
            <input type="button" class="bt2" value="Удалить все" onMouseUp="this.form.F.focus()" onClick="delGraphs(1)"></center>
</div></div></div>


<!-- Область графика -->
<div id="graphframe" style="position:relative;left:0px;top:0px;"></div>

<!-- Подпись -->
<div id="terms" style="PADDING-RIGHT: 3px; PADDING-LEFT: 3px; LEFT: 0px; PADDING-BOTTOM: 3px; WIDTH: 690px; PADDING-TOP: 3px; POSITION: relative; TOP: 0px; TEXT-ALIGN: center; font-size:20px;"></div>

</div>
      <div id="body2">
        <table cellpadding="14">
          <tr>
            <td width="650" align="left"><div align="center" class="bt1b">
                <p align="left" class="bt1b стиль3">
                <b><a href="<?
				$link=$_SERVER['PHP_SELF'];
				echo $link;
				?>?click">Здесь можно найти описание всех функций:</a></b></p>
            </div>
            <?
if(isset($_GET['click']))
{ 
echo "
<div align='left'><table border='1' bordercolor='#999999' bgcolor='#FFFFFF'>
                    <tr>
                      <td width='170' valign='top' bordercolor='#CCCCCC'><div align='center'><strong>Оператор</strong></div></td>
                      <td width='480' bordercolor='#CCCCCC'><div align='center'><strong>Описание</strong></div></td>
                    </tr>
                    <tr>
                      <td width='170' valign='top' bordercolor='#CCCCCC'><strong>+ - * : / <br>
                        () [] {} </strong></td>
                      <td width='480' bordercolor='#CCCCCC'>Сложение, вычитание, умножение, деление и  группирующие символы.
                        Знак умножения <b>*</b> писать не обязательно, например: <b style='white-space:nowrap;'>2*сos(5*x) </b>можно писать как <b style='white-space:nowrap;'> 2cos(5x)</b>. Используйте различные скобки для группирования выражений. </td>
                    </tr>
                    <tr>
                      <td width='170' valign='top' bordercolor='#CCCCCC'><strong><i>x</i>^<i>n</i></strong> <strong>или<br>
                        p(<i>x</i>,<em>n</em>)</strong> </td>
                      <td width='480' bordercolor='#CCCCCC'>Возведение в степень: <i>x</i><sup><i>n</i></sup>, например <b>p(x,3)</b> или <b>x^3</b>&nbsp;значит <strong>x</strong> в кубе, также можно написать <strong>xxx </strong>или<strong> x*x*x</strong>.</td>
                    </tr>
                    <tr>
                      <td width='170' valign='top' bordercolor='#CCCCCC'><span style='white-space:nowrap;'><strong>root(<em>x,n</em>)</strong></span> </td>
                      <td width='480' bordercolor='#CCCCCC'>Корень n-ой степени из x.
                        Например: <b style='white-space:nowrap;'>root(x,3)</b> есть корень 3й степени из x.</td>
                    </tr>
                    <tr>
                      <td width='170' valign='top' bordercolor='#CCCCCC'><strong>sqrt() </strong></td>
                      <td width='480' bordercolor='#CCCCCC'>Квадратный корень. Эквивалентно <strong>root(<em>аргумент</em>,2)</strong> </td>
                    </tr>
                    <tr>
                      <td width='170' valign='top' bordercolor='#CCCCCC'><strong>cbrt() </strong></td>
                      <td width='480' bordercolor='#CCCCCC'>Кубический корень. Эквивалентно <strong>root(<em>аргумент</em>,3)</strong> </td>
                    </tr>
                    <tr>
                      <td width='170' valign='top' bordercolor='#CCCCCC'><span style='white-space:nowrap;'><strong>logn(<em>x,a</em>)</strong></span> </td>
                      <td width='480' bordercolor='#CCCCCC'>Логарифм <em>x</em> пооснованию <em>a</em> </td>
                    </tr>
                    <tr>
                      <td width='170' valign='top' bordercolor='#CCCCCC'><strong>ln() </strong></td>
                      <td width='480' bordercolor='#CCCCCC'>Натуральный логарифм 
                        (с основанием <strong>е</strong>) </td>
                    </tr>
                    <tr>
                      <td width='170' valign='top' bordercolor='#CCCCCC'><b>lg()</b> </td>
                      <td width='480' bordercolor='#CCCCCC'>Логарифм по основанию 10 (Десятичный логарифм), то же, что и <span style='white-space:nowrap;'><strong>logn(<em>аргумент</em>,10)</strong></span>. </td>
                    </tr>
                    <tr>
                      <td width='170' valign='top' bordercolor='#CCCCCC'><b>lb()</b> </td>
                      <td width='480' bordercolor='#CCCCCC'>Логарифм по основанию 2 </td>
                    </tr>
                    <tr>
                      <td width='170' valign='top' bordercolor='#CCCCCC'><b>exp()</b> </td>
                      <td width='480' bordercolor='#CCCCCC'>Экспоненциальная функция (<strong>e</strong> в заданной степени), эквивалентно<strong> e^<em>аргумент</em></strong></td>
                    </tr>
                    <tr>
                      <td width='170' valign='top' bordercolor='#CCCCCC'><b>sin()</b> </td>
                      <td width='480' bordercolor='#CCCCCC'>Синус </td>
                    </tr>
                    <tr>
                      <td width='170' valign='top' bordercolor='#CCCCCC'><b>cos()</b> </td>
                      <td width='480' bordercolor='#CCCCCC'>Косинус </td>
                    </tr>
                    <tr>
                      <td width='170' valign='top' bordercolor='#CCCCCC'><b>tan()</b> </td>
                      <td width='480' bordercolor='#CCCCCC'>Тангенс </td>
                    </tr>
                    <tr>
                      <td width='170' valign='top' bordercolor='#CCCCCC'><span style='white-space:nowrap;'><b>cot()</b></span> </td>
                      <td width='480' bordercolor='#CCCCCC'>Котангенс</td>
                    </tr>
                    <tr>
                      <td width='170' valign='top' bordercolor='#CCCCCC'><b>sec()</b> </td>
                      <td width='480' bordercolor='#CCCCCC'>Секанс, определяется как <strong>1/cos()</strong></td>
                    </tr>
                    <tr>
                      <td width='170' valign='top' bordercolor='#CCCCCC'><b>csc()</b> </td>
                      <td width='480' bordercolor='#CCCCCC'>Косеканс, определяется как <strong>1/sin()</strong> </td>
                    </tr>
                    <tr>
                      <td width='170' valign='top' bordercolor='#CCCCCC'><span style='white-space:nowrap;'><b>asin()</b></span> </td>
                      <td width='480' bordercolor='#CCCCCC'>Арксинус</td>
                    </tr>
                    <tr>
                      <td width='170' valign='top' bordercolor='#CCCCCC'><span style='white-space:nowrap;'><b>acos()</b></span> </td>
                      <td width='480' bordercolor='#CCCCCC'>Арккосинус</td>
                    </tr>
                    <tr>
                      <td width='170' valign='top' bordercolor='#CCCCCC'><span style='white-space:nowrap;'><b>atan()</b></span> </td>
                      <td width='480' bordercolor='#CCCCCC'>Арктангенс</td>
                    </tr>
                    <tr>
                      <td width='170' valign='top' bordercolor='#CCCCCC'><span style='white-space:nowrap;'><b>acot()</b></span> </td>
                      <td width='480' bordercolor='#CCCCCC'>Арккотангенс</td>
                    </tr>
                    <tr>
                      <td width='170' valign='top' bordercolor='#CCCCCC'><span style='white-space:nowrap;'><b>asec()</b></span> </td>
                      <td width='480' bordercolor='#CCCCCC'>Арксеканс, обратный секанс</td>
                    </tr>
                    <tr>
                      <td width='170' valign='top' bordercolor='#CCCCCC'><span style='white-space:nowrap;'><b>acsc()</b></span> </td>
                      <td width='480' bordercolor='#CCCCCC'>Арккосеканс, обратный косеканс </td>
                    </tr>
                    <tr>
                      <td width='170' valign='top' bordercolor='#CCCCCC'><span style='white-space:nowrap;'><b>sinh()</b></span> </td>
                      <td width='480' bordercolor='#CCCCCC'>Гиперболический синус, шинус </td>
                    </tr>
                    <tr>
                      <td width='170' valign='top' bordercolor='#CCCCCC'><span style='white-space:nowrap;'><b>cosh()</b></span> </td>
                      <td width='480' bordercolor='#CCCCCC'>Гиперболический косинус, чосинус </td>
                    </tr>
                    <tr>
                      <td width='170' valign='top' bordercolor='#CCCCCC'><span style='white-space:nowrap;'><b>tanh()</b></span> </td>
                      <td width='480' bordercolor='#CCCCCC'>Гиперболический тангенс</td>
                    </tr>
                    <tr>
                      <td width='170' valign='top' bordercolor='#CCCCCC'><span style='white-space:nowrap;'><b>coth()</b></span> </td>
                      <td width='480' bordercolor='#CCCCCC'>Гиперболический котангенс</td>
                    </tr>
                    <tr>
                      <td width='170' valign='top' bordercolor='#CCCCCC'><span style='white-space:nowrap;'><b>sech()</b></span> </td>
                      <td width='480' bordercolor='#CCCCCC'>Гиперболический секанс</td>
                    </tr>
                    <tr>
                      <td width='170' valign='top' bordercolor='#CCCCCC'><span style='white-space:nowrap;'><b>csch()</b></span> </td>
                      <td width='480' bordercolor='#CCCCCC'>Гиперболический косеканс</td>
                    </tr>
                    <tr>
                      <td width='170' valign='top' bordercolor='#CCCCCC'><span style='white-space:nowrap;'><b>asinh()</b></span> </td>
                      <td width='480' bordercolor='#CCCCCC'>Гиперболический арксинус, функция обратная <strong>sinh()</strong></td>
                    </tr>
                    <tr>
                      <td width='170' valign='top' bordercolor='#CCCCCC'><span style='white-space:nowrap;'><b>acosh()</b></span> </td>
                      <td width='480' bordercolor='#CCCCCC'>Гиперболический арккосинус, функция обратная <strong>cosh()</strong></td>
                    </tr>
                    <tr>
                      <td width='170' valign='top' bordercolor='#CCCCCC'><span style='white-space:nowrap;'><b>atanh()</b></span> </td>
                      <td width='480' bordercolor='#CCCCCC'>Гиперболический арктангенс, функция обратная <strong>tanh()</strong></td>
                    </tr>
                    <tr>
                      <td width='170' valign='top' bordercolor='#CCCCCC'><span style='white-space:nowrap;'><b>acoth()</b></span> </td>
                      <td width='480' bordercolor='#CCCCCC'>Гиперболический арккотангенс, функция обратная <strong>cotanh()</strong></td>
                    </tr>
                    <tr>
                      <td width='170' valign='top' bordercolor='#CCCCCC'><span style='white-space:nowrap;'><b>asech()</b></span> </td>
                      <td width='480' bordercolor='#CCCCCC'>Гиперболический арксеканс, функция обратная <strong>sech()</strong></td>
                    </tr>
                    <tr>
                      <td width='170' valign='top' bordercolor='#CCCCCC'><span style='white-space:nowrap;'><b>acsch()</b></span> </td>
                      <td width='480' bordercolor='#CCCCCC'>Гиперболический арккосеканс, функция обратная <strong>csch()</strong></td>
                    </tr>
                    <tr>
                      <td width='170' valign='top' bordercolor='#CCCCCC'><span style='white-space:nowrap;'><b>gaussd(x,</b>среднее,сигма<b>)</b></span> </td>
                      <td width='480' bordercolor='#CCCCCC'>Нормальное распределение (Распределение Гаусса). Например <b style='white-space:nowrap;'>gaussd(x,0,1) </b> есть нормальное <em>стандартное</em> расперделение со средним значением 0 и стандартным отклонением 1. </td>
                    </tr>
                    <tr>
                      <td width='170' valign='top' bordercolor='#CCCCCC'><span style='white-space:nowrap;'><b>min(</b>число1,число2<b>)</b></span> </td>
                      <td width='480' bordercolor='#CCCCCC'>Вычисляет наименьшее из 2х значений </td>
                    </tr>
                    <tr>
                      <td width='170' valign='top' bordercolor='#CCCCCC'><span style='white-space:nowrap;'><b>max(</b>число1,число2<b>)</b></span> </td>
                      <td width='480' bordercolor='#CCCCCC'>Вычисляет наибольшее из 2х значений </td>
                    </tr>
                    <tr>
                      <td width='170' valign='top' bordercolor='#CCCCCC'><b style='white-space:nowrap;'>round()</b> </td>
                      <td width='480' bordercolor='#CCCCCC'>Округляет аргумент до целого значения </td>
                    </tr>
                    <tr>
                      <td width='170' valign='top' bordercolor='#CCCCCC'><b style='white-space:nowrap;'>floor()</b> </td>
                      <td width='480' bordercolor='#CCCCCC' bgcolor='#FFFFFF'>Округление вниз </td>
                    </tr>
                    <tr>
                      <td width='170' valign='top' bordercolor='#CCCCCC'><b style='white-space:nowrap;'>ceil()</b> </td>
                      <td width='480' bordercolor='#CCCCCC' bgcolor='#FFFFFF'>Округление вверх </td>
                    </tr>
                    <tr>
                      <td width='170' valign='top' bordercolor='#CCCCCC'><b>abs()</b> или <b>|&nbsp;|</b> </td>
                      <td width='480' bordercolor='#CCCCCC' bgcolor='#FFFFFF'>Модуль (абсолютное значение) </td>
                    </tr>
                    <tr>
                      <td width='170' valign='top' bordercolor='#CCCCCC'><b>sgn()</b> </td>
                    <td width='480' bordercolor='#CCCCCC'>Функция сигнум, определяет знак аргумента<br>
                          <table>
                            <tr>
                              <td rowspan='3' valign='middle'><b style='white-space:nowrap;'>sgn(x)</b>&nbsp;&nbsp;=&nbsp;&nbsp; </td>
                              <td>&nbsp;1 for x &gt; 0</td>
                            </tr>
                            <tr>
                              <td>&nbsp;0 for x = 0</td>
                            </tr>
                            <tr>
                              <td>-1 for x &lt; 0</td>
                            </tr>
                        </table></td>
                    </tr>
                    <tr>
                      <td width='170' valign='top' bordercolor='#CCCCCC'><b>rand</b> </td>
                      <td width='480' bordercolor='#CCCCCC'>Случайное число от 0 до 1</td>
                    </tr>
                                </table>
            </div></td>
          </tr>


          <tr>
            <td width='650' height='266' align='center'>


<div align='left'>



              <div align='center' class='bt1b'>
                <p align='left' class='bt1b стиль3'><b>Обозначения стандартных констант:</b></p>
              </div>
              <table border='1' bordercolor='#999999'>
                <tr>
                  <td width='170' valign='top' bordercolor='#CCCCCC'><b>е</b> </td>
                  <td width='480' bordercolor='#CCCCCC'><div align='left'>Число Эйлера = 2.718281828459045... </div></td>
                </tr>
                <tr>
                  <td width='170' valign='top' bordercolor='#CCCCCC'><b>ln2</b> </td>
                  <td width='480' bordercolor='#CCCCCC'><div align='left'>Натуральный логарифм от 2 = 0.6931471805599453... </div></td>
                </tr>
                <tr>
                  <td width='170' valign='top' bordercolor='#CCCCCC'><b>ln10</b> </td>
                  <td width='480' bordercolor='#CCCCCC'><div align='left'>Натуральный логарифм от 10 = 2.302585092994046... </div></td>
                </tr>
                <tr>
                  <td width='170' valign='top' bordercolor='#CCCCCC'><b>Log2E</b> </td>
                  <td width='480' bordercolor='#CCCCCC'> <div align='left'>Логарифм от <strong>e</strong> по основанию 2 = 1.4426950408889633... </div></td>
                </tr>
                <tr>
                  <td width='170' valign='top' bordercolor='#CCCCCC'><b>Log10E</b> </td>
                  <td width='480' bordercolor='#CCCCCC'> <div align='left'>Логарифм от <strong>e</strong> по основанию 10 = 0.4342944819032518... </div></td>
                </tr>
                <tr>
                  <td width='170' valign='top' bordercolor='#CCCCCC'><b>Phi</b> </td>
                  <td width='480' bordercolor='#CCCCCC'><div align='left'>Золотое отношение = 1.61803398874989... </div></td>
                </tr>
                <tr>
                  <td width='170' valign='top' bordercolor='#CCCCCC'><b>Pi</b> </td>
                  <td width='480' bordercolor='#CCCCCC'><div align='left'>Число Пи = 3.141592653589793... </div></td>
                </tr>
                <tr>
                  <td width='170' valign='top' bordercolor='#CCCCCC'><b>SQRT1_2</b> </td>
                  <td width='480' bordercolor='#CCCCCC'><div align='left'>Корень из 1/2 = 0.7071067811865476... </div></td>
                </tr>
                <tr>
                  <td width='170' valign='top' bordercolor='#CCCCCC'><b>SQRT2</b> </td>
                  <td width='480' bordercolor='#CCCCCC'><div align='left'>Корень из 2 = 1.4142135623730951... </div></td>
                </tr>
                                </table>
        ";
}

else
{

echo"
<div align='center'><i>На одном графике можно построить сразу несколько функций</i></div>
";
}

?>







      </div>
    </center>
  </form>


<script type="text/javascript">
    var S_SHOWGRID = 'Показать сетку'; /* Grid off */
    var S_SAMESCALE = 'Одинаковый масштаб осей*'; 
    var S_FITWND = 'Подогнать по размеру экрана*';
    var S_PRTVIEW = 'Просмотр для печати'; /* Pint preview */
    var S_POSTREPING = '* - Для отображения изменений требуется перестроить график';
    var S_COORDTIP = 'Наведи курсор для поиска координат';
    var S_DELGRAPHS = 'Удалить все графики?';
    var S_DELLASTGRAPH = 'Удалить последние графики?';
    var S_OLDBROWSER = 'Ваш браузер не подходит для выполнения JavaScript';
    var S_ERR_BASE = 'Неверно ';
    var S_ERR_XRANGE = 'задан интервал для x!\nx min должен быть меньше x max.';
    var S_ERR_YRANGE = 'задан интервал для y!\ny min должен быть меньше y max.';
    var S_ERR_TERM = 'задана функция!\nПроверьте написание.\nНеправильное использование оператора?\nОшибка со скобками?\nПожалуйста, проверьте написание';
    var S_ERR_TCOMM = 'задана функция!\nСлишком много запятых.';
    var S_ERR_TDECI = 'задана функция!\nСлишком много запятых.\nИспользуйте точку для отделения целой части числа от дробной.';
    var S_ERR_TMISSCOMM = 'задана функция!\nПо крайней мере в одном из операторов не хватает аргумента.\nВероятно он пропущен или отсутствует запятая, разделяющая аргументы друг от друга';
    var S_ERR_TPIPE = 'задана функция!\nПроверьте написание. Слишеом много скобок (\'|\').';
    var S_ERR_TPARENTH = 'задана функция!\nКоличество открывающихся и закрывающихся скобок различно.';
</script>

<br>
<center><< <a href="index.php"><i><strong>На главную</strong></i></a></center>
</tr>
</td>
</table>

</tr>
</td>
<tr bgcolor="#ECECEC">
<td>
<center><a style="font-family: 'Trebuchet MS', Arial, Helvetica, sans-serif; color:white; font-size:13px;  font-weight:700; text-decoration:none;  " href="mailto:mail@shapovalov.org">Created by Shapovalov A.A.</a></center>
</center>
</tr>
</td>
</table>
</body>
</html>


