<?php

function iamaze_customizer_config() {
	

    $url  = get_stylesheet_directory_uri() . '/inc/kirki/';
	
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
        //'logo_image'   => get_template_directory_uri() . '/images/logo.png',
  
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
        'url_path'     => get_template_directory_uri() . '/inc/kirki/',

        'textdomain'   => 'i-amaze',
		
        'i18n'         => $strings,		
		
		
	);
	
	
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
	) );	

    /**
     * Add Sections
     */
    $wp_customize->add_section('basic', array(
        'title'    => __('Basic Settings', 'i-amaze'),
        'description' => '',
        'priority' => 130,
    ));
	
    $wp_customize->add_section('layout', array(
        'title'    => __('Layout Options', 'i-amaze'),
        'description' => '',
        'priority' => 130,
    ));	
	
    $wp_customize->add_section('social', array(
        'title'    => __('Social Links', 'i-amaze'),
        'description' => __('Insert full URL of your social link including &#34;http://&#34; replacing #', 'i-amaze'),
        'priority' => 130,
    ));		
	
    $wp_customize->add_section('blogpage', array(
        'title'    => __('Default Blog Page', 'i-amaze'),
        'description' => '',
        'priority' => 150,
    ));	
	
	// slider sections
	
	$wp_customize->add_section('slidersettings', array(
        'title'    => __('Slide Settings', 'i-amaze'),
        'description' => '',
        'panel' => 'slider',		
        'priority' => 140,
    ));	
	
	$wp_customize->add_section('slides', array(
        'title'    => __('Slides', 'i-amaze'),
        'description' => '',
        'panel' => 'slider',		
        'priority' => 140,
    ));		
	
	$wp_customize->add_section('slide1', array(
        'title'    => __('Slide 1', 'i-amaze'),
        'description' => '',
        'panel' => 'slider',		
        'priority' => 140,
    ));	
	$wp_customize->add_section('slide2', array(
        'title'    => __('Slide 2', 'i-amaze'),
        'description' => '',
        'panel' => 'slider',		
        'priority' => 140,
    ));	
	$wp_customize->add_section('slide3', array(
        'title'    => __('Slide 3', 'i-amaze'),
        'description' => '',
        'panel' => 'slider',		
        'priority' => 140,
    ));	
	$wp_customize->add_section('slide4', array(
        'title'    => __('Slide 4', 'i-amaze'),
        'description' => '',
        'panel' => 'slider',		
        'priority' => 140,
    ));	
	
    $wp_customize->add_section('typography', array(
        'title'    => __('Typography', 'i-amaze'),
        'description' => '',
        'priority' => 140,
    ));		
	
	// promo sections
	
	$wp_customize->add_section('nxpromo', array(
        'title'    => __('More About i-amaze', 'i-amaze'),
        'description' => '',
        'priority' => 170,
    ));	
	
	/*
    $wp_customize->add_section('kirkiex', array(
        'title'    => __('Kirki Example', 'i-amaze'),
        'description' => '',
        'priority' => 180,
    ));
	*/					
	
}


