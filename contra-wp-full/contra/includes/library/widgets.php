<?php
///----footer widgets---
//About Us
class Bunch_About_us extends WP_Widget
{

    /** constructor */
    public function __construct()
    {
        parent::__construct( /* Base ID */'Bunch_About_us', /* Name */esc_html__('Contra About Us', 'contra'), array( 'description' => esc_html__('Show the information about company', 'contra')));
    }

    /** @see WP_Widget::widget */
    public function widget($args, $instance)
    {
        extract($args);

        echo wp_kses_post($before_widget);

        $footer_logo = ($instance['footer_logo']) ? ($instance['footer_logo']) : get_template_directory_uri() . '/images/footer-logo.svg'; ?>
            <div class="about-widget">
                <div class="footer-logo">
                    <figure>
                        <a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo esc_url($footer_logo); ?>" alt="<?php esc_attr_e('Footer Logo', 'contra'); ?>"></a>
                    </figure>
                </div>
                <div class="widget-content">
                    <div class="text"><?php echo wp_kses_post($instance['content']); ?></div>
                </div>
            </div>

        <?php

        echo wp_kses_post($after_widget);
    }


    /** @see WP_Widget::update */
    public function update($new_instance, $old_instance)
    {
        $instance = $old_instance;

        $instance['footer_logo'] = strip_tags($new_instance['footer_logo']);
        $instance['content'] = $new_instance['content'];

        return $instance;
    }

    /** @see WP_Widget::form */
    public function form($instance)
    {
        $footer_logo = ($instance) ? esc_attr($instance['footer_logo']) : '';
        $content = ($instance) ? esc_attr($instance['content']) : ''; ?>

        <p>
          <label for="<?php echo esc_attr($this->get_field_id('footer_logo')); ?>"><?php echo esc_html__('Add Logotype image:', 'contra')?></label><br />
            <img class="experts_media_image" src="<?php if (!empty($instance['footer_logo'])) {
            echo esc_url($instance['footer_logo']);
        } ?>" />
            <input type="text" class="widefat experts_media_url" name="<?php echo esc_attr($this->get_field_name('footer_logo')); ?>" id="<?php echo esc_attr($this->get_field_id('footer_logo')); ?>" value="<?php echo esc_attr($footer_logo); ?>">
            <a href="#" class="button experts_media_upload"><?php esc_html_e('Upload', 'contra'); ?></a>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('content')); ?>"><?php esc_html_e('Content:', 'contra'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('content')); ?>" name="<?php echo esc_attr($this->get_field_name('content')); ?>" ><?php echo wp_kses_post($content); ?></textarea>
        </p>

        <?php
    }
}

//Recent Posts
class Bunch_Recent_Posts extends WP_Widget
{
    /** constructor */
    public function __construct()
    {
        parent::__construct( /* Base ID */'Bunch_Recent_Posts', /* Name */esc_html__('Contra Recent Posts', 'contra'), array( 'description' => esc_html__('Show the Recent Posts', 'contra')));
    }


    /** @see WP_Widget::widget */
    public function widget($args, $instance)
    {
        extract($args);
        $title = apply_filters('widget_title', $instance['title']);

        echo wp_kses_post($before_widget); ?>

        <!-- Latest News -->
        <div class="recent-posts">
            <?php echo wp_kses_post($before_title.$title.$after_title); ?>
             <!--Footer Column-->
            <div class="widget-content">
                <?php $query_string = 'posts_per_page='.$instance['number'];
        if ($instance['cat']) {
            $query_string .= '&cat='.$instance['cat'];
        }
        $this->posts($query_string); ?>
            </div>
        </div>

        <?php echo wp_kses_post($after_widget);
    }


    /** @see WP_Widget::update */
    public function update($new_instance, $old_instance)
    {
        $instance = $old_instance;

        $instance['title'] = strip_tags($new_instance['title']);
        $instance['number'] = $new_instance['number'];
        $instance['cat'] = $new_instance['cat'];

        return $instance;
    }

