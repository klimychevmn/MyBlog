<?php require('header_admin.php') ?>
    <h1>Привет, Админ!</h1>
    <div>
        <a href="index.php?action=add">
            <button type="button" class="btn btn-primary">Добавить статью</button>
        </a>
        <table class="table table-hover">
            <tr>
                <th>id</th>
                <th>Date</th>
                <th>Author</th>
                <th>Title</th>
                <th>Content</th>
                <th></th>
                <th></th>
            </tr>
            <?php foreach($articles as $a): ?>
            <tr>
                <td><?=$a['id']?></td>
                <td><?=$a['date']?></td>
                <td><?=$a['author']?></td>
                <td><?=$a['title']?></td>
                <td><?=articles_intro($a['content'], 100)?></td>
                <td><a href="index.php?action=edit&id=<?=$a['id']?>">Редактировать</a></td>
                <td><a href="index.php?action=delete&id=<?=$a['id']?>">Удалить</a></td>
            </tr>
            <?php endforeach ?>
        </table>
    </div>

<?php require('footer_admin.php') ?>