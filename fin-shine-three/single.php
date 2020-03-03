<?php get_header('else'); ?>
<?php
    global $wp_query;
    $post_ID = get_the_ID();//获取文章ID
    $category = get_the_category($post_ID)[0];//获取当前分类ID
    $p_array = getProductCate();
    $n_array = getNewsCate();
    if (in_array($category->term_id, $p_array)) {
        include(TEMPLATEPATH . '/single/single-product.php');
    } elseif (in_array($category->term_id, $n_array)) {
        include(TEMPLATEPATH . '/single/single-new.php');
    } else {
        include(TEMPLATEPATH . '/single/single-else.php');
    }
?>

<?php get_footer(); ?>
