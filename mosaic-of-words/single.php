<?php
/**
 * Single post template.
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
                    <div class="meta"><?php echo esc_html(get_the_date()); ?><?php esc_html_e(' • by ', 'mosaic-of-words'); ?><?php the_author(); ?></div>
                    <div class="article-content">
                        <?php the_content(); ?>
                    </div>
                    <nav class="pagination">
                        <div class="prev">&larr; <?php previous_post_link('%link'); ?></div>
                        <div class="next"><?php next_post_link('%link'); ?> &rarr;</div>
                    </nav>
                </article>
            <?php endwhile; ?>
        <?php endif; ?>
    </section>

    <?php get_sidebar(); ?>
</div>

<?php
get_footer();
?>
