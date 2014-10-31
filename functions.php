<?php
/**
 * iShouvik WP Theme Functions
 *
 * @author Shouvik Mukherjee <rachel@ishouvik.me>
 * @package WordPress
 * @subpackage iShouvik WP
 */

/**
 * Maximum allowed width of content within the theme.
 */
if (!isset($content_width)) {
    $content_width = 770;
}

/**
 * Setup Theme Functions
 *
 */

/**
 * Add Support for Custom Theme Options
 *
*/

require get_template_directory() . '/includes/custom-options.php';

if (!function_exists('ishouvikwp_theme_setup')):
    function ishouvikwp_theme_setup() {

        load_theme_textdomain('ishouvikwp', get_template_directory() . '/lang');

        add_theme_support('automatic-feed-links');
        add_theme_support('post-thumbnails');
        add_theme_support('post-formats', array( 'aside', 'image', 'gallery', 'link', 'quote', 'status', 'video', 'audio', 'chat' ));
        add_theme_support( 'html5', array( 'search-form' ) );

        // This theme uses wp_nav_menu() in one location.
            register_nav_menu( 'primary', __( 'Navigation Menu', 'ishouvikwp' ) );

        // load custom walker menu class file
        require 'includes/class-ishouvikwp_walker_nav_menu.php';
    }
endif;
add_action('after_setup_theme', 'ishouvikwp_theme_setup');

/**
 * Define post thumbnail size.
 * Add two additional image sizes.
 *
 */
function ishouvikwp_images() {

    set_post_thumbnail_size(260, 180); // 260px wide x 180px high
    add_image_size('bootstrap-small', 300, 200); // 300px wide x 200px high
    add_image_size('bootstrap-medium', 360, 270); // 360px wide by 270px high
    add_image_size('ishouvik-single', 7e25, 270); // 725px wide by 270px high
}

/**
 * Load CSS styles for theme.
 *
 */
function ishouvikwp_styles_loader() {

    wp_enqueue_style('ishouvikwp-style', '//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css', false, '1.0', 'all');
    wp_enqueue_style('ishouvikwp-fontawesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css', false, '1.0', 'all');
    wp_enqueue_style('ishouvikwp-default', get_stylesheet_uri());

}
add_action('wp_enqueue_scripts', 'ishouvikwp_styles_loader');

/**
 * Load JavaScript and jQuery files for theme.
 *
 */
function ishouvikwp_scripts_loader() {

    if (is_singular() && comments_open() && get_option('thread_comments')) {

        wp_enqueue_script('comment-reply');

    }

    wp_enqueue_script('jquery', '//code.jquery.com/jquery-2.1.1.min.js');
    wp_enqueue_script('bootstrap-js', '//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js', array('jquery'), '1.0', true);

}
add_action('wp_enqueue_scripts', 'ishouvikwp_scripts_loader');

/**
 * Define theme's widget areas.
 *
 */
function ishouvikwp_widgets_init() {

    register_sidebar(
        array(
            'name'          => __('Pages Sidebar', 'ishouvikwp'),
            'id'            => 'sidebar-pages',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => "</div>",
            'before_title'  => '<h4 class="widget-title">',
            'after_title'   => '</h4>',
        )
    );

    register_sidebar(
        array(
            'name'          => __('Posts Sidebar', 'ishouvikwp'),
            'id'            => 'sidebar-posts',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => "</div>",
            'before_title'  => '<h4 class="widget-title">',
            'after_title'   => '</h4>',
        )
    );

    /* Footer Widgets */
    register_sidebar( array(
        'name'          => __( 'Footer Col 1', 'ishouvikwp' ),
        'id'            => 'footer-col-1',
        'description'   => __( 'Appears in the first column on footer.', 'ishouvikwp' ),
        'before_widget' => '<div id="%1$s" class="col-md-4">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer Col 2', 'ishouvikwp' ),
        'id'            => 'footer-col-2',
        'description'   => __( 'Appeasrs in the second column on footer.', 'ishouvikwp' ),
        'before_widget' => '<div id="%1$s" class="col-md-4">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer Col 3', 'ishouvikwp' ),
        'id'            => 'footer-col-3',
        'description'   => __( 'Appeasrs in the third column on footer.', 'ishouvikwp' ),
        'before_widget' => '<div id="%1$s" class="col-md-4">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

}
add_action('init', 'ishouvikwp_widgets_init');


