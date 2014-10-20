<?php
/**
 * Default Footer
 *
 * @package WordPress
 * @subpackage iShouvik WP
 */
?>
        </div> <!-- .container -->
        <footer class="site-footer">
            <div class="clearfix">
                <div class="container">
                    <?php
                    if (function_exists('dynamic_sidebar')) {
                        dynamic_sidebar("footer-col-1");
                    } ?>
                    <?php
                    if (function_exists('dynamic_sidebar')) {
                        dynamic_sidebar("footer-col-2");
                    } ?>
                    <?php
                    if (function_exists('dynamic_sidebar')) {
                        dynamic_sidebar("footer-col-3");
                    } ?>
                </div>

                <center>
                    <p>&copy; <?php bloginfo('name'); ?> <?php the_time('Y') ?></p>
                </center>
            </div>
        </footer>
        <?php wp_footer(); ?>
    </body>
</html>