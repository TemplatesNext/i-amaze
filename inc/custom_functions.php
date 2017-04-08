<?php 
/*-----------------------------------------------------------------------------------*/
/* Social icons																		*/
/*-----------------------------------------------------------------------------------*/
function iamaze_social_icons () {
	
	$socio_list = '';
	$siciocount = 0;
	$services = array ('facebook','twitter','flickr','feed','instagram','googleplus','youtube','pinterest','linkedin');
    
		$socio_list .= '<ul class="social">';	
		foreach ( $services as $service ) :
			
			$active[$service] = esc_url( get_theme_mod('itrans_social_'.$service, '') );
			if ($active[$service]) { 
				$socio_list .= '<li><a href="'.$active[$service].'" title="'.$service.'" target="_blank"><i class="genericon socico genericon-'.$service.'"></i></a></li>';
				$siciocount++;
			}
			
		endforeach;
		$socio_list .= '</ul>';
		
		if($siciocount>0)
		{	
			return $socio_list;
		} else
		{
			return;
		}
}


/*-----------------------------------------------------------------------------------*/
/* ibanner Slider																		*/
/*-----------------------------------------------------------------------------------*/
function iamaze_ibanner_slider () { 
  
	$slide_no = 1; 
	$arrslidestxt = array();
	
	
	$template_dir = get_template_directory_uri();
	$banner_text = esc_attr(get_theme_mod('banner_text', ''));
	
	$upload_dir = wp_upload_dir();
	$upload_base_dir = $upload_dir['basedir'];
	$upload_base_url = $upload_dir['baseurl'];
	
	$itrans_sliderparallax = get_theme_mod('itrans_sliderparallax', 1);
	$itrans_slideroverlay = get_theme_mod('slider_overlay', 1);						
			
	if( $itrans_slideroverlay == 1 )
	{
		$overlayclass = "overlay";
	} else
	{
		$overlayclass = "";
	}	
	
	$slides_preset = array (
        array(
            'itrans_slide_title' => 'Welcome To i-AMAZE',
            'itrans_slide_desc' => 'To start setting up i-one go to appearance > customize.',
            'itrans_slide_linktext' => 'Know More',
            'itrans_slide_linkurl' => '',
            'itrans_slide_image' => get_template_directory_uri() . '/images/slide1.jpg',
        ),
        array(
            'itrans_slide_title' => 'Responsive & Touch Ready',
            'itrans_slide_desc' => 'i-AMAZE is 100% responsive and touch ready.',
            'itrans_slide_linktext' => 'Know More',
            'itrans_slide_linkurl' => '',
            'itrans_slide_image' => get_template_directory_uri() . '/images/slide2.jpg',
        ),
        array(
            'itrans_slide_title' => 'One Page WordPress Theme',
            'itrans_slide_desc' => 'Extremely powerful and flexible one-page multi-purpose WordPress theme',
            'itrans_slide_linktext' => 'Know More',
            'itrans_slide_linkurl' => '',
            'itrans_slide_image' => get_template_directory_uri() . '/images/slide3.jpg',
        ),
        array(
            'itrans_slide_title' => 'Easy to Customize',
            'itrans_slide_desc' => 'All controls in one place, Setup your busines website in minutes..',
            'itrans_slide_linktext' => 'Know More',
            'itrans_slide_linkurl' => '',
            'itrans_slide_image' => get_template_directory_uri() . '/images/slide4.jpg',
        ),

	);
	
	$slides = get_theme_mod('iamaze_slides', $slides_preset);
	
	foreach( $slides as $slide ) {
		If ( $slide_no <= 4 )
		{
			$strret = '';
			
			$slide_title = esc_attr($slide['itrans_slide_title']);
			$slide_desc = esc_attr($slide['itrans_slide_desc']);
			$slide_linktext = esc_attr($slide['itrans_slide_linktext']);
			$slide_linkurl = esc_url($slide['itrans_slide_linkurl']);
			$slide_image = $slide['itrans_slide_image'];
			
			if ( false !== strpos( $slide_image, $template_dir ) ) {
				$slide_image_url = $slide_image;
			} else
			{
				$slide_image_url = wp_get_attachment_image_src( $slide_image, 'ione-slider-thumb' );
				$slide_image_url = $slide_image_url[0];
			}

			
			if ( $slide_title ) {

				if( $slide_image != '' ){
					$strret .= '<div class="da-img" style="background-image:URL(' . $slide_image_url .');"><div class="nx-tscreen"></div></div>';
				}
				$strret .= '<div class="slider-content-wrap"><div class="nx-slider-container">';
				$strret .= '<h2>'.$slide_title.'</h2>';
				if( !empty($slide_desc) ){$strret .= '<p>'.$slide_desc.'</p>';}
				if( !empty($slide_linktext) ){$strret .= '<a href="'.$slide_linkurl.'" class="da-link">'.$slide_linktext.'</a>';}
				$strret .= '</div></div>';
			}
			
			if ( $strret != '' ){
				$arrslidestxt[$slide_no] = $strret;
			}				
			
			$slide_no++;
									
		}
	}	
	
	$sliderscpeed = intval(esc_attr(get_theme_mod('itrans_sliderspeed', '6'))) * 1000 ;		
	
	if( count( $arrslidestxt) > 0 ){
		echo '<div class="ibanner ' . $overlayclass . '">';
		echo '	<div id="da-slider" class="da-slider" role="banner" data-slider-speed="'.$sliderscpeed.'" data-slider-parallax="'.$itrans_sliderparallax.'">';
			
		foreach ( $arrslidestxt as $slidetxt ) :
			echo '<div class="nx-slider">';	
			echo	$slidetxt;
			echo '</div>';
		endforeach;
		
		echo '	</div>';
		echo '</div>';
	} else
	{
        echo '<div class="iheader front">';
        echo '    <div class="titlebar">';
        echo '        <h1>';
		
		if ($banner_text) {
			echo $banner_text;
		} 
        echo '        </h1>';
		echo ' 		  <h2>';

		echo '		</h2>';
        echo '    </div>';
        echo '</div>';
	}
}



