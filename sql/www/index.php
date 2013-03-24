<? header('Content-type: text/html; charset=utf-8');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="SQL запросы online, Запросы SQL online, SQL, запросы sql, обучение sql, обучение sql онлайн, online, запрос выборки, запрос удаления, запрос изменения, запрос обновления, данных из таблицы, создание таблицы, обучение, скачать справочник по sql, mysql, выполнение sql запросов, запись запросов, онлайн справочник, по sql, ыйд, SQL запросы в режиме online, Shapovalov A.A., обучающее веб приложение, SQL запросы online, оператор SELECT, оператор INSERT, оператор UPDATE, оператор DELETE, оператор ALTER TABLE, оператор CREATE" />
<meta name="description" content="На данном ресурсе вы можете выполнять SQL запросы в режиме online. Ваши запросы будут интерпретированны, результат запроса выведется на экран, иначе отобразится допущенная вами ошибка в написании запроса с соответствующими пояснениями. Вы с легкостью сможете овладеть языком SQL, узнать синтаксис и правила написания различных типов запросов: на выборку, на вывод, на удаление, на создание таблицы и т.п." />
<title><? 
		if(!isset($_POST['history']))
		{
		if(isset($_GET['type']))
		{
			
		if($_GET['type']==1)
		{
               echo "Оператор INSERT";
		}
		
		if($_GET['type']==2)
		{
               echo "Оператор SELECT";
		}
		
		if($_GET['type']==3)
		{
               echo "Оператор DELETE";
		}
		
		if($_GET['type']==4)
		{
               echo "Оператор CREATE";
		}
		
		if($_GET['type']==5)
		{
               echo "Оператор UPDATE";
		}
		
		
		
		if($_GET['type']==6)
		{
               echo "Оператор ALTER TABLE";
		}
		}
		
		else
		{
               echo "SQL запросы online";
		}
		}
		else
		{
			echo "О языке SQL";
		}
?>
</title>
<style type="text/css">
<!--
body {
	font: 100%/1.3 Verdana, Arial, Helvetica, sans-serif;
	background: #EEE;
	margin: 0;
	padding: 0;
	color:#5E5E5E;
}

a img {
 opacity:0.3; -moz-opacity:0.3; filter:alpha(opacity=40); border: none;
 }

a:hover img {
 opacity:1.0; -moz-opacity:1.0; filter:alpha(opacity=100);
 }

/* ~~ Селекторы элементов/тегов ~~ */
ul, ol, dl { /* Из-за различий между браузерами рекомендуется обнулять поля в списках. Для согласованности можно указать нужные величины либо здесь, либо в элементах списка (LI, DT, DD), которые они содержат. Помните, что сделанное здесь последовательно включается в список .nav, если только не будет прописан более конкретный селектор. */
	padding: 0;
	margin: 0;
}
h1, h2, h3, h4, h5, h6 {
	margin-top: 0;	 /* удаление верхнего поля позволяет обойти проблему выхода полей за границы содержащего их контейнера DIV. Оставшееся нижнее поле отделит его от любых последующих элементов. */
	padding-right: 15px;
	color:#CBCBCB;
	padding-left: 15px; /* добавление боковых полей к элементам внутри контейнеров DIV, а не к самим контейнерам избавляет от необходимости расчетов рамочной модели. В качестве альтернативы можно использовать вложенный контейнер DIV с боковыми полями. */
}
p {
	margin-top: 0;	 /* удаление верхнего поля позволяет обойти проблему выхода полей за границы содержащего их контейнера DIV. Оставшееся нижнее поле отделит его от любых последующих элементов. */
	padding-right: 15px;
	padding-left: 15px; /* добавление боковых полей к элементам внутри контейнеров DIV, а не к самим контейнерам избавляет от необходимости расчетов рамочной модели. В качестве альтернативы можно использовать вложенный контейнер DIV с боковыми полями. */
}

/* ~~ Оформление ссылок на вашем сайте должно оставаться в этом порядке, включая группу селекторов, создающих эффект наведения. ~~ */
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

/* ~~ этот контейнер окружает все остальные контейнеры DIV, задавая их ширину на процентной основе ~~ */
.container {
	width: 80%;
	max-width: 1260px;/* желательно задать максимальную ширину, чтобы макет не стал слишком широким на большом экране. Это повышает удобство чтения строк. В IE6 это объявление не соблюдается. */
	min-width: 780px;/* желательно задать минимальную ширину, чтобы макет не стал слишком узким. Это повышает удобство чтения строк в боковых столбцах. В IE6 это объявление не соблюдается. */
	background: #FFF;
	margin: 0 auto; /* автоматическое задание величин по бокам в совокупности с шириной центрирует макет. Это необязательно, если ширина контейнера составляет 100 %. */
}

/* ~~верхнему колонтитулу не задана ширина. Он растянется по всей ширине макета. Он содержит заполнитель для изображения, который должен быть заменен логотипом по ссылке~~ */
.header {
	background: #CCCCCC;
}

/* ~~ Информация по макету. ~~ 

1) Поля размещены только вверху и/или внизу DIV. Элементы в этом DIV имеют боковые поля. Это избавляет пользователя от необходимости расчетов рамочной модели. Помните, что при добавлении боковых полей или границы к самому DIV их ширина будет добавлена к задаваемой ширине, что образует "полную" ширину. Кроме того, можно удалить поля элемента в DIV и поместить внутри него второй DIV без ширины и с необходимыми по проекту полями.

*/
.content {
	padding: 10px 0;
}

/* ~~ Этот сгруппированный селектор выдает списки в пространстве .content ~~ */
.content ul, .content ol { 
	padding: 0 15px 15px 40px; /* это поле зеркально повторяет правое поле в правиле для заголовков и параграфов выше. Внизу поле помещено как граница между элементами списков, а слева — как отступ. Поля можно настраивать по желанию. */
}

