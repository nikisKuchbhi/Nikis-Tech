<?php $options = _WSH()->option();
    get_header();
    $meta = _WSH()->get_meta('_bunch_header_settings');
    $bg = contra_set($meta, 'header_img');
    $title = contra_set($meta, 'header_title');
    $text = contra_set($meta, 'header_text');
?>

<!--Page Title-->
<section class="page-title" <?php if ($bg):?>style="background-image:url(<?php echo esc_url($bg)?>);"<?php endif;?>>
    <div class="auto-container">
        <div class="inner-container clearfix">
            <div class="title-box">
                <h1><?php if ($title) {
    echo wp_kses_post($title);
} else {
    wp_title('');
}?></h1>
                <?php if ($text): ?>
                    <span class="title"><?php echo wp_kses_post($text) ;?></span>
                <?php endif; ?>
            </div>
            <?php echo wp_kses_post(contra_get_the_breadcrumb()); ?>
        </div>
    </div>
</section>
<!--End Page Title-->

<?php while (have_posts()): the_post();
    $team_meta = _WSH()->get_meta();
    $designation = contra_set($team_meta, 'designation');
?>

<!--Team Single Section-->
<section class="team-single-section">
    <div class="auto-container">
        <!--Team Detail-->
        <div class="team-detail">
            <div class="row clearfix">

                <!--Content Column-->
                <div class="content-column col-lg-7 col-md-12 col-sm-12">
                    <div class="inner-box">
                        <h2><?php the_title(); ?></h2>
                        <div class="title"><?php echo wp_kses_post($designation); ?></div>

                        <!--Social Icon One-->
                        <?php if ($socials = contra_set($team_meta, 'bunch_team_social')):?>
                            <ul class="social-icon-three">
                                <?php foreach ($socials as $key => $value):?>
                                    <li><a target="_blank" href="<?php echo esc_url(contra_set($value, 'social_link'));?>"><span class="fa <?php echo esc_attr(contra_set($value, 'social_icon'));?>"></span></a></li>
                                <?php endforeach;?>
                            </ul>
                        <?php endif;?>

                        <!--Skills Box-->
                        <div class="skills-box">
                            <h3><?php echo wp_kses_post($sub_title); ?></h3>

                            <?php if ($summary = contra_set($team_meta, 'bunch_team_summary')) :  ?>
                                <!--Progress Levels-->
                                <div class="progress-levels">
                                    <?php foreach ($summary as $key => $value) : ?>
                                    <!--Skill Box-->
                                    <div class="progress-box wow">
                                        <div class="box-title"><?php echo esc_attr(contra_set($value, 'title1'));?></div>
                                        <div class="inner">
                                            <div class="bar">
                                                <div class="bar-innner"><div class="bar-fill" data-percent="<?php echo esc_attr(contra_set($value, 'fill_bar_value'));?>"></div></div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endforeach;?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <!--Image Column-->
                <div class="image-column col-lg-5 col-md-12 col-sm-12">
                    <div class="image">
                        <?php the_post_thumbnail('contrax366x495');  ?>
                    </div>
                </div>

            </div>
            <div class="text">
                <?php the_content();  ?>
            </div>
        </div>

    </div>
</section>

<?php endwhile;?>

<?php get_footer(); ?>
