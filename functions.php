<?php
/**
 * iShouvik WP Theme Functions
 *
 * @author Shouvik Mukherjee <contact@ishouvik.com>
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
 *
 */
function ishouvikwp_images() {

    set_post_thumbnail_size(260, 180); // 260px wide x 180px high
}

/**
 * Load CSS styles for theme.
 *
 */
function ishouvikwp_styles_loader() {
    wp_enqueue_style('ishouvikwp-style', '//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css', false, '1.0', 'all');
    wp_enqueue_style('ishouvikwp-fontawesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css', false, '1.0', 'all');
    wp_enqueue_style( 'ishouvikwp-animate', get_template_directory_uri() . '/vendor/animate.min.css', false, '1.0', 'all' );
    wp_enqueue_style( 'ishouvik-wp-main', get_template_directory_uri() . '/css/ishouvik-wp/main.min.css', false, '1.0', 'all' );
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
    wp_enqueue_script( 'wow-js', get_template_directory_uri() . '/vendor/wow.min.js' ); // Wow JS to invoke animate.css classes when on screen
    wp_enqueue_script('bootstrap_form_fields', get_template_directory_uri() . '/js/form_fields.js'); // Add Bootstrap Classes to form fields

}
add_action('wp_enqueue_scripts', 'ishouvikwp_scripts_loader');

function ishwp_wow_js_loader() {
    echo '<script type="text/javascript">new WOW().init();</script>';
}
add_action('wp_head', 'ishwp_wow_js_loader');
/**
 * Define theme's widget areas.
 *
 */
function ishouvikwp_widgets_init() {

    register_sidebar(
        array(
            'name'          => __('Site Intro', 'ishouvikwp'),
            'id'            => 'site-intro',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => "</div>",
            'before_title'  => '<h4 class="widget-title">',
            'after_title'   => '</h4>',
        )
    );

    register_sidebar(
        array(
            'name'          => __('Common Sidebar', 'ishouvikwp'),
            'id'            => 'sidebar',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => "</div>",
            'before_title'  => '<h4 class="widget-title">',
            'after_title'   => '</h4>',
        )
    );

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
add_action('widgets_init', 'ishouvikwp_widgets_init');


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
        printf(__('<i class="fa fa-clock-o"></i> Posted on <a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s" pubdate>%4$s</time></a><span class="byline"> <span class="sep"> by </span> <span class="author vcard"><a class="url fn n" href="%5$s" title="%6$s" rel="author">%7$s</a></span></span>','ishouvikwp'),
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

if ( !function_exists(('ishouvik_categories_in'))  ):
    function ishouvik_categories_in() {
        $categories_list = get_the_category_list( __( ', ', 'ishouvikwp' ) );
        if ( $categories_list ) {
            echo '<i class="fa fa-folder-open"></i> ' . $categories_list;
        }
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
            'container_class' => 'collapse navbar-collapse',
            'container_id' => 'ishouvik-navbar-collapse-primary',
            'menu_class' => 'nav navbar-nav',
            'depth' => 2,
            'walker' => new wp_bootstrap_navwalker(),
            'fallback_cb' => 'false'
        )
    );
}


/**
 * Custom Excerpt
*/
function ishouvik_excerpt_length($length) {
    return 150;
}
add_filter('excerpt_length', 'ishouvik_excerpt_length');

function ishouvik_excerpt_more($more) {
    global $post;
    return '... <div class="clearfix"><a class="btn btn-primary pull-right" href="' . get_permalink($post->ID) . '">Read More</a></div>'; 
}
add_filter('excerpt_more', 'ishouvik_excerpt_more');




/*
 * Numbered Pagination
*/
function ishouvik_pagination() {
    global $wp_query;

    // Don't print empty markup if there's only one page.
    if ( $wp_query->max_num_pages < 2 )
        return;
    ?>
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
    <?php
}

/*
 * Social Profiles
*/
function is_social( $param = false ) {
    switch($param) {
        case 'email':
            echo 'mailto:' . get_theme_mod('is_email_address');
            break;
        case 'tw':
            echo 'https://twitter.com/' . get_theme_mod('is_tw_handler');
            break;
        case 'fb':
            echo 'https://facebook.com/' . get_theme_mod('is_fb_username');
            break;
        case 'gp':
            echo 'https://plus.google.com/' . get_theme_mod('is_gp_username');
            break;
        case 'github':
            echo 'https://github.com/' . get_theme_mod('is_github_profile');
            break;
        case 'rss':
            echo get_theme_mod('is_rss_link');
            break;
        default:
            return false;
            break;

    }
}

