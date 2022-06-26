<?php get_header(); ?>
<div class="container">
    <div class="entry-header">
        <h3 class="">「<?php echo single_term_title('', false); ?>」の記事</h2>
    </div>
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

</div>

<?php get_footer(); ?>
