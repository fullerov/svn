/* Reshalki.ru */


/***********  Config variables  **********/
var BORDERCOLOR = '#ECE8E3';
var FRAMECOLOR = 'white';
var CNVCOLOR = '#ffffff';
var SCALECOLOR = '#000000';
var AXCOLOR = '#666666';
var GRIDCOLOR = '#d6d6d6';
var GRAPHCOLOR = [
	'ff0000',
	'009f00',
	'4444ff',
	'ffaa00',
	'00e0e0',
	'b00099',
	'00d000',
	'cc6633',
	'3333cc',
	'ff7744',
	'00c0aa',
	'ff00ff',
	'006f00',
	'cc0000',
	'0096d0',
	'9900ee'
];
var DEFW = 520; // default width and height of canvas
var LEFT = 50;  // left margin conntaining y-hash layer
var TOP = 4;    // top   "
var RIGHT = 124;// right "  containing options
var BOTTOM = 22;// bottom margin containing x-hash layer
/*********   End config variables   ***********/


var g_frame,
g_inputTb,
g_cnv,         // canvas
g_gridlyr,
g_xlyr, g_ylyr,// layers for x- and y-hash
g_termlyr,     // termstring-layer on bottom of canvas
g_optslyr,
g_coordtip,    // tooltip displaying mouse-co-ordinates
g_n = 0,       // number of graphs on cnv
g_htm = '',
g_term,
g_w, g_h,      // size of cnv
g_xa, g_xz,    // x min, x max
g_ya, g_yz,
g_dx, g_dy,    // delta value/px
g_pageX, g_pageY, // position of canvas
g_wait = 0,
g_infin = 100000000000000000000,

g_adhtm, g_dom,
g_moz,
g_ua = navigator.userAgent.toLowerCase(),
g_ie = !!(!window.opera && document.all && (document.documentElement || document.body)),
g_iemac = !!(g_ie && g_ua.indexOf('mac') >= 0),
g_kq = !!(g_ua.indexOf('konqu') >= 0),
g_db = document.documentElement || document.body || null;


function init(o)
{
	g_frame = getDiv('graphframe');
	if (!g_frame) return;
	g_w = g_h = DEFW;
	(o = g_frame.style).width = (LEFT+g_w+1+RIGHT)+'px';
	o.height = (TOP+g_h+BOTTOM)+'px';
	o.background = (g_inputTb = getDiv('inputs')).style.background = FRAMECOLOR;
	g_inputTb.style.width = (g_w+1+LEFT+RIGHT)+'px';
	o.borderBottom = o.borderRight = o.borderLeft = g_inputTb.style.borderTop = g_inputTb.style.borderRight = g_inputTb.style.borderLeft = '1px solid '+BORDERCOLOR;
	g_adhtm = (typeof g_frame.insertAdjacentHTML != "undefined");
	g_dom = (!g_adhtm &&
		typeof g_frame.appendChild != "undefined" &&
		typeof document.createRange != "undefined" &&
		typeof (o = document.createRange()).setStartBefore != "undefined" &&
		typeof o.createContextualFragment != "undefined");
	g_moz = document.body && typeof document.body.style.MozOpacity != "undefined";
	getCnvPos();
	paint(g_frame,
		mkDiv('', '', LEFT, TOP, g_w+1, g_h+1, CNVCOLOR, 'bglyr')+
		mkDiv('', '', LEFT, TOP, g_w+1, g_h+1, '', 'gridlyr')+
		mkDiv('', '', LEFT, TOP, g_w+1, g_h+1, '', 'cnvlyr')+
		mkDiv('', '', LEFT, TOP+g_h+1, g_w+1, BOTTOM, '', 'xlyr', true)+
		mkDiv('', 'right', 0, TOP, LEFT, g_h+1, '', 'ylyr', true)+
		mkDiv('', '', LEFT+g_w+4, TOP+(g_h>>1)-200, RIGHT, g_h, '', 'opts', true)
	);
	paint(getDiv('opts'),
		'<input name="GRID" type="checkbox" checked onclick="setTimeout(\'setGridVis();\', 10)">'+S_SHOWGRID+
		'<br>&nbsp;<br><input name="XYRATIO" type="checkbox">'+S_SAMESCALE+
		'<br>&nbsp;<br><input name="FITWND" type="checkbox">'+S_FITWND+
		'<br>&nbsp;<br><input name="PRT" type="checkbox" onclick="setTimeout(\'prt();\', 10)">'+S_PRTVIEW+
		'<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>'+S_POSTREPING,
		true
	);
	(o = (g_cnv = getDiv('cnvlyr')).style).zIndex = 1;
	o.cursor = 'crosshair';
	g_xlyr = getDiv('xlyr');
	g_ylyr = getDiv('ylyr');
	g_gridlyr = getDiv('gridlyr');
	g_termlyr = getDiv('terms');
	g_optslyr = getDiv('opts');
	if (document.captureEvents) document.captureEvents(Event.MOUSEMOVE);
	window.onresize = getCnvPos;
}


