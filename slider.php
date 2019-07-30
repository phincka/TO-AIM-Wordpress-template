<article class="slider">
		<?php
			if( have_rows('home_slider') ):
			while ( have_rows('home_slider') ) : the_row(); 
		?>	
		<div class="slider__single_element slides fade " >
			<div class="slider__single_element--picture" style="background-image: url('<?php echo the_sub_field('home_curiosities_picture'); ?>');">
					<h2 class="slider__single_element--title"><a href="<?php echo the_sub_field('home_curiosities_link'); ?>"><?php echo the_sub_field('home_curiosities_title'); ?></a></h2>
			</div>
		</div>
		<?php endwhile; endif;?>
	</article>