function iamaze_custom_setting( $controls ) {
	
    $controls[] = array(
        'type'     => 'text',
        'setting'  => 'top_phone',
        'label'    => __( 'Phone Number', 'i-amaze' ),
        'section'  => 'basic',
        'default'  => '',
        'priority' => 1,
		'description' => __( 'Phone number that appears on top bar.', 'i-amaze' ),
    );
	
    $controls[] = array(
        'type'     => 'text',
        'setting'  => 'top_email',
        'label'    => __( 'Email Address', 'i-amaze' ),
        'section'  => 'basic',
        'default'  => '',
        'priority' => 1,
		'description' => __( 'Email Id that appears on top bar.', 'i-amaze' ),		
    );
	/*
	$controls[] = array(
		'type'        => 'upload',
		'setting'     => 'logo',
		'label'       => __( 'Site header logo', 'i-amaze' ),
		'description' => __( 'Width 280px, height 72px max. Upload logo for header', 'i-amaze' ),
        'section'  => 'basic',
		'default'     => get_template_directory_uri() . '/images/logo.png',
		'priority'    => 1,
	);
	*/
	
	$controls[] = array(
		'type'        => 'upload',
		'setting'     => 'logo-trans',
		'label'       => __( 'Transparent logo', 'i-amaze' ),
		'description' => __( 'Transparent logo for the fullscreen slider. Width 280px, height 72px max.', 'i-amaze' ),
        'section'  => 'basic',
		//'default'     => get_template_directory_uri() . '/images/logo-trans.png',
		'default'     => '',		
		'priority'    => 1,
	);		
	
	$controls[] = array(
		'type'        => 'color',
		'setting'     => 'primary_color',
		'label'       => __( 'Primary Color', 'i-amaze' ),
		'description' => __( 'Choose your theme color', 'i-amaze' ),
		'section'     => 'layout',
		'default'     => '#e57e26',
		'priority'    => 1,
	);	
	
	$controls[] = array(
		'type'        => 'radio-image',
		'setting'     => 'blog_layout',
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
		'setting'     => 'show_full',
		'label'       => __( 'Show Full Content', 'i-amaze' ),
		'description' => __( 'Show full content on blog pages', 'i-amaze' ),
		'section'     => 'layout',
		'default'     => 0,
		'priority'    => 3,
	);		
	
	$controls[] = array(
		'type'        => 'switch',
		'setting'     => 'wide_layout',
		'label'       => __( 'Wide layout', 'i-amaze' ),
		'description' => __( 'Check to have wide layout', 'i-amaze' ),
		'section'     => 'layout',
		'default'     => 1,
		'priority'    => 4,
	);
	
	// social links
	
    $controls[] = array(
        'type'     => 'text',
        'setting'  => 'itrans_social_facebook',
        'label'    => __( 'Facebook', 'i-amaze' ),
        'section'  => 'social',
        'default'  => '',
        'priority' => 1,
    );	
	
    $controls[] = array(
        'type'     => 'text',
        'setting'  => 'itrans_social_twitter',
        'label'    => __( 'Twitter', 'i-amaze' ),
        'section'  => 'social',
        'default'  => '',
        'priority' => 1,
    );
	
    $controls[] = array(
        'type'     => 'text',
        'setting'  => 'itrans_social_flickr',
        'label'    => __( 'Flickr', 'i-amaze' ),
        'section'  => 'social',
        'default'  => '',
        'priority' => 1,
    );	
	
    $controls[] = array(
        'type'     => 'text',
        'setting'  => 'itrans_social_feed',
        'label'    => __( 'RSS', 'i-amaze' ),
        'section'  => 'social',
        'default'  => '',
        'priority' => 1,
    );	
	
    $controls[] = array(
        'type'     => 'text',
        'setting'  => 'itrans_social_instagram',
        'label'    => __( 'Instagram', 'i-amaze' ),
        'section'  => 'social',
        'default'  => '',
        'priority' => 1,
    );	
	
    $controls[] = array(
        'type'     => 'text',
        'setting'  => 'itrans_social_googleplus',
        'label'    => __( 'Google Plus', 'i-amaze' ),
        'section'  => 'social',
        'default'  => '',
        'priority' => 1,
    );	
	
    $controls[] = array(
        'type'     => 'text',
        'setting'  => 'itrans_social_youtube',
        'label'    => __( 'YouTube', 'i-amaze' ),
        'section'  => 'social',
        'default'  => '',
        'priority' => 1,
    );
	
    $controls[] = array(
        'type'     => 'text',
        'setting'  => 'itrans_social_pinterest',
        'label'    => __( 'Pinterest', 'i-amaze' ),
        'section'  => 'social',
        'default'  => '',
        'priority' => 1,
    );	
	
    $controls[] = array(
        'type'     => 'text',
        'setting'  => 'itrans_social_linkedin',
        'label'    => __( 'Linkedin', 'i-amaze' ),
        'section'  => 'social',
        'default'  => '',
        'priority' => 1,
    );	
	
	// Slider

	$controls[] = array(
		'type'        => 'slider',
		'setting'     => 'itrans_sliderspeed',
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
		'setting'     => 'itrans_sliderparallax',
		'label'       => __( 'Parallax Effect', 'i-amaze' ),
		'description' => __( 'Turn ON/OFF Parallax Effect', 'i-amaze' ),
		'section'     => 'slidersettings',
		'default'     => 1,			
		'priority'    => 4,
	);
	
	$controls[] = array(
		'type'        => 'switch',
		'setting'     => 'slider_overlay',
		'label'       => __( 'Turn Off Slider Overlay Layer', 'i-amaze' ),
		'description' => __( 'Turn Off/on the dotted slider overlay layer', 'i-amaze' ),
		'section'     => 'slidersettings',
		'default'     => 1,
		'priority'    => 4,
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
		'setting'     => 'slider_stat',
		'label'       => __( 'Hide i-amaze Slider', 'i-amaze' ),
		'description' => __( 'Turn Off or On to hide/show default i-amaze slider', 'i-amaze' ),
		'section'     => 'blogpage',
		'default'     => 1,
		'priority'    => 1,
	);	
	
    $controls[] = array(
        'type'     => 'text',
        'setting'  => 'blogslide_scode',
        'label'    => __( 'Other Slider Shortcode', 'i-amaze' ),
        'section'  => 'blogpage',
        'default'  => '',
		'description' => __( 'Enter a 3rd party slider shortcode, ex. meta slider, smart slider 2, wow slider, etc.', 'i-amaze' ),
        'priority' => 2,
    );
	
    $controls[] = array(
        'type'     => 'text',
        'setting'  => 'banner_text',
        'label'    => __( 'Banner Text', 'i-amaze' ),
        'section'  => 'blogpage',
        'default'  => '',
        'priority' => 4,
		'description' => __( 'if you are using a logo and want your site title or slogan to appear on the header banner', 'i-amaze' ),		
    );		
	
	$controls[] = array(
        'type'        => 'background',
        'settings'    => 'home_header_background',
        'label'       => __( 'Blog page header background', 'i-amaze' ),
        'section'     => 'blogpage',
        'default'     => array(
            'image'    => get_template_directory_uri() . '/images/bg/bg7.jpg',
            'repeat'   => 'no-repeat',
            'size'     => 'cover',
            'attach'   => 'fixed',
            'position' => 'center-center',
        ),
        'priority'    => 5,
        'output'      => '.home.nx-transheader .site .iheader',
    );

	/*
	// h1 title tags
	$controls[] = array(
			'type'        => 'select',
			'setting'     => 'head_font_family_1',
			'label'       => __( 'H1 Font-Family', 'i-amaze' ),
			'description' => __( 'Please choose a font for your site. This font-family will be applied to all elements on your page, including headers and body.', 'i-amaze' ),
			'section'     => 'typography',
			'default'     => 'Roboto',
			'priority'    => 20,
			'choices'     => Kirki_Fonts::get_font_choices(),
			'output'      => array(
				array(
					'element'  => 'h1, h2, h3, h4, h5, h6, .entry-header h1.entry-title, h2.comments-title, .comment-reply-title, .widget .widget-title',
					'property' => 'font-family',
				),
			),
			'transport'   => 'postMessage',
			'js_vars'     => array(
				array(
					'element'  => 'h1, h2, h3, h4, h5, h6, .entry-header h1.entry-title, h2.comments-title, .comment-reply-title, .widget .widget-title',
					'function' => 'css',
					'property' => 'font-family',
				),
			),
	);
	
	// body font
	$controls[] = array(
			'type'        => 'select',
			'setting'     => 'body_font_family',
			'label'       => __( 'Body Font-Family', 'i-amaze' ),
			'description' => __( 'Please choose a font for your site. This font-family will be applied to all elements on your page, including headers and body.', 'i-amaze' ),
			'section'     => 'typography',
			'default'     => 'Roboto',
			'priority'    => 10,
			'choices'     => Kirki_Fonts::get_font_choices(),
			'output'      => array(
				array(
					'element'  => 'body',
					'property' => 'font-family',
				),
			),
			'transport'   => 'postMessage',
			'js_vars'     => array(
				array(
					'element'  => 'body',
					'function' => 'css',
					'property' => 'font-family',
				),
			),
	);	
	$controls[] = array(
		'type'        => 'slider',
		'setting'     => 'body_font_size',
		'label'       => __( 'Body Font-Size', 'i-amaze' ),
		'description' => __( 'Please choose a font-size for your body.', 'i-amaze' ),
		'section'     => 'typography',
		'default'     => 13,
		'priority'    => 10,
		'choices'     => array(
			'min'  => 11,
			'max'  => 24,
			'step' => 1
		),
		'output'        => array(
			array(
				'element'  => 'body',
				'property' => 'font-size',
				'units'    => 'px',
			),
		),
		'transport'   => 'postMessage',
		'js_vars'     => array(
			array(
				'element'  => 'body',
				'function' => 'css',
				'property' => 'font-size',
			),
		),
	);	
	*/

	$controls[] = array(
		'type'        => 'custom',
		'settings'    => 'custom_demo',
		'label' => __( 'TemplatesNext Promo', 'i-amaze' ),
		'section'     => 'nxpromo',
		'default'	  => '<div class="promo-box">
        <div class="promo-2">
        	<div class="promo-wrap">
                <!-- <a href="http://templatesnext.org/ispirit/landing/" target="_blank">Go Premium</a> -->  			
            	<a href="http://templatesnext.in/i-amaze/" target="_blank">i-amaze Demo</a>
                <a href="https://www.facebook.com/templatesnext" target="_blank">Facebook</a> 
                <a href="http://templatesnext.org/ispirit/landing/forums/" target="_blank">Support</a>                                 
                <!-- <a href="http://templatesnext.in/i-amaze/docs">Documentation</a> -->
                <a href="https://wordpress.org/support/view/theme-reviews/i-amaze#postform" target="_blank">Rate i-amaze</a>                
                <div class="donate">                
                    <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_blank">
                    <input type="hidden" name="cmd" value="_s-xclick">
                    <input type="hidden" name="hosted_button_id" value="M2HN47K2MQHAN">
                    <table>
                    <tr><td><input type="hidden" name="on0" value="If you like my work, you can buy me">If you like my work, you can buy me</td></tr><tr><td><select name="os0">
                        <option value="a cup of coffee">1 cup of coffee $10.00 USD</option>
                        <option value="2 cup of coffee">2 cup of coffee $20.00 USD</option>
                        <option value="3 cup of coffee">3 cup of coffee $30.00 USD</option>
                    </select></td></tr>
                    </table>
                    <input type="hidden" name="currency_code" value="USD">
                    <input type="image" src="https://www.paypalobjects.com/en_GB/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal – The safer, easier way to pay online.">
                    <img alt="" border="0" src="https://www.paypalobjects.com/en_GB/i/scr/pixel.gif" width="1" height="1">
                    </form>
                </div>                                                                          
            </div>
        </div>
		</div>',
		'priority' => 10,
	);
	
	/*	
	$controls[] = array(
		'type'        => 'sortable',
		'settings'    => 'my_setting',
		'label'       => __( 'This is the label', 'i-amaze' ),
		'section'     => 'kirkiex',
		'default'     => array(
			'option3',
			'option1',
			'option4'
		),
		'choices'     => array(
			'option1' => esc_attr__( 'Option 1', 'i-amaze' ),
			'option2' => esc_attr__( 'Option 2', 'i-amaze' ),
			'option3' => esc_attr__( 'Option 3', 'i-amaze' ),
			'option4' => esc_attr__( 'Option 4', 'i-amaze' ),
			'option5' => esc_attr__( 'Option 5', 'i-amaze' ),
			'option6' => esc_attr__( 'Option 6', 'i-amaze' ),
		),
		'priority'    => 10,
	);	
	
	$controls[] = array(
		'type'        => 'code',
		'settings'    => 'code_demo',
		'label'       => __( 'Code Control', 'i-amaze' ),
		'section'     => 'kirkiex',
		'default'     => 'body { background: #fff; }',
		'priority'    => 10,
		'choices'     => array(
			'language' => 'css',
			'theme'    => 'monokai',
			'height'   => 250,
		),
	);
	
	$controls[] = array(
		'type'        => 'repeater',
		'label'       => esc_attr__( 'Repeater Control', 'i-amaze' ),
		'section'     => 'kirkiex',
		'priority'    => 10,
		'settings'    => 'my_setting',
		'default'     => array(
			array(
				'link_text' => esc_attr__( 'Kirki Site', 'i-amaze' ),
				'link_url'  => 'https://kirki.org',
			),
			array(
				'link_text' => esc_attr__( 'Kirki Repository', 'i-amaze' ),
				'link_url'  => 'https://github.com/aristath/kirki',
			),
		),
		'fields' => array(
			'link_text' => array(
				'type'        => 'text',
				'label'       => esc_attr__( 'Link Text', 'i-amaze' ),
				'description' => esc_attr__( 'This will be the label for your link', 'i-amaze' ),
				'default'     => '',
			),
			'link_url' => array(
				'type'        => 'text',
				'label'       => esc_attr__( 'Link URL', 'i-amaze' ),
				'description' => esc_attr__( 'This will be the link URL', 'i-amaze' ),
				'default'     => '',
			),
		)
	);
	*/
	
    return $controls;
}
add_filter( 'kirki/controls', 'iamaze_custom_setting' );


	





