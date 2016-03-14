<?php require('header.php') ?>

    <!-- Отображается лента всех постов из нашей БД -->
    <div class="blog-header">
        <h1 class="blog-title">Большой Тайтл!</h1>
        <p class="lead blog-description">Какая-то вводная часть.</p>
    </div>

    <div class="row">

        <div class="col-sm-8 blog-main">

            <?php foreach ($records as $row): ?>

                <div class="blog-post">
                    <h2 class="blog-post-title">
                        <?= $row['header'] ?>
                        <?php if (IS_ADMIN): ?>
                            <a href="?act=edit-entry&id=<?= $row['id'] ?>"><span
                                    class="glyphicon glyphicon-edit ico"></span></a>
                            <a href="?act=delete-entry&id=<?= $row['id'] ?>"><span
                                    class="glyphicon glyphicon-trash ico"></span></a>
                        <?php endif ?>
                    </h2>
                    <p><?= $row['content'] ?></p>
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

            <!-- Страницы -->
            <?php require('pager.php'); ?>
            <?php if (IS_ADMIN): ?>
                <!-- Если АДМИН, то добавим новый пост -->
                <h1>Add new entry</h1>

                <form action="?act=do-new-entry" method="POST" class="well">
                    <div style="padding-top: 10px">
                        <label>Author</label>
                        <input name="author" type="text"/>
                    </div>
                    <div style="padding-top: 10px">
                        <label>Header</label>
                        <input name="header"/>
                    </div>
                    <div style="padding-top: 10px">
                        <label>Content</label>
                        <textarea name="content"></textarea>
                    </div>
                    <div style="padding-top: 10px">
                        <button type="submit" class="btn">Post</button>
                    </div>
                </form>
            <?php endif ?>

        </div> <!-- blog-main -->

        <div class="col-sm-3 col-sm-offset-1 blog-sidebar">
            <div class="sidebar-module sidebar-module-inset">
                <h4>Заметки</h4>
                <p>Здесь можно было бы что-то интересно написать</p>
            </div>
            <div class="sidebar-module">
                <h4>Archives</h4>
                <h6>Не работает эта штука пока</h6>
                <ol class="list-unstyled">
                    <li><a href="#">January 2014</a></li>
                    <li><a href="#">December 2013</a></li>
                    <li><a href="#">November 2013</a></li>
                    <li><a href="#">October 2013</a></li>
                    <li><a href="#">September 2013</a></li>
                    <li><a href="#">August 2013</a></li>
                    <li><a href="#">July 2013</a></li>
                    <li><a href="#">June 2013</a></li>
                    <li><a href="#">May 2013</a></li>
                    <li><a href="#">April 2013</a></li>
                    <li><a href="#">March 2013</a></li>
                    <li><a href="#">February 2013</a></li>
                </ol>
            </div>
            <div class="sidebar-module">
                <h4>Ссылки</h4>
                <ol class="list-unstyled">
                    <li><a href="https://github.com/klimychevmn">GitHub</a></li>
                    <li><a href="https://vk.com/klimychev26">Вконтакте</a></li>
                </ol>
            </div>
        </div><!-- /.blog-sidebar-->
    </div> <!-- row -->

<?php require('footer.php') ?>