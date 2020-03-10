<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 3/10/2020
 * Time: 9:24 PM
 * Template name: allCat
 */
get_header();
?>
<?php do_action( 'et_page_heading' ); ?>
    <div class="directory-container <?php echo (!$full_width) ? 'container' : 'blog-full-width'; ?>">
        <div class="page-content sidebar-position-<?php esc_attr_e( $l['sidebar'] ); ?> sidebar-mobile-<?php esc_attr_e( $l['sidebar-mobile'] ); ?>">
            <div class="row flex">
                <div class="content <?php esc_attr_e( $l['content-class'] ); ?>">
                    <div class="directory-page <?php if ($content_layout == 'grid'): ?>blog-masonry row<?php endif ?>">
                        <h4 class="active">Все категории</h4>
                        <div style="border: 1px solid #E5E5E5;"></div>
                        <div class="block-with-post gen-cat">

                            <div class="content <?php esc_attr_e($l['content-class']); ?>">
                                <?php if (have_posts()): while (have_posts()) : the_post(); ?>
                                    <ul>
                                        <?php wp_list_categories( array(
//                                            'orderby'    => 'name',
//                                            'show_count' => true,
                                            'child_of'            => 0,
                                            'title_li' => '',
                                            'exclude'    => array( 31 )
                                        ) ); ?>
                                    </ul>
<!--                                --><?php //wp_dropdown_categories(array('hide_empty' => 0, 'name' => 'category_parent', 'orderby' => 'name', 'selected' => $category->parent, 'hierarchical' => true, 'show_option_none' => __('None')));?>
                                    <?php the_content(); ?>


                                <?php endwhile; else: ?>

                                    <h3><?php _e('Страница не найдена!', ET_DOMAIN) ?></h3>

                                <?php endif; ?>

                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>

<?php
get_footer();