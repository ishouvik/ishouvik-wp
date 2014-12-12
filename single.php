<?php
/**
 * Default Post Template
 * Description: Post template with a content container and right sidebar.
 *
 * @package WordPress
 * @subpackage iShouvik WP
 */
get_header(); ?>

<div id="primary" class="col-md-8 site-main-content">
    <?php while (have_posts()) : the_post(); ?>
        <header>
            <h1><?php the_title();?></h1>
            <p class="meta"><?php echo ishouvikwp_posted_on();?> | <?php echo ishouvik_categories_in(); ?></p>
        </header>
        <?php if ( has_post_thumbnail() ): ?>
                <p>
                    <?php echo the_post_thumbnail('large', array('class' => 'img-responsive center-block')); ?>
                </p>
        <?php endif; ?>
        <?php the_content(); ?>
         <?php the_tags('<p><i class="fa fa-tags"></i> Tags: ', ', ', '</p>'); ?>
    <?php endwhile; ?>

    <hr/>

    <?php comments_template(); ?>
    
    <?php ishouvikwp_content_nav('nav-below'); ?>
</div>

<?php get_sidebar('blog'); ?>

<?php get_footer(); ?>