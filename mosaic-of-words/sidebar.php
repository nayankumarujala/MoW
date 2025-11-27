<?php
/**
 * Sidebar template.
 */
?>
<aside class="sidebar">
    <?php if (is_active_sidebar('primary-sidebar')) : ?>
        <?php dynamic_sidebar('primary-sidebar'); ?>
    <?php else : ?>
        <p><?php esc_html_e('Add widgets to the primary sidebar.', 'mosaic-of-words'); ?></p>
    <?php endif; ?>
</aside>