    /** @see WP_Widget::form */
    public function form($instance)
    {
        $title = ($instance) ? esc_attr($instance['title']) : esc_html__('Recent Posts', 'contra');
        $number = ($instance) ? esc_attr($instance['number']) : 2;
        $cat = ($instance) ? esc_attr($instance['cat']) : ''; ?>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title: ', 'contra'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('number')); ?>"><?php esc_html_e('No. of Posts:', 'contra'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('number')); ?>" name="<?php echo esc_attr($this->get_field_name('number')); ?>" type="text" value="<?php echo esc_attr($number); ?>" />
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('cat')); ?>"><?php esc_html_e('Category', 'contra'); ?></label>
            <?php wp_dropdown_categories(array('show_option_all'=>esc_html__('All Categories', 'contra'), 'selected'=>$cat, 'class'=>'widefat', 'name'=>$this->get_field_name('cat'))); ?>
        </p>

        <?php
    }

    public function posts($query_string)
    {
        $query = new WP_Query($query_string);
        if ($query->have_posts()):?>

            <!-- Title -->
            <?php while ($query->have_posts()): $query->the_post(); ?>
            <div class="post">
                <div class="thumb"><a href="<?php echo esc_url(get_permalink(get_the_id())); ?>"><?php the_post_thumbnail('contra_80x70'); ?></a></div>
                <h4><a href="<?php echo esc_url(get_permalink(get_the_id())); ?>"><?php echo wp_trim_words(get_the_title(), 6, '...'); ?></a></h4>
                <ul class="info">
                    <li><?php echo get_the_date('d M'); ?></li>
                    <li><?php comments_number(wp_kses_post(__('0', 'contra')), wp_kses_post(__('1 Comment', 'contra')), wp_kses_post(__('% Comments', 'contra'))); ?></li>
                </ul>
            </div>
            <?php endwhile; ?>

        <?php endif;
        wp_reset_postdata();
    }
}

//Recent Works
class Bunch_Recent_Works extends WP_Widget
{
    /** constructor */
    public function __construct()
    {
        parent::__construct( /* Base ID */'Bunch_Recent_Works', /* Name */esc_html__('Contra Recent Works', 'contra'), array( 'description' => esc_html__('Show the Recent Works', 'contra')));
    }

    /** @see WP_Widget::widget */
    public function widget($args, $instance)
    {
        extract($args);
        $title = apply_filters('widget_title', $instance['title']);

        echo wp_kses_post($before_widget); ?>

        <!--Blog Category Widget-->
        <div class="gallery-widget">
            <?php echo wp_kses_post($before_title.$title.$after_title); ?>
            <div class="widget-content">
                <div class="outer clearfix">
                    <?php
                        $args = array('post_type' => 'bunch_projects', 'showposts'=>$instance['number']);
        if ($instance['cat']) {
            $args['tax_query'] = array(array('taxonomy' => 'projects_category','field' => 'id','terms' => (array)$instance['cat']));
        }
        $this->posts($args); ?>
                </div>
            </div>
        </div>

        <?php echo wp_kses_post($after_widget);
    }


    /** @see WP_Widget::update */
    public function update($new_instance, $old_instance)
    {
        $instance = $old_instance;

        $instance['title'] = $new_instance['title'];
        $instance['number'] = $new_instance['number'];
        $instance['cat'] = $new_instance['cat'];

        return $instance;
    }
    /** @see WP_Widget::form */
    public function form($instance)
    {
        $title = ($instance) ? esc_attr($instance['title']) : 'Recent Work';
        $number = ($instance) ? esc_attr($instance['number']) : 6;
        $cat = ($instance) ? esc_attr($instance['cat']) : ''; ?>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Enter The Title: ', 'contra'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('number')); ?>"><?php esc_html_e('Number of posts: ', 'contra'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('number')); ?>" name="<?php echo esc_attr($this->get_field_name('number')); ?>" type="text" value="<?php echo esc_attr($number); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('cat')); ?>"><?php esc_html_e('Category', 'contra'); ?></label>
            <?php wp_dropdown_categories(array('show_option_all'=>esc_html__('All Categories', 'contra'), 'selected'=>$cat, 'taxonomy' => 'projects_category', 'class'=>'widefat', 'name'=>$this->get_field_name('cat'))); ?>
        </p>

        <?php
    }

