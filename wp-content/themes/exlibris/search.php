<?php
/*
Template Name: Search Page
*/

get_header(); ?>


<section class="hero">
    <div class="hero-inner">
        <div class="container">
            <div class="hero-wrapper">
                <div class="hero-content">
                    <div class="hero-content__title">
                        <h1>Search Results Found For: <?php echo $_GET['s']; ?></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="blog">
    <div class="container">
        <div class="blog-cards">

            <?php
            $args = array(
                'post_type' => 'article',
                's' => $s,
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

            <?php
                }
            } else {

                _e('No search result!', 'exlibris');
            }
            ?>



        </div>

    </div>
</section>
<?php get_footer(); ?>