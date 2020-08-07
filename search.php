<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Georgia_Workers’_Compensation
 */

get_header();
global $wp_query;
?>

<main id="primary" class="site-main container">

	<div class="col-md-8 col-lg-9 my-5 py-4 page-content">

		<?php if ( have_posts() ) : ?>

		<header class="page-header">
			<h1 class="page-title mb-4">
				<?php
					/* translators: %s: search query. */
					printf( esc_html__( 'Search Results for: %s', 'georgia-workers-comp' ), '<span>' . get_search_query() . '</span>' );
					?>
			</h1>
		</header><!-- .page-header -->

		<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'search' );

				if( $wp_query->current_post < $wp_query->post_count-1 ) echo '<hr class="my-4"/>';

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

	</div>
</main><!-- #main -->

<?php
get_sidebar();
get_footer();