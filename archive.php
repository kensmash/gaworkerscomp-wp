<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Georgia_Workers’_Compensation
 */

get_header();
global $wp_query;
?>

<main id="primary" class="site-main container">
	<div class="col-md-8 col-lg-9 p-0 my-5">

		<?php if ( have_posts() ) : ?>

		<header class="page-header">
			<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
		</header><!-- .page-header -->

		<div class="page-content">

			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content-excerpt' );

				if( $wp_query->current_post < $wp_query->post_count-1 ) echo '<hr class="my-4"/>';

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>
		</div>
	</div>

</main><!-- #main -->

<?php
get_sidebar();
get_footer();