<?php
/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package i-amaze
 * @since i-amaze 1.0
 */
$top_phone = '';
$top_email = '';
$video_id = '';
$alt_navigation = 0;

$top_phone = esc_attr(get_theme_mod('top_phone', '1-000-123-4567'));
$top_email = sanitize_email(get_theme_mod('top_email', 'email@example.com'));
$show_search = get_theme_mod('show_search', 1);
$alt_front_nav = get_theme_mod('alt_menu', 0);

$iamaze_logo_trans = get_theme_mod( 'logo-trans', '' );
$custom_logo_id = get_theme_mod( 'custom_logo' );
$custom_logo_image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
$custom_logo_image = $custom_logo_image[0];

global $post;

$no_page_header = 0;
if ( function_exists( 'rwmb_meta' ) ) {
	if(rwmb_meta( 'iamaze_page_logo_normal' ))
	{
		$custom_logo_normal = rwmb_meta( 'iamaze_page_logo_normal', '' );
		$custom_logo_image = $custom_logo_normal['full_url'];
	}
	if(rwmb_meta( 'iamaze_page_logo_trans' ))
		{
		$custom_logo_reverse = rwmb_meta( 'iamaze_page_logo_trans', '' );
		$iamaze_logo_trans = $custom_logo_reverse['full_url'];
	}
	
	$alt_navigation = rwmb_meta('iamaze_alt_navigation');
	$no_page_header = rwmb_meta('iamaze_no_page_header');
}

