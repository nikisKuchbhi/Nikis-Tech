<?php
   $count = 1;
   $query_args = array('post_type' => 'bunch_team' , 'showposts' => $num , 'order_by' => $sort , 'order' => $order);
   if ($cat) {
       $query_args['team_category'] = $cat;
   }
   $query = new WP_Query($query_args) ;
   ?>
<?php if ($query->have_posts()):  ?>

<?php if ($style_two == 'two'):?>

<!-- Team Section -->
<section class="team-section">
    <div class="auto-container">
        <div class="sec-title">
            <span class="float-text"><?php echo wp_kses_post($upper_title); ?></span>
            <h2><?php echo wp_kses_post($title); ?></h2>
        </div>

        <div class="row clearfix">
            <?php while ($query->have_posts()): $query->the_post();
                global $post ;
                $team_meta = _WSH()->get_meta();
            ?>
            <!-- Team Block -->
            <div class="team-block col-lg-4 col-md-6 col-sm-12">
                <div class="inner-box">
                    <div class="image-box">
                        <div class="image"><a href="<?php echo esc_url(get_the_permalink(get_the_id())); ?>"><?php the_post_thumbnail('contra_320x470'); ?></a></div>
                        <?php if ($socials = contra_set($team_meta, 'bunch_team_social')):?>
                        <ul class="social-links">
                            <?php foreach ($socials as $key => $value):?>
                                <li><a href="<?php echo esc_url(contra_set($value, 'social_link'));?>"><i class="fa <?php echo esc_attr(contra_set($value, 'social_icon'));?>"></i></a></li>
                            <?php endforeach;?>
                        </ul>
                        <?php endif;?>
                        <h3 class="name"><a href="<?php echo esc_url(get_the_permalink(get_the_id())); ?>"><?php the_title(); ?></a></h3>
                    </div>
                    <span class="designation"><?php echo wp_kses_post(contra_set($team_meta, 'designation'));?></span>
                </div>
            </div>
            <?php endwhile;?>
        </div>
    </div>
</section>
<!--End Team Section -->

<?php else: ?>

<!-- Team Section -->
<section class="team-section">
    <div class="auto-container">
        <div class="sec-title text-center">
            <span class="float-text"><?php echo wp_kses_post($upper_title); ?></span>
            <h2><?php echo wp_kses_post($title); ?></h2>
        </div>

        <div class="row clearfix">
            <?php while ($query->have_posts()): $query->the_post();
                global $post ;
                $team_meta = _WSH()->get_meta();
            ?>
            <!-- Team Block -->
            <div class="team-block col-lg-4 col-md-6 col-sm-12">
                <div class="inner-box">
                    <div class="image-box">
                        <div class="image"><a href="<?php echo esc_url(get_the_permalink(get_the_id())); ?>"><?php the_post_thumbnail('contra_320x470'); ?></a></div>
                        <?php if ($socials = contra_set($team_meta, 'bunch_team_social')):?>
                        <ul class="social-links">
                            <?php foreach ($socials as $key => $value):?>
                                <li><a href="<?php echo esc_url(contra_set($value, 'social_link'));?>"><i class="fa <?php echo esc_attr(contra_set($value, 'social_icon'));?>"></i></a></li>
                            <?php endforeach;?>
                        </ul>
                        <?php endif;?>
                        <h3 class="name"><a href="<?php echo esc_url(get_the_permalink(get_the_id())); ?>"><?php the_title(); ?></a></h3>
                    </div>
                    <span class="designation"><?php echo wp_kses_post(contra_set($team_meta, 'designation'));?></span>
                </div>
            </div>
            <?php endwhile;?>
        </div>
    </div>
</section>
<!--End Team Section -->

<?php endif; endif; wp_reset_postdata(); ?>
