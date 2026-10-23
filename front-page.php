<?php
/**
 * Front page.
 *
 * Three states, in order of precedence:
 * 1. A static front page with real content (Gutenberg or Elementor) renders that content.
 * 2. The built-in showcase, which is on by default.
 * 3. The latest posts, if the showcase is switched off in the Customizer.
 *
 * @package Konzult
 */

get_header();

$konzult_front_id   = (int) get_option( 'page_on_front' );
$konzult_has_static = 'page' === get_option( 'show_on_front' ) && $konzult_front_id;
$konzult_content    = $konzult_has_static ? trim( (string) get_post_field( 'post_content', $konzult_front_id ) ) : '';
$konzult_is_built   = $konzult_has_static && konzult_is_elementor_page( $konzult_front_id );
$konzult_show_demo  = (bool) get_theme_mod( 'konzult_home_demo', true );

if ( $konzult_has_static && ( $konzult_is_built || '' !== $konzult_content ) ) :

	while ( have_posts() ) :
		the_post();
		?>
		<article id="post-<?php the_ID(); ?>" <?php post_class( 'k-front-content' ); ?>>
			<div class="k-entry__content k-container k-container--narrow">
				<?php the_content(); ?>
			</div>
		</article>
		<?php
	endwhile;

elseif ( $konzult_show_demo ) :

	get_template_part( 'template-parts/home/hero' );
	get_template_part( 'template-parts/home/clients' );
	get_template_part( 'template-parts/home/intro' );
	get_template_part( 'template-parts/home/services' );
	get_template_part( 'template-parts/home/stats' );
	get_template_part( 'template-parts/home/process' );
	get_template_part( 'template-parts/home/quote' );
	get_template_part( 'template-parts/home/insights' );
	get_template_part( 'template-parts/home/cta' );

else :

	?>
	<header class="k-page-hero">
		<div class="k-container">
			<p class="k-eyebrow"><span class="k-eyebrow__index">01</span><span class="k-eyebrow__line" aria-hidden="true"></span><?php esc_html_e( 'Journal', 'konzult' ); ?></p>
			<h1 class="k-page-hero__title"><?php esc_html_e( 'Insights', 'konzult' ); ?></h1>
		</div>
	</header>
	<?php
	get_template_part( 'template-parts/content/loop' );

endif;

get_footer();
