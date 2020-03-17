<?php
get_header();
?>

<?php

$l = et_page_config();

$blog_slider = etheme_get_option('blog_slider');
$disable_featured = etheme_get_custom_field('disable_featured');
$postspage_id = get_option('page_for_posts');
$post_format = get_post_format();

$post_content = $post->post_content;
preg_match('/\[gallery.*ids=.(.*).\]/', $post_content, $ids);
if (!empty($ids)) {
    $attach_ids = explode(",", $ids[1]);
    $content = str_replace($ids[0], "", $post_content);
    $filtered_content = apply_filters('the_content', $content);
}

$slider_id = rand(100, 10000);
?>

<?php do_action('et_page_heading'); ?>

    <div class="container">

        <div class="page-content sidebar-position-<?php esc_attr_e($l['sidebar']); ?>">
            <div class="row">

                <div class="content <?php esc_attr_e($l['content-class']); ?>">

                    <?php et_back_to_page(); ?>

                    <div style="border: 1px solid #E5E5E5;margin: 20px 0;"></div>

                    <?php if (have_posts()): while (have_posts()) : the_post(); ?>

                        <?php if (has_tag()): ?>
                            <div class="tag-container"><?php the_tags(); ?></div>

                        <?php endif ?>

                        <article <?php post_class('blog-post post-single'); ?> id="post-<?php the_ID(); ?>">

                            <?php
                            $width = etheme_get_option('blog_page_image_width');
                            $height = etheme_get_option('blog_page_image_height');
                            $crop = etheme_get_option('blog_page_image_cropping');
                            ?>


                            <?php if ($post_format == 'quote' || $post_format == 'video'): ?>

                                <?php the_content(); ?>


                            <?php elseif ($post_format == 'gallery'): ?>
                                <?php if (count($attach_ids) > 0): ?>
                                <div class="post-gallery-slider slider_id-<?php echo $slider_id; ?>">
                                    <?php foreach ($attach_ids as $attach_id): ?>
                                        <div>
                                            <?php echo wp_get_attachment_image($attach_id, 'large'); ?>
                                        </div>
                                    <?php endforeach; ?>
                                </div>

                                <script type="text/javascript">
                                    jQuery('.slider_id-<?php echo $slider_id; ?>').owlCarousel({
                                        items: 1,
                                        navigation: true,
                                        lazyLoad: false,
                                        rewindNav: false,
                                        addClassActive: true,
                                        singleItem: true,
                                        autoHeight: true,
                                        itemsCustom: [1600, 1]
                                    });
                                </script>
                            <?php endif; ?>

                            <?php elseif (has_post_thumbnail() && !$disable_featured): ?>
                                <div class="wp-picture">
                                    <?php the_post_thumbnail('large'); ?>
                                    <div class="zoom">
                                        <div class="btn_group">
                                            <a href="<?php echo etheme_get_image(); ?>"
                                               class="btn btn-black xmedium-btn"
                                               rel="pphoto"><span><?php _e('View large', ETHEME_DOMAIN); ?></span></a>
                                        </div>
                                        <i class="bg"></i>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <?php if ($post_format != 'quote'): ?>
                                <h6 class="active"><?php the_category(',&nbsp;') ?></h6>


                                <h2 class="entry-title"><?php the_title(); ?></h2>

                                <?php if (etheme_get_option('blog_byline')): ?>
                                    <div class="meta-post">
                                        <?php _e('Автор:', ETHEME_DOMAIN); ?> <span class="vcard"> <span
                                                    class="fn"><?php the_author_posts_link(); ?></span></span>
                                        <?php the_time(get_option('date_format')); ?>
                                    </div>
                                <?php endif; ?>
                            <?php endif; ?>
                            <div style="border: 1px solid #E5E5E5;"></div>


                            <?php if ($post_format != 'quote' && $post_format != 'video' && $post_format != 'gallery'): ?>
                                <div class="content-article entry-content">
                                    <?php the_content(); ?>
                                </div>
                            <?php elseif ($post_format == 'gallery'): ?>
                                <div class="content-article entry-content">
                                    <?php echo $filtered_content; ?>
                                </div>
                            <?php endif; ?>

                            <?php if (etheme_get_option('post_share')): ?>
                                <div class="share-post">
                                    <?php echo do_shortcode('[share title="' . __('Share Post', ETHEME_DOMAIN) . '"]'); ?>
                                </div>
                            <?php endif; ?>

                            <?php if (etheme_get_option('posts_links')): ?>
                                <?php etheme_project_links(array()); ?>
                            <?php endif; ?>
                            <?php
                            $thisCat = get_the_category();
                            if ($thisCat[0]->cat_ID) {
                                ?>
                                <div class="block-info">
                                    <p class="location">Заказать консультацию можно в г. Одесса, Украина</p>
                                    <div class="block-tel">
                                        <a class="consulting" href="tel:+380679941991">+380679941991</a>
                                        <a class="consulting" href="tel:+380677761351">+380677761351</a>
                                    </div>
                                </div>
                            <? } ?>
                            <div class="block-footer-post">
                                <div class="block-features">
                                    <?php // Display Comments

                                    if (comments_open() && !post_password_required()) {
                                        echo '<img class="comment-icon" src="/wp-content/themes/woopress/images/main-img/comment-icon.svg"/>';
                                        comments_popup_link('0', '1', '%', 'post-comments-count');
                                    }

                                    ?>
                                </div>
                            </div>


                            <?php if (etheme_get_option('about_author')): ?>
                                <h4 class="title-alt"><span><?php _e('About Author', ETHEME_DOMAIN); ?></span></h4>

                                <div class="author-info vcard">
                                    <a class="pull-left" href="#">
                                        <?php echo get_avatar(get_the_author_meta('email'), 90); ?>
                                    </a>
                                    <div class="media-body">
                                        <h4 class="media-heading url"><?php the_author_link(); ?></h4>
                                        <p class="note"><?php echo get_the_author_meta('description'); ?></p>
                                    </div>
                                </div>
                            <?php endif; ?>


                        </article>


                    <?php endwhile; else: ?>

                        <h1><?php _e('Не найдены посты!', ETHEME_DOMAIN) ?></h1>

                    <?php endif; ?>

                    <?php comments_template('', true); ?>

                </div>
                <div class="col-md-3 col-md-pull-9 sidebar sidebar-left">
                    <div class="sidebar-widget widget_categories">


                        <?php


                       


                        ?>


                        <ul>
                            <?php if (have_posts()): ?>
                                <?php foreach (get_the_category() as $category) {
                                    while (have_posts()) : the_post(); ?>
                                        <li class="side-li">
                                            <?php echo $category->name; ?></li>
                                        <div style="border: 1px solid #E5E5E5;"></div>
                                        <ul class="side-ul">
                                            <li>
                                                <a href="<?php the_permalink() ?>"><?php the_title() ?></a>
                                                <?php



                                                ?>
                                            </li>
                                        </ul>
                                    <?php endwhile; ?>
                                <?php } ?>
                            <?php endif; ?>

                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
get_footer();
?>