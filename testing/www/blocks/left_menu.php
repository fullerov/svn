<span id="left">
<!--Авторизация-->
<div id="auth_block">
<form id="auth_form" method="post" name="auth_form" action="/authorization" >
<label for="name" >Логин</label><br />
<input class="input_text" title="Введите Ваш логин..." type="text" size="15" maxlength="255" name="login" /><br />
<label for="name" >Пароль</label><br />
<input class="input_text" title="Введите Ваш пароль..." type="password" size="15" maxlength="255" name="password" />
<input title="Войти в систему..." id="auth_button" type="submit" name="enter" value="Вход" /></form>
<a title="Зарегистрироваться..." id="reg_button" href="/registration">&nbsp;Регистрация&nbsp;</a>
</div>

<!--Меню профиль-->
<div id="profile_block">
<p><a id="profile_link" href="/authorization/profile">&nbsp;- Профиль&nbsp;</a><br />
<a id="profile_link" href="/authorization/exit">&nbsp;- Выход&nbsp;</a><br /></p>
</div>

<!--Меню-->
<div id="left_menu">
<p><a href="/articles"><img id="arrow_img" src="http://<? echo $_SERVER['HTTP_HOST'];?>/css/img/no_arrow.png" />Статьи</a><br />
<a href="/about"><img id="arrow_img" src="http://<? echo $_SERVER['HTTP_HOST'];?>/css/img/no_arrow.png" />О системе</a><br />
<a href="/execute"><img id="arrow_img" src="http://<? echo $_SERVER['HTTP_HOST'];?>/css/img/no_arrow.png" />Пройти тест</a><br />
<a href="/create"><img id="arrow_img" src="http://<? echo $_SERVER['HTTP_HOST'];?>/css/img/no_arrow.png" />Создать тест</a></p>
</div>
</span>