/* ~~ Нижний колонтитул ~~ */
.footer {
	padding: 0px;
	background: #CCCCCC;
	text-align:center;
}

/* ~~ прочие классы float/clear ~~ */
.fltrt {  /* этот класс можно использовать для обтекания элемента справа на странице. Обтекаемый элемент должен предшествовать элементу, с которым он должен находиться рядом на странице. */
	float: right;
	margin-left: 8px;
}
.fltlft { /* этот класс можно использовать для обтекания элемента слева на странице. Обтекаемый элемент должен предшествовать элементу, с которым он должен находиться рядом на странице. */
	float: left;
	margin-right: 8px;
}

.headers
{
 opacity:1; -moz-opacity:1; filter:alpha(opacity=100); border: none;
}


.clearfloat { /* этот класс можно поместить в теге <br /> или в пустом блоке DIV в качестве конечного элемента, следующего за последним обтекаемым DIV (внутри #container), если .#footer удален или извлечен из #container */
	clear:both;
	height:0;
	font-size: 1px;
	line-height: 0px;
}
-->
</style>

</head>

<body>

<div class="container">
  <div class="header" align="center"><a href="index.php"><img class="headers" src="name.png" alt="SQL" name="logo" width="779" height="120" id="Insert_logo" style="background: #CCCCCC; display:block;" /></a>

    <!-- end .header --></div>
  <div class="content">
