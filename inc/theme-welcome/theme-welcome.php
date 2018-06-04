<?php


if (isset($_GET['activated']) && is_admin()) {
	set_transient( '_welcome_screen_activation_redirect', true, 30 );
}

add_action( 'admin_init', 'welcome_screen_do_activation_redirect' );
function welcome_screen_do_activation_redirect() {
  // Bail if no activation redirect
    if ( ! get_transient( '_welcome_screen_activation_redirect' ) ) {
    return;
  }

  // Delete the redirect transient
  delete_transient( '_welcome_screen_activation_redirect' );

  // Bail if activating from network, or bulk
  if ( is_network_admin() || isset( $_GET['activate-multi'] ) ) {
    return;
  }

  // Redirect to bbPress about page
  wp_safe_redirect( add_query_arg( array( 'page' => 'welcome-screen-about' ), admin_url( 'themes.php' ) ) );

}

add_action('admin_menu', 'welcome_screen_pages');

function welcome_screen_pages() {
	add_theme_page(
		'Welcome To Welcome i-amaze',
		'About i-amaze',
		'read',
		'welcome-screen-about',
		'welcome_screen_content',
		'dashicons-awards', 
		6 		
	);
}

function welcome_screen_content() {
	
	include get_template_directory() . '/inc/theme-welcome/tw-content.php';
	include get_template_directory() . '/inc/theme-welcome/tw-functions.php';	
	
	$logo_url = get_template_directory_uri() . '/inc/theme-welcome/i-amaze-welcome.jpg';
	$img_url = get_template_directory_uri() . '/inc/theme-welcome/images/';
	$active_tab = 'iamaze_about';
	
	/* Urls */
	$reviewURL = esc_url('//wordpress.org/support/theme/i-amaze/reviews/?filter=5');
	$goPremiumURL = esc_url('//templatesnext.org/ispirit/landing/');
	$videoguide = esc_url('//templatesnext.in/i-amaze-documentation/');
	$supportforum = esc_url('//wordpress.org/support/theme/i-amaze'); 
	$toolkit = esc_url('//templatesnext.in/templatesnext-onepager/');
	$fb_page = esc_url('//www.facebook.com/templatesnext/');

	$ocdi_buttont = "";
	if ( class_exists('OCDI_Plugin') ) {
		$ocdi_buttont = "button-enabled";
	} else
	{
		$ocdi_buttont = "button-disabled";
	} 	
	$details_theme = wp_get_theme();
	$name_version = $details_theme->get( 'Name' ) . " - " . $details_theme->get( 'Version' );
  	?>
  	<div class="wrapp">
        <div class="nx-info-wrap-2 welcome-panel">
        	
        	<div class="nx-info-wrap">
            	
                <div class="nx-welcome"><?php esc_attr_e( 'Welcome To ', 'i-amaze' ); echo esc_attr($name_version); ?></div>
                <div class="tx-wspace-24"></div>
                <div class="tx-wspace-24"></div>                
                <div class="welcome-logo"><img src="<?php echo $logo_url; ?>" alt="" class="welcome-logo-img" width="" /></div>
                <div class="nx-info-desc">
                    <p>
						<?php _e( 'Congratulations! You are about to use one of the most flexible and easy to customize OnePage WordPress theme.', 'i-amaze' ); ?>
                    </p>
                    <p>
                    	<a class="" href="<?php echo admin_url(); ?>themes.php?page=tgmpa-install-plugins">
                        <?php _e( 'Install Recommended Plugins', 'i-amaze' ); ?>
                        </a> 
                        <?php _e( '"<b>TemplatesNext OnePager</b>" and <b>Kick start your website</b>. Setting up i-amaze is extremely easy and fun.', 'i-amaze' ); ?>
					</p>
                    <p>
                    	<?php _e( '<b>TemplatesNext OnePager</b> helps you build your site in minutes.', 'i-amaze' ); ?>
                    </p>
                    <?php
					
						$pluginLocation = rawurlencode('templatesnext-onepager/tx-onepager.php');
						$nonce_install = iamaze_plugin_install('templatesnext-onepager');
						$pluginLink = iamaze_plugin_activation( $pluginLocation, 'templatesnext-onepager', 'tx-onepager.php' );
						
						if ( is_plugin_active( 'templatesnext-onepager/tx-onepager.php' ) ) {
							echo '<a href="#" class="button disabled button-hero">' . __( 'Plugin installed and active', 'i-amaze' ) . '</a>';  
						} elseif( iamaze_is_plugin_installed('TemplatesNext OnePager') == false )
						{
							echo '<a data-slug="templatesnext-onepager" data-active-lebel="' . __( 'Installing...', 'i-amaze' ) . '" class="install-now button button-hero" href="' . esc_url( $nonce_install ) . '" data-name="templatesnext-onepager" aria-label="Install templatesnext-onepager">' . __( 'Install and activate', 'i-amaze' ) . '</a>';
							} else
						{
							echo '<a class="button activate-now button-primary button-hero" data-active-lebel="' . __( 'Activating...', 'i-amaze' ) . '" data-slug="templatesnext-onepager" href="' . esc_url( $pluginLink ) . '" aria-label="Activate templatesnext-onepager">' . __( 'Activate OnePager', 'i-amaze' ) . '</a>';
						}
					?>				
                    <a class="button button-primary button-hero" href="<?php echo $reviewURL; ?>">
                    <?php _e( 'Post Your Review', 'i-amaze' ); ?>
                    </a>                                                          
                </div>
                <div class="tx-wspace-12"></div>
                <div class="nx-admin-row">
                	<div class="one-four-col">
                    	<a href="<?php echo $videoguide; ?>" target="_blank">
                            <div class="nx-dash"><span class="dashicons dashicons-video-alt2"></span></div>
                            <h3 class="tx-admin-link"><?php _e( 'Documentation', 'i-amaze' ); ?></h3>
                        </a>
                    </div>
                	<div class="one-four-col">
                    	<a href="<?php echo $supportforum; ?>" target="_blank">
                            <div class="nx-dash"><span class="dashicons dashicons-format-chat"></span></div>
                            <h3 class="tx-admin-link"><?php _e( 'Support Forum', 'i-amaze' ); ?></h3>
                        </a>
                    </div>
                    <!-- 
                	<div class="one-four-col">
                    	<a href="<?php echo $toolkit; ?>" target="_blank">
                            <div class="nx-dash"><span class="dashicons dashicons-migrate"></span></div>
                            <h3 class="tx-admin-link"><?php _e( 'TemplatesNext OnePager', 'i-amaze' ); ?></h3>
                        </a>
                    </div>
                	--> 
                    <div class="one-four-col">
                    	<a href="<?php echo $fb_page; ?>" target="_blank">
                            <div class="nx-dash"><span class="dashicons dashicons-facebook-alt"></span></div>
                            <h3 class="tx-admin-link"><?php _e( 'Community', 'i-amaze' ); ?></h3>
                        </a>
                    </div>                                                            
                </div>
                <div class="tx-wspace-24"></div>
                <?php
					if( isset( $_GET[ 'tab' ] ) ) {
						$active_tab = $_GET[ 'tab' ];
					}
				?>
                <h2 class="nav-tab-wrapper">
                    <a href="?page=welcome-screen-about&tab=iamaze_about" class="nav-tab <?php echo $active_tab == 'iamaze_about' ? 'nav-tab-active' : ''; ?>">
                   		<?php _e( 'Setting Up i-amaze', 'i-amaze' ); ?>
                    </a>
                    <a href="?page=welcome-screen-about&tab=iamaze_plugins" class="nav-tab <?php echo $active_tab == 'iamaze_plugins' ? 'nav-tab-active' : ''; ?> nx-kick">
                    	<?php _e( 'Plugins', 'i-amaze' ); ?>
                    </a>
                    <a href="?page=welcome-screen-about&tab=iamaze_faq" class="nav-tab <?php echo $active_tab == 'iamaze_faq' ? 'nav-tab-active' : ''; ?> nx-plug">
                    	<?php _e( 'FAQs/Support', 'i-amaze' ); ?>
                    </a>
                </h2>
                
                <?php
					if( $active_tab == 'iamaze_about' )
					{
				?> 
                	<div class="nx-tab-content">
                		<p>&nbsp;</p>
                        <ol>
							<li>
								<b>
									<?php esc_attr_e('Install Plugins : ', 'i-amaze' ); ?>
                                </b>
								<?php 
									printf( __( 'To install and activate all the recommended plugins at once, go to menu "Appearance" > "<a href="%sthemes.php?page=tgmpa-install-plugins">Install Plugins</a>".', 'i-amaze' ), admin_url() );
								?>
							</li>
							<li>
								<b>
									<?php esc_attr_e('Start Customizing : ', 'i-amaze' ); ?>
                                </b>
								<?php 
									printf( __( 'To start setting up your theme go to menu "Appearance" > "<a href="%scustomize.php">Customize</a>".', 'i-amaze' ), admin_url() );
								?>                            
							</li>
							<li>
								<b>
									<?php esc_attr_e('Add/Edit Sections : ', 'i-amaze' ); ?>
                                </b>
								<?php 
									printf( __( 'In customizer panel, go to section "Home Sections Activation/Order", and turn ON and OFF the sectiones. Start replacing contents and adjusting settings according to your reqirements.', 'i-amaze' ), admin_url() );
								?>                            
							</li>                            
                        </ol>
        			</div>
				<?php		
					} elseif ( $active_tab == 'iamaze_plugins' )
					{
				?>     
                	<div class="nx-tab-content"> 
                		<p>&nbsp;</p>
                        <ol>
							<?php
			
								foreach ($tx_plugins as $plugin) {
									
									$pluginLocation = rawurlencode($plugin['slug'].'/'.$plugin['pluginfile']);
									$pluginLink = iamaze_plugin_activation( $pluginLocation, $plugin['slug'], $plugin['pluginfile'] );
									$nonce_install = iamaze_plugin_install($plugin['slug']);
															
									
									echo '<li><b>'.$plugin['name'].'</b><br />';
									echo $plugin['desc'].'<br />';
									echo _e( 'Plugin URL : ', 'i-amaze' ).'<a href="'.$plugin['pluginurl'].'" target="_blank">'.$plugin['pluginurl'].'</a><br />';
									if(!empty($plugin['tutorial']))
									{
										echo _e( 'Tutorial : ', 'i-amaze' ).'<a href="'.$plugin['tutorial'].'" target="_blank">'.$plugin['tutorial'].'</a><br />';   
									}
									
									$pluginTitle = $plugin['title'];
									if ( is_plugin_active( $plugin['slug'].'/'.$plugin['pluginfile'] ) ) {
										echo '<a href="#" class="button disabled">' . __( 'Plugin installed and active', 'i-amaze' ) . '</a>';  
									} elseif( iamaze_is_plugin_installed($pluginTitle) == false )
									{
										echo '<a data-slug="' . $plugin['slug'] . '" data-active-lebel="' . __( 'Installing...', 'i-amaze' ) . '" class="install-now button" href="' . esc_url( $nonce_install ) . '" data-name="' . $plugin['slug'] . '" aria-label="Install ' . $plugin['slug'] . '">' . __( 'Install and activate', 'i-amaze' ) . '</a>';
									} else
									{
										echo '<a class="button activate-now button-primary" data-active-lebel="' . __( 'Activating...', 'i-amaze' ) . '" data-slug="' . $plugin['slug'] . '" href="' . esc_url( $pluginLink ) . '" aria-label="Activate ' . $plugin['slug'] . '">Activate</a>';
									}
									
									echo '</li>';
									
								}
                            ?>                    
                        </ol>
        			</div>       
                        
				<?php	
					} elseif ( $active_tab == 'iamaze_faq' )
					{
				?>     
                	<div class="nx-tab-content"> 
                		<p>&nbsp;</p>
                        <?php
							foreach ($tx_faqs as $faq) {
								echo '<b>'._e( 'Q. ', 'i-amaze' ).$faq['question'].'</b><br />';
								echo _e( 'A. ', 'i-amaze' ).$faq['answeer'].'<br /><br />';									   
							}
                        ?>                    
                        
        			</div>      
                        
				<?php	
					}
				?>
  
                <div class="tx-wspace-24"></div><div class="tx-wspace-24"></div>    
 	
            </div>

                <div id="dashboard_right_now" class="postbox" style="display: block; float: right; width: 33%; max-width: 320px; margin: 16px;">
                    <h2 class="hndle nxw-title" style="padding: 12px 24px;"><span><?php echo $review_pop['title']; ?></span></h2>
                    <div class="inside">
                        <div class="main" style="padding: 24px;">
							<?php echo $review_pop['desc']; ?>
                    		<a class="button button-primary button-hero" target="_blank" href="<?php echo $reviewURL; ?>">
                            	<?php echo $review_pop['link']; ?>
                            </a> 
                            <?php echo $review_pop['conclusion']; ?>
                        </div>
                    </div>
                </div>   

            <div class="tx-wspace"></div>
        
            
            
        </div>
        
  	</div>
  
  	<?php
}

add_action( 'admin_head', 'welcome_screen_remove_menus' );
function welcome_screen_remove_menus() {
    remove_submenu_page( 'index.php', 'welcome-screen-about' );
}


// Add Stylesheet
add_action( 'admin_enqueue_scripts', 'iamaze_welcome_scripts' );
function iamaze_welcome_scripts() {
	wp_enqueue_style( 'nx-welcome-style', get_template_directory_uri() . '/inc/theme-welcome/css/nx-welcome.css', array(), '1.01' );
	wp_enqueue_script( 'nx-welcome-script', get_template_directory_uri() . '/inc/theme-welcome/js/nx-welcome.js' );
}
