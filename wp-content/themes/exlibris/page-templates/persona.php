<?php
/**
 * Template Name: Persona
 */
get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>
    <section class="persona-top-sect scrollme">
        <div class="container">
            <div class="persona-top-sect__desc">
                <div class="persona-top-sect__title red-text"><?php echo get_field('banner_title');?></div>
                <h1 class="persona-top-sect__undertitle"><?php echo get_field('banner_subtitle');?></h1>
                <p><?php echo get_field('banner_text');?></p>
                <div class="persona-top-sect__pic animateme"
                    data-when="view" data-easing="linear" data-from="0" data-to="1" data-translatey="180" >
                    <img class="desk_img" src="<?php echo get_field('banner_image')['url']?>" alt="<?php echo get_field('banner_image')['alt']?>">
                    <img class="mob_img" src="<?php echo get_field('banner_image_mobile')['url']?>" alt="<?php echo get_field('banner_image_mobile')['alt']?>">
                </div>
				<?php if( get_field('banner_button_link_target') ) { $target = "_blank"; } else { $target = "_self"; } ?>
                <a href="<?php echo get_field('banner_button_link');?>" target="<?php echo $target ?>" class="persona-top-sect__btn blue-btn"><?php echo get_field('banner_button_text');?></a>
            </div>
        </div>
        <!-- <div class="persona-top-sect__pic animateme"
             data-when="view" data-easing="linear" data-from="0" data-to="1" data-translatey="180" >
            <img class="desk_img" src="<?php echo get_field('banner_image')['url']?>" alt="<?php echo get_field('banner_image')['alt']?>">
            <img class="mob_img" src="<?php echo get_field('banner_image_mobile')['url']?>" alt="<?php echo get_field('banner_image_mobile')['alt']?>">
        </div> -->
    </section>

    <section class="toolkit-sect scrollme">
        <div class="cloud-steps1">
            <img src="<?php echo get_template_directory_uri(); ?>/img/bg elements/video-sect-cloud.svg" alt="">
        </div>
        <div class="cloud-steps2">
            <img src="<?php echo get_template_directory_uri(); ?>/img/bg elements/video-sect-cloud.svg" alt="">
        </div>
        <div class="container container_max">
            <div class="left_red_box">
                <div class="toolkit-sect__undertitle"><?php echo get_field('toolkit_text');?></div>
                <h2 class="toolkit-sect__title"><?php echo get_field('toolkit_title');?></h2>
            </div>
            <div class="right_gray_box animateme"
                 data-when="view" data-easing="linear" data-from="0" data-to="1" data-translatey="120" >
                <div class="attendance-big-sect__bottom-list">
                    <ul class="wrapper_points_text">
                        <?php if( have_rows('toolkit_left') ): ?>
                            <?php
                            $i=0;
                            while( have_rows('toolkit_left') ): the_row(); ?>
                                <li class="points_text"><?php echo get_sub_field('text');?></li>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </ul>
                    <ul class="wrapper_points_text">
                        <?php if( have_rows('toolkit_right') ): ?>
                            <?php
                            $i=0;
                            while( have_rows('toolkit_right') ): the_row(); ?>
                                <li class="points_text"><?php echo get_sub_field('text');?></li>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="steps-section steps-section_dop scrollme">
        <div class="cloud-steps1">
            <img src="<?php echo get_template_directory_uri(); ?>/img/bg elements/video-sect-cloud.svg" alt="">
        </div>
        <div class="cloud-steps2">
            <img src="<?php echo get_template_directory_uri(); ?>/img/bg elements/video-sect-cloud.svg" alt="">
        </div>
        <div class="cloud-steps3">
            <img src="<?php echo get_template_directory_uri(); ?>/img/bg elements/video-sect-cloud.svg" alt="">
        </div>
        <div class="cloud-steps1 cloud-steps4">
            <img src="<?php echo get_template_directory_uri(); ?>/img/bg elements/video-sect-cloud.svg" alt="">
        </div>
        <div class="cloud-steps2 cloud-steps5">
            <img src="<?php echo get_template_directory_uri(); ?>/img/bg elements/video-sect-cloud.svg" alt="">
        </div>
        <div class="cloud-steps3 cloud-steps6">
            <img src="<?php echo get_template_directory_uri(); ?>/img/bg elements/video-sect-cloud.svg" alt="">
        </div>
        <div class="cloud-steps3 cloud-steps7">
            <img src="<?php echo get_template_directory_uri(); ?>/img/bg elements/video-sect-cloud.svg" alt="">
        </div>
        <div class="steps-met2 animateme" data-when="view" data-easing="linear" data-from="0" data-to="1" data-translatey="500">
            <img src="<?php echo get_template_directory_uri(); ?>/img/bg elements/steps-met2.svg" alt="">
        </div>
        <div class="circle-steps animateme" data-when="view" data-easing="linear" data-from="1" data-to=".5" data-translatex="400" data-rotatez="400">
            <img src="<?php echo get_template_directory_uri(); ?>/img/bg elements/video-sect-circle.svg" alt="">
        </div>
        <div class="container">
            <?php if( have_rows('blocks') ): ?>
                <?php
                $i=0;
                while( have_rows('blocks') ): the_row(); $i++; ?>
                    <div class="steps-section__step steps-section__step_dop step00<?php echo $i; ?> scrollme">
                        <?php if($i%2==0){ ?>
                            <?php if (get_sub_field('image')['url']) { ?>
                                <div class="steps-section__pic animateme"
                                     data-when="view" data-easing="linear" data-from="0" data-to="1" data-translatey="180" >
                                    <img src="<?php echo get_sub_field('image')['url'];?>" alt="<?php echo get_sub_field('image')['alt'];?>">
                                </div>
                            <?php } ?>
                        <?php } ?>
                        <div class="steps-section__text">
                            <h2 class="red-text">
                               <?php echo get_sub_field('title');?>
                            </h2>
                            <?php echo get_sub_field('text');?>
							<?php if( get_sub_field('button_link_external') ) { $target = "_blank"; } else { $target = "_self"; } ?>
                            <a href="<?php echo get_sub_field('button_link');?>" target="<?php echo $target ?>" class="blue-btn"><?php echo get_sub_field('button_text');?></a>
                        </div>
                        <?php if($i%2!=0){ ?>
                        <div class="steps-section__pic animateme"
                             data-when="view" data-easing="linear" data-from="0" data-to="1" data-translatey="180" >
                            <img src="<?php echo get_sub_field('image')['url'];?>" alt="<?php echo get_sub_field('image')['alt'];?>">
                        </div>
                        <?php } ?>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>

        </div>
    </section>

