<?php
/**
 * Template Name: Contact
 * @package ths
 */
get_header(); ?>
<section class="contact_section">
    <h1 data-animate="slideInLeft"><?php echo the_field('contact_title'); ?></h1>
        <div class="contact_section__description">
            <div class="contact_section__description--text">
                <div data-animate="fadeIn"><?php echo the_field('contact_description'); ?></div>
                <div class="contact_section__contact_list">
                    <h2 data-animate="slideInRight"><?php echo the_field('contact_forms_title') ?></h2>
                        <?php
                            if( have_rows('contact_forms') ):
                                while ( have_rows('contact_forms') ) : the_row();
                                    if( get_row_layout() == 'email' ):
                        ?>
                                    <div data-animate="slideInLeft" class="contact_section__contact_list--single">
                                        <img src="<?php echo the_sub_field('contact_type_icon'); ?>" alt="Contact type icon">
                                        <a target="_blank" href="mailto:<?php echo the_sub_field('contact_mail'); ?>"><?php echo the_sub_field('contact_name'); ?></a>
                                    </div>
                                    <?php elseif( get_row_layout() == 'telephone' ): ?>
                                        <div data-animate="slideInLeft" class="contact_section__contact_list--single">
                                            <img src="<?php echo the_sub_field('contact_type_icon'); ?>" alt="Contact type icon">
                                            <a target="_blank" href="tel:<?php echo the_sub_field('contact_phone_number'); ?>"><?php echo the_sub_field('contact_name'); ?></a>
                                        </div>
                                    <?php elseif( get_row_layout() == 'link' ): ?>
                                        <div data-animate="slideInLeft" class="contact_section__contact_list--single">
                                            <img src="<?php echo the_sub_field('contact_type_icon'); ?>" alt="Contact type icon">
                                            <a target="_blank" href="<?php echo the_sub_field('contact_link'); ?>"><?php echo the_sub_field('contact_name'); ?></a>
                                        </div>
                                    <?php endif; endwhile; else : endif; ?>
                </div>
            </div>
                <div data-animate="slideInRight" class="contact_section__description--picture"><img src="<?php echo the_field('contact_picture');?>" alt="Contact picture"></div>  
            </div>
        </div>
</section>
<?php get_footer(); 