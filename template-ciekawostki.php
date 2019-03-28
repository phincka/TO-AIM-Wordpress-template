<?php
/*
 * Template Name: Ciekawostki
 * Template Post Type: ciekawostki
 */
  
 get_header();  ?>
<section class="single_post_template">
	<div class="single_post_template__baner">
		<img src="<?php echo get_field('ciakawostki_main_picture') ;?>" alt="x">
	</div>
	<div class="single_post_template__box">
		<h1 class="single_post_template--title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
			<div class="single_post_template__content">
				<p><?php echo get_field('ciakawostki_text_area') ;?></p>
			</div>
	</div>
</section>
<?php get_footer();