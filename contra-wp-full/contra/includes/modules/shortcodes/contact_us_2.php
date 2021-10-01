<!-- Contact Page Section -->
<section class="contact-page-section">
	<div class="auto-container">
		<div class="row">
			<!-- Form Column -->
			<div class="form-column col-lg-7 col-md-12 col-sm-12">
				<div class="inner-column">
					<div class="sec-title">
						<span class="float-text"><?php echo wp_kses_post($bg_title); ?></span>
						<h2><?php echo wp_kses_post($title); ?></h2>
					</div>

					<div class="contact-form">
						<?php echo do_shortcode($contact_form);?>
					</div>

					<div class="contact-info">
						<div class="row">
							<?php foreach($atts['contact_info'] as $key=>$item): ?>
								<div class="info-block col-lg-4 col-md-4 col-sm-12">
									<div class="inner">
										<h4><?php echo wp_kses_post($item->title1); ?></h4>
										<?php echo wp_kses_post($item->description); ?>
									</div>
								</div>
							<?php endforeach; ?>
						</div>
					</div>
				</div>
			</div>

			<div class="map-column col-lg-5 col-md-12 col-sm-12">
				<div class="inner-column">
					 <div class="map-outer">
						<div class="map-canvas"
							data-zoom="<?php echo esc_js($zoom); ?>"
							data-lat="<?php echo esc_js($lat); ?>"
							data-lng="<?php echo esc_js($long); ?>"
							data-type="roadmap"
							data-hue="#ffc400"
							data-title="<?php echo esc_js($mark_title); ?>"
							data-icon-path="<?php echo esc_js($image); ?>"
							data-content="<?php echo esc_js($address); ?><br><a href='mailto:<?php echo sanitize_email($email); ?>'><?php echo sanitize_email($email); ?></a>">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!--End Contact Page Section -->