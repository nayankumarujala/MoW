<?php
/**
 * Front page template for Mosaic of Words.
 */

global $wp_query;
get_header();
?>

<section class="hero section">
    <h1><?php bloginfo('name'); ?></h1>
    <p><?php bloginfo('description'); ?></p>
    <a class="button" href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Begin Reading', 'mosaic-of-words'); ?></a>
</section>

<section class="section">
    <h2 class="section-title"><?php esc_html_e('Latest Entries', 'mosaic-of-words'); ?></h2>
    <?php
    $mow_front_query = new WP_Query([
        'posts_per_page' => 6,
    ]);

    if ($mow_front_query->have_posts()) :
        echo '<div class="grid three">';
        while ($mow_front_query->have_posts()) :
            $mow_front_query->the_post();
            ?>
            <article <?php post_class('card'); ?>>
                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                <div class="meta"><?php echo esc_html(get_the_date()); ?></div>
                <div class="excerpt"><?php the_excerpt(); ?></div>
                <a class="button" href="<?php the_permalink(); ?>"><?php esc_html_e('Read More', 'mosaic-of-words'); ?></a>
            </article>
            <?php
        endwhile;
        echo '</div>';
    else :
        echo '<p>' . esc_html__('No posts found.', 'mosaic-of-words') . '</p>';
    endif;
    wp_reset_postdata();
    ?>
</section>

<?php
get_footer();
?>