/**
 * Display page next/previous navigation links.
 *
 */
if (!function_exists('ishouvikwp_content_nav')):
    function ishouvikwp_content_nav($nav_id) {

        global $wp_query, $post;

        if ($wp_query->max_num_pages > 1) : ?>

        <nav id="<?php echo $nav_id; ?>" class="navigation" role="navigation">
            <h3 class="assistive-text"><?php _e('Post navigation', 'ishouvikwp'); ?></h3>
            <div class="nav-previous alignleft"><?php next_posts_link(
                __('<span class="meta-nav">&larr;</span> Older posts', 'ishouvikwp')
            ); ?></div>
            <div class="nav-next alignright"><?php previous_posts_link(
                __('Newer posts <span class="meta-nav">&rarr;</span>', 'ishouvikwp')
            ); ?></div>
        </nav><!-- #<?php echo $nav_id; ?> .navigation -->

        <?php endif;
    }
endif;

/**
 * Display template for comments and pingbacks.
 *
 */
if (!function_exists('ishouvikwp_comment')) :
    function ishouvikwp_comment($comment, $args, $depth)
    {
        $GLOBALS['comment'] = $comment;
        switch ($comment->comment_type) :
            case 'pingback' :
            case 'trackback' : ?>

                <li class="comment media" id="comment-<?php comment_ID(); ?>">
                    <div class="media-body">
                        <p>
                            <?php _e('Pingback:', 'ishouvikwp'); ?> <?php comment_author_link(); ?>
                        </p>
                    </div><!--/.media-body -->
                <?php
                break;
            default :
                // Proceed with normal comments.
                global $post; ?>

                <li class="comment media" id="li-comment-<?php comment_ID(); ?>">
                        <a href="<?php echo $comment->comment_author_url;?>" class="pull-left">
                            <?php echo get_avatar($comment, 64); ?>
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading comment-author vcard">
                                <?php
                                printf('<cite class="fn">%1$s %2$s</cite>',
                                    get_comment_author_link(),
                                    // If current post author is also comment author, make it known visually.
                                    ($comment->user_id === $post->post_author) ? '<span class="label"> ' . __(
                                        'Post author',
                                        'ishouvikwp'
                                    ) . '</span> ' : ''); ?>
                            </h4>

                            <?php if ('0' == $comment->comment_approved) : ?>
                                <p class="comment-awaiting-moderation"><?php _e(
                                    'Your comment is awaiting moderation.',
                                    'ishouvikwp'
                                ); ?></p>
                            <?php endif; ?>

                            <?php comment_text(); ?>
                            <p class="meta">
                                <?php printf('<a href="%1$s"><time datetime="%2$s">%3$s</time></a>',
                                            esc_url(get_comment_link($comment->comment_ID)),
                                            get_comment_time('c'),
                                            sprintf(
                                                __('%1$s at %2$s', 'ishouvikwp'),
                                                get_comment_date(),
                                                get_comment_time()
                                            )
                                        ); ?>
                            </p>
                            <p class="reply">
                                <?php comment_reply_link( array_merge($args, array(
                                            'reply_text' => __('Reply <span>&darr;</span>', 'ishouvikwp'),
                                            'depth'      => $depth,
                                            'max_depth'  => $args['max_depth']
                                        )
                                    )); ?>
                            </p>
                        </div>
                        <!--/.media-body -->
                <?php
                break;
        endswitch;
    }
endif;


/**
 * Display template for post meta information.
 *
 */
if (!function_exists('ishouvikwp_posted_on')) :
    function ishouvikwp_posted_on()
    {
        printf(__('Posted on <a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s" pubdate>%4$s</time></a><span class="byline"> <span class="sep"> by </span> <span class="author vcard"><a class="url fn n" href="%5$s" title="%6$s" rel="author">%7$s</a></span></span>','ishouvikwp'),
            esc_url(get_permalink()),
            esc_attr(get_the_time()),
            esc_attr(get_the_date('c')),
            esc_html(get_the_date()),
            esc_url(get_author_posts_url(get_the_author_meta('ID'))),
            esc_attr(sprintf(__('View all posts by %s', 'ishouvikwp'), get_the_author())),
            esc_html(get_the_author())
        );
    }
