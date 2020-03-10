<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 01.03.2020
 * Time: 20:12
 */
?>

<div class="sidebar-left">
<?php
if(have_posts()):?>
 <?php while(have_posts()) : the_post(); ?>
        <p class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
    <?php endwhile; ?>
<?php endif; ?>
</div>
