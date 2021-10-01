<?php


/** Set ABSPATH for execution */
define('ABSPATH', dirname(dirname(__FILE__)) . '/');
define('WPINC', 'wp-includes');


/**
 * @ignore
 */
function add_filter()
{
}

/**
 * @ignore
 */
function esc_attr($str)
{
    return $str;
}

/**
 * @ignore
 */
function apply_filters()
{
}

/**
 * @ignore
 */
function get_option()
{
}

/**
 * @ignore
 */
function is_lighttpd_before_150()
{
}

/**
 * @ignore
 */
function add_action()
{
}

/**
 * @ignore
 */
function did_action()
{
}

/**
 * @ignore
 */
function do_action_ref_array()
{
}

/**
 * @ignore
 */
function get_bloginfo()
{
}

/**
 * @ignore
 */
function is_admin()
{
    return true;
}

/**
 * @ignore
 */
function site_url()
{
}

/**
 * @ignore
 */
function admin_url()
{
}

/**
 * @ignore
 */
function home_url()
{
}

/**
 * @ignore
 */
function includes_url()
{
}

/**
 * @ignore
 */
function wp_guess_url()
{
}

if (! function_exists('json_encode')) :
/**
 * @ignore
 */
function json_encode()
{
}
endif;



/* Convert hexdec color string to rgb(a) string */

function hex2rgba($color, $opacity = false)
{
    $default = 'rgb(0,0,0)';

    //Return default if no color provided
    if (empty($color)) {
        return $default;
    }

    //Sanitize $color if "#" is provided
    if ($color[0] == '#') {
        $color = substr($color, 1);
    }

    //Check if color has 6 or 3 characters and get values
    if (strlen($color) == 6) {
        $hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
    } elseif (strlen($color) == 3) {
        $hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
    } else {
        return $default;
    }

    //Convert hexadec to rgb
    $rgb =  array_map('hexdec', $hex);

    //Check if opacity is set(rgba or rgb)
    if ($opacity) {
        if (abs($opacity) > 1) {
            $opacity = 1.0;
        }
        $output = 'rgba('.implode(",", $rgb).','.$opacity.')';
    } else {
        $output = 'rgb('.implode(",", $rgb).')';
    }

    //Return rgb(a) color string
    return $output;
}
$yellow = $_GET['main_color'];

ob_start(); ?>

@charset "utf-8";
/* Theme Color */

