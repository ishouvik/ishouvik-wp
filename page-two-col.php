<?php
/**
 * Template Name: Two Column
 * Description: Page template with a content container and right sidebar.
 *
 * @package WordPress
 * @subpackage iShouvik WP
 */
get_header(); ?>

<div id="primary" class="col-md-8 site-main-content">
  <?php while (have_posts()) : the_post(); ?>
    <header class="page-title">
        <h1><?php the_title();?></h1>
    </header>

    <div class="clearfix">
        <?php the_content(); ?>
    </div>

    <footer>
       <p>
           <?php edit_post_link(__('Edit', 'ishouvikwp') ); ?>
       </p> 
    </footer>
    <?php comments_template(); ?>
  <?php endwhile; // end of the loop. ?>
</div>

<?php get_sidebar(); ?>

<?php get_footer(); // get footer ?>