<html>



<?
include("db.php");

$q=mysql_query("SELECT * FROM `values`",$db);

if(!$q)
{
echo "<p>������ � �������!</p>";
}

?>
<meta http-equiv="Content-Type" content="text/html;charset=windows-1251">
<head>

<style type="text/css">
<!--
a:link {
	color:#414958;
	text-decoration: underline; /* ���� ������ ������ �� ������ ��������� ������������� �����������, �� ��� �������� ����������� ������������� ������������� ������������ ������������� */
}
a:visited {
	color: #4E5869;
	text-decoration: underline;
}
a:hover, a:active, a:focus { /* ��� ������ ���������� ������������ ������������, ����������� � �����������, ����� �� ����������� ���������, ��� � ��� ������������� ����. */
	text-decoration: none;
}


-->
</style>
<title>���������� �������� �������</title>

<meta name="description" contents="���������� ������� ������� ������">
<meta name="keywords" contents="������ �������, ������ ������, ��������� ������ ������� ������,������ online, ��������� ������ ������� online, ��������� ������ ���������, ���������� �������� �������">


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
        <p><big><b><font color="#cc0000">���������� ��������� �������� ActiveX!</font></b></big>        </p>
        <p>&nbsp;</p>
        </noscript>

<script type="text/javascript" src="grapher0.js"></script>

<!-- ������� ����� ������ -->
<div id="body1">
        <table width="99%">
          <tr>
            <td align="left"><div align="center"><br><h2 style="color:gray">���������� �������� �������</h2></a></div></td>
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
            <p align="center"><b class="bt1b �����2">������� ������� ����: </b></p>
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
            <p align="center"><b class="bt1b �����2">� �������:</b>
              <input type="submit" class="bt2" value="��������� ������!" onClick="if (window.mkGraph) mkGraph(this.form); return false;">
            </p>
            <p align="center"><b>������� ����������:</b>&nbsp;&nbsp; &nbsp; &nbsp;x min
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
            �� ������� ������ ������� ��� ����� ����������
            <input type="button" class="bt2" value="������� ���" onMouseUp="this.form.F.focus()" onClick="delGraphs(1)"></center>
</div></div></div>


<!-- ������� ������� -->
<div id="graphframe" style="position:relative;left:0px;top:0px;"></div>

<!-- ������� -->
<div id="terms" style="PADDING-RIGHT: 3px; PADDING-LEFT: 3px; LEFT: 0px; PADDING-BOTTOM: 3px; WIDTH: 690px; PADDING-TOP: 3px; POSITION: relative; TOP: 0px; TEXT-ALIGN: center; font-size:20px;"></div>

</div>
      <div id="body2">
        <table cellpadding="14">
          <tr>
            <td width="650" align="left"><div align="center" class="bt1b">
                <p align="left" class="bt1b �����3">
                <b><a href="<?
				$link=$_SERVER['PHP_SELF'];
				echo $link;
				?>?click">����� ����� ����� �������� ���� �������:</a></b></p>
            </div>
            <?