<center>
    <?
	//sql history
	
	if(isset($_POST['history']))
	{
		echo "<h2 style='color:#C3C3C3'>О языке SQL</h2>
    </center>
    <br>
<UL>
<LI><B><A href='#name1'>История развития языка SQL</A></B></LI>
<LI><B><A href='#name2'>Некоторые правила использования языка SQL</A></B></LI>
<LI><B><A href='#name3'>Достоинства и недостатки SQL</A></B></LI>
</UL>

<P ALIGN='CENTER'><A NAME=name1><B>1. История развития языка SQL</A></B></P>
<P ALIGN='JUSTIFY'>Ниже тезисно приведены основные вехи истории развития SQL.</P>
<P ALIGN='JUSTIFY'>Работа была начата сразу после появления статью Э.Кодда в 1970г. в лабораториях компании IBM для проверки возможностей реляционной модели.</P>
<P ALIGN='CENTER'><IMG class='headers' SRC='p1.gif'></P>
<P ALIGN='JUSTIFY'><B>СУБД System R</B> - экспериментальная исследовательская система с языком <B>SEQUEL</B> (позже <B>SQL</B>), созданная IBM:</P>
<UL>
<LI>Полный реляционный язык БД</LI>
<LI>Операторы манипулирования БД</LI>
<LI>Средства определения и манипулирования схемой БД</LI>
<LI>Определение ограничений целостности</LI>
<LI>Определение представлений</LI>
<LI>Определение индексов</LI>
<LI>Авторизация доступа к отношениям и их полям</LI>
<LI>Точки сохранения транзакций и откаты</LI>
</UL>
<P ALIGN='JUSTIFY'><B>SQL в коммерческих реализациях:</B></P>
<P ALIGN='JUSTIFY'>1979 - Oracle (Relation Software Inc.- Oracle corp.;</P>
<P>1981-1982 - DB2 (IBM), Ingres - CA-OpenIngres (Relation Technology Inc. - Computer Associates)</P>
<P ALIGN='JUSTIFY'>1984 - Informix (Informix Sofrware);</P>
<P ALIGN='JUSTIFY'>1986 - Sybase (Sybase Corp.)</P>
<UL>
<LI>Реализован во всех коммерческих реляционных СУБД</LI>
<LI>Все фирмы провозглашают соответствие стандарту SQL</LI>
<LI>Реализованные диалекты очень близки</LI>
<LI>Путь 'сверху вниз' - уточнение и упрощение SQL System R</LI>
<LI>Путь 'снизу вверх' - от диалектов реализации различных фирм (наращивание возможностей, обычное отсутствие полного описания языка)</LI>
</UL>
<P ALIGN='JUSTIFY'><B>Стандартизация SQL:</B></P>
<UL>
<LI>Все фирмы провозглашают соответствие стандарту SQL</LI>
<LI>Реализованные диалекты очень близки</LI>
<LI>Деятельность началась одновременно с появлением первых коммерческих реализаций</LI>
<LI>В качестве стандарта нельзя было использовать SQL System R(не было технической проработки, слишком сложно реализовать)</LI>
<LI>Нельзя было принять за стандарт коммерческий диалект (слишком различались)</LI>
</UL>
<P ALIGN='JUSTIFY'><B>Международный стандарт 1989 г.</B></P>
<UL>
<LI>Во многих частях имеет чрезвычайно общий характер и допускает очень широкое толкование</LI>
<LI>Отсутствуют важные разделы (манипулирование схемой БД, динамический SQL, многое определяется в реализации)</LI>
<LI>Наибольшие достижения (стандартизация синтаксиса и семантики операторов выборки и манипулирования данными, фиксация средств ограничений целостности БД:определение первичного и внешнего ключей отношений, проверочные ограничения целостности)</LI>
</UL>
<P ALIGN='JUSTIFY'><B>Международный стандарт 1992 г.(SQL2)</B></P>
<UL>
<LI>Расширено манипулирование таблицами (Alter table, Drop table)</LI>
<LI>Манипулирование схемой БД (Users, Tables, Views, Columns, Domains, Table_priveleges, Table_constraints, , , )</LI>
<LI>Возможность управления доменами (Create domain имя char(25) . . .и при определении имен столбцов эти имена определяются через имена доменов)</LI>
<LI>Новые типы данных (Date, Time, Datetime, . . .) и новые функции</LI>
<LI>Управление транзакциями и сессиями (сессия - последовательность транзакций, в пределах которой сохраняются временные отношения)</LI>
<LI>Подключение к БД</LI>
<LI>Развитие динамического SQL</LI>
</UL>
<P ALIGN='JUSTIFY'>В 1995 г. стандарт был дополнен спецификацией интерфейса уровня вызова (Call-Level Interface - SQL/CLI). SQL/CLI представляет собой набор спецификаций интерфейсов процедур, вызовы которых позволяют выполнять динамически задаваемые операторы SQL. По сути дела, SQL/CLI представляет собой альтернативу динамическому SQL и послужил основой для создания повсеместно распространенных сегодня интерфейсов ODBC (Open Database Connectivity) и JDBC (Java Database Connectivity).</P>
<P ALIGN='JUSTIFY'>В 1996 г. к стандарту SQL/92 был добавлен еще один компонент - SQL/PSM (Persistent Stored Modules). Основная цель этой спецификации состоит в том, чтобы стандартизировать способы определения и использования хранимых процедур, т. е. специальным образом оформленных программ, включающих операторы SQL, которые сохраняются в базе данных, могут вызываться приложениями и выполняются внутри СУБД.</P>
<P ALIGN='JUSTIFY'><B>Стандарт SQL:1999 (SQL3)</B></P>
<P ALIGN='JUSTIFY'>Незадолго до завершения работ по определению стандарта SQL2 была начата разработка стандарта SQL3. Реально работу над новым стандартом удалось частично завершить только в 1999 г., и по этой причине (а также в связи с проблемой 2000 года) стандарт получил название SQL:1999.</P>
<P ALIGN='JUSTIFY'>1999 г. были приняты пять первых частей стандарта SQL:1999. Первая часть (SQL/Framework) посвящена описанию концептуальной структуры стандарта: приводится развернутая аннотация следующих четырех частей.</P>
<P ALIGN='JUSTIFY'>Вторая часть SQL:1999 (SQL/Foundation) образует базис стандарта. Вводится система типов языка, формулируются правила определения функциональных зависимостей и возможных ключей, определяются синтаксис и семантика основных операторов SQL: </P>
<UL>
<LI>операторов определения и манипулирования схемой базы данных;</LI>
<LI>операторов манипулирования данными;</LI>
<LI>операторов управления транзакциями (расширенные модели транзакций, контрольные точки, многозвенные транзакций);</LI>
<LI>операторов управления подключениями к базе данных и т. д.</LI>
</UL>
<P ALIGN='JUSTIFY'>Третью часть занимает уточненная по сравнению с SQL/92 спецификация SQL/CLI. В четвертой части специфицируется SQL/PSM - синтаксис и семантика языка определения хранимых процедур (стандарт синтаксиса триггеров и процедур). Наконец, в пятой части - SQL/Bindings - определяются правила связывания SQL для стандартных версий языков программирования FORTRAN, COBOL, PL/1, Pascal, Ada, C и MUMPS.</P>
<P ALIGN='JUSTIFY'>В стандарт SQL:1999 не вошли и существуют в виде отдельных стандартов:</P>
<UL>
<LI>стандарт управления распределенными транзакциями (SQL/Transaction);</LI>
<LI>стандарт поддержки темпоральных свойств данных (SQL/Temporal);</LI>
<LI>стандарт управления внешними данными (SQL/MED);</LI>
<LI>поддержка оперативной аналитической обработки (SQL/OLAP).</LI>
</UL>
<P ALIGN='JUSTIFY'>В конце 2003 г. был принят и опубликован новый вариант международного стандарта <B>SQL:2003</B>.</P>

<P ALIGN='CENTER'><A NAME=name2><B>2. Некоторые правила использования языка SQL</A></B></P>
<P ALIGN='JUSTIFY'>1. Хорошо знайте свои данные и бизнес-приложение</P>
<UL>
<LI>Знание источников и объемов получения данных.</LI>
<LI>Вы также должны полное понимание используемой модели данных (равно как и связей между разными бизнес-объектами) до написания требуемых операторов SQL. </LI>
</UL>
<P ALIGN='JUSTIFY'>2. Тестируйте свои запросы на реалистических данных. </P>
<P ALIGN='JUSTIFY'>3. Внимательно относитесь к использованию индексов на таблицах. </P>
<P ALIGN='JUSTIFY'>Постарайтесь создать все необходимые индексы. Создание индекса:</P>
<P ALIGN='JUSTIFY'><DIR><B><I>Create index <имя_индекса> on <имя_таблицы> (<имя_поля>,.. имя_поля>,..)</I></B></DIR></P>
<P ALIGN='JUSTIFY'>Создание индекса сводится к созданию набора данных, в котором указанные поля таблицы сортируются в соответствии с физическим расположением записи (rowid), что позволяет в последствии при поиске использовать бинарные и другие методы поиска.</P>
<P ALIGN='CENTER'><IMG class='headers' SRC='p2.gif'></P>
<P ALIGN=JUSTIFY'>Запрос</P>
<P ALIGN='JUSTIFY'><DIR><DIR><I><B>Select . . . from Persons where company_id=105</B></I></DIR></DIR></P>
<P ALIGN='JUSTIFY'>потребует незначительного времени, поскольку значения индексов в наборе данных будут искаться как минимум двоичным поиском.</P>
<P ALIGN='JUSTIFY'>Однако слишком большое число индексов может привести к снижению эффективности. Основные правила:</P>
<UL>
<LI>Создавайте индексы только в тех случаях, когда число строк > 200.</LI>
<LI>Создавайте индексы на столбцах, которые часто используются в разделе WHERE. </LI>
<LI>Индексируйте столбцы, часто используемые в операторах SQL для соединения таблиц. </LI>
<LI>Используйте для индексирования только те столбцы, в которые входит небольшой процент строк с одним и тем же значением. </LI>
<LI>Не индексируйте столбцы, которые используются только в функциях. </LI>
<LI>Не индексируйте часто изменяемые столбцы.</LI>
<LI>Не применяйте индексацию в тех случаях, когда повышение эффективности за счет создания индекса приводит к снижению эффективности при выполнении операций INSERT, UPDATE и DELETE, поскольку при выполнении каждой из отмеченных операций набор индексов будет перестраиваться.</LI>
<LI>В наиболее критических случаях с помощью ключевого слова Cluster  создается так называемый кластерный индекс, при котором записи в таблице физически переупорядочиваются в таблице.  </LI>
</UL>
<P ALIGN='JUSTIFY'>4. Для фильтрации записей используйте<I> WHERE</I>, а не<I> HAVING.</I> </P> 
<P ALIGN='JUSTIFY'>При использовании having вместе с group by на индексированных столбцах индекс не используется. Фильтруйте строки с помощью раздела where. Если для таблицы EMP существует индекс на столбце DEPTID, при выполнении следующего запроса этот индекс использоваться не будет: </P>
<P ALIGN='JUSTIFY'><DIR><DIR><I><B>SELECT DEPTID, SUM(SALARY)</P>
<P ALIGN='JUSTIFY'><DIR>FROM EMP</P>
<P ALIGN='JUSTIFY'><DIR>GROUP BY DEPTID </P>
<P ALIGN='JUSTIFY'>HAVING DEPTID = 100;</B></I></DIR></DIR></DIR></DIR></P>
<P ALIGN='JUSTIFY'>Однако этот запрос можно переписать так, чтобы индекс применялся: </P>
<P ALIGN='JUSTIFY'><DIR><DIR><I><B>SELECT DEPTID, SUM(SALARY)</P>
<P ALIGN='JUSTIFY'><DIR>FROM EMP</P>
<P ALIGN='JUSTIFY'><DIR>WHERE DEPTID = 100</P>
<P ALIGN='JUSTIFY'>OUP BY DEPTID;</B></I></DIR></DIR></DIR></DIR></P>
<P ALIGN='JUSTIFY'>5. Минимизируйте число просмотров таблиц </P>
<P ALIGN='JUSTIFY'>Запросы с меньшим числом просмотров таблиц - более быстрые запросы. Вот пример. Таблица STUDENT содержит четыре столбца с именами NAME, STATUS, PARENT_INCOME и SELF_INCOME. Имя является первичным ключом. Значение статус равно 0 для обучающихся по бюджету студентов и 1 - для контрактников. Форма запроса предполагает два просмотра таблицы STUDENT: </P>
<P ALIGN='JUSTIFY'><DIR><DIR><I><B>SELECT NAME, PARENT_INCOME</P>
<P ALIGN='JUSTIFY'><DIR>FROM STUDENT</P>
<P ALIGN='JUSTIFY'><DIR>WHERE STATUS = 1</P></DIR></DIR>
<P ALIGN='JUSTIFY'>UNION</P>
<P ALIGN='JUSTIFY'>SELECT NAME, SELF_INCOME</P>
<P ALIGN='JUSTIFY'><DIR>FROM STUDENT</P>
<P ALIGN='JUSTIFY'><DIR>WHERE STATUS = 0</B></I></DIR></DIR></DIR></DIR></P>
<P ALIGN='JUSTIFY'>Тот же самый результат будет получен при выполнении запроса с одним просмотром таблицы: </P>
<P ALIGN='JUSTIFY'><DIR><DIR><I><B>SELECT NAME, PARENT_INCOME * STATUS + SELF_INCOME * (1 - STATUS)</P>
<P ALIGN='JUSTIFY'><DIR>FROM STUDENT</B></I></DIR></DIR></DIR></P>
<P ALIGN='JUSTIFY'>6. Используйте специальные столбцы. </P>
<P ALIGN='JUSTIFY'>Помните, что доступ к строке по <I>ROWID</I> является самым быстрым. Вот пример оператора UPDATE, в котором используется сканирование по <I>ROWID</I>: </P>
<P ALIGN='JUSTIFY'><DIR><DIR><I><B>SELECT ROWID, SALARY</P>
<P ALIGN='JUSTIFY'><DIR>INTO TEMP_ROWID, TEMP_SALARY</P>
<P ALIGN='JUSTIFY'><DIR>FROM EMPLOYEE;</DIR></DIR></P>
<P ALIGN='JUSTIFY'>UPDATE EMPLOYEE</P>
<P ALIGN='JUSTIFY'><DIR>SET SALARY = TEMP_SALARY * 1.5</P>
<P ALIGN='JUSTIFY'><DIR>WHERE ROWID = TEMP_ROWID</B></I></DIR></DIR></DIR></DIR></P>
<P ALIGN='JUSTIFY'><b>Значение <I>ROWID</I> в базе данных не является константой, поэтому не задавайте явных значений ROWID в операторах SQL и приложениях.</b></P>
<P ALIGN='JUSTIFY'>7. Избыточность полезна. </P>
<P ALIGN='JUSTIFY'>Помещайте в раздел WHERE как можно больше информации. Например, если указан раздел </P>
<P ALIGN='JUSTIFY'><DIR><DIR><I><B>WHERE COL1 = COL2 AND COL1 = 10,</B></I></DIR></DIR> </P>
<P ALIGN='JUSTIFY'>оптимизатор сможет вывести, что COL2 = 10. </P>
<P ALIGN='JUSTIFY'>Но при задании раздела в форме </P>
<P ALIGN='JUSTIFY'><DIR><DIR><I><B>WHERE COL1 = COL2 AND COL2 = COL3,</B></I></DIR></DIR> </P>
<P ALIGN='JUSTIFY'>оптимизатор не будет считать, что COL1 = COL3.</P>
<P ALIGN='JUSTIFY'>8. Где возможно, избегайте использования соединений</P>
<P ALIGN='JUSTIFY'>Пример. Найти всех сотрудников некоторой организации</P>
<P ALIGN='JUSTIFY'><DIR><DIR><I><B>Select lname, fname from Persons, Companies</P>
<P ALIGN='JUSTIFY'><DIR>Where Persons.company=Companies.Company_id</P>
<P ALIGN='JUSTIFY'>And Company.name='Sony'</B></I></DIR></DIR></DIR></P>
<P ALIGN='JUSTIFY'>При условии: Persons - N (1000) строк, Companies -M (100) строк портребуется проверка N*M строк (1 000 000) </P>
<P ALIGN='JUSTIFY'Более оптимальный запрос по времени поиска></P>
<P ALIGN='JUSTIFY'><DIR><DIR><I><B>Select lname, fname from Persons, Companies</P>
<P ALIGN='JUSTIFY'><DIR>Where Persons.company in</P>
<P ALIGN='JUSTIFY'><DIR>(Select company_id from Companies</P>
<P ALIGN='JUSTIFY'><DIR>where Company.name='Sony'</B></I></DIR></DIR></DIR></DIR></DIR></P>
<P ALIGN='JUSTIFY'>потребует проверки N+M строк (1100). </P>
<P ALIGN='JUSTIFY'>9. Если это неизбежно, соединяйте таблицы в правильном порядке. </P>
<P ALIGN='JUSTIFY'>Порядок соединения таблиц в запросах с соединениями нескольких таблиц имеет критическое значение. Всегда следует выполнять сначала максимально ограничивающий поиск, чтобы отфильтровать как можно большее число строк на ранних фазах выполнения запроса с соединениями. Тогда на следующих фазах соединения оптимизатору придется иметь дело с меньшим числом строк, что повысит эффективность. <B>Следует убедиться, что главная таблица (просматриваемая во внешнем цикле соединения на основе вложенных циклов) содержит наименьшее число строк.</B></P>
<P ALIGN='JUSTIFY'>10. Поскольку не всегда можно заменить запрос с соединением на более простой, как в п.7 зачастую выгоднее разбить сложный запрос на несколько простых с использованием, возможно, временных таблиц.</P>
<P ALIGN='JUSTIFY'>11. Старайтесь писать как можно более простые и тупые операторы SQL.</P> 
<P ALIGN='JUSTIFY'>Оптимизатор может не справиться со слишком сложными операторами SQL; иногда написание нескольких более простых операторов позволяет добиться лучшей эффективности, чем задание одного сложного оператора. Основанный на оценках на оценках оптимизатор СУБД  не является абсолютно устойчивым.</P>

<P ALIGN='CENTER'><A NAME=name3><B>3. Достоинства и недостатки SQL</A></B></P>
<P ALIGN='JUSTIFY'><B>Достоинства:</B></P>
<UL>
<LI>Повсеместная распространенность</LI>
<LI>Быстрое обучение в простых случаях</LI>
<LI>Связывание с различными языками программирования</LI>
<LI>Поддержка ODBC и JDBC</LI>
<LI>Фактор времени: научились хорошо реализовывать.</LI>
</UL>
<P ALIGN='JUSTIFY'><B>Недостатки:</B></P>
<UL>
<LI>Несоответствие реляционной модели данных (наличие дубликатов, необязательность первичного ключа, возможность упорядочения результатов)</LI>
<LI>Недостаточно продуманный механизм неопределенных значений</LI>
<LI>Сложность формулировок и громоздкость.</LI>
</UL>
<p align='right'><br><< <a style='style='color:#C3C3C3; margin-bottom:13px;' href='index.php'><b><em>К выбору типа запроса</em></b></a></p>
";
		echo"<hr />
   <center><p><a style='text-decoration:none; color:#C3C3C3; font-family:Comic Sans MS, cursive'; href='sql.zip'>Скачать справочники по SQL</a></p>
</center><center>"; 

include("stat.html");

echo"</center>
</div>
  <div class='footer'>
    <center>
    <p style='color:#E7E7E7;'><strong>SQL запросы online </strong><strong>&copy; </strong>  <em>v0.9</em> <em><a style='color:#EFEFEF; text-decoration:none;' href='mailto:mail@shapovalov.org'>Шаповалов А.А.</a></em></p>
</center>
    <!-- end .footer --></div>
  <!-- end .container --></div>
</body>
</html>";
exit();
	}
	//инструкции по умолчанию
		if(!isset($_GET['type']))
		{
			echo "<h2 style='color:#C3C3C3'>Описание</h2>
    </center>
	<form align='right' style='margin-right:10px; margin-top:-10px; margin-bottom:5px;' name='frm' method='post' action='index.php'>
	&nbsp;&nbsp;<input align='right' style='background-color:white; color:#C3C3C3; font-weight:bold; margin-top:0px; font-size:13px; font-family: Tahoma' name='history' type='submit' value=' О языке SQL ' /></form>
    <p style='font-size:11px;'>Данное веб-приложение поможет Вам в изучении комманд языка <b>SQL</b>. Для начала выберите тип исполняемого запроса...<br><br>-> <em>Следите за количеством человек прибывающих в данный момент на ресурсе, т.к. некоторые из них могут внести нежелательные изменения, либо обнулить созданные Вами таблицы, вернув базу данных в исходное состояние... </em></p>
    <p><br /><hr />&nbsp;</p>
	";
		}
		// инструкции по оператору выборки
		if(isset($_GET['type']) and $_GET['type']==2)
		{
			echo "<h2 style='color:#C3C3C3'>Инструкции по выборке данных</h2>
    </center>
    <div style='font-size:12px;'>&nbsp;&nbsp;&nbsp;<u>Формат запроса с использованием оператора выборки SELECT:</u><br><br><center>

<b>SELECT</b> <i>список полей</i> <b>FROM</b> <i>список таблиц</i> <b>WHERE</b> <i>условия</i><br><br>
</center>
&nbsp;&nbsp;&nbsp;<u>Пояснение:</u><br><center><br>
<b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SELECT</b> — оператор языка <em>SQL</em>, возвращающий набор данных (выборку) из базы данных, удовлетворяющих<br> заданному условию. В большинстве случаев, выборка осуществляется из одной или нескольких таблиц<br><br></center>
&nbsp;&nbsp;&nbsp;<u>Основные сопутствующие команды, относящиеся к запросу:</u><br><center><br>
<em>WHERE</em> — используется для определения, какие строки должны быть выбраны или включены в GROUP BY;<br>
<em>GROUP BY</em> — используется для объединения строк с общими значениями в элементы меньшего набора строк;<br>
<em>HAVING</em> — используется для определения, какие строки после GROUP BY должны быть выбраны;<br>
<em>ORDER BY</em> — используется для определения, какие столбцы используются для сортировки результирующего набора данных;
</center><br><br /><hr />&nbsp;</div>";
		}
		
		// инструкции по оператору вставки
		if(isset($_GET['type']) and $_GET['type']==1)
		{
			echo "<h2 style='color:#C3C3C3'>Инструкции по оператору вставки данных</h2>
    </center>
    <div style='font-size:12px;'>&nbsp;&nbsp;&nbsp;<u>Формат запроса с использованием оператора вставки INSERT:</u><br><br><center>
<b>INSERT INTO</b> <i>название таблицы ('имя столбца'...)</i> <b>VALUES</b> <i>('значение'...)</i><br><br>
</center>
&nbsp;&nbsp;&nbsp;<u>Используя оператор SELECT:</u><br><center><br>
<center>

<b>INSERT INTO</b> <i>название таблицы</i> <b>SELECT</b> <i>имя столбца</i> <b>FROM</b> <i>название таблицы</i><br><br>
</center></center>
&nbsp;&nbsp;&nbsp;<u>Пояснение:</u><br><center><br>
&nbsp;&nbsp;&nbsp;<b>INSERT</b> — оператор языка SQL, который позволяет добавить строки в таблицу, заполняя их значениями. Значения можно вставлять перечислением с помощью слова <em>values</em> и перечислив их в круглых скобках через запятую или оператором <em>select</em>.
</center><br><br /><hr />&nbsp;</div>";
		}
		
		// инструкции по оператору удаления
		if(isset($_GET['type']) and $_GET['type']==3)
		{
			echo "<h2 style='color:#C3C3C3'>Инструкции по оператору удаления данных</h2>
    </center>
    <div style='font-size:12px;'>&nbsp;&nbsp;&nbsp;<u>Формат запроса с использованием оператора удаления DELETE:</u><br><br><center>
<b>DELETE FROM</b> <i>имя таблицы</i> <b>WHERE</b> <i>условие отбора записей</i><br><br>
</center>
&nbsp;&nbsp;&nbsp;<u>Удаление записей из нескольких таблиц:</u><br><center><br>
<center>

<b>DELETE</b> <i>имя записи для удаления</i> <b>FROM</b> <i>имя таблицы_1</i> <b>JOIN</b> <i>имя таблицы_2</i> <b>ON</b> <i>условие объединения</i><br><br>
</center></center>
&nbsp;&nbsp;&nbsp;<u>Пояснение:</u><br><center><br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>DELETE</b> — в языке SQL операция удаления записей из таблицы. Критерий отбора записей для удаления определяется выражением <em>WHERE</em>. В случае, если критерий отбора не определён, выполняется удаление всех записей<br><br>
</center><br>

<hr />&nbsp;</div>";
		}
     
	 // инструкции по оператору обновления
		if(isset($_GET['type']) and $_GET['type']==5)
		{
			echo "<h2 style='color:#C3C3C3'>Инструкции по оператору обновления данных</h2>
    </center>
    <div style='font-size:12px;'>&nbsp;&nbsp;&nbsp;<u>Формат запроса с использованием оператора обновления UPDATE:</u><br><br><center>
<b>UPDATE</b> <i>имя таблицы</i> <b>SET</b> <i>имя поля = 'значение'...</i> <b>WHERE</b> <i>условия</i><br><br>
</center>
&nbsp;&nbsp;&nbsp;<u>Пояснение:</u><br><center><br>
<center>

<b>UPDATE</b> — оператор языка SQL, позволяющий обновить значения в заданных столбцах таблицы<br><br>
</center><br>
<hr />&nbsp;</div>";
		}
    
     // инструкции по оператору create
		if(isset($_GET['type']) and $_GET['type']==4)
		{
			echo "<h2 style='color:#C3C3C3'>Инструкции по оператору создания объекта</h2>
    </center>
    <div style='font-size:12px;'>&nbsp;&nbsp;&nbsp;<u>Формат запроса с использованием оператора создания CREATE:</u><br><br><center>
<b>CREATE</b> <em><b>тип создаваемого объекта</b></em> <i>имя объекта</i> <i>параметры и условия...</i><br><br>
</center>
&nbsp;&nbsp;&nbsp;<u>Пояснение:</u><br><center><br>
<center>

<b>CREATE</b> — оператор языка <em>SQL</em> используемый для создания объектов базы данных (<em>таблиц, баз данных...</em>)<br><br>
</center><br>
<hr />&nbsp;</div>";
		}
		
		// инструкции по оператору alter
		if(isset($_GET['type']) and $_GET['type']==6)
		{
			echo "<h2 style='color:#C3C3C3'>Инструкции по оператору изменения таблицы</h2>
    </center>
    <div style='font-size:12px;'>&nbsp;&nbsp;&nbsp;<u>Формат запроса с использованием оператора изменения ALTER TABLE:</u><br><br><center>

<b>ALTER TABLE</b> <em>имя таблицы</em> <i>параметр</i> <i>`значение`</i><br><br>
</center>
&nbsp;&nbsp;&nbsp;<u>Пояснение:</u><br><center><br>
<center>

<strong>ALTER TABLE</strong> - комманда языка <em>SQL</em> предназначенная для изменения определения таблицы. <em>ALTER TABLE</em> работает с временно созданной таблицей в которую копирует все данные из текущей таблицы.<br><br>
</center><br>
<hr />&nbsp;</div>";
		}
    
	
	// если не выбран тип запроса
	if(!isset($_GET['type']) or $_GET['type']>6 or !is_numeric($_GET['type']))
	{
	echo "<p><strong>Выберите тип запроса:</strong></p>
    <center>
   <p style='font-size:20px; font-weight:bold; font-family:'Comic Sans MS', cursive'>
   <a style='color:#C3C3C3; margin-bottom:13px;' href='index.php?type=2'>Вывод данных</a><br />
   <a style='color:#C3C3C3; margin-bottom:13px;' href='index.php?type=1'>Вставка данных</a><br />
   <a style='color:#C3C3C3; margin-bottom:13px;' href='index.php?type=3'>Удаление данных</a><br />
   <a style='color:#C3C3C3; margin-bottom:13px;' href='index.php?type=4'>Создание объекта</a><br />
   <a style='color:#C3C3C3;' href='index.php?type=6'>Изменение таблицы</a><br>
   <a style='color:#C3C3C3;' href='index.php?type=5'>Обновление данных</a></p>
    </center>";
	}
	
	// вывод данных
	if($_GET['type']==2)
	{
	echo "
	<p><strong>Введите запрос:</strong></p>
    <form id='form1' name='form1' method='post' action='query.php'>
   <center><p><textarea name='query' cols='87' rows='6' maxlength='5000'>SELECT * FROM persons</textarea>
    &nbsp;
     <br><br><input style='font-weight:bold;' name='submit' type='submit' value='Выполнить' />
    </p></center>
    <p><em>Таблица <strong>persons</strong> изначально содержит поля <strong>id, name, last_name, tel, address, gender</strong></em>
	<center><input style='background-color:white; color:darkgrey; font-style:italic; margin-top:0px; font-size:13px;' name='rescue' type='submit' value='Восстановить исходное состояние базы данных' /></center>
    <p>    
    </form>
	<hr><br>
	<p><strong>Пример запроса для вывода данных:</strong><br><br>

<em>SELECT * FROM persons WHERE name='Александр' ORDER BY id DESC</em></p>";
	}
	
	// вставка данных
	if($_GET['type']==1)
	{
		echo "
		<p><strong>Введите запрос:</strong></p>
    <form id='form' name='form' method='post' action='query.php'>
   <center><p><textarea name='query' cols='87' rows='6' maxlength='5000'>INSERT INTO persons (`id`, `name`, `last_name`, `tel`, `address`, `gender`) VALUES ('14', 'Карина', 'Калашникова', '66-67-77', 'г. Бишкек ул. Ленинградская д. 81', 'жен.')</textarea> &nbsp;
    <br><br><input style='font-weight:bold;' name='insrt' type='submit' value='Выполнить' /> <br /> 
    </p></center>
    <p><em>Таблица <strong>persons</strong> изначально содержит поля <strong>id, name, last_name, tel, address, gender</strong></em>
	<center><input style='background-color:white; color:darkgrey; font-style:italic; margin-top:0px; font-size:13px;' name='rescue' type='submit' value='Восстановить исходное состояние базы данных' /></center>
    <p>    
    </form>
	<hr><br>
	<p><strong>Пример запроса для вставки данных:</strong><br><br>

<em>INSERT INTO persons (`id`, `name`, `last_name`, `tel`, `address`, `gender`) VALUES ('14', 'Карина', 'Калашникова', '0312 66-67-77', 'г. Бишкек ул. Ленинградская д. 81', 'жен.')</em></p>";
	}
	
	// удаление данных
	if($_GET['type']==3)
	{
		echo"
		<p><strong>Введите запрос:</strong></p>
    <form id='form' name='form' method='post' action='query.php'>
   <center><p><textarea name='query' cols='87' rows='6' maxlength='5000'>DELETE FROM persons WHERE id = 13</textarea> &nbsp;
    <br><br><input style='font-weight:bold;' name='del' type='submit' value='Выполнить' /> 
    </p></center>
    <p><em>Таблица <strong>persons</strong> изначально содержит поля <strong>id, name, last_name, tel, address, gender</strong></em>
	<center><input style='background-color:white; color:darkgrey; font-style:italic; margin-top:0px; font-size:13px;' name='rescue' type='submit' value='Восстановить исходное состояние базы данных' /></center>
    <p>    
    </form>
	<hr><br>
	<p><strong>Пример запроса на удаления данных:</strong><br><br>

<em>DELETE FROM persons WHERE id = 13</em></p>";
	
	}
    
	// создание объекта
	if($_GET['type']==4)
	{
		echo"
		<p><strong>Введите запрос:</strong></p>
    <form id='form' name='form' method='post' action='query.php'>
   <center><p><textarea name='query' cols='87' rows='6' maxlength='5000'>CREATE TABLE IF NOT EXISTS `students` (
`id` int(5) NOT NULL AUTO_INCREMENT,`fio` varchar(255) NOT NULL,`group` varchar(200) NOT NULL,`kurs` int(35) NOT NULL,
`address` varchar(255) NOT NULL,`tel` varchar(30) NOT NULL,PRIMARY KEY (`id`)) DEFAULT CHARSET=utf8</textarea> &nbsp;
   <br> <br><input style='font-weight:bold;' name='create' type='submit' value='Выполнить' /> 
    </p></center>
    <p><em>Таблица <strong>persons</strong> изначально содержит поля <strong>id, name, last_name, tel, address, gender</strong></em>
	<center><input style='background-color:white; color:darkgrey; font-style:italic; margin-top:0px; font-size:13px;' name='rescue' type='submit' value='Восстановить исходное состояние базы данных' /></center>
    <p>    
    </form>
	<hr><br>
	<p><strong>Пример запроса для создания таблицы:</strong><br><br>

<em>CREATE TABLE IF NOT EXISTS `students` (
`id` int(5) NOT NULL AUTO_INCREMENT,
`fio` varchar(255) NOT NULL,
`group` varchar(200) NOT NULL,
`kurs` int(35) NOT NULL,
`address` varchar(255) NOT NULL,
`tel` varchar(30) NOT NULL,
PRIMARY KEY (`id`)
)   DEFAULT CHARSET=utf8 </em></p>";
	
	}
	
	// обновление данных
	if($_GET['type']==5)
	{
		echo"
		<p><strong>Введите запрос:</strong></p>
    <form id='form' name='form' method='post' action='query.php'>
   <center><p><textarea name='query' cols='87' rows='6' maxlength='5000'>UPDATE persons SET name = 'Роджер', last_name = 'Пенроуз' WHERE id= 9</textarea> &nbsp;
  <br>  <br><input style='font-weight:bold;' name='update' type='submit' value='Выполнить' /> 
    </p></center>
    <p><em>Таблица <strong>persons</strong> изначально содержит поля <strong>id, name, last_name, tel, address, gender</strong></em>
	<center><input style='background-color:white; color:darkgrey; font-style:italic; margin-top:0px; font-size:13px;' name='rescue' type='submit' value='Восстановить исходное состояние базы данных' /></center>
    <p>    
    </form>
	<hr><br>
	<p><strong>Пример запроса на обновления данных:</strong><br><br>

<em>UPDATE persons SET name = 'Роджер', last_name = 'Пенроуз'  WHERE id = 9</em></p>";
	}
// изменение объекта
	if($_GET['type']==6)
	{
		echo"
		<p><strong>Введите запрос:</strong></p>
    <form id='form' name='form' method='post' action='query.php'>
   <center><p><textarea name='query' cols='87' rows='6' maxlength='5000'>ALTER TABLE `persons` DROP `gender`, DROP `tel`</textarea> &nbsp;
  <br> <br><input style='font-weight:bold;' name='alter' type='submit' value='Выполнить' /> 
    </p></center>
    <p><em>Таблица <strong>persons</strong> изначально содержит поля <strong>id, name, last_name, tel, address, gender</strong></em>
	<center><input style='background-color:white; color:darkgrey; font-style:italic; margin-top:0px; font-size:13px;' name='rescue' type='submit' value='Восстановить исходное состояние базы данных' /></center>
    <p>    
    </form>
	<hr><br>
	<p><strong>Пример запроса на изменение таблицы:</strong><br><br>

<em>ALTER TABLE `persons` CHANGE  `tel`  `phone` VARCHAR( 35 )</em></p>";

	}
	
	
	
    ?>
    &nbsp;<hr />
   <center><p><a style="text-decoration:none; color:#C3C3C3; font-family:'Comic Sans MS', cursive;" href="sql.zip">Скачать справочники по SQL</a></p>
</center><center><!-- HotLog -->
 <script type="text/javascript" language="javascript">
 hotlog_js="1.0"; hotlog_r=""+Math.random()+"&s=2237598&im=301&r="+
 escape(document.referrer)+"&pg="+escape(window.location.href);
 </script>
 <script type="text/javascript" language="javascript1.1">
 hotlog_js="1.1"; hotlog_r+="&j="+(navigator.javaEnabled()?"Y":"N");
 </script>
 <script type="text/javascript" language="javascript1.2">
 hotlog_js="1.2"; hotlog_r+="&wh="+screen.width+"x"+screen.height+"&px="+
 (((navigator.appName.substring(0,3)=="Mic"))?screen.colorDepth:screen.pixelDepth);
 </script>
 <script type="text/javascript" language="javascript1.3">
 hotlog_js="1.3";
 </script>
 <script type="text/javascript" language="javascript">
 hotlog_r+="&js="+hotlog_js;
 document.write('<a href="http://click.hotlog.ru/?2237598" target="_blank"><img '+
 'src="http://hit41.hotlog.ru/cgi-bin/hotlog/count?'+
 hotlog_r+'" border="0" width="88" height="31" title="HotLog: показано количество посетителей за сегодня, за вчера и всего" alt="HotLog"><\/a>');
 </script>
 <noscript>
 <a href="http://click.hotlog.ru/?2237598" target="_blank"><img
 src="http://hit41.hotlog.ru/cgi-bin/hotlog/count?s=2237598&im=301" border="0"
 width="88" height="31" title="HotLog: показано количество посетителей за сегодня, за вчера и всего" alt="HotLog"></a>
 </noscript>
 <!-- /HotLog --></center>

  <!-- end .content --></div>
  <div class="footer">
    <center>
    <p style="color:#E7E7E7;"><strong>SQL запросы online </strong><strong>&copy; </strong>  <em>v0.9</em> <em><a style="color:#EFEFEF; text-decoration:none;" href="mailto:mail@shapovalov.org">Шаповалов А.А.</a></em></p>
</center>
    <!-- end .footer --></div>
  <!-- end .container --></div>
</body>
</html>