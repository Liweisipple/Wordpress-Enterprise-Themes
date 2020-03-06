<?php
function test_setup() {
    register_nav_menu('testMenu', '网站的主导航');
}

add_action('after_setup_theme', 'test_setup');

function test_search_form( $form ) {

    $form = '<div class = "search"><form role="search" method="get" id="searchform" action="' . home_url( '/' ) . '" >
    <div class="input-append pull-right" id="search">
    <input class="span3" type="text" value="' . get_search_query() . '" name="s" id="s" />
    <span id="search_span"><input type="hidden" value="'. esc_attr__('Search') .'" />搜索</span>
    </div>
    </form></div>';

    return $form;
}

add_filter( 'get_search_form', 'test_search_form' );

class test_bootstrap_navwalker extends Walker_Nav_Menu {

    /**
     * @see Walker::start_lvl()
     * @since 3.0.0
     *
     * @param string $output Passed by reference. Used to append additional content.
     * @param int $depth Depth of page. Used for padding.
     */
    public function start_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat( "\t", $depth );
//        $output .= "\n$indent<ul role=\"menu\" class=\"nav navbar-nav\">\n";
    }

    /**
     * @see Walker::start_el()
     * @since 3.0.0
     *
     * @param string $output Passed by reference. Used to append additional content.
     * @param object $item Menu item data object.
     * @param int $depth Depth of menu item. Used for padding.
     * @param int $current_page Menu item ID.
     * @param object $args
     */
    public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

        /**
         * Dividers, Headers or Disabled
         * =============================
         * Determine whether the item is a Divider, Header, Disabled or regular
         * menu item. To prevent errors we use the strcasecmp() function to so a


         * comparison that is not case sensitive. The strcasecmp() function returns
         * a 0 if the strings are equal.
         */


            $output .= $indent . '';

            $atts = array();
            $atts['title']  = ! empty( $item->title )   ? $item->title  : '';
            $atts['target'] = ! empty( $item->target )  ? $item->target : '';


            $atts['rel']    = ! empty( $item->xfn )     ? $item->xfn    : '';

            // If item has_children add atts to a.
            if ( $args->has_children && $depth === 0 ) {
                $atts['href']           = '#';
                $atts['data-toggle']    = 'dropdown';
                $atts['class']          = 'dropdown-toggle';
                $atts['aria-haspopup']  = 'true';
            } else {
                $atts['href'] = ! empty( $item->url ) ? $item->url : '';
            }

            $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args );

            $attributes = '';
            foreach ( $atts as $attr => $value ) {
                if ( ! empty( $value ) ) {
                    $value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
                    $attributes .= ' ' . $attr . '="' . $value . '"';
                }
            }

            $item_output = $args->before;

            /*
             * Glyphicons
             * ===========
             * Since the the menu item is NOT a Divider or Header we check the see
             * if there is a value in the attr_title property. If the attr_title
             * property is NOT null we apply it as the class name for the glyphicon.
             */
            if ( ! empty( $item->attr_title ) )
                $item_output .= '<a'. $attributes .'><span class="glyphicon ' . esc_attr( $item->attr_title ) . '"></span>&nbsp;';
            else
                $item_output .= '<a'. $attributes .'>';

            $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
            $item_output .= ( $args->has_children && 0 === $depth ) ? ' <span class="caret"></span></a>' : '</a>';
            $item_output .= $args->after;

            $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }

    /**
     * Traverse elements to create list from elements.
     *
     * Display one element if the element doesn't have any children otherwise,
     * display the element and its children. Will only traverse up to the max
     * depth and no ignore elements under that depth.
     *
     * This method shouldn't be called directly, use the walk() method instead.
     *
     * @see Walker::start_el()
     * @since 2.5.0
     *
     * @param object $element Data object
     * @param array $children_elements List of elements to continue traversing.
     * @param int $max_depth Max depth to traverse.
     * @param int $depth Depth of current element.
     * @param array $args
     * @param string $output Passed by reference. Used to append additional content.
     * @return null Null on failure with no changes to parameters.
     */
    public function display_element( $element, &$children_elements, $max_depth, $depth, $args, &$output ) {
        if ( ! $element )
            return;

        $id_field = $this->db_fields['id'];

        // Display this element.
        if ( is_object( $args[0] ) )
            $args[0]->has_children = ! empty( $children_elements[ $element->$id_field ] );

        parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
    }

    /**
     * Menu Fallback
     * =============
     * If this function is assigned to the wp_nav_menu's fallback_cb variable
     * and a manu has not been assigned to the theme location in the WordPress


     * menu manager the function with display nothing to a non-logged in user,
     * and will add a link to the WordPress menu manager if logged in as an admin.
     *
     * @param array $args passed from the wp_nav_menu function.
     *
     */
    public static function fallback( $args ) {
        if ( current_user_can( 'manage_options' ) ) {

            extract( $args );

            $fb_output = null;

            if ( $container ) {
                $fb_output = '<' . $container;

                if ( $container_id )
                    $fb_output .= ' id="' . $container_id . '"';

                if ( $container_class )
                    $fb_output .= ' class="' . $container_class . '"';

                $fb_output .= '>';
            }

            $fb_output .= '<ul';

            if ( $menu_id )
                $fb_output .= ' id="' . $menu_id . '"';

            if ( $menu_class )
                $fb_output .= ' class="' . $menu_class . '"';

            $fb_output .= '>';
            $fb_output .= '<li><a href="' . admin_url( 'nav-menus.php' ) . '">Add a menu</a></li>';
            $fb_output .= '</ul>';

            if ( $container )
                $fb_output .= '</' . $container . '>';

            echo $fb_output;
        }
    }
}

