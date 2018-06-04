<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that other
 * 'pages' on your WordPress site will use a different template.
 *
 * @package i-amaze
 * @since i-amaze 1.0
 */

get_header(); ?>

	<?php global $post;	?>
            
	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">

			<?php /* The loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                	<?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>
					<header class="entry-header">
						<div class="entry-thumbnail">
						<?php                        
							$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
							echo '<a href="' . esc_url($large_image_url[0]) . '" title="' . esc_attr(the_title_attribute( 'echo=0' )) . '" class="tx-colorbox">';
							the_post_thumbnail('iamaze-single-thumb');
							echo '</a>';
                        ?>
						</div>
						
					</header><!-- .entry-header -->
                    <?php endif; ?>

					<div class="entry-content">
                        <?php 
							if ( function_exists( 'rwmb_meta' ) ) {
								if( rwmb_meta('iamaze_page_wpautop') == 1 )
								{
									remove_filter('the_content', 'wpautop'); 
								}
							}
						?>
                        <?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . esc_attr__( 'Pages:', 'i-amaze' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
					</div><!-- .entry-content -->

					<footer class="entry-meta">
						<?php edit_post_link( esc_attr__( 'Edit', 'i-amaze' ), '<span class="edit-link">', '</span>' ); ?>
					</footer><!-- .entry-meta -->
				</article><!-- #post -->

				<?php comments_template(); ?>
			<?php endwhile; ?>

		</div><!-- #content -->
        <?php get_sidebar(); ?>
	</div><!-- #primary -->


<?php get_footer(); ?>