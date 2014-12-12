<?php
/**
 * Right Sidebar displayed on post and blog templates.
 *
 * @package WordPress
 * @subpackage iShouvik WP
 */
?>
<div class="col-md-4 site-sidebar clearfix hidden-sm hidden-xs">
	<?php if (function_exists('dynamic_sidebar')) {
			dynamic_sidebar("sidebar"); // common sidebar
		    dynamic_sidebar("sidebar-posts"); // posts specific sidebar;
		}
	?>
</div>
