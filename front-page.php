<?php
/**
 * The template for displaying the front page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Georgia_Workers’_Compensation
 */

get_header();
?>

<main id="primary" class="site-main container">

	<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'frontpage' );

		endwhile; // End of the loop.
		?>

</main>

<?php
get_sidebar();
get_footer();