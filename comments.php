<section style="display:none;" class="comments_top">
	<?php comment_form(); ?>
		<div class="coments_coments">
            <?php if ( have_comments() ) : ?>
                    <h4 id="comments"><?php comments_number('No Comments', 'One Comment', '% Comments' );?></h4>
                        <div class="ul-com"><?php wp_list_comments(); ?></div>
                        <div>
                            <div><?php previous_comments_link() ?></div>
                            <div><?php next_comments_link() ?></div>
                        </div>
            <?php else :?>
            <?php if ( comments_open() ) :
                else :
                endif;
                endif;?>
		</div>
</section>