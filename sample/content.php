<?php
$wp_category = [];
$wp_n_category = [];
$wp_o_category = [];
$p_array = '';
$s_array = '';
$product_detail_cate = get_category_by_slug('productdetails');//获取商品详情
$news_cate = get_category_by_slug('news');//获取商品详情
if ($product_detail_cate) { //商品详情
    $p_array = $product_detail_cate->term_id;
    //查询产品
    $request = "SELECT $wpdb->terms.term_id, name,slug,$wpdb->term_taxonomy.description FROM $wpdb->terms ";
    $request .= " LEFT JOIN $wpdb->term_taxonomy ON $wpdb->term_taxonomy.term_id = $wpdb->terms.term_id ";
    $request .= " WHERE $wpdb->term_taxonomy.taxonomy = 'category' AND $wpdb->term_taxonomy.count != 0 AND ($wpdb->term_taxonomy.parent in ($p_array) OR $wpdb->term_taxonomy.term_id in ($p_array))";
    $request .= " ORDER BY term_id asc";
    $categorys = $wpdb->get_results($request);
    foreach ($categorys as $category) { //调用菜单
        $wp_category[] = [
            'cat_name' => $category->name,
            'cat_id' => $category->term_id,
            'cat_slug' => urldecode_deep($category->slug),
            'description' => get_between($category->description, 'src="', '" alt'),
        ];
    }
}
if ($news_cate) { //新闻
    $s_array = $news_cate->term_id;
    //查询新闻
    $request_n = "SELECT $wpdb->terms.term_id, name, slug FROM $wpdb->terms ";
    $request_n .= " LEFT JOIN $wpdb->term_taxonomy ON $wpdb->term_taxonomy.term_id = $wpdb->terms.term_id  ";
    $request_n .= " WHERE  $wpdb->term_taxonomy.taxonomy = 'category' AND $wpdb->term_taxonomy.count != 0 AND ($wpdb->term_taxonomy.parent in ($s_array) OR $wpdb->term_taxonomy.term_id in ($s_array))";
    $request_n .= " ORDER BY term_id asc";
    $categorys_n = $wpdb->get_results($request_n);
    foreach ($categorys_n as $category) { //调用菜单
        $wp_n_category[] = [
            'cat_name' => $category->name,
            'cat_id' => $category->term_id,
            'cat_slug' => urldecode_deep($category->slug),
            'description' => get_between($category->description, 'src="', '" alt'),
        ];
    }
}

$request_o = "SELECT $wpdb->terms.term_id, name, slug FROM $wpdb->terms ";
$request_o .= " LEFT JOIN $wpdb->term_taxonomy ON $wpdb->term_taxonomy.term_id = $wpdb->terms.term_id  ";
$request_o .= " WHERE  $wpdb->term_taxonomy.taxonomy = 'category' AND $wpdb->term_taxonomy.count != 0 ";
if ($p_array != '') {
    $request_o .= " AND ($wpdb->term_taxonomy.parent not in ($p_array) AND $wpdb->term_taxonomy.term_id not in ($p_array))";
}
if ($s_array != '') {
    $request_o .= " AND ($wpdb->term_taxonomy.parent not in ($s_array) AND $wpdb->term_taxonomy.term_id not in ($s_array))";
}
$request_o .= " ORDER BY term_id asc";
$categorys_o = $wpdb->get_results($request_o);
foreach ($categorys_o as $category) { //调用菜单
    $wp_o_category[] = [
        'cat_name' => $category->name,
        'cat_id' => $category->term_id,
        'cat_slug' => urldecode_deep($category->slug),
        'description' => get_between($category->description, 'src="', '" alt'),
    ];
}
?>

<?php include(TEMPLATEPATH . '/common.php'); ?>
