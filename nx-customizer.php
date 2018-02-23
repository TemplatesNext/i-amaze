<?php

function iamaze_customizer_config() {
	

    /**
     * If you need to include Kirki in your theme,
     * then you may want to consider adding the translations here
     * using your textdomain.
     * 
     * If you're using Kirki as a plugin then you can remove these.
     */

    $strings = array(
        'background-color' => __( 'Background Color', 'i-amaze' ),
        'background-image' => __( 'Background Image', 'i-amaze' ),
        'no-repeat' => __( 'No Repeat', 'i-amaze' ),
        'repeat-all' => __( 'Repeat All', 'i-amaze' ),
        'repeat-x' => __( 'Repeat Horizontally', 'i-amaze' ),
        'repeat-y' => __( 'Repeat Vertically', 'i-amaze' ),
        'inherit' => __( 'Inherit', 'i-amaze' ),
        'background-repeat' => __( 'Background Repeat', 'i-amaze' ),
        'cover' => __( 'Cover', 'i-amaze' ),
        'contain' => __( 'Contain', 'i-amaze' ),
        'background-size' => __( 'Background Size', 'i-amaze' ),
        'fixed' => __( 'Fixed', 'i-amaze' ),
        'scroll' => __( 'Scroll', 'i-amaze' ),
        'background-attachment' => __( 'Background Attachment', 'i-amaze' ),
        'left-top' => __( 'Left Top', 'i-amaze' ),
        'left-center' => __( 'Left Center', 'i-amaze' ),
        'left-bottom' => __( 'Left Bottom', 'i-amaze' ),
        'right-top' => __( 'Right Top', 'i-amaze' ),
        'right-center' => __( 'Right Center', 'i-amaze' ),
        'right-bottom' => __( 'Right Bottom', 'i-amaze' ),
        'center-top' => __( 'Center Top', 'i-amaze' ),
        'center-center' => __( 'Center Center', 'i-amaze' ),
        'center-bottom' => __( 'Center Bottom', 'i-amaze' ),
        'background-position' => __( 'Background Position', 'i-amaze' ),
        'background-opacity' => __( 'Background Opacity', 'i-amaze' ),
        'ON' => __( 'ON', 'i-amaze' ),
        'OFF' => __( 'OFF', 'i-amaze' ),
        'all' => __( 'All', 'i-amaze' ),
        'cyrillic' => __( 'Cyrillic', 'i-amaze' ),
        'cyrillic-ext' => __( 'Cyrillic Extended', 'i-amaze' ),
        'devanagari' => __( 'Devanagari', 'i-amaze' ),
        'greek' => __( 'Greek', 'i-amaze' ),
        'greek-ext' => __( 'Greek Extended', 'i-amaze' ),
        'khmer' => __( 'Khmer', 'i-amaze' ),
        'latin' => __( 'Latin', 'i-amaze' ),
        'latin-ext' => __( 'Latin Extended', 'i-amaze' ),
        'vietnamese' => __( 'Vietnamese', 'i-amaze' ),
        'serif' => _x( 'Serif', 'font style', 'i-amaze' ),
        'sans-serif' => _x( 'Sans Serif', 'font style', 'i-amaze' ),
        'monospace' => _x( 'Monospace', 'font style', 'i-amaze' ),
    );	

	$args = array(
  
        // Change the logo image. (URL) Point this to the path of the logo file in your theme directory
                // The developer recommends an image size of about 250 x 250
        'logo_image'   => get_template_directory_uri() . '/images/logo.png',
  
        // The color of active menu items, help bullets etc.
        'color_active' => '#95c837',
		
		// Color used on slider controls and image selects
		//'color_accent' => '#dd9933',
		
		// The generic background color
		//'color_back' => '#f7f7f7',
	
        // Color used for secondary elements and desable/inactive controls
        'color_light'  => '#e7e7e7',
  
        // Color used for button-set controls and other elements
        'color_select' => '#34495e',
		 
        
        // For the parameter here, use the handle of your stylesheet you use in wp_enqueue
        'stylesheet_id' => 'customize-styles', 
		
        // Only use this if you are bundling the plugin with your theme (see above)
        //'url_path'     => get_template_directory_uri() . '/inc/kirki/',

        'textdomain'   => 'i-amaze',
		
        'i18n'         => $strings,		
		
		
	);
	
	if ( !class_exists( 'Kirki' ) ) {
		$args['url_path'] = get_template_directory_uri() . '/inc/kirki/';
	}

	
	
	return $args;
}
add_filter( 'kirki/config', 'iamaze_customizer_config' );