endif;


/**
 * Adds custom classes to the array of body classes.
 *
 */
function ishouvikwp_body_classes($classes)
{
    if (!is_multi_author()) {
        $classes[] = 'single-author';
    }
    return $classes;
}
add_filter('body_class', 'ishouvikwp_body_classes');


/**
 * Checks if a post thumbnails is already defined.
 *
 */
function ishouvikwp_is_post_thumbnail_set()
{
    global $post;
    if (get_the_post_thumbnail()) {
        return true;
    } else {
        return false;
    }
}


/**
 * Set post thumbnail as first image from post, if not already defined.
 *
 */
function ishouvikwp_autoset_featured_img()
{
    global $post;

    $post_thumbnail = ishouvikwp_is_post_thumbnail_set();
    if ($post_thumbnail == true) {
        return get_the_post_thumbnail();
    }
    $image_args     = array(
        'post_type'      => 'attachment',
        'numberposts'    => 1,
        'post_mime_type' => 'image',
        'post_parent'    => $post->ID,
        'order'          => 'desc'
    );
    $attached_images = get_children($image_args, ARRAY_A);
    $first_image = reset($attached_images);
    if (!$first_image) {
        return false;
    }

    return get_the_post_thumbnail($post->ID, $first_image['ID']);

}


/**
 * Define default page titles.
 *
 */
function ishouvikwp_wp_title($title, $sep)
{
    global $paged, $page;
    if (is_feed()) {
        return $title;
    }
    // Add the site name.
    $title .= get_bloginfo('name');
    // Add the site description for the home/front page.
    $site_description = get_bloginfo('description', 'display');
    if ($site_description && (is_home() || is_front_page())) {
        $title = "$title $sep $site_description";
    }
    // Add a page number if necessary.
    if ($paged >= 2 || $page >= 2) {
        $title = "$title $sep " . sprintf(__('Page %s', 'ishouvikwp'), max($paged, $page));
    }
    return $title;
}
add_filter('wp_title', 'ishouvikwp_wp_title', 10, 2);

/*
 * Menus
*/

function ishouvik_nav_menu($theme_location) {

    wp_nav_menu(
        array(
            'theme_location' => $theme_location,
            'container' => 'div',
            'container_class' => 'collapse navbar-collapse col-md-12',
            'container_id' => 'ishouvik-navbar-collapse-primary',
            'menu_class' => 'nav navbar-nav',
            'depth' => 2,
            'walker' => new wp_bootstrap_navwalker(),
            'fallback_cb' => 'false'
        )
    );
}

/*
 * Numbered Pagination
*/
function ishouvik_pagination() {
    global $wp_query;

    // Don't print empty markup if there's only one page.
    if ( $wp_query->max_num_pages < 2 )
        return;
    ?>
    <div class="container">
        <nav>
            <ul class="pager">
                <?php if ( get_next_posts_link() ) : ?>
                    <li class="previous">
                        <?php next_posts_link( __( '&larr; Older posts' ) ); ?>
                    </li>
                <?php else: ?>
                    <li class="previous disabled">
                        <a href="#">&larr; Older posts</a>
                    </li>
                <?php endif; ?>

                <?php if ( get_previous_posts_link() ) : ?>
                    <li class="next">
                        <?php previous_posts_link( __( 'Newer posts &rarr;' ) ); ?>
                    </li>
                <?php else: ?>
                    <li class="next disabled">
                    <a href="#">Newer posts &rarr;</a>
                    </li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>
    <?php
}

/*
 * Social Profiles
*/
function is_social( $param = false ) {
    switch($param) {
        case 'tw':
            echo '//twitter.com/' . get_theme_mod('is_tw_handler') . '/';
            break;
        case 'fb':
            echo '//www.facebook.com/' .  get_theme_mod('is_fb_username') . '/';
            break;
        case 'gp':
            echo '//plus.google.com/' . get_theme_mod('is_gp_username') . '/';
            break;
        default:
            echo '';
            break;

    }
}

/*
 * Logo
*/

function is_logo() {
    $logo_img = get_theme_mod('is_logo');
    if ( !empty($logo_img) ) {
        echo '<img src="' . $logo_img . '" class="img-responsive" />';
    } else {
        echo bloginfo('name');
    }
}