.banner-section-six .social-links li a:hover span,
.banner-section-six .social-links li a:hover,
.banner-section-six .contact-info li a:hover,
.social-icon-three li a:hover,
.banner-section-five .content-box .video-link a,
.header-style-six .nav-toggler,
.header-style-six .contact-info li span,
.banner-section-two .slide-item .title,
.banner-carousel .owl-next:hover,
.banner-carousel .owl-prev:hover,
.banner-section .bottom-box .contact-info li span,
.main-header .search-box-btn,
.header-style-two .contact-info li span,
.service-block-two .caption-box h3 a:hover,
.main-header .contact-info li a:hover,
.shop-item .inner-box .lower-content .price,
.cart-table tbody tr .remove-btn,
.cart-section .totals-table .total .price,
.shop-item .inner-box .lower-content .rating .fa,
.sidebar .related-posts .post .rating .fa,
.sidebar .related-posts .post a,
.sidebar .related-posts .post a:hover,
.product-details .basic-details .details-header .rating,
.product-details .basic-details .details-header .item-price,
.comments-area .comment-box .rating,
.checkout-page .default-links li .fa,
.shop-comment-form .rating-box .rating a:hover,
.order-box ul li span,
.service-detail .prod-tabs .tab-btns .tab-btn:hover,
.service-detail .prod-tabs .tab-btns .tab-btn.active-btn,
.service-detail .inner-box ul li:before,
.help-box-two .inner .title,
.help-box-two .inner .theme-btn,
.help-box .inner .title,
.list-style-one li:before,
.main-footer .footer-column .widget-title:before,
.team-block .image-box .social-links li a:hover,
.page-title .bread-crumb li,
.header-style-four .header-top .top-right li a:hover,
.process-block .link-box a,
.banner-carousel-two .owl-next:hover,
.banner-carousel-two .owl-prev:hover,
.specialize-section-two .title-column .text-box h4,
.banner-section-three .social-links li a:hover span,
.banner-section-three .social-links li a:hover,
.banner-section-three .contact-info li a:hover,
.sidenav-bar .side-nav .navigation > li:hover > a,
.sidenav-bar .side-nav .navigation > li > ul > li:hover > a,
.sidenav-bar .side-nav .navigation > li.current > a,
.sidenav-bar .side-nav .navigation > li > ul > li.current > a,
.product-block .info-box .price,
.service-block .lower-content .link-box a:hover,
.service-block .lower-content h3 a:hover,
.banner-carousel-two .content-box .count,
.banner-carousel-two .link-box a,
.service-block-two .link-box a,
.banner-section-two .content-box .video-link a,
.header-style-two .nav-toggler,
.latest-news .post:hover h3 a,
.comments-area .comment-box .reply-btn,
.contact-page-section .contact-info .info-block p a:hover,
.time-counter .time-countdown .counter-column,
.error-section .error-title span,
.cat-list li.active a,
.cat-list li:hover a,
.cat-list li.active a span,
.cat-list li:hover a span,
.social-icon-two li a:hover,
.video-section .content-column .title,
.video-section .video-column .video-box .link .icon,
.news-block-four .inner-box:hover .content-box h3 a,
.news-block-four .content-box .info li a:hover,
.news-block .inner-box:hover .caption-box h3 a,
.news-block-two .blockquote h2 span,
.contact-section .info-column .contact-info li a:hover,
.recent-posts .post h4 a:hover,
.main-footer .links-widget .list li:hover:before,
.main-footer .links-widget .list li a:hover,
.news-block-three .inner-box:hover .content-box h3 a,
.news-block-three .content-box .info li a:hover,
.news-block-two .inner-box:hover .caption-box h3 a,
.news-block-two .caption-box .info li a:hover,
.products-carousel .owl-next:hover,
.products-carousel .owl-prev:hover,
.testimonial-block-two .info-box .name,
.testimonial-carousel-two .owl-next:hover,
.testimonial-carousel-two .owl-prev:hover,
.offer-section .form-column .upper-box .title,
.offer-section .form-column .upper-box .discount,
.testimonial-carousel .owl-next:hover,
.testimonial-carousel .owl-prev:hover,
.testimonial-block .info-box .designation,
.styled-pagination li.next-post a:hover,
.styled-pagination li.prev-post a:hover,
.projects-carousel-two .owl-next:hover,
.projects-carousel-two .owl-prev:hover,
.projects-section-two .upper-box .link-box a,
.project-block-two .info-box .link-box a,
.project-block .overlay-box .btn-box a:hover,
.feature-block .link-box a,
.process-block h4 a:hover,
.projects-carousel .owl-next:hover,
.projects-carousel .owl-prev:hover,
.carousel-outer .thumbs-carousel .owl-next:hover,
.carousel-outer .thumbs-carousel .owl-prev:hover,
.sticky-header .main-menu .navigation > li:hover > a,
.sticky-header .main-menu .navigation > li.current > a,
.sticky-header .main-menu .navigation > li.current-menu-item > a,
.main-menu .navigation > li.current > a,
.main-menu .navigation > li:hover > a,
.header-style-four .search-box-btn,
.main-header .search-box-btn:hover,
.list-style-two li:before,
.btn-style-eight,
.btn-style-four:hover,
a,
.sec-title strong,
.studio-section .content-column .inner-column .view-projects,
.fact-counter.fact-conter-two .count-outer .count-text,
.fact-counter.fact-conter-two .count-outer,
.main-header.header-style-four .main-menu .navigation > li.current_page_item > a,
.main-header.header-style-four .main-menu .navigation > li.current_page_item > a,
.main-header.header-style-three .main-menu .navigation > li.current_page_item > a,
.main-header.header-style-three .main-menu .navigation > li.current_page_item > a,
.offer-section .content-column .title,
.offer-section .content-column .discount,
.footer-widget ul li.page_item a:hover:before, .footer-widget ul li.page_item a:hover, .footer-widget ul li a:hover:before, .footer-widget ul li a:hover {
    color: #<?php echo esc_attr($yellow); ?>;
}


