<!-- search -->
<form class="search" method="get" action="<?php echo esc_url( home_url() ); ?>">
	<div role="search" class="position-relative">
		<input class="search-input" type="search" name="s" aria-label="Search site for:" placeholder="<?php esc_html_e( 'Who\'s Who search', 'html5blank' ); ?>" >
		<span class="position-absolute search-icon"><?php echo search();?></span>
		<button class="search-submit" type="submit"><?php esc_html_e( 'Search', 'html5blank' ); ?></button>
	</div>
</form>
<!-- /search -->
