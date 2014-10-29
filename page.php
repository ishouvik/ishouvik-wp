<?php
/**
 * Template Name: Default Page
 * Description: Page template with a content container and right sidebar.
 *
 * @package WordPress
 * @subpackage iShouvik WP
 */
get_header(); ?>
<?php while (have_posts()) : the_post(); ?>

<div class="container">
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
</div>

<?php endwhile; // end of the loop. ?>

<?php get_footer(); // get footer ?>