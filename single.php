<?php
/**
 * Default Post Template
 * Description: Post template with a content container and right sidebar.
 *
 * @package WordPress
 * @subpackage iShouvik WP
 */
get_header(); ?>

<div class="clearfix">
    <div class="col-md-8">
        <?php while (have_posts()) : the_post(); ?>
            <header>
                <h1><?php the_title();?></h1>
                <p class="meta"><?php echo ishouvikwp_posted_on();?></p>
            </header>
            <?php if ( has_post_thumbnail() ): ?>
                <center>
                    <p class="img-article-single">
                        <?php echo the_post_thumbnail('ishouvik-single', array('class' => 'img-article-single')); ?>
                    </p>
                </center>
            <?php endif; ?>
            <?php the_content(); ?>
            <?php the_tags('<p>Tags: ', ', ', '</p>'); ?>
        <?php endwhile; ?>

        <hr/>

        <?php comments_template(); ?>
        <?php ishouvikwp_content_nav('nav-below'); ?>
    </div>
    <div class="col-md-4 hidden-xs">
        <?php get_sidebar('blog'); ?>
    </div>
</div>

<?php get_footer(); ?>