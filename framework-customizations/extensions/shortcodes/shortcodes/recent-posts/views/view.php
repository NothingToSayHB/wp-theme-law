<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

/**
 * @var array $atts
 */
$number = abs((int)$atts['posts-number']) ? $atts['posts-number'] : 3;

?>
<?php 
$query = new WP_Query([
    'posts_per_page' => $number,
]);
?>
<div class="fw-row">
<?php if ($query->have_posts()): while ($query->have_posts()): $query->the_post();?>
		<div class="col-lg-4 col-md-4">
			<div class="fh5co-blog animate-box">
            <?php if(has_post_thumbnail()):?>
                <a href="<?php the_permalink();?>"><?php the_post_thumbnail();?></a>
            <?php endif;?>
				<div class="blog-text">
					<span class="posted_on"><?php the_time('j M');?></span>
					<span class="comment"><a href=""><?php echo get_comments_number();?><i class="icon-speech-bubble"></i></a></span>
					<h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
					<p><?php the_content();?></p>
					<a href="<?php the_permalink('');?>" class="btn btn-primary"><?php _e('Read more', 'law')?></a>
				</div> 
        	</div>
        </div>
<?php endwhile;?>
<?php endif;?>
<?php wp_reset_postdata();?>
</div>