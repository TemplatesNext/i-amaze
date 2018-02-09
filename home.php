<?php
/**
 * The home template file
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package i-one
 * @since i-one 1.0
 */
if (function_exists('txo_sections_show')) {  
	tx_add_menu();
}

get_header(); ?>
	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
		<?php
			if (function_exists('txo_sections_show')) {
				txo_sections_show();
			} else {

				if ( have_posts() ) :  ?>
					<div class="blog-columns" id="blog-cols">
					<?php 
						while ( have_posts() ) : the_post();
							get_template_part( 'content', get_post_format() );
						endwhile; 
					?>
					</div>
					<?php 
						the_posts_pagination();
				else :
					get_template_part( 'content', 'none' );
				endif;				
			}
		 ?>
		</div><!-- #content -->
        <?php //get_sidebar(); ?>
	</div><!-- #primary -->
<?php get_footer();