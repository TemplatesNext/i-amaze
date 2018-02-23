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
			
			$active[$service] = esc_url( get_theme_mod('itrans_social_'.$service, '#') );
			if ($active[$service]) { 
				$socio_list .= '<li><a href="'.$active[$service].'" title="'.esc_attr($service).'" target="_blank"><i class="genericon socico genericon-'.esc_attr($service).'"></i></a></li>';
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
	$slider_height = intval(get_theme_mod('slider_height', 100));	
	
	$upload_dir = wp_upload_dir();
	$upload_base_dir = $upload_dir['basedir'];
	$upload_base_url = $upload_dir['baseurl'];
	
	$itrans_sliderparallax = get_theme_mod('itrans_sliderparallax', 1);
	$itrans_slideroverlay = get_theme_mod('slider_overlay', 1);
	$ubar_stat = get_theme_mod('slider_ubar', 0);
	$shortcut_text = esc_attr__('Edit Slides', 'i-amaze');								
			
	if( $itrans_slideroverlay == 1 )
	{
		$overlayclass = "overlay";
	} else
	{
		$overlayclass = "";
	}	
	
	if( $ubar_stat == 0 )
	{
		$ubarclass = "hideubar";
	} else
	{
		$ubarclass = "showubar";
	}		
	
	$slides_preset = array (
        array(
            'itrans_slide_title' => esc_attr__( 'Welcome To i-AMAZE', 'i-amaze' ),
            'itrans_slide_desc' => esc_attr__( 'To start setting up i-one go to appearance > customize.', 'i-amaze' ),
            'itrans_slide_linktext' => esc_attr__( 'Know More', 'i-amaze' ),
            'itrans_slide_linkurl' => '',
            'itrans_slide_image' => esc_url( get_template_directory_uri() . '/images/slide1.jpg' ),
        ),
        array(
            'itrans_slide_title' => esc_attr__( 'Responsive & Touch Ready', 'i-amaze' ),
            'itrans_slide_desc' => esc_attr__( 'i-AMAZE is 100% responsive and touch ready.', 'i-amaze' ),
            'itrans_slide_linktext' => esc_attr__( 'Know More', 'i-amaze' ),
            'itrans_slide_linkurl' => '',
            'itrans_slide_image' => esc_url( get_template_directory_uri() . '/images/slide2.jpg' ),
        ),
        array(
            'itrans_slide_title' => esc_attr__( 'One Page WordPress Theme', 'i-amaze' ),
            'itrans_slide_desc' => esc_attr__( 'Extremely powerful and flexible one-page multi-purpose WordPress theme', 'i-amaze' ),
            'itrans_slide_linktext' => esc_attr__( 'Know More', 'i-amaze' ),
            'itrans_slide_linkurl' => '',
            'itrans_slide_image' => esc_url( get_template_directory_uri() . '/images/slide3.jpg' ),
        ),
        array(
            'itrans_slide_title' => esc_attr__( 'Easy to Customize', 'i-amaze' ),
            'itrans_slide_desc' => esc_attr__( 'All controls in one place, Setup your busines website in minutes..', 'i-amaze' ),
            'itrans_slide_linktext' => esc_attr__( 'Know More', 'i-amaze' ),
            'itrans_slide_linkurl' => '',
            'itrans_slide_image' => esc_url( get_template_directory_uri() . '/images/slide4.jpg' ),
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
				$slide_image_url = wp_get_attachment_image_src( $slide_image, 'iamaze-slider-thumb' );
				$slide_image_url = $slide_image_url[0];
			}

			
			if ( $slide_title ) {

				if( $slide_image != '' ){
					$strret .= '<div class="da-img" style="background-image:URL(' . $slide_image_url .');"><div class="nx-tscreen"></div></div>';
				}
				$strret .= '<div class="slider-content-wrap"><div class="nx-slider-container">';
				$strret .= '<h2>'.$slide_title.'</h2>';
				if( !empty($slide_desc) ){$strret .= '<p>'.htmlspecialchars_decode($slide_desc).'</p>';}
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
		echo '<div class="ibanner ' . esc_attr($overlayclass) . ' ' . esc_attr($ubarclass) . '">';
		echo '	<div id="da-slider" class="da-slider" role="banner" data-slider-speed="'.esc_attr($sliderscpeed).'" data-slider-parallax="'.esc_attr($itrans_sliderparallax).'" data-edit-slides="'.esc_attr($shortcut_text).'" data-slider-height="'.esc_attr($slider_height).'">';
			
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
			echo htmlspecialchars_decode($banner_text);
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


function iamaze_get_video_id( $video_url ){
	
	if( (preg_match('/http:\/\/(www\.)*youtube\.com\/.*/',$video_url)) || (preg_match('/http:\/\/(www\.)*youtu\.be\/.*/',$video_url)) )
	{
		$video_id = ( preg_match( '%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $video_url, $match ) ) ? $match[1] : false;
		return $video_id;
	} else
	{
		return false;
	}
}

