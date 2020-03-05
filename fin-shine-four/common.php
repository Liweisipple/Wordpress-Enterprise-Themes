<?php
if (!empty($wp_category)) {
    $i = 0;
    foreach ($wp_category as $key => $val) {
        $cat_id = $val['cat_id'];
        $cat_name = $val['cat_name'];
        $cat_slug = $val['cat_slug'];
        $cat_description = $val['description'];
        $output = '';
        if ($i == 0) {
            $myqueryargs = array(
                'order'          => 'DESC',
                'category__in'   => array($cat_id),
                'posts_per_page' => 4
            );
            $myquery = new WP_Query($myqueryargs);
            $output .= '<section class="jianjie" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="300">';
            $output .= "<h2>{$cat_name}</h2>";
            $output .= '<div class="content">';
            $posts = $myquery->posts;
            foreach ($posts as $key_p => $val_p) {
                $thumbnail_image_url = wp_get_attachment_image_src(get_post_thumbnail_id($val_p->ID), 'thumbnail');
                $thumbnail_image_url = empty($thumbnail_image_url) ? '' : $thumbnail_image_url[0];
                $output .= "<a href='{$val_p->guid}'>";
                $output .= "<img src = {$thumbnail_image_url}>";
                $output .= "<h3>$val_p->post_title</h3>";
                $output .= "<p>" . mb_substr($val_p->post_excerpt, 0, 28, 'utf-8') . "</p>";
                $output .= '</a>';
            }

            $output .= '</div>';
            $output .= '</section>';
            $i++;
        } elseif ($i == 1) {
            $myqueryargs = array(
                'order'          => 'DESC',
                'category__in'   => array($cat_id),
                'posts_per_page' => 3
            );
            $myquery = new WP_Query($myqueryargs);
            $output .= '<section class="scene" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="300">';
            $output .= "<h2>{$cat_name}</h2>";
            $output .= "<p id='content'>{$cat_slug}</p>";
            $posts = $myquery->posts;
            $flag = true;
            foreach ($posts as $key_p => $val_p) {
                $thumbnail_image_url = wp_get_attachment_image_src(get_post_thumbnail_id($val_p->ID), 'thumbnail');
                $thumbnail_image_url = empty($thumbnail_image_url) ? '' : str_replace('-150x150', '', $thumbnail_image_url[0]);
                $output .= '<div>';
                $output .= "<a href='{$val_p->guid}'>";
                if ($flag == true) {
                    $output .= "<div class='Videos' style='background-image: url({$thumbnail_image_url});background-repeat:no-repeat;background-size:cover;'></div>";
                    $output .= '<div>';
                    $output .= '<p class="line"></p>';
                    $output .= "<h4>$val_p->post_title</h4>";
                    $output .= "<p class='content'>" . mb_substr($val_p->post_excerpt, 0, 140) . "</p>";
                    $output .= '<p class="end">' . the_tags_div($val_p->ID) . '</p>';
                    $output .= '</div>';
                } else {
                    $output .= '<div>';
                    $output .= '<p class="line"></p>';
                    $output .= "<h4>$val_p->post_title</h4>";
                    $output .= "<p class='content'>" . mb_substr($val_p->post_excerpt, 0, 140) . "</p>";
                    $output .= '<p class="end">' . the_tags_div($val_p->ID) . '</p>';
                    $output .= '</div>';
                    $output .= "<div class='Videos' style='background-image: url({$thumbnail_image_url});background-repeat:no-repeat;background-size:cover;'></div>";
                }
                $output .= "</a>";
                $output .= '</div>';
                if ($flag == true) {
                    $flag = false;
                } else {
                    $flag = true;
                }
            }
            $output .= '</section>';
            $i++;
        } else {
            $myqueryargs = array(
                'order'          => 'DESC',
                'category__in'   => array($cat_id),
                'posts_per_page' => 3
            );
            $myquery = new WP_Query($myqueryargs);
            $output .= '<section class="partner" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="300">';
            $output .= "<h2>{$cat_name}</h2>";
            $output .= "<span>{$cat_slug}</span>";
            $output .= "<div class = 'content'>";
            $posts = $myquery->posts;
            foreach ($posts as $key_p => $val_p) {
                $thumbnail_image_url = wp_get_attachment_image_src(get_post_thumbnail_id($val_p->ID), 'thumbnail');
                $thumbnail_image_url = empty($thumbnail_image_url) ? '' : $thumbnail_image_url[0];
                $output .= "<a href='{$val_p->guid}'>";
                $output .= "<img src = {$thumbnail_image_url}>";
                $output .= "<h3>$val_p->post_title</h3>";
                $output .= "<p>" . mb_substr($val_p->post_excerpt, 0, 28) . "</p>";
                $output .= '<span>查看详情</span>';
                $output .= '</a>';
            }
            $output .= '</div>';
            $output .= '</section>';
            $i++;
        }
        echo $output;
    }
}
?>

