<?php
/**
** activation theme
**/
add_action('wp_enqueue_scripts', 'theme_enqueue_styles');
function theme_enqueue_styles()
{
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
    wp_enqueue_style('theme-style', get_stylesheet_directory_uri() . '/css/theme.css', array(), filemtime(get_stylesheet_directory() . '/css/theme.css'));
}

add_filter( 'generate_copyright','tu_custom_copyright' );
function tu_custom_copyright() {
    ?>
    <a href='#'>Mentions légales
    <?php
}

/* HOOK LIEN ADMIN */

function ajouter_lien_admin_menu( $items ) {
    if (is_user_logged_in()) {
        $items .= '<li><a href="http://localhost/planty/wp-admin/index.php">Admin</a></li>';
    }
    return $items;
}
add_filter( 'wp_nav_menu_items', 'ajouter_lien_admin_menu', 10 , 1 );
