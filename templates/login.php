<?php require('header.php') ?>
<link rel="stylesheet" href="static/content/signin.css">

<!-- Форма для того, чтобы войти в админку-->
<!-- login: login -->
<!-- password: password -->

<form class="form-signin" role="form" action="?act=do-login" method="POST">
    <input type="text" class="form-control" placeholder="Login" name="login" autofocus>
    <input type="password" class="form-control" placeholder="Password" name="password">

    <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
</form>