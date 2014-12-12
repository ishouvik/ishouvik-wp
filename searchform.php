	<form role="search" method="get" action="<?php echo home_url( '/' ); ?>">
		<div class="form-group searchform">
			<input type="search" class="form-control" placeholder="<?php echo esc_attr_x( 'Search …', 'placeholder' ) ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
	</div>
</form>