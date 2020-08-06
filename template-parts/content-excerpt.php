<?php
/**
 * Template part for displaying post excerpts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Georgia_Workers’_Compensation
 */
?>



<div id="post-<?php the_ID(); ?>" class="my-3">

    <h3><a href="<?php the_permalink();?>" rel="bookmark"><?php the_title(); ?></a></h3>
    <?php if ( 'post' === get_post_type() ) : ?>
    <div class="entry-meta">
        <?php
                    georgia_workers_comp_posted_on();
                    georgia_workers_comp_posted_by();
                    ?>
    </div>
    <?php endif; ?>

    <?php if ( 'articles' === get_post_type() ) : ?>
    <small class="text-muted mb-4"><?php ga_authors('') ?></small>
    <?php endif; ?>

    <?php the_excerpt(); ?>

</div>