function isNum(x)
{
	return (!isNaN(x) && typeof x == 'number');
}


function getDiv(x)
{
	x = !!document.all? document.all[x] : !!document.getElementById? document.getElementById(x) : null;
	return (x && typeof x.style != 'undefined' && typeof x.innerHTML != 'undefined')? x : null;
}


function getCnvPos(o)
{
	g_pageX = LEFT+1;
	g_pageY = TOP;
	o = g_frame;
	while (o.offsetParent)
	{
		g_pageX += o.offsetLeft;
		g_pageY += o.offsetTop;
		o = o.offsetParent;
	}
}


function getVal(el, y)
{
	return ((y = el.value.replace(/ /g, '')) == '' || !isNaN(y = parseFloat(y.replace(/\,/,'.'))))? y : 'n';
}


function alertErr(el, str)
{
	alert(S_ERR_BASE + str);
	el.focus();
	el.select();
}


function setCssWH(o, w, h, over)
{
	(o = o.style).width = w+'px';
	o.height = h+'px';
	if (!over)
	{
		o.clip = 'rect(0,'+w+'px,'+h+'px,0)';
		o.overflow = 'hidden';
	}
}


function resizeCnv(o)
{
	g_inputTb.style.width = (LEFT+g_w+1+RIGHT)+'px';
	setCssWH(g_frame, LEFT+g_w+1+RIGHT, Math.max(350, TOP+g_h+BOTTOM));
	setCssWH(getDiv('bglyr'), g_w+1, g_h+1);
	setCssWH(g_cnv, g_w+1, g_h+1);
	setCssWH(g_gridlyr, g_w+1, g_h+1);
	setCssWH(g_ylyr, LEFT, g_h+1, true);
	setCssWH((o = g_xlyr), g_w+1, BOTTOM, true);
	o.style.top = (TOP+g_h+1)+'px';
	g_optslyr.style.left = (LEFT+g_w+5)+'px';
}


function fitWnd()
{
	if (document.forms.fo.FITWND.checked)
	{
		if (!!((o = document.documentElement || document.body) && o.clientWidth))
		{
			var _w = o.clientWidth;
			var _h = o.clientHeight;
		}
		else
		{
			var _w = window.innerWidth;
			var _h = window.innerHeight;
		}
		g_w = g_h = Math.min(_w-_w%2-LEFT-RIGHT, _h-_h%2-TOP-BOTTOM)-4;
	}
	else g_w = g_h = DEFW;
	resizeCnv();
	getCnvPos();
}


function initCoordtip(o)
{
	(o = (g_coordtip = getDiv('coordtip')).style).left = (g_pageX+15)+'px';
	o.top = (g_pageY+10)+'px';
	o.zIndex = 2;
	paint(g_coordtip, '<small style="background:'+CNVCOLOR+';white-space:nowrap;">'+S_COORDTIP+'<\/small>');
	g_cnv.onmouseover = function() {document.onmousemove = coordTip; g_cnv.onmouseover = null;}
}


