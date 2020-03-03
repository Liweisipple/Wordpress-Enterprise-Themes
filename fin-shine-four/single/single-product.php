<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/css/template-four/detail.css">
<?php $post = get_post($post_ID); ?>
<?php $thumbnail_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post_ID), 'thumbnail'); ?>

<?php
    $arr = get_attached_media('image', $post->ID);
    $img_arr = [];
    if (!empty($arr)) {
        foreach ($arr as $val) {
            $img_arr[] = $val->guid;
        }
    }
?>


<section class="tag" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="300">
    <h3>
        <?php
        if(get_the_tag_list()) {
            echo get_the_tag_list_div('<span>','</span><span>','</span>');
        }
        ?>
    </h3>
</section>

<section class="info-one" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="300">
    <div class="left">
        <h3><?php echo $post->post_title; ?></h3>
        <p><?php echo $post->post_content; ?></p>
    </div>
    <div class="swiper-container one">
        <div class="swiper-wrapper">
            <?php
                foreach ($img_arr as $val) {
                    echo "<div class='swiper-slide'><img src='$val' alt=''></div>";
                }
            ?>
            <div class="swiper-slide"><img src="<?php echo $thumbnail_image_url[0] ?>" alt=""></div>
        </div>
        <div class="swiper-button-next swiper-button-write"></div>
        <div class="swiper-pagination"></div>
    </div>
</section>
