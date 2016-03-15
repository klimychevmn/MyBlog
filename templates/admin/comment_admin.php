<?php require('header_admin.php') ?>
    <h2>Все комментарии:</h2>
    <div class="tab-pane active">
        <table class="table table-hover">
            <tr>
                <th>id</th>
                <th>entry id</th>
                <th>Date</th>
                <th>Author</th>
                <th>Content</th>
                <th></th>
            </tr>
            <?php foreach($articles as $a): ?>
                <tr>
                    <td><?=$a['id']?></td>
                    <td><?=$a['entry_id']?></td>
                    <td><?=$a['date']?></td>
                    <td><?=$a['author']?></td>
                    <td><?=$a['content']?></td>
                    <td><a href="index.php?action=comment_delete&id=<?=$a['id']?>">Удалить</a></td>
                </tr>
            <?php endforeach ?>
        </table>
    </div>

<?php require('footer_admin.php') ?>