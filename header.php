<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package steppenwolf
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'steppenwolf' ); ?></a>

	<header id="masthead" class="site-header">
    <div class="site-branding_header">
      <div class="site-branding">
        <?php
        the_custom_logo();
        if ( is_front_page() && is_home() ) :
          ?>
          <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
          <?php
        else :
          ?>
          <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
          <?php
        endif;
        $steppenwolf_description = get_bloginfo( 'description', 'display' );
        if ( $steppenwolf_description || is_customize_preview() ) :
          ?>
          <p class="site-description"><?php echo $steppenwolf_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
        <?php endif; ?>
      </div><!-- .site-branding -->
      <div class="desktop-secondary_menu">
        <?php
          wp_nav_menu(
            array(
              'theme_location' => 'social',
              'menu_id'        => 'social-menu',
              'walker' => new WO_Nav_Social_Walker()
            )
          );
        ?>
        <?php get_search_form(); ?>
      </div>
      <!--Insert secondary menu here (login, social links)-->
    </div><!--.site-branding_header-->

		<nav id="site-navigation" class="main-navigation">
      <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
        <div class="bar1"></div>
        <div class="bar2"></div>
        <div class="bar3"></div>
      </button>
			<div class="fullscreen-menu">
        <div class="menu-content">
          <div class="menu-header">
            <?php the_custom_logo(); ?>
            <?php get_search_form(); ?>
          </div>
          <div class="menu-content_container">
            <?php
              wp_nav_menu(
                array(
                  'theme_location' => 'header',
                  'menu_id'        => 'header-menu',
                  'walker'         => new Primary_Walker_Nav_Menu()
                )
              );
            ?>
            <div class="menu-extra_content">
              <div class="menu-extra_content-inner">
                <?php
                  wp_nav_menu(
                    array(
                      'theme_location' => 'social',
                      'menu_id'        => 'social-menu',
                      'walker' => new WO_Nav_Social_Walker()
                    )
                  );
                ?>
                <?php if ( is_active_sidebar( 'menu_widget' ) ) : ?>
                  <?php dynamic_sidebar( 'menu_widget' ); ?>
                <?php endif; ?>
              </div>
        </div>
          </div>
        </div><!--.menu-content-->
      </div>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->
