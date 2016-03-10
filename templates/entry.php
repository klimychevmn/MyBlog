<?php require('header.php') ?>

<style type="text/css">
    .date, .author {
        margin-right: 10px;
    }
    .content{
        padding-top: 5px;
        padding-left: 15px;
    }
    .comment-header {
        font-size: 0.8em;
    }
    .comment-content {
        padding-left: 10px;
        margin-bottom: 10px;
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

<h2><?=$ENTRY['header']?></h2>
<p class="content"><?=$ENTRY['content']?></p>
<div class="comments">
    <span class="date"><?=$ENTRY['author']?></span>
    <span class="author"><?=$ENTRY['date']?></span>
    <a href="?act=view-entry&id=<?=$ENTRY['id']?>">comments</a>
</div>


<h2>Comments: </h2>
<?php foreach($comments as $row): ?>

    <div class="comment">
        <div class="comment-header">
            <span class="author"><b><?=$row['author']?></b></span>
            <span class="date"><?=$row['date']?></span>
        </div>
        <p class="comment-content"><?=$row['content']?></p>
    </div>


<?php endforeach;?>

<!-- Добавить комментарий -->
<h2>Add new comment</h2>

<form action="?act=do-new-comment" method="POST" class="well">
    <div style="padding-top: 10px">
        <label>Author</label>
        <input name="author" type="text"/>
    </div>
    <div style="padding-top: 10px">
        <label>Content</label>
        <textarea name="text"></textarea>
    </div>
    <div style="padding-top: 10px">
        <button type="submit" class="btn">Post</button>
    </div>
</form>


<?php require('footer.php') ?>
