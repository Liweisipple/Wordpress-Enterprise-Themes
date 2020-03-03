<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/css/template-five/new.css">
<section class="info">
    <?php $post = get_post($post_ID);?>
    <div class="left">
        <p><?php echo substr($post->post_date, 0, 4); ?></p>
        <p class="time"><?php echo substr($post->post_date, 5, 6); ?></p>
        <p><?php echo substr($post->post_date, 10, 6)?></p>
    </div>
    <div class="mid">
        <div class="top">
            <p class="tab"><a href="">其他分类</a>>正文</p>
            <h3><?php echo $post->post_title; ?></h3>
        </div>
        <div class="new-info">
            <?php echo $post->post_content; ?>
        </div>
        <div class="related">
            <?php
            $cate_id = $category->term_id;
            $request = "SELECT object_id FROM $wpdb->term_relationships ";
            $request .= " WHERE $wpdb->term_relationships.term_taxonomy_id = $cate_id AND $wpdb->term_relationships.object_id != $post_ID";
            $posts = $wpdb->get_results($request);
            if (!empty($posts)) {
                $res = $posts[0];
                $post_recommend_id = $res->object_id;
                $post_recommend = get_post($post_recommend_id);
                $thumbnail_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post_recommend_id), 'thumbnail');
                $img = $thumbnail_image_url[0];
                $output = '';
                $output .= '<h3>相关阅读</h3>';
                $output .= "<a href='$post_recommend->guid'>";
                $output .= "<img src='$img' alt=''>";
                $output .= '<div>';
                $output .= '<p class ="title">' . $post_recommend->post_title . '</p>';
                $output .= '<p class ="time">' . $post_recommend->post_date . '</p>';
                $output .= '</div>';
                $output .= '</a>';
                echo $output;
            }
            ?>

        </div>
    </div>
    <div class="right">
        <div class="roc">
            <p>相关推荐</p>
            <h3>新闻标题</h3>
            <?php
            $cate_id = $category->term_id;
            $request = "SELECT object_id FROM $wpdb->term_relationships ";
            $request .= " WHERE $wpdb->term_relationships.term_taxonomy_id = $cate_id";
            $posts_right = $wpdb->get_results($request);
            foreach ($posts_right as $key => $val) {
                $post_recommend_id = $val->object_id;
                $post_recommend = get_post($post_recommend_id);
                $thumbnail_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post_recommend_id), 'thumbnail');
                $img = $thumbnail_image_url[0];
                $output = '';
                $output .= "<a class='a' href='$post_recommend->guid'>";
                $output .= "<img src='$img' alt=''>";
                $output .= $post_recommend->post_title;
                $output .= '</a>';
                echo $output;
            }
            ?>
        </div>
        <div class="imgs">
            <h3>热门图集</h3>
            <div>
                <?php
                $myqueryargs = array(
                    'post_type' => 'post',
                    'posts_per_page' => 5,//每页显示数量
                    'orderBy' => 'data',
                    'order' => 'DESC',
                    'category__in' => getProductCate()
                );
                $myquery = query_posts($myqueryargs);
                foreach ($myquery as $key => $val) {
                    $thumbnail_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($val->ID), 'thumbnail');
                    $img = $thumbnail_image_url[0];
                    $output = '';
                    $output .= "<a class='a' href='$post_recommend->guid'>";
                    $output .= "<img src='$img' alt=''>";
                    $output .= '<p>' . $post_recommend->post_title . '</p>';
                    $output .= '</a>';
                    echo $output;
                }

                ?>
            </div>
        </div>
    </div>
</section>