function prt()
{
	getDiv('body1').style.display = getDiv('body2').style.display = (document.forms.fo.PRT.checked)? 'none' : 'block';
	getCnvPos();
}


function setGridVis()
{
	g_gridlyr.style.visibility = (document.forms.fo.GRID.checked)? 'visible' : 'hidden';
}


function delGraphs(ask)
{
	if (ask && !(g_n && window.confirm(S_DELGRAPHS))) return;
	g_n = 0;
	paint(g_cnv, '');
	paint(g_termlyr, '');
}


String.prototype.toExp = function()
{
	var neg = (this.charAt(0) == '-')*1;
	var n = this.match(/[1-9]/g).length;
	if (Math.abs(parseFloat(this)) > 1)
		return this.substring(0,neg+1) + ((n-1)? ('.'+this.substring(neg+1, this.indexOf('0'))) : '') + '*10<sup>' + (this.length-1-neg) + '<\/sup>';
	return (neg? '-' : '') + this.match(/[1-9]/)[0] + ((n-1)? ('.'+this.substring(this.length-n+1)) : '') + '*10<sup>-' + (this.substring(this.indexOf('.')+1).length-n+1) + '<\/sup>';
}


function shiftL(x, n)
{
	var neg = (x < 0)? '-' : '';
	x = ''+Math.abs(x);
	while (n--)
	{
		if (x.charAt(x.length-1) == '0')
			x = x.substring(0, x.length-1);
		else if (!(/\./).test(x))
			x = x.substring(0, x.length-1)+'.'+x.charAt(x.length-1);
		else if (!x.indexOf('.'))
			x = '.0'+x.substring(1);
		else x = x.substring(0, x.indexOf('.')-1)+'.'+x.charAt(x.indexOf('.')-1)+x.substring(x.indexOf('.')+1);
	}
	if (x.charAt(0) == '.') x = '0'+x;
	return neg+x;
}


function mkIv(x)
{
	x *= DEFW/g_w;;
	var i = 0;
	while (x-100 <= 0)
	{
		x *= 10;
		i++;
	}
	while (x-1000 > 0)
	{
		x /= 10;
		i--;
	}
	x = Math.floor(x);
	x = (x-600 >= 0)? 100 : (x-300 >= 0)? 50 : (x-200 >= 0)? 25 : 20;
	while (i < 0)
	{
		x = parseInt(x += '0');
		i++;
	}
	return parseFloat(shiftL(x, i));
}


function mkNumStr(n, iv, toE)
{
	var i = 0;
	if (!n || !iv) return '0';
	while (Math.abs(iv)-1 < 0)
	{
		iv *= 10;
		i++;
	}
	n = shiftL(!toE? Math.round(n*iv) : (n*iv), i);
	return (toE && n.length > 6)? n.toExp() : n;
}


function mkScale()
{
	var ivx = mkIv(g_xz-g_xa), ivy = mkIv((g_yz-g_ya)*g_w/g_h),
	rx = ivx/g_dx, ry = ivy/g_dy,
	htm = '', gridhtm = '',
	pos, str, strs, strl,
	limt = Math.round(g_xz/g_dx), limb = Math.round(g_xa/g_dx),
	j = Math.ceil(g_xa/ivx),
	i = Math.round(j*rx);
	while (i-limt <= 0)
	{
		strs = (str = ''+mkNumStr(j, ivx, true)).match(/[^\>\<a-z]+/g);
		strl = strs[0].length + (strs[1]? strs[1].length : 0);
		htm += mkDiv('', '', (pos = i-limb), 0, 1, 4, SCALECOLOR, '', false, true)+
			mkDiv('<font style="font-size:11px;font-family:Arial,Helvetica,sans-serif;color:black;">'+str+'<\/font>', '', pos-3*strl, 4, 16*strl, 12, '', '', true, false);
		gridhtm += mkDiv('', '',  pos, 0, 1, g_h+1, !j? AXCOLOR : GRIDCOLOR, '', false, true);
		i = Math.round(++j*rx);
	}
	paint(g_xlyr, htm);
	var sclw = parseInt(g_ylyr.style.width);
	htm = '';
	limt = Math.round(g_yz/g_dy), limb = Math.round(g_ya/g_dy);
	j = Math.ceil(g_ya/ivy);
	i = Math.round(j*ry);
	while (i-limt <= 0)
	{
		strl = (str = ''+mkNumStr(j, ivy, true)).length;
		htm += mkDiv('', '', sclw-4, (pos = g_h-i+limb), 4, 1, SCALECOLOR, '', false, true)+
			mkDiv('<font style="font-size:11px;font-family:Arial,Helvetica,sans-serif;color:black;">'+str+'<\/font>', 'right', 0, pos-7, sclw-6, 12, '', '', true, false);
		gridhtm += mkDiv('', '',  0, pos, g_w+1, 1, !j? AXCOLOR : GRIDCOLOR, '', false, true);
		i = Math.round(++j*ry);
	}
	paint(g_ylyr, htm);
	paint(g_gridlyr, gridhtm);
}