    public function posts($args)
    {
        $query = new WP_Query($args);
        if ($query->have_posts()):?>

            <!-- Title -->
            <?php while ($query->have_posts()): $query->the_post();
        global $post;

        $post_thumbnail_id = get_post_thumbnail_id($post->ID);
        $post_thumbnail_url = wp_get_attachment_url($post_thumbnail_id); ?>
            <figure class="image">
                <a href="<?php echo esc_url($post_thumbnail_url); ?>" class="lightbox-image" title="<?php esc_attr_e('Image Title Here', 'contra'); ?>"><?php the_post_thumbnail('contra_80x70', array( 'class' => 'img-resposive' )); ?></a>
            </figure>
            <?php  endwhile; ?>

        <?php endif;
        wp_reset_postdata();
    }
}


///----Dynamic Sidebar widgets---
//Recent Services
class Bunch_services_sidebar extends WP_Widget
{
    /** constructor */
    public function __construct()
    {
        parent::__construct( /* Base ID */'Bunch_services_sidebar', /* Name */esc_html__('Contra Services', 'contra'), array( 'description' => esc_html__('Show the Services Sidebar', 'contra')));
    }

    /** @see WP_Widget::widget */
    public function widget($args, $instance)
    {
        extract($args);

        echo wp_kses_post($before_widget); ?>

        <!--Blog Category Widget-->
        <div class="sidebar-blog-category">
            <ul class="blog-cat">
                <?php
                    $args = array('post_type' => 'bunch_services', 'showposts'=>$instance['number']);
        if ($instance['cat']) {
            $args['tax_query'] = array(array('taxonomy' => 'services_category','field' => 'id','terms' => (array)$instance['cat']));
        }
        $this->posts($args); ?>
            </ul>
        </div>

        <?php echo wp_kses_post($after_widget);
    }


    /** @see WP_Widget::update */
    public function update($new_instance, $old_instance)
    {
        $instance = $old_instance;

        $instance['number'] = $new_instance['number'];
        $instance['cat'] = $new_instance['cat'];

        return $instance;
    }
    /** @see WP_Widget::form */
    public function form($instance)
    {
        $number = ($instance) ? esc_attr($instance['number']) : 6;
        $cat = ($instance) ? esc_attr($instance['cat']) : ''; ?>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('number')); ?>"><?php esc_html_e('Number of posts: ', 'contra'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('number')); ?>" name="<?php echo esc_attr($this->get_field_name('number')); ?>" type="text" value="<?php echo esc_attr($number); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('cat')); ?>"><?php esc_html_e('Category', 'contra'); ?></label>
            <?php wp_dropdown_categories(array('show_option_all'=>esc_html__('All Categories', 'contra'), 'selected'=>$cat, 'taxonomy' => 'services_category', 'class'=>'widefat', 'name'=>$this->get_field_name('cat'))); ?>
        </p>

        <?php
    }

    public function posts($args)
    {
        $query = new WP_Query($args);
        if ($query->have_posts()):?>

            <!-- Title -->
            <?php $curr_post = get_the_id();
        while ($query->have_posts()): $query->the_post();
        global $post;
        $post_name = $post->ID; ?>
            <li class="<?php if ($post_name == $curr_post) {
            echo 'active';
        } ?>"><a href="<?php echo esc_url(get_the_permalink(get_the_id())); ?>"><?php the_title(); ?></a></li>
            <?php  endwhile; ?>

        <?php endif;
        wp_reset_postdata();
    }
}

//Our Brochures
class Bunch_Brochures extends WP_Widget
{

