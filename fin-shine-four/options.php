<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 */
//function optionsframework_option_name() {
//	// Change this to use your theme slug
//	return 'options-framework-theme';
//}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 * If you are making your theme translatable, you should replace 'theme-textdomain'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
 */

function optionsframework_options() {

    $options[] = array(
        'name' => __( '模版4首页logo设置', 'theme-textdomain' ),
        'type' => 'heading'
    );

    $options[] = array(
        'name' => __( '模版4首页logo', 'theme-textdomain' ),        'desc' => __( '模版4首页logo', 'theme-textdomain' ),        'id' => 'temp4_index_logo',        'std' => '',        'class' => '',        'placeholder' => '',        'type' => 'upload'
    );

    $options[] = array(
        'name' => __( '模版4首页电话设置', 'theme-textdomain' ),
        'type' => 'heading'
    );

    $options[] = array(
        'name' => __( '模版4首页电话', 'theme-textdomain' ),        'desc' => __( '模版4首页电话', 'theme-textdomain' ),        'id' => 'temp4_index_telephone',        'placeholder' => '',        'std' => '',        'class' => 'mini',        'type' => 'text'
    );

    $options[] = array(
        'name' => __( '模版4首页顶部图片设置', 'theme-textdomain' ),
        'type' => 'heading'
    );
    $options[] = array(
        'name' => __( '首页顶部图片标题', 'theme-textdomain' ),        'desc' => __( '首页顶部图片标题', 'theme-textdomain' ),        'id' => 'tp4_top_img_title',        'placeholder' => '',        'std' => '',        'class' => 'mini',        'type' => 'text'
    );
    $options[] = array(
        'name' => __( '首页顶部图片内容', 'theme-textdomain' ),        'desc' => __( '首页顶部图片内容', 'theme-textdomain' ),        'id' => 'tp4_top_img_content',        'std' => '',        'class' => '',        'placeholder' => '',        'type' => 'text'
    );
    $options[] = array(
        'name' => __( '首页顶部图片', 'theme-textdomain' ),        'desc' => __( '首页顶部图片', 'theme-textdomain' ),        'id' => 'tp4_top_img_url',        'std' => '',        'class' => '',        'placeholder' => '',        'type' => 'upload'
    );

    
    $options[] = array(
        'name' => __( '模版4首页底部图片设置', 'theme-textdomain' ),
        'type' => 'heading'
    );

    $options[] = array(
        'name' => __( '首页底部图片标题', 'theme-textdomain' ),        'desc' => __( '首页底部图片标题', 'theme-textdomain' ),        'id' => 'temp4_bottom_img_title',        'placeholder' => '',        'std' => '',        'class' => 'mini',        'type' => 'text'
    );
    $options[] = array(
        'name' => __( '首页底部图片内容', 'theme-textdomain' ),        'desc' => __( '首页底部图片内容', 'theme-textdomain' ),        'id' => 'temp4_bottom_img_content',        'std' => '',        'class' => '',        'placeholder' => '',        'type' => 'text'
    );
    $options[] = array(
        'name' => __( '首页底部图片内容2', 'theme-textdomain' ),        'desc' => __( '首页底部图片内容2', 'theme-textdomain' ),        'id' => 'temp4_bottom_img_content2',        'std' => '',        'class' => '',        'placeholder' => '',        'type' => 'text'
    );
    $options[] = array(
        'name' => __( '首页底部图片内容3', 'theme-textdomain' ),        'desc' => __( '首页底部图片内容3', 'theme-textdomain' ),        'id' => 'temp4_bottom_img_content3',        'std' => '',        'class' => '',        'placeholder' => '',        'type' => 'text'
    );
    $options[] = array(
        'name' => __( '首页底部图片', 'theme-textdomain' ),        'desc' => __( '首页底部图片', 'theme-textdomain' ),        'id' => 'temp4_bottom_img_url',        'std' => '',        'class' => '',        'placeholder' => '',        'type' => 'upload'
    );

    $options[] = array(
        'name' => __( '模版4合作客户设置', 'theme-textdomain' ),
        'type' => 'heading'
    );

    $options[] = array(
        'name' => __( '合作客户名称', 'theme-textdomain' ),        'desc' => __( '合作客户名称', 'theme-textdomain' ),        'id' => 'temp4_cooperative_client',        'placeholder' => '',        'std' => '',        'class' => 'mini',        'type' => 'text'
    );
    $options[] = array(
        'name' => __( '合作客户别名', 'theme-textdomain' ),        'desc' => __( '合作客户别名', 'theme-textdomain' ),        'id' => 'temp4_cooperative_client_other',        'placeholder' => '',        'std' => '',        'class' => 'mini',        'type' => 'text'
    );
    $options[] = array(
        'name' => __( '合作客户logo1', 'theme-textdomain' ),        'desc' => __( '合作客户logo1', 'theme-textdomain' ),        'id' => 'temp4_cooperative_client_img_1',        'std' => '',        'class' => '',        'placeholder' => '',        'type' => 'upload'
    );
    $options[] = array(
        'name' => __( '合作客户链接1', 'theme-textdomain' ),        'desc' => __( '合作客户链接1', 'theme-textdomain' ),        'id' => 'temp4_cooperative_client_href1',        'placeholder' => '',        'std' => '',        'class' => 'mini',        'type' => 'text'
    );
    $options[] = array(
        'name' => __( '合作客户名称1', 'theme-textdomain' ),        'desc' => __( '合作客户名称1', 'theme-textdomain' ),        'id' => 'temp4_cooperative_client_name1',        'placeholder' => '',        'std' => '',        'class' => 'mini',        'type' => 'text'
    );
    $options[] = array(
        'name' => __( '合作客户logo2', 'theme-textdomain' ),        'desc' => __( '合作客户logo2', 'theme-textdomain' ),        'id' => 'temp4_cooperative_client_img_2',        'std' => '',        'class' => '',        'placeholder' => '',        'type' => 'upload'
    );
    $options[] = array(
        'name' => __( '合作客户链接2', 'theme-textdomain' ),        'desc' => __( '合作客户链接2', 'theme-textdomain' ),        'id' => 'temp4_cooperative_client_href2',        'placeholder' => '',        'std' => '',        'class' => 'mini',        'type' => 'text'
    );
    $options[] = array(
        'name' => __( '合作客户名称2', 'theme-textdomain' ),        'desc' => __( '合作客户名称2', 'theme-textdomain' ),        'id' => 'temp4_cooperative_client_name2',        'placeholder' => '',        'std' => '',        'class' => 'mini',        'type' => 'text'
    );
    $options[] = array(
        'name' => __( '合作客户logo3', 'theme-textdomain' ),        'desc' => __( '合作客户logo3', 'theme-textdomain' ),        'id' => 'temp4_cooperative_client_img_3',        'std' => '',        'class' => '',        'placeholder' => '',        'type' => 'upload'
    );
    $options[] = array(
        'name' => __( '合作客户链接3', 'theme-textdomain' ),        'desc' => __( '合作客户链接3', 'theme-textdomain' ),        'id' => 'temp4_cooperative_client_href3',        'placeholder' => '',        'std' => '',        'class' => 'mini',        'type' => 'text'
    );
    $options[] = array(
        'name' => __( '合作客户名称3', 'theme-textdomain' ),        'desc' => __( '合作客户名称3', 'theme-textdomain' ),        'id' => 'temp4_cooperative_client_name3',        'placeholder' => '',        'std' => '',        'class' => 'mini',        'type' => 'text'
    );
    $options[] = array(
        'name' => __( '合作客户logo4', 'theme-textdomain' ),        'desc' => __( '合作客户logo4', 'theme-textdomain' ),        'id' => 'temp4_cooperative_client_img_4',        'std' => '',        'class' => '',        'placeholder' => '',        'type' => 'upload'
    );
    $options[] = array(
        'name' => __( '合作客户链接4', 'theme-textdomain' ),        'desc' => __( '合作客户链接4', 'theme-textdomain' ),        'id' => 'temp4_cooperative_client_href4',        'placeholder' => '',        'std' => '',        'class' => 'mini',        'type' => 'text'
    );
    $options[] = array(
        'name' => __( '合作客户名称4', 'theme-textdomain' ),        'desc' => __( '合作客户名称', 'theme-textdomain' ),        'id' => 'temp4_cooperative_client_name4',        'placeholder' => '',        'std' => '',        'class' => 'mini',        'type' => 'text'
    );
    $options[] = array(
        'name' => __( '合作客户logo5', 'theme-textdomain' ),        'desc' => __( '合作客户logo5', 'theme-textdomain' ),        'id' => 'temp4_cooperative_client_img_5',        'std' => '',        'class' => '',        'placeholder' => '',        'type' => 'upload'
    );
    $options[] = array(
        'name' => __( '合作客户链接5', 'theme-textdomain' ),        'desc' => __( '合作客户链接5', 'theme-textdomain' ),        'id' => 'temp4_cooperative_client_href5',        'placeholder' => '',        'std' => '',        'class' => 'mini',        'type' => 'text'
    );
    $options[] = array(
        'name' => __( '合作客户名称5', 'theme-textdomain' ),        'desc' => __( '合作客户名称5', 'theme-textdomain' ),        'id' => 'temp4_cooperative_client_name5',        'placeholder' => '',        'std' => '',        'class' => 'mini',        'type' => 'text'
    );
    $options[] = array(
        'name' => __( '合作客户logo6', 'theme-textdomain' ),        'desc' => __( '合作客户logo6', 'theme-textdomain' ),        'id' => 'temp4_cooperative_client_img_6',        'std' => '',        'class' => '',        'placeholder' => '',        'type' => 'upload'
    );
    $options[] = array(
        'name' => __( '合作客户链接6', 'theme-textdomain' ),        'desc' => __( '合作客户链接6', 'theme-textdomain' ),        'id' => 'temp4_cooperative_client_href6',        'placeholder' => '',        'std' => '',        'class' => 'mini',        'type' => 'text'
    );
    $options[] = array(
        'name' => __( '合作客户名称6', 'theme-textdomain' ),        'desc' => __( '合作客户名称6', 'theme-textdomain' ),        'id' => 'temp4_cooperative_client_name6',        'placeholder' => '',        'std' => '',        'class' => 'mini',        'type' => 'text'
    );
    $options[] = array(
        'name' => __( '合作客户logo7', 'theme-textdomain' ),        'desc' => __( '合作客户logo7', 'theme-textdomain' ),        'id' => 'temp4_cooperative_client_img_7',        'std' => '',        'class' => '',        'placeholder' => '',        'type' => 'upload'
    );
    $options[] = array(
        'name' => __( '合作客户链接7', 'theme-textdomain' ),        'desc' => __( '合作客户链接7', 'theme-textdomain' ),        'id' => 'temp4_cooperative_client_href7',        'placeholder' => '',        'std' => '',        'class' => 'mini',        'type' => 'text'
    );
    $options[] = array(
        'name' => __( '合作客户名称7', 'theme-textdomain' ),        'desc' => __( '合作客户名称7', 'theme-textdomain' ),        'id' => 'temp4_cooperative_client_name7',        'placeholder' => '',        'std' => '',        'class' => 'mini',        'type' => 'text'
    );
    $options[] = array(
        'name' => __( '合作客户logo8', 'theme-textdomain' ),        'desc' => __( '合作客户logo8', 'theme-textdomain' ),        'id' => 'temp4_cooperative_client_img_8',        'std' => '',        'class' => '',        'placeholder' => '',        'type' => 'upload'
    );
    $options[] = array(
        'name' => __( '合作客户链接8', 'theme-textdomain' ),        'desc' => __( '合作客户链接8', 'theme-textdomain' ),        'id' => 'temp4_cooperative_client_href8',        'placeholder' => '',        'std' => '',        'class' => 'mini',        'type' => 'text'
    );
    $options[] = array(
        'name' => __( '合作客户名称8', 'theme-textdomain' ),        'desc' => __( '合作客户名称8', 'theme-textdomain' ),        'id' => 'temp4_cooperative_client_name8',        'placeholder' => '',        'std' => '',        'class' => 'mini',        'type' => 'text'
    );
    $options[] = array(
        'name' => __( '合作客户logo9', 'theme-textdomain' ),        'desc' => __( '合作客户logo9', 'theme-textdomain' ),        'id' => 'temp4_cooperative_client_img_9',        'std' => '',        'class' => '',        'placeholder' => '',        'type' => 'upload'
    );
    $options[] = array(
        'name' => __( '合作客户链接9', 'theme-textdomain' ),        'desc' => __( '合作客户链接9', 'theme-textdomain' ),        'id' => 'temp4_cooperative_client_href9',        'placeholder' => '',        'std' => '',        'class' => 'mini',        'type' => 'text'
    );
    $options[] = array(
        'name' => __( '合作客户名称9', 'theme-textdomain' ),        'desc' => __( '合作客户名称9', 'theme-textdomain' ),        'id' => 'temp4_cooperative_client_name9',        'placeholder' => '',        'std' => '',        'class' => 'mini',        'type' => 'text'
    );
    $options[] = array(
        'name' => __( '合作客户logo10', 'theme-textdomain' ),        'desc' => __( '合作客户logo10', 'theme-textdomain' ),        'id' => 'temp4_cooperative_client_img_10',        'std' => '',        'class' => '',        'placeholder' => '',        'type' => 'upload'
    );
    $options[] = array(
        'name' => __( '合作客户链接10', 'theme-textdomain' ),        'desc' => __( '合作客户链接10', 'theme-textdomain' ),        'id' => 'temp4_cooperative_client_href10',        'placeholder' => '',        'std' => '',        'class' => 'mini',        'type' => 'text'
    );
    $options[] = array(
        'name' => __( '合作客户名称10', 'theme-textdomain' ),        'desc' => __( '合作客户名称10', 'theme-textdomain' ),        'id' => 'temp4_cooperative_client_name10',        'placeholder' => '',        'std' => '',        'class' => 'mini',        'type' => 'text'
    );



    $options[] = array(
        'name' => __( '模版4底部商标设置', 'theme-textdomain' ),
        'type' => 'heading'
    );

    $options[] = array(
        'name' => __( '商标1名称', 'theme-textdomain' ),        'desc' => __( '商标1名称', 'theme-textdomain' ),        'id' => 'temp4_trademark_1',        'placeholder' => '',        'std' => '',        'class' => 'mini',        'type' => 'text'
    );
    $options[] = array(
        'name' => __( '商标1logo', 'theme-textdomain' ),        'desc' => __( '商标1logo', 'theme-textdomain' ),        'id' => 'temp4_trademark_logo_1',        'std' => '',        'class' => '',        'placeholder' => '',        'type' => 'upload'
    );

    $options[] = array(
        'name' => __( '模版4底部标题设置', 'theme-textdomain' ),
        'type' => 'heading'
    );
    $options[] = array(
        'name' => __( '大标题1', 'theme-textdomain' ),        'desc' => __( '大标题1', 'theme-textdomain' ),        'id' => 'temp4_bottom_big_title_1',        'placeholder' => '',        'std' => '',        'class' => 'mini',        'type' => 'text'
    );
    $options[] = array(
        'name' => __( '小标题1', 'theme-textdomain' ),        'desc' => __( '小标题1', 'theme-textdomain' ),        'id' => 'temp4_bottom_small_title_1',        'std' => '',        'class' => '',        'placeholder' => '',        'type' => 'text'
    );
    $options[] = array(
        'name' => __( '小标题2', 'theme-textdomain' ),        'desc' => __( '小标题2', 'theme-textdomain' ),        'id' => 'temp4_bottom_small_title_2',        'std' => '',        'class' => '',        'placeholder' => '',        'type' => 'text'
    );
    $options[] = array(
        'name' => __( '小标题3', 'theme-textdomain' ),        'desc' => __( '小标题3', 'theme-textdomain' ),        'id' => 'temp4_bottom_small_title_3',        'std' => '',        'class' => '',        'placeholder' => '',        'type' => 'text'
    );

    $options[] = array(
        'name' => __( '大标题2', 'theme-textdomain' ),        'desc' => __( '大标题2', 'theme-textdomain' ),        'id' => 'temp4_bottom_big_title_2',        'placeholder' => '',        'std' => '',        'class' => 'mini',        'type' => 'text'
    );
    $options[] = array(
        'name' => __( '小标题1', 'theme-textdomain' ),        'desc' => __( '小标题1', 'theme-textdomain' ),        'id' => 'temp4_bottom_small_title_2_1',        'std' => '',        'class' => '',        'placeholder' => '',        'type' => 'text'
    );
    $options[] = array(
        'name' => __( '小标题2', 'theme-textdomain' ),        'desc' => __( '小标题2', 'theme-textdomain' ),        'id' => 'temp4_bottom_small_title_2_2',        'std' => '',        'class' => '',        'placeholder' => '',        'type' => 'text'
    );
    $options[] = array(
        'name' => __( '小标题3', 'theme-textdomain' ),        'desc' => __( '小标题3', 'theme-textdomain' ),        'id' => 'temp4_bottom_small_title_2_3',        'std' => '',        'class' => '',        'placeholder' => '',        'type' => 'text'
    );

    $options[] = array(
        'name' => __( '大标题3', 'theme-textdomain' ),        'desc' => __( '大标题3', 'theme-textdomain' ),        'id' => 'temp4_bottom_big_title_3',        'placeholder' => '',        'std' => '',        'class' => 'mini',        'type' => 'text'
    );
    $options[] = array(
        'name' => __( '小标题1', 'theme-textdomain' ),        'desc' => __( '小标题1', 'theme-textdomain' ),        'id' => 'temp4_bottom_small_title_3_1',        'std' => '',        'class' => '',        'placeholder' => '',        'type' => 'text'
    );
    $options[] = array(
        'name' => __( '小标题2', 'theme-textdomain' ),        'desc' => __( '小标题2', 'theme-textdomain' ),        'id' => 'temp4_bottom_small_title_3_2',        'std' => '',        'class' => '',        'placeholder' => '',        'type' => 'text'
    );
    $options[] = array(
        'name' => __( '小标题3', 'theme-textdomain' ),        'desc' => __( '小标题3', 'theme-textdomain' ),        'id' => 'temp4_bottom_small_title_3_3',        'std' => '',        'class' => '',        'placeholder' => '',        'type' => 'text'
    );

    $options[] = array(
        'name' => __( '大标题4', 'theme-textdomain' ),        'desc' => __( '大标题4', 'theme-textdomain' ),        'id' => 'temp4_bottom_big_title_4',        'placeholder' => '',        'std' => '',        'class' => 'mini',        'type' => 'text'
    );
    $options[] = array(
        'name' => __( '小标题1', 'theme-textdomain' ),        'desc' => __( '小标题1', 'theme-textdomain' ),        'id' => 'temp4_bottom_small_title_4_1',        'std' => '',        'class' => '',        'placeholder' => '',        'type' => 'text'
    );
    $options[] = array(
        'name' => __( '小标题2', 'theme-textdomain' ),        'desc' => __( '小标题2', 'theme-textdomain' ),        'id' => 'temp4_bottom_small_title_4_2',        'std' => '',        'class' => '',        'placeholder' => '',        'type' => 'text'
    );
    $options[] = array(
        'name' => __( '小标题3', 'theme-textdomain' ),        'desc' => __( '小标题3', 'theme-textdomain' ),        'id' => 'temp4_bottom_small_title_4_3',        'std' => '',        'class' => '',        'placeholder' => '',        'type' => 'text'
    );

    $options[] = array(
        'name' => __( '大标题5', 'theme-textdomain' ),        'desc' => __( '大标题5', 'theme-textdomain' ),        'id' => 'temp4_bottom_big_title_5',        'placeholder' => '',        'std' => '',        'class' => 'mini',        'type' => 'text'
    );
    $options[] = array(
        'name' => __( '小标题1', 'theme-textdomain' ),        'desc' => __( '小标题1', 'theme-textdomain' ),        'id' => 'temp4_bottom_small_title_5_1',        'std' => '',        'class' => '',        'placeholder' => '',        'type' => 'text'
    );
    $options[] = array(
        'name' => __( '小标题2', 'theme-textdomain' ),        'desc' => __( '小标题2', 'theme-textdomain' ),        'id' => 'temp4_bottom_small_title_5_2',        'std' => '',        'class' => '',        'placeholder' => '',        'type' => 'text'
    );
    $options[] = array(
        'name' => __( '小标题3', 'theme-textdomain' ),        'desc' => __( '小标题3', 'theme-textdomain' ),        'id' => 'temp4_bottom_small_title_5_3',        'std' => '',        'class' => '',        'placeholder' => '',        'type' => 'text'
    );


    $options[] = array(
        'name' => __( '模版4底部链接设置', 'theme-textdomain' ),
        'type' => 'heading'
    );

    $options[] = array(
        'name' => __( '链接1名称', 'theme-textdomain' ),        'desc' => __( '链接1名称', 'theme-textdomain' ),        'id' => 'temp4_bottom_name_1',        'placeholder' => '',        'std' => '',        'class' => 'mini',        'type' => 'text'
    );
    $options[] = array(
        'name' => __( '链接1地址', 'theme-textdomain' ),        'desc' => __( '链接1地址', 'theme-textdomain' ),        'id' => 'temp4_bottom_href_1',        'std' => '',        'class' => '',        'placeholder' => '',        'type' => 'text'
    );
    $options[] = array(
        'name' => __( '链接2名称', 'theme-textdomain' ),        'desc' => __( '链接2名称', 'theme-textdomain' ),        'id' => 'temp4_bottom_name_2',        'placeholder' => '',        'std' => '',        'class' => 'mini',        'type' => 'text'
    );
    $options[] = array(
        'name' => __( '链接2地址', 'theme-textdomain' ),        'desc' => __( '链接2地址', 'theme-textdomain' ),        'id' => 'temp4_bottom_href_2',        'std' => '',        'class' => '',        'placeholder' => '',        'type' => 'text'
    );
    $options[] = array(
        'name' => __( '链接3名称', 'theme-textdomain' ),        'desc' => __( '链接3名称', 'theme-textdomain' ),        'id' => 'temp4_bottom_name_3',        'placeholder' => '',        'std' => '',        'class' => 'mini',        'type' => 'text'
    );
    $options[] = array(
        'name' => __( '链接3地址', 'theme-textdomain' ),        'desc' => __( '链接3地址', 'theme-textdomain' ),        'id' => 'temp4_bottom_href_3',        'std' => '',        'class' => '',        'placeholder' => '',        'type' => 'text'
    );
    $options[] = array(
        'name' => __( '链接4名称', 'theme-textdomain' ),        'desc' => __( '链接4名称', 'theme-textdomain' ),        'id' => 'temp4_bottom_name_4',        'placeholder' => '',        'std' => '',        'class' => 'mini',        'type' => 'text'
    );
    $options[] = array(
        'name' => __( '链接4地址', 'theme-textdomain' ),        'desc' => __( '链接4地址', 'theme-textdomain' ),        'id' => 'temp4_bottom_href_4',        'std' => '',        'class' => '',        'placeholder' => '',        'type' => 'text'
    );
    $options[] = array(
        'name' => __( '链接5名称', 'theme-textdomain' ),        'desc' => __( '链接5名称', 'theme-textdomain' ),        'id' => 'temp4_bottom_name_5',        'placeholder' => '',        'std' => '',        'class' => 'mini',        'type' => 'text'
    );
    $options[] = array(
        'name' => __( '链接5地址', 'theme-textdomain' ),        'desc' => __( '链接5地址', 'theme-textdomain' ),        'id' => 'temp4_bottom_href_5',        'std' => '',        'class' => '',        'placeholder' => '',        'type' => 'text'
    );
    $options[] = array(
        'name' => __( '链接6名称', 'theme-textdomain' ),        'desc' => __( '链接6名称', 'theme-textdomain' ),        'id' => 'temp4_bottom_name_6',        'placeholder' => '',        'std' => '',        'class' => 'mini',        'type' => 'text'
    );
    $options[] = array(
        'name' => __( '链接6地址', 'theme-textdomain' ),        'desc' => __( '链接6地址', 'theme-textdomain' ),        'id' => 'temp4_bottom_href_6',        'std' => '',        'class' => '',        'placeholder' => '',        'type' => 'text'
    );
    $options[] = array(
        'name' => __( '链接7名称', 'theme-textdomain' ),        'desc' => __( '链接7名称', 'theme-textdomain' ),        'id' => 'temp4_bottom_name_7',        'placeholder' => '',        'std' => '',        'class' => 'mini',        'type' => 'text'
    );
    $options[] = array(
        'name' => __( '链接7地址', 'theme-textdomain' ),        'desc' => __( '链接7地址', 'theme-textdomain' ),        'id' => 'temp4_bottom_href_7',        'std' => '',        'class' => '',        'placeholder' => '',        'type' => 'text'
    );
    $options[] = array(
        'name' => __( '链接8名称', 'theme-textdomain' ),        'desc' => __( '链接8名称', 'theme-textdomain' ),        'id' => 'temp4_bottom_name_8',        'placeholder' => '',        'std' => '',        'class' => 'mini',        'type' => 'text'
    );
    $options[] = array(
        'name' => __( '链接8地址', 'theme-textdomain' ),        'desc' => __( '链接8地址', 'theme-textdomain' ),        'id' => 'temp4_bottom_href_8',        'std' => '',        'class' => '',        'placeholder' => '',        'type' => 'text'
    );
    $options[] = array(
        'name' => __( '链接9名称', 'theme-textdomain' ),        'desc' => __( '链接9名称', 'theme-textdomain' ),        'id' => 'temp4_bottom_name_9',        'placeholder' => '',        'std' => '',        'class' => 'mini',        'type' => 'text'
    );
    $options[] = array(
        'name' => __( '链接9地址', 'theme-textdomain' ),        'desc' => __( '链接9地址', 'theme-textdomain' ),        'id' => 'temp4_bottom_href_9',        'std' => '',        'class' => '',        'placeholder' => '',        'type' => 'text'
    );
    $options[] = array(
        'name' => __( '链接10名称', 'theme-textdomain' ),        'desc' => __( '链接10名称', 'theme-textdomain' ),        'id' => 'temp4_bottom_name_10',        'placeholder' => '',        'std' => '',        'class' => 'mini',        'type' => 'text'
    );
    $options[] = array(
        'name' => __( '链接10地址', 'theme-textdomain' ),        'desc' => __( '链接10地址', 'theme-textdomain' ),        'id' => 'temp4_bottom_href_10',        'std' => '',        'class' => '',        'placeholder' => '',        'type' => 'text'
    );

    $options[] = array(
        'name' => __( '模版4底部右侧信息填写', 'theme-textdomain' ),
        'type' => 'heading'
    );
    $options[] = array(
        'name' => __( '信息1名称', 'theme-textdomain' ),        'desc' => __( '商标1名称', 'theme-textdomain' ),        'id' => 'temp4_infomation_1',        'placeholder' => '',        'std' => '',        'class' => 'mini',        'type' => 'text'
    );
    $options[] = array(
        'name' => __( '信息1logo', 'theme-textdomain' ),        'desc' => __( '商标1logo', 'theme-textdomain' ),        'id' => 'temp4_infomation_logo_1',        'std' => '',        'class' => '',        'placeholder' => '',        'type' => 'upload'
    );
    $options[] = array(
        'name' => __( '信息2名称', 'theme-textdomain' ),        'desc' => __( '商标2名称', 'theme-textdomain' ),        'id' => 'temp4_infomation_2',        'placeholder' => '',        'std' => '',        'class' => 'mini',        'type' => 'text'
    );
    $options[] = array(
        'name' => __( '信息2logo', 'theme-textdomain' ),        'desc' => __( '商标2logo', 'theme-textdomain' ),        'id' => 'temp4_infomation_logo_2',        'std' => '',        'class' => '',        'placeholder' => '',        'type' => 'upload'
    );
    $options[] = array(
        'name' => __( '信息3名称', 'theme-textdomain' ),        'desc' => __( '商标3名称', 'theme-textdomain' ),        'id' => 'temp4_infomation_3',        'placeholder' => '',        'std' => '',        'class' => 'mini',        'type' => 'text'
    );
    $options[] = array(
        'name' => __( '信息3logo', 'theme-textdomain' ),        'desc' => __( '商标3logo', 'theme-textdomain' ),        'id' => 'temp4_infomation_logo_3',        'std' => '',        'class' => '',        'placeholder' => '',        'type' => 'upload'
    );

	return $options;
}