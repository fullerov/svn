<!--Авторизация-->
<span id="left">
<div id="auth_block">
<form id="auth_form" method="post" name="auth_form" action="<? echo $_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'].'&auth=true'; ?>" >
<label for="name" >Логин</label><br />
<input class="input_text" title="Введите Ваш логин..." type="text" size="15" maxlength="255" name="log" /><br />
<label for="name" >Пароль</label><br />
<input class="input_text" title="Введите Ваш пароль..." type="password" size="15" maxlength="255" name="pass" />
<input title="Войти в систему..." id="auth_button" type="submit" name="enter" value="Вход" /><br />
<a href="/index.php?link=reg" title="Зарегистрироваться..." id="reg_button" name="reg">Регистрация</a>
</form>
</div>

<!--Меню-->

<div id="left_menu">
<p>
<img src="../css/img/menu_list_arrow.png" /><a href="/index.php?link=search">Поиск</a><br />
<img src="../css/img/menu_list_arrow.png" /><a href="/index.php?link=type">Виды</a><br />
<img src="../css/img/menu_list_arrow.png" /><a href="/index.php?link=about">О системе</a></p>
</div>
</span>