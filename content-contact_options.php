<div class="social-profiles contact-options">
	<?php if( (get_theme_mod('is_email_address_display') == 'yes') ): ?>
		<a title="Send Mail" target="blank" href="<?php echo is_social('email'); ?>"><i class="fa fa-envelope"></i></a>
	<?php endif; ?>

	<?php if( (get_theme_mod('is_fb_username_display') == 'yes') ): ?>
		<a title="Facebook" target="blank" href="<?php echo is_social('fb'); ?>"><i class="fa fa-facebook"></i></a>
	<?php endif; ?>

	<?php if( (get_theme_mod('is_tw_handler_display') == 'yes') ): ?>
		<a title="Twitter" target="blank" href="<?php echo is_social('tw'); ?>"><i class="fa fa-twitter"></i></a>
	<?php endif; ?>

	<?php if( (get_theme_mod('is_gp_username_display') == 'yes') ): ?>
		<a title="Google Plus" target="blank" href="<?php echo is_social('gp'); ?>"><i class="fa fa-google-plus"></i></a>
	<?php endif; ?>

	<?php if( (get_theme_mod('is_github_profile_display') == 'yes') ): ?>
		<a title="GitHub" target="blank" href="<?php echo is_social('github'); ?>"><i class="fa fa-github"></i></a>
	<?php endif; ?>

	<?php if( (get_theme_mod('is_rss_link_display') == 'yes') ): ?>
		<a title="RSS Feed" target="blank" href="<?php echo is_social('rss'); ?>"><i class="fa fa-rss"></i></a>
	<?php endif; ?>
</div>
	