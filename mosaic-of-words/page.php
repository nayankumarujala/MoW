<?php
/**
 * Page template.
 */

global $wp_query;
get_header();
?>

<div class="layout-with-sidebar">
    <section class="section">
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <article <?php post_class('card'); ?>>
                    <h1><?php the_title(); ?></h1>
                    <div class="article-content">
                        <?php the_content(); ?>
                    </div>
                </article>
            <?php endwhile; ?>
        <?php endif; ?>
    </section>

    <?php get_sidebar(); ?>
</div>

<?php
get_footer();
?>
