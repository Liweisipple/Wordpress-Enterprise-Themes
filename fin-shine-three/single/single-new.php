<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/css/template-three/template-three-news/index.css">
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/libs/style-editor.css">
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/libs/blocks.css">
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/libs/colors-dark.css">
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/libs/style.css">
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/css/template-three/template-three-news/base.css">

<section class="news">
    <?php $post = get_post($post_ID);?>
    <div class="layout">
        <h3 class="position" data-aos="fade-right" data-aos-easing="ease" data-aos-delay="300">新闻中心 > 正文</h3>
        <div class="article">
            <span class="title single-line" data-aos="fade-right" data-aos-easing="ease" data-aos-delay="300"><?php echo $post->post_title; ?></span>
            <div class="time single-line" data-aos="fade-right" data-aos-easing="ease" data-aos-delay="300">
                <span class="data"><?php echo $post->post_date ?></span>
<!--                <span>13：00</span>-->
            </div>
            <div data-aos="fade-up" data-aos-easing="ease" data-aos-delay="300" class="new-info aos-init aos-animate">
                <p class="words"><?php echo $post->post_content; ?> </p>
                <div class="navs">
                    <?php
                    $arr = [];
                    $cate_id = $category->term_id;
                    $request = "SELECT object_id FROM $wpdb->term_relationships ";
                    $request .= " WHERE $wpdb->term_relationships.term_taxonomy_id = $cate_id AND $wpdb->term_relationships.object_id != $post_ID";
                    $posts = $wpdb->get_results($request);
                    if (!empty($posts)) {
                        $res = $posts[0];
                        $post_recommend_id = $res->object_id;
                        $post_recommend = get_post($post_recommend_id);
                        $arr['pre'] = $post_recommend;

                        if (count($posts) > 1) {
                            $res = $posts[1];
                            $post_recommend_id = $res->object_id;
                            $post_recommend = get_post($post_recommend_id);
                            $arr['next'] = $post_recommend;
                        }
                    }
                    ?>
                    <a href="<?php echo isset($arr['pre']) ? $arr['pre']->guid : '' ?>" class="previous">
                        <span class="spacing">上一篇</span><?php echo isset($arr['pre']) ? $arr['pre']->post_title : '暂无新文章' ?>
                    </a>
                    <a href="<?php echo isset($arr['next']) ? $arr['next']->guid : '' ?>" class="previous next">
                        <span class="spacing">下一篇</span><?php echo isset($arr['next']) ? $arr['next']->post_title : '暂无新文章' ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>