function test_avatar_css($class) {
    $class = str_replace("class='avatar'", "class='img-circle'", $class);
    return $class;
}
add_filter('get_avatar', 'test_avatar_css');

function get_pagenavi( $range = 4 ) {
    global $paged,$wp_query;
    if ( !$max_page ) {
        $max_page = $wp_query->max_num_pages;
    }
    if( $max_page >1 ) {
        if( !$paged ){
            $paged = 1;
        }
        echo "<li>"; previous_posts_link('上一页');"</li>";
//        if ( $max_page >$range ) {
//            if( $paged <$range ) {
//                for( $i = 1; $i <= ($range +1); $i++ ) {
//                    echo "<li><a href='".get_pagenum_link($i) ."'";
//                    if($i==$paged) echo " class='current'";echo ">$i</a></li>";
//                }
//            }elseif($paged >= ($max_page -ceil(($range/2)))){
//                for($i = $max_page -$range;$i <= $max_page;$i++){
//                    echo "<li><a href='".get_pagenum_link($i) ."'";
//                    if($i==$paged)echo " class='current'";echo ">$i</a></li>";
//                }
//            }elseif($paged >= $range &&$paged <($max_page -ceil(($range/2)))){
//                for($i = ($paged -ceil($range/2));$i <= ($paged +ceil(($range/2)));$i++){
//                    echo "<li><a href='".get_pagenum_link($i) ."'";if($i==$paged) echo " class='current'";echo ">$i</a></li>";
//                }
//            }
//        }else{
//            for($i = 1;$i <= $max_page;$i++){
//                echo "<li><a href='".get_pagenum_link($i) ."'";
//                if($i==$paged)echo " class='current'";echo ">$i</a></li>";
//            }
//        }
        echo "<li>";next_posts_link('下一页');"</li>";
//        echo '<li><span>共'.$max_page.'页</span></li>';
    }
}

if ( function_exists( 'add_theme_support' ) ) {
    add_theme_support( 'post-thumbnails' );
}

function test_widgets_init() {
    register_sidebar(array(
        'name' => 'sidebar_bottom',
        'id' => 'sidebar_bottom',
        'description' => 'test sidebar',
        'before_widget' => '<div><section>',
        'after_widget' => '</section></div>',
        'before_title' => '<h3><span>',
        'after_title' => '</span></h3>',
    ));
}

add_action('widgets_init', 'test_widgets_init');