if(isset($_GET['click']))
{ 
echo "
<div align='left'><table border='1' bordercolor='#999999' bgcolor='#FFFFFF'>
                    <tr>
                      <td width='170' valign='top' bordercolor='#CCCCCC'><div align='center'><strong>��������</strong></div></td>
                      <td width='480' bordercolor='#CCCCCC'><div align='center'><strong>��������</strong></div></td>
                    </tr>
                    <tr>
                      <td width='170' valign='top' bordercolor='#CCCCCC'><strong>+ - * : / <br>
                        () [] {} </strong></td>
                      <td width='480' bordercolor='#CCCCCC'>��������, ���������, ���������, ������� �  ������������ �������.
                        ���� ��������� <b>*</b> ������ �� �����������, ��������: <b style='white-space:nowrap;'>2*�os(5*x) </b>����� ������ ��� <b style='white-space:nowrap;'> 2cos(5x)</b>. ����������� ��������� ������ ��� ������������� ���������. </td>
                    </tr>
                    <tr>
                      <td width='170' valign='top' bordercolor='#CCCCCC'><strong><i>x</i>^<i>n</i></strong> <strong>���<br>
                        p(<i>x</i>,<em>n</em>)</strong> </td>
                      <td width='480' bordercolor='#CCCCCC'>���������� � �������: <i>x</i><sup><i>n</i></sup>, �������� <b>p(x,3)</b> ��� <b>x^3</b>&nbsp;������ <strong>x</strong> � ����, ����� ����� �������� <strong>xxx </strong>���<strong> x*x*x</strong>.</td>
                    </tr>
                    <tr>
                      <td width='170' valign='top' bordercolor='#CCCCCC'><span style='white-space:nowrap;'><strong>root(<em>x,n</em>)</strong></span> </td>
                      <td width='480' bordercolor='#CCCCCC'>������ n-�� ������� �� x.
                        ��������: <b style='white-space:nowrap;'>root(x,3)</b> ���� ������ 3� ������� �� x.</td>
                    </tr>
                    <tr>
                      <td width='170' valign='top' bordercolor='#CCCCCC'><strong>sqrt() </strong></td>
                      <td width='480' bordercolor='#CCCCCC'>���������� ������. ������������ <strong>root(<em>��������</em>,2)</strong> </td>
                    </tr>
                    <tr>
                      <td width='170' valign='top' bordercolor='#CCCCCC'><strong>cbrt() </strong></td>
                      <td width='480' bordercolor='#CCCCCC'>���������� ������. ������������ <strong>root(<em>��������</em>,3)</strong> </td>
                    </tr>
                    <tr>
                      <td width='170' valign='top' bordercolor='#CCCCCC'><span style='white-space:nowrap;'><strong>logn(<em>x,a</em>)</strong></span> </td>
                      <td width='480' bordercolor='#CCCCCC'>�������� <em>x</em> ����������� <em>a</em> </td>
                    </tr>
                    <tr>
                      <td width='170' valign='top' bordercolor='#CCCCCC'><strong>ln() </strong></td>
                      <td width='480' bordercolor='#CCCCCC'>����������� �������� 
                        (� ���������� <strong>�</strong>) </td>
                    </tr>
                    <tr>
                      <td width='170' valign='top' bordercolor='#CCCCCC'><b>lg()</b> </td>
                      <td width='480' bordercolor='#CCCCCC'>�������� �� ��������� 10 (���������� ��������), �� ��, ��� � <span style='white-space:nowrap;'><strong>logn(<em>��������</em>,10)</strong></span>. </td>
                    </tr>
                    <tr>
                      <td width='170' valign='top' bordercolor='#CCCCCC'><b>lb()</b> </td>
                      <td width='480' bordercolor='#CCCCCC'>�������� �� ��������� 2 </td>
                    </tr>
                    <tr>
                      <td width='170' valign='top' bordercolor='#CCCCCC'><b>exp()</b> </td>
                      <td width='480' bordercolor='#CCCCCC'>���������������� ������� (<strong>e</strong> � �������� �������), ������������<strong> e^<em>��������</em></strong></td>
                    </tr>
                    <tr>
                      <td width='170' valign='top' bordercolor='#CCCCCC'><b>sin()</b> </td>
                      <td width='480' bordercolor='#CCCCCC'>����� </td>
                    </tr>
                    <tr>
                      <td width='170' valign='top' bordercolor='#CCCCCC'><b>cos()</b> </td>
                      <td width='480' bordercolor='#CCCCCC'>������� </td>
                    </tr>
                    <tr>
                      <td width='170' valign='top' bordercolor='#CCCCCC'><b>tan()</b> </td>
                      <td width='480' bordercolor='#CCCCCC'>������� </td>
                    </tr>
                    <tr>
                      <td width='170' valign='top' bordercolor='#CCCCCC'><span style='white-space:nowrap;'><b>cot()</b></span> </td>
                      <td width='480' bordercolor='#CCCCCC'>���������</td>
                    </tr>
                    <tr>
                      <td width='170' valign='top' bordercolor='#CCCCCC'><b>sec()</b> </td>
                      <td width='480' bordercolor='#CCCCCC'>������, ������������ ��� <strong>1/cos()</strong></td>
                    </tr>
                    <tr>
                      <td width='170' valign='top' bordercolor='#CCCCCC'><b>csc()</b> </td>
                      <td width='480' bordercolor='#CCCCCC'>��������, ������������ ��� <strong>1/sin()</strong> </td>
                    </tr>
                    <tr>
                      <td width='170' valign='top' bordercolor='#CCCCCC'><span style='white-space:nowrap;'><b>asin()</b></span> </td>
                      <td width='480' bordercolor='#CCCCCC'>��������</td>
                    </tr>
                    <tr>
                      <td width='170' valign='top' bordercolor='#CCCCCC'><span style='white-space:nowrap;'><b>acos()</b></span> </td>
                      <td width='480' bordercolor='#CCCCCC'>����������</td>
                    </tr>
                    <tr>
                      <td width='170' valign='top' bordercolor='#CCCCCC'><span style='white-space:nowrap;'><b>atan()</b></span> </td>
                      <td width='480' bordercolor='#CCCCCC'>����������</td>
                    </tr>
                    <tr>
                      <td width='170' valign='top' bordercolor='#CCCCCC'><span style='white-space:nowrap;'><b>acot()</b></span> </td>
                      <td width='480' bordercolor='#CCCCCC'>������������</td>
                    </tr>
                    <tr>
                      <td width='170' valign='top' bordercolor='#CCCCCC'><span style='white-space:nowrap;'><b>asec()</b></span> </td>
                      <td width='480' bordercolor='#CCCCCC'>���������, �������� ������</td>
                    </tr>
                    <tr>
                      <td width='170' valign='top' bordercolor='#CCCCCC'><span style='white-space:nowrap;'><b>acsc()</b></span> </td>
                      <td width='480' bordercolor='#CCCCCC'>�����������, �������� �������� </td>
                    </tr>
                    <tr>
                      <td width='170' valign='top' bordercolor='#CCCCCC'><span style='white-space:nowrap;'><b>sinh()</b></span> </td>
                      <td width='480' bordercolor='#CCCCCC'>��������������� �����, ����� </td>
                    </tr>
                    <tr>
                      <td width='170' valign='top' bordercolor='#CCCCCC'><span style='white-space:nowrap;'><b>cosh()</b></span> </td>
                      <td width='480' bordercolor='#CCCCCC'>��������������� �������, ������� </td>
                    </tr>
                    <tr>
                      <td width='170' valign='top' bordercolor='#CCCCCC'><span style='white-space:nowrap;'><b>tanh()</b></span> </td>
                      <td width='480' bordercolor='#CCCCCC'>��������������� �������</td>
                    </tr>
                    <tr>
                      <td width='170' valign='top' bordercolor='#CCCCCC'><span style='white-space:nowrap;'><b>coth()</b></span> </td>
                      <td width='480' bordercolor='#CCCCCC'>��������������� ���������</td>
                    </tr>
                    <tr>
                      <td width='170' valign='top' bordercolor='#CCCCCC'><span style='white-space:nowrap;'><b>sech()</b></span> </td>
                      <td width='480' bordercolor='#CCCCCC'>��������������� ������</td>
                    </tr>
                    <tr>
                      <td width='170' valign='top' bordercolor='#CCCCCC'><span style='white-space:nowrap;'><b>csch()</b></span> </td>
                      <td width='480' bordercolor='#CCCCCC'>��������������� ��������</td>
                    </tr>
                    <tr>
                      <td width='170' valign='top' bordercolor='#CCCCCC'><span style='white-space:nowrap;'><b>asinh()</b></span> </td>
                      <td width='480' bordercolor='#CCCCCC'>��������������� ��������, ������� �������� <strong>sinh()</strong></td>
                    </tr>
                    <tr>
                      <td width='170' valign='top' bordercolor='#CCCCCC'><span style='white-space:nowrap;'><b>acosh()</b></span> </td>
                      <td width='480' bordercolor='#CCCCCC'>��������������� ����������, ������� �������� <strong>cosh()</strong></td>
                    </tr>
                    <tr>
                      <td width='170' valign='top' bordercolor='#CCCCCC'><span style='white-space:nowrap;'><b>atanh()</b></span> </td>
                      <td width='480' bordercolor='#CCCCCC'>��������������� ����������, ������� �������� <strong>tanh()</strong></td>
                    </tr>
                    <tr>
                      <td width='170' valign='top' bordercolor='#CCCCCC'><span style='white-space:nowrap;'><b>acoth()</b></span> </td>
                      <td width='480' bordercolor='#CCCCCC'>��������������� ������������, ������� �������� <strong>cotanh()</strong></td>
                    </tr>
                    <tr>
                      <td width='170' valign='top' bordercolor='#CCCCCC'><span style='white-space:nowrap;'><b>asech()</b></span> </td>
                      <td width='480' bordercolor='#CCCCCC'>��������������� ���������, ������� �������� <strong>sech()</strong></td>
                    </tr>
                    <tr>
                      <td width='170' valign='top' bordercolor='#CCCCCC'><span style='white-space:nowrap;'><b>acsch()</b></span> </td>
                      <td width='480' bordercolor='#CCCCCC'>��������������� �����������, ������� �������� <strong>csch()</strong></td>
                    </tr>
                    <tr>
                      <td width='170' valign='top' bordercolor='#CCCCCC'><span style='white-space:nowrap;'><b>gaussd(x,</b>�������,�����<b>)</b></span> </td>
                      <td width='480' bordercolor='#CCCCCC'>���������� ������������� (������������� ������). �������� <b style='white-space:nowrap;'>gaussd(x,0,1) </b> ���� ���������� <em>�����������</em> ������������� �� ������� ��������� 0 � ����������� ����������� 1. </td>
                    </tr>
                    <tr>
                      <td width='170' valign='top' bordercolor='#CCCCCC'><span style='white-space:nowrap;'><b>min(</b>�����1,�����2<b>)</b></span> </td>
                      <td width='480' bordercolor='#CCCCCC'>��������� ���������� �� 2� �������� </td>
                    </tr>
                    <tr>
                      <td width='170' valign='top' bordercolor='#CCCCCC'><span style='white-space:nowrap;'><b>max(</b>�����1,�����2<b>)</b></span> </td>
                      <td width='480' bordercolor='#CCCCCC'>��������� ���������� �� 2� �������� </td>
                    </tr>
                    <tr>
                      <td width='170' valign='top' bordercolor='#CCCCCC'><b style='white-space:nowrap;'>round()</b> </td>
                      <td width='480' bordercolor='#CCCCCC'>��������� �������� �� ������ �������� </td>
                    </tr>
                    <tr>
                      <td width='170' valign='top' bordercolor='#CCCCCC'><b style='white-space:nowrap;'>floor()</b> </td>
                      <td width='480' bordercolor='#CCCCCC' bgcolor='#FFFFFF'>���������� ���� </td>
                    </tr>
                    <tr>
                      <td width='170' valign='top' bordercolor='#CCCCCC'><b style='white-space:nowrap;'>ceil()</b> </td>
                      <td width='480' bordercolor='#CCCCCC' bgcolor='#FFFFFF'>���������� ����� </td>
                    </tr>
                    <tr>
                      <td width='170' valign='top' bordercolor='#CCCCCC'><b>abs()</b> ��� <b>|&nbsp;|</b> </td>
                      <td width='480' bordercolor='#CCCCCC' bgcolor='#FFFFFF'>������ (���������� ��������) </td>
                    </tr>
                    <tr>
                      <td width='170' valign='top' bordercolor='#CCCCCC'><b>sgn()</b> </td>
                    <td width='480' bordercolor='#CCCCCC'>������� ������, ���������� ���� ���������<br>
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
                      <td width='480' bordercolor='#CCCCCC'>��������� ����� �� 0 �� 1</td>
                    </tr>
                                </table>
            </div></td>
          </tr>


          <tr>
            <td width='650' height='266' align='center'>


<div align='left'>



              <div align='center' class='bt1b'>
                <p align='left' class='bt1b �����3'><b>����������� ����������� ��������:</b></p>
              </div>
              <table border='1' bordercolor='#999999'>
                <tr>
                  <td width='170' valign='top' bordercolor='#CCCCCC'><b>�</b> </td>
                  <td width='480' bordercolor='#CCCCCC'><div align='left'>����� ������ = 2.718281828459045... </div></td>
                </tr>
                <tr>
                  <td width='170' valign='top' bordercolor='#CCCCCC'><b>ln2</b> </td>
                  <td width='480' bordercolor='#CCCCCC'><div align='left'>����������� �������� �� 2 = 0.6931471805599453... </div></td>
                </tr>
                <tr>
                  <td width='170' valign='top' bordercolor='#CCCCCC'><b>ln10</b> </td>
                  <td width='480' bordercolor='#CCCCCC'><div align='left'>����������� �������� �� 10 = 2.302585092994046... </div></td>
                </tr>
                <tr>
                  <td width='170' valign='top' bordercolor='#CCCCCC'><b>Log2E</b> </td>
                  <td width='480' bordercolor='#CCCCCC'> <div align='left'>�������� �� <strong>e</strong> �� ��������� 2 = 1.4426950408889633... </div></td>
                </tr>
                <tr>
                  <td width='170' valign='top' bordercolor='#CCCCCC'><b>Log10E</b> </td>
                  <td width='480' bordercolor='#CCCCCC'> <div align='left'>�������� �� <strong>e</strong> �� ��������� 10 = 0.4342944819032518... </div></td>
                </tr>
                <tr>
                  <td width='170' valign='top' bordercolor='#CCCCCC'><b>Phi</b> </td>
                  <td width='480' bordercolor='#CCCCCC'><div align='left'>������� ��������� = 1.61803398874989... </div></td>
                </tr>
                <tr>
                  <td width='170' valign='top' bordercolor='#CCCCCC'><b>Pi</b> </td>
                  <td width='480' bordercolor='#CCCCCC'><div align='left'>����� �� = 3.141592653589793... </div></td>
                </tr>
                <tr>
                  <td width='170' valign='top' bordercolor='#CCCCCC'><b>SQRT1_2</b> </td>
                  <td width='480' bordercolor='#CCCCCC'><div align='left'>������ �� 1/2 = 0.7071067811865476... </div></td>
                </tr>
                <tr>
                  <td width='170' valign='top' bordercolor='#CCCCCC'><b>SQRT2</b> </td>
                  <td width='480' bordercolor='#CCCCCC'><div align='left'>������ �� 2 = 1.4142135623730951... </div></td>
                </tr>
                                </table>
        ";
}

