<?php /*Template Name:联系我们*/ ?>

<?php get_header(); ?>
    <section class="input"  data-aos="fade-up" data-aos-easing="ease" data-aos-delay="300">
        <p class="tab"><a href="">联系我们</a>>留言板<span><img src="<?php echo get_template_directory_uri(); ?>/assets/imgs/template-four/message/return.png" alt="">取消留言</span></p>
        <div class="input">
            <?php
            $comment_form_args = array(
                'fields'  => apply_filters( 'comment_form_default_fields', array(
                        // 作者名称字段
                        'author' => '<div><span class="text">昵称</span><input id="author" name="author" type="text" value=""></div>',
                        'content' => '<div><span class="text">留言内容</span><input id="comment" name="comment" type="text" value=""><span class="btn" id="submit_message"><input style="width:79px;height:34px;background:#559aee;color: #fff;
;margin: 0 0 0 0;" name="submit" type="submit" id="submit" class="submit" value="发布"></span></div>')
                ),
                'comment_field' => '',
                // 添加评论内容的文本域表单元素
                // 默认的字段，用户未登录时显示的评论字段
                'comment_notes_before' => '',
                'title_reply' => '',

            );
            if (is_user_logged_in()) {
                $comment_form_args['comment_field'] = '<div><span class="text">留言内容</span><input id="comment" name="comment" cols="45" rows="5" class="span8" aria-required="true"><span class="btn" id="submit_message"><input style="width:79px;height:34px;background:#559aee;color: #fff;
;margin: 0 0 0 0;" name="submit" type="submit" id="submit" class="submit" value="发布"></span></div>';
            }
            ?>
            <?php comment_form($comment_form_args); ?>
        </div>
    </section>
    <section class="message" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="300">
        <div class="content">
            <?php comments_template('/comments.php'); ?>
            <?php if ( get_comments_number() > 1 && get_option( 'page_comments' ) ) :  ?>
            <?php endif; ?>
        </div>
        <div id ='href_page' class="more">查看更多</div>
    </section>

<?php get_footer(); ?>