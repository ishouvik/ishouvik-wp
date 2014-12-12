<div class="clearfix post-article">
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <?php if ( has_post_thumbnail() ): ?>
            <div class="col-md-3 col-xs-2">
                <a href="<?php the_permalink(); ?>" title="<?php  the_title_attribute( 'echo=0' ); ?>">
                    <?php echo the_post_thumbnail('thumbnail', array('class' => 'img-thumbnail')); ?>
                </a>
            </div>
            <div class="col-md-9 col-xs-10 <?php post_class(); ?>">
                <a href="<?php the_permalink(); ?>" title="<?php the_title();?>">
                    <h3><?php the_title();?></h3>
                </a>
                <div class="hidden-xs">
                    <p><?php the_excerpt(); ?></p>
                </div>
            </div>
        <?php else: ?>
            <a href="<?php the_permalink(); ?>" title="<?php the_title();?>">
                <h3><?php the_title();?></h3>
            </a>
            <p><?php the_excerpt(); ?></p>
        <?php endif; ?>
    </article>
</div>