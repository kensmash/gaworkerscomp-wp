<?php
/**
 * Template part for displaying front page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Georgia_Workers’_Compensation
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class("col-md-8 col-lg-9 my-5 p-0"); ?>>
    <header class="entry-header">
        <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
    </header><!-- .entry-header -->

    <div class="entry-content">
        <?php the_content(); ?>
    </div><!-- .entry-content -->

    <h2 class="pt-4">Recent Articles</h2>

    <div class="page-content">

        <?php  
        $query = new WP_Query(array(
        'post_type' => 'articles',
        'posts_per_page' => 5,
        'orderby' => 'meta_value',
    ));
    ?>

        <?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); 

    get_template_part( 'template-parts/content', 'excerpt' ); 

    endwhile; endif; 
    
    wp_reset_postdata(); ?>

    </div>

</article>