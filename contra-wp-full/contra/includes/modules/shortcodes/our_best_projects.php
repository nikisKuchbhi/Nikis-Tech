<?php
   $count = 1;
   $query_args = array('post_type' => 'bunch_projects' , 'showposts' => $num , 'order_by' => $sort , 'order' => $order);
   if ($cat) {
       $query_args['projects_category'] = $cat;
   }
   $query = new WP_Query($query_args) ;
   ?>
<?php if ($query->have_posts()):  ?>

<!-- Projects Section Two -->
<section class="projects-section-two">
    <div class="auto-container">
        <div class="upper-box clearfix">
            <div class="sec-title">
                <span class="float-text"><?php echo wp_kses_post($bg_title); ?></span>
                <h2><?php echo wp_kses_post($title); ?></h2>
            </div>
            <div class="link-box"><a href="<?php echo esc_url($btn_link); ?>"><?php echo wp_kses_post($btn_title); ?> <i class="fa fa-long-arrow-right"></i></a></div>
        </div>
        <div class="projects-carousel-two owl-carousel owl-theme">
            <?php while ($query->have_posts()): $query->the_post();
                global $post ;
                $project_meta = _WSH()->get_meta();
            ?>
            <!-- Project Block -->
            <div class="project-block-two">
                <div class="image-box">
                    <figure class="image"><?php the_post_thumbnail('contra_970x520'); ?></figure>
                </div>
                <div class="info-box">
                    <div class="inner-box">
                        <?php $term_list = wp_get_post_terms(get_the_id(), 'projects_category', array("fields" => "names")); ?>
                         <span class="title"><?php echo implode(', ', (array)$term_list);?></span>
                        <h3><?php the_title(); ?></h3>
                        <div class="text"><?php echo wp_kses_post(contra_trim(get_the_content(), $text_limit)); ?></div>
                        <div class="link-box"><a href="<?php echo esc_url(get_the_permalink(get_the_id()));?>"><?php esc_html_e('View Project', 'contra'); ?></a></div>
                    </div>
                </div>
            </div>
            <?php endwhile;?>
        </div>
    </div>
</section>
<!--End Projects Section Two -->

<?php endif; wp_reset_postdata(); ?>
