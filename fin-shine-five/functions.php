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
    return 'options-framework-theme-sample5';
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



if ( ! function_exists( 'fenikso_comment' ) ) :
    function fenikso_comment( $comment, $args, $depth ) {
        $GLOBALS['comment'] = $comment;
        switch ( $comment->comment_type ) :
            default :
                // 开始正常的评论
                global $post;
                ?>



                    <div class="info">
                        <div class="face">
                            <img src="<?php echo get_template_directory_uri()  . '/assets/imgs/template-five/avatar.png'; ?>" alt="">
                            <div>
                                <h3><?php printf( '%1$s %2$s', get_comment_author_link(), ( $comment->user_id === $post->post_author ) ? '<span class="label label-info"> ' . __( 'Post author', 'fenikso' ) . '</span>' : ''); ?></h3>
                                <p>身份信息</p>
                            </div>

                        </div>
                        <div class="bottom"><?php comment_text(); ?></div>
                        <?php // 未审核的评论显示一行提示文字
                        if ( '0' == $comment->comment_approved ) : ?>
                            <div class="face">
                                等待审核
                            </div>
                        <?php endif; ?>
                    </div>

                <?php
                break;
        endswitch; // end comment_type check
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

@ini_set( 'upload_max_size','10M' );

@ini_set( 'post_max_size','10M');

@ini_set( 'max_execution_time','300' );