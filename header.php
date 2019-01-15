<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package TravelArg-Tesis
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/travelicons/style.css"  />
	<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/slick/slick.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/slick/slick-theme.css"/>
	<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
	<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
	<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/slick/slick.min.js"></script>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'targ' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="social-links">
			<a href="#"><span aria-hidden="true" data-icon="&#xe001;" class="ticon ticon-instagram"></span></a>
			<a href="#"><span aria-hidden="true" data-icon="&#xe001;" class="ticon ticon-facebook"></span></a>
		</div>
		<div class="true-header container">
		<div class="site-branding">
			<?php
			//the_custom_logo();
			$custom_logo_id = get_theme_mod( 'custom_logo' );
			$logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
			if ( has_custom_logo() ) {
				echo '<a class="logo-link" href="'. esc_url( home_url( '/' ) ) .'" rel="home">';
				echo '<img class="custom-logo" src="'. esc_url( $logo[0] ) .'"></a>';
			}

			/*if ( is_front_page() && is_home() ) :
				?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php
			else :
				?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php
			endif;*/
			$targ_description = get_bloginfo( 'description', 'display' );
			if ( $targ_description || is_customize_preview() ) :
				?>
				<p class="site-description"><?php echo $targ_description; /* WPCS: xss ok. */ ?></p>
			<?php endif; ?>
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'targ' ); ?></button>
			<?php
			wp_nav_menu( array(
				'theme_location' => 'menu-1',
				'menu_id'        => 'primary-menu',
			) );
			?>
		</nav><!-- #site-navigation -->
		<div class="header-items-right">
		<?php
			if ( is_user_logged_in() ) 
			{
				$current_user = wp_get_current_user();
				if ( ($current_user instanceof WP_User) ) {
					echo '<a class="user-profile" href="#">';
					echo get_avatar( $current_user->ID, 32 );
					echo '</a>';
				}

				echo '<a href="'. wp_logout_url( home_url() ) .'">Salir</a>';
			}
		?>


		<button class="btn btn-magenta <?php if( ! is_user_logged_in() ){ echo 'lrm-login'; } ?>"><span aria-hidden="true" data-icon="&#xe001;" class="ticon-lapiz"></span> Escribir reseña</button>
		</div>
		</div>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