<?php
$output = '';
$cooperation_array = [
    'temp4_cooperative_client_name1' => 'temp4_cooperative_client_img_1',
    'temp4_cooperative_client_name2' => 'temp4_cooperative_client_img_2',
    'temp4_cooperative_client_name3' => 'temp4_cooperative_client_img_3',
    'temp4_cooperative_client_name4' => 'temp4_cooperative_client_img_4',
    'temp4_cooperative_client_name5' => 'temp4_cooperative_client_img_5',
    'temp4_cooperative_client_name6' => 'temp4_cooperative_client_img_6',
    'temp4_cooperative_client_name7' => 'temp4_cooperative_client_img_7',
    'temp4_cooperative_client_name8' => 'temp4_cooperative_client_img_8',
    'temp4_cooperative_client_name9' => 'temp4_cooperative_client_img_9',
    'temp4_cooperative_client_name10' => 'temp4_cooperative_client_img_10',
];
$output .= '<section class="choose" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="300">';
$output .= '<h2>' . of_get_option('temp4_cooperative_client') . '</h2>';
$output .= '<div class="content">';
$i = 1;
foreach ($cooperation_array as $key =>  $val) {
    $img = of_get_option($val);
    $key_herf = 'temp4_cooperative_client_href' . $i;
    $href = of_get_option($key_herf);
    if ($img != '') {
        $output .= "<a href='$href'>";
        $output .= "<img src='{$img}' alt=''>";
        $output .= '<h3>';
        $output .= of_get_option($key);
        $output .= '</h3>';
        $output .= '</a>';
    } else {
        break;
    }
    $i++;
}
$output .= '</div>';
$output .= '</section>';
echo $output;

?>


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
            'posts_per_page' => 2
        );
        $myquery = new WP_Query($myqueryargs);
        $output .= '<section class="roducts" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="300">';
        $output .= "<h2>{$cat_name}</h2>";
        $output .= "<span class='roducts-t'>{$cat_slug}</span>";
        $output .= "<div class = 'content'>";
        $posts = $myquery->posts;
        foreach ($posts as $key => $val) {
            $thumbnail_image_url = wp_get_attachment_image_src(get_post_thumbnail_id($val->ID), 'thumbnail');
            $thumbnail_image_url = empty($thumbnail_image_url) ? '' : $thumbnail_image_url[0];
            $output .= "<a href='{$val->guid}'>";
            $output .= "<img src = {$thumbnail_image_url}>";
            $output .= "<h3>$val->post_title</h3>";
            $output .= '<span class="line"></span>';
            $output .= "<p>" . mb_substr($val->post_excerpt, 0, 77) . "</p>";
            $output .= '<span class="a">查看详情</span>';
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
        $output .= '<section class="roducts" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="300">';
        $output .= "<h2>{$cat_name}</h2>";
        $output .= "<span class='roducts-t'>{$cat_slug}</span>";
        $output .= "<div class = 'content'>";
        $posts = $myquery->posts;
        foreach ($posts as $key => $val) {
            $thumbnail_image_url = wp_get_attachment_image_src(get_post_thumbnail_id($val->ID), 'thumbnail');
            $thumbnail_image_url = empty($thumbnail_image_url) ? '' : $thumbnail_image_url[0];
            $output .= "<a href='{$val->guid}'>";
            $output .= "<img src = {$thumbnail_image_url}>";
            $output .= "<h3>$val->post_title</h3>";
            $output .= '<span class="line"></span>';
            $output .= "<p>" . mb_substr($val->post_excerpt, 0, 77) . "</p>";
            $output .= '<span class="a">查看详情</span>';
            $output .= '</a>';
        }
        $output .= '</div>';
        $output .= '</section>';
        echo $output;
    }
}
?>



<section class="img" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="300" style="background-image: url(<?php echo of_get_option('temp4_bottom_img_url'); ?>);">
    <h2><?php echo of_get_option('temp4_bottom_img_title'); ?></h2>
    <div class="content">
        <div>
            <p><?php echo of_get_option('temp4_bottom_img_content'); ?></p>
        </div>
        <div>
            <p><?php echo of_get_option('temp4_bottom_img_content2'); ?></p>
        </div>
        <div>
            <p><?php echo of_get_option('temp4_bottom_img_content3'); ?></p>
        </div>
    </div>
    <a class="btn">立即咨询</a>
</section>


