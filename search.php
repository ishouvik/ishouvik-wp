<?php
/**
 * Search Results Template
 *
 * @package WordPress
 * @subpackage iShouvik WP
 */
get_header(); ?>

<div class="container">
    <div class="well">
        <header class="post-title">
            <h1><?php printf( __('Search Results for: %s', 'ishouvikwp'),'<span>' . get_search_query() . '</span>'); ?></h1>
        </header>
    </div>

    <div class="clearfix">
        <div class="col-md-8">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <?php get_template_part( 'content', get_post_format() ); ?>
            <?php endwhile; endif; ?>
        </div>
        <div class="col-md-4 hidden-xs">
            <?php get_sidebar('blog'); ?>
        </div>
    </div>
</div>
    
<?php get_footer(); ?>