    /** constructor */
    public function __construct()
    {
        parent::__construct( /* Base ID */'Bunch_Brochures', /* Name */esc_html__('Contra Our Brochures', 'contra'), array( 'description' => esc_html__('Show the info Our Brochures', 'contra')));
    }
    /** @see WP_Widget::widget */
    public function widget($args, $instance)
    {
        extract($args);
        $title = apply_filters('widget_title', $instance['title']);

        echo wp_kses_post($before_widget); ?>

            <!--Brochure-->
            <div class="brochure-widget">
                <?php echo wp_kses_post($before_title.$title.$after_title); ?>
                <div class="brochure-box">
                    <div class="inner">
                        <span class="icon fa fa-file-pdf-o"></span>
                        <div class="text"><?php echo wp_kses_post($instance['pdf_title']); ?></div>
                    </div>
                    <a href="<?php echo esc_url($instance['pdf_link']); ?>" class="overlay-link"></a>
                </div>

                <div class="brochure-box">
                    <div class="inner">
                        <span class="icon fa fa-file-word-o"></span>
                        <div class="text"><?php echo wp_kses_post($instance['word_title']); ?></div>
                    </div>
                    <a href="<?php echo esc_url($instance['word_link']); ?>" class="overlay-link"></a>
                </div>

                <div class="brochure-box">
                    <div class="inner">
                        <span class="icon fa fa-file-powerpoint-o"></span>
                        <div class="text"><?php echo wp_kses_post($instance['ppt_title']); ?></div>
                    </div>
                    <a href="<?php echo esc_url($instance['ppt_link']); ?>" class="overlay-link"></a>
                </div>

            </div>
        <?php

        echo wp_kses_post($after_widget);
    }


    /** @see WP_Widget::update */
    public function update($new_instance, $old_instance)
    {
        $instance = $old_instance;

        $instance['pdf_title'] = $new_instance['pdf_title'];
        $instance['pdf_link'] = $new_instance['pdf_link'];
        $instance['word_title'] = $new_instance['word_title'];
        $instance['word_link'] = $new_instance['word_link'];
        $instance['ppt_title'] = $new_instance['ppt_title'];
        $instance['ppt_link'] = $new_instance['ppt_link'];
        return $instance;
    }
    /** @see WP_Widget::form */
    public function form($instance)
    {
        $pdf_title = ($instance) ? esc_attr($instance['pdf_title']) : 'Project-One .pdf';
        $pdf_link = ($instance) ? esc_attr($instance['pdf_link']) : '#';
        $word_title = ($instance) ? esc_attr($instance['word_title']) : 'Project-One .wd';
        $word_link = ($instance) ? esc_attr($instance['word_link']) : '#';
        $ppt_title = ($instance) ? esc_attr($instance['ppt_title']) : 'Project-One .ppt';
        $ppt_link = ($instance) ? esc_attr($instance['ppt_link']) : '#'; ?>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('pdf_title')); ?>"><?php esc_html_e('PDF Title:', 'contra'); ?></label>
            <input placeholder="<?php esc_attr_e('PDF Title here', 'contra'); ?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('pdf_title')); ?>" name="<?php echo esc_attr($this->get_field_name('pdf_title')); ?>" type="text" value="<?php echo esc_attr($pdf_title); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('pdf_link')); ?>"><?php esc_html_e('PDF Link:', 'contra'); ?></label>
            <input placeholder="<?php esc_attr_e('PDF link here', 'contra'); ?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('pdf_link')); ?>" name="<?php echo esc_attr($this->get_field_name('pdf_link')); ?>" type="text" value="<?php echo esc_attr($pdf_link); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('word_title')); ?>"><?php esc_html_e('Word Doc Title:', 'contra'); ?></label>
            <input placeholder="<?php esc_attr_e('Word Title here', 'contra'); ?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('word_title')); ?>" name="<?php echo esc_attr($this->get_field_name('word_title')); ?>" type="text" value="<?php echo esc_attr($word_title); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('word_link')); ?>"><?php esc_html_e('Work Doc Link:', 'contra'); ?></label>
            <input placeholder="<?php esc_attr_e('Word link here', 'contra'); ?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('word_link')); ?>" name="<?php echo esc_attr($this->get_field_name('word_link')); ?>" type="text" value="<?php echo esc_attr($word_link); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('ppt_title')); ?>"><?php esc_html_e('PPT Title Here:', 'contra'); ?></label>
            <input placeholder="<?php esc_attr_e('PPT Title here', 'contra'); ?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('ppt_title')); ?>" name="<?php echo esc_attr($this->get_field_name('ppt_title')); ?>" type="text" value="<?php echo esc_attr($ppt_title); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('ppt_link')); ?>"><?php esc_html_e('PPT Link:', 'contra'); ?></label>
            <input placeholder="<?php esc_attr_e('PPT Link here', 'contra'); ?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('ppt_link')); ?>" name="<?php echo esc_attr($this->get_field_name('ppt_link')); ?>" type="text" value="<?php echo esc_attr($ppt_link); ?>" />
        </p>

