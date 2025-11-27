<?php
/**
 * Main template file.
 */

global $wp_query;
get_header();
?>

<div class="layout-with-sidebar">
    <section class="section">
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <article <?php post_class('card'); ?>>
                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <div class="meta"><?php echo esc_html(get_the_date()); ?><?php esc_html_e(' • by ', 'mosaic-of-words'); ?><?php the_author(); ?></div>
                    <div class="article-content">
                        <?php the_excerpt(); ?>
                    </div>
                    <a class="button" href="<?php the_permalink(); ?>"><?php esc_html_e('Continue Reading', 'mosaic-of-words'); ?></a>
                </article>
            <?php endwhile; ?>

            <div class="pagination">
                <?php
                the_posts_pagination([
                    'mid_size'  => 2,
                    'prev_text' => __('« Previous', 'mosaic-of-words'),
                    'next_text' => __('Next »', 'mosaic-of-words'),
                ]);
                ?>
            </div>
        <?php else : ?>
            <p><?php esc_html_e('No posts to display.', 'mosaic-of-words'); ?></p>
        <?php endif; ?>
    </section>

    <?php get_sidebar(); ?>
</div>

<?php
get_footer();
?>
