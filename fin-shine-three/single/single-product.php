<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/css/template-three/template-three-detail/index.css">
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/css/common/style-editor.css">
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/css/template-three/template-three-detail/detail.css">
<?php $post = get_post($post_ID); ?>
<?php $thumbnail_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post_ID), 'thumbnail'); ?>

<section class="configure-info"  data-aos="fade-up" data-aos-easing="ease" data-aos-delay="300">
    <div class="layout clearfix config-box">
        <div class="configure-L fl">
            <img src="<?php echo $thumbnail_image_url[0] ?>"/>
        </div>
        <div class="configure-R fl">
            <h3 class="title single-line"><?php echo $post->post_title; ?></h3>
            <?php
            if(get_the_tag_list()) {
                $tag_arr = get_the_tag_list_div();
                foreach ($tag_arr as $val) {
                    echo '<p class="info single-line">';
                    echo '<span>' . $val . '</span>';
                    echo '</p>';
                }
            }
            ?>
            </p>

        </div>
    </div>
</section>

<section class="content-info"  data-aos="fade-up" data-aos-easing="ease" data-aos-delay="300">
    <div class="layout content-box">
        <div class="content-top clearfix">
            <a href="javascript:;" class="a1 fl active">
                <span>文章主要内容</span>
            </a>
        </div>
        <div class="clearfix content-centre editor-content">
            <div class="content-L fl">
                <?php echo $post->post_content; ?>
            </div>
        </div>
    </div>
</section>
