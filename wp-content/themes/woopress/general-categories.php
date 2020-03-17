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

                                    <?php
                                    $categories = get_categories([
                                        'taxonomy' => 'category',
                                        'type' => 'post',
                                        'child_of' => 0,
                                        'orderby' => 'sort',
                                        'parent' => '',

                                    ]);
                                    foreach ($categories as $cat) {
                                        if ($categories && $cat->parent===0 && $cat->term_id!==31) {
                                            echo '<div class="sub_cat">';

                                                 echo '<p class="sub_cat_p">'.$cat->name.' </p><div style="border: 1px solid #E5E5E5;"></div>
';

                                            $sub_cats = get_categories(array(
                                                'child_of' => $cat->cat_ID
                                            ));
                                            echo'<div class="flex">';
                                                foreach ($sub_cats as $sub_cat_key) {
                                                    echo '<div class="test_sub_cat"><p>' . $sub_cat_key->name . '</p>';
                                                    # получаем записи из рубрики
                                                    $myposts = get_posts(array(
                                                        'numberposts' => -1,
                                                        'category' => $sub_cat_key->cat_ID,
                                                        'orderby' => 'post_date',
                                                        'order' => 'DESC',
                                                    ));
                                                    # выводим записи
                                                    echo '<ul>';
                                                    global $post;
                                                    foreach ($myposts as $post) {
                                                        setup_postdata($post);
                                                        echo '<li><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>';
                                                    }
                                                    wp_reset_postdata(); // сбрасываем глобальную переменную пост
                                                    echo '</ul>';
                                                    echo '</div>';
                                                }
                                            echo'</div>';




                                            echo '</div>';
                                        }
                                    } ?>
                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>

<?php
get_footer();