/*
 * Logo
*/

function is_logo() {
    $logo_img = get_theme_mod('is_logo');
    if ( !empty($logo_img) ) { ?>
        <a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>">
            <img src="<?php echo $logo_img; ?>" class="img-responsive center-block" alt="<?php bloginfo('name'); ?>" />
        </a>
    <?php } else { ?>
        <a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>"><h1 class="site-title"><?php bloginfo('name'); ?></h1></a>
    <?php
    }
}

/**
 * Custom Codes
*/

add_action('wp_head','is_custom_css');
function is_custom_css() {
    $output="<style>". get_theme_mod('is_custom_css') . "</style>";
    echo $output;
}

add_action('wp_head','is_custom_js');
function is_custom_js() {
    $output="<script>" . get_theme_mod('is_custom_js') . "</script>";
    echo $output;
}


/**
 * JetPack Responsive Videos
*/
add_theme_support( 'jetpack-responsive-videos' );


/**
 * Include the TGM_Plugin_Activation class.
 */
require_once dirname( __FILE__ ) . '/includes/class-tgm-plugin-activation.php';
 
add_action( 'tgmpa_register', 'my_theme_register_required_plugins' );
/**
 * Register the required plugins for this theme.
 *
 * In this example, we register two plugins - one included with the TGMPA library
 * and one from the .org repo.
 *
 * The variable passed to tgmpa_register_plugins() should be an array of plugin
 * arrays.
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */
function my_theme_register_required_plugins() {
 
    /**
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $plugins = array(
      array(
            'name'               => 'Github Updater',
            'slug'               => 'github-updater-develop',
            'source'             => 'https://github.com/afragen/github-updater/archive/develop.zip',
            'required'           => true,
            'external_url'       => 'https://github.com/afragen/github-updater',
            'force_activation'   => true,
        ),
        array(
            'name'      => 'Wordfence',
            'slug'      => 'wordfence',
            'required'  => false,
        ),
        array(
            'name'      => 'WP SMTP',
            'slug'      => 'wp-smtp',
            'required'  => false,
        ),
        array(
            'name'      => 'SiteOrigin Page Builder',
            'slug'      => 'siteorigin-panels',
            'required'  => false,
        ),
        array(
            'name'      => 'W3 Total Cache',
            'slug'      => 'w3-total-cache',
            'required'  => false,
        ),
        array(
            'name'      => 'Jetpack by WordPress.com',
            'slug'      => 'jetpack',
            'required'  => false
        ),
    );
 
    /**
     * Array of configuration settings. Amend each line as needed.
     * If you want the default strings to be available under your own theme domain,
     * leave the strings uncommented.
     * Some of the strings are added into a sprintf, so see the comments at the
     * end of each line for what each argument will be.
     */
    $config = array(
        'default_path' => '',                      // Default absolute path to pre-packaged plugins.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'has_notices'  => true,                    // Show admin notices or not.
        'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false,                   // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to output right before the plugins table.
        'strings'      => array(
            'page_title'                      => __( 'Install Required Plugins', 'tgmpa' ),
            'menu_title'                      => __( 'Install Plugins', 'tgmpa' ),
            'installing'                      => __( 'Installing Plugin: %s', 'tgmpa' ), // %s = plugin name.
            'oops'                            => __( 'Something went wrong with the plugin API.', 'tgmpa' ),
            'notice_can_install_required'     => _n_noop( 'iShouvik WP theme requires the following plugin: %1$s.', 'iShouvik WP theme requires the following plugins: %1$s.' ), // %1$s = plugin name(s).
            'notice_can_install_recommended'  => _n_noop( 'iShouvik WP theme recommends the following plugin: %1$s.', 'iShouvik WP theme recommends the following plugins: %1$s.' ), // %1$s = plugin name(s).
            'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ), // %1$s = plugin name(s).
            'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s).
            'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s).
            'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ), // %1$s = plugin name(s).
            'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ), // %1$s = plugin name(s).
            'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ), // %1$s = plugin name(s).
            'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
            'activate_link'                   => _n_noop( 'Begin activating plugin', 'Begin activating plugins' ),
            'return'                          => __( 'Return to Required Plugins Installer', 'tgmpa' ),
            'plugin_activated'                => __( 'Plugin activated successfully.', 'tgmpa' ),
            'complete'                        => __( 'All plugins installed and activated successfully. %s', 'tgmpa' ), // %s = dashboard link.
            'nag_type'                        => 'updated' // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
        )
    );
 
    tgmpa( $plugins, $config );
 
}
