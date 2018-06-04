<?php
/**
 * Registering meta boxes
 *
 * All the definitions of meta boxes are listed below with comments.
 * Please read them CAREFULLY.
 *
 * You also should read the changelog to know what has been changed before updating.
 *
 * For more information, please visit:
 * @link http://www.deluxeblogtips.com/meta-box/
 */


add_filter( 'rwmb_meta_boxes', 'iamaze_register_meta_boxes' );

/**
 * Register meta boxes
 *
 * @return void
 */
function iamaze_register_meta_boxes( $meta_boxes )
{
	/**
	 * Prefix of meta keys (optional)
	 * Use underscore (_) at the beginning to make keys hidden
	 * Alt.: You also can make prefix empty to disable it
	 */
	// Better has an underscore as last sign
	$prefix = 'iamaze_';
	
	$iamaze_template_url = get_template_directory_uri();

	// 1st meta box
	$meta_boxes[] = array(
		// Meta box id, UNIQUE per meta box. Optional since 4.1.5
		'id' => 'heading',

		// Meta box title - Will appear at the drag and drop handle bar. Required.
		'title' => __( 'Page Heading Options', 'i-amaze' ),

		// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
		'pages' => array( 'post', 'page' ),

		// Where the meta box appear: normal (default), advanced, side. Optional.
		'context' => 'normal',

		// Order of meta box: high (default), low. Optional.
		'priority' => 'high',

		// Auto save: true, false (default). Optional.
		'autosave' => true,

		// List of meta fields
		'fields' => array(
			// Hide Title
			array(
				'name' => __( 'Titlebar/Image Header Type', 'i-amaze' ),
				'id'   => "{$prefix}header_type",
				'type' => 'button_group',
				// Value can be 0 or 1
				'options'  => array(
					'1'     => 'Normal Page Title Bar',
					'2'    	=> 'Default Image/Video Header',
					'3' 	=> 'I-AMAZE Slider',
					'0' 	=> 'None',			
				),
				'inline'   => true,
				'multiple' => false,	
				'desc'  => __( 'If 3rd party shortcode use, this setting will be overridden.', 'i-amaze' ),			
				'std'  => '1',
				'class' => 'hide-ttl',
			),
			// hide breadcrum
			array(
				'name' => __( 'Hide breadcrumb', 'i-amaze' ),
				'id'   => "{$prefix}hide_breadcrumb",
				'type' => 'switch',
				// Value can be 0 or 1
				'std'  => 0,
				'desc'  => __( 'Only appears on titlebar when plugin Breadcrumb NavXT is active', 'i-amaze' ),
			),
			
			// 3rd part slider
			array(
				// Field name - Will be used as label
				'name'  => __( 'Other Slider Plugin Shortcode', 'i-amaze' ),
				// Field ID, i.e. the meta key
				'id'    => "{$prefix}other_slider",
				// Field description (optional)
				'desc'  => __( 'Enter a 3rd party slider shortcode, ex. meta slider, smart slider 2, wow slider, etc. Only works with TemplatesNext Themes ', 'i-amaze' ),
				'type'  => 'text',
				// Default value (optional)
				'std'   => '',
				// CLONES: Add to make the field cloneable (i.e. have multiple value)
				//'clone' => true,
				'class' => 'cust-ttl',
			),			
			

		)
	);
	

	$meta_boxes[] = array(
		// Meta box id, UNIQUE per meta box. Optional since 4.1.5
		'id' => 'miscellaneous',

		// Meta box title - Will appear at the drag and drop handle bar. Required.
		'title' => __( 'Other Page Settings', 'i-amaze' ),

		// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
		'pages' => array( 'post', 'page', 'portfolio', 'team', 'product' ),

		// Where the meta box appear: normal (default), advanced, side. Optional.
		'context' => 'normal',

		// Order of meta box: high (default), low. Optional.
		'priority' => 'low',

		// Auto save: true, false (default). Optional.
		'autosave' => true,

		// List of meta fields
		'fields' => array(
			
			// Show Alternate main navigation
			array(
				'name' => __( 'Show Alternate Main Navigation', 'i-amaze' ),
				'id'   => "{$prefix}alt_navigation",
				'type' => 'switch',
				// Value can be 0 or 1
				'std'  => 0,
				'desc' => __('Turn on the alternate main navigation', 'i-amaze'),
			),
			/**/
			
			// Remove top and bottom page padding/margin
			array(
				'name' => __( 'Remove Top and Bottom Padding/Margin', 'i-amaze' ),
				'id'   => "{$prefix}page_nopad",
				'type' => 'switch',
				// Value can be 0 or 1
				'std'  => 0,
				'desc' => __('Remove the spaces/padding from top and bottom of the page/post', 'i-amaze'),
			),
			
			// Hide page header
			array(
				'name' => __( 'Show Transparent Header', 'i-amaze' ),
				'id'   => "{$prefix}trans_header",
				'type' => 'switch',
				// Value can be 0 or 1
				'std'  => 0,
				'desc' => __('Show transparent header on pages/posts. This will hide the page/post titlebar as well', 'i-amaze'),
			),	
			
			// Hide page header
			array(
				'name' => __( 'Hide Page Header', 'i-amaze' ),
				'id'   => "{$prefix}no_page_header",
				'type' => 'switch',
				// Value can be 0 or 1
				'std'  => 0,
				'desc' => __('In case you are building the page without the top navigation and logo', 'i-amaze'),
			),						
		
			// Hide Topbar
			array(
				'name' => __( 'Hide Top Utilitybar', 'i-amaze' ),
				'id'   => "{$prefix}no_ubar",
				'type' => 'switch',
				// Value can be 0 or 1
				'std'  => 0,
				'desc' => __('Hide top bar with email and social links', 'i-amaze'),
			),
			// Hide page header
			array(
				'name' => __( 'Hide Footer Widget Area', 'i-amaze' ),
				'id'   => "{$prefix}no_footer",
				'type' => 'switch',
				// Value can be 0 or 1
				'std'  => 0,
				'desc' => __('Hide bottom footer widget area', 'i-amaze'),
			),						
			
			// additional page class			
			array(
				'name'  => __( 'Custom Page Logo Normal', 'i-amaze' ),
				'id'    => "{$prefix}page_logo_normal",
				'type'  => 'single_image',
			),
			// additional page class			
			array(
				'name'  => __( 'Custom Page Logo Reverse', 'i-amaze' ),
				'id'    => "{$prefix}page_logo_trans",
				'type'  => 'single_image',
			),
			
			// Custom page primary color			
			array(
				'name'  => __( 'Custom Primary Color', 'i-amaze' ),
				'id'    => "{$prefix}page_color",
				'type'  => 'color',
				'std'   => '',
				'desc' => __('Choose a custom primary color for this page', 'i-amaze'),
			),	
						
			// additional page class			
			array(
				'name'  => __( 'Additional Page Class', 'i-amaze' ),
				'id'    => "{$prefix}page_class",
				'type'  => 'text',
				'std'   => __( '', 'i-amaze' ),
				'desc' => __('Enter an additional page class, will be added to body. "hide-page-header" for no header, "boxed" for boxed page for wide layout.', 'i-amaze'),
			),
			
			// Remove top and bottom page padding/margin
			array(
				'name' => __( 'Disable "wpautop filter" filter', 'i-amaze' ),
				'id'   => "{$prefix}page_wpautop",
				'type' => 'switch',
				// Value can be 0 or 1
				'std'  => 0,
				'desc' => __('For developers use.', 'i-amaze'),
			),
			
			array(
				'name'            => 'SmartSlider 3',
				'id'              => "{$prefix}smart_slider",
				'type'            => 'select',
				// Array of 'value' => 'Label' pairs
				'options'         => nx_smartslider_list (),
				// Allow to select multiple value?
				'multiple'        => false,
				// Placeholder text
				'placeholder'     => 'Select an Item',
				// Display "Select All / None" button?
				'select_all_none' => true,
			),															
						
		)
	);			
	
	return $meta_boxes;
}

function iamaze_get_category_list_key_array($category_name) {
			
	$get_category = get_categories( array( 'taxonomy' => $category_name	));
	$category_list = array( 'all' => __( 'Select Category', 'i-amaze' ));
		
	foreach( $get_category as $category ){
		if (isset($category->slug)) {
		$category_list[$category->slug] = $category->cat_name;
		}
	}
	return $category_list;
}

function nx_smartslider_list () {
	
	global $wpdb;
	$smartslider = array();
	if(class_exists('SmartSlider3')) {
		$get_sliders = $wpdb->get_results('SELECT * FROM '.$wpdb->prefix.'nextend2_smartslider3_sliders');
		if($get_sliders) {
			foreach($get_sliders as $slider) {
				$smartslider[$slider->id] = $slider->title;
			}
		}
	}
	return $smartslider;

}	

