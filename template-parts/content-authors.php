<?php
/**
 * Template part for displaying authors
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Georgia_Workers’_Compensation
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
	</header>

	<div class="entry-content">
		<?php the_content(); ?>
	</div>

	<?php 

	/*
	*  Query posts for a relationship value.
	*  This method uses the meta_query LIKE to match the string "123" to the database value a:1:{i:0;s:3:"123";} (serialized array)
	*/

	$articles = get_posts(array(
		'post_type' => 'articles',
		'meta_query' => array(
			array(
				'key' => 'authors', // name of custom field
				'value' => '"' . get_the_ID() . '"', // matches exactly "123", not just 123. This prevents a match for "1234"
				'compare' => 'LIKE'
			)
		)
	));

	?>
	<?php if( $articles ): ?>
	<div class="author-articles-list">
		<h2 class="mb-3">Articles</h2>
		<ul>
			<?php foreach( $articles as $article ): ?>

			<li>
				<a href="<?php echo get_permalink( $article->ID ); ?>"><?php echo get_the_title( $article->ID ); ?></a>
			</li>

			<?php endforeach; ?>
		</ul>
	</div>
	<?php endif; ?>

</article>