<?php
/**
 * Description: Default Index template to display loop of blog posts
 *
 * @package WordPress
 * @subpackage iShouvik WP
 */
get_header(); ?>


<div id="primary" class="col-md-8 site-main-content">
	<header class="page-title sr-only">
		<h1>Articles</h1>
	</header>
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <?php get_template_part( 'content', get_post_format() ); ?>
    <?php endwhile; endif; ?>
    <?php ishouvik_pagination(); // pagination with twitter bootstrap classes ?>
</div>

<?php get_sidebar('blog'); ?>

<?php get_footer(); ?>