function mkDiv(txt, align, x, y, w, h, c, id, over, cut)
{
	if (cut)
	{
		if (x-g_w > 0 || x+w < 0 || y-g_h > 0 || y+h < 0) return '';
		if (y < 0)
		{
			h += y;
			y = 0;
		}
		if (y+h-g_h-1 > 0) h = g_h+1-y;
		if (x < 0)
		{
			w += x;
			x = 0;
		}
		if (x+w-g_w-1 > 0) w = g_w+1+x;
	}
	if (g_ie) return ('%%'+x+';'+y+';'+w+';'+h+';'+(align? 'righ;' : 'lef;')+(c? (c+';') : ';')+(over? 'visible;' : 'hidden;')+(id? (' id="'+id+'">') : '>')+txt);
	return ('<div'+
		(id? ' id="'+id+'"' : '')+
		' style="position:absolute;left:' + x + 'px;top:' + y + 'px;width:' + w + 'px;height:' + h + 'px;'+
		(over? '' : ('clip:rect(0,' + w + 'px,' + h + 'px,0);' + (g_moz? '' : 'overflow:hidden;')))+
		(c? 'background-color:' + c + ';' : '')+
		'text-align:' + (align || 'left') + ';">' + txt + '<\/div>'
	);
}


function gReplace(x)
{
	return x.replace(/%%([^;]+);([^;]+);([^;]+);([^;]+);([^;]+);([^;]*);([^;]+);([^%%]*)/g,
		'<div style="position:absolute;left:$1px;top:$2px;width:$3px;height:$4px;text-align:$5t;'+
		'background:$6;overflow:$7;"$8<\/div>');
}


function paint(cnv, htm, add)
{
	if (cnv)
	{
		if (add)
		{
			var o;
			if (g_adhtm) cnv.insertAdjacentHTML("BeforeEnd", gReplace(htm));
			else if (g_dom)
			{
				o = document.createRange();
				o.setStartBefore(cnv);
				o = o.createContextualFragment(htm);
				cnv.appendChild(o);
			}
			else cnv.innerHTML += htm;
		}
		else cnv.innerHTML = g_ie? gReplace(htm) : htm;
	}
}


function scaleY(x)
{
	return (Math.min(Math.max(g_h+Math.round((g_ya-x)/g_dy), -1), g_h+1));
}


