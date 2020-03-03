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
                'posts_per_page' => 3
            );
            $myquery = new WP_Query($myqueryargs);
            $posts = $myquery->posts;
            $flag = true;
            $num = 0;
            foreach ($posts as $key_p => $val_p) {
                $num++;
                $section_class = 'car' . $num . '-container pr';
                $div_class = 'car' . $num . ' pa';
                $p_class = 'car' . $num . '-title';
                $a_class_btn = 'car' . $num . '-btn';
                $thumbnail_image_url = wp_get_attachment_image_src(get_post_thumbnail_id($val_p->ID), 'thumbnail');
                $thumbnail_image_url = empty($thumbnail_image_url) ? '' : str_replace('-150x150', '', $thumbnail_image_url[0]);
                $output .= "<section class='$section_class' data-aos='fade-up' data-aos-easing='ease' data-aos-delay='300' style='background-image: url({$thumbnail_image_url})'>";
                $output .= "<div class='$div_class'>";
                $output .= "<p class='$p_class'>$val_p->post_title</p>";
                $output .= "<a href='{$val_p->guid}' class='$a_class_btn'>查看详情</a>";
                $output .= '</div>';
                $output .= '</section>';
                if ($flag == true) {
                    $flag = false;
                } else {
                    $flag = true;
                }
            }
            $i++;
        } else {
            $myqueryargs = array(
                'order'          => 'DESC',
                'category__in'   => array($cat_id),
                'posts_per_page' => 2
            );
            $myquery = new WP_Query($myqueryargs);
            $output .= '<section class="title-container" data-aos="fade-right" data-aos-easing="ease" data-aos-delay="300">';
            $output .= '<div class="title layout">';
            $output .= "<p class='words'>{$cat_name}</p>";
            $output .= '</div>';
            $output .= '</section>';
            $output .= '<section class="advert-container"  data-aos="fade-up" data-aos-easing="ease" data-aos-delay="300">';
            $output .= '<div class="layout clearfix">';
            $posts = $myquery->posts;
            $j = 0;
            foreach ($posts as $key_p => $val_p) {
                $thumbnail_image_url = wp_get_attachment_image_src(get_post_thumbnail_id($val_p->ID), 'thumbnail');
                $thumbnail_image_url = empty($thumbnail_image_url) ? '' : $thumbnail_image_url[0];
                if ($j == 0) {
                    $output .= "<div class='advert-title-L fl' style='background-image:url({$thumbnail_image_url})'>";
                    $output .= '<h3 class="single-line">' . $val_p->post_title . '</h3>';
                    $output .= '<p class="advert-words">' . $val_p->post_title . '</p>';
                    $output .= "<a href='{$val_p->guid}' class='more-btn-l'>了解更多</a>";
                } else {
                    $output .= "<div class='advert-title-R fl' style='background-image:url({$thumbnail_image_url})'>";
                    $output .= '<h3 class="single-line">' . $val_p->post_title . '</h3>';
                    $output .= '<p class="advert-words">' . $val_p->post_title . '</p>';
                    $output .= "<a href='{$val_p->guid}' class='more-btn-r'>了解更多</a>";
                }
                $output .= '</div>';
                $j++;
            }
            $output .= '</div>';
            $output .= '</section>';
        }
        echo $output;
    }
}
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
        $output .= '<section class="title-container" data-aos="fade-right" data-aos-easing="ease" data-aos-delay="300">';
        $output .= '<div class="title layout">';
        $output .= "<p class='words'>{$cat_name}</p>";
        $output .= '</div>';
        $output .= '</section>';
        $output .= '<section class="advert-container"  data-aos="fade-up" data-aos-easing="ease" data-aos-delay="300">';
        $output .= '<div class="layout clearfix">';
        $posts = $myquery->posts;
        $j = 0;
        foreach ($posts as $key_p => $val_p) {
            $thumbnail_image_url = wp_get_attachment_image_src(get_post_thumbnail_id($val_p->ID), 'thumbnail');
            $thumbnail_image_url = empty($thumbnail_image_url) ? '' : $thumbnail_image_url[0];
            if ($j == 0) {
                $output .= "<div class='advert-title-L fl' style='background-image:url($thumbnail_image_url)'>";
                $output .= '<h3 class="single-line">' . $val_p->post_title . '</h3>';
                $output .= '<p class="advert-words">' . $val_p->post_title . '</p>';
                $output .= "<a href='{$val_p->guid}' class='more-btn-l'>了解更多</a>";
            } else {
                $output .= "<div class='advert-title-R fl' style='background-image:url($thumbnail_image_url)'>";
                $output .= '<h3 class="single-line">' . $val_p->post_title . '</h3>';
                $output .= '<p class="advert-words">' . $val_p->post_title . '</p>';
                $output .= "<a href='{$val_p->guid}' class='more-btn-r'>了解更多</a>";
            }
            $output .= '</div>';
            $j++;
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
            'posts_per_page' => 2
        );
        $myquery = new WP_Query($myqueryargs);
        $output .= '<section class="title-container" data-aos="fade-right" data-aos-easing="ease" data-aos-delay="300">';
        $output .= '<div class="title layout">';
        $output .= "<p class='words'>{$cat_name}</p>";
        $output .= '</div>';
        $output .= '</section>';
        $posts = $myquery->posts;
        $num2 = 1;
        $s = 0;
        foreach ($posts as $key_p => $val_p) {
            $num2++;
            $section_class2 = 'advert' . $num2 . '-container';
            $output .= "<section class='$section_class2'  data-aos='fade-up' data-aos-easing='ease' data-aos-delay='300'>";
            $output .= '<div class="clearfix">';
            $thumbnail_image_url = wp_get_attachment_image_src(get_post_thumbnail_id($val_p->ID), 'thumbnail');
            $thumbnail_image_url = empty($thumbnail_image_url) ? '' : $thumbnail_image_url[0];
            if ($s == 0) {
                $div_l_class = 'advert' . $num2 . '-title-L fl';
                $div_l2_class = 'advert' . $num2 . '-words';
                $output .= "<div class='$div_l_class'>";
                $output .= '<h3>' . $val_p->post_title . '</h3>';
                $output .= "<p class='$div_l2_class'>" . mb_substr($val_p->post_excerpt, 0, 68) . '</p>';
                $output .= "<a href='{$val_p->guid}' class='more-btn-l'>了解详情</a>";
                $output .= '</div>';
                $output .= "<div class='advert2-title-R fr'><img src='$thumbnail_image_url'/></div>";
            } else {
                $div_l3_class = 'advert' . $num2 . '-title-r fr';
                $div_l3e_class = 'advert' . $num2 . '-title-l fl';
                $div_l32_class = 'advert' . $num2 . '-words';
                $output .= "<div class='$div_l3e_class'><img src='$thumbnail_image_url'/></div>";
                $output .= "<div class='$div_l3_class'>";
                $output .= '<h3>' . $val_p->post_title . '</h3>';
                $output .= "<p class='$div_l32_class'>" . mb_substr($val_p->post_excerpt, 0, 68) . '</p>';
                $output .= "<a href='{$val_p->guid}' class='more-btn-r'>了解详情</a>";
                $output .= '</div>';
            }

            $output .= '</div>';
            $output .= '</section>';
            $s++;
        }
        echo $output;
    }
}
?>


<section class="advertEnd-container" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="300" style="background-image: url(<?php echo of_get_option('temp3_bottom_img_url'); ?>);">
    <div class="layout clearfix">
        <div class="advertEnd-title-l fl">
            <h3 class="single-line"><?php echo of_get_option('temp3_bottom_img_title'); ?></h3>
            <p class="advert3-words"><?php echo of_get_option('temp3_bottom_img_content'); ?></p>
        </div>
        <a href="javascript:;" class="btn fr">
            <?php echo of_get_option('temp3_bottom_img_content3'); ?>
        </a>
    </div>
</section>