/*Background Color*/
.banner-section-five .owl-dot.active,
.shipping-form button,
.cart-section .coupon-btn,
.cart-section .cart-options .cart-btn,
.payment-box .payment-options li .radio-option label .small-text,
.shop-single .product-details .prod-tabs .tab-btns .tab-btn:hover,
.shop-single .product-details .prod-tabs .tab-btns .tab-btn.active-btn,
.range-slider-one .ui-widget-content .ui-state-default,
.range-slider-one .ui-state-default,
.scroll-to-top:hover,
.brochure-box:hover,
.blog-cat li.active a,
.blog-cat li a:hover,
.news-block .image-box .overlay-box,
.news-block-two .image-box .overlay-box,
.about-section .content-column .content-box .title h2:before,
.news-block-three .image-box .overlay-box,
.sidenav-bar .cross-icon:hover,
.header-style-three .nav-toggler:hover,
.header-style-two .nav-toggler:hover,
.main-footer .footer-bottom .inner-container:before,
.main-footer .footer-bottom .copyright-text,
.shop-item .inner-box .image .overlay-box .cart-option li a,
.sidebar .search-box .form-group input[type="submit"]:hover,
.sidebar .search-box .form-group button:hover,
.news-block-four .image-box .overlay-box,
.team-block .inner-box:hover .image-box .name,
.banner-section-two .owl-dot.active,
.cart-section .totals-table .proceed-btn,
.header-style-two .main-menu .navigation > li > a:before,
.feature-block .inner-box:hover,
.specialize-section-two .thumbs-carousel .thumb-box .overlay:before,
.process-block .inner-box:hover .count,
.services-carousel-two .owl-dot:hover,
.services-carousel-two .owl-dot.active,
.service-detail .image-box .owl-next:hover,
.service-detail .image-box .owl-prev:hover,
.services-carousel .owl-dot:hover,
.header-style-three .main-menu .navigation > li > a:before,
.services-carousel .owl-dot.active,
.accordion-box .block .acc-btn.active,
.main-header .header-top,
.header-style-two .nav-toggler:hover,
.main-header .cart-btn .count,
.btn-style-eight:hover,
.btn-style-six:hover,
.main-footer .gallery-widget .image a:before,
.btn-style-five,
.sticky-header .main-menu ul.navigation > li:hover > a::before,
.color-trigger:before,
.sticky-header .main-menu .navigation > li.current > a .menu-item_plus::before,
.sticky-header .main-menu .navigation > li.current > a .menu-item_plus::after,
.main-menu .navigation > li.current > a .menu-item_plus::before,
.main-menu .navigation > li.current > a .menu-item_plus::after,
.main-menu .navigation > li > ul > li.dropdown > a .menu-item_plus:before,
.main-menu .navigation > li > ul > li.dropdown > a .menu-item_plus:after,
.main-menu .navigation > li:hover > a .menu-item_plus:before,
.main-menu .navigation > li:hover > a .menu-item_plus:after,
.fluid-section-two:before,
.studio-section .image-column .image:before,
.studio-section .content-column .inner-column .sec-title .title:before,
.main-header.header-style-four .main-menu .navigation > li.menu-item-has-children.current > a .menu-item_plus::before,
.main-header.header-style-four .main-menu .navigation > li.menu-item-has-children.current > a .menu-item_plus::after,
.main-header.header-style-four .main-menu .navigation > li:hover > a .menu-item_plus::before,
.main-header.header-style-four .main-menu .navigation > li:hover > a .menu-item_plus::after,
.main-header.header-style-three .main-menu .navigation > li.menu-item-has-children.current > a .menu-item_plus::before,
.main-header.header-style-three .main-menu .navigation > li.menu-item-has-children.current > a .menu-item_plus::after,
.main-header.header-style-three .main-menu .navigation > li:hover > a.menu-item_plus::before,
.main-header.header-style-three .main-menu .navigation > li:hover > a.menu-item_plus::after,
.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt,
.main-header.header-style-one .main-menu .navigation > li.menu-item-has-children.current > a .menu-item_plus::before,
.main-header.header-style-one .main-menu .navigation > li.menu-item-has-children.current > a .menu-item_plus::after,
.main-header.header-style-one .main-menu .navigation > li:hover > a.menu-item_plus::before,
.main-header.header-style-one .main-menu .navigation > li:hover > a.menu-item_plus::after,
.main-header.header-style-one .main-menu .navigation > li.menu-item-has-children:hover > a .menu-item_plus::before,
.main-header.header-style-one .main-menu .navigation > li.menu-item-has-children:hover > a .menu-item_plus::after,
.dez-quik-search,
.main-header.header-style-two .main-menu .navigation > li.menu-item-has-children.current > a .menu-item_plus::before,
.main-header.header-style-two .main-menu .navigation > li.menu-item-has-children.current > a .menu-item_plus::after
{
    background-color: #<?php echo esc_attr($yellow); ?>;
}

