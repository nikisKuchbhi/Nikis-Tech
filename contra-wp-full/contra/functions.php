<?php
add_action('after_setup_theme', 'contra_bunch_theme_setup');
function contra_bunch_theme_setup()
{
    global $wp_version;
    if (!defined('CONTRA_VERSION')) {
        define('CONTRA_VERSION', '1.0');
    }
    if (!defined('CONTRA_ROOT')) {
        define('CONTRA_ROOT', get_template_directory().'/');
    }
    if (!defined('CONTRA_URL')) {
        define('CONTRA_URL', get_template_directory_uri().'/');
    }
    include_once get_template_directory() . '/includes/loader.php';


    load_theme_textdomain('contra', get_template_directory() . '/languages');

    //ADD THUMBNAIL SUPPORT
    add_theme_support('post-thumbnails');
    add_theme_support('post-formats', array( 'gallery' ));
    add_theme_support('woocommerce');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('automatic-feed-links'); //Enables post and comment RSS feed links to head.
    add_theme_support('widgets'); //Add widgets and sidebar support
    add_theme_support("title-tag");
    add_theme_support('post', 'page-attributes');
    add_theme_support('post-formats', array( 'gallery', 'video', 'quote' ));
    add_theme_support('wp-block-styles');
    add_theme_support('align-wide');
    add_theme_support('editor-styles');
    /*
     * Switch default core markup for search form, comment form, and comments
     * to output valid HTML5.
     */
    add_theme_support('html5', array(
        'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
    ));
    /** Register wp_nav_menus */
    if (function_exists('register_nav_menu')) {
        register_nav_menus(
            array(
                /** Register Main Menu location header */
                'main_menu' => esc_html__('Main Menu', 'contra'),
            )
        );
    }
    if (! isset($content_width)) {
        $content_width = 960;
    }
    add_image_size('contra_370x270', 370, 270, true); // 'contra_370x270 Our Specialization'
    add_image_size('contra_337x429', 337, 429, true); // 'contra_337x429 Our Projects'
    add_image_size('contra_320x470', 320, 470, true); // 'contra_320x470 Our Team'
    add_image_size('contra_150x210', 150, 210, true); // 'contra_150x210 Our Testimonials'
    add_image_size('contra_330x350', 330, 350, true); // 'contra_330x350 News & Articals'
    add_image_size('contra_270x289', 270, 289, true); // 'contra_270x289 Our Specialization V2'
    add_image_size('contra_970x520', 970, 520, true); // 'contra_970x520 Our Best Project'
    add_image_size('contra_270x270', 270, 270, true); // 'contra_270x270 Our Products'
    add_image_size('contra_570x215', 570, 215, true); // 'contra_570x215 News & Articals V2'
    add_image_size('contra_435x490', 435, 490, true); // 'contra_435x490 News & Articals V3'
    add_image_size('contra_270x200', 270, 200, true); // 'contra_270x200 News & Articals V3'
    add_image_size('contra_1170x400', 1170, 400, true); // 'contra_1170x400 Our Blog'
    add_image_size('contra_80x70', 80, 70, true); // 'contra_80x70 Recent Post Widget'
    add_image_size('contra_90x90', 90, 90, true); // 'contra_90x90 Popular Post Widget'
    add_image_size('contra_770x490', 770, 490, true); // 'contra_770x490 Our Projects V2'
    add_image_size('contra_570x490', 570, 490, true); // 'contra_570x490 Our Projects V2'
    add_image_size('contra_370x490', 370, 490, true); // 'contra_370x490 Our Projects V2'
}
function contra_gutenberg_editor_palette_styles()
{
    add_theme_support('editor-color-palette', array(
        array(
            'name' => esc_html__('strong yellow', 'contra'),
            'slug' => 'strong-yellow',
            'color' => '#f7bd00',
        ),
        array(
            'name' => esc_html__('strong white', 'contra'),
            'slug' => 'strong-white',
            'color' => '#fff',
        ),
        array(
            'name' => esc_html__('light black', 'contra'),
            'slug' => 'light-black',
            'color' => '#242424',
        ),
        array(
            'name' => esc_html__('very light gray', 'contra'),
            'slug' => 'very-light-gray',
            'color' => '#797979',
        ),
        array(
            'name' => esc_html__('very dark black', 'contra'),
            'slug' => 'very-dark-black',
            'color' => '#000000',
        ),
    ));

    add_theme_support('editor-font-sizes', array(
        array(
            'name' => esc_html__('Small', 'contra'),
            'size' => 10,
            'slug' => 'small'
        ),
        array(
            'name' => esc_html__('Normal', 'contra'),
            'size' => 15,
            'slug' => 'normal'
        ),
        array(
            'name' => esc_html__('Large', 'contra'),
            'size' => 24,
            'slug' => 'large'
        ),
        array(
            'name' => esc_html__('Huge', 'contra'),
            'size' => 36,
            'slug' => 'huge'
        )
    ));
}
add_action('after_setup_theme', 'contra_gutenberg_editor_palette_styles');
function contra_bunch_widget_init()
{
    global $wp_registered_sidebars;
    $theme_options = _WSH()->option();


    register_sidebar(array(
      'name' => esc_html__('Default Sidebar', 'contra'),
      'id' => 'default-sidebar',
      'description' => esc_html__('Widgets in this area will be shown on the right-hand side.', 'contra'),
      'before_widget'=>'<div id="%1$s" class="widget sidebar-widget %2$s">',
      'after_widget'=>'</div>',
      'before_title' => '<div class="sidebar-title"><h3>',
      'after_title' => '</h3></div>'
    ));
    register_sidebar(array(
      'name' => esc_html__('Footer Sidebar', 'contra'),
      'id' => 'footer-sidebar',
      'description' => esc_html__('Widgets in this area will be shown in Footer Area.', 'contra'),
      'before_widget'=>'<div class="footer-column col-lg-3 col-md-6 col-sm-12"><div id="%1$s"  class="footer-widget %2$s">',
      'after_widget'=>'</div></div>',
      'before_title' => '<h2 class="widget-title">',
      'after_title' => '</h2>'
    ));
    register_sidebar(array(
      'name' => esc_html__('Blog Listing', 'contra'),
      'id' => 'blog-sidebar',
      'description' => esc_html__('Widgets in this area will be shown on the right-hand side.', 'contra'),
      'before_widget'=>'<div id="%1$s" class="widget sidebar-widget %2$s">',
      'after_widget'=>'</div>',
      'before_title' => '<div class="sidebar-title"><h3>',
      'after_title' => '</h3></div>'
    ));
    register_sidebar(array(
      'name' => esc_html__('Shop Sidebar', 'contra'),
      'id' => 'shop-sidebar',
      'description' => esc_html__('Widgets in this area will be shown on the right-hand side.', 'contra'),
      'before_widget'=>'<div id="%1$s" class="widget shop-sidebar sidebar-widget %2$s">',
      'after_widget'=>'</div>',
      'before_title' => '<div class="sidebar-title"><h3>',
      'after_title' => '</h3><div class="separater"></div></div>'
    ));
    if (!is_object(_WSH())) {
        return;
    }
    $sidebars = contra_set(contra_set($theme_options, 'dynamic_sidebar'), 'dynamic_sidebar');
    foreach (array_filter((array)$sidebars) as $sidebar) {
        if (contra_set($sidebar, 'topcopy')) {
            continue ;
        }

        $name = contra_set($sidebar, 'sidebar_name');

        if (! $name) {
            continue;
        }
        $slug = contra_bunch_slug($name) ;

        register_sidebar(array(
            'name' => $name,
            'id' =>  sanitize_title($slug) ,
            'before_widget' => '<div id="%1$s" class="sidebar-widget %2$s">',
            'after_widget' => "</div>",
            'before_title' => '<h3 class="sidebar-title">',
            'after_title' => '</h3>',
        ));
    }

    update_option('wp_registered_sidebars', $wp_registered_sidebars) ;
}
add_action('widgets_init', 'contra_bunch_widget_init');
// Update items in cart via AJAX
function contra_load_head_scripts()
{
    $options = _WSH()->option();
    $key = contra_Set($options, 'map_api_key');
    if (!is_admin() && $key) {
        $protocol = is_ssl() ? 'https://' : 'http://';
        $map_path = '?key='.contra_set($options, 'map_api_key');
        wp_enqueue_script('contra-map-api', ''.$protocol.'maps.google.com/maps/api/js'.$map_path, array(), false, false);
    }
}
add_action('wp_enqueue_scripts', 'contra_load_head_scripts');

