<?php
/**
 * Template Name: Feature
 */
get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>
    <section class="feauture-top-sect scrollme">
        <div class="container">
            <div class="feauture-top-sect__desc">
                <div class="feauture-top-sect__title red-text"><?php echo get_field('banner_title');?></div>
                <h1 class="feauture-top-sect__undertitle"><?php echo get_field('banner_sub_title');?></h1>
                <h2><?php echo get_field('banner_text');?></h2>
				<?php if( get_field('banner_button_link_target') ) { $target = "_blank"; } else { $target = "_self"; } ?>
                <a href="<?php echo get_field('banner_button_link');?>" target="<?php echo $target ?>" class="feauture-top-sect__btn blue-btn"><?php echo get_field('banner_button_text');?></a>
            </div>
        </div>
        <div class="feauture-top-sect__pic animateme"
             data-when="view" data-easing="linear" data-from="0" data-to="1" data-translatey="50">
            <img src="<?php echo get_field('banner_image')['url']?>" alt="<?php echo get_field('banner_image')['alt']?>">
        </div>
    </section>

    <section class="how-help-sect scrollme <?php if(get_field('hide_slider')){ echo 'no-slider'; } ?>">
        <div class="cloud-steps1">
            <img src="<?php echo get_template_directory_uri(); ?>/img/bg elements/video-sect-cloud.svg" alt="">
        </div>
        <div class="cloud-steps2">
            <img src="<?php echo get_template_directory_uri(); ?>/img/bg elements/video-sect-cloud.svg" alt="">
        </div>
        <div class="cloud-steps3">
            <img src="<?php echo get_template_directory_uri(); ?>/img/bg elements/video-sect-cloud.svg" alt="">
        </div>
        <div class="container">
            <div class="how-help-sect__red-box">
				<?php if(!get_field('hide_slider')){ ?>
                <div class="how-help-sect__red-box_arrow animateme"
                     data-when="view" data-easing="linear" data-from="0" data-to="1" data-translatey="50" data-rotatez="10">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/red-box-arr.svg" alt="">
                </div>
				<?php } ?>
                <h2 class="how-help-sect__title">
                  <?php echo get_field('attendance_title');?>
                </h2>
               <?php echo get_field('attendance_text');?>
            </div>
            <?php if(!get_field('hide_slider')){ ?>
            <div class="how-help-sect__phone-slider anima teme"
                 data-when="view" data-easing="linear" data-from="0" data-to="1" data-translatey="150">
                <div class="how-help-sect__phone-wrapper">
                    <div class="how-help-sect__phone-prev">
                        <svg width="59" height="59" viewBox="0 0 59 59" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="29.5" cy="29.5" r="27.5" stroke="#3482D0" stroke-width="2"/>
                            <path d="M35 18L24 29L35 40" stroke="#3482D0" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <div class="how-help-sect__phone-next">
                        <svg width="59" height="59" viewBox="0 0 59 59" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="29.5" cy="29.5" r="27.5" stroke="#3482D0" stroke-width="2"/>
                            <path d="M24 18L35 29L24 40" stroke="#3482D0" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <img class="how-help-sect__phone-mockup" src="<?php echo get_template_directory_uri(); ?>/img/phone-mockup.svg" alt="">
                    <div class="how-help-sect__phone-pics">
                        <div class="swiper-wrapper">
                            <?php $slider=get_field('attendance_images');
                            if($slider){
                                foreach ($slider as  $value){?>
                                    <div class="how-help-sect__phone-slide swiper-slide">
                                        <img src="<?php print_R($value['url']);?>" alt="<?php print_R($value['alt']);?>">
                                    </div>
                                <?php } } ?>
                        </div>

                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </section>

    <section class="attendance-big-sect">
        <div class="cloud-steps1">
            <img src="<?php echo get_template_directory_uri(); ?>/img/bg elements/cloud-w2.svg" alt="">
        </div>
        <div class="cloud-steps2">
            <img src="<?php echo get_template_directory_uri(); ?>/img/bg elements/cloud-w1.svg" alt="">
        </div>
        <div class="cloud-steps3">
            <img src="<?php echo get_template_directory_uri(); ?>/img/bg elements/cloud-w1.svg" alt="">
        </div>
        <div class="container">
            <div class="attendance-big-sect__top scrollme">
                <h2 class="attendance-big-sect__top-title red-text">
                    <?php echo get_field('you_get_title');?>
                </h2>
                <div class="attendance-big-sect__top-wrapper animateme"
                     data-when="view" data-easing="linear" data-from="0" data-to="1" data-translatey="150">
                    <?php if( have_rows('you_get') ): ?>
                        <?php
                        $i=0;
                        while( have_rows('you_get') ): the_row(); ?>
                            <div class="attendance-big-sect__top-item">
                                <div class="attendance-big-sect__top-icon">
                                    <img src="<?php echo get_sub_field('icon')['url'];?>" alt="<?php echo get_sub_field('icon')['alt'];?>">
                                </div>
                                <p><?php echo get_sub_field('text');?></p>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>
            <div class="attendance-big-sect__bottom scrollme">
                <h2 class="attendance-big-sect__bottom-title">
                    <?php echo get_field('advantages_title');?>
                </h2>
                <div class="attendance-big-sect__bottom-wrapper">
                    <div class="attendance-big-sect__bottom-list">
                        <ul>
                            <?php if( have_rows('advantages_left') ): ?>
                                <?php
                                $i=0;
                                while( have_rows('advantages_left') ): the_row(); ?>
                                    <li><?php echo get_sub_field('text');?></li>
                                <?php endwhile; ?>
                            <?php endif; ?>
                        </ul>
                        <ul>
                            <?php if( have_rows('advantages_right') ): ?>
                                <?php
                                $i=0;
                                while( have_rows('advantages_right') ): the_row(); ?>
                                    <li><?php echo get_sub_field('text');?></li>
                                <?php endwhile; ?>
                            <?php endif; ?>
                        </ul>
                    </div>
                    <div class="attendance-big-sect__bottom-pic animateme"
                         data-when="view" data-easing="linear" data-from="0" data-to="1" data-translatey="150">
                        <img src="<?php echo get_field('advantages_image')['url']?>" alt="<?php echo get_field('advantages_image')['alt']?>">
                    </div>
                </div>
            </div>


        </div>
    </section>
<!--    --><?php //if( have_rows('faq') ): ?>
        <section class="faq-section scrollme">
            <div class="container">
                <div class="faq-section__left">
                    <h2 class="faq-section__title red-text"><?php echo get_field('faq_title');?></h2>
                    <div class="faq-section__pic">
                        <img src="<?php echo get_field('faq_image')['url']; ?>" alt="<?php echo get_field('faq_image')['alt']; ?>">
                    </div>
                </div>
                <div class="faq-section__right  animateme" data-when="view" data-easing="linear" data-from="0" data-to="1" data-translatey="70">

                    <?php
                    $i=0;
                    while( have_rows('faq') ): the_row(); ?>
                        <div class="faq-section__question">
                            <h3 class="faq-section__row">
                                <b><?php echo get_sub_field('question');?></b>
                                <div class="faq-section__icon">
                                    <span></span>
                                    <span></span>
                                </div>
                            </h3>
                            <div class="faq-section__answer">
                                <?php echo get_sub_field('answer');?>
                            </div>
                        </div>
                    <?php endwhile; ?>

<?php if( have_rows('faq') ): ?>
                    <?php
                    $i=0; ?>

                    <script type="application/ld+json">
                      {
                        "@context": "https://schema.org",
                        "@type": "FAQPage",
                        "mainEntity": [
                        <?php while( have_rows('faq') ): the_row(); ?>
                            {
                                "@type": "Question",
                                "name": "<?php echo get_sub_field('question');?>",
                                "acceptedAnswer": {
                                  "@type": "Answer",
                                  "text": "<?php echo get_sub_field('answer');?>"
                                }
                              },
                        <?php endwhile; ?>
                        ]
                      }
                    </script>
                <?php endif; ?>
                </div>

            </div>
        </section>
<!--    --><?php //endif; ?>
<?php endwhile; // end of the loop. ?>
<?php get_footer(); ?>