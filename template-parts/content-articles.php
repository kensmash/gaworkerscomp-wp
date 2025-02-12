<?php
/**
 * Template part for displaying articles
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Georgia_Workers’_Compensation
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class("p-3"); ?>>

	<header class="entry-header">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;
		
		?>

		<small class="text-muted mb-4"><?php ga_authors('') ?></small>
		<?php if( get_field('subhead') ): ?>
		<h2><?php the_field('subhead'); ?></h2>
		<?php endif; ?>

	</header>

	<?php georgia_workers_comp_post_thumbnail(); ?>

	<div class="entry-content">
		<?php
		the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'georgia-workers-comp' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			)
		);

		
	$authors = get_field('authors');

	if( $authors ): ?>

		<div class="mt-5">
			<hr />
			<?php foreach( $authors as $author ): 
			// Setup this post for WP functions (variable must be named $post).
			setup_postdata($author); ?>
			<?php the_content(); ?>
			<?php endforeach; ?>
		</div>

		<?php wp_reset_postdata(); ?>

		<?php endif; 

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'georgia-workers-comp' ),
				'after'  => '</div>',
			)
		);
		?>

	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php georgia_workers_comp_entry_footer(); ?>
	</footer>

</article>