function contra_admin_style()
{
    wp_enqueue_style('admin-styles', get_template_directory_uri().'/css/admin.css');
    wp_enqueue_media();
    wp_enqueue_script('contra-admin-scripts', get_template_directory_uri().'/js/admin.js', array('jquery'), false, true);
    wp_enqueue_script('contra-upload-img', get_template_directory_uri() . '/js/img_upload.js', array('jquery'), false, true);
}
add_action('admin_enqueue_scripts', 'contra_admin_style');

if (!defined('KC_LICENSE')) {
    define('KC_LICENSE', 'twrvqysv-51mw-zgsz-8scg-e03y-7cawas6y3vji');
}

//global variables
function contra_bunch_global_variable()
{
    global $wp_query;
}

function contra_enqueue_scripts()
{
    $theme_options = _WSH()->option();
    $map_paths = contra_set($theme_options, 'map_api_key');
    if (contra_set($theme_options, 'color_scheme_style') == 'custom_color') {
        $maincolor = str_replace('#', '', contra_set($theme_options, 'main_color_scheme', '#ff8a00'));
    } elseif (contra_set($theme_options, 'color_scheme_style') == 'predefined_color') {
        $maincolor = str_replace('#', '', contra_set($theme_options, 'predefined_color_scheme', '#ff8a00'));
    } else {
        $maincolor = str_replace('#', '', '#ff8a00');
    }

    //styles
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.css');
    wp_enqueue_style('flaticon', get_template_directory_uri() . '/css/flaticon.css');
    wp_enqueue_style('font-awesome', get_template_directory_uri() . '/css/font-awesome.css');
    wp_enqueue_style('animate', get_template_directory_uri() . '/css/animate.css');
    wp_enqueue_style('mCustomScrollbar', get_template_directory_uri() . '/css/jquery.mCustomScrollbar.min.css');
    wp_enqueue_style('owl-theme', get_template_directory_uri() . '/css/owl.css');
    wp_enqueue_style('bootstrap-touchspin', get_template_directory_uri() . '/css/jquery.bootstrap-touchspin.css');
    wp_enqueue_style('fancybox', get_template_directory_uri() . '/css/jquery.fancybox.min.css');
    wp_enqueue_style('contra-main-style', get_stylesheet_uri());
    wp_enqueue_style('contra-custom-style', get_template_directory_uri() . '/css/custom.css');
    wp_enqueue_style('tut-css', get_template_directory_uri() . '/css/tut.css');
    wp_enqueue_style('contra-editor-style', get_template_directory_uri() . '/css/gutenberg.css');
    wp_enqueue_style('contra-responsive', get_template_directory_uri() . '/css/responsive.css');
    wp_enqueue_style('contra-default', get_template_directory_uri() . '/css/color-themes/default-theme.css');
    if (class_exists('woocommerce')) {
        wp_enqueue_style('contra_woocommerce', get_template_directory_uri() . '/css/woocommerce.css');
    }
    wp_enqueue_style('contra-main-color', get_template_directory_uri() . '/css/color.php?main_color='.$maincolor);
    wp_enqueue_style('contra-color-switcher', get_template_directory_uri() . '/css/color-switcher-design.css');

    //scripts
    wp_enqueue_script('jquery-ui-core');
    wp_enqueue_script('popper', get_template_directory_uri().'/js/popper.min.js', array(), false, true);
    wp_enqueue_script('bootstrap', get_template_directory_uri().'/js/bootstrap.min.js', array(), false, true);
    wp_enqueue_script('fancybox-pack', get_template_directory_uri().'/js/jquery.fancybox.js', array(), false, true);
    wp_enqueue_script('owl', get_template_directory_uri().'/js/owl.js', array(), false, true);
    wp_enqueue_script('wow', get_template_directory_uri().'/js/wow.js', array(), false, true);
    wp_enqueue_script('appear', get_template_directory_uri().'/js/appear.js', array(), false, true);
    wp_enqueue_script('mixitup', get_template_directory_uri().'/js/mixitup.js', array(), false, true);
    wp_enqueue_script('mCustomScrollbar', get_template_directory_uri().'/js/jquery.mCustomScrollbar.concat.min.js', array(), false, true);
    wp_enqueue_script('jquery-countdown', get_template_directory_uri().'/js/jquery.countdown.js', array(), false, true);
    if ($map_paths) {
        wp_enqueue_script('contra-map', get_template_directory_uri().'/js/map-script.js', array(), false, true);
    }
    wp_enqueue_script('contra-main-script', get_template_directory_uri().'/js/script.js', array(), false, true);
    wp_enqueue_script('contra-jquery-cookie', get_template_directory_uri().'/js/jquery.cookie.js', array(), false, true);
    if (is_singular()) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'contra_enqueue_scripts');

