<?php
/**
 * Single post.
 *
 * @package Konzult
 */

get_header();

while ( have_posts() ) :
	the_post();

	$konzult_cats = get_the_category();
	$konzult_cat  = $konzult_cats ? $konzult_cats[0]->name : __( 'Insight', 'konzult' );

	get_template_part(
		'template-parts/content/page-hero',
		null,
		array(
			'eyebrow' => $konzult_cat,
			'title'   => get_the_title(),
			'meta'    => sprintf(
				'<div class="k-meta"><time datetime="%1$s">%2$s</time><span class="k-meta__sep" aria-hidden="true"></span><span>%3$s</span></div>',
				esc_attr( get_the_date( DATE_W3C ) ),
				esc_html( get_the_date() ),
				esc_html( konzult_reading_time() )
			),
		)
	);
	?>

	<article id="post-<?php the_ID(); ?>" <?php post_class( 'k-entry k-container k-container--narrow k-container--start' ); ?>>
		<?php if ( has_post_thumbnail() ) : ?>
			<figure class="k-entry__media">
				<?php the_post_thumbnail( 'konzult-wide', array( 'class' => 'k-entry__image' ) ); ?>
			</figure>
		<?php endif; ?>

		<div class="k-entry__content">
			<?php
			the_content();
			wp_link_pages(
				array(
					'before' => '<nav class="k-page-links">',
					'after'  => '</nav>',
				)
			);
			?>
		</div>

		<?php
		$konzult_tags = get_the_tags();
		if ( $konzult_tags ) :
			?>
			<ul class="k-tags">
				<?php foreach ( $konzult_tags as $konzult_tag ) : ?>
					<li><a href="<?php echo esc_url( get_tag_link( $konzult_tag->term_id ) ); ?>"><?php echo esc_html( $konzult_tag->name ); ?></a></li>
				<?php endforeach; ?>
			</ul>
		<?php endif; ?>

		<?php
		$konzult_author_id   = (int) get_the_author_meta( 'ID' );
		$konzult_author_name = get_the_author() ? get_the_author() : get_bloginfo( 'name', 'display' );
		$konzult_author_bio  = get_the_author_meta( 'description' );
		?>
		<div class="k-author">
			<?php konzult_author_avatar( $konzult_author_id, 72 ); ?>
			<div class="k-author__body">
				<span class="k-author__label"><?php esc_html_e( 'Written by', 'konzult' ); ?></span>
				<strong class="k-author__name"><?php echo esc_html( $konzult_author_name ); ?></strong>
				<?php if ( $konzult_author_bio ) : ?>
					<p class="k-author__bio"><?php echo esc_html( $konzult_author_bio ); ?></p>
				<?php endif; ?>
			</div>
		</div>
	</article>

	<div class="k-container">
		<?php
		the_post_navigation(
			array(
				'prev_text' => '<span class="k-postnav__label">' . esc_html__( 'Previous', 'konzult' ) . '</span><span class="k-postnav__title">%title</span>',
				'next_text' => '<span class="k-postnav__label">' . esc_html__( 'Next', 'konzult' ) . '</span><span class="k-postnav__title">%title</span>',
				'class'     => 'k-postnav',
			)
		);
		?>
	</div>

	<?php if ( comments_open() || get_comments_number() ) : ?>
		<?php comments_template(); ?>
	<?php endif; ?>
<?php endwhile; ?>

get_footer();
