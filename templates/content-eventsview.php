<?php
/*
 * Shows events
 */
?>

<section class="events-section" style="margin-top: 90px !important; margin-bottom: 40px !important;">
	<div class="container-fluid clearfix ovh">
		<h2 class="section-title text-center">Próximas capacitaciones</h2>
		<div class="row row-centered">
			<div class="col-md-9 col-centered">
				<?php echo do_shortcode( '[tribe_events view="list"]' ); ?>
			</div>
		</div><!-- .row -->
	</div><!-- .container-fluid clearfix ovh -->
</section><!-- .eventsview -->