/*-------------------------------------------------------------*/
function contra_theme_slug_fonts_url()
{
    $fonts_url = '';

    /* Translators: If there are characters in your language that are not
    * supported by Lora, translate this to 'off'. Do not translate
    * into your own language.
    */
    $arimo = _x('on', 'Arimo font: on or off', 'contra');
    $rubik = _x('on', 'Rubik font: on or off', 'contra');
    $benchnine = _x('on', 'BenchNine font: on or off', 'contra');


    if ('off' !== $arimo || 'off' !== $rubik || 'off' !== $benchnine) {
        $font_families = array();

        if ('off' !== $arimo) {
            $font_families[] = 'Arimo:400,400i,700,700i';
        }

        if ('off' !== $rubik) {
            $font_families[] = 'Rubik:300,300i,400,400i,500,500i,700,700i,900,900i';
        }

        if ('off' !== $benchnine) {
            $font_families[] = 'BenchNine:300,400,700';
        }

        $opt = get_option('contra'.'_theme_options');
        if (contra_set($opt, 'body_custom_font')) {
            if ($custom_font = contra_set($opt, 'body_font_family')) {
                $font_families[] = $custom_font . ':300,300i,400,400i,600,700';
            }
        }
        if (contra_set($opt, 'use_custom_font')) {
            $font_families[] = contra_set($opt, 'h1_font_family') . ':300,300i,400,400i,600,700';
            $font_families[] = contra_set($opt, 'h2_font_family') . ':300,300i,400,400i,600,700';
            $font_families[] = contra_set($opt, 'h3_font_family') . ':300,300i,400,400i,600,700';
            $font_families[] = contra_set($opt, 'h4_font_family') . ':300,300i,400,400i,600,700';
            $font_families[] = contra_set($opt, 'h5_font_family') . ':300,300i,400,400i,600,700';
            $font_families[] = contra_set($opt, 'h6_font_family') . ':300,300i,400,400i,600,700';
        }
        $font_families = array_unique($font_families);

        $query_args = array(
            'family' => urlencode(implode('|', $font_families)),
            'subset' => urlencode('latin,latin-ext'),
        );

        $protocol = is_ssl() ? 'https://' : 'http://';

        $fonts_url = add_query_arg($query_args, ''.$protocol.'fonts.googleapis.com/css');
    }

    return esc_url_raw($fonts_url);
}

function contra_load_admin_things()
{
    wp_enqueue_script('media-upload');
    wp_enqueue_script('thickbox');
    wp_enqueue_style('thickbox');
}

add_action('admin_enqueue_scripts', 'contra_load_admin_things');

function contra_theme_slug_scripts_styles()
{
    wp_enqueue_style('contra-theme-slug-fonts', contra_theme_slug_fonts_url(), array(), null);
}
add_action('wp_enqueue_scripts', 'contra_theme_slug_scripts_styles');
add_action('admin_enqueue_scripts', 'contra_theme_slug_scripts_styles');
/*---------------------------------------------------------------------*/
function contra_add_editor_styles()
{
    add_editor_style('editor-style.css');
}
add_action('admin_init', 'contra_add_editor_styles');
