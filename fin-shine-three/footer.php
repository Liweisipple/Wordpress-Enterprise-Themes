<section class="about-container pr">
    <div class="layout clearfix">
        <div class="about-nav fl">
            <div class="main-navs clearfix">
                <?php
                $arr = [
                    'temp3_bottom_big_title_1',
                    'temp3_bottom_big_title_2',
                    'temp3_bottom_big_title_3',
                    'temp3_bottom_big_title_4',
                    'temp3_bottom_big_title_5',
                    'temp3_bottom_big_title_6',
                ];
                foreach ($arr as $val) {
                    $output = '';
                    $output .= '<a href="javascript:;" class="navs-item active">';
                    $output .= '<span class="text-item">' . of_get_option($val) . '</span>';
                    $output .= '</a>';
                    echo $output;
                }
                ?>
            </div>
            <p class="Contact">
                <span class="call"><i></i><span class="num"><?php echo of_get_option('temp3_infomation_bo_telephone'); ?></span></span>
                <span class="email"><i></i><span class="txt"><?php echo of_get_option('temp3_infomation_bo_weibo'); ?></span></span>
            </p>
        </div>
        <a href="javascript:;" class="about-wx fr">
            <i style="background-image: url(<?php echo of_get_option('temp3_infomation_wechat_logo'); ?>)"></i>
            <span class="wx">
                <?php echo of_get_option('temp3_infomation_wechat'); ?>
            </span>
        </a>
    </div>
</section>
<section class="footer pr">
    <div class="Copyright layout clearfix">
        <?php
        $output = '';
        $cooperation_array = [
            'temp3_bottom_name_1' => 'temp3_bottom_href_1',
            'temp3_bottom_name_2' => 'temp3_bottom_href_2',
            'temp3_bottom_name_3' => 'temp3_bottom_href_3',
            'temp3_bottom_name_4' => 'temp3_bottom_href_4',
            'temp3_bottom_name_5' => 'temp3_bottom_href_5',
            'temp3_bottom_name_6' => 'temp3_bottom_href_6',
            'temp3_bottom_name_7' => 'temp3_bottom_href_7',
            'temp3_bottom_name_8' => 'temp3_bottom_href_8',
        ];
        $output .= '<p class="p">';
        foreach ($cooperation_array as $key => $val) {
            $name = of_get_option($key);
            $href = of_get_option($val);
            if ($name == false) break;
            $output .= "<a href='$href'>" . $name. '</a>' . ' | ';
        }
        $output .= '</p>';
        echo $output;
        ?>
    </div>
</section>


<script src="<?php echo get_template_directory_uri(); ?>/assets/libs/aos.js"></script>
<script>
    AOS.init({
        easing: 'ease-out-back',
        duration: 1000
    });
</script>
<script>
    $("#search_span").click(function(){
        $("#searchform").submit();
    });

</script>
<script>
   

</script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/template-three/new.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/template-three/detail.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/template-three/message.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/template-three/base.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/template-three/index.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/template-three/we.js"></script>
</body>
</html>