<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Georgia_Workers’_Compensation
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area container mb-5">
	<div class="col-md-8 col-lg-9 sidebar-content">
		<div class="row">
			<div class="col-lg px-4">
				<?php dynamic_sidebar( 'sidebar-1' ); ?>
			</div>
			<div class="col-lg px-4">
				<?php dynamic_sidebar( 'sidebar-2' ); ?>
			</div>
		</div>
	</div>
</aside><!-- #secondary -->