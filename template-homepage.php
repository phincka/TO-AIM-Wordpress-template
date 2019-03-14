<?php
/**
 * Template Name: Home
 * @package ths
 */
get_header(); ?>


<div class="grid">
	<div class="row">
		<H1>HOME</H1>

<section class="slider slideshow-container">
	<div class="">
	<?php
		if( have_rows('home_slider') ):
		while ( have_rows('home_slider') ) : the_row(); 

	?>	
	
	<div class="slider__single_element mySlides fade">
			<a href="<?php echo the_sub_field('home_curiosities_link'); ?>">
        
				<div class="xd" style="background-image: url('<?php echo the_sub_field('home_curiosities_picture'); ?>');">


					<h2><?php echo the_sub_field('home_curiosities_title'); ?></h2>
				</div>

			</a>
	</div>
		
	<?php endwhile; endif;?>
	<div style="text-align:center">
		<span class="dot"></span> 
		<span class="dot"></span> 
		<span class="dot"></span> 
	</div>
</div>
</section>
		




<section class="posts">
	<?php 
	$args = array(
	'post_type' => 'post',
	'post_status' => 'publish',
	'posts_per_page' => 30,
	); 
	$query = new WP_Query($args);
	?>
	<?php if($query->have_posts()) : ?>
		<?php while ($query->have_posts()) : $query->the_post(); ?>
			<div class="single_post">
				<div class="single_post__main_picture"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a></div>
					<h1 class="single_post__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
						<div class="single_post__description"><?php echo get_field('post_short_desription'); ?></div>
						<div class="single_post__content"><?php the_content(); ?></div>
							<div class="single_post__author"><?php the_author(); ?></div>		
								<div class="single_post__date"><?php the_date(); ?></div>
						<?php comments_template();?>

							</div>
							<?php endwhile; ?>
							
							
							<?php endif; ?>

	<?php wp_reset_query(); ?>
</section>

<?php get_footer();