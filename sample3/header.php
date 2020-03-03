<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="renderer" content="webkit"/>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="blank">
    <meta name="format-detection" content="telephone=no"/>
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/css/common/reset.css">
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/css/common/base.css">
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/css/common/auto.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/libs/aos.css" />
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/libs/jquery.min.js"></script>

    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/css/template-three/index.css">
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/css/template-three/base.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/libs/swiper.min.css">
    <script src="<?php echo get_template_directory_uri(); ?>/assets/libs/swiper.min.js"></script>
</head>
<body>
<section class="container">
    <section class="top-nav">
    <div class="layout clearfix">
        <a href="javascript:;" class="logo-wrap">
            <span class="logo" style="background-image:url(<?php echo of_get_option('temp3_index_logo'); ?>)"></span>
        </a>
        <div class="main-navs">
            <?php
                $str = strip_tags(wp_nav_menu(
                array(
                    'theme_location' => 'testMenu',
                    'menu_class' => 'nav navbar-nav',
                    'walker' => new test_bootstrap_navwalker,
                    'container' => false,
                    'echo' => false,
                    'items_wrap' => '%3$s',
                    'depth' => 0,
                    )
                ),  '<a>' );

                $nav_array = explode('<a', $str);
                $nav_array_new = [];
                foreach ($nav_array as $val) {
                    if (strlen($val) != 0) {
                        $nav_array_new[] = $val;
                    }
                }
                foreach ($nav_array_new as $key => $val) {
                    $echo = "<a class = 'navs-item'" . $val;
                    $content = get_between($echo, '/">', '</a>');
                    $left = '<a' . get_between($echo, '<a', '/">') . '/">';
                    echo $left . '<span class="text-item">' . $content . '</span>' . '</a>' ;
                }
            ?>
        </div>
    </div>
    </section>
    <?php
    if (is_home()) {
//        echo '<div class="Videos pr">';
//        echo '<video id="video" >';
//        echo '<source src=' . of_get_option('tp3_top_img_url') . ' type="video/mp4">';
//        echo '</vedio>' . '<div class="video-img abs-center"></div>' . '<p class="video-title pa z5">' . of_get_option('tp3_top_img_title') . '</p>';
//        echo '</div>';

    }
    ?>

    <div class="Videos pr">
        <video id="video" >
            <source src="https://img.php.cn/ueditor/php/upload/video/20190327/1553657855333112.mp4"  type="video/mp4">
        </video>
        <div class="video-img abs-center"></div>
        <p class="video-title pa z5">文案文案，文案文案</p>
    </div>
</section>




