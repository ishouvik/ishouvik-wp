<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package WordPress
 * @subpackage iShouvik WP
 */
get_header(); ?>

    <center>
      <h1>404 Not Found!</h1>
      <h2>
        Oops, this page isn't here anymore.
      </h2>
      <p class="text-lead">
        &#128534;
      </p>
      <p>
        <a target="blank" href="<?php is_social('fb'); ?>"><i class="fa fa-facebook fa-2x"></i></a>
        <a target="blank" href="<?php is_social('tw') ?>"><i class="fa fa-twitter fa-2x"></i></a>
        <a target="blank" href="<?php is_social('gp') ?>"><i class="fa fa-google-plus fa-2x"></i></a>
      </p>
    </center>
    
<?php get_footer();
