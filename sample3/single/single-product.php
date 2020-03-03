<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/css/template-three/template-three-detail/index.css">
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/css/template-three/template-three-detail/detail.css">
<?php $post = get_post($post_ID); ?>
<?php $thumbnail_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post_ID), 'thumbnail'); ?>


        <?php
//        if(get_the_tag_list()) {
//            echo get_the_tag_list_div('<span>','</span><span>','</span>');
//        }
        ?>

<section class="configure-info"  data-aos="fade-up" data-aos-easing="ease" data-aos-delay="300">
    <div class="layout clearfix config-box">
        <div class="configure-L fl">
            <img src="<?php echo $thumbnail_image_url[0] ?>"/>
        </div>
        <div class="configure-R fl">
            <h3 class="title single-line"><?php echo $post->post_title; ?></h3>
            <p class="info single-line">
                <span>颜色：高级灰</span>
            </p>

            <a href="javascript:;" class="more">
                更多参数 >
            </a>
        </div>
    </div>
</section>