/**
 * Create the customizer panels and sections
 */
add_action( 'customize_register', 'iamaze_add_panels_and_sections' ); 
function iamaze_add_panels_and_sections( $wp_customize ) {
	
	/*
	* Add panels
	*/
	
	$wp_customize->add_panel( 'slider', array(
		'priority'    => 140,
		'title'       => __( 'Slider', 'i-amaze' ),
		'description' => __( 'Slides details', 'i-amaze' ),
	));
	
	$wp_customize->add_panel( 'rmenu', array(
		'priority'    => 130,
		'title'       => __( 'Responsive Menu', 'i-amaze' ),
		'description' => __( 'Responsive Menu Options', 'i-amaze' ),
	) );		

    /**
     * Add Sections
     */
    $wp_customize->add_section('basic', array(
        'title'    => __('Basic Settings', 'i-amaze'),
        'description' => '',
        'priority' => 130,
    ));
	
	$wp_customize->add_section('slides', array(
        'title'    => __('Slides', 'i-amaze'),
        'description' => '',
        'panel' => 'slider',		
        'priority' => 140,
    ));		
	
    $wp_customize->add_section('layout', array(
        'title'    => __('Layout Options', 'i-amaze'),
        'description' => '',
        'priority' => 130,
    ));	
	
    $wp_customize->add_section('social', array(
        'title'    => __('Social Links', 'i-amaze'),
        'description' => __('Insert full URL of your social link including &#34;http://&#34; replacing #, Empty the fileld if not using the link.', 'i-amaze'),
        'priority' => 130,
    ));		
	
    $wp_customize->add_section('blogpage', array(
        'title'    => __('Default Blog Page', 'i-amaze'),
        'description' => '',
        'priority' => 130,
    ));	
	
	// slider sections
	
	$wp_customize->add_section('slidersettings', array(
        'title'    => __('Slide Settings', 'i-amaze'),
        'description' => '',
        'panel' => 'slider',		
        'priority' => 140,
    ));		
	
	// promo sections
	
	$wp_customize->add_section('nxpromo', array(
        'title'    => __('More About i-amaze', 'i-amaze'),
        'description' => '',
        'priority' => 170,
    ));	
	
	// Responsive Menu sections
	
	$wp_customize->add_section('rmgeneral', array(
        'title'    => __('General Options', 'i-amaze'),
        'panel' => 'rmenu',		
        'description' => '',
        'priority' => 170,
    ));	
	
    $wp_customize->add_section('rmsettings', array(
        'title'    => __('Menu Appearance', 'i-amaze'),
        'panel' => 'rmenu',
        'description' => '',
        'priority' => 180,
    ));						
	
}


