<?php
/**
 * Template Name: Home
 */
get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>
    <section class="your-campus scrollme">
        <div class="your-campus-bg">
            <video width="1935" height="621" class="your-campus-bg-main" src="<?php echo get_field('video_')['url']?>" loop muted playsinline autoplay poster="<?php echo get_field('video__image_')['url']?>"></video>
            <video width="1935" height="621" class="your-campus-bg-mobile" src="<?php echo get_field('video_mobile')['url']?>" loop muted playsinline autoplay poster="<?php echo get_field('video_image_mobile')['url']?>"></video>
        </div>
        <div class="container" >
            <div class="your-campus__left">
                <div class="your-campus__title head__title">
                    <?php echo get_field('banner_title');?>
                </div>
                <h1 class="your-campus__undertitle head__undertitle">
                   <?php echo get_field('banner_subtitle');?>
                </h1>
                <p><?php echo get_field('banner_text');?>
                </p>
				<div class="your-campus__btn">
               	 	<a class="trial-btn" href="<?php echo get_field('video_link_button');?>"><?php echo get_field('video_text_button');?></a>
            	</div>
            </div>
            <div class="your-campus__right">
                <div class="your-campus__phone">
                    <div class="your-campus__phone-gif"></div>
                    <img src="<?php echo get_field('video_image_phone')['url']; ?>" alt="<?php echo get_field('video_image_phone')['alt']; ?>">
                </div>
            </div>
        </div>
    </section>

    <section class="introducing">
        <div class="container scrollme">
            <div class="introducing__left animateme"
                 data-when="view" data-easing="linear" data-from="0.2" data-to="1" data-translatey="-180" >
                <img class="introducing__phone" src="<?php echo get_field('second_block_image')['url']?>" alt="<?php echo get_field('second_block_image')['alt']?>">
                <img class="arrow animateme" data-when="view" data-easing="linear" data-from="0" data-to="1"
                     data-translatey="80" data-rotatez="10" src="<?php echo get_template_directory_uri(); ?>/img/arr-introducing.svg" alt="">
                <img class="arrow mobile" src="<?php echo get_template_directory_uri(); ?>/img/arr-introducing_m.svg" alt="">
            </div>
            <div class="introducing__right" >
                <h2 class="red-text">
                   <?php echo get_field('second_block_title');?>
                </h2>
                <p><?php echo get_field('second_block_text');?></p>
				<?php if( get_field('second_block_button_target') ) { $target = "_blank"; } else { $target = "_self"; } ?>
                <a href="<?php echo get_field('second_block_button_link');?>" target="<?php echo $target ?>" class="blue-btn"><?php echo get_field('second_block_button_text');?></a>
            </div>
        </div>
    </section>

    <section class="help-you">
        <div class="container scrollme">
            <div class="cloud animateme" data-when="view" data-easing="linear" data-from="0" data-to="1" data-translatex="-1000">
                <img src="<?php echo get_template_directory_uri(); ?>/img/bg elements/ho-we-can-cloud.svg" alt="">
            </div>
            <div class="help-you__left">
                <div class="help-you__arrow">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/help-arr.svg" alt="" class="animateme" data-when="view" data-easing="linear" data-from="0.2" data-to="1"
                         data-translatey="-80" data-rotatez="30">
                    <img class="mobile" src="<?php echo get_template_directory_uri(); ?>/img/help-arr_m.svg" alt="">
                </div>
                <h2 class="help-you__title red-text">
                    <?php echo get_field('help_you_title');?>
                </h2>
                <p><?php echo get_field('help_you_text');?></p>
                <div class="help-you__buttons-wrap">
                    <?php if( have_rows('help_you_buttons') ): ?>
                        <?php
                        $i=0;
                        while( have_rows('help_you_buttons') ): the_row(); $i++;?>
                            <button data-tab="#tab-<?= $i ?>" class="help-you__btn <?php echo get_sub_field('class');?>">
                                <div class="help-you__btn-gif">
                                    <img src="<?php echo get_sub_field('icon')['url'];?>" data-icon="<?php echo get_sub_field('icon')['url'];?>"  data-gif="<?php echo get_sub_field('icon_gif')['url'];?>" alt="<?php echo get_sub_field('icon')['alt'];?>">
                                </div>
                                <span><?php echo get_sub_field('title');?></span>
                            </button>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>
            <div class="help-you__right anima teme"
                 data-when="view" data-easing="linear" data-from="0" data-to="1" data-translatey="-180">
                <div class="tabs-container">
                    <?php if( have_rows('help_you_buttons') ): ?>
                        <?php
                        $i=0;
                        while( have_rows('help_you_buttons') ): the_row(); $i++; ?>
                            <div class="tab" id="tab-<?php echo $i; ?>">
                                <h2 class="blue-title">
                                    <img src="<?php echo get_sub_field('icon_text')['url'];?>" alt="<?php echo get_sub_field('icon_text')['alt'];?>">
                                    <span><?php echo get_sub_field('text_title');?></span>
                                </h2>
                                <div class="help-you__list">
                                    <ul>
                                        <?php if( get_sub_field('text') ): ?>
                                            <?php while( has_sub_field('text') ): ?>
                                                <li>
                                                    <b><?php echo get_sub_field('title');?></b>
                                                    <span><?php echo get_sub_field('text');?></span>
                                                </li>
                                            <?php endwhile; ?>
                                        <?php endif; ?>
                                    </ul>
									<?php if( get_sub_field('button_link_target') ) { $target = "_blank"; } else { $target = "_self"; } ?>
                                    <a href="<?php echo get_sub_field('button_link');?>" target="<?php echo $target ?>" class="blue-btn"><?php echo get_sub_field('button_text');?></a>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <section class="video-section scrollme">
        <div class="circle animateme" data-when="view" data-easing="linear" data-from="0" data-to="1" data-translatey="400" data-rotatez="400">
            <img src="<?php echo get_template_directory_uri(); ?>/img/bg elements/video-sect-circle.svg" alt="">
        </div>
        <div class="container">
            <div class="video-section__left">
                <div class="video-section__arrow">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/video-arr.svg" alt="">
                    <img class="mobile" src="<?php echo get_template_directory_uri(); ?>/img/video-arr_m.svg" alt="">
                </div>
                <h2 class="red-text"><?php echo get_field('video_title');?></h2>
            </div>
            <div class="video-section__right animateme" data-when="view" data-easing="linear" data-from="0" data-to="1" data-translatey="-180">
                <div class="video-section__video">
                    <div class="video-block" data-video-type="<?php echo get_field('video_type');?>" data-video-id="<?php if(get_field('video_type')=='mp4'){ echo get_field('video')['url']; }else{ echo get_field('video_id');}?>">
                        <div class="block-video-container">
                            <div class="block-preview">
                                <img src="<?php echo get_field('video_image')['url']?>" alt="<?php echo get_field('video_image')['alt']?>">
                            </div>
                            <div class="block-inner">
                                <button class="play-btn" aria-label="Запустить видео"></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="steps-section scrollme">
        <div class="cloud-undervideo">
            <img src="<?php echo get_template_directory_uri(); ?>/img/bg elements/video-sect-cloud.svg" alt="">
        </div>
        <div class="cloud-steps1">
            <img src="<?php echo get_template_directory_uri(); ?>/img/bg elements/video-sect-cloud.svg" alt="">
        </div>
        <div class="cloud-steps2">
            <img src="<?php echo get_template_directory_uri(); ?>/img/bg elements/video-sect-cloud.svg" alt="">
        </div>
        <div class="cloud-steps3">
            <img src="<?php echo get_template_directory_uri(); ?>/img/bg elements/video-sect-cloud.svg" alt="">
        </div>
        <div class="steps-met1 animateme" data-when="view" data-easing="linear" data-from="0" data-to="1" data-translatey="500">
            <img src="<?php echo get_template_directory_uri(); ?>/img/bg elements/steps-met1.svg" alt="">
        </div>
        <div class="steps-met2 animateme" data-when="view" data-easing="linear" data-from="0" data-to="1" data-translatey="500">
            <img src="<?php echo get_template_directory_uri(); ?>/img/bg elements/steps-met2.svg" alt="">
        </div>
        <div class="circle-steps animateme" data-when="view" data-easing="linear" data-from="1" data-to=".5" data-translatex="400" data-rotatez="400">
            <img src="<?php echo get_template_directory_uri(); ?>/img/bg elements/video-sect-circle.svg" alt="">
        </div>
        <div class="container">
            <?php if( have_rows('info_blocks') ): ?>
                <?php
                $i=0;
                while( have_rows('info_blocks') ): the_row(); $i++; ?>
                    <div class="steps-section__step step0<?php echo $i; ?> scrollme">

                        <?php if($i%2==0){ ?>
                            <div class="steps-section__pic animateme" data-when="view" data-easing="linear" data-from="0" data-to="1" data-translatey="150">
                                <img  src="<?php echo get_sub_field('image')['url'];?>" alt="<?php echo get_sub_field('image')['alt'];?>">
                            </div>
                            <?php if(get_sub_field('image_arrow')){ ?>
                                <div class="steps-section__arrow animateme" data-when="view" data-easing="linear" data-from="1" data-to="0" data-translatey="100" data-translatex="-30" data-crop="true" data-rotatez="-85">
                                    <img src="<?php echo get_sub_field('image_arrow')['url'];?>" alt="<?php echo get_sub_field('image_arrow')['alt'];?>">
                                </div>
                            <?php } ?>
                            <?php if(get_sub_field('text_window')){ ?>
                                <div class="steps-section__popup animateme" data-when="view" data-easing="linear" data-from="0" data-to="1" data-translatey="150">
                                    <?php echo get_sub_field('text_window');?>
                                </div>
                            <?php } ?>
                        <?php } ?>

                        <div class="steps-section__text">
                            <h2 class="red-text">
                                <?php echo get_sub_field('title');?>
                            </h2>
                            <?php echo get_sub_field('text');?>
                            <?php if(get_sub_field('type_button')=='link'){ ?>
                                <?php if (get_sub_field('link_button')) { ?>
										<?php if( get_sub_field('link_button_target') ) { $target = "_blank"; } else { $target = "_self"; } ?>
                                        <a href="<?php echo get_sub_field('link_button');?>" target="<?php echo $target ?>"  class="blue-btn"><?php echo get_sub_field('text_button');?></a>
                                    <?php if(get_sub_field('text_button_mobile')){ ?>
                                        <a href="<?php echo get_sub_field('link_button');?>" target="<?php echo $target ?>"  class="blue-btn mobile"><?php echo get_sub_field('text_button_mobile');?></a>
                                    <?php } ?>
                                <?php } ?>
                            <?php }else{ ?>
                                <?php if (get_sub_field('video_id')) { ?>
                                    <a href="#" class="blue-btn" data-video-type="<?php echo get_sub_field('type_video');?>" data-video-modal="<?php if(get_sub_field('type_video')=='mp4'){ echo get_sub_field('video')['url']; }else{ echo get_sub_field('video_id');}?>">
                                        <span>Watch the video</span>
                                        <img src="<?php echo get_template_directory_uri(); ?>/img/play.svg" alt="">
                                    </a>
                                <?php } ?>
                            <?php } ?>
                        </div>


                        <?php if($i%2!=0){ ?>
                            <div class="steps-section__pic animateme" data-when="view" data-easing="linear" data-from="0" data-to="1" data-translatey="150">
                                <img  src="<?php echo get_sub_field('image')['url'];?>" alt="<?php echo get_sub_field('image')['alt'];?>">
                            </div>
                            <?php if(get_sub_field('image_arrow')){ ?>
                            <div class="steps-section__arrow animateme" data-when="view" data-easing="linear" data-from="1" data-to="0" data-translatey="100" data-translatex="-30" data-crop="true" data-rotatez="-85">
                                <img src="<?php echo get_sub_field('image_arrow')['url'];?>" alt="<?php echo get_sub_field('image_arrow')['alt'];?>">
                            </div>
                            <?php } ?>
                            <?php if(get_sub_field('text_window')){ ?>
                            <div class="steps-section__popup animateme" data-when="view" data-easing="linear" data-from="0" data-to="1" data-translatey="150">
                               <?php echo get_sub_field('text_window');?>
                            </div>
                            <?php } ?>
                        <?php } ?>


                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </section>

    <section class="statistics-section scrollme">
        <div class="container">
            <h2 class="section-title"><?php echo get_field('statistics_title');?></h2>
            <div class="statistics-section__wrapper">
                <?php if( have_rows('statistics') ): ?>
                    <?php
                    $i=0;
                    while( have_rows('statistics') ): the_row(); ?>
                        <div class="statistics-section__cell animateme" data-easing="linear" data-when="view" data-from="0.45" data-to="0.15" data-translatex="-200">
                            <div class="statistics-section__number"><?php echo get_sub_field('number');?></div>
                            <div class="statistics-section__desc"><?php echo get_sub_field('text');?></div>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <section class="trusted-section">
        <h2 class="section-title"><?php echo get_field('trusted_by_title');?></h2>
        <div class="trusted-section__slider swiper-container">
            <div class="trusted-section__wrapper swiper-wrapper">
                <?php if( have_rows('trusted_by') ): ?>
                    <?php
                    $i=0;
                    while( have_rows('trusted_by') ): the_row(); ?>
                        <div class="trusted-section__slide swiper-slide">
                            <a target="_blank" rel="nofollow" href="<?php echo get_sub_field('link');?>">
                                <img src="<?php echo get_sub_field('logo')['url']; ?>" alt="<?php echo get_sub_field('logo')['alt']; ?>">
                            </a>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </section>

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