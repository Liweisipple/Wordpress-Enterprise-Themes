<?php
    global $wpdb;
    global $wp_category;
    global $wp_n_category;
    global $wp_o_category;
?>

<?php get_header(); ?>

<?php
    if (is_home()) {
        include(TEMPLATEPATH . '/content.php');
    } elseif (is_single()) {
        include(TEMPLATEPATH . '/single.php');
    } elseif (is_search()) {

    } else {

    }
?>



<?php get_footer(); ?>





