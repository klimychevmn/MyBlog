<?php require('header.php') ?>

<!-- Отображается иноформация о посте детальнее -->
<div class="blog-post">
    <h2 class="blog-post-title"><?=$ENTRY['header']?></h2>
    <p><?=$ENTRY['content']?></p>

    <div class="blog-post-meta" style="margin-top: 15px">
        <ul class="postinfo-panel">
            <li class="postinfo-panel__item"><span><?=$ENTRY['date']?></span></li>
            <li class="postinfo-panel__item"><span><?=$ENTRY['author']?></span></li>
            <br>
        </ul>
    </div>
</div> <!-- post -->

<h2>Comments: </h2>
<?php foreach($comments as $row): ?>

    <div class="comment">
        <div class="comment-header">
            <span class="author"><b><?=$row['author']?></b></span>
            <span class="date"><?=$row['date']?></span>
            <?php if(IS_ADMIN): ?>
                <a href="?act=delete-comment&entry_id=<?=$ENTRY['id']?>&id=<?=$row['id']?>"><span class="glyphicon glyphicon-trash ico"></span></a>
            <?php endif?>

        </div>
        <p class="comment-content"><?=$row['content']?></p>
    </div>


<?php endforeach;?>

<!-- Добавить комментарий -->
<h2>Add new comment</h2>

<form action="?act=do-new-comment" method="POST" class="well">
    <input type="hidden" name="entry_id" value="<?=$id?>">
    <div style="padding-top: 10px">
        <label>Author</label>
        <input name="author" type="text"/>
    </div>
    <div style="padding-top: 10px">
        <label>Content</label>
        <textarea name="content"></textarea>
    </div>
    <div style="padding-top: 10px">
        <button type="submit" class="btn">Post</button>
    </div>
</form>


<?php require('footer.php') ?>
