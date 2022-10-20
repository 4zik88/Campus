<?php
get_header(); ?>
<?php while (have_posts()) : the_post(); ?>

    <section class="first-screen">
        <div class="first-screen__inner">
            <div class="container">
                <div class="first-screen__wrapper">
                    <div class="first-screen__content">
                        <div class="first-screen__content-title">
                            <h1><?= get_the_title(); ?></h1>
                        </div>
                        <div class="first-screen__content-info">
                            <?= get_field('author'); ?> <?= get_the_date('F j, Y'); ?>
                        </div>
                    </div>
                    <div class="first-screen__img">
                        <?= get_the_post_thumbnail(); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="article">
        <div class="container">
            <div class="article-wrapper">
                <div class="article-main">
                    <div class="article-main__header">
                        <div class="article-main__header-btn">
                            <a href="<?= get_permalink(1010); ?>">← back to blogs</a>
                        </div>

                        <div class="article-main__header-social">
                            <strong>Share</strong>
                            <ul>
                                <li>
                                    <a href="https://twitter.com/share?url=<?php the_permalink(); ?>&text=<?php the_title(); ?>">
                                        <img src="<?= get_template_directory_uri(); ?>/img/twiiter-icon.svg" alt="">
                                    </a>
                                </li>
                                <li>
                                    <a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink() ?>&title=<?php the_title(); ?>&summary=&source=<?php bloginfo('name'); ?>">
                                        <img src="<?= get_template_directory_uri(); ?>/img/link.svg" alt="">
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>&t=<?php the_title(); ?>">
                                        <img src="<?= get_template_directory_uri(); ?>/img/facebook-icon.svg" alt="">
                                    </a>
                                </li>
                                <li>
                                    <a href="whatsapp://send?text=<?php the_permalink(); ?>">
                                        <img src="<?= get_template_directory_uri(); ?>/img/watsap.svg" alt="">
                                    </a>
                                </li>
                            </ul>
                        </div>

                    </div>
                    <div class="article-main__content">
                        <?= the_content(); ?>
                    </div>

                    <div class="article-main__footer">
                        <div class="article-main__footer-img">
                            <img src="<?= get_field('image')['url']; ?>" alt="<?= get_field('image')['alt']; ?>">
                        </div>
                        <div class="article-main__footer-wrapper">
                            <div class="article-main__footer-title">
                                <?php if (get_field('name')) { ?>
                                    <div class="article-main__footer-title-name">
                                        <?= get_field('name'); ?>
                                    </div>
                                <?php } ?>
                                <?php if (get_field('status')) { ?>
                                    <div class="article-main__footer-title-status">
                                        <?= get_field('status'); ?>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="article-main__footer-text">
                                <?= get_field('quotes'); ?>
                            </div>
                            <div class="article-main__footer-social">
                                <ul>

                                    <?php if (have_rows('social')) :
                                        while (have_rows('social')) : the_row();  ?>

                                            <li>
                                                <a href="<?= get_sub_field('link'); ?>">
                                                    <img src="<?= get_sub_field('icon')['url']; ?>" alt="<?= get_sub_field('icon')['alt']; ?>">
                                                </a>
                                            </li>

                                        <?php endwhile; ?>
                                    <?php endif; ?>

                                </ul>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="article-side">

                    <div class="article-side__form">
                        <div class="article-side__form-title">
							<?php echo get_field('title_sub_form', 'option'); ?>
                        </div>
                        <script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2-legacy.js"></script>
                        <![endif]-->
                        <script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2.js"></script>
                        <script>
                            hbspt.forms.create({
                                region: "na1",
                                portalId: "5176202",
                                formId: "a2bc6fea-b971-4431-acb9-86cbe18670a6"
                            });
                        </script>
                    </div>

                    <div class="article-side__search">
                        <div class="article-side__search-title">
                            <?= get_field('title_search', 'option'); ?>
                        </div>
                        <div class="article-side__search-form">
                            <form role="search" method="get" id="searchform" action="<?php echo home_url('/') ?>">
                                <input type="text" value="<?php echo get_search_query() ?>" name="s" id="s" placeholder="Search" />
                                <button>
                                    <img src="<?= get_template_directory_uri(); ?>/img/search-icon.svg" alt="">
                                </button>
                            </form>
                        </div>
                        <div class="article-side__search-tags">
                            <ul>

                                <?php $categories = get_the_terms(get_the_ID(), 'tag_article');
                                foreach ($categories as $category) {
                                ?>

                                    <li>
                                        <a href="<?= get_category_link($category->term_id); ?>">
                                            #<?= $category->name;  ?>
                                        </a>
                                    </li>

                                <?php } ?>

                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="search-content">
        <div class="container">
            <div class="search-content__title">
                Explore more content
            </div>
            <div class="search-content__form">
                <form role="search" method="get" id="searchform" action="<?php echo home_url('/') ?>">

                    <button>
                        <img src="<?= get_template_directory_uri(); ?>/img/search-icon.svg" alt="">
                    </button>
                    <input type="text" value="<?php echo get_search_query() ?>" name="s" id="s" placeholder="Search" />
                </form>
            </div>
            <div class="search-content__tags">
                <ul>

                    <?php $categories = get_the_terms(get_the_ID(), 'tag_article');
                    foreach ($categories as $category) {
                        ?>

                        <li>
                            <a href="<?= get_category_link($category->term_id); ?>">
                                #<?= $category->name;  ?>
                            </a>
                        </li>

                    <?php } ?>

                </ul>
            </div>
        </div>
    </section>
	<?php $id=get_the_ID(); if( have_rows('faq',$id) ){ ?>
    <section class="faq-section scrollme">
        <div class="container">
            <div class="faq-section__left">
                <h2 class="faq-section__title red-text"><?php echo get_field('faq_title',$id);?></h2>
                <div class="faq-section__pic">
                    <img src="<?php echo get_field('faq_image',$id)['url']; ?>" alt="<?php echo get_field('faq_image',$id)['alt']; ?>">
                </div>
            </div>
            <div class="faq-section__right  animateme" data-when="view" data-easing="linear" data-from="0" data-to="1" data-translatey="70">
                <?php if( have_rows('faq',$id) ): ?>
                    <?php
                    $i=0;
                    while( have_rows('faq',$id) ): the_row(); ?>
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

                <?php if( have_rows('faq',$id) ): ?>
                    <?php
                    $i=0; ?>

                    <script type="application/ld+json">
                      {
                        "@context": "https://schema.org",
                        "@type": "FAQPage",
                        "mainEntity": [
                        <?php while( have_rows('faq',$id) ): the_row(); ?>
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
	<?php } ?>
    <section class="suggest">
        <div class="container">
            <div class="suggest-title">
                <h2><?= get_field('title_suggested', 'option'); ?></h2>
            </div>
            <div class="suggest-slider">

                <?php
                $slider_suggested = get_field('slider_suggested', 'option');
                if ($slider_suggested) { ?>
                    <?php foreach ($slider_suggested as $post) :
                        setup_postdata($post); ?>

                        <div class="suggest-slide">
							
							<a href="<?= get_permalink(); ?>">
							
                            <div class="suggest-slide__img">
                                <img src="<?= get_field('image_suggested')['url']; ?>" alt="<?= get_field('image_suggested')['alt']; ?>">
                            </div>
                            <div class="suggest-slide__text">
								    <?php
										$my_excerpt = get_field('except_suggested', $post->ID);
										if ( $my_excerpt ){
											echo $my_excerpt;
										}
										else {
											echo the_truncated_post(55);
										}
									?>
                            </div>
								
							</a>
								
                        </div>

                    <?php endforeach; ?>
                    <?php
                    wp_reset_postdata(); ?>
                    <?php } else {

                    $posts = get_posts(array(
                        'post_type' => 'article',
                        'posts_per_page' => 4,
                    ));

                    foreach ($posts as $post) {
                        setup_postdata($post); ?>

                        <div class="suggest-slide">
                            <a href="<?= get_permalink(); ?>">
                                <div class="suggest-slide__img">
                                    <img src="<?= get_field('image_suggested')['url']; ?>" alt="<?= get_field('image_suggested')['alt']; ?>">
                                </div>
                                <div class="suggest-slide__text">
									<?php
										$my_excerpt = get_field('except_suggested', $post->ID);
										if ( $my_excerpt ){
											echo $my_excerpt;
										}
										else {
											echo the_truncated_post(55);
										}
									?>
                                </div>
                            </a>
                        </div>

                <?php }
                    wp_reset_postdata();
                } ?>

            </div>
        </div>
    </section>

    <svg class="svgMask" fill="none" xmlns="http://www.w3.org/2000/svg">
        <clipPath id='main-img'>
            <path d="M25.747-221.127C-214.04-380.225 1300-74.409 1300-74.409v667.411S-192.215 895.625 50.336 623.457c242.551-272.168 215.197-685.486-24.59-844.584Z" fill="#878787" />
        </clipPath>
    </svg>
    <section class="blog-contact">
        <div class="container">
            <div class="blog-contact__wrapper">
                <div class="blog-contact__content">
                    Sign up and stay up to date on everything that is relevant and need text here
                </div>
                <div class="blog-contact-form">
                    <!-- [if lte IE 8]>
                    <script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2-legacy.js"></script>
                    <![endif]-->
                    <script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2.js"></script>
                    <script>
                        hbspt.forms.create({
                            region: "na1",
                            portalId: "5176202",
                            formId: "a2bc6fea-b971-4431-acb9-86cbe18670a6",
                            sfdcCampaignId: "7010e000001GeHEAA0"
                        });
                    </script>
                </div>
            </div>
        </div>
    </section>
<?php endwhile; // end of the loop. 
?>
<?php get_footer(); ?>