<?php

get_header();
?>

<div id="fh5co-blog" class="fh5co-bg-section" style="background:#fcfcfc;">

	<div class="container">
		<div class="row">
			<div class="col-md-12 some-class">
		<?php if (have_posts()): while (have_posts()): the_post();?>
			<?php if(has_post_thumbnail()):?>
			<?php $img = get_the_post_thumbnail_url();?>
			<?php else: $img = 'https://picsum.photos/1280/864';?>
			<?php endif;?>
			<h1><?php the_title();?></h1>
			<img class="law-post-image pull-left" src="<?php echo $img ?>">
			<?php the_content();?>
			<?php if(comments_open() || get_comments_number()) {
				comments_template();
			}?>	
		<?php endwhile;?>
		<?php endif;?>
			</div>
		</div>
	</div>

</div>

<?php

get_footer();
