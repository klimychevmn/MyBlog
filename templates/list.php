<?php require('header.php') ?>

    <!-- Отображается лента всех постов из нашей БД -->
    <div class="blog-header">
        <h1 class="blog-title">Привет, друг!</h1>
        <p class="lead blog-description">Мы рады, что ты заглянул к нам в блог. <br> Это, конечно, не Хабрахабр, но мы тоже неплохи ;)</p>
    </div>

    <div class="row">

        <div class="col-sm-8 blog-main">

            <?php foreach ($articles as $row): ?>

                <div class="blog-post">
                    <h2 class="blog-post-title"><?= $row['title'] ?></h2>
                    <p><?= articles_intro($row['content'], 100) ?></p>
                    <a href="?act=view-entry&id=<?= $row['id'] ?>">
                        <button class="btn">Подробнее</button>
                    </a>
                    <div class="blog-post-meta" style="margin-top: 15px">
                        <ul class="postinfo-panel">
                            <li class="postinfo-panel__item"><span><?= $row['date'] ?></span></li>
                            <li class="postinfo-panel__item"><span><?= $row['author'] ?></span></li>
                            <li class="postinfo-panel__item"><a
                                    href="?act=view-entry&id=<?= $row['id'] ?>"><?= $row['comments'] . " " ?><span
                                        class="glyphicon glyphicon glyphicon-comment text-primary"></span></a></li>
                            <br>
                        </ul>
                    </div>
                </div> <!-- post -->
            <?php endforeach; ?>


        </div> <!-- blog-main -->

        <div class="col-sm-3 col-sm-offset-1 blog-sidebar">
            <div class="sidebar-module sidebar-module-inset">
                <h4>Помощь</h4>
                <p>Нажав на вкладку <b>Home</b> ты увидишь все посты, что храняться в нашей базе.</p>
                <p>Если ты хочешь свзаться с нами, перейди в соответсвующую форму, нажав <b>Contact us</b> и заполни все поля.</p>
                <p>В <b>About</b> хранятся данный об этом блоге.</p>
            </div>
            <div class="sidebar-module">
                <h4>Ссылки</h4>
                <ol class="list-unstyled">
                    <li><a href="https://github.com/klimychevmn/MyBlog">GitHub</a></li>
                    <li><a href="http://bootstrap-3.ru/index.php">Bootstrap</a></li>
                </ol>
            </div>
        </div><!-- /.blog-sidebar-->
    </div> <!-- row -->

<?php require('footer.php') ?>