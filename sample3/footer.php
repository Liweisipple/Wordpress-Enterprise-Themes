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
                <span class="call"><i></i><span class="num">400-400-2555</span></span>
                <span class="email"><i></i><span class="txt">@某某官方微博</span></span>
            </p>
        </div>
        <a href="javascript:;" class="about-wx fr">
            <i></i>
            <span class="wx">
                XXX微信公众号
            </span>
        </a>
    </div>
</section>
<section class="footer pr">
    <div class="Copyright layout clearfix">
        <p class="p">Copyright © 2007-2019 | XXXXXXXXX限公司 版权所有 | 隐私政策 </p>
        <span class="span">沪ICP1234556666号-1 | 公网备案12346788899号</span>
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