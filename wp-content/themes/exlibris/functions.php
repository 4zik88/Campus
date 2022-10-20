<?php

add_theme_support('menus');

if (function_exists('acf_add_options_page')) {

    $option_page = acf_add_options_page(array(
        'page_title'     => 'General settings',
        'menu_title'     => 'General settings',
        'menu_slug'     => 'theme-general-settings',
        'capability'     => 'edit_posts',
        'redirect'     => false
    ));
}
function exlibris_setup()
{
    load_theme_textdomain('exlibris', get_template_directory() . '/languages');
    add_editor_style();
    add_theme_support('automatic-feed-links');
    add_theme_support('post-formats', array('aside', 'image', 'link', 'quote', 'status'));
    register_nav_menu('primary', __('Primary Menu', 'exlibris'));
    add_theme_support('custom-background', array(
        'default-color' => 'e6e6e6',
    ));
    add_theme_support('post-thumbnails');
    set_post_thumbnail_size(624, 9999); // Unlimited height, soft crop
}
add_action('after_setup_theme', 'exlibris_setup');


// хлебные крошки
// if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs();

function dimox_breadcrumbs()
{

    /* === ОПЦИИ === */
    $text['home'] = get_the_title(5); // текст ссылки "Главная"
    $text['category'] = "%s"; // текст для страницы рубрики
    $text['search'] = 'Результаты поиска по запросу "%s"'; // текст для страницы с результатами поиска
    $text['tag'] = 'Записи с тегом "%s"'; // текст для страницы тега
    $text['author'] = 'Статьи автора %s'; // текст для страницы автора
    $text['404'] = 'Ошибка 404'; // текст для страницы 404
    $text['page'] = 'Страница %s'; // текст 'Страница N'
    $text['cpage'] = 'Страница комментариев %s'; // текст 'Страница комментариев N'

    $wrap_before = '<ul>'; // открывающий тег обертки
    $wrap_after = '</ul<!-- .breadcrumbs -->'; // закрывающий тег обертки
    $sep = '<li><i class="fa fa-angle-double-right" aria-hidden="true"></i></li>'; // разделитель между "крошками"
    $sep_before = ''; // тег перед разделителем
    $sep_after = ''; // тег после разделителя
    $show_home_link = 1; // 1 - показывать ссылку "Главная", 0 - не показывать
    $show_on_home = 0; // 1 - показывать "хлебные крошки" на главной странице, 0 - не показывать
    $show_current = 1; // 1 - показывать название текущей страницы, 0 - не показывать
    $before = '<li><a class="current">'; // тег перед текущей "крошкой"
    $after = '</a></li>'; // тег после текущей "крошки"
    /* === КОНЕЦ ОПЦИЙ === */

    global $post;
    $home_link = home_url('/');
    $link_before = '';
    $link_after = '';
    $link_attr = ' itemprop="url"';
    $link_in_before = '';
    $link_in_after = '';
    $link = $link_before . '<li><a href="%1$s"' . $link_attr . '>' . $link_in_before . '%2$s' . $link_in_after . '</a></li>' . $link_after;
    $frontpage_id = get_option('page_on_front');
    $parent_id = $post->post_parent;
    $sep = ' ' . $sep_before . $sep . $sep_after . ' ';

    if (is_home() || is_front_page()) {

        if ($show_on_home) echo $wrap_before . '<li><a href="' . $home_link . '">' . $text['home'] . '</a></li>' . $wrap_after;
    } else {

        echo $wrap_before;
        if ($show_home_link) echo sprintf($link, $home_link, $text['home']);

        if (is_category()) {
            $cat = get_category(get_query_var('cat'), false);
            if ($cat->parent != 0) {
                $cats = get_category_parents($cat->parent, TRUE, $sep);
                $cats = preg_replace("#^(.+)$sep$#", "$1", $cats);
                $cats = preg_replace('#<a([^>]+)>([^<]+)<\/a>#', $link_before . '<li><a$1' . $link_attr . '>' . $link_in_before . '$2' . $link_in_after . '</a></li>' . $link_after, $cats);
                if ($show_home_link) echo $sep;
                echo $cats;
            }
            if (get_query_var('paged')) {
                $cat = $cat->cat_ID;
                echo $sep . sprintf($link, get_category_link($cat), get_cat_name($cat)) . $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;
            } else {
                if ($show_current) echo $sep . $before . sprintf($text['category'], single_cat_title('', false)) . $after;
            }
        } elseif (is_search()) {
            if (have_posts()) {
                if ($show_home_link && $show_current) echo $sep;
                if ($show_current) echo $before . sprintf($text['search'], get_search_query()) . $after;
            } else {
                if ($show_home_link) echo $sep;
                echo $before . sprintf($text['search'], get_search_query()) . $after;
            }
        } elseif (is_day()) {
            if ($show_home_link) echo $sep;
            echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $sep;
            echo sprintf($link, get_month_link(get_the_time('Y'), get_the_time('m')), get_the_time('F'));
            if ($show_current) echo $sep . $before . get_the_time('d') . $after;
        } elseif (is_month()) {
            if ($show_home_link) echo $sep;
            echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y'));
            if ($show_current) echo $sep . $before . get_the_time('F') . $after;
        } elseif (is_year()) {
            if ($show_home_link && $show_current) echo $sep;
            if ($show_current) echo $before . get_the_time('Y') . $after;
        } elseif (is_single() && !is_attachment()) {
            if ($show_home_link) echo $sep;
            if (get_post_type() != 'post') {
                $post_type = get_post_type_object(get_post_type());
                $slug = $post_type->rewrite;
                printf($link, $home_link . '/' . $slug['slug'] . '/', $post_type->labels->singular_name);
                if ($show_current) echo $sep . $before . get_the_title() . $after;
            } else {
                $cat = get_the_category();
                $cat = $cat[0];
                $cats = get_category_parents($cat, TRUE, $sep);
                if (!$show_current || get_query_var('cpage')) $cats = preg_replace("#^(.+)$sep$#", "$1", $cats);
                $cats = preg_replace('#<a([^>]+)>([^<]+)<\/a>#', $link_before . '<li><a$1' . $link_attr . '>' . $link_in_before . '$2' . $link_in_after . '</a></li>' . $link_after, $cats);
                echo $cats;
                if (get_query_var('cpage')) {
                    echo $sep . sprintf($link, get_permalink(), get_the_title()) . $sep . $before . sprintf($text['cpage'], get_query_var('cpage')) . $after;
                } else {
                    if ($show_current) echo $before . get_the_title() . $after;
                }
            }

            // custom post type
        } elseif (!is_single() && !is_page() && get_post_type() != 'post' && !is_404()) {
            $post_type = get_post_type_object(get_post_type());
            if (get_query_var('paged')) {
                echo $sep . sprintf($link, get_post_type_archive_link($post_type->name), $post_type->label) . $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;
            } else {
                if ($show_current) echo $sep . $before . $post_type->label . $after;
            }
        } elseif (is_attachment()) {
            if ($show_home_link) echo $sep;
            $parent = get_post($parent_id);
            $cat = get_the_category($parent->ID);
            $cat = $cat[0];
            if ($cat) {
                $cats = get_category_parents($cat, TRUE, $sep);
                $cats = preg_replace('#<a([^>]+)>([^<]+)<\/a>#', $link_before . '<li><a$1' . $link_attr . '>' . $link_in_before . '$2' . $link_in_after . '</a></li>' . $link_after, $cats);
                echo $cats;
            }
            printf($link, get_permalink($parent), $parent->post_title);
            if ($show_current) echo $sep . $before . get_the_title() . $after;
        } elseif (is_page() && !$parent_id) {
            if ($show_current) echo $sep . $before . get_the_title() . $after;
        } elseif (is_page() && $parent_id) {
            if ($show_home_link) echo $sep;
            if ($parent_id != $frontpage_id) {
                $breadcrumbs = array();
                while ($parent_id) {
                    $page = get_page($parent_id);
                    if ($parent_id != $frontpage_id) {
                        $breadcrumbs[] = sprintf($link, get_permalink($page->ID), get_the_title($page->ID));
                    }
                    $parent_id = $page->post_parent;
                }
                $breadcrumbs = array_reverse($breadcrumbs);
                for ($i = 0; $i < count($breadcrumbs); $i++) {
                    echo $breadcrumbs[$i];
                    if ($i != count($breadcrumbs) - 1) echo $sep;
                }
            }
            if ($show_current) echo $sep . $before . get_the_title() . $after;
        } elseif (is_tag()) {
            if (get_query_var('paged')) {
                $tag_id = get_queried_object_id();
                $tag = get_tag($tag_id);
                echo $sep . sprintf($link, get_tag_link($tag_id), $tag->name) . $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;
            } else {
                if ($show_current) echo $sep . $before . sprintf($text['tag'], single_tag_title('', false)) . $after;
            }
        } elseif (is_author()) {
            global $author;
            $author = get_userdata($author);
            if (get_query_var('paged')) {
                if ($show_home_link) echo $sep;
                echo sprintf($link, get_author_posts_url($author->ID), $author->display_name) . $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;
            } else {
                if ($show_home_link && $show_current) echo $sep;
                if ($show_current) echo $before . sprintf($text['author'], $author->display_name) . $after;
            }
        } elseif (is_404()) {
            if ($show_home_link && $show_current) echo $sep;
            if ($show_current) echo $before . $text['404'] . $after;
        } elseif (has_post_format() && !is_singular()) {
            if ($show_home_link) echo $sep;
            echo get_post_format_string(get_post_format());
        }

        echo $wrap_after;
    }
} // end

