<?php
/**
 * The main template file.
 *
 */
	get_header();
?>
<?php

	$l = et_page_config();

	$content_layout = etheme_get_option('blog_layout');

	$full_width = false;

	if($content_layout == 'mosaic') {
		$full_width = etheme_get_option('blog_full_width');
	}

	if($content_layout == 'mosaic') {
		$content_layout = 'grid';
	}
?>

<?php do_action( 'et_page_heading' ); ?>

<div class="directory-container <?php echo (!$full_width) ? 'container' : 'blog-full-width'; ?>">
	<div class="page-content sidebar-position-<?php esc_attr_e( $l['sidebar'] ); ?> sidebar-mobile-<?php esc_attr_e( $l['sidebar-mobile'] ); ?>">
		<div class="row flex">
			<div class="content <?php esc_attr_e( $l['content-class'] ); ?>">
				<div class="directory-page <?php if ($content_layout == 'grid'): ?>blog-masonry row<?php endif ?>">
                    <div class="block-with-post">

                        <?php if (is_category()) : ?>
                            <?php
                            $thisCat = get_category(get_query_var('cat'), false);
                            $categories = get_categories(array(
                                'orderby' => 'ID',
                                'parent' => $thisCat->term_taxonomy_id
                            ));

                            if ($categories) {
                                foreach ($categories as $category) {

                                    echo '<div class="test_sub_cat"><p>' . $category->name . '</p><div style="border: 1px solid #E5E5E5;"></div>';
                                    # получаем записи из рубрики
                                    $myposts = get_posts(array(
                                        'numberposts' => -1,
                                        'category' => $category->cat_ID,
                                        'orderby' => 'ID',
                                        'order' => 'DESC ',
                                    ));
                                    # выводим записи
                                    echo '<ul>';
                                    global $post;
                                    foreach ($myposts as $post) {
                                        setup_postdata($post);
                                        echo '<li class="entry-title"><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>';
                                    }
                                    wp_reset_postdata(); // сбрасываем глобальную переменную пост
                                    echo '</ul>';
                                    echo '</div>';
                                }
                            } else {

                                ?>
                                <?php $posts = get_posts("category=$thisCat->cat_ID&numberposts=$post->ID&order=ASC"); ?>
                                <?php if ($posts) : ?>

                                    <?php foreach ($posts as $post) : setup_postdata($post); ?>
                                    <?php
                                    if($thisCat->cat_ID==31){?>
                                        <a class="link-alone" href="<?php the_permalink() ?>">

                                        <div class="img-recommend-post"
                                                 style="background-image: url('<?php the_post_thumbnail_url(); ?>')">
                                            </div>
                                        <p class="link-alone""><?php the_title(); ?></p>
                                        </a>
                                    <?php }else{
                                        ?>

                                        <a class="link-alone" href="<?php the_permalink() ?>"><?php the_title(); ?></a>
                                        <? }?>
                                    <?php endforeach; ?>
                                <?php endif;

                            }


                        else: { ?>
                            <?php if (have_posts()):
                                while (have_posts()) : the_post(); ?>
                                    <p class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    </p>

                                    <!--                            --><?php //get_template_part('content', $content_layout); ?>

                                <?php endwhile; ?>
                            <?php else: ?>

                                <h1><?php _e('Посты не найдены', ET_DOMAIN) ?></h1>

                            <?php endif;
                        }
                        endif; ?>

                    </div>

                    <div class="related-posts">

                        <?php
                        //for use in the loop, list 5 post titles related to first tag on current post
                        $tags = wp_get_post_tags($post->ID);
                        if ($tags) { ?>



                            <?php
                            $first_tag = $tags[0]->term_id;
                            $args = array(
                                'tag__in' => array($first_tag),
                                'post__not_in' => array($post->ID),
                                'posts_per_page' => 4,
                                'caller_get_posts' => 1
                            );
                            $my_query = new WP_Query($args);
                            if ($my_query->have_posts()) {
                                ?>
                        <h3>Рекомендованые статьи</h3>
                        <div style="border: 1px solid #E5E5E5;"></div>
                        <div class="recommmend-post">
                                <?php
                                while ($my_query->have_posts()) : $my_query->the_post();
                                    $imgThumID = get_the_post_thumbnail($id);
                                    ?>
                                    <div class="post">
                                        <a href="<?php the_permalink() ?>">
                                            <div class="img-recommend-post"
                                                 style="background-image: url('<?php the_post_thumbnail_url(); ?>')">
                                            </div>
                                            <h5><?php the_title(); ?></h5>
                                            <?php the_excerpt(); ?>
                                        </a>

                                    </div>
                                <?php
                                endwhile;
                            }
                            wp_reset_query();
                            }
                            ?>
                        </div>
                    </div>

                </div>

			</div>

            <div class="consultation-">
                <div class="consultation-block">
                    <p>Проконсультируйся у нашего специалиста</p>
                    <a href="/">Консультация ></a>
                </div>
            </div>
		</div>
	</div>
</div>

<?php
	get_footer();
?>