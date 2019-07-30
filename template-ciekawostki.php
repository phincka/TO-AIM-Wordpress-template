<?php
/*
 * Template Name: Ciekawostki
 * Template Post Type: ciekawostki
 */
 get_header();  ?>
<div class="grid">
	<article class="single_post_template">
		<div class="single_post_template__baner">
			<img src="<?php aImage('ciakawostki_main_picture'); ?>" alt="<?php aAlt('ciakawostki_main_picture'); ?>">
		</div>
		<div class="single_post_template__box">
			<h1 class="single_post_template--title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
				<div class="single_post_template__content">
					<p><?php echo get_field('ciakawostki_text_area') ;?></p>
				</div>
		</div>
	</article>
</div>
<?php get_footer();