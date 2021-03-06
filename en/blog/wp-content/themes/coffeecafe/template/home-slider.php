<div id="slides_full" class="NovelLite_slider">
    <input type="hidden" id="txt_slidespeed" value="<?php if (get_theme_mod('NovelLite_slider_speed','') != '') { echo stripslashes(get_theme_mod('NovelLite_slider_speed')); } else { ?>3000<?php } ?>"/>
    <?php $coffeecafe_form = get_theme_mod('section_contactform','[lead-form form-id=1 title=Contact Us]'); ?>
    <div class="right-caption">
        <!-- testcodepopup -->
        <p class="contact-popup-hide">
            <a class="button" href="#popup1"><?php echo esc_html(get_theme_mod('section_contactform_title','')); ?></a></p>
            <div id="popup1" class="overlay">
                <div class="popup">
                    <a class="close" href="#">&times;</a>
                    <div class="cnt-title" style="padding-top:20px;padding-bottom:20px;">
                        <p class="contact-heading"><?php echo esc_html(get_theme_mod('section_contactform_title','')); ?></p>
                        <div class="title_border"></div>
                    </div>
                    <?php
                    if (function_exists( 'lfb_lead_form_shortcode' ) ) {
                    echo do_shortcode($coffeecafe_form);
                    }
                    ?>
                </div>
            </div>
            <div id="cnt-page">
                <?php
                if(get_theme_mod('section_contactform_title')!=''){ ?>
                <div class="cnt-title" style="padding-top:20px;padding-bottom:20px;">
                    <p class="contact-heading"><?php echo esc_html(get_theme_mod('section_contactform_title','')); ?></p>
                    <div class="title_border"></div>
                </div>
                <?php } ?>
                <?php  if (function_exists( 'lfb_lead_form_shortcode' ) ) {
                echo do_shortcode($coffeecafe_form);
                } ?>
            </div>
        </div>
        <ul class="slides-container">
            <li>
                <?php if (get_theme_mod('first_slider_image','') != '') { ?>
                <a href="<?php
                    if (get_theme_mod('first_slider_link','') != '') {
                    echo esc_url(get_theme_mod('first_slider_link'));
                    }
                    ?>" >
                <img  src="<?php echo esc_url(get_theme_mod('first_slider_image')); ?>" alt=""/></a>
                <?php } else { ?>
                <img  src="<?php echo get_stylesheet_directory_uri(); ?>/images/main.jpeg" alt="<?php _e('Slide Image','coffeecafe'); ?>"/>
                <?php } ?>
                <div class="slider_overlay"></div>
                <div class="container container_caption">
                    <div class="left-caption">
                        <?php if (get_theme_mod('first_slider_heading','') != '') { ?>
                        <h1><a href="<?php
                            if (get_theme_mod('first_slider_link','') != '') {
                            echo esc_url(get_theme_mod('first_slider_link'));
                            }
                        ?>"><?php echo esc_html(get_theme_mod('first_slider_heading')); ?></a></h1>
                        <?php } else { ?>
                        <h1><?php if(is_customize_preview()){ _e('Everyday is a Coffee day','coffeecafe'); } ?></h1>
                        <?php } ?>
                        <div class="clearfix"></div>
                        <?php if (get_theme_mod('first_slider_desc') != '') { ?>
                        <p>
                            <?php echo esc_html(get_theme_mod('first_slider_desc')); ?>
                        </p>
                        <?php } ?>
                        
                        
                        <div class="clearfix"></div>
                        <div class="main-slider-button">
                            <?php if (get_theme_mod('first_button_text','') != '') { ?>
                            <a href="<?php
                                if (get_theme_mod('first_button_link','') != '') {
                                echo esc_url(get_theme_mod('first_button_link'));
                                } else {
                                echo "#";}
                                ?>" class="theme-slider-button">
                                <?php echo esc_html(get_theme_mod('first_button_text')); ?>
                            </a>
                            <?php } else { ?>
                            <a href="#" class="theme-slider-button"><?php _e('Button','coffeecafe'); ?></a>
                            <?php } ?>
                        </div>
                    </div>
                    
                </div>
            </li>
            <?php if (get_theme_mod('second_slider_image','') != '') { ?>
            <li>
                <?php if (get_theme_mod('second_slider_image','') != '') { ?>
                <a href="<?php
                    if (get_theme_mod('second_slider_link','') != '') {
                    echo esc_url('second_slider_link');
                    }
                    ?>" >
                <img  src="<?php echo esc_url(get_theme_mod('second_slider_image')); ?>" alt=""/></a>
                <?php } else { ?>
                <img  src="<?php echo get_stylesheet_directory_uri(); ?>/images/main.jpg" alt="<?php _e('Slide Image','coffeecafe'); ?>"/>
                <?php } ?>
                <div class="slider_overlay"></div>
                <div class="container container_caption">
                    <div class="left-caption">
                        <?php if (get_theme_mod('second_slider_heading','') != '') { ?>
                        <h1><a href="<?php
                            if (get_theme_mod('second_slider_link','') != '') {
                            echo esc_url(get_theme_mod('second_slider_link'));
                            }
                        ?>"><?php echo esc_html(get_theme_mod('second_slider_heading')); ?></a></h1>
                        <?php } else { ?>
                        <h1>Awesome free theme for doctors</h1>
                        <?php } ?>
                        <div class="clearfix"></div>
                        <?php if (get_theme_mod('second_slider_desc') != '') { ?>
                        <p>
                            <?php echo esc_html(get_theme_mod('second_slider_desc')); ?>
                        </p>
                        <?php } else { ?>
                        <p><?php _e('A DELIGHTFUL PATIENT EXPERIENCE','coffeecafe'); ?></p>
                        <?php } ?>
                        
                        
                        <div class="clearfix"></div>
                        <div class="main-slider-button">
                            <?php if (get_theme_mod('second_slider_text','') != '') { ?>
                            <a href="<?php
                                if (get_theme_mod('second_slider_link','') != '') {
                                echo esc_url(get_theme_mod('second_slider_link'));
                                } else {
                                echo "#";
                                }
                                ?>" class="theme-slider-button">
                            <?php echo esc_html(get_theme_mod('second_slider_text')); ?>     
                            </a>
                            <?php } else { ?>
                            <a href="#" class="theme-slider-button"><?php _e('Read More','coffeecafe'); ?></a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </li>
            <?php } ?>
        </ul>
        <nav class="slides-navigation">
            <a href="#" class="next"><?php _e('Next','coffeecafe'); ?></a>
            <a href="#" class="prev"><?php _e('Previous','coffeecafe'); ?></a>
        </nav>
    </div>