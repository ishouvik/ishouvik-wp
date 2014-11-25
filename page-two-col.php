<?php
/**
 * Template Name: Two Column
 * Description: Page template with a content container and right sidebar.
 *
 * @package WordPress
 * @subpackage iShouvik WP
 */
get_header(); ?>

<div class="container clearfix">
  <div class="col-md-8 site-main-content">
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
  <div class="col-md-4 hidden-sm hidden-xs site-sidebar">
    <?php get_sidebar(); ?>
  </div>
</div>

<?php get_footer(); // get footer ?>