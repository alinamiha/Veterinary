<?php 
    if(function_exists('woocommerce_get_page_id')) $page_for_shop = woocommerce_get_page_id( 'shop' );
    $page_id = get_the_ID();
    if(class_exists('WooCommerce') && ( is_shop() || is_product_category() || is_product_tag() )) {
    	$page_id = $page_for_shop;
    }
	$ht = $class = ''; 
	$ht = apply_filters('custom_header_filter',$ht);  
	$hstrucutre = etheme_get_header_structure($ht); 
	$page_slider = etheme_get_custom_field('page_slider', $page_id);
	
	if($page_slider != '' && $page_slider != 'no_slider' && ($ht == 2 || $ht == 3 || $ht == 5)) {
		$class = 'slider-overlap ';
	}
	if(get_header_type() == 'vertical' || get_header_type() == 'vertical2') {
		$class = 'nano ';
	}

	if(etheme_get_option('header_transparent')) {
		$class .= ' header-transparent';
	}

?>

<div class="header-wrapper header-type-<?php echo $ht.' '.$class; ?>">
	<?php if(get_header_type() == 'vertical' || get_header_type() == 'vertical2'): ?>
		<div class="header-content nano-content">
	<?php endif; ?>
	
		<?php get_template_part('headers/parts/top-bar', $hstrucutre); ?>
	
		<header class="header main-header">
			<div class="container">	
					<div class="navbar" role="navigation">
						<div class="container-fluid">

							<div class="header-logo">
								<?php etheme_logo(); ?>
							</div>
                            <div class="flex-block">
                                <div class="clearfix visible-md visible-sm visible-xs"></div>
<!--                                <div class="tbs">-->
<!--                                    <div class="collapse navbar-collapse">-->
<!--                                        --><?php //et_get_main_menu(); ?>
<!--                                    </div><!-- /.navbar-collapse -->
<!--                                </div>-->

                                <div class="navbar-header navbar-right">
                                    <div class="navbar-right">
                                        <form action="<?php echo home_url( '/' ); ?>" id="searchform" class="hide-input" method="get">
                                            <div class="form-horizontal modal-form">
                                                <div class="form-group has-border">
                                                    <div>
                                                        <input type="text" name="s" id="s" class="form-control"/>
                                                        <input type="hidden" name="post_type" value="post" />
                                                    </div>
                                                </div>
                                                <div class="form-group form-button">
                                                    <button type="submit" class="btn medium-btn btn-black"><img src="/wp-content/themes/woopress/images/main-img/search-icon.svg"
                                                                                                                alt=""><?php esc_attr_e( '', ETHEME_DOMAIN ); ?></button>
                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                                <div class="private-cabinet">
                                    <a href="/">
                                    <img src="/wp-content/themes/woopress/images/main-img/home-icon.svg" alt="">
                                    </a>
                                </div>
                                <div class="shop-cabinet">
                                    <a href="/">
                                    <img src="/wp-content/themes/woopress/images/main-img/shop-icon.svg" alt="">
                                    </a>
                                </div>
                                <div id="main-mobile-menu" class="column">
                                    <button class="menu-icon-btn">
                                        <span class="burger-menu-icon"></span>
                                    </button>
                                </div>
                            </div>
						</div><!-- /.container-fluid -->
					</div>
			</div>
		</header>
	<?php if(get_header_type() == 'vertical' || get_header_type() == 'vertical2'): ?>
		</div>
	<?php endif; ?>
</div>
<div class="main-menu-sidebar">
<!--    --><?php //et_get_main_menu(); ?>
    <ul class="main-menu-list">
        <li><a href="https://www.veterinary.wiki/">Главная</a></li>
        <li class="all-cat-ill">Каталог заболеваний</li>

     <?php
                                    $categories = get_categories([
                                        'taxonomy' => 'category',
                                        'type' => 'post',
                                        'child_of' => 0,
                                        'orderby' => 'sort',
                                        'parent' => '',

                                    ]);
     echo '<ul class="menu-all-cat">';

     foreach ($categories as $cat) {
         if ($categories && $cat->parent===0 && $cat->term_id!==31) {

             echo '<li class=""><a href="https://www.veterinary.wiki/category/'.$cat->slug.'">'.$cat->name.' </a></li>';
         }
     }
     echo '</ul>';
     ?>

        <li><a href="https://www.veterinary.wiki/category/our-doctors/">Наши врачи</a></li>
    </ul>

</div>
