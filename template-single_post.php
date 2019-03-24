<?php
/*
 * Template Name: Featured Article
 * Template Post Type: post, page, product
 */
  
 get_header();  ?>


<div class="single_post__content"><?php the_content(); ?></div>
			<div class="single_post">
				<div class="single_post__main_picture"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a></div>
					<h1 class="single_post__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
						<div class="single_post__description"><?php echo get_field('post_short_desription'); ?></div>
							<div class="single_post__read_more"><a href="<?php the_permalink(); ?>">CZYTAJ WIĘCEJ</a></div>
							<div class="single_post__author"><?php the_author(); ?></div>		
								<div class="single_post__date"><?php the_date(); ?></div>
			</div>





<?php get_footer();