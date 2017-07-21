<?php
?>

<section class="signup-section">
	<div class="container-fluid clearfix ovh">
		<div class="row">
			<div class="col-sm-6 col-lg-offset-1 col-lg-5">
				<div class="vc_column-inner">
					<div class="wpb_wrapper">
						<div class="vc_custom_heading vc_custom_1500069963258 uppercase">
							<h4 style=" font-weight: 500; font-size: 20px;color: #ffffff;text-align: left">Suscríbase a nuestro boletín.</h4>
						</div><!-- .vc_custom_heading vc_custom_1500069963258 uppercase -->
					</div><!-- .wpb_wrapper -->
				</div><!-- .vc_column-inner -->
			</div><!-- .wpb_column vc_column_container vc_col-sm-6 vc_col-lg-offset-1 vc_col-lg-5 -->
			<div class="col-sm-6 col-lg-5">
				<div class="vc_column-inner">
					<div class="wpb_wrapper">
						<form class="subscribe-form alignright " id="newsletter" method="post" data-tt-subscription="">
							<?php
							/*
							<input type="text" name="email" class="form-input check-value" placeholder="Correo electrónico" data-tt-subscription-required="" data-tt-subscription-type="email">
							<input type="submit" class="form-submit" value="Subscríbase">
							<div class="result_container"></div>
							*/ ?>
							<?php echo do_shortcode( '[mc4wp_form id="546"]' ); ?>
						</form><!-- .subscribe-form -->
						<div class="result_container"></div>
					</div><!-- .wpb_wrapper -->
				</div><!-- .vc_column-inner -->
			</div><!-- .wpb_column vc_column_container vc_col-sm-6 vc_col-lg-5 -->
		</div><!-- .row -->
	</div><!-- .container-fluid clearfix ovh -->
</section><!-- .vc_section -->