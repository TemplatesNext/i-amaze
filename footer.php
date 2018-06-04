<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package i-amaze
 * @since i-amaze 1.0
 */
$no_footer = "";
if ( function_exists( 'rwmb_meta' ) ) {
	$no_footer = rwmb_meta('iamaze_no_footer');
}  
?>

		</div><!-- #main -->
        <div class="tx-footer-filler"></div>
		<footer id="colophon" class="site-footer" role="contentinfo">
        	<?php if( $no_footer != 1 ) : ?>
        	<div class="footer-bg clearfix">
                <div class="widget-wrap">
                    <?php get_sidebar( 'main' ); ?>
                </div>
			</div>
            <?php endif; ?>
			<div class="site-info">
                <div class="copyright">
                	<?php esc_html_e( 'Copyright &copy;', 'i-amaze' ); ?>  <?php bloginfo( 'name' ); ?>
                </div>            
            	<div class="credit-info">
					<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'i-amaze' ) ); ?>" title="<?php esc_attr_e( 'Semantic Personal Publishing Platform', 'i-amaze' ); ?>">
						<?php printf( esc_attr( 'Powered by %s', 'i-amaze' ), 'WordPress' ); ?>
                    </a>
                    <?php esc_attr_e( ', Designed and Developed by', 'i-amaze' ); ?> 
                    <a href="<?php echo esc_url( __( 'http://www.templatesnext.org/', 'i-amaze' ) ); ?>">
                   		<?php esc_attr_e( 'templatesnext', 'i-amaze' ); ?>
                    </a>
                </div>

			</div><!-- .site-info -->
		</footer><!-- #colophon -->
	</div><!-- #page -->

	<?php wp_footer(); ?>
</body>
</html>