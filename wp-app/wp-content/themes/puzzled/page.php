<?php
get_header();
?>
<!-- Start the Loop. -->
<?php if (have_posts()):
	while (have_posts()):
		the_post(); ?>
				<main>
			<section>
				<div class="container">
					<div class="row">
						<div id="primary" class="col-xs-12 col-md-9 col-md-push-3">
							<h1><?php the_title()?></h1>
							<?php the_content()?>
						</div>
					</div>
				</div>
			</section>
		</main>
	<?php endwhile; ?>
<?php endif; ?>
<?php
get_footer();
?>