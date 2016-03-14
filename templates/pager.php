<div class="pages">
    <ul class="pagination">
        <li class="disabled"><a href="#">&laquo;</a></li>
<?php for($i = 1; $i <= $pages; $i++): ?>
    <?php if($i == $page):?><li class="active"><a href="#"><?=$i?></a></li>
    <?php else: ?><li><a href="?page=<?=$i?>"><?=$i?></a></li>
    <?php endif ?>

<?php endfor?>
        <li class="disabled"><a href="#">&raquo;</a></li>
    </ul>
</div>



