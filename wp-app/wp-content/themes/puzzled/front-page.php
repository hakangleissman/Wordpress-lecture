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
						<div class="col-xs-12">
							<div class="hero">
								<img id="whatever" src="<?php the_post_thumbnail_url('full') ?>" alt="">
								<div class="text">									
									<h1>
										<?php the_title(); ?>
									</h1>
									<p>
										<?php the_content(); ?>
									</p>
								</div>
							</div>
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