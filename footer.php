<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Law
 */

?>

<footer id="fh5co-footer" role="contentinfo">
		<div class="container">
			<?php if(is_active_sidebar('footer-1')):?>
			<div class="row row-pb-md">
				<?php dynamic_sidebar('footer-1')?>
			</div>
			<?php endif;?>
			<div class="row copyright">
				<div class="col-md-12 text-center">
					<p>
						<?php echo fw_get_db_settings_option('footer_text'); ?>
						<ul class="fh5co-social-icons">
							<li><a href="#"><i class="icon-twitter"></i></a></li>
							<li><a href="#"><i class="icon-facebook"></i></a></li>
							<li><a href="#"><i class="icon-linkedin"></i></a></li>
							<li><a href="#"><i class="icon-dribbble"></i></a></li>
						</ul>
					</p>
				</div>
			</div>
		</div>
	</footer>
	</div>
	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
	</div>
<?php wp_footer(); ?>
</body>
</html>
