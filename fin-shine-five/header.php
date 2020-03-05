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

    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/css/template-five/index.css">

    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/css/template-five/message.css">
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/css/template-five/base.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/libs/swiper.min.css">
    <script src="<?php echo get_template_directory_uri(); ?>/assets/libs/swiper.min.js"></script>
</head>
<body>
<section class="top-nav">
    <div class="layout clearfix">
        <a href="javascript:;" class="logo-wrap">
            <span class="logo" style="background-image: url(<?php echo of_get_option('tp5_top_logo_img_url'); ?>)"></span>
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
                    if ($key == 0) {
                        $echo = "<a class = 'navs-item'" . $val;
                        $content = get_between($echo, '/">', '</a>');
                        $left = '<a' . get_between($echo, '<a', '/">') . '/">';
                        echo $left . '<img src=' . get_template_directory_uri() . '/assets/imgs/template-five/img3.png" alt="">' . $content . '</a>' ;
                    } else {
                        echo '<a class = "navs-item"' . $val;
                    }
                }
            ?>
        </div>
        <div class="fr">
            <img src="<?php echo of_get_option('tp5_top_img_fix_phone_logo') ?>" alt="">
            <?php echo of_get_option('tp5_top_img_fix_phone'); ?>
        </div>
    </div>
</section>
<section class="top" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="300">
    <div class="img" style="background-image:url(<?php echo of_get_option('tp5_top_img_url'); ?>)">
        <h3><?php echo of_get_option('tp5_top_img_title'); ?></h3>
        <p><?php echo of_get_option('tp5_top_img_content'); ?></p>
    </div>
</section>




