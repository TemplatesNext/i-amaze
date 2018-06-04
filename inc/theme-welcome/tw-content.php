<?php

$review_pop = array (
	'title' => __( 'Help Us With Your Review', 'i-amaze' ),
    'desc' => __( '<p class="nx-revpop-cont-1"><b>If you like i-amaze</b>, share few words in your review, it helps the theme to spread. 
                   Few words of appriciation also motivates the designers and the developers.</p>
                   <p class="nx-revpop-cont-1">If you have not posted your review/feedback yet, we request you to post your review.</p>', 'i-amaze' ),
	'link' => __( 'Post Your Review', 'i-amaze' ),
	'conclusion' => __( '<p class="nx-revpop-end"><b>Thanks in Advance</b><br /><span style="font-size: 12px;"><i>Team TemplatesNext</i></span></p>', 'i-amaze' ),
    
);

$tx_plugins = array (
	array(
            'name' => __( 'TemplatesNext OnePager (<span class="nx-red">Highly Recommended</span>)', 'i-amaze' ),
            'desc' => __( 'TemplatesNext OnePager helps you build the home page. It addes the sortable sections like about us, portfolio, team, etc and their links on the navigation.', 'i-amaze' ),
			'pluginurl' => esc_url( 'https://wordpress.org/plugins/templatesnext-onepager/' ),
			//'tutorial' => esc_url( 'https://www.youtube.com/watch?v=vqTHQCN2ci4' ),
			'title' => 'TemplatesNext OnePager',
			'slug' => 'templatesnext-onepager',			
			'pluginfile' => 'tx-onepager.php',
    ),
	array(
            'name' => __( 'Breadcrumb NavXT (<span class="nx-red">Recommended</span>)', 'i-amaze' ),
            'desc' => __( 'This plugin adds the “Breadcrumbs” trail for your users to help them navigate and find their location in your site.', 'i-amaze' ),
			'pluginurl' => esc_url( 'https://wordpress.org/plugins/breadcrumb-navxt/' ),
			'title' => 'Breadcrumb NavXT',			
			'slug' => 'breadcrumb-navxt',
			'pluginfile' => 'breadcrumb-navxt.php',			
    ),
	array(
            'name' => __( 'One Click Demo Import (<span class="nx-red">Optional</span>)', 'i-amaze' ),
            'desc' => __( 'This plugin is only required if you choose to import the demo layouts/contents, Once you are done with your demo setup you can deactivate this plugin.', 'i-amaze' ),
			'pluginurl' => esc_url( 'https://wordpress.org/plugins/one-click-demo-import/' ),
			'title' => 'One Click Demo Import',			
			'slug' => 'one-click-demo-import',
			'pluginfile' => 'one-click-demo-import.php',	
    ),	
	array(
            'name' => __( 'Brizy (<span class="nx-red">Optional</span>)', 'i-amaze' ),
            'desc' => __( 'A page builder with awesome UI and pre-built sections.', 'i-amaze' ),
			'pluginurl' => esc_url( 'https://wordpress.org/plugins/brizy/' ),
			'title' => 'Brizy – Page Builder',			
			'slug' => 'brizy',
			'pluginfile' => 'brizy.php',	
    ),
	array(
            'name' => __( 'Smart Slider 3 (<span class="nx-red">Optional</span>)', 'i-amaze' ),
            'desc' => __( 'Probably the #1 FREE slider available with pre-built slider, I-AMAZE is well integrated with it.', 'i-amaze' ),
			'pluginurl' => esc_url( 'https://wordpress.org/plugins/smart-slider-3/' ),
			'title' => 'Smart Slider 3',			
			'slug' => 'smart-slider-3',
			'pluginfile' => 'smart-slider-3.php',	
    ),			
);

$tx_faqs = array (
	array(
            'question' => __( 'Thumbnail or Slider images are not visible.', 'i-amaze' ),
            'answeer' => __( 'The most common reason is “Photon” services of plugin “Jetpack”, which stores your images on a remote server to save your space. Turn of the “Photon” services. This happens because the script we use to crop images on the fly do not support remote images for security reason.', 'i-amaze' ),
    ),
	array(
            'question' => __( 'I activated my new theme and it doesn’t look like the demo. What’s up with this?', 'i-amaze' ),
            'answeer' => __( 'By default the Wordpress comes with only one sample post and a page. Once you activate a theme, it requres little bit of setup, like logo, color, social links, etc.', 'i-amaze' ),
    ),
);