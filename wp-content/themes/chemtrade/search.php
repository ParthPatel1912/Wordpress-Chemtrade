<?php

get_header();
?>
	<?php 
		$search_banner_image = get_field('search_banner_image','option');
		$search_page_title = get_field('search_page_title','option');
		$search_result_text = get_field('search_result_text','option');
		$posts_per_pages = get_field('posts_per_pages','options');
	?>
	<!-- Main Content -->
	<main class="main-content">

		<!-- Main page header -->
		<section class="page-header no-sub-nav" style="background-image: url(<?= $search_banner_image['url']; ?>);">
			<div class="container">
				<h1><?= $search_page_title; ?></h1>
			</div>
		</section>

		<!-- search chemtrade -->
		<section class="search-chemtrade-block">
			<div class="container">
				<h2 class="center-border h3"><?= $search_result_text; ?><?= get_search_query(); ?></h2>
				<div class="card">
					<div class="card-body">	
						<?php if ( have_posts() ) :
							while ( have_posts() ) :
								the_post();
								// get_template_part( 'template-parts/content', 'search' );
								?>
								<div class="search-info">
									<a href="<?= get_permalink(); ?>" class="h5 secondary"><?= get_the_title(); ?></a>
									<p class="h6">
										<?php 
											$text = get_the_content();
											if (str_word_count($text, 0) > 50) {
												$words = str_word_count($text, 2);
												$pos = array_keys($words);
												$text = substr($text, 0, $pos[50]) .'...';
												echo $text;
											}
											else{
												echo $text;
											}
										?>
									</p>
								</div>
								<?php 
							endwhile;
							// the_posts_navigation();
						else :
							// get_template_part( 'template-parts/content', 'none' );
								echo '<p>Sorry, but nothing matched your search terms. Please try again with some different keywords.</p>';
							 
						endif;
						?>
					</div>
				</div>
				<div class="custom-pagination">
					<?php 
						$big = 999999999;
						echo paginate_links( array(
							'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
							'format' => '?paged=%#%',
							'current' => max( 1, get_query_var('paged') ),
							'total' => $wp_query->max_num_pages,
						) );
					?>
				</div>				
			</div>
		</section>
	</main>
	<!-- End Main Content -->

<?php

get_footer();
?>