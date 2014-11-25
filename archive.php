<?php
/**
 * Description: Default Archive template to display loop of blog posts
 *
 * @package WordPress
 * @subpackage iShouvik WP
 */
get_header(); ?>
<div class="container">
	<div class="clearfix">
	    <div class="col-md-8 site-main-content">
	        <?php if (have_posts()): ?>
	        	<header class="well">
	        		<h1 class="archive-title">
	        			<?php
							if ( is_day() ) :
								printf( __( 'Daily Archives: %s', 'ishouvikwp' ), get_the_date() );
							elseif ( is_month() ) :
								printf( __( 'Monthly Archives: %s', 'ishouvikwp' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'ishouvikwp' ) ) );
							elseif ( is_year() ) :
								printf( __( 'Yearly Archives: %s', 'ishouvikwp' ), get_the_date( _x( 'Y', 'yearly archives date format', 'ishouvikwp' ) ) );
							else :
								_e( 'Archives', 'ishouvikwp' );
							endif;
						?>
	        		</h1>
	        	</header>
	        	<?php while (have_posts()) : the_post(); ?>
		            <?php get_template_part( 'content', get_post_format() ); ?>
		        <?php endwhile; ?>
	        <?php endif; ?>
	    </div>
	    <div class="col-md-4 hidden-xs site-sidebar">
	        <?php get_sidebar('blog'); ?>
	    </div>
	</div>
</div>

<?php ishouvik_pagination(); ?>

<?php get_footer(); ?>