// Пагинация
// if (function_exists('pagination')) pagination();


function pagination($pages = '', $range = 4)
{

    $prev_arrow = is_rtl() ? 'Предидущая;' : '«предыдущая';
    $next_arrow = is_rtl() ? 'Следующая;' : 'следующая»';

    global $wp_query;
    $total = $wp_query->max_num_pages;
    $big = 999999999; // need an unlikely integer
    if ($total > 1) {
        if (!$current_page = get_query_var('paged'))
            $current_page = 1;
        if (get_option('permalink_structure')) {
            $format = 'page/%#%/';
        } else {
            $format = '&paged=%#%';
        }
        echo paginate_links(array(
            'base'            => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
            'format'        => $format,
            'current'        => max(1, get_query_var('paged')),
            'total'         => $total,
            'mid_size'        => 3,
            'type'             => 'list',
            'prev_text'        => $prev_arrow,
            'next_text'        => $next_arrow,
        ));
    }
}



// Пример AJAX
// Вызов ajax
//        var data = {
//            'action': 'loadmore',
//			'time': time,
//			'sum': sum,
//			'procent' : procent,
//                        'snatie' : snatie
//		};
//		$.ajax({
//			url:'/wp-admin/admin-ajax.php', // обработчик
//			data:data, // данные
//			type:'POST', // тип запроса
//			success:function(data){
//                    if( data ) {
//                    } else {
//                    }
//
//
//                }
//		});


