<?php  
   $count = 1;
   $query_args = array('post_type' => 'bunch_projects' , 'showposts' => $num , 'order_by' => $sort , 'order' => $order);
   if( $cat ) $query_args['projects_category'] = $cat;
   $query = new WP_Query($query_args) ; 
   ?>
<?php if($query->have_posts()):  ?>

<!-- Project Section -->
<section class="projects-section">
    <div class="auto-container">
        <div class="sec-title text-right">
            <span class="float-text"><?php echo wp_kses_post($bg_title); ?></span>
            <h2><?php echo wp_kses_post($title); ?></h2>
        </div>
    </div>
    
    <div class="inner-container">
        <div class="projects-carousel owl-carousel owl-theme">
            <?php while($query->have_posts()): $query->the_post();
				global $post ; 
				$project_meta = _WSH()->get_meta();
				
				$post_thumbnail_id = get_post_thumbnail_id($post->ID);
				$post_thumbnail_url = wp_get_attachment_url( $post_thumbnail_id );
			?>
            <!-- Project Block -->
            <div class="project-block">
                <div class="image-box">
                    <figure class="image"><?php the_post_thumbnail('contra_337x429'); ?></figure>
                    <div class="overlay-box">
                        <h4><a href="<?php echo esc_url(get_the_permalink(get_the_id()));?>"><?php the_title(); ?></a></h4>
                        <div class="btn-box">
                            <a href="<?php echo esc_url($post_thumbnail_url); ?>" class="lightbox-image" data-fancybox="gallery"><i class="fa fa-search"></i></a>
                            <a href="<?php echo esc_url(get_the_permalink(get_the_id()));?>"><i class="fa fa-external-link"></i></a>
                        </div>
                        <?php $term_list = wp_get_post_terms(get_the_id(), 'projects_category', array("fields" => "names")); ?>
                         <span class="tag"><?php echo implode( ', ', (array)$term_list );?></span>
                    </div>
                </div>
            </div>
            <?php endwhile;?>
        </div>
    </div>
</section>
<!--End Project Section -->

<?php endif; wp_reset_postdata(); ?>