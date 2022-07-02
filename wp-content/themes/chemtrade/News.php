<?php 

// Template Name: News Page

get_header();
?>
<?php 
$posts_per_pages = get_field('posts_per_pages','options');
?>

    <!-- Main Content -->
		<main class="main-content">

            <?php 
                $page_title = get_field('page_title');
            ?>
            <!-- Main page header -->
            <section class="page-header no-sub-nav" style="background-image: url(<?php echo get_the_post_thumbnail_url(get_the_ID(),'full'); ?>);">
                <div class="container">
                    <h1><?= get_the_title(); ?></h1>
                </div>
            </section>

            <?php 
                $year_list = array();
                $args = array(
                    'post_type'=>'news',
                    'post_status' => 'publish',
                    'nopaging' => true,
                );
                $latest_posts = get_posts($args);
                foreach ($latest_posts as $all) {
                    $fulldate = $all->post_date;
                    $year_all = date('Y', strtotime($fulldate));
                    array_push($year_list, $year_all);
                }
                $year_final = array_unique($year_list);
            ?>
            <section class="news-page">
                <div class="container">
                    <div class="news-header">
                        <?php if ($page_title != '') { ?>
                            <h2 class="h3"><?= $page_title ?></h2>
                        <?php } ?>
                        <div class="news-filter">
                            <div class="filter-inner">
                                <label for="selectMonth">Month:</label>
                                <select class="form-control custom-dropdown" id="selectMonth">
                                    <option value="0">All</option>
									<option value="1">January</option>
									<option value="2">February</option>
									<option value="3">March</option>
									<option value="4">April</option>
									<option value="5">May</option>
									<option value="6">June</option>
									<option value="7">July</option>
									<option value="8">August</option>
									<option value="9">September</option>
									<option value="10">October</option>
									<option value="11">November</option>
									<option value="12">December</option>
                                </select>
                            </div>
                            <div class="filter-inner">
                                <label for="selectYear">Year:</label>
                                <select class="form-control custom-dropdown" id="selectYear">
                                    <?php 
                                        foreach ($year_final as $years) {
                                            ?>
                                                <option value="<?= $years; ?>"><?= $years; ?></option>
                                            <?php
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                        <?= get_the_content(); ?>

                    <div class="news-list-block">
                        <div class="row" id="new_data">
                            <?php
                                $icon_read_more = get_field('icon_read_more');
                                $text_for_read_more_link = get_field('text_for_read_more_link');
                                $args = array(
                                    'post_type'=>'news',
                                    'post_status' => 'publish',
                                    'orderby'=> 'post_date', 
                                    'order' => 'DESC',
                                    'posts_per_page' => $posts_per_pages,
                                    'paged' => get_query_var('paged') ? get_query_var('paged') : 1,
                                );
                                $loop = new WP_Query($args);
                                if ($loop->have_posts()) {
                                    while ($loop->have_posts()) : 
                                        $loop -> the_post();
                                        $fulldate = get_the_date();
                                        $month = date('M', strtotime($fulldate));
                                        $date = date('d', strtotime($fulldate));
                                        $year = date('Y', strtotime($fulldate));
                                        ?>                               
                                        <div class="col-sm-6 col-lg-4">
                                            <div class="news-list-wrapper" tabindex="0">
                                                <div class="news-list-outer">
                                                    <div class="news-date-block">
                                                        <div class="date"><?= $date; ?>
                                                            <span class="month"><?= $month; ?></span>
                                                        </div>
                                                        <span class="year"><?= $year; ?></span>
                                                    </div>
                                                    <p>
                                                        <?php 
                                                            $text = get_the_title();
                                                            if (str_word_count($text, 0) > 10) {
                                                                $words = str_word_count($text, 2);
                                                                $pos   = array_keys($words);
                                                                $text  = substr($text, 0, $pos[10]) .'...';
                                                                echo $text;
                                                            }
                                                            else{
                                                                echo $text;
                                                            }
                                                        ?>
                                                    </p>
                                                    <div class="bottom-link">
                                                        <a href="<?= get_permalink(); ?>" class="read-more-link" title="<?= $text_for_read_more_link; ?>"><?= $text_for_read_more_link; ?>
                                                        <?php if ($icon_read_more != '') { ?>
                                                            <em><img src="<?= $icon_read_more['url']; ?>" alt="<?= $icon_read_more['alt']; ?>" title="<?= $icon_read_more['title']; ?>"></em>
                                                        <?php } ?>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                    endwhile;
                                }
                                wp_reset_postdata();
                            ?>
                    </div>
                </div>
            </section>
            <input type="hidden" value="<?php echo $loop->max_num_pages; ?>" id="loop_count">
            <input type="hidden" id="news_page" value="<?= get_permalink(); ?>">
            <input type="hidden" id="news_page_id" value="<?= get_the_ID(); ?>">
        </main>
    <!-- End Main Content -->

<?php 

get_footer();
?>