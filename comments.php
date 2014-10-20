<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains both current comments
 * and the comment form. The actual display of comments is
 * handled by a callback to ishouvikwp_comment() which is
 * located in the functions.php file.
 *
 * @package WordPress
 * @subpackage iShouvik WP
 */
// Return early no password has been entered for protected posts.
if (post_password_required()) {
    return;
} ?>
<div id="comments" class="comments-area">
    <?php if (have_comments()) : ?>

        <ul class="media-list">
            <?php wp_list_comments(array('callback' => 'ishouvikwp_comment')); ?>
        </ul><!-- /.commentlist -->

        <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : ?>
            <nav id="comment-nav-below" class="navigation" role="navigation">
                <div class="nav-previous">
                    <?php previous_comments_link( _e('&larr; Older Comments', 'ishouvikwp')); ?>
                </div>
                <div class="nav-next">
                    <?php next_comments_link(_e('Newer Comments &rarr;', 'ishouvikwp')); ?>
                </div>
            </nav>
        <?php endif; // check for comment navigation ?>

        <?php elseif (!comments_open() && '0' != get_comments_number() && post_type_supports(get_post_type(), 'comments')) : ?>
            <p class="nocomments"><?php _e('Comments are closed.', 'ishouvikwp'); ?></p>
    <?php endif; ?>

    <?php comment_form(); ?>
</div><!-- #comments .comments-area -->