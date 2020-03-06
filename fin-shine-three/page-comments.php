<?php /*Template Name:联系我们*/ ?>
<?php
$comments = get_comments([]);
$p_array = [];
foreach ($comments as $val) {
    $p_array[] = [
        'name' => $val->comment_author,
        'content' => $val->comment_content,
    ];
}
$per_page = get_option('comments_per_page');
if (count($p_array) == 1 || count($p_array) == 2) {
    $round = 1;
} else {
    $round = round(count($p_array) / $per_page);
}
$output = '';
?>

<?php get_header('else'); ?>

    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/css/template-three/template-three-we/index.css">
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/css/template-three/template-three-we/base.css">

    <section class="banner-container swiper-container" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="300">
        <div class="swiper-wrapper">
            <?php
                if ($per_page != 0) {
                    for ($i=0;$i<$round;$i++) {
                        $output = '';
                        $co = 0;
                        $output .= '<div class="swiper-slide">';
                        $output .= '<div class="layout">';
                        $output .= '<div class="slide-content">';

                        foreach ($p_array as $key => $val) {
                            if ($co == $per_page) break;
                            $output .= '<div class="item">';
                            $href = get_template_directory_uri()  . '/assets/imgs/template-three/avatar.png';
                            $output .= "<img src='$href'/>";
                            $output .= '<span class="name single-line">' . $val['name'] . '</span>';
                            $output .= '<p class="multi-line">' . $val['content'] . '</p>';
                            $output .= '</div>';
                            unset($p_array[$key]);
                            $co++;
                        }

                        $output .= '</div>';
                        $output .= '</div>';
                        $output .= '</div>';
                        echo $output;
                    }
                }
            ?>

        </div>
        <div class="swiper-pagination"></div>
        <div class="swiper-button-next" style="background-image: url(<?php echo get_template_directory_uri() . '/assets/imgs/template-three/template-three-we/next.png'; ?>)"></div>
        <div class="swiper-button-prev" style="background-image: url(<?php echo get_template_directory_uri() . '/assets/imgs/template-three/template-three-we/prev.png'; ?>)"></div>
    </section>

    <div class="layout">
        <div class="leave-word-box clearfix"  data-aos="fade-up" data-aos-easing="ease" data-aos-delay="300">
            <?php
            $comment_form_args = array(
                'fields'  => apply_filters( 'comment_form_default_fields', array(
                        // 作者名称字段
                        'author' => '<div class="clearfix"><label class="text">昵称：</label><input id="author" name="author" type="text" value="" placeholder="请输入昵称"></div>',
                        'content' => '<div class="clearfix" style="margin-top:20px"><label class="text">留言内容：</label><textarea id="comment" name="comment" type="text" value="" placeholder="请输入留言内容"></textarea><button id="submit_message"><input style="border:none;background-color:#353235;color: #fff;
            ;margin: 0 0 0 0;" type="submit" id="submit" value="留言" ></button></div>')
                ),
                'comment_field' => '',
                // 添加评论内容的文本域表单元素
                // 默认的字段，用户未登录时显示的评论字段
                'comment_notes_before' => '',
                'title_reply' => '',

            );
            if (is_user_logged_in()) {
                $comment_form_args['comment_field'] = '<div class="clearfix"><label class="text">留言内容：</label><textarea id="comment" name="comment" type="text" value="" placeholder="请输入留言内容"></textarea><button id="submit_message"><input style="border:none;background-color:#353235;color: #fff;
            ;margin: 0 0 0 0;" type="submit" id="submit" value="留言"></button></div>';
            }
            ?>
            <?php comment_form_div($comment_form_args); ?>
        </div>
    </div>


<?php get_footer(); ?>