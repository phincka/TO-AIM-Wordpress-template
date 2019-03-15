<?php
/**
 * Template Name: Home
 * @package ths
 */
get_header(); ?>


<div class="grid">

<section class="slider">
	<?php
		if( have_rows('home_slider') ):
		while ( have_rows('home_slider') ) : the_row(); 
	?>	
	
	<div class="slider__single_element slieds fade" >
		<a href="<?php echo the_sub_field('home_curiosities_link'); ?>">
			<div class="slider__single_element--picture" style="background-image: url('<?php echo the_sub_field('home_curiosities_picture'); ?>');">
				<h2 class="slider__single_element--title"><?php echo the_sub_field('home_curiosities_title'); ?></h2>
			</div>
		</a>
	</div>
		
	<?php endwhile; endif;?>
	<div class="slider__dots" style="text-align:center">
		<span class="dot"></span> 
		<span class="dot"></span> 
		<span class="dot"></span> 
	</div>
</section>
		

<div class="row">


<section class="sidebar">
    <?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar(1)): ?><h5>Brak widgetu.</h5><?php endif;?>                            
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
							<div class="single_post__read_more"><a href="<?php the_permalink(); ?>">CZYTAJ WIĘCEJ</a></div>
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