add_action('wp_ajax_loadmore', 'true_load_posts');
add_action('wp_ajax_nopriv_loadmore', 'true_load_posts');
function true_load_posts()
{
    if ($_POST['time']) {
        $meta_m[] = array(
            'key' => 'минимальный_срок',
            'value' => $_POST['time'],
            'compare' => '<=',
            'type'          => 'NUMERIC'
        );
    }
    query_posts(array(
        'meta_query' => $meta_m,
        'post_type' => 'vklad',
        'posts_per_page' => '-1',

    ));
    if (have_posts()) {
        while (have_posts()) : the_post(); ?>
        <?php endwhile;
    } else {
        echo "<h1>Ничего не найдено</h1>";
    }
    wp_reset_postdata();
    die();
}


// записо количества просмотров поста
function setPostViews($postID)
{
    $count_key = 'post_views_count';
    $count     = get_post_meta($postID, $count_key, true);
    if ($count == '') {
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    } else {
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
// Популярные посты
// добавить в single.php setPostViews(get_the_ID());
//вызов

//        $args = array(
//            'numberposts' => 5,
//            'meta_key'    => 'post_views_count',
//            'orderby'     => 'meta_value_num',
//            'order'       => 'DESC'
//        );
//        query_posts( $args );
//        while ( have_posts() ) : the_post();
//         endwhile;
//        wp_reset_query();


function getPostViews($postID)
{
    $count_key = 'post_views_count';
    $count     = get_post_meta($postID, $count_key, true);
    if ($count == '') {
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');

        return "0";
    }

    return $count;
}

// разрешение загрузки новых форматов в админку
function my_myme_types($mime_types)
{
    $mime_types['ai'] = 'image/ai+xml'; //Добавляем расширение svg
    $mime_types['psd'] = 'image/vnd.adobe.photoshop'; //Добавляем файлы фотошопа
    $mime_types['eps'] = 'image/vnd.adobe.photoshop'; //Добавляем файлы фотошопа
    return $mime_types;
}
add_filter('upload_mimes', 'my_myme_types', 1, 1);

// размер файла
//    $file = get_field('файл');
//    if( $file ):
//        $type=$file[mime_type];
//        $fileSize   = size_format( filesize( get_attached_file( $file['id'] ) ) );


function getSize($file)
{
    $bytes = filesize($file);
    $s = array('b', 'Kb', 'Mb', 'Gb');
    $e = floor(log($bytes) / log(1024));
    return sprintf('%.2f ' . $s[$e], ($bytes / pow(1024, floor($e))));
}
//  месяця
function russian_monat($monat)
{
    switch ($monat) {
        case 1:
            $m = 'января';
            break;
        case 2:
            $m = 'февраля';
            break;
        case 3:
            $m = 'марта';
            break;
        case 4:
            $m = 'апреля';
            break;
        case 5:
            $m = 'мая';
            break;
        case 6:
            $m = 'июня';
            break;
        case 7:
            $m = 'июля';
            break;
        case 8:
            $m = 'августа';
            break;
        case 9:
            $m = 'сентября';
            break;
        case 10:
            $m = 'октября';
            break;
        case 11:
            $m = 'ноября';
            break;
        case 12:
            $m = 'декабря';
            break;
    }
    echo $m;
}


function my_acf_init()
{
    acf_update_setting('google_api_key', 'AIzaSyBdKwoayPGd615o_y9hU79G8e5_oWCSoCY');
}
add_action('acf/init', 'my_acf_init');

function icl_post_languages()
{
    $languages = icl_get_languages('skip_missing=1');
    if (1 < count($languages)) {
        $i = 0;
        ?>
        <div class="lang-selector__current">
            <span>
                <?php
                foreach ($languages as $l) {
                    if ($l['active']) {
                        echo $l['native_name'];
                    }
                } ?>
            </span>
            <svg width="10" height="18" viewBox="0 0 10 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M0.292893 0.292893C0.683417 -0.0976311 1.31658 -0.0976311 1.70711 0.292893L9.70711 8.29289C10.0976 8.68342 10.0976 9.31658 9.70711 9.70711L1.70711 17.7071C1.31658 18.0976 0.683417 18.0976 0.292893 17.7071C-0.0976311 17.3166 -0.0976311 16.6834 0.292893 16.2929L7.58579 9L0.292893 1.70711C-0.0976311 1.31658 -0.0976311 0.683417 0.292893 0.292893Z" fill="white" />
        </div>
        <ul class="lang-list">
            <?php
            foreach ($languages as $l) {
            ?>
                <li <?php if ($l['active']) { ?>class="current" <?php } ?>><a href="<?php echo $l['url']; ?>"><?php echo $l['native_name']; ?></a></li>
            <?php
            } ?>
        </ul>
    <?php

    }
    ?>
    <?php

}

//  добавление нового разширение изорбражений
//  add_image_size( 'press_pelis', '502', '371', true);

function the_truncated_post($symbol_amount)
{
    $filtered = strip_tags(preg_replace('@<style[^>]*?>.*?</style>@si', '', preg_replace('@<script[^>]*?>.*?</script>@si', '', apply_filters('the_content', get_the_content()))));
    echo substr($filtered, 0, strrpos(substr($filtered, 0, $symbol_amount), ' ')) . '';
}

function estimated_reading_time()
{
    $post = get_post();
    $postcnt = strip_tags($post->post_content);
    $words = count(preg_split('/\s+/', $postcnt));
    $minutes = floor($words / 120);
    $seconds = floor($words % 120 / (120 / 60));
    if (1 <= $minutes) {
        $estimated_time = $minutes . ' min read';
    } else {
        $estimated_time = $seconds . ' sec read';
    }
    echo $estimated_time;
}

/*--- Load More Post ---*/
function blog_scripts()
{
    // Register the script
    wp_register_script('load-more-script', get_stylesheet_directory_uri() . '/js/load-more.js', array('jquery'), false, true);

    // Localize the script with new data
    $script_data_array = array(
        'ajaxurl' => admin_url('admin-ajax.php'),
        'security' => wp_create_nonce('load_more_posts'),
    );
    wp_localize_script('load-more-script', 'blog', $script_data_array);

    // Enqueued script with localized data.
    wp_enqueue_script('load-more-script');
}
add_action('wp_enqueue_scripts', 'blog_scripts');



add_action('wp_ajax_loadmoretags', 'loadmoretags_callback');
add_action('wp_ajax_nopriv_loadmoretags', 'loadmoretags_callback');
function loadmoretags_callback()
{

    $terms = get_terms(
        array(
            'taxonomy'   => 'tag_article',
            'hide_empty' => true,
        )
    );
    $i = 0;
    foreach ($terms as $term) {
        $i++;
        if ($i > 15) {
    ?>
            <div class="blog-panel__all-btn">
                <a class='tags_filter' data-id=<?php echo $term->term_id; ?> href="<?php echo get_term_link($term->term_id); ?>">#<?php echo $term->name;  ?></a>
            </div>
    <?php
        }
    }

    die();
}

add_action('wp_ajax_load_posts_by_ajax', 'load_posts_by_ajax_callback');
add_action('wp_ajax_nopriv_load_posts_by_ajax', 'load_posts_by_ajax_callback');
function load_posts_by_ajax_callback()
{
    $args = array(
        'post_type' => 'article',
        'post_status' => 'publish',
        'posts_per_page' => '6',
        'paged' => $_POST['page'],
        'tax_query' => $tax,
    );
    $blog_posts = new WP_Query($args)
    ?>

    <?php if ($blog_posts->have_posts()) : ?>
        <?php while ($blog_posts->have_posts()) : $blog_posts->the_post(); ?>

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

        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
    <?php endif; ?>
<?php
    wp_die();
}
/*--- Load More Post ---*/

the_post_thumbnail('medium');
the_post_thumbnail('large');
the_post_thumbnail('full');