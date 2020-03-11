<section class="footer" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="300">
    <div class="brand">

        <?php
        $output = '';
        $cooperation_array = [
            'tp5_trademark_1' => 'tp5_trademark_logo_1',
            'tp5_trademark_2' => 'tp5_trademark_logo_2',
            'tp5_trademark_3' => 'tp5_trademark_logo_3',
            'tp5_trademark_4' => 'tp5_trademark_logo_4',
            'tp5_trademark_5' => 'tp5_trademark_logo_5',
            'tp5_trademark_6' => 'tp5_trademark_logo_6',
        ];
        $i = 0;
        foreach ($cooperation_array as $key => $val) {
            if ($i == 0) {
                if (of_get_option($val) == '' || of_get_option($key) == '') {
                    break;
                } else {
                    $img_cache = of_get_option($val);
                    $font_cache = of_get_option($key);
                }
            }
            $output .= '<div>';
            $img = of_get_option($val) == '' ? $img_cache :  of_get_option($val);
            if ($img == '') continue;
            $output .= "<img src='{$img}' alt=''>";
            $font = of_get_option($key) == '' ? $font_cache : of_get_option($key);
            $output .= '<h3>' . $font . '</h3>';
            $output .= '</div>';
            $i ++;
        }
        echo $output;
        ?>
    </div>
    <div class="us">
        <div class="layout">
        <?php
        $output = '';
        $cooperation_array = [
            'tp5_bottom_name_1' => 'tp5_bottom_href_1',
            'tp5_bottom_name_2' => 'tp5_bottom_href_2',
            'tp5_bottom_name_3' => 'tp5_bottom_href_3',
            'tp5_bottom_name_4' => 'tp5_bottom_href_4',
            'tp5_bottom_name_5' => 'tp5_bottom_href_5',
            'tp5_bottom_name_6' => 'tp5_bottom_href_6',
            'tp5_bottom_name_7' => 'tp5_bottom_href_7',
            'tp5_bottom_name_8' => 'tp5_bottom_href_8',
        ];
        foreach ($cooperation_array as $key => $val) {
            $name = of_get_option($key);
            $href = of_get_option($val);
            $output .= "<a href='{$href}'>" . $name . "</a>";
        }
        echo $output;
        ?>
        </div>
    </div>
    <?php
    $output = '';
    $cooperation_array = [
        'tp5_bottom_name_9' => 'tp5_bottom_href_9',
        'tp5_bottom_name_10' => 'tp5_bottom_href_10',
        'tp5_bottom_name_11' => 'tp5_bottom_href_11',
        'tp5_bottom_name_12' => 'tp5_bottom_href_12',
        'tp5_bottom_name_13' => 'tp5_bottom_href_13',
        'tp5_bottom_name_14' => 'tp5_bottom_href_14',
        'tp5_bottom_name_15' => 'tp5_bottom_href_15',
    ];
    $output .= '<p>';
    $i = 0;
    foreach ($cooperation_array as $key => $val) {
        $name = of_get_option($key);
        if ($name == '') break;
        if ($i == 0) {
            $output .= $name;
        } else {
            $output .= ' | ' . $name;
        }
        $i++;
    }
    $output .= '</p>';
    echo $output;
    ?>
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
        page_num = $("#href_page_value").val();
        var link = "<?php echo get_comments_pagenum_link_div() ?>";
        var href = link + 'comment-page-' + page_num + '/#comments';
        window.location.href=href;
    });

</script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/template-five/new.js.html"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/template-five/detail.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/template-five/message.js.html"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/template-five/base.js"></script>
</body>
</html>