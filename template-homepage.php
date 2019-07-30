<?php
/**
 * Template Name: Home
 * @package ths
 */
get_header(); 
?>

<div class="grid">
	<?php get_template_part('slider'); ?>
<div class="row">					
	<aside class="aside">
		<?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar(1)): ?><h5>Nie odnaleziono widgetu.</h5><?php endif;?>                            
	</aside>
	<article class="posts">
		<?php 
		$paged = ( get_query_var( 'page' ) ) ? get_query_var( 'page' ) : 1;
		$args = array(
		'post_type' => 'post',
		'post_status' => 'publish',
		'posts_per_page' => 7,
		'paged' => $paged
		); 
		$query = new WP_Query($args);
		?>
		<?php if($query->have_posts()) : ?>
			<?php while ($query->have_posts()) : $query->the_post(); ?>
				<div class="single_post" data-animate="fadeIn">
					<div class="single_post__main_picture"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a></div>
						<h1 class="single_post__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
							<div class="single_post__description"><?php echo get_field('post_short_desription'); ?></div>
							<div class="single_post__author"><?php the_author(); ?></div>
								<div class="single_post__date"><?php the_date(); ?></div>
									<div class="single_post__read_more"><a href="<?php the_permalink(); ?>">CZYTAJ WIĘCEJ</a></div>
				</div>
			<?php endwhile; ?>
			<?php if (function_exists("pagination")) {
				pagination($query->max_num_pages);
			} ?>			
		<?php endif; ?>
		<?php wp_reset_query(); ?>
	</article>
<?php get_footer();