/*-----------------------------------------------------------------------------------*/
/* ibanner Slider																		*/
/*-----------------------------------------------------------------------------------*/
function iamaze_ibanner_slider_obs () {    
	$arrslidestxt = array();
	$template_dir = get_template_directory_uri();
	$banner_text = esc_attr(get_theme_mod('banner_text', ''));
	
	$upload_dir = wp_upload_dir();
	$upload_base_dir = $upload_dir['basedir'];
	$upload_base_url = $upload_dir['baseurl'];
	
	//$classes[] = 'nx-fullscreen';	
	
    for( $slideno=1; $slideno<=4; $slideno++ ){
			$strret = '';
			
			$slide_title = esc_attr(get_theme_mod('itrans_slide'.$slideno.'_title', 'Welcome To i-amaze' ));
			$slide_desc = esc_attr(get_theme_mod('itrans_slide'.$slideno.'_desc', 'To start setting up i-amaze go to appearance &gt; customize. Make sure you have installed recommended plugin &#34;TemplatesNext Toolkit&#34; by going appearance &gt; install plugin.'));
			$slide_linktext = esc_attr(get_theme_mod('itrans_slide'.$slideno.'_linktext', 'Know More'));
			$slide_linkurl = esc_url(get_theme_mod('itrans_slide'.$slideno.'_linkurl', 'http://www.templatesnext.org/icreate/?page_id=806'));
			$slide_image = esc_url(get_theme_mod('itrans_slide'.$slideno.'_image', get_template_directory_uri() . '/images/slide'.$slideno.'.jpg'));
			
			$itrans_sliderparallax = get_theme_mod('itrans_sliderparallax', 1);
			$itrans_slideroverlay = get_theme_mod('slider_overlay', 1);						
			
			$slider_image_id = iamaze_get_attachment_id_from_url( $slide_image );			
			$slider_resized_image = wp_get_attachment_image_src( $slider_image_id, 'iamaze-slider-thumb' );
			
			if( $itrans_slideroverlay == 1 )
			{
				$overlayclass = "overlay";
			} else
			{
				$overlayclass = "";
			}
			
			if ( $slide_title ) {

				if( $slide_image != '' ){
					if( file_exists( str_replace($upload_base_url,$upload_base_dir,$slide_image) ) ){
						$strret .= '<div class="da-img" style="background-image:URL(' . $slider_resized_image[0] .');"><div class="nx-tscreen"></div></div>';
					}
					else
					{
						$slide_image = $template_dir.'/images/slide'.$slideno.'.jpg';
						$strret .= '<div class="da-img noslide-image" style="background-image:URL(' . $slide_image .');"><div class="nx-tscreen"></div></div>';					
					}
				}
				else
				{					
					$slide_image = $template_dir.'/images/no-image.jpg';
					$strret .= '<div class="da-img noslide-image" style="background-image:URL(' . $slide_image .');"><div class="nx-tscreen"></div></div>';
				}
				
				$strret .= '<div class="slider-content-wrap"><div class="nx-slider-container">';
				$strret .= '<h2>'.$slide_title.'</h2>';
				if( !empty($slide_desc) ){$strret .= '<p>'.$slide_desc.'</p>';}
				if( !empty($slide_linktext) ){$strret .= '<a href="'.$slide_linkurl.'" class="da-link">'.$slide_linktext.'</a>';}
				$strret .= '</div></div>';
			}
			
			if ( $strret != '' ){
				$arrslidestxt[$slideno] = $strret;
			}
			
					
	}
	
	$sliderscpeed = intval(esc_attr(get_theme_mod('itrans_sliderspeed', '6'))) * 1000 ;		
	
	if( count( $arrslidestxt) > 0 ){
		echo '<div class="ibanner ' . $overlayclass . '">';
		echo '	<div id="da-slider" class="da-slider" role="banner" data-slider-speed="'.$sliderscpeed.'" data-slider-parallax="'.$itrans_sliderparallax.'">';
			
		foreach ( $arrslidestxt as $slidetxt ) :
			echo '<div class="nx-slider">';	
			echo	$slidetxt;
			echo '</div>';
		endforeach;
		
		echo '	</div>';
		echo '</div>';
	} else
	{
        echo '<div class="iheader front">';
        echo '    <div class="titlebar">';
        echo '        <h1>';
		
		if ($banner_text) {
			echo $banner_text;
		} 
        echo '        </h1>';
		echo ' 		  <h2>';

		echo '		</h2>';
        echo '    </div>';
        echo '</div>';
	}
}