.btn-style-two:hover, .btn-style-three:hover, .fact-counter .count-box:hover:before {
    box-shadow: #<?php echo esc_attr($yellow); ?> 0 0px 0px 40px inset;
}

.color-trigger, .color-palate-head {
    background: #<?php echo esc_attr($yellow); ?> none repeat scroll 0 0 !important;
}

.banner-section-six .shape-image {
    background: #<?php echo esc_attr($yellow); ?>;
}

/*Border Color*/

.checkout-form input:focus,
.checkout-form select:focus,
.checkout-form textarea:focus,
.banner-carousel .owl-next:hover:before,
.banner-carousel .owl-prev:hover:before,
.shop-comment-form .form-group input[type="text"]:focus,
.shop-comment-form .form-group input[type="password"]:focus,
.shop-comment-form .form-group input[type="tel"]:focus,
.shop-comment-form .form-group input[type="email"]:focus,
.shop-comment-form .form-group select:focus,
.shop-comment-form .form-group textarea:focus,
.range-slider-one .ui-state-default,
.range-slider-one .ui-widget-content .ui-state-default,
.login-form .form-group input[type="text"]:focus,
.login-form .form-group input[type="password"]:focus,
.login-form .form-group input[type="tel"]:focus,
.login-form .form-group input[type="email"]:focus,
.login-form .form-group select:focus,
.login-form .form-group textarea:focus,
.comment-form .form-group input:focus,
.comment-form .form-group select:focus,
.comment-form .form-group textarea:focus,
.contact-form .form-group input:focus,
.contact-form .form-group select:focus,
.contact-form .form-group textarea:focus,
.products-carousel .owl-next:hover:before,
.products-carousel .owl-prev:hover:before,
.testimonial-carousel-two .owl-next:hover:before,
.testimonial-carousel-two .owl-prev:hover:before,
.discount-form .form-group input:focus,
.discount-form .form-group select:focus,
.discount-form .form-group textarea:focus,
.styled-pagination li.next-post a:hover,
.banner-carousel-two .owl-next:hover:before,
.banner-carousel-two .owl-prev:hover:before,
.styled-pagination li.prev-post a:hover,
.accordion-box .block .acc-btn.active,
.fact-counter .count-box:before,
.process-block .inner-box:hover,
.projects-carousel .owl-next:hover:before,
.projects-carousel .owl-prev:hover:before,
.sidebar .search-box .form-group input:focus,
.brochure-box:hover,
.faq-form .form-group input:focus,
.faq-form .form-group select:focus,
.faq-form .form-group textarea:focus,
.mixitup-gallery .filters li.active,
.mixitup-gallery .filters li:hover,
.carousel-outer .thumbs-carousel .owl-next:hover:before,
.carousel-outer .thumbs-carousel .owl-prev:hover:before,
.main-header .search-panel input:focus,
.main-header .search-panel select:focus,
.btn-style-eight,
.btn-style-two:hover,
.btn-style-two {
    border-color: #<?php echo esc_attr($yellow); ?>;
}

.payment-box .payment-options li .radio-option label .small-text:before,
.rtl .main-footer .footer-bottom .copyright-text:before,
.main-footer .footer-bottom .copyright-text:before{
    border-bottom-color: #<?php echo esc_attr($yellow); ?>;
}

