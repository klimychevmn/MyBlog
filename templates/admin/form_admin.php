<?php require('header_admin.php') ?>
    <h2>Все записи из формы обратной связи:</h2>
    <div class="tab-pane active">
        <table class="table table-hover">
            <tr>
                <th>id</th>
                <th>Date</th>
                <th>Lastname</th>
                <th>Firstname</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Content</th>
                <th></th>
            </tr>
            <?php foreach($articles as $a): ?>
                <tr>
                    <td><?=$a['id']?></td>
                    <td><?=$a['date']?></td>
                    <td><?=$a['lastname']?></td>
                    <td><?=$a['firstname']?></td>
                    <td><?=$a['phone']?></td>
                    <td><?=$a['email']?></td>
                    <td><?=$a['content']?></td>
                    <td><a href="index.php?action=form_delete&id=<?=$a['id']?>">Удалить</a></td>
                </tr>
            <?php endforeach ?>
        </table>
    </div>
<?php require('footer_admin.php') ?>