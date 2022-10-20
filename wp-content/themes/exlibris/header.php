<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="google-site-verification" content="6Jq4vSpnrnahfTt299rynYtQJs1Z9H94BTln6-3ZPWg" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,500;1,600&display=swap" rel="stylesheet">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/swiper.min.css" />
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/slick.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/main.css">
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/style.css">
    <?php wp_head(); ?>
    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push(

                {
                    'gtm.start': new Date().getTime(),
                    event: 'gtm.js'
                }

            );
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-K5WD9L2');
    </script>
    <!-- End Google Tag Manager -->
</head>

<body <?php body_class(); ?>>
    <header>
        <div class="header__wrapper">
            <?php if (!get_field('hide_menu', 'option')) { ?>
                <div class="header__top">
                    <div class="container">
                        <!--                <div class="lang-selector">-->
                        <!--                    <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">-->
                        <!--                        <path d="M14 0C11.2311 0 8.52431 0.821086 6.22202 2.35943C3.91973 3.89777 2.12532 6.08427 1.06569 8.64243C0.00606596 11.2006 -0.271181 14.0155 0.269012 16.7313C0.809205 19.447 2.14258 21.9416 4.10051 23.8995C6.05845 25.8574 8.55301 27.1908 11.2687 27.731C13.9845 28.2712 16.7994 27.9939 19.3576 26.9343C21.9157 25.8747 24.1022 24.0803 25.6406 21.778C27.1789 19.4757 28 16.7689 28 14C27.9958 10.2883 26.5194 6.72977 23.8948 4.10518C21.2702 1.48059 17.7117 0.00423472 14 0V0ZM2.00001 14C2.0016 12.0982 2.45591 10.2241 3.32535 8.53269C4.1948 6.84127 5.4544 5.38112 7.00001 4.273V7C7.00001 7.26522 7.10536 7.51957 7.2929 7.70711C7.48044 7.89464 7.73479 8 8.00001 8H11.382C11.5677 7.9999 11.7496 7.94812 11.9075 7.85045C12.0654 7.75278 12.193 7.61308 12.276 7.447L13 6H17V12H11.236C11.0809 11.9999 10.9278 12.0358 10.789 12.105L7.55301 13.724C7.38693 13.807 7.24723 13.9346 7.14956 14.0925C7.05189 14.2504 7.00011 14.4323 7.00001 14.618V18.323C6.99993 18.523 7.05983 18.7184 7.17195 18.884C7.28408 19.0496 7.44329 19.1778 7.62901 19.252L12 21L12.824 25.94C9.86102 25.6448 7.11318 24.26 5.11329 22.0539C3.11339 19.8478 2.00393 16.9777 2.00001 14V14ZM20 24.376V21L21.755 18.368C21.8322 18.2521 21.8843 18.1213 21.9081 17.9841C21.9319 17.8468 21.9267 17.7061 21.893 17.571L21 14V11H25.605C26.2752 13.5356 26.089 16.2215 25.0754 18.6404C24.0618 21.0593 22.2776 23.0756 20 24.376V24.376Z" fill="white"/>-->
                        <!--                    </svg>-->
                        <!--                    --><?php //// echo icl_post_languages(); 
                                                    ?>
                        <!--English-->
                        <!--                </div>-->
                        <div class="header-nav">
                            <?php
                            $args = array(
                                'theme_location'  => '',
                                'menu'            => 'Menu header',
                                'container'       => '',
                                'container_class' => '',
                                'container_id'    => '',
                                'menu_class'      => 'menu',
                                'menu_id'         => '',
                                'echo'            => true,
                                'fallback_cb'     => 'wp_page_menu',
                                'before'          => '',
                                'after'           => '',
                                'link_before'     => '',
                                'link_after'      => '',
                                'items_wrap'      => '<ul  class="">%3$s</ul>',
                                'depth'           => 0
                            );

                            wp_nav_menu($args);
                            ?>

                            <!--                    <a href="#" class="header__search-btn">-->
                            <!--                        <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">-->
                            <!--                            <path d="M8 16C9.77498 15.9996 11.4988 15.4054 12.897 14.312L17.293 18.708L18.707 17.294L14.311 12.898C15.405 11.4997 15.9996 9.77544 16 8C16 3.589 12.411 0 8 0C3.589 0 0 3.589 0 8C0 12.411 3.589 16 8 16ZM8 2C11.309 2 14 4.691 14 8C14 11.309 11.309 14 8 14C4.691 14 2 11.309 2 8C2 4.691 4.691 2 8 2Z" fill="white"/>-->
                            <!--                        </svg>-->
                            <!--                        <span>--><?php //_e( 'Search', 'exlibris' );
                                                                    ?>
                            <!--</span>-->
                            <!--                    </a>-->
                            <!--                    <form action="--><?php //echo get_home_url(); 
                                                                        ?>
                            <!--" class="search-form">-->
                            <!--                        <div class="search-form__wrapper">-->
                            <!--                            <div class="search-form__input">-->
                            <!--                                <input type="text" name="s">-->
                            <!--                            </div>-->
                            <!--                            <button class="search-form__btn blue-btn">--><?php //_e( 'Search', 'exlibris' );
                                                                                                            ?>
                            <!--</button>-->
                            <!--                        </div>-->
                            <!--                    </form>-->
                            <!--                    <span class="undersearch"></span>-->
                            <a href="<?php echo get_field('top_header_contact_btn_link', 'option'); ?>" class="header__contact-btn">
                                <span><?php echo get_field('top_header_contact_btn', 'option'); ?></span>
                                <svg width="10" height="18" viewBox="0 0 10 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M0.292893 0.292893C0.683417 -0.0976311 1.31658 -0.0976311 1.70711 0.292893L9.70711 8.29289C10.0976 8.68342 10.0976 9.31658 9.70711 9.70711L1.70711 17.7071C1.31658 18.0976 0.683417 18.0976 0.292893 17.7071C-0.0976311 17.3166 -0.0976311 16.6834 0.292893 16.2929L7.58579 9L0.292893 1.70711C-0.0976311 1.31658 -0.0976311 0.683417 0.292893 0.292893Z" fill="white" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            <?php } ?>

            <?php if (!get_field('hide_menu', 'option')) { ?>
                <div class="header__bottom">
                    <div class="header__bottom_wrapper">
                        <a href="<?php echo get_home_url(); ?>" class="header__bottom_logo">
                            <img src="<?php echo get_field('logo', 'option')['url']; ?>" alt="<?php echo get_field('logo', 'option')['alt']; ?>">
                        </a>
                        <div class="header__bottom_right">
                            <?php
                            $args = array(
                                'theme_location'  => '',
                                'menu'            => 'Menu header 2',
                                'container'       => '',
                                'container_class' => '',
                                'container_id'    => '',
                                'menu_class'      => 'menu',
                                'menu_id'         => '',
                                'echo'            => true,
                                'fallback_cb'     => 'wp_page_menu',
                                'before'          => '',
                                'after'           => '',
                                'link_before'     => '',
                                'link_after'      => '',
                                'items_wrap'      => '<ul  class="">%3$s</ul>',
                                'depth'           => 0
                            );

                            wp_nav_menu($args);
                            ?>
                            <a href="<?php echo get_field('link_button', 'option'); ?>" class="trial-btn"><?php echo get_field('text_button', 'option'); ?></a>
                        </div>
                    </div>
                </div>
        </div>
    <?php } ?>

    <?php if (!get_field('hide_menu', 'option')) { ?>
        <div class="header__wrapper mobile">
            <div class="header__bottom_wrapper">
                <a href="<?php echo get_home_url(); ?>" class="header__bottom_logo">
                    <img src="<?php echo get_field('logo', 'option')['url']; ?>" alt="<?php echo get_field('logo', 'option')['alt']; ?>">
                </a>
                <div class="header__bottom_right">
                    <a href="#" class="header__menu-btn">
                        <div class="hamburger-menu">
                            <div class="hamburger-box">
                                <div class="hamburger-inner"></div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    <?php } ?>

    </header>