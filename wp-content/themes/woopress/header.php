<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <?php global $etheme_responsive, $woocommerce; ?>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="description" content="Симптомы, Диагностика, Лечение, Содержание, Воспитание. Ваш личный справочник по домашним животным - смотрите бесплатно!"/>

    <meta name="viewport" content="<?php if($etheme_responsive): ?>width=device-width, initial-scale=1, maximum-scale=2.0<?php else: ?>width=1200<?php endif; ?>"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

	<link rel="shortcut icon" href="<?php echo et_get_favicon(); ?>" />
	<title><?php wp_title( '|', true, 'right' );?></title>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-160172452-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-160172452-1');
    </script>
		<?php
			if ( is_singular() && get_option( 'thread_comments' ) )
				wp_enqueue_script( 'comment-reply' );

			wp_head();
		?>
</head>

<body <?php body_class(); ?>>

<?php do_action( 'et_after_body' ); ?>

<div id="st-container" class="st-container">

	<nav class="st-menu mobile-menu-block">
		<div class="nav-wrapper">
			<div class="st-menu-content">
				<div class="mobile-nav">
					<div class="close-mobile-nav close-block mobile-nav-heading"><i class="fa fa-bars"></i> <?php _e('Navigation', ETHEME_DOMAIN); ?></div>
					<?php 
						et_get_mobile_menu();						
					?>
					
					<?php if (etheme_get_option('top_links')): ?>
						<div class="mobile-nav-heading"><i class="fa fa-user"></i><?php _e('Account', ETHEME_DOMAIN); ?></div>
						<?php etheme_top_links(array('popups' => false)); ?>
					<?php endif; ?>	
					
					<?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('mobile-sidebar')): ?>
						
					<?php endif; ?>	
				</div>
			</div>
		</div>
		
	</nav>
	
	<div class="st-pusher" style="background-color:#fff;">
	<div class="st-content">
	<div class="st-content-inner">
	<div class="page-wrapper fixNav-enabled">
	
		<?php $ht = ''; $ht = apply_filters('custom_header_filter',$ht); ?>
		<?php $hstrucutre = etheme_get_header_structure($ht); ?>

		<?php if (etheme_get_option('fixed_nav')): ?>
			<div class="fixed-header-area fixed-header-type-<?php echo esc_attr($ht); ?>">
				<div class="fixed-header">
					<div class="container">
					
						<div id="st-trigger-effects" class="column">
							<button data-effect="mobile-menu-block" class="menu-icon"></button>
						</div>
						    
						<div class="header-logo">
							<?php etheme_logo(true); ?>
						</div>

						<div class="collapse navbar-collapse">
								
							<?php 
								et_get_main_menu(); 
								et_get_main_menu('main-menu-right');
							?>
							
						</div><!-- /.navbar-collapse -->
						
						<div class="navbar-header navbar-right">
							<div class="navbar-right">
					            <?php if(class_exists('Woocommerce') && !etheme_get_option('just_catalog') && etheme_get_option('cart_widget')): ?>
				                    <?php etheme_top_cart(); ?>
					            <?php endif ;?>
						            
								<?php if(etheme_get_option('search_form')): ?>
									<?php etheme_search_form(); ?>
								<?php endif; ?>

							</div>
						</div>
						
						<div class="modal-buttons">
							<?php if (class_exists('Woocommerce') && etheme_get_option('top_links')): ?>
	                        	<a href="#cartModal" class="popup-btn shopping-cart-link hidden-lg">&nbsp;</a>
							<?php endif ?>
							<?php if (is_user_logged_in() && etheme_get_option('top_links')): ?>
								<a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" class="my-account-link hidden-lg">&nbsp;</a>
							<?php elseif(etheme_get_option('top_links')): ?>
								<a href="#loginModal" class="popup-btn my-account-link hidden-lg">&nbsp;</a>
							<?php endif ?>
							
							<?php if(etheme_get_option('search_form')): ?>
								<?php etheme_search_form(); ?>
							<?php endif; ?>
						</div>
							
					</div>
				</div>
			</div>
		<?php endif ?>
		
		<?php get_template_part('headers/header-structure', $hstrucutre); ?>