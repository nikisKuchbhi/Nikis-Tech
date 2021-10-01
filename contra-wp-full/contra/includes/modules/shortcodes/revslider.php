<?php if($slider_slug): ?>

	<!--Main Slider-->
	<section class="main-slider" data-start-height="900" data-slide-overlay="yes">
		<?php if( ($slider_slug) && function_exists ( 'putRevSlider' ) ) putRevSlider( $slider_slug ); ?>
	</section>
	<!--End Main Slider-->

<?php endif; ?>