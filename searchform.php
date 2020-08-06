<?php
/**
 * The template for the search form, with bootstrap markup
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Georgia_Workers’_Compensation
 */
?>

<form role="search" method="get" id="searchform">
    <div class="input-group mb-3">
        <input type="text" name="s" class="form-control" placeholder="Search Articles" aria-label="Search Articles" aria-describedby="basic-addon2" value="<?php the_search_query(); ?>">
        <div class="input-group-append">
            <input type="submit" class="btn btn-outline-secondary" alt="search" value="Search">
        </div>
    </div>
</form>