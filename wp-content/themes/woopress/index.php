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

if ($content_layout == 'mosaic') {
    $full_width = etheme_get_option('blog_full_width');
}

if ($content_layout == 'mosaic') {
    $content_layout = 'grid';
}
?>

<?php do_action('et_page_heading'); ?>

    <div class="directory-container <?php echo (!$full_width) ? 'container' : 'blog-full-width'; ?>">
        <div class="page-content sidebar-position-<?php esc_attr_e($l['sidebar']); ?> sidebar-mobile-<?php esc_attr_e($l['sidebar-mobile']); ?>">
            <div class="row flex">
                <div class="content <?php esc_attr_e($l['content-class']); ?>">
                    <div class="directory-page <?php if ($content_layout == 'grid'): ?>blog-masonry row<?php endif ?>">
                        <div class="block-with-post">

                            <?php if (is_category()) : ?>
                                <?php
                                $thisCat = get_category(get_query_var('cat'), false);
                                $categories = get_categories(array(
                                    'orderby' => 'name',
                                    'parent' => $thisCat->term_taxonomy_id
                                ));
                                if ($categories) {
                                    foreach ($categories as $category) {

                                        echo '<div class="test_sub_cat"><p>' . $category->name . '</p><div style="border: 1px solid #E5E5E5;"></div>';
                                        # получаем записи из рубрики
                                        $myposts = get_posts(array(
                                            'numberposts' => -1,
                                            'category' => $category->cat_ID,
                                            'orderby' => 'post_date',
                                            'order' => 'DESC',
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
                                    <?php $posts = get_posts("category=$thisCat->cat_ID&numberposts=$post->ID"); ?>
                                    <?php if ($posts) : ?>
                                        <?php foreach ($posts as $post) : setup_postdata($post); ?>
                                            <a class="link-alone"
                                               href="<?php the_permalink() ?>"><?php the_title(); ?></a>
                                        <?php endforeach; ?>
                                    <?php endif;

                                }


                            else: { ?>
                                <?php if (have_posts()):
                                    while (have_posts()) : the_post(); ?>
                                        <p class="entry-title"><a
                                                    href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                        </p>

                                        <!--                            --><?php //get_template_part('content', $content_layout); ?>

                                    <?php endwhile; ?>
                                <?php else: ?>

                                    <h1><?php _e('No posts were found!', ET_DOMAIN) ?></h1>

                                <?php endif;
                            }
                            endif; ?>

                        </div>

                        <?php if (etheme_get_option('post_related')): ?>
                            <div class="related-posts">
                                <?php et_get_related_posts(); ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="articles-nav">
                        <div class="left"><?php next_posts_link(__('&larr; Older Posts', ET_DOMAIN)); ?></div>
                        <div class="right"><?php previous_posts_link(__('Newer Posts &rarr;', ET_DOMAIN)); ?></div>
                        <div class="clear"></div>
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