<?php if (get_field('hide_show_reviews')) { ?>

    <section class="slider-section">
        <div class="inner_slider-section">
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
        </div>
        <div class="swiper sliderSwiper">
            <div class="swiper-wrapper">
                <?php if( have_rows('reviews') ): ?>
                    <?php
                    $i=0;
                    while( have_rows('reviews') ): the_row(); ?>
                        <div class="swiper-slide">
                            <div class="wrapper_slide_item">
                                <div class="slide_item">
                                    <div class="reviews_user">
                                        <img class="foto_img" src="<?php echo get_sub_field('image')['url'];?>" alt="<?php echo get_sub_field('image')['alt'];?>">
                                    </div>
                                    <div class="reviews_text">
                                        <p class="text_u"><i><?php echo get_sub_field('review');?></i></p>
                                        <div class="name_u"><?php echo get_sub_field('author');?></div>
                                        <p class="post_u"><?php echo get_sub_field('author_position');?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </section>

<?php } ?>

    <section class="faq-section scrollme">
        <div class="container">
            <div class="faq-section__left">
                <h2 class="faq-section__title red-text"><?php echo get_field('faq_title');?></h2>
                <div class="faq-section__pic">
                    <img src="<?php echo get_field('faq_image')['url']; ?>" alt="<?php echo get_field('faq_image')['alt']; ?>">
                </div>
            </div>
            <div class="faq-section__right  animateme" data-when="view" data-easing="linear" data-from="0" data-to="1" data-translatey="70">
                <?php if( have_rows('faq') ): ?>
                    <?php
                    $i=0;
                    while( have_rows('faq') ): the_row(); ?>
                        <div class="faq-section__question">
                            <div class="faq-section__row">
                                <h3><?php echo get_sub_field('question');?></h3>
                                <div class="faq-section__icon">
                                    <span></span>
                                    <span></span>
                                </div>
                            </div>
                            <div class="faq-section__answer">
                                <?php echo get_sub_field('answer');?>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
				
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
<?php endwhile; // end of the loop. ?>
<?php get_footer(); ?>