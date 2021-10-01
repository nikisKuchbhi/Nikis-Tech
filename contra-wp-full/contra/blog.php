<?php $meta = _WSH()->get_meta();
    $post_thumbnail_id = get_post_thumbnail_id($post->ID);
    $post_thumbnail_url = wp_get_attachment_url($post_thumbnail_id);
?>

<?php
    $format = get_post_format(get_the_id());
    if ($format == 'video') :
?>

<!-- News Block -->
<div class="news-block-two wow fadeIn">
    <div class="inner-box">
        <?php if (has_post_thumbnail()):?>
        <div class="image-box">
            <figure class="image"><img src="<?php echo esc_url($post_thumbnail_url);?>" alt="<?php esc_attr_e('Thumbnail Image', 'contra');?>"></figure>
            <a href="<?php echo esc_url(contra_set($meta, 'video')); ?>" class="link" data-fancybox="gallery" data-caption=""><span class="icon fa fa-play"></span></a>
        </div>
        <?php endif; ?>
        <div class="caption-box">
            <div class="inner">
                <h3><a href="<?php echo esc_url(get_the_permalink(get_the_id())); ?>"><?php the_title(); ?></a></h3>
                <ul class="info">
                    <li><?php echo get_the_date(); ?>,</li>
                    <li><a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><?php the_author(); ?></a></li>
                    <li><a href="<?php echo esc_url(get_permalink(get_the_id()).'#comments'); ?>"><?php comments_number(wp_kses_post(__('0 Comments', 'contra')), wp_kses_post(__('1 Comment', 'contra')), wp_kses_post(__('% Comments', 'contra'))); ?></a></li>
                </ul>
                <div class="text"><?php the_excerpt();?></div>
            </div>
        </div>
    </div>
</div>

<?php elseif ($format == 'gallery') :  ?>

<!-- News Block -->
<div class="news-block-two wow fadeIn">
    <div class="inner-box">
        <div class="image-box">
            <div class="single-item-carousel owl-carousel owl-theme">
                <?php $gall_images = contra_set($meta, 'gallery_imgs');
                    if ($gall_images) :
                    foreach ($gall_images as $k => $gal_img) :
                ?>
                <figure class="image"><a href="<?php echo esc_url(get_the_permalink(get_the_id())); ?>"><img src="<?php echo esc_url(contra_set($gal_img, 'gallery_image')); ?>" alt="<?php esc_attr_e('Gallery Image', 'contra');?>"></a></figure>
                <?php endforeach; endif; ?>
            </div>
        </div>

        <div class="caption-box">
            <div class="inner">
                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                <ul class="info">
                    <li><?php echo get_the_date(); ?>,</li>
                    <li><a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><?php the_author(); ?></a></li>
                    <li><a href="<?php echo esc_url(get_permalink(get_the_id()).'#comments'); ?>"><?php comments_number(wp_kses_post(__('0 Comments', 'contra')), wp_kses_post(__('1 Comment', 'contra')), wp_kses_post(__('% Comments', 'contra'))); ?></a></li>
                </ul>
                <div class="text"><?php the_excerpt();?></div>
            </div>
        </div>
    </div>
</div>

<?php elseif ($format == 'quote') :  ?>

<!-- News Block -->
<div class="news-block-two wow fadeIn">
    <div class="inner-box">
        <?php if (has_post_thumbnail()):

            $post_thumbnail_id = get_post_thumbnail_id($post->ID);
            $post_thumbnail_url = wp_get_attachment_url($post_thumbnail_id);
        ?>
        <div class="image-box" style="background-image: url(<?php echo esc_url($post_thumbnail_url); ?>);">
            <div class="blockquote">
                <span class="icon fa fa-quote-left"></span>
                <h2><?php echo wp_kses_post(contra_set($meta, 'quote_description')); ?></h2>
                <span class="author"><?php echo wp_kses_post(contra_set($meta, 'author_name')); ?></span>
            </div>
        </div>
        <?php endif; ?>
        <div class="caption-box">
            <div class="inner">
                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                <ul class="info">
                    <li><?php echo get_the_date(); ?>,</li>
                    <li><a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><?php the_author(); ?></a></li>
                    <li><a href="<?php echo esc_url(get_permalink(get_the_id()).'#comments'); ?>"><?php comments_number(wp_kses_post(__('0 Comments', 'contra')), wp_kses_post(__('1 Comment', 'contra')), wp_kses_post(__('% Comments', 'contra'))); ?></a></li>
                </ul>
                <div class="text"><?php the_excerpt();?></div>
            </div>
        </div>
    </div>
</div>

<?php else: ?>

<!-- News Block -->
<div class="news-block-two wow fadeIn">
    <div class="inner-box">
        <?php if (has_post_thumbnail()): ?>
        <div class="image-box">
            <figure class="image"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('contra_1170x400'); ?></a></figure>
        </div>
        <?php endif; ?>
        <div class="caption-box">
            <div class="inner">
                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                <ul class="info">
                    <li><?php echo get_the_date(); ?>,</li>
                    <li><a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><?php the_author(); ?></a></li>
                    <li><a href="<?php echo esc_url(get_permalink(get_the_id()).'#comments'); ?>"><?php comments_number(wp_kses_post(__('0 Comments', 'contra')), wp_kses_post(__('1 Comment', 'contra')), wp_kses_post(__('% Comments', 'contra'))); ?></a></li>
                </ul>
                <div class="text"><?php the_excerpt();?></div>
            </div>
        </div>
    </div>
</div>

<?php endif; ?>
