<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Law
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
<div class="fh5co-loader"></div>
<div id="page">
	<nav class="fh5co-nav" role="navigation">
		<div class="top-menu">
			<div class="container">
				<div class="row">
					<div class="col-xs-2">
						<div id="fh5co-logo">
							<a href="<?php echo home_url('/');?>"><?php echo bloginfo('name');?></a>
						</div>
					</div>
					<div class="col-xs-10 text-right menu-1">
						<?php wp_nav_menu([
							'theme_location' => 'main-menu',
							'container' => false,
							'walker' => new Law_headerMenu,
						]);?>
					</div>
					<?php //get_search_form();?>
				</div>
			</div>
		</div>
	</nav>