<?php
/**
 * Search form.
 *
 * @package Konzult
 */

$konzult_field_id = 'k-search-' . wp_unique_id();
?>
<form role="search" method="get" class="k-search" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label class="k-search__label" for="<?php echo esc_attr( $konzult_field_id ); ?>">
		<?php esc_html_e( 'Search the site', 'konzult' ); ?>
	</label>
	<div class="k-search__field">
		<input
			id="<?php echo esc_attr( $konzult_field_id ); ?>"
			class="k-search__input"
			type="search"
			name="s"
			value="<?php echo esc_attr( get_search_query() ); ?>"
			placeholder="<?php esc_attr_e( 'Search insights…', 'konzult' ); ?>"
		>
		<button class="k-search__submit" type="submit">
			<span class="screen-reader-text"><?php esc_html_e( 'Search', 'konzult' ); ?></span>
			<?php echo konzult_icon( 'arrow', 15 ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
		</button>
	</div>
</form>