if (!function_exists('optionsframework_init')){
    define('OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri().'/inc/');
    require_once dirname(__FILE__).'/inc/options-framework.php';
}

function optionsframework_option_name() {
    // Change this to use your theme slug
    return 'options-framework-theme-sample4';
}

function get_between($input, $start, $end) {
    $substr = substr($input, strlen($start)+strpos($input, $start),(strlen($input) - strpos($input, $end))*(-1));
    return $substr;
}

function xintheme_menu_link_atts( $atts, $item, $args ) {
//    $atts['class'] = 'navs-item';
//    return $atts;
}
//add_filter( 'nav_menu_link_attributes', 'xintheme_menu_link_atts', 10, 3 );


/**
 * 为 WordPress 分类目录的描述添加可视化编辑器
 * https://www.wpdaxue.com/add-tinymce-editor-category-description.html
 */
// 移除HTML过滤
remove_filter( 'pre_term_description', 'wp_filter_kses' );
remove_filter( 'term_description', 'wp_kses_data' );
//为分类编辑界面添加可视化编辑器的“描述”框
add_filter('edit_category_form_fields', 'cat_description');
function cat_description($tag)
{
    ?>
    <table class="form-table">
        <tr class="form-field">
            <th scope="row" valign="top"><label for="description"><?php _ex('Description', 'Taxonomy Description'); ?></label></th>
            <td>
                <?php
                $settings = array('wpautop' => true, 'media_buttons' => true, 'quicktags' => true, 'textarea_rows' => '15', 'textarea_name' => 'description' );
                wp_editor(wp_kses_post($tag->description , ENT_QUOTES, 'UTF-8'), 'cat_description', $settings);
                ?>
                <br />
                <span class="description"><?php _e('The description is not prominent by default; however, some themes may show it.'); ?></span>
            </td>
        </tr>
    </table>
    <?php
}
//移除默认的“描述”框
add_action('admin_head', 'remove_default_category_description');
function remove_default_category_description()
{
    global $current_screen;
    if ( $current_screen->id == 'edit-category' )
    {
        ?>
        <script type="text/javascript">
            jQuery(function($) {
                $('textarea#description').closest('tr.form-field').remove();
            });
        </script>
        <?php
    }
}

define(SINGLE_PATH, TEMPLATEPATH . '');
//自动选择模板的函数
function wpdaxue_single_template($single) {
    global $wp_query, $post;
    //通过分类别名或ID选择模板文件
    foreach((array)get_the_category() as $cat) :
        if(file_exists(SINGLE_PATH . '/single-' . $cat->slug . '.php'))
            return SINGLE_PATH . '/single-' . $cat->slug . '.php';
        elseif(file_exists(SINGLE_PATH . '/single-' . $cat->term_id . '.php'))
            return SINGLE_PATH . '/single-' . $cat->term_id . '.php';
    endforeach;
}

add_filter('single_template', 'wpdaxue_single_template');

function page_excerpt() {
    add_post_type_support('page', array('excerpt'));
}

add_action('init', 'page_excerpt');

function searchRes($arrays, $keywords)
{
    $arr = array();
    foreach ($arrays as $key => $values) {
        if (strstr($values, $keywords) !== false) {
            array_push($arr, $values);
        }
    }
    return $arr;
}

function getProductCate()
{
    $category = get_category_by_slug('productdetails');
    $args = array(
        'orderby' => 'name',
        'order' => 'ASC',
        'parent' => $category->term_id
    );
    $categories = get_categories($args);
    $return = [];
    foreach ($categories as $val) {
        $return[] = $val->term_id;
    }
    $return[] = $category->term_id;
    return $return;
}

function getNewsCate()
{
    $category = get_category_by_slug('news');
    $args = array(
        'orderby' => 'name',
        'order' => 'ASC',
        'parent' => $category->term_id
    );
    $categories = get_categories($args);
    $return = [];
    foreach ($categories as $val) {
        $return[] = $val->term_id;
    }
    $return[] = $category->term_id;
    return $return;
}

function catch_that_video() {
    global $post, $posts;
    $first_video = '';
    ob_start();
    ob_end_clean();
    $output = preg_match_all('/<embed.+src=[\'”]([^\'”]+)[\'”].*>/i', $post->post_content, $matches);
    $first_video = $matches [1] [0];

    return $first_video;
}

if ( ! function_exists( 'fenikso_comment' ) ) :
    function fenikso_comment( $comment, $args, $depth ) {
        $GLOBALS['comment'] = $comment;
        $return_arr = [];
        switch ( $comment->comment_type ) :
            default :
                // 开始正常的评论
                global $post;
                ?>

                <?php
                    $return_arr[] = [
                            'user' => printf('%1$s %2$s', get_comment_author_link(), ($comment->user_id === $post->post_author) ? '<span class="label label-info"> ' . __('Post author', 'fenikso') . '</span>' : ''),
                            'content' => comment_text(),
                            'img' => get_template_directory_uri() . '/assets/imgs/template-four/message/header.png',
                ];

                ?>

                <?php
                break;
        endswitch; // end comment_type check
        $GLOBALS['return_arr'] = $return_arr;
    }
endif;

function zbench_comment_fields ($fields) {
    foreach ($fields as $name => $field) {
        $fields[$name] = preg_replace('/(<label(?:.*?)>(?:.*?)<\/label>)\s*(<span class="required">\*<\/span>)?\s*(<input(?:.*?)\/>)/','\3\1\2',$field);
    }
    return $fields;
}
add_filter('comment_form_default_fields', 'zbench_comment_fields');


function get_previous_comments_link_div( $label = '' ) {
    if ( ! is_singular() ) {
        return;
    }

    $page = get_query_var( 'cpage' );

    if ( intval( $page ) <= 1 ) {
        return;
    }

    $prevpage = intval( $page ) - 1;

    if ( empty( $label ) ) {
        $label = __( '&laquo; Older Comments' );
    }

    /**
     * Filters the anchor tag attributes for the previous comments page link.
     *
     * @since 2.7.0
     *
     * @param string $attributes Attributes for the anchor tag.
     */
    return esc_url( get_comments_pagenum_link( $prevpage ));
}

function get_next_comments_link_div( $label = '', $max_page = 0 ) {
    global $wp_query;

    if ( ! is_singular() ) {
        return;
    }

    $page = get_query_var( 'cpage' );

    if ( ! $page ) {
        $page = 1;
    }

    $nextpage = intval( $page ) + 1;

    if ( empty( $max_page ) ) {
        $max_page = $wp_query->max_num_comment_pages;
    }

    if ( empty( $max_page ) ) {
        $max_page = get_comment_pages_count();
    }

    if ( $nextpage > $max_page ) {
        return;
    }

    if ( empty( $label ) ) {
        $label = __( 'Newer Comments &raquo;' );
    }

    /**
     * Filters the anchor tag attributes for the next comments page link.
     *
     * @since 2.7.0
     *
     * @param string $attributes Attributes for the anchor tag.
     */
    return esc_url( get_comments_pagenum_link( $nextpage, $max_page ) );
}

function get_comments_pagenum_link_div( $pagenum = 1, $max_page = 0 ) {
    global $wp_rewrite;

    $pagenum = (int) $pagenum;

    $result = get_permalink();

    if ( 'newest' == get_option( 'default_comments_page' ) ) {
        if ( $pagenum != $max_page ) {
            if ( $wp_rewrite->using_permalinks() ) {
                $result = user_trailingslashit( trailingslashit( $result ) . $wp_rewrite->comments_pagination_base );
            } else {
                $result = add_query_arg( 'cpage', $pagenum, $result );
            }
        }
    } elseif ( $pagenum > 1 ) {
        if ( $wp_rewrite->using_permalinks() ) {
            $result = user_trailingslashit( trailingslashit( $result ) . $wp_rewrite->comments_pagination_base  );
        } else {
            $result = add_query_arg( 'cpage', $pagenum, $result );
        }
    }

//    $result .= '#comments';

    /**
     * Filters the comments page number link for the current request.
     *
     * @since 2.7.0
     *
     * @param string $result The comments page number link.
     */
    return apply_filters( 'get_comments_pagenum_link', $result );
}

function get_the_tag_list_div( $before = '', $sep = '', $after = '', $id = 0 ) {

    /**
     * Filters the tags list for a given post.
     *
     * @since 2.3.0
     *
     * @param string $tag_list List of tags.
     * @param string $before   String to use before tags.
     * @param string $sep      String to use between the tags.
     * @param string $after    String to use after tags.
     * @param int    $id       Post ID.
     */
    return get_the_term_list_div( $id, 'post_tag', $before, $sep, $after );
}


function get_the_term_list_div( $id, $taxonomy, $before = '', $sep = '', $after = '' ) {
    $terms = get_the_terms( $id, $taxonomy );

    if ( is_wp_error( $terms ) ) {
        return $terms;
    }

    if ( empty( $terms ) ) {
        return false;
    }

    $links = array();

    foreach ( $terms as $term ) {
        $link = get_term_link( $term, $taxonomy );
        if ( is_wp_error( $link ) ) {
            return $link;
        }
        $links[] = $term->name;
    }

    /**
     * Filters the term links for a given taxonomy.
     *
     * The dynamic portion of the filter name, `$taxonomy`, refers
     * to the taxonomy slug.
     *
     * @since 2.5.0
     *
     * @param string[] $links An array of term links.
     */
    return $links;
}


function curPageURL()
{
    $pageURL = 'http';
    if ($_SERVER["HTTPS"] == "on")
    {
        $pageURL .= "s";
    }
    $pageURL .= "://";
    if ($_SERVER["SERVER_PORT"] != "80")
    {
        $pageURL .= $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"] . $_SERVER["REQUEST_URI"];
    }
    else
    {
        $pageURL .= $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
    }
    return $pageURL;
}

function shapeSpace_disable_image_sizes($sizes) {

    unset($sizes['thumbnail']);    // disable thumbnail size
    unset($sizes['medium']);       // disable medium size
    unset($sizes['large']);        // disable large size
    unset($sizes['medium_large']); // disable medium-large size
    unset($sizes['1536x1536']);    // disable 2x medium-large size
    unset($sizes['2048x2048']);    // disable 2x large size

    return $sizes;

}
add_action('intermediate_image_sizes_advanced', 'shapeSpace_disable_image_sizes');

// 禁用缩放尺寸
add_filter('big_image_size_threshold', '__return_false');

// 禁用其他图片尺寸
function shapeSpace_disable_other_image_sizes() {

    remove_image_size('post-thumbnail'); // disable images added via set_post_thumbnail_size()
    remove_image_size('another-size');   // disable any other added image sizes

}
add_action('init', 'shapeSpace_disable_other_image_sizes');

function the_tags_div($post_id) {
    $tags = wp_get_post_tags($post_id);
    if (!empty($tags)) {
        return $tags[0]->name;
    } else {
        return '';
    }
}

function wp_list_comments_div( $args = array(), $comments = null ) {
    global $wp_query, $comment_alt, $comment_depth, $comment_thread_alt, $overridden_cpage, $in_comment_loop;

    $in_comment_loop = true;

    $comment_alt        = 0;
    $comment_thread_alt = 0;
    $comment_depth      = 1;

    $defaults = array(
        'walker'            => null,
        'max_depth'         => '',
        'style'             => 'ul',
        'callback'          => null,
        'end-callback'      => null,
        'type'              => 'all',
        'page'              => '',
        'per_page'          => '',
        'avatar_size'       => 32,
        'reverse_top_level' => null,
        'reverse_children'  => '',
        'format'            => current_theme_supports( 'html5', 'comment-list' ) ? 'html5' : 'xhtml',
        'short_ping'        => false,
        'echo'              => true,
    );

    $parsed_args = wp_parse_args( $args, $defaults );

    /**
     * Filters the arguments used in retrieving the comment list.
     *
     * @since 4.0.0
     *
     * @see wp_list_comments()
     *
     * @param array $parsed_args An array of arguments for displaying comments.
     */
    $parsed_args = apply_filters( 'wp_list_comments_args', $parsed_args );

    // Figure out what comments we'll be looping through ($_comments)
    if ( null !== $comments ) {
        $comments = (array) $comments;
        if ( empty( $comments ) ) {
            return;
        }
        if ( 'all' != $parsed_args['type'] ) {
            $comments_by_type = separate_comments( $comments );
            if ( empty( $comments_by_type[ $parsed_args['type'] ] ) ) {
                return;
            }
            $_comments = $comments_by_type[ $parsed_args['type'] ];
        } else {
            $_comments = $comments;
        }
    } else {
        /*
         * If 'page' or 'per_page' has been passed, and does not match what's in $wp_query,
         * perform a separate comment query and allow Walker_Comment to paginate.
         */
        if ( $parsed_args['page'] || $parsed_args['per_page'] ) {
            $current_cpage = get_query_var( 'cpage' );
            if ( ! $current_cpage ) {
                $current_cpage = 'newest' === get_option( 'default_comments_page' ) ? 1 : $wp_query->max_num_comment_pages;
            }

            $current_per_page = get_query_var( 'comments_per_page' );
            if ( $parsed_args['page'] != $current_cpage || $parsed_args['per_page'] != $current_per_page ) {
                $comment_args = array(
                    'post_id' => get_the_ID(),
                    'orderby' => 'comment_date_gmt',
                    'order'   => 'ASC',
                    'status'  => 'approve',
                );

                if ( is_user_logged_in() ) {
                    $comment_args['include_unapproved'] = get_current_user_id();
                } else {
                    $unapproved_email = wp_get_unapproved_comment_author_email();

                    if ( $unapproved_email ) {
                        $comment_args['include_unapproved'] = array( $unapproved_email );
                    }
                }

                $comments = get_comments( $comment_args );

                if ( 'all' != $parsed_args['type'] ) {
                    $comments_by_type = separate_comments( $comments );
                    if ( empty( $comments_by_type[ $parsed_args['type'] ] ) ) {
                        return;
                    }

                    $_comments = $comments_by_type[ $parsed_args['type'] ];
                } else {
                    $_comments = $comments;
                }
            }

            // Otherwise, fall back on the comments from `$wp_query->comments`.
        } else {
            if ( empty( $wp_query->comments ) ) {
                return;
            }
            if ( 'all' != $parsed_args['type'] ) {
                if ( empty( $wp_query->comments_by_type ) ) {
                    $wp_query->comments_by_type = separate_comments( $wp_query->comments );
                }
                if ( empty( $wp_query->comments_by_type[ $parsed_args['type'] ] ) ) {
                    return;
                }
                $_comments = $wp_query->comments_by_type[ $parsed_args['type'] ];
            } else {
                $_comments = $wp_query->comments;
            }

            if ( $wp_query->max_num_comment_pages ) {
                $default_comments_page = get_option( 'default_comments_page' );
                $cpage                 = get_query_var( 'cpage' );
                if ( 'newest' === $default_comments_page ) {
                    $parsed_args['cpage'] = $cpage;

                    /*
                    * When first page shows oldest comments, post permalink is the same as
                    * the comment permalink.
                    */
                } elseif ( $cpage == 1 ) {
                    $parsed_args['cpage'] = '';
                } else {
                    $parsed_args['cpage'] = $cpage;
                }

                $parsed_args['page']     = 0;
                $parsed_args['per_page'] = 0;
            }
        }
    }

    if ( '' === $parsed_args['per_page'] && get_option( 'page_comments' ) ) {
        $parsed_args['per_page'] = get_query_var( 'comments_per_page' );
    }

    if ( empty( $parsed_args['per_page'] ) ) {
        $parsed_args['per_page'] = 0;
        $parsed_args['page']     = 0;
    }

    if ( '' === $parsed_args['max_depth'] ) {
        if ( get_option( 'thread_comments' ) ) {
            $parsed_args['max_depth'] = get_option( 'thread_comments_depth' );
        } else {
            $parsed_args['max_depth'] = -1;
        }
    }

    if ( '' === $parsed_args['page'] ) {
        if ( empty( $overridden_cpage ) ) {
            $parsed_args['page'] = get_query_var( 'cpage' );
        } else {
            $threaded            = ( -1 != $parsed_args['max_depth'] );
            $parsed_args['page'] = ( 'newest' == get_option( 'default_comments_page' ) ) ? get_comment_pages_count( $_comments, $parsed_args['per_page'], $threaded ) : 1;
            set_query_var( 'cpage', $parsed_args['page'] );
        }
    }
    // Validation check
    $parsed_args['page'] = intval( $parsed_args['page'] );
    if ( 0 == $parsed_args['page'] && 0 != $parsed_args['per_page'] ) {
        $parsed_args['page'] = 1;
    }

    if ( null === $parsed_args['reverse_top_level'] ) {
        $parsed_args['reverse_top_level'] = ( 'desc' == get_option( 'comment_order' ) );
    }

    wp_queue_comments_for_comment_meta_lazyload( $_comments );

    if ( empty( $parsed_args['walker'] ) ) {
        $walker = new Walker_Comment;
    } else {
        $walker = $parsed_args['walker'];
    }

    $output = $walker->paged_walk( $_comments, $parsed_args['max_depth'], $parsed_args['page'], $parsed_args['per_page'], $parsed_args );

    $in_comment_loop = false;


    return $output;
}

function comment_form_div( $args = array(), $post_id = null ) {
    if ( null === $post_id ) {
        $post_id = get_the_ID();
    }

    // Exit the function when comments for the post are closed.
    if ( ! comments_open( $post_id ) ) {
        /**
         * Fires after the comment form if comments are closed.
         *
         * @since 3.0.0
         */
        do_action( 'comment_form_comments_closed' );

        return;
    }

    $commenter     = wp_get_current_commenter();
    $user          = wp_get_current_user();
    $user_identity = $user->exists() ? $user->display_name : '';

    $args = wp_parse_args( $args );
    if ( ! isset( $args['format'] ) ) {
        $args['format'] = current_theme_supports( 'html5', 'comment-form' ) ? 'html5' : 'xhtml';
    }

    $req      = get_option( 'require_name_email' );
    $html_req = ( $req ? " required='required'" : '' );
    $html5    = 'html5' === $args['format'];

    $fields = array(
        'author' => sprintf(
            '<p class="comment-form-author">%s %s</p>',
            sprintf(
                '<label for="author">%s%s</label>',
                __( 'Name' ),
                ( $req ? ' <span class="required">*</span>' : '' )
            ),
            sprintf(
                '<input id="author" name="author" type="text" value="%s" size="30" maxlength="245"%s />',
                esc_attr( $commenter['comment_author'] ),
                $html_req
            )
        ),
        'email'  => sprintf(
            '<p class="comment-form-email">%s %s</p>',
            sprintf(
                '<label for="email">%s%s</label>',
                __( 'Email' ),
                ( $req ? ' <span class="required">*</span>' : '' )
            ),
            sprintf(
                '<input id="email" name="email" %s value="%s" size="30" maxlength="100" aria-describedby="email-notes"%s />',
                ( $html5 ? 'type="email"' : 'type="text"' ),
                esc_attr( $commenter['comment_author_email'] ),
                $html_req
            )
        ),
        'url'    => sprintf(
            '<p class="comment-form-url">%s %s</p>',
            sprintf(
                '<label for="url">%s</label>',
                __( 'Website' )
            ),
            sprintf(
                '<input id="url" name="url" %s value="%s" size="30" maxlength="200" />',
                ( $html5 ? 'type="url"' : 'type="text"' ),
                esc_attr( $commenter['comment_author_url'] )
            )
        ),
    );

    if ( has_action( 'set_comment_cookies', 'wp_set_comment_cookies' ) && get_option( 'show_comments_cookies_opt_in' ) ) {
        $consent = empty( $commenter['comment_author_email'] ) ? '' : ' checked="checked"';

//        $fields['cookies'] = sprintf(
//            '<p class="comment-form-cookies-consent">%s %s</p>',
//            sprintf(
//                '<input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes"%s />',
//                $consent
//            )
////            sprintf(
////                '<label for="wp-comment-cookies-consent">%s</label>',
////                __( 'Save my name, email, and website in this browser for the next time I comment.' )
////            )
//        );

        // Ensure that the passed fields include cookies consent.
        if ( isset( $args['fields'] ) && ! isset( $args['fields']['cookies'] ) ) {
            $args['fields']['cookies'] = $fields['cookies'];
        }
    }

    $required_text = sprintf(
    /* translators: %s: Asterisk symbol (*). */
        ' ' . __( 'Required fields are marked %s' ),
        '<span class="required">*</span>'
    );

    /**
     * Filters the default comment form fields.
     *
     * @since 3.0.0
     *
     * @param string[] $fields Array of the default comment fields.
     */
    $fields = apply_filters( 'comment_form_default_fields', $fields );

    $defaults = array(
        'fields'               => $fields,
        'comment_field'        => sprintf(
            '<p class="comment-form-comment">%s %s</p>',
            sprintf(
                '<label for="comment">%s</label>',
                _x( 'Comment', 'noun' )
            ),
            '<textarea id="comment" name="comment" cols="45" rows="8" maxlength="65525" required="required"></textarea>'
        ),
        'must_log_in'          => sprintf(
            '<p class="must-log-in">%s</p>',
            sprintf(
            /* translators: %s: Login URL. */
                __( 'You must be <a href="%s">logged in</a> to post a comment.' ),
                /** This filter is documented in wp-includes/link-template.php */
                wp_login_url( apply_filters( 'the_permalink', get_permalink( $post_id ), $post_id ) )
            )
        ),
        'logged_in_as'         => sprintf(
            '<p class="logged-in-as">%s</p>',
            sprintf(
            /* translators: 1: Edit user link, 2: Accessibility text, 3: User name, 4: Logout URL. */
                __( '<a href="%1$s" aria-label="%2$s">Logged in as %3$s</a><a href="%4$s">Log out?</a>' ),
                get_edit_user_link(),
                /* translators: %s: User name. */
                esc_attr( sprintf( __( 'Logged in as %s. Edit your profile.' ), $user_identity ) ),
                $user_identity,
                /** This filter is documented in wp-includes/link-template.php */
                wp_logout_url( apply_filters( 'the_permalink', get_permalink( $post_id ), $post_id ) )
            )
        ),
        'comment_notes_before' => sprintf(
            '<p class="comment-notes">%s%s</p>',
            sprintf(
                '<span id="email-notes">%s</span>',
                __( 'Your email address will not be published.' )
            ),
            ( $req ? $required_text : '' )
        ),
        'comment_notes_after'  => '',
        'action'               => site_url( '/wp-comments-post.php' ),
        'id_form'              => 'commentform',
        'id_submit'            => 'submit',
        'class_form'           => 'comment-form',
        'class_submit'         => 'submit',
        'name_submit'          => 'submit',
        'title_reply'          => __( 'Leave a Reply' ),
        /* translators: %s: Author of the comment being replied to. */
        'title_reply_to'       => __( 'Leave a Reply to %s' ),
        'title_reply_before'   => '<h3 id="reply-title" class="comment-reply-title">',
        'title_reply_after'    => '</h3>',
        'cancel_reply_before'  => ' <small>',
        'cancel_reply_after'   => '</small>',
        'cancel_reply_link'    => __( 'Cancel reply' ),
        'label_submit'         => __( 'Post Comment' ),
        'submit_button'        => '<input name="%1$s" type="submit" id="%2$s" class="%3$s" value="%4$s" />',
        'submit_field'         => '<p class="form-submit">%1$s %2$s</p>',
        'format'               => 'xhtml',
    );

    /**
     * Filters the comment form default arguments.
     *
     * Use {@see 'comment_form_default_fields'} to filter the comment fields.
     *
     * @since 3.0.0
     *
     * @param array $defaults The default comment form arguments.
     */
    $args = wp_parse_args( $args, apply_filters( 'comment_form_defaults', $defaults ) );

    // Ensure that the filtered args contain all required default values.
    $args = array_merge( $defaults, $args );

    // Remove aria-describedby from the email field if there's no associated description.
    if ( false === strpos( $args['comment_notes_before'], 'id="email-notes"' ) ) {
        $args['fields']['email'] = str_replace(
            ' aria-describedby="email-notes"',
            '',
            $args['fields']['email']
        );
    }

    /**
     * Fires before the comment form.
     *
     * @since 3.0.0
     */
    do_action( 'comment_form_before' );
    ?>
    <div id="respond" class="comment-respond">
        <?php
        echo $args['title_reply_before'];

        comment_form_title( $args['title_reply'], $args['title_reply_to'] );

        echo $args['cancel_reply_before'];

        cancel_comment_reply_link( $args['cancel_reply_link'] );

        echo $args['cancel_reply_after'];

        echo $args['title_reply_after'];

        if ( get_option( 'comment_registration' ) && ! is_user_logged_in() ) :

            echo $args['must_log_in'];
            /**
             * Fires after the HTML-formatted 'must log in after' message in the comment form.
             *
             * @since 3.0.0
             */
            do_action( 'comment_form_must_log_in_after' );

        else :

            printf(
                '<form action="%s" method="post" id="%s" class="%s"%s>',
                esc_url( $args['action'] ),
                esc_attr( $args['id_form'] ),
                esc_attr( $args['class_form'] ),
                ( $html5 ? ' novalidate' : '' )
            );

            /**
             * Fires at the top of the comment form, inside the form tag.
             *
             * @since 3.0.0
             */
            do_action( 'comment_form_top' );

            if ( is_user_logged_in() ) :

                /**
                 * Filters the 'logged in' message for the comment form for display.
                 *
                 * @since 3.0.0
                 *
                 * @param string $args_logged_in The logged-in-as HTML-formatted message.
                 * @param array  $commenter      An array containing the comment author's
                 *                               username, email, and URL.
                 * @param string $user_identity  If the commenter is a registered user,
                 *                               the display name, blank otherwise.
                 */
                echo apply_filters( 'comment_form_logged_in', $args['logged_in_as'], $commenter, $user_identity );

                /**
                 * Fires after the is_user_logged_in() check in the comment form.
                 *
                 * @since 3.0.0
                 *
                 * @param array  $commenter     An array containing the comment author's
                 *                              username, email, and URL.
                 * @param string $user_identity If the commenter is a registered user,
                 *                              the display name, blank otherwise.
                 */
                do_action( 'comment_form_logged_in_after', $commenter, $user_identity );

            else :

                echo $args['comment_notes_before'];

            endif;

            // Prepare an array of all fields, including the textarea.
            $comment_fields = array( 'comment' => $args['comment_field'] ) + (array) $args['fields'];

            /**
             * Filters the comment form fields, including the textarea.
             *
             * @since 4.4.0
             *
             * @param array $comment_fields The comment fields.
             */
            $comment_fields = apply_filters( 'comment_form_fields', $comment_fields );

            // Get an array of field names, excluding the textarea
            $comment_field_keys = array_diff( array_keys( $comment_fields ), array( 'comment' ) );

            // Get the first and the last field name, excluding the textarea
            $first_field = reset( $comment_field_keys );
            $last_field  = end( $comment_field_keys );

            foreach ( $comment_fields as $name => $field ) {

                if ( 'comment' === $name ) {

                    /**
                     * Filters the content of the comment textarea field for display.
                     *
                     * @since 3.0.0
                     *
                     * @param string $args_comment_field The content of the comment textarea field.
                     */
                    echo apply_filters( 'comment_form_field_comment', $field );

                    echo $args['comment_notes_after'];

                } elseif ( ! is_user_logged_in() ) {

                    if ( $first_field === $name ) {
                        /**
                         * Fires before the comment fields in the comment form, excluding the textarea.
                         *
                         * @since 3.0.0
                         */
                        do_action( 'comment_form_before_fields' );
                    }

                    /**
                     * Filters a comment form field for display.
                     *
                     * The dynamic portion of the filter hook, `$name`, refers to the name
                     * of the comment form field. Such as 'author', 'email', or 'url'.
                     *
                     * @since 3.0.0
                     *
                     * @param string $field The HTML-formatted output of the comment form field.
                     */
                    echo apply_filters( "comment_form_field_{$name}", $field ) . "\n";

                    if ( $last_field === $name ) {
                        /**
                         * Fires after the comment fields in the comment form, excluding the textarea.
                         *
                         * @since 3.0.0
                         */
                        do_action( 'comment_form_after_fields' );
                    }
                }
            }

            $submit_button = sprintf(
                $args['submit_button'],
                esc_attr( $args['name_submit'] ),
                esc_attr( $args['id_submit'] ),
                esc_attr( $args['class_submit'] ),
                esc_attr( $args['label_submit'] )
            );

            /**
             * Filters the submit button for the comment form to display.
             *
             * @since 4.2.0
             *
             * @param string $submit_button HTML markup for the submit button.
             * @param array  $args          Arguments passed to comment_form().
             */
            $submit_button = apply_filters( 'comment_form_submit_button', $submit_button, $args );

            $submit_field = sprintf(
                $args['submit_field'],
                $submit_button,
                get_comment_id_fields( $post_id )
            );

            /**
             * Filters the submit field for the comment form to display.
             *
             * The submit field includes the submit button, hidden fields for the
             * comment form, and any wrapper markup.
             *
             * @since 4.2.0
             *
             * @param string $submit_field HTML markup for the submit field.
             * @param array  $args         Arguments passed to comment_form().
             */
            echo apply_filters( 'comment_form_submit_field', $submit_field, $args );

            /**
             * Fires at the bottom of the comment form, inside the closing </form> tag.
             *
             * @since 1.5.0
             *
             * @param int $post_id The post ID.
             */
            do_action( 'comment_form', $post_id );

            echo '</form>';

        endif;
        ?>
    </div><!-- #respond -->
    <?php

    /**
     * Fires after the comment form.
     *
     * @since 3.0.0
     */
    do_action( 'comment_form_after' );
}

function getchild($id)
{
    $result = explode('/',get_category_children($id));
    $childs = array();
    $return  = [];
    foreach($result as $i)
    {
        if(!empty($i))$childs[] = get_category($i);
    }
    foreach ($childs as $val) {
        $return[] = $val->term_id;
    }
    return $return;
}

function get_current_category_id() {
    $current_category = single_cat_title('', false);//获得当前分类目录名称
    return get_cat_ID($current_category);//获得当前分类目录 ID
}