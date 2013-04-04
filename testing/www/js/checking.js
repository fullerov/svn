// Проверка типа браузера и подключение стилей

var txt=new RegExp(/MSIE/);
var res=txt.exec(navigator.userAgent);
var url=document.URL;
var arr=url.split('/');

if(res==null)
{
	document.write('<script type="text/javascript" src="http://'+arr[2]+'/js/style.js"></script>');
	document.write('<link rel="stylesheet" href="http://'+arr[2]+'/css/style.css" />');
}
else
{
	document.write('<script type="text/javascript" src="http://'+arr[2]+'/js/style_ie.js"></script>');
	document.write('<link rel="stylesheet" href="http://'+arr[2]+'/css/style_ie.css" />');
}


