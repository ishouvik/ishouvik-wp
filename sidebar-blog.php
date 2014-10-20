<?php
/**
 * Right Sidebar displayed on post and blog templates.
 *
 * @package WordPress
 * @subpackage iShouvik WP
 */
?>

<div class="clearfix">
	<?php
	if (function_exists('dynamic_sidebar')) {
	    dynamic_sidebar("sidebar-posts");
	} ?>
</div>