function mkTerm(x)
{
	x = x.toLowerCase().replace(/\s/g,'').
		replace(/f(\(|\{|\[)x(\)|\}|\])\=/g, '').
		replace(/math\./g,'').
		replace(/\.*\;+/g,';').
		replace(/[\.\;]*$/,'').
		replace(/\|([^\|]*)\|/g,'abs($1)').
		replace(/:/g,'\/').
		replace(/²/g,'^2').
		replace(/³/g,'^3').
		replace(/[\"\']/g,'^').
		replace(/e/g,'E').
		replace(/log(\d)/g,'LOG$1').
		replace(/ln(\d)/g,'LN$1').
		replace(/arc(us)?|arEa|ar/g,'a').
		replace(/hyp(Erbolicus)?/g,'h').
		replace(/cosin(us|E)?/g,'cos').
		replace(/sin(us|E)/g,'sin').
		replace(/sEc(an(s|t))?/g,'sec').
		replace(/cosec/g,'csc').
		replace(/tangEn[st]/g,'tan').
		replace(/cotan/g,'cot').
		replace(/random(\(|\{|\[)(\)|\}|\])|rand(om)?/g,'random()').
		replace(/(p|power)(\(|\{|\[)/g,'pow$2').
		replace(/(b|q)r(\(|\{|\[)/g,'$1rt$2').
		replace(/(sqr|sqrt)(\d)/g,'SQRT$2').
		replace(/tan2/g, 'tanz').
		replace(/max/g,'maz').
		replace(/pi/g,'PI').
		replace(/phi/g,'PHI').
		replace(/y/,'nuts').
		replace(/cEil/g,'ceil').
		replace(/Expow|Exp/g,'exp').
		replace(/([^m]|^)(\(|\{|\[)(\)|\}|\])/g,'$1$2x$3').
		replace(/(\(|\{|\[)\,/g,'$1x,').
		replace(/\,(\)|\}|\])/g,',x$1').
		replace(/\,\,/g,',x,');
	x = x.replace(/([^G]\d\d|[^G\d]\d|^\d|^\d\d)E/g,'$1*E');
	x = x.replace(/(RT1_2|RT2|LN10|LN2)(\d)/g,'$1*$2');
	var reg = /(x|E|PI|\)|\}|\])(E|\d)/g;
	while (x.match(reg)) x = x.replace(reg,'$1*$2');
	reg = /(\d|E|PI|x|\)|\}|\])(\(|\{|\[|x|a|c|exp|f|gaus|l|m|pow|r|s|tan|L|PI|SQRT)/g;
	while (x.match(reg)) x = x.replace(reg,'$1*$2');
	x = x.replace(/tanz/g,'tan2').replace(/maz/g,'max');
	return x;
}


function WzMath()
{
	this.PHI = 1.6180339887498948482045868343656;
	this.root = function(x, xp) {return Math.pow(x, 1/xp);};
	this.cbrt = function(x) {return Math.pow(x, 1/3);};
	this.logn = function(x, bs) {return Math.log(x)/Math.log(bs);};
	this.ln = function(x) {return Math.log(x);};
	this.lg = function (x) {return Math.log(x)/Math.LN10;};
	this.lb = function(x) {return Math.log(x)/Math.LN2;};
	this.cot = function(x) {return Math.cos(x)/Math.sin(x);};
	this.sec = function(x) {return 1/Math.cos(x);};
	this.csc = function(x) {return 1/Math.sin(x);};
	this.acot = function(x) {return Math.atan(-x)+Math.PI/2;};
	this.asec = function(x) {return Math.acos(1/x);};
	this.acsc = function(x) {return Math.asin(1/x);};
	this.sinh = function(x) {return (Math.exp(x)-Math.exp(-x))/2;};
	this.cosh = function(x) {return (Math.exp(x)+Math.exp(-x))/2;};
	this.sech = function(x) {return 2/(Math.exp(x)+Math.exp(-x));};
	this.csch = function(x) {return 2/(Math.exp(x)-Math.exp(-x));};
	this.tanh = function(x) {return (Math.exp(2*x)-1)/(Math.exp(2*x)+1);};
	this.coth = function(x) {return (Math.exp(2*x)+1)/(Math.exp(2*x)-1);};
	this.asinh = function(x) {return Math.log(x+Math.sqrt(x*x+1));};
	this.acosh = function(x) {return Math.log(x+Math.sqrt(x*x-1));};
	this.atanh = function(x) {return Math.log((1+x)/(1-x))/2;};
	this.acoth = function(x) {return Math.log((x+1)/(x-1))/2;};
	this.asech = function(x) {return Math.log(1/x+Math.sqrt(1/(x*x)-1));};
	this.acsch = function(x) {return Math.log(1/x+Math.sqrt(1/(x*x)+1));};
	this.gaussd = function(x,m,s) {return 1/(s*2.5066282746310002)*Math.exp(-(x -= m)*x/(2*s*s));};
	this.sgn = function(x) {return (x < 0)? -1 : (x > 0)? 1 : 0;};
	this.fact = function(x)
	{
		x = Math.round(Math.abs(x));
		if (x > 1) return x*this.fact(x-1);
		return 1;
	}; 
}
WzMath.prototype = Math;
WzMath = new WzMath();        


function mkPow(x)
{
	x = x.replace(/\{|\[/g,'(').replace(/\}|\]/g,')');
	while (/\^/.test(x))
	{
		var az = x.search(/\^/),
		a = x.substring(0, az), z = x.substring(az+1),
		p = 0, ch, lim = az-1;
		while (true)
		{
			ch = a.charAt(lim);
			if (ch == ')') p++;
			else if (ch == '(') p--;
			if (p < 0 || !p && (!(lim+1) || /[\+\-\*\/\,]/.test(ch))) break;
			lim--;
		}
		a = a.substring(0, lim+1) + 'pow(' + a.substring(lim+1, az);
		lim = 0; p = 0;
		while (true)
		{
			ch = z.charAt(lim);
			if (ch == '(') p++;
			else if (ch == ')') p--;
			if (p < 0 || !p && (lim == z.length || lim > 0 && /[\+\-\*\/\^\,]/.test(ch))) break;
			lim++;
		}
		z = z.substring(0, lim) + ')' + z.substring(lim);
		x = a+','+z;
	}
	return x;
}


Number.prototype.lim = function(i, j, xdir, ydir)
{
	var yy = parseFloat(this), y,
	incr = g_dx/100, _incr = incr*xdir, qt = 1, lim = (g_xa+(j+xdir)*g_dx),
	x = g_xa+j*g_dx;
	while (qt < 0x100000 && !!((xdir < 0)? (x-lim > 0) : (x-lim < 0)))
	{
		x += _incr;
		y = gEval(x, g_term[i]);
		if (isNum(y) && y*ydir-yy*ydir > 0) yy = y;
		else
		{
			x -= _incr;
			_incr = incr*xdir/(qt <<= 3);
		}
	}
	return yy;
}


function gEval(x, term, y)
{
	with (WzMath) return Math.min(Math.max(parseFloat(eval(term)),-g_infin),g_infin);
}


function mkGraph(f)
{
	if (!g_cnv)
	{
		alert(S_OLDBROWSER);
		return;
	}
	g_htm = '';
	var xa = getVal(f.XA),
	xz = getVal(f.XZ);
	if (!isNum(xa)) return alertErr(f.XA, 'x min');
	if (!isNum(xz)) return alertErr(f.XZ, 'x max');
	if (xa >= xz) return alertErr(f.XA, S_ERR_XRANGE);
	if (!f.Add.checked) g_n = 0;
	if (!g_n)
	{
		var ya = getVal(f.YA),
		yz = getVal(f.YZ);
		if (!isNum(ya) && ya != '') return alertErr(f.YA, 'y min');
		if (!isNum(yz) && yz != '') return alertErr(f.YZ, 'y max');
		if (isNum(ya) && isNum(yz) && ya >= yz) return alertErr(f.YA, S_ERR_YRANGE);
		fitWnd();
		g_xa = xa;
		g_xz = xz;
		g_dx = (xz-xa)/g_w;
		g_ya = ya;
		g_yz = yz;
		if (!isNum(ya)) ya = g_infin;
		if (!isNum(yz)) yz = -g_infin;
		delGraphs();
	}
	g_term = mkTerm(f.F.value).split(';');
	var term = [];
	var yy = [], y;
	try
	{
		for (i = 0; i < g_term.length; i++)
		{
			g_term[i] = mkPow(term[i] = g_term[i]);
			while (true)
			{
				var coms = (g_term[i].match(/\,/g) || []).length, meths = (g_term[i].match(/pow|min|max|atan2|root|logn|gau|ssd?/g) || []).length;
				if (coms > meths && g_term[i].match(/\d+\,\d/)) return alertErr(f.F, S_ERR_TDECI);
				else if (coms > meths) return alertErr(f.F, S_ERR_TCOMM);
				else if (coms < meths) return alertErr(f.F, S_ERR_TMISSCOMM);
				else break;
			}
			if (/\|../.test(g_term[i])) return alertErr(f.F, S_ERR_TPIPE);
			if ((g_term[i].match(/\(/g) || []).length != (g_term[i].match(/\)/g) || []).length) return alertErr(f.F, S_ERR_TPARENTH);
			var rand = !(g_term[i].indexOf('ran') < 0);
			yy[i] = [];
			yy[i][g_w] = gEval(g_xz, g_term[i]);
			var j = g_w+1; while (j--)
			{
				if (j) yy[i][j-1] = gEval(g_xa+(j-1)*g_dx, g_term[i]);
				if (isNum(y = yy[i][j]))
				{
					if (!rand)
					{
						if (isNum(yy[i][j-1]) && isNum(yy[i][j+1]))
						{
							if (yy[i][j-1] < 0 && y > 0 && yy[i][j+1]-y < 0)
								y = y.lim(i,j,-1,1);
							else if (yy[i][j-1] > 0 && y < 0 && yy[i][j+1]-y > 0)
								y = y.lim(i,j,-1,-1);
							else if (yy[i][j+1] > 0 && y < 0 && yy[i][j-1]-y > 0)
								y = y.lim(i,j,1,-1);
							else if (yy[i][j+1] < 0 && y > 0 && yy[i][j-1]-y < 0)
								y = y.lim(i,j,1,1);
						}
						else if (j-g_w && !isNum(yy[i][j+1]) && isNum(yy[i][j-1]))
							y = y.lim(i,j,1,(y-yy[i][j-1] > 0)? 1 : -1);
						else if (j && !isNum(yy[i][j-1]) && isNum(yy[i][j+1]))
							y = y.lim(i,j,-1,(y-yy[i][j+1] > 0)? 1 : -1);
						yy[i][j] = y;
					}
					if (!isNum(g_ya)) ya = Math.min(ya, y);
					if (!isNum(g_yz)) yz = Math.max(yz, y);
				}
			}
		}
	}
	catch (err)
	{
		alertErr(f.F, S_ERR_TERM);
		return;
	}
	if (!g_n)
	{
		g_yz = yz;
		g_ya = ya;
		var oldh = g_h;
		if (document.forms.fo.XYRATIO.checked)
		{
			g_dy = g_dx;
			var h = (g_yz-g_ya)/g_dy;
			if (h > 100*g_w)
			{
				if (g_ya < 0 && g_ya < -g_w*g_dy) g_ya *= 100*g_w/h;
				if (g_yz > 0 && g_yz > g_w*g_dy) g_yz *= 100*g_w/h;
			}
			if (h-1 < 0) g_ya -= g_dy;
			g_h = Math.round((g_yz-g_ya)/g_dy);
		}
		else
		{
			if (!(g_yz-g_ya))
			{
				g_ya -= (g_xz-g_xa)/2;
				g_yz += (g_xz-g_xa)/2;
			}
			g_h = g_w;
			g_dy = (g_yz-g_ya)/g_h;
		}
		if (oldh != g_h) resizeCnv();
		mkScale();
	}
	var termhtm = '', ci = 0, x;
	//var t0 = (new Date()).getTime();
	for (i = 0; i < g_term.length; i++)
	{
		var c = '#' + GRAPHCOLOR[(ci++)%GRAPHCOLOR.length];
		var tp, bot;
		var ox = g_w+1;
		var oy = '';
		var ny = (isNum(yy[i][g_w]))? scaleY(yy[i][g_w]) : '';
		x = g_w+1; while (x--)
		{
			y = ny;
			ny = (x && isNum(yy[i][x-1]))? scaleY(yy[i][x-1]) : '';
			if (isNum(y))
			{
				if (!isNum(oy)) oy = y;
				if (!isNum(ny))
				{
					if (ox-x-1 || !(oy-y))
					{
						tp = y;
						bot = y+1;
					}
					else if (oy-y < 0)
					{
						tp = oy;
						bot = y+1;
					}
					else
					{
						tp = y;
						bot = oy;
					}
					g_htm += mkDiv('', '', x, tp, ox-x, bot-tp, c, '', false, true);
					ox = x;
					oy = '';
				}
				else if (ny-y > 0)
				{
					if (ox-x-1)
					{
						bot = y+1;
						tp = y;
					}
					else if ((oy-y > 0 || !(oy-y) && y < 0) && ny > oy && (isNum(yy[i][x-2])? yy[i][x-2]-yy[i][x-1] >= 0 : true))
					{
						tp = y;
						bot = !isNum(yy[i][x+1])? ny : oy;
					}
					else
					{
						if (isNum(yy[i][x-2]) && scaleY(yy[i][x-2])-ny <= 0) bot = ny;
						else bot = y+Math.round((ny-y)/2);
						tp = (oy-y > 0)? y : oy;
					}
					g_htm += mkDiv('', '', x, tp, ox-x, bot-tp, c, '', false, true);
					oy = bot;
					ox = x;
				}
				else if (ny-y < 0)
				{
					if (ox-x-1)
					{
						tp = y;
						bot = y+1;
					}
					else if ((oy-y < 0 || !(oy-y) && y-g_h > 0) && ny < oy)
					{
						tp = !isNum(yy[i][x+1])? ny+1 : oy;
						bot = y+1;
					}
					else
					{
						if (isNum(yy[i][x-2]) && scaleY(yy[i][x-2])-ny >= 0) tp = ny+1;
						else tp = y-Math.floor((y-ny)/2);
						bot = (oy-y <= 0)? y+1 : oy;
					}
					g_htm += mkDiv('', '', x, tp, ox-x, bot-tp, c, '', false, true);
					oy = tp;
					ox = x;
				}
			}
			else
			{
				oy = '';
				ox = x;
			}
		}
		//term[i] = g_term[i];
		termhtm += ('<small style="color:' + c + '"><b>' + term[i].replace(/random\(\)/g,'rand').replace(/pow/g,'p').replace(/log\(/g,'ln(').replace(/rt\(/g,'r(').replace(/RT/g,'R') + '<\/b><\/small><br>');
		g_n ++;
	}
	paint(g_cnv, g_htm, true);
	//alert((new Date()).getTime()-t0);
	paint(g_termlyr, termhtm, true);
	if (!g_coordtip) initCoordtip();
}


function coordTip(e)
{
	if (g_wait) return;
	g_wait = 1;
	setTimeout('g_wait = 0;', 1);
	var x = (e = e || window.event).pageX || e.clientX || 0,
	y = e.pageY || e.clientY || 0;
	if (g_ie || g_kq)
	{
		x += g_db.scrollLeft-(g_ie && !g_iemac)*2;
		y += g_db.scrollTop-(g_ie && !g_iemac)*2;
	}
	if (x-g_pageX >= 0 && x-g_pageX-g_w <= 0 && y-g_pageY >= 0 && y-g_pageY-g_h <= 0)
	{
		g_coordtip.style.left = (x+16)+'px';
		g_coordtip.style.top = (y-12)+'px';
		paint(g_coordtip,
			'<small style="background:'+CNVCOLOR+';white-space:nowrap;">x = '+
			mkNumStr(x-g_pageX+Math.round(g_xa/g_dx), g_dx)+'&nbsp;<br>y = '+
			mkNumStr(g_h-y+g_pageY+Math.round(g_ya/g_dy), g_dy)+'&nbsp;<\/small>',
			false
		);
		if (g_coordtip.style.visibility == 'hidden') g_coordtip.style.visibility = 'visible';
	}
	else g_coordtip.style.visibility = 'hidden';
}


document.write(g_ie? gReplace(mkDiv('', '', 0, 0, 0, 0, '', 'coordtip', true)) : mkDiv('', '', 0, 0, 0, 0, '', 'coordtip', true));
window.onload = init;
