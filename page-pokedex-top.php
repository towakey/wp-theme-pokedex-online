<?php
/*
Template Name: Pokedexトップページ
Template Post Type: page
*/
?>
<?php get_header(); ?>

<!-- contents start -->
<?php
remove_filter('the_content', 'wpautop');
the_content();
?>
<!-- contents end -->

<?php get_footer(); ?>
