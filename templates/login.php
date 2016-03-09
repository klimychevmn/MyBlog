<?php require('header.php') ?>
<!-- Форма для того, чтобы войти в админку-->
<!-- login: login -->
<!-- password: password -->
<form action="?act=do-login" method="POST" class="well">
    <div style="padding-top: 10px">
        <label>Login</label>
        <input name="login" type="text"/>
    </div>
    <div style="padding-top: 10px">
        <label>Password</label>
        <input name="password" type="password" />
    </div>
    <div style="padding-top: 10px">
        <button type="submit" class="btn">Login</button>
    </div>
</form>

<?php require('footer.php') ?>