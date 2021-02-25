<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package steppenwolf
 */

?>

	<footer id="colophon" class="site-footer">
    <div class="site-footer_main desktop-container">
      <div class="site-footer_main-left">
        <div class="site-footer_main-content">
          <div class="site-footer_branding">
            <div>logo</div>
            <?php
              wp_nav_menu(
                array(
                  'theme_location' => 'social',
                  'menu_id'        => 'social-menu',
                  'walker' => new WO_Nav_Social_Walker()
                )
              );
            ?>
          </div>
        </div>
      </div>
      <div class="site-footer_main-right">
        <?php if ( is_active_sidebar( 'footer_right_widget' ) ) : ?>
          <?php dynamic_sidebar( 'footer_right_widget' ); ?>
        <?php endif; ?>
      </div>
    </div>
		<div class="site-footer_terms desktop-container">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'steppenwolf' ) ); ?>">
				<?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf( esc_html__( '© %d %s', 'steppenwolf' ), date("Y"), 'SHOUT - SSH for Sustainable Innovation' );
				?>
			</a>
      <?php
        wp_nav_menu(
          array(
            'theme_location' => 'terms',
            'menu_id'        => 'terms-menu',
          )
        );
      ?>
		</div><!-- .site-footer_terms -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
