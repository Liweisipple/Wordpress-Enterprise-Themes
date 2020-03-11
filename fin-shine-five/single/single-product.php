<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/css/template-five/detail.css">
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/css/common/style-editor.css">

<section class="detail" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="300">
    <div class="info">
        <div class="img">
            <div class="swiper-container gallery-top">
                <div class="swiper-wrapper">
                    <?php $post = get_post($post_ID); ?>
                    <?php $thumbnail_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post_ID), 'thumbnail'); ?>
                    <div class="swiper-slide"><img src="<?php echo $thumbnail_image_url[0] ?>" alt=""></div>
                </div>
            </div>
        </div>
        <div class="new-info editor-content news-content">
            <h3><?php echo $post->post_title; ?></h3>
            <?php
            if(get_the_tag_list()) {
                $tag_arr = get_the_tag_list_div();
                $tag_arr = moveZeroEnd($tag_arr);
                foreach ($tag_arr as $val) {
                    if (strpos($val, '¥') === 0) {
                        echo '<p class="label">'. $val .'</p>';
                    } elseif (is_phone($val)) {
                        echo '<div class="phone-wrap"><img src="../../assets/imgs/template-five/detail/phone.png" alt="">'. $val .'</div>';
                    } else {
                        echo '<span class="sub-label">' . $val . '</span>';
                    }
                }
            }
            ?>

            <?php echo $post->post_content; ?>
        </div>
    </div>
    <div class="bottom">
        <h3><span class="active">产品详情</span></h3>
        <div><?php echo $post->post_excerpt; ?> </div>
    </div>
</section>