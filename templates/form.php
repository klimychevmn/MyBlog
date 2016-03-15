<?php require('header.php') ?>
    <link rel="stylesheet" href="static/content/signin.css">

    <form class="form-signin" role="form" action="?act=do-new-forma" method="POST">
        <input type="text" class="form-control" placeholder="Lastname" name="lastname" autofocus>
        <input type="text" class="form-control" placeholder="Firstname" name="firstname" >
        <input type="text" class="form-control" placeholder="phone" name="phone" >
        <input type="text" class="form-control" placeholder="Email" name="email" >
        <input type="text" class="form-control" placeholder="Content" name="content" >

        <button class="btn btn-lg btn-primary btn-block" type="submit">Sent</button>
    </form>

<?php require('footer.php') ?>