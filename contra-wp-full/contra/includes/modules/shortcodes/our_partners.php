<?php if ($style_two == 'three'):?>

<!--Clients Section-->
<section class="clients-section style-two">
    <div class="auto-container">
        <div class="sponsors-outer">
            <!--Sponsors Carousel-->
            <ul class="sponsors-carousel owl-carousel owl-theme">
                <?php foreach ($atts['sponsors'] as $key => $item): ?>
                <li class="slide-item"><figure class="image-box"><a href="<?php echo esc_url($item->link); ?>"><img src="<?php echo esc_url($item->image); ?>" alt="<?php esc_attr_e('Partner Image', 'contra');?>"></a></figure></li>
                <?php endforeach;?>
            </ul>
        </div>
    </div>
</section>
<!--End Clients Section-->

<?php elseif ($style_two == 'two'):?>

<!--Clients Section-->
<section class="clients-section style-two" style="background-image: url('<?php echo esc_url($bg_img); ?>');">
    <div class="auto-container">
        <div class="sponsors-outer">
            <!--Sponsors Carousel-->
            <ul class="sponsors-carousel owl-carousel owl-theme">
                <?php foreach ($atts['sponsors'] as $key => $item): ?>
                <li class="slide-item"><figure class="image-box"><a href="<?php echo esc_url($item->link); ?>"><img src="<?php echo esc_url($item->image); ?>" alt="<?php esc_attr_e('Partner Image', 'contra');?>"></a></figure></li>
                <?php endforeach;?>
            </ul>
        </div>
    </div>
</section>
<!--End Clients Section-->

<?php else: ?>

<!--Clients Section-->
<section class="clients-section">
    <div class="inner-container">
        <div class="sponsors-outer">
            <!--Sponsors Carousel-->
            <ul class="sponsors-carousel owl-carousel owl-theme">
                <?php foreach ($atts['sponsors'] as $key => $item): ?>
                <li class="slide-item"><figure class="image-box"><a href="<?php echo esc_url($item->link); ?>"><img src="<?php echo esc_url($item->image); ?>" alt="<?php esc_attr_e('Partner Image', 'contra');?>"></a></figure></li>
                <?php endforeach;?>
            </ul>
        </div>
    </div>
</section>
<!--End Clients Section-->

<?php endif; ?>
