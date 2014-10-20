<?php
/**
 * The Right Sidebar displayed on page templates.
 *
 * @package WordPress
 * @subpackage iShouvik WP
 */
?>
<div class="clearfix">
    <?php
    if (function_exists('dynamic_sidebar')) {
        dynamic_sidebar("sidebar-page");
    }
    ?>
</div>