        <?php
    }
}

//Quick Contact
class Bunch_Quick_Contact extends WP_Widget
{

    /** constructor */
    public function __construct()
    {
        parent::__construct( /* Base ID */'Bunch_Quick_Contact', /* Name */esc_html__('Contra Quick Contact', 'contra'), array( 'description' => esc_html__('Show the Quick Contact', 'contra')));
    }

    /** @see WP_Widget::widget */
    public function widget($args, $instance)
    {
        extract($args);

        echo wp_kses_post($before_widget);

        $w_bg_img = ($instance['w_bg_img']) ? ($instance['w_bg_img']) : get_template_directory_uri() . '/images/resource/brochure-bg.jpg'; ?>

            <!--Help Box-->
            <div class="help-box" style="background-image:url('<?php echo esc_url($w_bg_img); ?>')">
                <div class="inner">
                    <span class="title"><?php echo wp_kses_post($instance['upper_title']); ?></span>
                    <h2><?php echo wp_kses_post($instance['w_title']); ?></h2>
                    <div class="text"><?php echo wp_kses_post($instance['content']); ?></div>
                    <a class="theme-btn btn-style-three" href="<?php echo esc_url($instance['w_btn_link']); ?>"><?php echo wp_kses_post($instance['w_btn_title']); ?></a>
                </div>
            </div>

        <?php

        echo wp_kses_post($after_widget);
    }


    /** @see WP_Widget::update */
    public function update($new_instance, $old_instance)
    {
        $instance = $old_instance;

        $instance['w_bg_img'] = strip_tags($new_instance['w_bg_img']);
        $instance['upper_title'] = $new_instance['upper_title'];
        $instance['w_title'] = $new_instance['w_title'];
        $instance['content'] = $new_instance['content'];
        $instance['w_btn_title'] = $new_instance['w_btn_title'];
        $instance['w_btn_link'] = $new_instance['w_btn_link'];

        return $instance;
    }

