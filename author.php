<?php
/**
 * The template for displaying Author Archive pages.
 *
 * @package WordPress
 * @subpackage iShouvik WP
 */
get_header(); ?>

<div id="primary" class="col-md-8 site-main-content">
    <div class="well">
        <h1 class="page-title author"><?php printf(
            __('Articles by %s', 'ishouvikwp'),
            '<span class="vcard"><a class="url fn n" href="' . get_author_posts_url(
                get_the_author_meta("ID")
            ) . '" title="' . esc_attr(get_the_author()) . '" rel="me">' . get_the_author() . '</a></span>'
        ); ?></h1>
    </div>

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <?php get_template_part( 'content', get_post_format() ); ?>
    <?php endwhile; endif; ?>
</div>

<?php get_sidebar('blog'); ?>

<?php get_footer(); ?>