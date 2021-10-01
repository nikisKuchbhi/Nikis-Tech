<?php $options = _WSH()->option();
    contra_bunch_global_variable();
    $icon_href = (contra_set($options, 'site_favicon')) ? contra_set($options, 'site_favicon') : get_template_directory_uri().'/images/favicon.ico';
 ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<?php if (! function_exists('has_site_icon') || ! has_site_icon()):?>
	<link rel="shortcut icon" href="<?php echo esc_url($icon_href);?>" type="image/x-icon">
	<link rel="icon" href="<?php echo esc_url($icon_href);?>" type="image/x-icon">
<?php endif;?>
<!-- Responsive -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div class="page-wrapper <?php if (contra_set($options, 'enable_rtl')) {
     echo 'rtl';
 } ?>">

    <?php if (contra_set($options, 'preloader')):?>
		<!-- Preloader -->
		<div class="preloader"></div>
	<?php endif;?>

    <?php if (function_exists('bunch_contact_form7')) {
     $header_style = contra_set($options, 'header_style');
     $meta = _WSH()->get_meta('_bunch_header_settings');
     $header_style1 = contra_set($meta, 'header_styles');
     $header_style2 = ($header_style1) ? $header_style1 : $header_style;
     $header_style3 = ($header_style2) ? $header_style2 : 'header_v7';

     if ('header_v1' === $header_style3) {
         get_template_part('includes/modules/header_v1');
     } elseif ('header_v2' === $header_style3) {
         get_template_part('includes/modules/header_v2');
     } elseif ('header_v3' === $header_style3) {
         get_template_part('includes/modules/header_v3');
     } elseif ('header_v4' === $header_style3) {
         get_template_part('includes/modules/header_v4');
     } elseif ('header_v5' === $header_style3) {
         get_template_part('includes/modules/header_v5');
     } elseif ('header_v6' === $header_style3) {
         get_template_part('includes/modules/header_v6');
     } elseif (class_exists('WooCommerce') && is_shop()) {
         get_template_part('includes/modules/header_v7');
     } else {
         get_template_part('includes/modules/header_v7');
     }
 } else {
     get_template_part('includes/modules/header_v7');
 }

    ?>