function iamaze_custom_setting( $controls ) {
	
    $controls[] = array(
        'type'     => 'text',
        'settings'  => 'top_phone',
        'label'    => __( 'Phone Number', 'i-amaze' ),
        'section'  => 'basic',
        'default'  => '1-000-123-4567',
        'priority' => 1,
		'description' => __( 'Phone number that appears on top bar.', 'i-amaze' ),
    );
	
    $controls[] = array(
        'type'     => 'text',
        'settings'  => 'top_email',
        'label'    => __( 'Email Address', 'i-amaze' ),
        'section'  => 'basic',
        'default'  => 'email@example.com',
        'priority' => 1,
		'description' => __( 'Email Id that appears on top bar.', 'i-amaze' ),		
    );

	$controls[] = array(
		'type'        => 'upload',
		'settings'     => 'logo-trans',
		'label'       => __( 'Reverse Transparent logo', 'i-amaze' ),
		'description' => __( 'Transparent logo for the fullscreen slider and dark background. Width 280px, height 72px max.', 'i-amaze' ),
        'section'  => 'title_tagline',
		'default'     => '',		
		'priority'    => 3,
	);
	
	$controls[] = array(
		'type'        => 'switch',
		'settings'     => 'show_search',
		'label'       => __( 'Show Search', 'i-amaze' ),
		'description' => __( 'Show search option on main navigation', 'i-amaze' ),
		'section'     => 'basic',
		'default'     => 1,
		'priority'    => 3,
	);
	
	$controls[] = array(
		'type'        => 'switch',
		'settings'     => 'pre_loader',
		'label'       => __( 'Turn ON Page Preloader', 'i-amaze' ),
		'description' => __( 'Turn ON/OFF loding animation before page load', 'i-amaze' ),
		'section'     => 'basic',
		'default'     => 0,		
		'priority'    => 3,
	);				
	
	$controls[] = array(
		'type'        => 'color',
		'settings'     => 'primary_color',
		'label'       => __( 'Primary Color', 'i-amaze' ),
		'description' => __( 'Choose your theme color', 'i-amaze' ),
		'section'     => 'colors',
		'default'     => '#e57e26',
		'priority'    => 1,
	);	
	
	$controls[] = array(
		'type'        => 'radio-image',
		'settings'     => 'blog_layout',
		'label'       => __( 'Blog Posts Layout', 'i-amaze' ),
		'description' => __( '(Choose blog posts layout (one column/two column)', 'i-amaze' ),
		'section'     => 'layout',
		'default'     => '2',
		'priority'    => 2,
		'choices'     => array(
			'1' => get_template_directory_uri() . '/images/onecol.png',
			'2' => get_template_directory_uri() . '/images/twocol.png',
		),
	);
	
	$controls[] = array(
		'type'        => 'switch',
		'settings'     => 'show_full',
		'label'       => __( 'Show Full Content', 'i-amaze' ),
		'description' => __( 'Show full content on blog pages', 'i-amaze' ),
		'section'     => 'layout',
		'default'     => 0,
		'priority'    => 3,
	);		
	
	$controls[] = array(
		'type'        => 'switch',
		'settings'     => 'wide_layout',
		'label'       => __( 'Wide layout', 'i-amaze' ),
		'description' => __( 'Check to have wide layout', 'i-amaze' ),
		'section'     => 'layout',
		'default'     => 1,
		'priority'    => 4,
	);
	
	// social links
	
    $controls[] = array(
        'type'     => 'text',
        'settings'  => 'itrans_social_facebook',
        'label'    => __( 'Facebook', 'i-amaze' ),
        'section'  => 'social',
        'default'  => '#',
        'priority' => 1,
    );	
	
    $controls[] = array(
        'type'     => 'text',
        'settings'  => 'itrans_social_twitter',
        'label'    => __( 'Twitter', 'i-amaze' ),
        'section'  => 'social',
        'default'  => '#',
        'priority' => 1,
    );
	
    $controls[] = array(
        'type'     => 'text',
        'settings'  => 'itrans_social_flickr',
        'label'    => __( 'Flickr', 'i-amaze' ),
        'section'  => 'social',
        'default'  => '#',
        'priority' => 1,
    );	
	
    $controls[] = array(
        'type'     => 'text',
        'settings'  => 'itrans_social_feed',
        'label'    => __( 'RSS', 'i-amaze' ),
        'section'  => 'social',
        'default'  => '#',
        'priority' => 1,
    );	
	
    $controls[] = array(
        'type'     => 'text',
        'settings'  => 'itrans_social_instagram',
        'label'    => __( 'Instagram', 'i-amaze' ),
        'section'  => 'social',
        'default'  => '#',
        'priority' => 1,
    );	
	
    $controls[] = array(
        'type'     => 'text',
        'settings'  => 'itrans_social_googleplus',
        'label'    => __( 'Google Plus', 'i-amaze' ),
        'section'  => 'social',
        'default'  => '#',
        'priority' => 1,
    );	
	
    $controls[] = array(
        'type'     => 'text',
        'settings'  => 'itrans_social_youtube',
        'label'    => __( 'YouTube', 'i-amaze' ),
        'section'  => 'social',
        'default'  => '#',
        'priority' => 1,
    );
	
    $controls[] = array(
        'type'     => 'text',
        'settings'  => 'itrans_social_pinterest',
        'label'    => __( 'Pinterest', 'i-amaze' ),
        'section'  => 'social',
        'default'  => '#',
        'priority' => 1,
    );	
	
    $controls[] = array(
        'type'     => 'text',
        'settings'  => 'itrans_social_linkedin',
        'label'    => __( 'Linkedin', 'i-amaze' ),
        'section'  => 'social',
        'default'  => '#',
        'priority' => 1,
    );	
	
	// Slider

	$controls[] = array(
		'type'        => 'slider',
		'settings'     => 'itrans_sliderspeed',
		'label'       => __( 'Slide Duration', 'i-amaze' ),
		'description' => __( 'Slide visibility in second', 'i-amaze' ),
		'section'     => 'slidersettings',
		'default'     => 6,
		'priority'    => 1,
		'choices'     => array(
			'min'  => 1,
			'max'  => 30,
			'step' => 1
		),
	);

	// Parallax Effect
	$controls[] = array(
		'type'        => 'switch',
		'settings'     => 'itrans_sliderparallax',
		'label'       => __( 'Parallax Effect', 'i-amaze' ),
		'description' => __( 'Turn ON/OFF Parallax Effect', 'i-amaze' ),
		'section'     => 'slidersettings',
		'default'     => 1,			
		'priority'    => 4,
	);
	
	$controls[] = array(
		'type'        => 'switch',
		'settings'     => 'slider_overlay',
		'label'       => __( 'Turn Off Slider Overlay Layer', 'i-amaze' ),
		'description' => __( 'Turn Off/on the dotted slider overlay layer', 'i-amaze' ),
		'section'     => 'slidersettings',
		'default'     => 1,
		'priority'    => 4,
	);	
	
	$controls[] = array(
		'type'        => 'switch',
		'settings'     => 'slider_ubar',
		'label'       => __( 'Turn On/Off Top Utilitybar', 'i-amaze' ),
		'description' => __( 'Turn Off/on the top utilitybar containing email/phone and socoal icon links', 'i-amaze' ),
		'section'     => 'slidersettings',
		'default'     => 0,
		'priority'    => 5,
	);	
	
	$controls[] = array(
		'type'        => 'slider',
		'settings'    => 'slider_height',
		'label'       => __( 'Slider Height (in %)', 'i-amaze' ),
		'section'     => 'slidersettings',
		'default'     => 100,
		'choices'     => array(
			'min'  => '0',
			'max'  => '100',
			'step' => '1',
		),
	);				
	
	// slides 	
	$controls[] = array(
		'type'        => 'repeater',
		'label'       => __( 'Slides', 'i-amaze' ),
		'section'     => 'slides',
		'priority'    => 10,
		'settings'    => 'iamaze_slides',
		'row_label'   => array( 
			'type' => 'text', 
			'value' => __( 'Slide', 'i-amaze' ),
		),
		'choices' 	  => array(
			'limit' => 4,
		),		
		'default'     => array(
			array(
				'itrans_slide_title' => __( 'Welcome To i-AMAZE', 'i-amaze' ),
				'itrans_slide_desc'  => __( 'To start setting up i-one go to appearance &gt; customize.', 'i-amaze' ),
				'itrans_slide_linktext'  => __( 'Know More', 'i-amaze' ),
				'itrans_slide_linkurl'  => '',
				'itrans_slide_image'  =>  get_template_directory_uri() . '/images/slide1.jpg',												
			),
			array(
				'itrans_slide_title' => __( 'Responsive & Touch Ready', 'i-amaze' ),
				'itrans_slide_desc'  => __( 'i-one is 100% responsive and touch ready.', 'i-amaze' ),
				'itrans_slide_linktext'  => __( 'Know More', 'i-amaze' ),
				'itrans_slide_linkurl'  => '',
				'itrans_slide_image'  =>  get_template_directory_uri() . '/images/slide2.jpg',												
			),
			array(
				'itrans_slide_title' => __( 'One Page WordPress Theme', 'i-amaze' ),
				'itrans_slide_desc'  => __( 'Extremely powerful and flexible one-page multi-purpose WordPress theme', 'i-amaze' ),
				'itrans_slide_linktext'  => __( 'Know More', 'i-amaze' ),
				'itrans_slide_linkurl'  => '',
				'itrans_slide_image'  =>  get_template_directory_uri() . '/images/slide3.jpg',												
			),
			array(
				'itrans_slide_title' => __( 'Easy to Customize', 'i-amaze' ),
				'itrans_slide_desc'  => __( 'All controls in one place, Setup your busines website in minutes..', 'i-amaze' ),
				'itrans_slide_linktext'  => __( 'Know More', 'i-amaze' ),
				'itrans_slide_linkurl'  => '',
				'itrans_slide_image'  =>  get_template_directory_uri() . '/images/slide4.jpg',												
			),									
		),
		'fields' => array(
			'itrans_slide_title' => array(
				'type'     => 'text',
				'label'    => __( 'Title', 'i-amaze' ),
				'default'  => '',
			),
			'itrans_slide_desc' => array(
				'type'     => 'textarea',
				'label'    => __( 'Description', 'i-amaze' ),
				'default'  => '',
			),
			'itrans_slide_linktext' => array(
				'type'     => 'text',
				'label'    => __( 'Link text', 'i-amaze' ),
				'default'  => '',
			),
			'itrans_slide_linkurl' => array(
				'type'     => 'text',
				'label'    => __( 'Link URL', 'i-amaze' ),
				'default'  => '',
			),
			'itrans_slide_image' => array(
				'type'     => 'image',
				'label'    => __( 'Image', 'i-amaze' ),
				'default'  => '',
			),		
				
		)
	);		

	
	// Blog page setting
	
	$controls[] = array(
		'type'        => 'switch',
		'settings'     => 'slider_stat',
		'label'       => __( 'Turn ON/OFF i-amaze Slider', 'i-amaze' ),
		'description' => __( 'Turn Off or On to hide/show default i-amaze slider', 'i-amaze' ),
		'section'     => 'blogpage',
		'default'     => 0,
		'priority'    => 0,
	);	
	
    $controls[] = array(
        'type'     => 'text',
        'settings'  => 'blogslide_scode',
        'label'    => __( 'Other Slider Shortcode', 'i-amaze' ),
        'section'  => 'blogpage',
        'default'  => '',
		'description' => __( 'Enter a 3rd party slider shortcode, ex. meta slider, smart slider 2, wow slider, etc.', 'i-amaze' ),
        'priority' => 2,
    );
	
    $controls[] = array(
        'type'     => 'text',
        'settings'  => 'banner_text',
        'label'    => __( 'Banner Text', 'i-amaze' ),
        'section'  => 'blogpage',
        'default'  => get_bloginfo( 'description' ),
        'priority' => 3,
		'description' => __( 'if you are using a logo and want your site title or slogan to appear on the header banner', 'i-amaze' ),		
    );
	
	$controls[] = array(
		'type'        => 'slider',
		'settings'    => 'blog_header_height',
		'label'       => __( 'Image/Videio Header Height (in %)', 'i-amaze' ),
		'section'     => 'header_image',
		'default'     => 100,
		'choices'     => array(
			'min'  => '0',
			'max'  => '100',
			'step' => '1',
		),
		'priority'    => 10,
	);
	
    $controls[] = array(
        'type'     => 'text',
        'settings'  => 'tagline_two',
        'label'    => __( 'Secondary Tagline', 'i-amaze' ),
        'section'  => 'title_tagline',
        'default'  => '',
        'priority' => 10,
    );	
	
	$controls[] = array(
		'type'        => 'switch',
		'settings'     => 'header_overlay',
		'label'       => __( 'Turn ON/OFF Checkered Background', 'i-amaze' ),
		'description' => __( 'Turn ON or OF the image/videio header background', 'i-amaze' ),
		'section'     => 'header_image',
		'default'     => 1,
		'priority'    => 0,
	);		
	

	//rmgeneral
	//rmsettings

	$controls[] = array(
		'label' => __('Enable Mobile Navigation', 'i-amaze'),
		'description' => __('Check if you want to activate mobile navigation.', 'i-amaze'),
		'settings' => 'enabled',
		'default' => '1',
		'type' => 'checkbox',
        'section'  => 'rmgeneral',	
	);

	$controls[] = array(
		'label' => __('Elements to hide in mobile:', 'i-amaze'),
		'description' => __('Enter the css class/ids for different elements you want to hide on mobile separeted by a comma(,). Example: .nav,#main-menu ', 'i-amaze'),
		'settings' => 'hide',
		'default' => '',
		'type' => 'text',
        'section'  => 'rmgeneral',		
	);
	
	$controls[] = array(
		'label' => __('Enable Swipe', 'i-amaze'),
		'description' => __('Enable swipe gesture to open/close menus, Only applicable for left/right menu.', 'i-amaze'),
		'settings' => 'swipe',
		'default' => 'yes',
		'choices' => array('yes' => __('Yes', 'i-amaze'),'no' => __('No', 'i-amaze')),
		'type' => 'radio',
        'section'  => 'rmgeneral',		
	);
	
	$controls[] = array(
		'label' => __('Search Field Position', 'i-amaze'),
		'description' => __('Select the position of search box or simply hide the search box if you donot need it.', 'i-amaze'),
		'settings' => 'search_box',
		'default' => 'below_menu',
		'choices' => array('above_menu' => __('Above Menu', 'i-amaze'), 'below_menu' => __('Below Menu', 'i-amaze'), 'hide'=> __('Hide search box', 'i-amaze') ),
		'type' => 'select',
        'section'  => 'rmgeneral',		
	);
		
	$controls[] = array(
		'label' => __('Allow zoom on mobile devices', 'i-amaze'),
		'settings' => 'zooming',
		'default' => 'yes',
		'choices' => array('yes' => __('Yes', 'i-amaze'),'no' => __('No', 'i-amaze')),
		'type' => 'radio',
        'section'  => 'rmgeneral',	
	);
		

	// Responsive Menu Settings
	$controls[] = array(
		'label' => __('Menu Symbol Position', 'i-amaze'),
		'description' => __('Select menu icon position which will be displayed on the menu bar.', 'i-amaze'),
		'settings' => 'menu_symbol_pos',
		'default' => 'left',
		'choices' => array('left' => __('Left', 'i-amaze'),'right' => __('Right', 'i-amaze')),
		'type' => 'select',
        'section'  => 'rmsettings',	
	);

	$controls[] = array(
		'label' => __('Menu Text', 'i-amaze'),
		'description' => __('Entet the text you would like to display on the menu bar.', 'i-amaze'),
		'settings' => 'bar_title',
		'default' => __('MENU', 'i-amaze'),
		'type' => 'text',
        'section'  => 'rmsettings',			
	);

	$controls[] = array(
		'label' => __('Menu Open Direction', 'i-amaze'),
		'description' => __('Select the direction from where menu will open.', 'i-amaze'),
		'settings' => 'position',
		'default' => 'left',
		'choices' => array('left' => 'Left','right' => 'Right', 'top' => 'Top' ),
		'type' => 'select',
        'section'  => 'rmsettings',			
	);

	$controls[] = array(
		'label' => __('Display menu from width (in px)', 'i-amaze'),
		'description' => __(' Enter the width (in px) below which the responsive menu will be visible on screen', 'i-amaze'),
		'settings' => 'from_width',
		'default' => 1069,
		'type' => 'text',
        'section'  => 'rmsettings',			
	);

	$controls[] = array(
		'label' => __('Menu Width', 'i-amaze'),
		'description' => __('Enter menu width in (%) only applicable for left and right menu.', 'i-amaze'),
		'settings' => 'how_wide',
		'default' => '80',
		'type' => 'text',
        'section'  => 'rmsettings',			
	);
	
	$controls[] = array(
		'label' => __('Menu bar background color', 'i-amaze'),
		'description' => '',
		'settings' => 'bar_bgd',
		'default' => '#e57e26',
		'type' => 'color',
        'section'  => 'rmsettings',			
	);
	
	$controls[] = array(
		'label' => __('Menu bar text color', 'i-amaze'),
		'settings' => 'bar_color',
		'default' => '#F2F2F2',
		'type' => 'color',
        'section'  => 'rmsettings',			
	);
	
	$controls[] = array(
		'label' => __('Menu background color', 'i-amaze'),
		'settings' => 'menu_bgd',
		'default' => '#2E2E2E',
		'type' => 'color',
        'section'  => 'rmsettings',			
	);
	
	$controls[] = array(
		'label' => __('Menu text color', 'i-amaze'),
		'settings' => 'menu_color',
		'default' => '#CFCFCF',
		'type' => 'color',
        'section'  => 'rmsettings',			
	);
	
	$controls[] = array(
		'label' => __('Menu mouse over text color', 'i-amaze'),
		'settings' => 'menu_color_hover',
		'default' => '#606060',
		'type' => 'color',
        'section'  => 'rmsettings',			
	);
	
	$controls[] = array(
		'label' => __('Menu icon color', 'i-amaze'),
		'settings' => 'menu_icon_color',
		'default' => '#FFFFFF',
		'type' => 'color',
        'section'  => 'rmsettings',			
	);
	
	$controls[] = array(
		'label' => __('Menu borders(top & left) color', 'i-amaze'),
		'settings' => 'menu_border_top',
		'default' => '#0D0D0D',
		'type' => 'color',
        'section'  => 'rmsettings',		
	);
	
	$controls[] = array(
		'label' => __('Menu borders(bottom) color', 'i-amaze'),
		'settings' => 'menu_border_bottom',
		'default' => '#131212',
		'type' => 'color',
        'section'  => 'rmsettings',		
	);
	
	$controls[] = array(
		'label' => __('Enable borders for menu items', 'i-amaze'),
		'settings' => 'menu_border_bottom_show',
		'default' => 'yes',
		'choices' =>  array('yes' => __('Yes', 'i-amaze'),'no' => __('No', 'i-amaze')),
		'type' => 'radio',
        'section'  => 'rmsettings',			
	);	
	
	$controls[] = array(
		'type'        => 'custom',
		'settings'    => 'custom_demo',
		'section'     => 'nxpromo',
		'default'	  => '<div class="promo-box">
        <div class="promo-2">
        	<div class="promo-wrap">
            	<a href="http://templatesnext.in/i-amaze-landing/" target="_blank">' . __('i-amaze Demo', 'i-amaze') . '</a>
                <a href="https://www.facebook.com/templatesnext" target="_blank">' . __('Facebook', 'i-amaze') . '</a> 
                <a href="http://templatesnext.org/ispirit/landing/forums/" target="_blank">' . __('Support', 'i-amaze') . '</a>                                 
                <a href="https://wordpress.org/support/view/theme-reviews/i-amaze#postform" target="_blank">' . __('Rate i-amaze', 'i-amaze') . '</a>                
            </div>
        </div>
		</div>',
		'priority' => 10,
	);
	
    return $controls;
}
add_filter( 'kirki/controls', 'iamaze_custom_setting' );