/*-----------------------------------------------------------------------------------*/
/* find attachment id from url																	*/
/*-----------------------------------------------------------------------------------*/
function iamaze_get_attachment_id_from_url( $attachment_url = '' ) {

    global $wpdb;
    $attachment_id = false;

    // If there is no url, return.
    if ( '' == $attachment_url )
        return;

    // Get the upload directory paths
    $upload_dir_paths = wp_upload_dir();

    // Make sure the upload path base directory exists in the attachment URL, to verify that we're working with a media library image
    if ( false !== strpos( $attachment_url, $upload_dir_paths['baseurl'] ) ) {

        // If this is the URL of an auto-generated thumbnail, get the URL of the original image
        $attachment_url = preg_replace( '/-\d+x\d+(?=\.(jpg|jpeg|png|gif)$)/i', '', $attachment_url );

        // Remove the upload path base directory from the attachment URL
        $attachment_url = str_replace( $upload_dir_paths['baseurl'] . '/', '', $attachment_url );

        // Finally, run a custom database query to get the attachment ID from the modified attachment URL
        $attachment_id = $wpdb->get_var( $wpdb->prepare( "SELECT wposts.ID FROM $wpdb->posts wposts, $wpdb->postmeta wpostmeta WHERE wposts.ID = wpostmeta.post_id AND wpostmeta.meta_key = '_wp_attached_file' AND wpostmeta.meta_value = '%s' AND wposts.post_type = 'attachment'", $attachment_url ) );

    }

    return $attachment_id;
}


/*
 * add body class for i-amaze wpr menu
 *
 * @since i-amaze 1.0.1
 */
add_filter( 'body_class', 'iamaze_wprm_body_class' );
function iamaze_wprm_body_class( $classes ) {

	if (function_exists('wprmenu_menu')) {
    	$classes[] = 'wprm-on';	
	}
	return $classes;
}


/**
 * add body class for i-amaze no slider
 *
 * @since i-amaze 1.0.1
 */
add_filter( 'body_class', 'iamaze_nobanner_body_class' );
function iamaze_nobanner_body_class( $classes ) {

	$hide_front_slider = get_theme_mod('slider_stat', 1);

	if ( $hide_front_slider == 1 ) {
		$classes[] = 'ibanner-off';		
	}
	return $classes;
}

		

/**
 * add body class for i-amaze i-banner slider
 *
 * @since i-amaze 1.0.1

add_filter( 'body_class', 'iamaze_ibanner_body_class' );
function iamaze_ibanner_body_class( $classes ) {

	$classes[] = 'ibanner-on';		

	return $classes;
}
 */

