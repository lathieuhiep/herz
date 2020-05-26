
<?php if( is_active_sidebar( 'herz-sidebar-main' ) ): ?>

    <aside class="<?php echo esc_attr( herz_col_sidebar() ); ?> site-sidebar order-1">
        <?php dynamic_sidebar( 'herz-sidebar-main' ); ?>
    </aside>

<?php endif; ?>