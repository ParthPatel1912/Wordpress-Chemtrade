<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package chemtrade
 */

?>

<?php 
	$loader_image = get_field('loader_image','options');
?>

</div>

<div id="iframeloading" class="loader">
	<?php if ($loader_image != '') { ?>
		<img src="<?= $loader_image['url']; ?>" alt="<?= $loader_image['alt']; ?>" />
	<?php } ?>
</div>

<?php
    $footer_logo = get_field('footer_logo','options');
	$footer_text = get_field('footer_text','options');
	$chemical_products_text = get_field('chemical_products_text','options');
	$chemical_products_links = get_field('chemical_products_links','options');
	$compliance_text = get_field('compliance_text','options');
	$compliance_details = get_field('compliance_details','options');
	$contact_text = get_field('contact_text','options');
	$contact_details = get_field('contact_details','options');
	$copyright_text = get_field('copyright_text','options');
	$quick_link_text = get_field('quick_link_text','options');
?>

<!-- Start Footer -->
	<footer class="footer">
		<div class="top-footer">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-md-6">
						<div class="footer-logo-block">
							<a href="<?= site_url(); ?>" title="<?= get_bloginfo('name'); ?>">
								<?php if ($footer_logo != '') { ?>
								<img src="<?= $footer_logo['url']; ?>" alt="<?= $footer_logo['alt']; ?>" title="<?= $footer_logo['title']; ?>">
								<?php } ?>
							</a>
							<?php if ($footer_text != '') { ?>
							<em class="h6">
								<?php echo $footer_text; ?>
							</em>
							<?php } ?>
						</div>
					</div>
					<div class="col-lg-3 col-md-6 links">
						<div class="footer-menu">
						<?php if ($quick_link_text != '') { ?>
							<h2 class="h6 no-border"><?= $quick_link_text; ?></h2>
						<?php } ?>
							<ul>
								<?php 
									wp_nav_menu(
										array(
											'theme_location' => 'footer-menu',
											'menu_class' => 'current_page_item'
										)
									);
								?>
							</ul>
						</div>
					</div>
					<div class="col-lg-3 col-md-6">
						<div class="footer-menu products">
						<?php if ($chemical_products_text != '') { ?>
							<h2 class="h6 no-border"><?= $chemical_products_text; ?></h2>
						<?php } ?>
							<ul>
								<?php if (have_rows('chemical_products_links','options')) {
									while (have_rows('chemical_products_links','options')): the_row();
									$chemical_product_text = get_sub_field('chemical_product_text','options');
									$chemical_product_link = get_sub_field('chemical_product_link','options');
									?>
										<li>
											<a href="<?= $chemical_product_link; ?>" title="<?= $chemical_product_text; ?>">
												<?php echo $chemical_product_text; ?>
											</a>
										</li>
									<?php 
										endwhile;
									}
								?>
							</ul>

							<div class="compliance">
							<?php if ($compliance_text != '') { ?>
								<h3 class="h6">
									<?php echo $compliance_text; ?>
								</h3>
							<?php } ?>
								<a href="tel:<?= $compliance_details; ?>" title="<?= $compliance_details; ?>">
									<?= $compliance_details; ?>
								</a>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-6">
						<div class="footer-menu contact">
						<?php if ($contact_text != '') { ?>
							<h2 class="h6 no-border">
								<?= $contact_text; ?>
							</h2>
						<?php } ?>
							<ul class="contact-list">
							<?php 
								$i = 0;
								if (have_rows('contact_details','options')) {
									while (have_rows('contact_details','options')): the_row();
										$contact_icon = get_sub_field('contact_icon','options');
										$contact_field_detail = get_sub_field('contact_field_detail','options');
										?>
										<li>
											<?php if ($contact_icon != '') { ?>
											<em><img src="<?= $contact_icon['url']; ?>" alt="<?= $contact_icon['alt']; ?>" title="<?= $contact_icon['title']; ?>"></em>
											<?php } ?>
											<div class="right-contact">
												<div class="right-contact-inner">
													<?php 
														foreach ($contact_field_detail as $cfd){
															$contact_field_text = $cfd['contact_field_text'];
															$contact_field_link = $cfd['contact_field_link'];
															?>
																<?php 
																	if ($i == 0) {
																		echo $contact_field_text;
																	} else {
																?>
																<strong><?= $contact_field_text; ?></strong>
																<a href="<?= $contact_field_link['url'];?>" title="<?= $contact_field_link['title']; ?>"><?= $contact_field_link['title']; ?></a><br/>
															<?php
																	}
														}
													?>
												</div>
											</div>
										</li>
										<?php
										$i++;
									endwhile;
								}
							?>
							</ul>
							<ul class="social-media-nav">
								<?php if (have_rows('social_media_logo','options')) {
									while (have_rows('social_media_logo','options')): the_row();
										$social_media = get_sub_field('social_media','options');
										$social_media_logo_title = get_sub_field('social_media_logo_title','options');
										$social_media_link = get_sub_field('social_media_link','options');
									?>
									<li>
										<a href="<?= $social_media_link; ?>" title="<?= $social_media_logo_title; ?>">
											<?php if ($social_media != '') { ?>
											<img src="<?php echo $social_media['url']; ?>" alt="<?php echo $social_media['alt']; ?>">
											<?php } ?>
										</a>
									</li>
									<?php 
										endwhile;
									}
								?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="bottom-footer">
			<div class="container">
				<?php if ($copyright_text != '') { ?>
					<p class="copyright"><?= $copyright_text; ?></p>
				<?php } ?>
				<ul>
					<?php 
						wp_nav_menu(
							array(
								'theme_location' => 'footer-link',
								'menu_class' => 'current_page_item'
							)
						);
					?>
				</ul>
			</div>
		</div>
	</footer>
	<!-- End Footer -->

<?php wp_footer(); ?>

</body>

</html>
