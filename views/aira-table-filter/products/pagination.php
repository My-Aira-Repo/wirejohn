<!-- <pre> -->
<?php //var_dump($query_args['pagination']) ?>
<!-- </pre> -->
<?php
    $total_pages = (int)ceil($query_args['pagination']['count'] / $query_args['pagination']['posts_per_page']);
    $current_page = $query_args['pagination']['page'];
    $prev_page = $current_page - 1;
    $next_page = $current_page + 1;
    $pages_to_show = 3;
?>

<input type="hidden" name="posts_per_page" value="<?= $query_args['pagination']['posts_per_page'] ?>">

<?php if ($total_pages > 1) : ?>
<?php echo "Page: [$current_page / $total_pages]" ?>
<ul class="aira-pagination pagination">
    <?php //if ($prev_page > 0): ?>
    <!-- <li><a href="#"  data-posts_per_page="<?php //echo $query_args['pagination']['posts_per_page'] ?>">< Prev</a></li> -->
    <?php //endif ?>
    <?php for ($page = 1; $page <= $total_pages; $page++) : ?>
        <?php if ($page > $current_page - $pages_to_show && $page < $current_page + $pages_to_show): ?>
        <li class="<?= ($current_page == $page)?"active":"" ?>">
            <a href="#" data-current_page="<?= $page ?>"><?= $page ?></a>
        </li>
        <?php endif ?>
    <?php endfor ?>    
	<?php //if ($next_page <= $total_pages): ?>
    <!-- <li><a href="#"  data-posts_per_page="<?php //echo $query_args['pagination']['posts_per_page'] ?>">Next ></a></li> -->
	<?php //endif ?>
</ul>
<?php endif ?>