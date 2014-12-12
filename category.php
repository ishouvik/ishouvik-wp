<?php
/**
 * Description: Default Index template to display loop of blog posts
 *
 * @package WordPress
 * @subpackage iShouvik WP
 */
get_header(); ?>

<div id="primary" class="col-md-8 site-main-content">
	<?php if (have_posts()) :  ?>
		<header class="well">
			<h1 class="archive-title"><?php printf( __( 'Category: %s', 'ishouvikwp' ), single_cat_title( '', false ) ); ?></h1>
			<?php if ( category_description() ) : // Show an optional category description ?>
				<div class="archive-meta"><?php echo category_description(); ?></div>
			<?php endif; ?>
		</header>
        <?php while (have_posts()) : the_post(); ?>
            <?php get_template_part( 'content', get_post_format() ); ?>
        <?php endwhile;?>
        <?php ishouvik_pagination(); ?>
    <?php endif; ?>
</div>
<?php get_sidebar('blog'); ?>

<?php get_footer(); ?>