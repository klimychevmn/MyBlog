<?php require('header_admin.php') ?>

    <div>
        <form role="form" action="../admin/index.php?action=<?=$_GET['action']?>&id=<?=$_GET['id']?>" method="post" >

            <div class="form-group">
                <label>Название</label>
                <input type="text" name="title" class="form-item" autofocus required value="<?=$article['title']?>"><br>
            </div>
            <div class="form-group">
                <label>Дата</label>
                <input type="date" name="date" class="form-item" required value="<?=$article['date']?>"><br>
            </div>
            <div class="form-group">
                <label>Автор</label>
                <input type="text" name="author" class="form-item" required value="<?=$article['author']?>"><br>
            </div>
            <div class="form-group">
                <label>Содержание</label>
                <textarea name="content" required class="form-item"><?=$article['content']?></textarea><br>
            </div>

            <input type="submit" class="btn" value="Сохранить">
        </form>
    </div>

<?php require('footer_admin.php') ?>