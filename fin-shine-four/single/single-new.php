<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/css/template-four/new.css">
<section class="info" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="300">
    <?php $post = get_post($post_ID);?>
    <div class="left">

        <div class="top">
            <p class="tab"><a href="">新闻中心</a>>正文</p>
            <h3><?php echo $post->post_title; ?></h3>
            <p class="time"><?php echo $post->post_date ?></p>
        </div>
        <div class="new-info">
            <?php echo $post->post_content; ?>
        </div>

        <div class="tag">
            <span>公告</span>
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
                $output .= '<p class ="title">' . $post_recommend->post_title . '</p>';
                $output .= '<div class="img">';
                $output .= "<img src='$img' alt=''>";
                $output .= '</div>';
                $output .= '<p class ="time">' . $post_recommend->post_date . '</p>';
                $output .= '</a>';
                echo $output;
            }
            ?>

        </div>
    </div>
    <div class="right">
        <div>
            <?php
                $res = get_category_by_slug('news');
            ?>
            <p>热点新闻<a href="<?php echo get_category_link($res->term_id); ?>">进入新闻频道></a></p>
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
                $output .= $post_recommend->post_title;
                $output .= '</a>';
                echo $output;
            }
            ?>
        </div>
</section>