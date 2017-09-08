<?php
$contactus_shortcode = get_theme_mod('cf_shtcd_','[lead-form form-id=1 title=Contact Us]');
?>
<?php if (get_theme_mod('cf_image','') != '') { ?>
<section id="section5" class="contact_section" style="background: url(<?php echo esc_url(get_theme_mod('cf_image','')); ?>) center repeat fixed;">
    <?php } else { ?>
    <section id="section5" class="contact_section">
        <?php } ?>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <?php if (get_theme_mod('cf_head_','') != '') { ?>
                    <h2 class="section-heading"><?php echo esc_html(get_theme_mod('cf_head_','')); ?></h2>
                    <?php } else { ?>
                    <h2 class="section-heading"><?php if(is_customize_preview()){ _e('Contact Us','coffeecafe'); } ?></h2>
                    <?php } ?>
                    <?php if (get_theme_mod('cf_desc_','') != '') { ?>
                    <h3 class="section-subheading text-muted contact"><?php echo esc_html(get_theme_mod('cf_desc_','')); ?></h3>
                    <?php } ?>
                </div>
            </div>
            <div class="row">
                <?php
                if (function_exists( 'lfb_lead_form_shortcode' ) ) {
                echo do_shortcode($contactus_shortcode);
                }
                ?>
            </div>
        </div>
        <div class="map">
            <?php
            $map = get_theme_mod('map_address');
            if($map !=''){
            echo html_entity_decode($map);
            } ?>
        </div>
    </section>