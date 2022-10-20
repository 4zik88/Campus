<?php

$queried_object = get_queried_object();
$active = get_queried_object()->term_id;
$parrent = get_queried_object()->parent;
$taxonomy = $queried_object->taxonomy;
get_header(); ?>

<section class="hero">
    <div class="hero-inner">
        <div class="container">
            <div class="hero-wrapper">
                <div class="hero-content">
                    <div class="hero-content__title">
                        <h1><?= single_term_title(); ?></h1>
                    </div>

                    <div class="hero-content__social">
                        <div class="hero-content__social-title">Share</div>
                        <ul>
                            <li>
                                <a href="https://twitter.com/share?url=<?php get_the_permalink(); ?>&text=<?php single_term_title(); ?>">
                                    <img src="<?= get_template_directory_uri(); ?>/img/twiiter-icon.svg" alt="">
                                </a>
                            </li>
                            <li>
                                <a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php get_the_permalink(); ?>&title=<?php single_term_title(); ?>&summary=&source=<?php bloginfo('name'); ?>">
                                    <img src="<?= get_template_directory_uri(); ?>/img/link.svg" alt="">
                                </a>
                            </li>
                            <li>
                                <a href="https://www.facebook.com/sharer.php?u=<?php get_the_permalink(); ?>&t=<?php single_term_title(); ?>">
                                    <img src="<?= get_template_directory_uri(); ?>/img/facebook-icon.svg" alt="">
                                </a>
                            </li>
                            <li>
                                <a href="whatsapp://send?text=<?php get_the_permalink(); ?>">
                                    <img src="<?= get_template_directory_uri(); ?>/img/watsap.svg" alt="">
                                </a>
                            </li>
                        </ul>
                    </div>

                </div>
                <div class="hero-img">
                    <img src="<?= get_field('image_hero', 1010)['url']; ?>" alt="<?= get_field('image_hero', 1010)['alt']; ?>">
                </div>
            </div>
        </div>
    </div>
</section>

<section class="blog">
    <div class="container">
        <div class="blog-panel">
        <div class="blog-panel__search">
                <form role="search" method="get" id="searchform" action="<?php echo home_url('/') ?>">
                    <input type="text" value="<?php echo get_search_query() ?>" name="s" id="s" placeholder="Search" />
                    <button>
                        <img src="<?= get_template_directory_uri(); ?>/img/search-icon.svg" alt="">
                    </button>
                </form>
            </div>
            <?php
            $terms = get_terms(
                array(
                    'taxonomy'   => 'tag_article',
                    'hide_empty' => true,
                )
            );
            $i = 0;
            foreach ($terms as $term) {
                $i++;
                if ($i <= 15) {
            ?>
                    <div class="blog-panel__all-btn <?php if (!is_tax($term->term_id == $active)) { ?>active<?php } ?>">
                        <a class='tags_filter' data-id=<?php echo $term->term_id; ?> href="<?php echo get_term_link($term->term_id); ?>">#<?php echo $term->name;  ?></a>
                    </div>
            <?php
                }
            }
            ?>

            <div class="blog-panel__show-more-btn">
                <a href="#" id='load_tags'>Show more tags</a>
            </div>

        </div>
        <div class="blog-cards">

            <?php

            $args = array(
                'post_type' => 'article',
                'posts_per_page' => 6,
                'tax_query' => array(
                    array(
                        'taxonomy' => $queried_object->taxonomy,
                        'terms' => $queried_object->term_id,
                    )
                )
            );

            $random_query = new WP_Query($args);

            if ($random_query->have_posts()) {
                while ($random_query->have_posts()) {
                    $random_query->the_post(); ?>

                    <div class="blog-card">
                        <div class="blog-card__img">

                            <?= get_the_post_thumbnail(); ?>

                            <div class="blog-card__img-label">
                                <?= estimated_reading_time(); ?>
                            </div>
                        </div>
                        <div class="blog-card__content">
                            <div class="blog-card__content-title">
                                <?= get_the_title(); ?>
                            </div>
                            <div class="blog-card__content-description">
                                <?= the_truncated_post(122); ?>
                            </div>
                            <div class="blog-card__content-tags">

                                <?php $categories = get_the_terms(get_the_ID(), 'tag_article');
                                foreach ($categories as $category) {
                                ?>

                                    <a href="<?= get_category_link($category->term_id); ?>">
                                        #<?= $category->name;  ?>
                                    </a>

                                <?php } ?>

                            </div>
                            <div class="blog-card__content-btn">
                                <a href="<?= get_permalink(); ?>">continue reading →</a>
                            </div>
                        </div>
                    </div>

            <?php   }
            } else {
                echo 'No posts found';
            }
            wp_reset_postdata(); ?>

        </div>
        <div class="blog-btn-more">
            <button>Load More</button>
        </div>
    </div>
</section>

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
                            <?= get_the_post_thumbnail() ?>
                        </div>
                        <div class="suggest-slide__text">
                            <?= the_truncated_post(55); ?>
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
                                <?= the_truncated_post(60); ?>
                            </div>
                        </a>
                    </div>

            <?php }
                wp_reset_postdata();
            } ?>

        </div>
    </div>
</section>


    <section class="blog-contact">
        <div class="container">
            <div class="blog-contact__wrapper">
                <div class="blog-contact__content">
                    Sign up and stay up to date on everything that is relevant and need text here
                </div>
                <div class="blog-contact-form">
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
            </div>
        </div>
    </section>
<?php get_footer(); ?>