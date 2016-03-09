<?php require('header.php') ?>

<style type="text/css">
    .date, .author {
        margin-right: 10px;
    }
    .content {
        padding-top: 5px;
        padding-left: 15px;
    }
    h2 {
        margin-bottom: 10px;
    }

    .comments {
        font-size: 0.8em;
        margin-bottom: 20px;
    }
</style>

<!-- Отображается иноформация о посте детальнее -->

<h2><a href="?act=view-entry&id=<?=$row['id']?>"><?=$row['header']?></a></h2>
<p class="content"><?=$row['content']?></p>
<div class="comments">
    <span class="date"><?=$row['author']?></span>
    <span class="author"><?=$row['date']?></span>
    <a href="?act=view-entry&id=<?=$row['id']?>">comments</a>
</div>

<?php require('footer.php') ?>
