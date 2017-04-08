<?php
/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package i-amaze
 * @since i-amaze 1.0
 */
?>
<?php


$bg_style = '';
$top_phone = '';
$top_email = '';

$top_phone = esc_attr(get_theme_mod('top_phone', ''));
$top_email = esc_attr(get_theme_mod('top_email', ''));
//$iamaze_logo = get_theme_mod( 'logo', get_template_directory_uri().'/images/logo.png' );
//$iamaze_logo_trans = get_theme_mod( 'logo-trans', get_template_directory_uri().'/images/logo-trans.png' );
$iamaze_logo_trans = get_theme_mod( 'logo-trans' );

$custom_logo_id = get_theme_mod( 'custom_logo' );
$custom_logo_image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
$custom_logo_image = $custom_logo_image[0];

global $post; 

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
<body <?php body_class(); ?> style=" <?php echo $bg_style; ?> ">
	<div id="page" class="hfeed site">

    	<div class="pacer-cover"></div>

        <?php if ( $top_email || $top_phone || iamaze_social_icons() ) : ?>
    	<div id="utilitybar" class="utilitybar">
        	<div class="ubarinnerwrap">
                <div class="socialicons">
                    <?php echo iamaze_social_icons(); ?>
                </div>
                <?php if ( !empty($top_phone) ) : ?>
                <div class="topphone">
                    <i class="topbarico genericon genericon-phone"></i>
                    <?php _e('Call us : ','i-amaze'); ?> <?php echo esc_attr($top_phone); ?>
                </div>
                <?php endif; ?>
                
                <?php if ( !empty($top_email) ) : ?>
                <div class="topphone">
                    <i class="topbarico genericon genericon-mail"></i>
                    <?php _e('Mail us : ','i-amaze'); ?> <?php echo sanitize_email($top_email); ?>
                </div>
                <?php endif; ?>                
            </div> 
        </div>
        <?php endif; ?>
        
        <div class="headerwrap">
            <header id="masthead" class="site-header" role="banner">
         		<div class="headerinnerwrap">
					<?php if ( $iamaze_logo_trans && $custom_logo_image ) : ?>
                        <a class="home-link" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
                            <span>
                            	<?php if ( $custom_logo_image ) : ?><img src="<?php echo esc_url($custom_logo_image); ?>" alt="<?php bloginfo( 'name' ); ?>" class="iamaze-logo normal-logo" /> <?php endif; ?>
                                <?php if ( $iamaze_logo_trans ) : ?><img src="<?php echo esc_url($iamaze_logo_trans); ?>" alt="<?php bloginfo( 'name' ); ?>" class="iamaze-logo trans-logo" /><?php endif; ?>
                            </span>
                        </a>
                    <?php elseif ( $custom_logo_image ) : ?>
                        <a class="home-link" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
                            <span>
                            	<?php if ( $custom_logo_image ) : ?><img src="<?php echo esc_url($custom_logo_image); ?>" alt="<?php bloginfo( 'name' ); ?>" class="iamaze-logo" /> <?php endif; ?>
                            </span>
                        </a>     
                    <?php elseif ( $iamaze_logo_trans ) : ?>
                        <a class="home-link" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
                            <span>
                                <?php if ( $iamaze_logo_trans ) : ?><img src="<?php echo esc_url($iamaze_logo_trans); ?>" alt="<?php bloginfo( 'name' ); ?>" class="iamaze-logo" /><?php endif; ?>
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
        
                    <div id="navbar" class="navbar">
                        <nav id="site-navigation" class="navigation main-navigation" role="navigation">
                            <h3 class="menu-toggle"><?php _e( 'Menu', 'i-amaze' ); ?></h3>
                            <a class="screen-reader-text skip-link" href="#content" title="<?php esc_attr_e( 'Skip to content', 'i-amaze' ); ?>"><?php _e( 'Skip to content', 'i-amaze' ); ?></a>
                            <?php 
								if ( has_nav_menu(  'primary' ) ) {
										wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu', 'container_class' => 'nav-container', 'container' => 'div' ) );
									}
									else
									{
										wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-container' ) ); 
									}
								?>
							
                        </nav><!-- #site-navigation -->
                        <div class="topsearch">
                            <?php get_search_form(); ?>
                        </div>
                    </div><!-- #navbar -->
                    <div class="clear"></div>
                </div>
            </header><!-- #masthead -->
        </div>
        
        <!-- #Banner -->
        <?php
		
			$hide_title = $show_slider = $other_slider = $custom_title = $hide_breadcrumb = "";
			
		if ( function_exists( 'rwmb_meta' ) ) {
			
			$hide_title = rwmb_meta('iamaze_hidetitle');
			$show_slider = rwmb_meta('iamaze_show_slider');
			$other_slider = rwmb_meta('iamaze_other_slider');
			$custom_title = rwmb_meta('iamaze_customtitle');
			$hide_breadcrumb = rwmb_meta('iamaze_hide_breadcrumb');
		}

		
		$hide_front_slider = get_theme_mod('slider_stat', 1);
		$other_front_slider = get_theme_mod('blogslide_scode', '');
		$itrans_slogan = esc_attr(get_theme_mod('banner_text', ''));
		
		$other_slider = esc_html($other_slider);
		$other_front_slider = esc_html($other_front_slider);
		
		if( $other_slider ) :
		?>
		
        <div class="other-slider" style="">
	       	<?php echo do_shortcode( htmlspecialchars_decode($other_slider) ) ?>
        </div>
        <?php //elseif ( is_front_page() )  : ?>
		
		<?php	
		elseif ( is_home() && !is_paged() || $show_slider ) : 
		?>
            <?php //iamaze_ibanner_slider(); ?>
            <?php if (!empty( $other_front_slider )) : ?>
            	<?php echo do_shortcode( htmlspecialchars_decode($other_front_slider) ) ?>
        	<?php elseif ( !$hide_front_slider || $show_slider ) : ?>
            	<?php iamaze_ibanner_slider(); ?>
        	<?php else : ?>
            <div class="iheader" style="">
        
                <div class="titlebar">
                    <h1 class="entry-title">
                        <?php
                            if ( !empty($itrans_slogan) ) {
                                echo esc_attr( $itrans_slogan );
                            }
                        ?>	                 
                    </h1>
                </div>
            </div>
                                          
        	<?php endif; ?>            
            
        <?php 
		elseif(!$hide_title) : 
		?>
        
        <div class="iheader" style="">
        	<div class="titlebar">
            	
                <?php
					if( is_archive() )
					{
						echo '<h1 class="entry-title">';
							echo the_archive_title();                						
						echo '</h1>';
					} elseif ( is_search() )
					{
						echo '<h1 class="entry-title">';
							printf( __( 'Search Results for: %s', 'i-amaze' ), get_search_query() );					
						echo '</h1>';
					} else
					{
						if ( !empty($custom_title) )
						{
							echo '<h1 class="entry-title">'.esc_attr($custom_title).'</h1>';
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

