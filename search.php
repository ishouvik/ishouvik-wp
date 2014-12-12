<?php
/**
 * Search Results Template
 *
 * @package WordPress
 * @subpackage iShouvik WP
 */
get_header(); ?>

<div id="primary" class="col-md-8 site-main-content">
    <div class="well">
        <header class="post-title">
            <h1><?php printf( __('Search Results for: %s', 'ishouvikwp'),'<span>' . get_search_query() . '</span>'); ?></h1>
        </header>
    </div>

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <?php get_template_part( 'content', get_post_format() ); ?>
    <?php endwhile; endif; ?>
</div>
<?php get_sidebar('blog'); ?>
    
<?php get_footer(); ?>