    /** @see WP_Widget::form */
    public function form($instance)
    {
        $w_bg_img = ($instance) ? esc_attr($instance['w_bg_img']) : '';
        $upper_title = ($instance) ? esc_attr($instance['upper_title']) : '';
        $w_title = ($instance) ? esc_attr($instance['w_title']) : '';
        $content = ($instance) ? esc_attr($instance['content']) : '';
        $w_btn_title = ($instance) ? esc_attr($instance['w_btn_title']) : '';
        $w_btn_link = ($instance) ? esc_attr($instance['w_btn_link']) : ''; ?>

        <p>
          <label for="<?php echo esc_attr($this->get_field_id('w_bg_img')); ?>"><?php echo esc_html__('Background image:', 'contra')?></label><br />
            <img class="experts_media_image" src="<?php if (!empty($instance['w_bg_img'])) {
            echo esc_url($instance['w_bg_img']);
        } ?>" />
            <input type="text" class="widefat experts_media_url" name="<?php echo esc_attr($this->get_field_name('w_bg_img')); ?>" id="<?php echo esc_attr($this->get_field_id('w_bg_img')); ?>" value="<?php echo esc_attr($w_bg_img); ?>">
            <a href="#" class="button experts_media_upload"><?php esc_html_e('Upload', 'contra'); ?></a>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('upper_title')); ?>"><?php esc_html_e('Sub Title: ', 'contra'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('upper_title')); ?>" name="<?php echo esc_attr($this->get_field_name('upper_title')); ?>" type="text" value="<?php echo esc_attr($upper_title); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('w_title')); ?>"><?php esc_html_e('Title: ', 'contra'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('w_title')); ?>" name="<?php echo esc_attr($this->get_field_name('w_title')); ?>" type="text" value="<?php echo esc_attr($w_title); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('content')); ?>"><?php esc_html_e('Content:', 'contra'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('content')); ?>" name="<?php echo esc_attr($this->get_field_name('content')); ?>" ><?php echo wp_kses_post($content); ?></textarea>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('w_btn_title')); ?>"><?php esc_html_e('Button Title: ', 'contra'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('w_btn_title')); ?>" name="<?php echo esc_attr($this->get_field_name('w_btn_title')); ?>" type="text" value="<?php echo esc_attr($w_btn_title); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('w_btn_link')); ?>"><?php esc_html_e('Button Link: ', 'contra'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('w_btn_link')); ?>" name="<?php echo esc_attr($this->get_field_name('w_btn_link')); ?>" type="text" value="<?php echo esc_attr($w_btn_link); ?>" />
        </p>

        <?php
    }
}


///----Blog widgets---
//popular Post
class Bunch_popular_Post extends WP_Widget
{
    /** constructor */
    public function __construct()
    {
        parent::__construct( /* Base ID */'Bunch_popular_Post', /* Name */esc_html__('Contra Popular Post', 'contra'), array( 'description' => esc_html__('Show the Popular Post', 'contra')));
    }


    /** @see WP_Widget::widget */
    public function widget($args, $instance)
    {
        extract($args);
        $title = apply_filters('widget_title', $instance['title']);

        echo wp_kses_post($before_widget); ?>

        <!-- Popular Posts -->
        <div class="latest-news">
            <?php echo wp_kses_post($before_title.$title.$after_title); ?>
            <div class="widget-content">
                <?php $query_string = 'posts_per_page='.$instance['number'];
        if ($instance['cat']) {
            $query_string .= '&cat='.$instance['cat'];
        }
        $this->posts($query_string); ?>
            </div>
        </div>

        <?php echo wp_kses_post($after_widget);
    }


    /** @see WP_Widget::update */
    public function update($new_instance, $old_instance)
    {
        $instance = $old_instance;

        $instance['title'] = strip_tags($new_instance['title']);
        $instance['number'] = $new_instance['number'];
        $instance['cat'] = $new_instance['cat'];

        return $instance;
    }

    /** @see WP_Widget::form */
    public function form($instance)
    {
        $title = ($instance) ? esc_attr($instance['title']) : esc_html__('Popular Post', 'contra');
        $number = ($instance) ? esc_attr($instance['number']) : 3;
        $cat = ($instance) ? esc_attr($instance['cat']) : ''; ?>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title: ', 'contra'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('number')); ?>"><?php esc_html_e('No. of Posts:', 'contra'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('number')); ?>" name="<?php echo esc_attr($this->get_field_name('number')); ?>" type="text" value="<?php echo esc_attr($number); ?>" />
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('cat')); ?>"><?php esc_html_e('Category', 'contra'); ?></label>
            <?php wp_dropdown_categories(array('show_option_all'=>esc_html__('All Categories', 'contra'), 'selected'=>$cat, 'class'=>'widefat', 'name'=>$this->get_field_name('cat'))); ?>
        </p>

