<div class="social-profiles contact-options">
	<?php if (!empty(get_theme_mod('is_email_address'))): ?>
		<a title="Send Mail" target="blank" href="<?php is_social('email'); ?>"><i class="fa fa-envelope"></i></a>
	<?php endif; ?>

	<?php if (!empty(get_theme_mod('is_fb_username'))): ?>
		<a title="Facebook" target="blank" href="<?php is_social('fb'); ?>"><i class="fa fa-facebook"></i></a>
	<?php endif; ?>

	<?php if (!empty(get_theme_mod('is_tw_handler'))): ?>
		<a title="Twitter" target="blank" href="<?php is_social('tw'); ?>"><i class="fa fa-twitter"></i></a>
	<?php endif; ?>

	<?php if (!empty(get_theme_mod('is_gp_username'))): ?>
		<a title="Google Plus" target="blank" href="<?php is_social('gp'); ?>"><i class="fa fa-google-plus"></i></a>
	<?php endif; ?>

	<?php if (!empty(get_theme_mod('is_github_profile'))): ?>
		<a title="GitHub" target="blank" href="<?php is_social('github'); ?>"><i class="fa fa-github"></i></a>
	<?php endif; ?>

	<?php if (!empty(get_theme_mod('is_rss_link'))): ?>
		<a title="RSS Feed" target="blank" href="<?php is_social('rss'); ?>"><i class="fa fa-rss"></i></a>
	<?php endif; ?>
</div>
	