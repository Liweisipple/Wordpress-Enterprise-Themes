<section class="footer" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="300">
    <div class="center">
        <div class="left">
            <div class="content">
                <div>
                    <h3><?php echo of_get_option('temp4_bottom_big_title_1'); ?></h3>
                    <a><?php echo of_get_option('temp4_bottom_small_title_1'); ?></a>
                    <a><?php echo of_get_option('temp4_bottom_small_title_2'); ?></a>
                    <a><?php echo of_get_option('temp4_bottom_small_title_3'); ?></a>
                </div>
                <div>
                    <h3><?php echo of_get_option('temp4_bottom_big_title_2'); ?></h3>
                    <a><?php echo of_get_option('temp4_bottom_small_title_2_1'); ?></a>
                    <a><?php echo of_get_option('temp4_bottom_small_title_2_2'); ?></a>
                    <a><?php echo of_get_option('temp4_bottom_small_title_2_3'); ?></a>
                </div>
                <div>
                    <h3><?php echo of_get_option('temp4_bottom_big_title_3'); ?></h3>
                    <a><?php echo of_get_option('temp4_bottom_small_title_3_1'); ?></a>
                    <a><?php echo of_get_option('temp4_bottom_small_title_3_2'); ?></a>
                    <a><?php echo of_get_option('temp4_bottom_small_title_3_3'); ?></a>
                </div>
                <div>
                    <h3><?php echo of_get_option('temp4_bottom_big_title_4'); ?></h3>
                    <a><?php echo of_get_option('temp4_bottom_small_title_4_1'); ?></a>
                    <a><?php echo of_get_option('temp4_bottom_small_title_4_2'); ?></a>
                    <a><?php echo of_get_option('temp4_bottom_small_title_4_3'); ?></a>
                </div>
                <div>
                    <h3><?php echo of_get_option('temp4_bottom_big_title_5'); ?></h3>
                    <a><?php echo of_get_option('temp4_bottom_small_title_5_1'); ?></a>
                    <a><?php echo of_get_option('temp4_bottom_small_title_5_2'); ?></a>
                    <a><?php echo of_get_option('temp4_bottom_small_title_5_3'); ?></a>
                </div>
            </div>
            <div class="Copyright">
                <img src="<?php echo of_get_option('temp4_trademark_logo_1') ?>" alt="">
                <div>
                    <p class="p">

                        <?php
                        $output = '';
                        $cooperation_array = [
                            'temp4_bottom_name_1' => 'temp4_bottom_href_1',
                            'temp4_bottom_name_2' => 'temp4_bottom_href_2',
                            'temp4_bottom_name_3' => 'temp4_bottom_href_3',
                            'temp4_bottom_name_4' => 'temp4_bottom_href_4',
                            'temp4_bottom_name_5' => 'temp4_bottom_href_5',
                            'temp4_bottom_name_6' => 'temp4_bottom_href_6',
                            'temp4_bottom_name_7' => 'temp4_bottom_href_7',
                            'temp4_bottom_name_8' => 'temp4_bottom_href_8',
                        ];
                        foreach ($cooperation_array as $key => $val) {
                            $name = of_get_option($key);
                            $href = of_get_option($val);
                            if ($name == false) break;
                            $output .=  "<a href='$href'>" . $name . '</a>' . ' | ';
                        }
                        echo $output;
                        ?>
                    </p>
                </div>
            </div>
        </div>
        <div class="right">
            <div>
                <img src="<?php echo of_get_option('temp4_infomation_logo_1') ?>" alt="">
                <span><?php echo of_get_option('temp4_infomation_1') ?></span>
            </div>
            <div>
                <img src="<?php echo of_get_option('temp4_infomation_logo_2') ?>" alt="">
                <span><?php echo of_get_option('temp4_infomation_2') ?></span>
            </div>
            <div>
                <img src="<?php echo of_get_option('temp4_infomation_logo_3') ?>" alt="">
                <span><?php echo of_get_option('temp4_infomation_3') ?></span>
            </div>
        </div>
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
    $("#href_page").click(function(){
        if (!localStorage['myKey']) {
            localStorage['myKey'] = "<?php echo get_option('comments_per_page'); ?>";
        } else {
            localStorage['myKey'] = localStorage['myKey'] + "<?php echo get_option('comments_per_page'); ?>";
        }
        var myKey = localStorage['myKey'];
        for (var i=1;i<=myKey;i++)
        {
            var div = "#" + 'div-' + i;
            $(div).show();
        }
    });

</script>
<script>
    localStorage.removeItem('myKey');
    localStorage['myKey'] = "<?php echo get_option('comments_per_page'); ?>";
    var myKey = localStorage['myKey'];
    for (var i=1;i<=myKey;i++)
    {
        var div = "#" + 'div-' + i;
        $(div).show();
    }
</script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/template-four/new.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/template-four/detail.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/template-four/message.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/template-four/base.js"></script>
</body>
</html>