else
{

echo"
<div align='center'><i>�� ����� ������� ����� ��������� ����� ��������� �������</i></div>
";
}

?>







      </div>
    </center>
  </form>


<script type="text/javascript">
    var S_SHOWGRID = '�������� �����'; /* Grid off */
    var S_SAMESCALE = '���������� ������� ����*'; 
    var S_FITWND = '��������� �� ������� ������*';
    var S_PRTVIEW = '�������� ��� ������'; /* Pint preview */
    var S_POSTREPING = '* - ��� ����������� ��������� ��������� ����������� ������';
    var S_COORDTIP = '������ ������ ��� ������ ���������';
    var S_DELGRAPHS = '������� ��� �������?';
    var S_DELLASTGRAPH = '������� ��������� �������?';
    var S_OLDBROWSER = '��� ������� �� �������� ��� ���������� JavaScript';
    var S_ERR_BASE = '������� ';
    var S_ERR_XRANGE = '����� �������� ��� x!\nx min ������ ���� ������ x max.';
    var S_ERR_YRANGE = '����� �������� ��� y!\ny min ������ ���� ������ y max.';
    var S_ERR_TERM = '������ �������!\n��������� ���������.\n������������ ������������� ���������?\n������ �� ��������?\n����������, ��������� ���������';
    var S_ERR_TCOMM = '������ �������!\n������� ����� �������.';
    var S_ERR_TDECI = '������ �������!\n������� ����� �������.\n����������� ����� ��� ��������� ����� ����� ����� �� �������.';
    var S_ERR_TMISSCOMM = '������ �������!\n�� ������� ���� � ����� �� ���������� �� ������� ���������.\n�������� �� �������� ��� ����������� �������, ����������� ��������� ���� �� �����';
    var S_ERR_TPIPE = '������ �������!\n��������� ���������. ������� ����� ������ (\'|\').';
    var S_ERR_TPARENTH = '������ �������!\n���������� ������������� � ������������� ������ ��������.';
</script>

<br>
<center><< <a href="index.php"><i><strong>�� �������</strong></i></a></center>
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


