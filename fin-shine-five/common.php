<?php
if (!empty($wp_category)) {
    $flag = true;
    foreach ($wp_category as $key => $val) {
        $cat_id = $val['cat_id'];
        $cat_name = $val['cat_name'];
        $cat_slug = $val['cat_slug'];
        $cat_description = $val['description'];
        $output = '';
        if ($flag) {
            $myqueryargs = array(
                'order'          => 'DESC',
                'category__in'   => array($cat_id),
                'posts_per_page' => 5
            );
            $myquery = new WP_Query($myqueryargs);
            $output .= '<section class="hot" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="300">';
            $output .= "<h2>{$cat_name} <span> {$cat_slug}</span></h2>";
            $output .= '<div class="content">';
            $posts = $myquery->posts;
            foreach ($posts as $key_p => $val_p) {
                $thumbnail_image_url = wp_get_attachment_image_src(get_post_thumbnail_id($val_p->ID), 'thumbnail');
                $thumbnail_image_url = empty($thumbnail_image_url) ? '' : $thumbnail_image_url[0];
                $output .= '<div>';
                $output .= "<img src = {$thumbnail_image_url}>";
                $output .= "<h3>$val_p->post_title</h3>";
                $output .= "<p></p>";
                $output .= "<a class='btn' href='{$val_p->guid}'>查看详情</a>";
                $output .= '</div>';
            }

            $output .= '</div>';
            $output .= '</section>';
        } else {
            $myqueryargs = array(
                'order'          => 'DESC',
                'category__in'   => array($cat_id),
                'posts_per_page' => 8
            );
            $myquery = new WP_Query($myqueryargs);
            $output .= '<section class="car" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="300">';
            $output .= "<h2>{$cat_name}<span> {$cat_slug}</span></h2>";
            $output .= '<div class="content">';
            $output .= '<div class="left">';
            $output .= "<img src='{$cat_description}' alt=''>";
            $output .= '</div>';
            $output .= '<div class="right">';
            $posts = $myquery->posts;
            $i = 0;
            foreach ($posts as $key_p => $val_p) {
                $thumbnail_image_url = wp_get_attachment_image_src(get_post_thumbnail_id($val_p->ID), 'thumbnail');
                $thumbnail_image_url = empty($thumbnail_image_url) ? '' : $thumbnail_image_url[0];
                if ($i == 0 || $i == 4) {
                    $output .= '<div>';
                }
                $output .= "<a href='{$val_p->guid}'>";
                $output .= "<img src = {$thumbnail_image_url}>";
                $output .= "<h3>$val_p->post_title</h3>";
                $output .= "<span href='{$val_p->guid}'>查看详情</span>";
                $output .= '</a>';
                if ($i == 4 || $i == 8) {
                    $output .= '</div>';
                }
                $i++;
            }
            $output .= '</div>';
            $output .= '</div>';
            $output .= '</section>';
        }
        $flag = false;
        echo $output;
    }
}
?>


    <section class="image" style="background-image:url(<?php echo of_get_option('tp5_middle_img_url'); ?>)" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="300">
        <h3><?php echo of_get_option('tp5_middle_img_title'); ?></h3>
        <p><?php echo of_get_option('tp5_middle_img_content'); ?></p>
    </section>

<?php
if (!empty($wp_n_category)) {
    foreach ($wp_n_category as $key => $val) {
        $cat_id = $val['cat_id'];
        $cat_name = $val['cat_name'];
        $cat_slug = $val['cat_slug'];
        $cat_description = $val['description'];
        $output = '';
        $myqueryargs = array(
            'order'          => 'DESC',
            'category__in'   => array($cat_id),
            'posts_per_page' => 4
        );
        $myquery = new WP_Query($myqueryargs);
        $output .= '<section class="new" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="300">';
        $output .= "<h2>{$cat_name} <span> {$cat_slug}</span></h2>";
        $output .= '<div class="content">';
        $posts = $myquery->posts;
        foreach ($posts as $key => $val) {
            $thumbnail_image_url = wp_get_attachment_image_src(get_post_thumbnail_id($val->ID), 'thumbnail');
            $thumbnail_image_url = empty($thumbnail_image_url) ? '' : $thumbnail_image_url[0];
            $output .= "<a href='{$val->guid}'>";
            $output .= "<img src = {$thumbnail_image_url}>";
            $output .= "<h3>$val->post_title</h3>";
            $output .= "<p>" . mb_substr($val->post_content, 0, 122) . "</p>";
            $output .= '</a>';
        }

        $output .= '</div>';
        $output .= '</section>';
        echo $output;
    }
}
?>

<?php
if (!empty($wp_o_category)) {
    foreach ($wp_o_category as $key => $val) {
        $cat_id = $val['cat_id'];
        $cat_name = $val['cat_name'];
        $cat_slug = $val['cat_slug'];
        $cat_description = $val['description'];
        $output = '';
        $myqueryargs = array(
            'order'          => 'DESC',
            'category__in'   => array($cat_id),
            'posts_per_page' => 4
        );
        $myquery = new WP_Query($myqueryargs);
        $output .= '<section class="new" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="300">';
        $output .= "<h2>{$cat_name} <span> {$cat_slug}</span></h2>";
        $output .= '<div class="content">';
        $posts = $myquery->posts;
        foreach ($posts as $key => $val) {
            $thumbnail_image_url = wp_get_attachment_image_src(get_post_thumbnail_id($val->ID), 'thumbnail');
            $thumbnail_image_url = empty($thumbnail_image_url) ? '' : $thumbnail_image_url[0];
            $output .= "<a href='{$val->guid}'>";
            $output .= "<img src = {$thumbnail_image_url}>";
            $output .= "<h3>$val->post_title</h3>";
            $output .= "<p>" . mb_substr($val->post_content, 0, 122) . "</p>";
            $output .= '</a>';
        }

        $output .= '</div>';
        $output .= '</section>';
        echo $output;
    }
}
?>



<?php
$output = '';
$cooperation_array = [
    'tp5_cooperative_client_img_1',
    'tp5_cooperative_client_img_2',
    'tp5_cooperative_client_img_3',
    'tp5_cooperative_client_img_4',
    'tp5_cooperative_client_img_5',
    'tp5_cooperative_client_img_6',
    'tp5_cooperative_client_img_7',
    'tp5_cooperative_client_img_8',
    'tp5_cooperative_client_img_9',
    'tp5_cooperative_client_img_10',
];
$output .= '<section class="customer" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="300">';
$output .= '<h2>' . of_get_option('tp5_cooperative_client') . '<span>' . of_get_option('tp5_cooperative_client_other') . '</span></h2>';
$output .= '<div class="content">';
foreach ($cooperation_array as $val) {
    $img = of_get_option($val);
    if ($img == '') continue;
    $output .= '<a href="">';
    $output .= "<img src='{$img}' alt=''>";
    $output .= '</a>';
}
$output .= '</div>';
$output .= '</section>';
echo $output;

?>