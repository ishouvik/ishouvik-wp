<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package WordPress
 * @subpackage iShouvik WP
 */
get_header(); ?>

<div class="container">
  <div class="jumbotron">
    <center>
      <h1>404 Not Found!</h1>
      <p class="text-lead">
        Oops, this page isn't here anymore.
      </p>
      <p>
        &#128534;
      </p>
      <p>
        <a target="blank" href="<?php is_social('fb'); ?>"><i class="fa fa-facebook fa-2x"></i></a>
        <a target="blank" href="<?php is_social('tw') ?>"><i class="fa fa-twitter fa-2x"></i></a>
        <a target="blank" href="<?php is_social('gp') ?>"><i class="fa fa-google-plus fa-2x"></i></a>
      </p>
    </center>
  </div>
</div>
    
<?php get_footer();
