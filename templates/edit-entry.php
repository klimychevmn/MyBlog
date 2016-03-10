<?php require('header.php') ?>

<h1>Edit entry</h1>

<form action="?act=apply-edit-entry" method="POST" class="well">
    <input type="hidden" name="id" value="<?=$id?>" />
    <div style="padding-top: 10px">
        <label>Author</label>
        <input name="author" type="text" value="<?=$row['author']?>"/>
    </div>
    <div style="padding-top: 10px">
        <label>Header</label>
        <input name="header" value="<?=$row['header']?>"/>
    </div>
    <div style="padding-top: 10px">
        <label>Content</label>
        <textarea name="content"><?=$row['content']?></textarea>
    </div>
    <div style="padding-top: 10px">
        <button type="submit" class="btn">Post</button>
    </div>
</form>

<?php require('footer.php') ?>