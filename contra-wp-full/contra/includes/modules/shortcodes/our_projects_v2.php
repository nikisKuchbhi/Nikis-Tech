<?php
$paged = get_query_var('paged');
$args = array('post_type' => 'bunch_projects', 'showposts'=>$num, 'orderby'=>$sort, 'order'=>$order, 'paged'=>$paged);
$terms_array = explode(",", $exclude_cats);
if ($exclude_cats) {
    $args['tax_query'] = array(array('taxonomy' => 'projects_category','field' => 'id','terms' => $terms_array,'operator' => 'NOT IN',));
}
$query = new WP_Query($args);

$t = $GLOBALS['_bunch_base'];

$data_filtration = '';
$data_posts = '';
?>

<?php if ($query->have_posts()):

ob_start();?>

    <?php $count = 0;
    $fliteration = array();?>
    <?php while ($query->have_posts()): $query->the_post();
        global  $post;
        $meta = get_post_meta(get_the_id(), '_bunch_projects_meta', true);//printr($meta);
        $meta1 = _WSH()->get_meta();
        $post_terms = get_the_terms(get_the_id(), 'projects_category');// printr($post_terms); exit();
        foreach ((array)$post_terms as $pos_term) {
            $fliteration[$pos_term->term_id] = $pos_term;
        }
        $temp_category = get_the_term_list(get_the_id(), 'projects_category', '', ', ');
    ?>
        <?php $post_terms = wp_get_post_terms(get_the_id(), 'projects_category');
        $term_slug = '';
        if ($post_terms) {
            foreach ($post_terms as $p_term) {
                $term_slug .= $p_term->slug.' ';
            }
        }?>

            <?php
                $post_thumbnail_id = get_post_thumbnail_id($post->ID);
                $post_thumbnail_url = wp_get_attachment_url($post_thumbnail_id);
            ?>

            <!-- Project Block -->
            <div class="project-block all mix <?php echo esc_attr($term_slug); ?> <?php if (contra_set($meta1, 'extra_width') == 'extra_width') {
                echo 'col-lg-8 col-md-6 col-sm-12';
            } elseif (contra_set($meta1, 'extra_width') == 'midum_width') {
                echo 'col-lg-6 col-md-6 col-sm-12';
            } else {
                echo 'col-lg-4 col-md-6 col-sm-12';
            }?>">
                <div class="image-box">
                    <figure class="image">
                        <?php if (contra_set($meta1, 'extra_width') == 'extra_width') {
                $image_size = 'contra_770x490';
            } elseif (contra_set($meta1, 'extra_width') == 'midum_width') {
                $image_size = 'contra_570x490';
            } else {
                $image_size = 'contra_370x490';
            }
                          the_post_thumbnail($image_size);
                        ?>
                    </figure>
                    <div class="overlay-box">
                        <h4><a href="<?php echo esc_url(get_the_permalink(get_the_id()));?>"><?php the_title(); ?></a></h4>
                        <div class="btn-box">
                            <a href="<?php echo esc_url($post_thumbnail_url);?>" class="lightbox-image" data-fancybox="gallery"><i class="fa fa-search"></i></a>
                            <a href="<?php echo esc_url(get_the_permalink(get_the_id()));?>"><i class="fa fa-external-link"></i></a>
                        </div>
                        <?php $term_list = wp_get_post_terms(get_the_id(), 'projects_category', array("fields" => "names")); ?>
                         <span class="tag"><?php echo implode(', ', (array)$term_list);?></span>
                    </div>
                </div>
            </div>


<?php endwhile;?>

<?php wp_reset_postdata();
$data_posts = ob_get_contents();
ob_end_clean();

endif ;
ob_start();?>

<?php $terms = get_terms(array('projects_category')); ?>

<!-- Projects Section -->
<section class="projects-section alternate">
    <div class="auto-container">
         <!--MixitUp Galery-->
        <div class="mixitup-gallery">
            <!--Filter-->
            <div class="filters text-center clearfix">
                <ul class="filter-tabs filter-btns clearfix">
                    <li class="active filter" data-role="button" data-filter="all"><?php esc_attr_e('All', 'contra');?></li>
                    <?php foreach ($fliteration as $t): ?>
                    <li class="filter" data-role="button" data-filter=".<?php echo esc_attr(contra_set($t, 'slug')); ?>"><?php echo wp_kses_post(contra_set($t, 'name')); ?></li>
                    <?php endforeach;?>
                </ul>
            </div>

            <div class="filter-list row">
               <?php echo wp_kses_post($data_posts); ?>
            </div>
        </div>

        <!--Post Share Options-->
        <div class="styled-pagination clearfix">
            <?php contra_the_pagination(array('total'=>$query->max_num_pages, 'next_text' => '<i class="fa fa-long-arrow-right"></i>', 'prev_text' => '<i class="fa fa-long-arrow-left"></i>')); ?>
        </div>
    </div>
</section>
