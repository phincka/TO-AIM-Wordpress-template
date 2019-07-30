<?php
/*
 * Template Name: Post
 * Template Post Type: post
 */
 get_header();  ?>
 <div class="grid">
	<article class="single_post_template">
		<div class="single_post_template__baner">
			<?php the_post_thumbnail(); ?>
		</div>
		<div class="single_post_template__box">
			<h1 class="single_post_template--title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
				<div class="single_post_template__content">
					<p><?php the_content(); ?></p>
						<div class="single_post_template__author"><?php the_author(); ?></div>		
						<div class="single_post_template__date"><?php the_date(); ?></div>
				</div>
		</div>
	</article>
</div>
<?php get_footer();