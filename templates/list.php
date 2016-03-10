<?php require('header.php') ?>

<style type="text/css">
    .comments {
        font-size: 0.8em;
        margin-bottom: 20px;
    }
    .date, .author {
        margin-right: 10px;
    }
    .content {
        padding-top: 5px;
        padding-left: 15px;
    }
    .entry {
        padding-left: 20px;
    }
    h1 {
        margin-bottom: 10px;
    }
    .pages {
        margin-bottom: 20px;
    }
    .ico {
        padding-left: 5px;
    }
</style>

<!-- Отображается лента всех постов из нашей БД -->

    <h1>Entries in my blog!</h1>

<?php foreach($records as $row): ?>

    <div class="entry">
        <h4>
            <a href="?act=view-entry&id=<?=$row['id']?>"><?=$row['header']?></a>
            <?php if(IS_ADMIN): ?>
                <a href="?act=edit-entry&id=<?=$row['id']?>"><span class="glyphicon glyphicon-edit ico"></span></a>
                <a href="?act=delete-entry&id=<?=$row['id']?>"><span class="glyphicon glyphicon-trash ico"></span></a>
            <?php endif?>
        </h4>
        <p class="content"><?=$row['content']?></p>
        <div class="comments">
            <span class="date"><?=$row['author']?></span>
            <span class="author"><?=$row['date']?></span>
            <a href="?act=view-entry&id=<?=$row['id']?>"><?=$row['comments']." "?>comment(s)</a>
        </div>
    </div>


<?php endforeach;?>

<div class="pages">
    <strong>Pages:</strong>
<?php for($i = 1; $i <= $pages; $i++): ?>
    <?php if($i == $page):?><b><?=$i?></b>
    <?php else: ?><a href="?page=<?=$i?>"><?=$i?></a>
    <?php endif ?>

<?php endfor?>
</div>

<?php if(IS_ADMIN): ?>
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

<?php require('footer.php') ?>