<!-- Faq Form Section -->
<section class="faq-form-section">
    <div class="auto-container">
        <div class="sec-title">
            <span class="float-text"><?php echo wp_kses_post($bg_title); ?></span>
            <h2><?php echo wp_kses_post($title); ?></h2>
        </div>
		<!-- Faq Form -->
        <div class="faq-form">
            <?php echo do_shortcode($contact_form);?>
        </div>
    </div>
</section>
<!--End Contact Section -->