        <?php
    }

    public function posts($query_string)
    {
        $query = new WP_Query($query_string);
        if ($query->have_posts()):?>

            <!-- Title -->
            <?php while ($query->have_posts()): $query->the_post(); ?>
            <article class="post">
                <div class="post-thumb"><a href="<?php echo esc_url(get_permalink(get_the_id())); ?>"><?php the_post_thumbnail('contra_90x90'); ?></a></div>
                <h3><a href="<?php echo esc_url(get_permalink(get_the_id())); ?>"><?php the_title(); ?></a></h3>
                <div class="post-info"><?php esc_html_e('by', 'contra'); ?> <?php the_author(); ?></div>
            </article>
            <?php endwhile; ?>

        <?php endif;
        wp_reset_postdata();
    }
}


///----Shop widgets---
//Popular Products
class Bunch_Popular_Products extends WP_Widget
{
    /** constructor */
    public function __construct()
    {
        parent::__construct( /* Base ID */'Bunch_Popular_Products', /* Name */esc_html__('Contra Popular Products', 'contra'), array( 'description' => esc_html__('Show the Popular Products', 'contra')));
    }


    /** @see WP_Widget::widget */
    public function widget($args, $instance)
    {
        extract($args);
        $title = apply_filters('widget_title', $instance['title']);

        echo wp_kses_post($before_widget); ?>

        <!-- Top Related Posts -->
        <div class="related-posts">
            <?php echo wp_kses_post($before_title.$title.$after_title); ?>

            <?php
                $args = array('post_type' => 'product', 'showposts'=>$instance['number']);
        if ($instance['cat']) {
            $args['tax_query'] = array(array('taxonomy' => 'product_cat','field' => 'id','terms' => (array)$instance['cat']));
        }
        query_posts($args);
        $this->posts();
        wp_reset_query(); ?>
        </div>

        <?php echo wp_kses_post($after_widget);
    }


    /** @see WP_Widget::update */
    public function update($new_instance, $old_instance)
    {
        $instance = $old_instance;

        $instance['title'] = strip_tags($new_instance['title']);
        $instance['number'] = $new_instance['number'];
        $instance['cat'] = $new_instance['cat'];

        return $instance;
    }

    /** @see WP_Widget::form */
    public function form($instance)
    {
        $title = ($instance) ? esc_attr($instance['title']) : esc_html__('Popular Products', 'contra');
        $number = ($instance) ? esc_attr($instance['number']) : 3;
        $cat = ($instance) ? esc_attr($instance['cat']) : ''; ?>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title: ', 'contra'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('number')); ?>"><?php esc_html_e('No. of Posts:', 'contra'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('number')); ?>" name="<?php echo esc_attr($this->get_field_name('number')); ?>" type="text" value="<?php echo esc_attr($number); ?>" />
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('cat')); ?>"><?php esc_html_e('Category', 'contra'); ?></label>
            <?php wp_dropdown_categories(array('show_option_all'=>esc_html__('All Categories', 'contra'), 'selected'=>$cat, 'taxonomy' => 'product_cat', 'class'=>'widefat', 'name'=>$this->get_field_name('cat'))); ?>
        </p>

        <?php
    }

    public function posts()
    {
        if (have_posts()):?>

            <!-- Title -->
            <?php while (have_posts()): the_post();
        global $post; ?>
            <!--Image Box-->
            <div class="post">
                <figure class="post-thumb"><a href="<?php echo esc_url(get_permalink(get_the_id())); ?>"><?php the_post_thumbnail('contra_70x70'); ?></a></figure>
                <h4><a href="<?php echo esc_url(get_permalink(get_the_id())); ?>"><?php the_title(); ?></a></h4>
                <?php if (class_exists('WooCommerce')) :?>
                    <div class="rating">
                        <?php woocommerce_template_loop_rating(); ?>
                    </div>

                    <div class="price"><?php woocommerce_template_single_price(); ?></div>
                <?php endif; ?>
            </div>

            <?php endwhile; ?>

        <?php endif;
    }
}