if(has_header_video())
{
	$video_id = iamaze_get_video_id(esc_url(get_header_video_url()));
}

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?> style="">
	<?php if( get_theme_mod('pre_loader', 1) == 1 ) { ?>	
	<div class="nx-ispload">
        <div class="nx-ispload-wrap">
            <div class="spinner">
              <div class="dot1"></div>
              <div class="dot2"></div>
            </div>
        </div>    
    </div>
	<?php } ?>
	<div id="page" class="hfeed site">

    	<div class="pacer-cover"></div>

        <?php if ( $top_email || $top_phone || iamaze_social_icons() ) : ?>
    	<div id="utilitybar" class="utilitybar">
        	<div class="ubarinnerwrap">
                <div class="socialicons">
                    <?php echo iamaze_social_icons(); ?>
                </div>
                <?php if ( !empty($top_phone) ) : ?>
                <div class="topphone tx-topphone">
                    <i class="topbarico genericon genericon-phone"></i>
                    <?php esc_html_e('Call us : ','i-amaze'); ?> <?php echo $top_phone; ?>
                </div>
                <?php endif; ?>
                
                <?php if ( !empty($top_email) ) : ?>
                <div class="topphone top_email">
                    <i class="topbarico genericon genericon-mail"></i>
                    <?php esc_html_e('Mail us : ','i-amaze'); ?> <?php echo $top_email; ?>
                </div>
                <?php endif; ?>                
            </div> 
        </div>
        <?php endif; ?>
        
        <?php if ( $no_page_header == 0 ) : ?>
        <div class="headerwrap">
            <header id="masthead" class="site-header" role="banner">
         		<div class="headerinnerwrap">

					<?php if ( $iamaze_logo_trans && $custom_logo_image ) : ?>
                        <a class="home-link" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
                            <span>
                            	<?php if ( $custom_logo_image ) : ?><img src="<?php echo esc_url($custom_logo_image); ?>" class="iamaze-logo normal-logo" /> <?php endif; ?>
                                <?php if ( $iamaze_logo_trans ) : ?><img src="<?php echo esc_url($iamaze_logo_trans); ?>" class="iamaze-logo trans-logo" /><?php endif; ?>
                            </span>
                        </a>
                    <?php elseif ( $custom_logo_image ) : ?>
                        <a class="home-link" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
                            <span>
                            	<?php if ( $custom_logo_image ) : ?><img src="<?php echo esc_url($custom_logo_image); ?>" class="iamaze-logo" /> <?php endif; ?>
                            </span>
                        </a>     
                    <?php elseif ( $iamaze_logo_trans ) : ?>
                        <a class="home-link" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
                            <span>
                                <?php if ( $iamaze_logo_trans ) : ?><img src="<?php echo esc_url($iamaze_logo_trans); ?>" class="iamaze-logo" /><?php endif; ?>
                            </span>
                        </a>                                                
                    <?php else : ?>
                        <span id="site-titlendesc">
                            <a class="home-link" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
                                <h1 class="site-title"><?php bloginfo( 'name' ); ?></h1>
                                <h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>   
                            </a>
                        </span>
                    <?php endif; ?>	                    
        				<div class="nx-logo-shortcut" data-addtrans-logo="<?php esc_attr_e( 'Add Transparent Logo', 'i-amaze' ); ?>"></div>
                    <div id="navbar" class="navbar">
                        <nav id="site-navigation" class="navigation main-navigation" role="navigation">
                            <h3 class="menu-toggle"><?php esc_attr_e( 'Menu', 'i-amaze' ); ?></h3>
                            <a class="screen-reader-text skip-link" href="#content" title="<?php esc_attr_e( 'Skip to content', 'i-amaze' ); ?>"><?php esc_attr_e( 'Skip to content', 'i-amaze' ); ?></a>
                            <?php 
								if( $alt_navigation == 1 || ( is_front_page() && $alt_front_nav == 1 ) ) {
									if ( has_nav_menu(  'alt-primary' ) ) {
										wp_nav_menu( array( 'theme_location' => 'alt-primary', 'menu_class' => 'nav-menu', 'container_class' => 'nav-container', 'container' => 'div' ) );
									} else
									{
										wp_nav_menu( array( 'theme_location' => 'alt-primary', 'menu_class' => 'nav-container' ) ); 
									}									
								} else {
									if ( has_nav_menu(  'primary' ) ) {
										wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu', 'container_class' => 'nav-container', 'container' => 'div' ) );
									} else
									{
										wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-container' ) ); 
									}
								}
							?>							
                        </nav><!-- #site-navigation -->

                        <?php
                        global $woocommerce;
						$show_cart = get_theme_mod('show_cart', 0);
                        if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) && $show_cart == 1 ) {
                        ?>
                        <div class="header-iconwrap">
                            <div class="header-icons woocart">
                                <a href="<?php echo wc_get_cart_url(); ?>" >
                                    <span class="show-sidr"><?php _e('Cart','i-amaze'); ?></span>
                                    <span class="genericon genericon-cart"></span>
                                    <span class="cart-counts"><?php echo sprintf($woocommerce->cart->cart_contents_count); ?></span>
                                </a>
                                <?php echo iamaze_top_cart(); ?>
                            </div>
                        </div>     
                        <?php	
                        }
                        ?>
                                                
                        <?php if( $show_search == 1 ) { ?>
                        <div class="topsearch">
                            <?php get_search_form(); ?>
                        </div>
                        <?php } ?>
                    </div><!-- #navbar -->
                    <div class="clear"></div>
                </div>
            </header><!-- #masthead -->
        </div>
        <?php endif; ?>
        
        <!-- #Banner -->
        <?php
		
		$hide_title = $header_type = $other_slider = $custom_title = $hide_breadcrumb = $image_header_overlay = $overlay_class = $smart_slider_3 = "";
		if ( function_exists( 'rwmb_meta' ) ) {
			$hide_title = rwmb_meta('iamaze_hidetitle');
			$header_type = rwmb_meta('iamaze_header_type');
			$other_slider = rwmb_meta('iamaze_other_slider');
			$custom_title = rwmb_meta('iamaze_customtitle');
			$hide_breadcrumb = rwmb_meta('iamaze_hide_breadcrumb');
			$smart_slider_3 = rwmb_meta('iamaze_smart_slider');	
		}

		$hide_front_slider = get_theme_mod('slider_stat', 0);
		$other_front_slider = get_theme_mod('blogslide_scode', '');
		$itrans_slogan = esc_attr(get_theme_mod('banner_text', get_bloginfo( 'description' )));
		$itrans_subslogan = esc_attr(get_theme_mod('tagline_two', ''));
		$blog_header_heigh = esc_attr(get_theme_mod('blog_header_height', 100));
		$image_header_overlay = get_theme_mod('header_overlay', 1);
		
		$other_slider = esc_html($other_slider);
		$other_front_slider = esc_html($other_front_slider);
		
		if( $image_header_overlay == 1 ) {
			$overlay_class = "chekered";
		} else 	{
			$overlay_class = "no-overlay";
		}
		
		if( !empty($smart_slider_3) ) {
			$other_slider = '[smartslider3 slider='.$smart_slider_3.']';
		}
		
		if( $other_slider ) :
		?>
		
        <div class="other-slider" style="">
	       	<?php echo do_shortcode( htmlspecialchars_decode($other_slider) ) ?>
        </div>
		
		<?php
	
		elseif ( ( is_home() && !is_paged() ) || $header_type == '2' || $header_type == '3' ) : 
		?>
            <?php if ( !empty($other_front_slider) && is_home() ) : ?>
            <div id="ibanner">
            	<?php echo do_shortcode( htmlspecialchars_decode($other_front_slider) ) ?>
            </div>    
        	<?php elseif ( ( is_home() && $hide_front_slider != 0 ) || $header_type == '3' ) : ?>
            <div id="ibanner">
            	<?php iamaze_ibanner_slider(); ?>
            </div>
           
        	<?php else : ?>
            <div class="iheader ibanner hideubar <?php echo $overlay_class; ?>" id="ibanner" data-header-height="<?php echo $blog_header_heigh; ?>" data-video-id="<?php echo esc_attr($video_id); ?>" data-edittext="<?php esc_attr_e( 'Switch Slider', 'i-amaze' ); ?>" data-editheader="<?php esc_attr_e( 'Change Background Image/Video', 'i-amaze' ); ?>">
            	<div class="imagebg" style="background-image: url('<?php header_image(); ?>');"></div>
				<?php if( $video_id ) : ?>         
                <div class="video-background">
                    <div class="video-foreground">
                    </div>
                </div>
				<?php elseif ( has_header_video() ) : ?>
                <div class="video-background">
                	<div class="video-foreground">
                        <video width="100%" height="100%" autoplay loop>
                            <source src="<?php echo esc_url(get_header_video_url()); ?>" type="video/mp4">
                            <img src="<?php header_image(); ?>" alt="">
                        </video>
                    </div>                
                </div>             
                <?php endif; ?> 
                <div class="titlebar vtitle-tagline">
                    <h1 class="entry-title">
                        <?php
                            if ($itrans_slogan) {
                                echo htmlspecialchars_decode($itrans_slogan);
                            }
                        ?>	                 
                    </h1>
                    <div class="sub-tagline">
                    	<?php
                    		if($itrans_subslogan) 	{
								echo $itrans_subslogan;
							}
						?>
                    </div>
                </div>
            </div>                                    
        	<?php endif; ?>            
            
        <?php 
		elseif( $header_type != '0' ) : 
		?>
        <div class="iheader nx-titlebar" style="">
        	<div class="titlebar">
            	
                <?php
					if( is_archive() )
					{
						echo '<h1 class="entry-title">';
								the_archive_title();                						
						echo '</h1>';
					} elseif ( is_search() )
					{
						echo '<h1 class="entry-title">';
							esc_attr(printf( __( 'Search Results for: %s', 'i-amaze' ), get_search_query() ));					
						echo '</h1>';
					} else
					{
						if ( !empty($custom_title) )
						{
							echo '<h1 class="entry-title">'.esc_html($custom_title).'</h1>';
						}
						else
						{
							echo '<h1 class="entry-title">';
							the_title();
							echo '</h1>';
						}						
					}

            	?>
				<?php 
				
                    if(function_exists('bcn_display') && !$hide_breadcrumb )
                    {
				?>
                	<div class="nx-breadcrumb">
                <?php
                        bcn_display();
				?>
                	</div>
                <?php		
                    } 
                ?>               
            <div class="clear"></div>	
            </div>
        </div>
        
		<?php endif; ?>
		<div id="main" class="site-main">

