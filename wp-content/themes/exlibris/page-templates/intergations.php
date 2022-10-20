<?php
/**
 * Template Name: Intergations
 */
get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>

    <section class="integrations-top-sect">
        <div class="container">
            <div class="integrations-top-sect__desc">
                <div class="integrations-top-sect__title red-text"><?php echo get_field('banner_title');?></div>
            </div>
        </div>
        <div class="integrations-top-sect__pic">
            <img src="<?php echo get_field('banner_image')['url']?>" alt="<?php echo get_field('banner_image')['alt']?>">
        </div>
        <div class="integrations-top-sect__pic-bg">
            <img src="<?php echo get_template_directory_uri(); ?>/img/integrations-top-sect_bg.svg" alt="">
        </div>
    </section>

    <section class="big-search-sect">
        <div class="container">
            <div class="big-search-sect__desc">
                <div class="big-search-sect__title"><?php echo get_field('posts_title');?></div>
                <?php echo get_field('posts_text');?>
            </div>
            <form action="<?php echo get_permalink();?>" method="get">
                <div class="big-search-sect__forms">
                    <div class="big-search-sect__forms-box">
                        <p>Search</p>
                        <div class="big-search-sect__forms-wrapper">
                            <input name="search" type="text" placeholder="Type Anything" class="top-input" <?php if($_GET['search']){ ?> value="<?php echo $_GET['search']; ?>" <?php }?>>
                            <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8 16C9.77498 15.9996 11.4988 15.4054 12.897 14.312L17.293 18.708L18.707 17.294L14.311 12.898C15.405 11.4997 15.9996 9.77544 16 8C16 3.589 12.411 0 8 0C3.589 0 0 3.589 0 8C0 12.411 3.589 16 8 16ZM8 2C11.309 2 14 4.691 14 8C14 11.309 11.309 14 8 14C4.691 14 2 11.309 2 8C2 4.691 4.691 2 8 2Z" fill="#4b4b4b"></path>
                            </svg>

                        </div>
                    </div>
                    <div class="big-search-sect__forms-box">
                        <p>Filter</p>
                        <div class="big-search-sect__forms-wrapper filter">
                            <select name="terms" id="category">
                                <option value="">Type Anything</option>
                                <?php
                                $args = [
                                    'taxonomy'      => [ 'category' ], // название таксономии с WP 4.5
                                    'orderby'       => 'id',
                                    'order'         => 'ASC',
                                    'hide_empty'    => true,
                                ];

                                $terms = get_terms( $args );
                                print_R($terms);
                                foreach( $terms as $term ){
                                  ?>
                                    <option <?php if($_GET['terms']==$term->term_id){ echo 'selected';} ?> value="<?php echo $term->term_id; ?>"><?php echo $term->name; ?></option>
                                  <?php
                                }
                                ?>
                            </select>
                            <svg width="10" height="18" viewBox="0 0 10 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M0.292893 0.292893C0.683417 -0.0976311 1.31658 -0.0976311 1.70711 0.292893L9.70711 8.29289C10.0976 8.68342 10.0976 9.31658 9.70711 9.70711L1.70711 17.7071C1.31658 18.0976 0.683417 18.0976 0.292893 17.7071C-0.0976311 17.3166 -0.0976311 16.6834 0.292893 16.2929L7.58579 9L0.292893 1.70711C-0.0976311 1.31658 -0.0976311 0.683417 0.292893 0.292893Z" fill="#4b4b4b"></path>
                            </svg>
                            <input type="submit" value="Filter" class="visually-hidden">
                        </div>
                    </div>
                </div>
            </form>


            <div class="big-search-sect__items-wrapper">
            <?php $id=get_the_ID(); ?>

                <?php
                $search='';
                $tax_query=array();
                if($_GET['search']){
                    $search=$_GET['search'];
                }
                if($_GET['terms']){
                    $tax_query=array(array(
                            'taxonomy' => 'category',
                            'field'    => 'id',
                            'terms'    => array( $_GET['terms'] )
                        ));
                }
                $args=array(
                    'numberposts' => -1,
                    'post_type'   => 'post',
                    's'   => $search,
                    'tax_query' =>$tax_query,
                );
                $posts = get_posts( $args );

                foreach( $posts as $post ){
                    setup_postdata($post);
                   ?>
                    <div class="big-search-sect__item">
                        <div class="big-search-sect__item-header">
                            <?php
                            $cur_terms = get_the_terms( get_the_ID(), 'category' );
                            if( is_array( $cur_terms ) ){
                                foreach( $cur_terms as $cur_term ){
                                    ?>
                                    <div class="big-search-sect__item-tag">
                                        <div class="big-search-sect__item-icon">
                                            <img src="<?php echo get_field('icon','category_'.$cur_term->term_id)['url']?>" alt="">
                                        </div>
                                        <a href="<?php echo get_permalink($id); ?>?terms=<?php echo $cur_term->term_id; ?>"># <?php echo $cur_term->name; ?></a>
                                    </div>
                                    <?php
                                }
                            }
                            ?>

                            <div class="big-search-sect__item-arrow">
                                <svg width="10" height="18" viewBox="0 0 10 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M0.292893 0.292893C0.683417 -0.0976311 1.31658 -0.0976311 1.70711 0.292893L9.70711 8.29289C10.0976 8.68342 10.0976 9.31658 9.70711 9.70711L1.70711 17.7071C1.31658 18.0976 0.683417 18.0976 0.292893 17.7071C-0.0976311 17.3166 -0.0976311 16.6834 0.292893 16.2929L7.58579 9L0.292893 1.70711C-0.0976311 1.31658 -0.0976311 0.683417 0.292893 0.292893Z" fill="#3482D0"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="big-search-sect__item-content slider-content">
                            <div class="big-search-sect__item-title">
                               <?php the_title(); ?>
                            </div>
                            <?php if(has_post_thumbnail()){ ?>
                            <div class="big-search-sect__item-logo">
                                <?php
                                $thumb_id = get_post_thumbnail_id();
                                $thumb_url = wp_get_attachment_image_src($thumb_id,'full', true);
                                $image_alt = get_post_meta( $thumb_id, '_wp_attachment_image_alt', true);
                                ?>
                                <img src="<?php echo $thumb_url[0]; ?>" alt="<?php echo $image_alt; ?>">
                            </div>
                            <?php } ?>
                            <div class="big-search-sect__item-hidden-wrapper">
                                <div class="big-search-sect__item-hidden-top-text">
                                    <?php the_content(); ?>
                                </div>
                                <div class="big-search-sect__item-hidden-bottom">
                                    <?php if(get_field('quote_authorphoto')){ ?>
                                    <div class="big-search-sect__item-hidden-bottom-left">
                                        <img src="<?php echo get_field('quote_authorphoto')['url']; ?>" alt="">
                                    </div>
                                    <?php } ?>

                                    <div class="big-search-sect__item-hidden-bottom-right">
                                        <?php if(get_field('quote')){ ?>
                                            <?php if(get_field('slider')){ ?>
                                                <div class="big-search-sect__item-hidden-bottom-right-text">
                                                    <?php echo get_field('quote');?>
                                                </div>
                                            <?php }else{ ?>
                                               <?php echo get_field('quote');?>
                                            <?php } ?>
                                        <?php } ?>

                                        <?php if(get_field('slider')){ ?>
                                        <div class="big-search-sect__item-hidden-bottom-slider swiper">
                                            <div class="big-search-sect__item-hidden-bottom-slider-wrapper swiper-wrapper">
                                                <!-- Slides -->

                                                <?php if( have_rows('slider') ): ?>
                                                    <?php
                                                    $i=0;
                                                    while( have_rows('slider') ): the_row(); ?>
                                                        <div class="big-search-sect__item-hidden-bottom-slide  swiper-slide">
                                                            <div class="big-search-sect__item-hidden-bottom-slide-pic">
                                                                <div class="wrapper" id="modal<?php echo get_the_ID();?>">
                                                                    <img src="<?php echo get_sub_field('image')['url'];?>" alt="<?php echo get_sub_field('image')['alt'];?>">
                                                                </div>
                                                            </div>
                                                            <div class="big-search-sect__item-hidden-bottom-slide-text"><?php echo get_sub_field('short_description');?></div>
                                                        </div>
                                                    <?php endwhile; ?>
                                                <?php endif; ?>
                                            </div>
                                            <div class="big-search-sect__item-hidden-bottom-slider-controls">
                                                <div class="big-search-sect__item-hidden-bottom-slider-prev">                    <svg width="10" height="18" viewBox="0 0 10 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M0.292893 0.292893C0.683417 -0.0976311 1.31658 -0.0976311 1.70711 0.292893L9.70711 8.29289C10.0976 8.68342 10.0976 9.31658 9.70711 9.70711L1.70711 17.7071C1.31658 18.0976 0.683417 18.0976 0.292893 17.7071C-0.0976311 17.3166 -0.0976311 16.6834 0.292893 16.2929L7.58579 9L0.292893 1.70711C-0.0976311 1.31658 -0.0976311 0.683417 0.292893 0.292893Z" fill="#3482D0"></path>
                                                    </svg></div>
                                                <div class="big-search-sect__item-hidden-bottom-slider-pagination swiper-pagination"></div>
                                                <div class="big-search-sect__item-hidden-bottom-slider-next">                    <svg width="10" height="18" viewBox="0 0 10 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M0.292893 0.292893C0.683417 -0.0976311 1.31658 -0.0976311 1.70711 0.292893L9.70711 8.29289C10.0976 8.68342 10.0976 9.31658 9.70711 9.70711L1.70711 17.7071C1.31658 18.0976 0.683417 18.0976 0.292893 17.7071C-0.0976311 17.3166 -0.0976311 16.6834 0.292893 16.2929L7.58579 9L0.292893 1.70711C-0.0976311 1.31658 -0.0976311 0.683417 0.292893 0.292893Z" fill="#3482D0"></path>
                                                    </svg></div>
                                            </div>
                                        </div>
                               <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                   <?php
                }
                wp_reset_postdata(); // сброс
                ?>
            </div>
        </div>
        </div>
    </section>
    <?php
    // параметры по умолчанию
    $posts = get_posts( array(
        'numberposts' => -1,
        'post_type'   => 'post',
    ) );

    foreach( $posts as $post ){
        setup_postdata($post);
        ?>
        <?php if(get_field('slider')){ ?>
            <div class="modal modal<?php echo get_the_ID();?>">
                <div class="modal-wrapper">
                    <div class="container">
                        <div class="modal-box">
                            <div class="modal-content">
                                <div class="modal-slider swiper">
                                    <div class="modal-slider-wrapper swiper-wrapper">
                                        <?php if( have_rows('slider') ): ?>
                                            <?php
                                            $i=0;
                                            while( have_rows('slider') ): the_row(); ?>
                                                <div class="modal-slider-slide  swiper-slide">
                                                    <div class="modal-slider-pic">
                                                        <div class="wrapper">
                                                            <img src="<?php echo get_sub_field('image')['url'];?>" alt="<?php echo get_sub_field('image')['alt'];?>">
                                                        </div>
                                                    </div>
                                                    <div class="modal-slider-slide-text"><?php echo get_sub_field('text');?></div>
                                                </div>
                                            <?php endwhile; ?>
                                        <?php endif; ?>
                                    </div>
                                    <div class="modal-slider-slider-controls">
                                        <div class="modal-slider-slider-prev">
                                            <svg width="10" height="18" viewBox="0 0 10 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M0.292893 0.292893C0.683417 -0.0976311 1.31658 -0.0976311 1.70711 0.292893L9.70711 8.29289C10.0976 8.68342 10.0976 9.31658 9.70711 9.70711L1.70711 17.7071C1.31658 18.0976 0.683417 18.0976 0.292893 17.7071C-0.0976311 17.3166 -0.0976311 16.6834 0.292893 16.2929L7.58579 9L0.292893 1.70711C-0.0976311 1.31658 -0.0976311 0.683417 0.292893 0.292893Z" fill="#3482D0"></path>
                                            </svg>
                                        </div>
                                        <div class="modal-slider-slider-pagination swiper-pagination"></div>
                                        <div class="modal-slider-slider-next">
                                            <svg width="10" height="18" viewBox="0 0 10 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M0.292893 0.292893C0.683417 -0.0976311 1.31658 -0.0976311 1.70711 0.292893L9.70711 8.29289C10.0976 8.68342 10.0976 9.31658 9.70711 9.70711L1.70711 17.7071C1.31658 18.0976 0.683417 18.0976 0.292893 17.7071C-0.0976311 17.3166 -0.0976311 16.6834 0.292893 16.2929L7.58579 9L0.292893 1.70711C-0.0976311 1.31658 -0.0976311 0.683417 0.292893 0.292893Z" fill="#3482D0"></path>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="close">
                                <img src="<?php echo get_template_directory_uri(); ?>/img/close.svg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        }
    }
    wp_reset_postdata(); // сброс
    ?>
<!--    --><?php //if( have_rows('faq') ): ?>
        <section class="faq-section scrollme">
            <div class="container">
                <div class="faq-section__left">
                    <div class="faq-section__title red-text"><?php echo get_field('faq_title');?></div>
                    <div class="faq-section__pic">
                        <img src="<?php echo get_field('faq_image')['url']; ?>" alt="<?php echo get_field('faq_image')['alt']; ?>">
                    </div>
                </div>
                <div class="faq-section__right  animateme" data-when="view" data-easing="linear" data-from="0" data-to="1" data-translatey="70">

                    <?php
                    $i=0;
                    while( have_rows('faq') ): the_row(); ?>
                        <div class="faq-section__question">
                            <div class="faq-section__row">
                                <b><?php echo get_sub_field('question');?></b>
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


                </div>

            </div>
        </section>
<!--    --><?php //endif; ?>
<?php endwhile; // end of the loop. ?>
<?php get_footer(); ?>