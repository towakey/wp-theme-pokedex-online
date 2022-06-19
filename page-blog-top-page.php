<?php
/*
Template Name: blogトップページ
Template Post Type: page
*/
?>
<?php get_header(); ?>

<!-- contents start -->
<?php query_posts('post_type=post&paged='.$paged); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <div class="row">
        <a href="<?php the_permalink(); ?>" class="col s12 m12 l12">
            <div class="card z-depth-0 grey lighten-3">
                <div class="card-content">
                    <span class="card-title"><?php the_title(); ?></span>
                </div>
            </div>
        </a>
    </div>
<?php endwhile; endif; ?>
<?php wp_reset_query(); ?>
<!-- contents end -->

<?php get_footer(); ?>
