<?php if (have_rows('footer_pages')) : ?>
    <footer class="footer scrollme">
        <div class="container">

            <?php
            $i = 0;
            while (have_rows('footer_pages')) : the_row(); ?>
                <a href="<?php echo get_sub_field('link'); ?>" class="footer__item animateme" data-when="view" data-easing="linear" data-from="0.6" data-to="0.2" data-rotatey="90">
                    <div class="footer__pic">
                        <img src="<?php echo get_sub_field('image')['url']; ?>" alt="<?php echo get_sub_field('image')['alt']; ?>">
                    </div>
                    <span><?php echo get_sub_field('title'); ?></span>
                </a>
            <?php endwhile; ?>

        </div>
    </footer>
<?php endif; ?>
<footer class="footer-main">
    <div class="footer-main__container">
        <div class="footer-main__wrapper">
            <div class="footer-main__logo">
                <a href="<?php echo get_home_url(); ?>">
                    <img src="<?php echo get_field('logo_footer', 'option')['url']; ?>" alt="<?php echo get_field('logo_footer', 'option')['alt']; ?>">
                </a>
            </div>
            <div class="footer-main__inner">
                <?php
                $args = array(
                    'theme_location'  => '',
                    'menu'            => '<a href="#">ProQuest Website</a>',
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
            </div>
        </div>
        <div class="footer-main__social">
            <h4>Follow Us</h4>
            <ul>
                <?php if (have_rows('social', 'option')) : ?>
                    <?php
                    $i = 0;
                    while (have_rows('social', 'option')) : the_row(); ?>
                        <li>
                            <a href="<?php echo get_sub_field('link'); ?>" target="_blank">
                                <img src="<?php echo get_sub_field('image')['url']; ?>" alt="<?php echo get_sub_field('image')['alt']; ?>">
                            </a>
                        </li>
                    <?php endwhile; ?>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</footer>

<div class="my-modal video-modal" id="video-modal" tabindex="-1">
    <div class="my-modal-dialog">
        <div class="my-modal-content">
            <button class="my-modal-close" aria-label="Close modal">
                <svg class="btn-icon">
                    <use xlink:href="img/icons-sprite.svg#modal-close"></use>
                </svg>
            </button>
            <div class="my-modal-video">
                <div id="modal-video-iframe"></div>
            </div>
        </div>
    </div>
</div>



<script src="<?php echo get_template_directory_uri(); ?>/js/swiper.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/scrollme.js"></script>
<script src="//www.youtube.com/iframe_api"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/scripts.js"></script>
<!-- Blog -->
<script src="<?php echo get_template_directory_uri(); ?>/js/slick.min.js"></script>
<!-- Blog -->
<script src="<?php echo get_template_directory_uri(); ?>/js/main.js"></script>
<?php wp_footer(); ?>
</body>

</html>