.comments-area .comment-box .reply-btn a {
    border: 1px solid #<?php echo esc_attr($yellow); ?>;
    color: #<?php echo esc_attr($yellow); ?>;
}

.cat-list li:hover,
.cat-list li.active,
.main-menu .navigation > li .mega-menu-bar .column > ul > li > a:hover,
.main-menu .navigation > li > ul > li  > ul > li > a:hover,
.main-menu .navigation > li > ul > li:hover > a{
    border-left-color: #<?php echo esc_attr($yellow); ?>;
}

.rtl .cat-list li.active,
.rtl .cat-list li:hover,
.rtl .main-menu .navigation > li .mega-menu-bar .column > ul > li > a:hover,
.rtl .main-menu .navigation > li > ul > li > ul > li:hover > a,
.rtl .main-menu .navigation > li > ul > li:hover > a{
    border-right-color: #<?php echo esc_attr($yellow); ?>;
}

.btn-style-two:hover,
.btn-style-three:hover,
.fact-counter .count-box:hover:before{
    box-shadow: #<?php echo esc_attr($yellow); ?>; 0 0px 0px 40px inset;
}

/*=== Gradient Color ===*/
.banner-carousel-three .owl-prev,
.banner-carousel-three .owl-next,
.btn-style-one{
    background: #<?php echo esc_attr($yellow); ?> !important;
}

.fact-counter .count-box:hover:before{
    -webkit-box-shadow: #<?php echo esc_attr($yellow); ?> 0 0px 0px 40px inset;
    -moz-box-shadow: #<?php echo esc_attr($yellow); ?> 0 0px 0px 40px inset;
    -ms-box-shadow: #<?php echo esc_attr($yellow); ?> 0 0px 0px 40px inset;
    -o-box-shadow: #<?php echo esc_attr($yellow); ?> 0 0px 0px 40px inset;
    box-shadow: #<?php echo esc_attr($yellow); ?> 0 0px 0px 40px inset;
}


.main-header .search-box-btn {
    border: 1px dashed #<?php echo esc_attr($yellow); ?>;
}

@media only screen and (max-width: 767px){

    .main-menu .navbar-header .navbar-toggler .icon{
        color: #<?php echo esc_attr($yellow); ?>;
    }

    .main-menu .navbar-header .navbar-toggle,
    .main-menu .navbar-collapse > .navigation,
    .main-menu .navbar-collapse > .navigation > li > ul,
    .main-menu .navbar-collapse > .navigation > li > ul > li > ul,
    .main-menu .navbar-collapse > .navigation > li > a,
    .main-menu .navbar-collapse > .navigation > li > ul > li > a,
    .main-menu .navbar-collapse > .navigation > li > ul > li > ul > li > a,
    .main-menu .navbar-collapse > .navigation > li > a:hover,
    .main-menu .navbar-collapse > .navigation > li > a:active,
    .main-menu .navbar-collapse > .navigation > li > a:focus,
    .main-menu .navbar-collapse > .navigation > li:hover > a,
    .main-menu .navbar-collapse > .navigation > li > ul > li:hover > a,
    .main-menu .navbar-collapse > .navigation > li > ul > li > ul > li:hover > a,
    .main-menu .navigation > li .mega-menu-bar .column > ul > li > a,
    .main-menu .navigation > li .mega-menu-bar .column > ul > li:hover > a,
    .main-menu .navigation > li .mega-menu-bar .column > ul > li > a,
    .main-menu .navigation > li .mega-menu-bar .column > ul > li:hover > a,
    .main-menu .navbar-collapse > .navigation > li.current > a,
    .main-menu .navbar-collapse > .navigation > li.current-menu-item > a{
        background-color: #<?php echo esc_attr($yellow); ?>;
    }


<?php

$out = ob_get_clean();
$expires_offset = 31536000; // 1 year
header('Content-Type: text/css; charset=UTF-8');
header('Expires: ' . gmdate("D, d M Y H:i:s", time() + $expires_offset) . ' GMT');
header("Cache-Control: public, max-age=$expires_offset");
header('Vary: Accept-Encoding'); // Handle proxies
header('Content-Encoding: gzip');

echo gzencode($out);
exit;
