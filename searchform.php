<div class="col-xs-2 pull-right">
	<form role="search" method="get" class="navbar-form navbar-right" action="<?php echo home_url( '/' ); ?>">
		<div class="form-group">
			<input type="search" class="form-control" placeholder="<?php echo esc_attr_x( 'Search …', 'placeholder' ) ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
		</div>
	</form>
</div>