<?php
/**
 * Terminal Search Form Template.
 *
 * @package PlayPixelPro
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<fieldset class="brutalist-card" style="padding: 16px; margin-bottom: 24px;">
	<legend style="padding: 0 8px; font-weight: 700; color: var(--gold); text-transform: uppercase; font-size: 0.88rem;">
		grep -r blog /
	</legend>
	<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
		<div style="position: relative; display: flex; align-items: center;">
			<span class="material-symbols-outlined" style="position: absolute; left: 10px; color: var(--gold); font-size: 1.2rem;">search</span>
			<input type="search" class="search-field" placeholder="search_query..." value="<?php echo get_search_query(); ?>" name="s" style="padding-left: 38px; margin-bottom: 0;" />
		</div>
	</form>
</fieldset>
