<?php
get_header(); ?>

    <section class="page-404">
        <div class="page-404__inner">
            <div class="container">
                <div class="page-404__content">
                    <div class="page-404__content-header">
                        <h2 class="page-404__title"><?php echo get_field('404_title','option');?></h2>
                    </div>
                    <div class="page-404__content-footer">
                        <p class="page-404__descr"><?php echo get_field('404_text','option');?></p>
                        <a class="page-404__btn" href="<?php echo get_home_url(); ?>"><?php echo get_field('404_button_text','option');?></a>
                    </div>
                </div>
            </div>
            <picture class="page-404__bg">
                <source srcset="<?php echo get_field('404_image_mobile','option')['url']?>" media="(max-width:420px)">
                <img src="<?php echo get_field('404_image','option')['url']?>" alt="<?php echo get_field('404_image','option')['alt']?>">
            </picture>
        </div>
    </section>

<?php get_footer(); ?>