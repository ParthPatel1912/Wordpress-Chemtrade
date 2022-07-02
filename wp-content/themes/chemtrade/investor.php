<?php 

// Template Name: Investor Page
get_header();
?>
<?php 
$posts_per_pages = get_field('posts_per_pages','options');
?>

    <!-- Main Content -->
    <input type="hidden" id="investor_page_id" name="id" value="<?= get_the_ID(); ?>">
    <main class="main-content investors-page">
        <section class="page-header no-sub-nav" style="background-image: url(<?= get_the_post_thumbnail_url(get_the_ID(),'full'); ?>);">
            <div class="container">
                <h1><?= get_the_title(); ?></h1>                
            </div>
        </section>

        <?php 
            $special_event = get_field('special_event');
            $special_event_link = get_field('special_event_link');
        ?>
        <section class="virtual-agm-info">
            <div class="container">
                <?php if ($special_event != '') { ?>
                    <h2 class="h4 no-border"><?= $special_event; ?>
                        <a href="<?= $special_event_link['url'] ?>" class="secondary white" target="<?= $special_event_link['target'] ?>" title="<?= $special_event_link['title'] ?>"><?= $special_event_link['title'] ?></a>.
                    </h2>
                <?php } ?>
            </div>
        </section>

        <?php 
            $income_fund_details_header = get_field('income_fund_details_header');
            $income_fund_details_content = get_field('income_fund_details_content');
            $income_fund_details = get_field('income_fund_details');
            $income_fund_image = get_field('income_fund_image');
        ?>
        <section class="investors-fund-block">
            <div class="container">
                <div class="card-info">
                    <div class="info">
                    <?php if ($income_fund_details_header != '') { ?>
                        <h2 class="h4 no-border"><?= $income_fund_details_header ?></h2>
                    <?php } ?>
                    <?php if ($income_fund_details_content != '') { ?>
                        <p class="h4"><?= $income_fund_details_content ?></p>
                    <?php } ?>
                        <?= $income_fund_details; ?>
                    </div>
                    <div class="thumb">
                    <?php if ($income_fund_image != '') { ?>
                        <img src="<?= $income_fund_image['url'] ?>" alt="<?= $income_fund_image['alt'] ?>" title="<?= $income_fund_image['title'] ?>">
                    <?php } ?>
                    </div>
                </div>
            </div>
        </section>

        <?php 
            $business_segment_title = get_field('business_segment_title');
            $select_business_segment = get_field('select_business_segment');
        ?>
        <section class="investors-business-block" data-sec-id="our-business">
            <div class="container">
            <?php if ($business_segment_title != '') { ?>
                <h2 class="h4 no-border"><?= $business_segment_title; ?></h2>
            <?php } ?>
                <div class="row">
                    <?php
                        $terms = $select_business_segment;
                        if (! empty($terms) && is_array($terms)) {
                            foreach ($terms as $term) { ?>

                                <?php
                                    $business_segment_content = get_field('business_segment_content', 'type' .'_' .$term);
                                    $title_business_segment = get_field('title_business_segment', 'type' .'_' .$term);
                                    $image_title = get_field('image_title', 'type' .'_' .$term);
                                ?>
                                
                                <div class="col-md-4">
                                    <div class="investors-products-box">
                                        <div class="investors-products-title">
                                            <h3 class="h5">
                                            <?php if ($image_title != '') { ?>
                                                <em><img src="<?= $image_title['url']; ?>" alt="<?= $image_title['alt']; ?>" title="<?= $image_title['title']; ?>"></em>
                                            <?php } ?>
                                                <?= $title_business_segment; ?>
                                            </h3>
                                        </div>
                                        <div class="investors-products-body-wrapper">
                                            <div class="investors-products-body">
                                                <?= $business_segment_content; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php 
                            }
                        }
                    ?>
                </div>
            </div>
        </section>

        <?php 
            $vision_journey_title = get_field('vision_journey_title');
            $content_journey = get_field('content_journey');
        ?>
        <section class="investors-vision-block">
            <div class="container">
                <div class="investors-vision">
                <?php if ($vision_journey_title != '') { ?>
                    <h2 class="h4 no-border"><?= $vision_journey_title; ?></h2>
                <?php } ?>
                    <?= $content_journey; ?>
                </div>
            </div>
        </section>

        <?php 
            $title_join_investor = get_field('title_join_investor');
            $sub_title_for_join_investor = get_field('sub_title_for_join_investor');
            $button_text_for_join = get_field('button_text_for_join');
            $placeholder_email = get_field('placeholder_email');
        ?>
        <section class="investors-join-block">
            <form method="POST" id="mailsubmit">
                <div class="container">
                <?php if ($title_join_investor != '') { ?>
                    <p><?= $title_join_investor; ?></p>
                <?php } ?>
                <?php if ($sub_title_for_join_investor != '') { ?>
                    <h2 class="h4 no-border"><?= $sub_title_for_join_investor; ?></h2>
                <?php } ?>
                    <div class="input-group">
                    <?php if ($placeholder_email != '') { ?>
                        <label for="emailid" class="d-none"><?= $placeholder_email; ?></label>
                    <?php } ?>
                    
                        <input type="email" class="form-control" name="EmailAddress" placeholder="<?= $placeholder_email; ?>" id="emailid">

                        <input type="hidden" id="mailurl" value="<?= get_template_directory_uri().'/inc/mail.php'; ?>">
                        <input type="hidden" id="adminemail" value="<?= get_option('admin_email'); ?>">
                        <input type="hidden" id="username" value="<?= get_field('username','option'); ?>">
                        <input type="hidden" id="password" value="<?= get_field('password','option'); ?>">
                        <input type="hidden" id="mailsuccess" value="<?= get_field('text_for_mail_send_success','option'); ?>">
                        <input type="hidden" id="mailfail" value="<?= get_field('text_for_mail_send_fail','option'); ?>">
                        <input type="hidden" id="mail_subject" value="<?= get_field('mail_subject','option'); ?>">
                        <input type="hidden" id="mail_body" value="<?= get_field('mail_body','option'); ?>">
                    
                    <?php if ($button_text_for_join != '') { ?>
                        <div class="input-group-append">
                            <button type="submit" href="#" class="btn btn-primary" title="<?= $button_text_for_join; ?>"><?= $button_text_for_join; ?></button>
                        </div>
                    <?php } ?>
                    </div>
                    <span class="Email-error"></span>
                </div>
            </form>
        </section>

        <?php 
            $news_title = get_field('news_title');
            $all_news_button_text = get_field('all_news_button_text');
            $news_all_button_link = get_field('news_all_button_link');
        ?>
        <section class="investors-news-block" data-sec-id="latest-news">
            <div class="container">
            <?php if ($news_title != '') { ?>
                <h2 class="center-border"><?= $news_title; ?></h2>
            <?php } ?>
                <!-- Slider -->
                <div class="swiper-container investors-news-slider">
                    <div class="swiper-wrapper">                        
                        <?php
                            $text_for_read_more_link = get_field('text_for_read_more_link');
                            $args = array(
                                'post_type'=>'news',
                                'post_status' => 'publish',
                                'orderby'=> 'post_date', 
                                'order' => 'DESC',
                                'posts_per_page' => $posts_per_pages,
                           );
                            $loop = new WP_Query($args);

                            if ($loop->have_posts()) {
                                while ($loop->have_posts()) {
                                    $loop -> the_post();
                                    
                                    $fulldate = get_the_date();
                                    $month = date('M', strtotime($fulldate));
                                    $date = date('d', strtotime($fulldate));
                                    $year = date('Y', strtotime($fulldate));
                                    ?>
                            
                                        <div class="swiper-slide">
                                            <div class="news-list-wrapper secondary" >
                                                <div class="news-list-outer">
                                                    <div class="news-date-block">
                                                        <div class="date"><?= $date; ?>
                                                            <span class="month"><?= $month; ?></span>
                                                        </div>
                                                        <span class="year"><?= $year; ?></span>
                                                    </div>
                                                    <h3 class="h6"><?= get_the_title(); ?></h3>
                                                    <p><?= apply_filters('the_content', get_the_content()); ?></p>
                                                    <div class="bottom-link">
                                                        <a href="<?= get_permalink(); ?>" class="read-more-link" title="<?= $text_for_read_more_link; ?>"><?= $text_for_read_more_link; ?></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                }
                            }
                            wp_reset_postdata();
                        ?>
                    </div>
                </div>
                <div class="investors-news-slider-footer">
                    <!-- Add Arrows -->
                    <div class="investors-news-slider-arrows">
                        <div class="swiper-button-prev investors-news-slider-prev"></div>
                        <div class="swiper-button-next investors-news-slider-next"></div>
                    </div>
                    <a href="<?= $news_all_button_link; ?>" class="btn md btn-outline-primary" title="<?= $all_news_button_text; ?>"><?= $all_news_button_text; ?></a>
                </div>
            </div>

        </section>

        <?php
            $stock_title = get_field('stock_title');
            $stock_content = get_field('stock_content');
            $unit_text = get_field('unit_text');
            $unit_name = get_field('unit_name');
            $unit_value = get_field('unit_value');
            $change_text = get_field('change_text');
            $change_image = get_field('change_image');
            $change_value = get_field('change_value');
            $volume_text = get_field('volume_text');
            $volume_amount = get_field('volume_amount');
            $stock_info = get_field('stock_info');
        ?>
        <section class="investors-stock-block"  data-sec-id="stock-debenture">
            <div class="container">
            <?php if ($stock_title != '') { ?>
                <h2 class="center-border"><?= $stock_title; ?></h2>
            <?php } ?>
                <?= $stock_content; ?>                
                <div class="investors-stock-wrapper">
                    <div class="investors-stock-outer">
                        <div class="investors-stock-title">
                        <?php if ($unit_text != '') { ?>
                            <h3 class="h6"><?= $unit_text; ?></h3>
                        <?php } ?>
                        <?php if ($unit_name != '') { ?>
                            <span class="h3"><?= $unit_name; ?> <span><?= $unit_value; ?></span></span>
                        <?php } ?>
                        </div>
                        <div class="investors-stock-moniter">
                            <?php if ($change_image != '') { ?>
                            <em class="stock-thumb"><img src="<?= $change_image['url']; ?>" alt="<?= $change_image['alt']; ?>" title="<?= $change_image['title']; ?>"></em>
                            <?php } ?>
                            <div class="stock-moniter-values">
                            <?php if ($change_text != '') { ?>
                                <span class="sm-text"><?= $change_text; ?></span>
                            <?php } ?>
                            <?php if ($change_value != '') { ?>
                                <span class="h6"><?= $change_value; ?></span>
                            <?php } ?>
                            </div>
                        </div>
                        <div class="investors-stock-volume">
                        <?php if ($volume_text != '') { ?>
                            <span class="sm-text"><?= $volume_text; ?></span>
                        <?php } ?>
                        <?php if ($volume_amount != '') { ?>
                            <span class="h6"><?= $volume_amount; ?></span>
                        <?php } ?>
                        </div>
                        <?php if ($stock_info != '') { ?>
                            <span class="h5"><?= $stock_info; ?></span>
                        <?php } ?>
                    </div>
                    <div class="row">

                    <?php 
                        if (have_rows('debentures')) {
                        while (have_rows('debentures')): the_row();
                        $position_name = get_sub_field('position_name');
                        $stock_name = get_sub_field('stock_name');
                        ?>
                            <div class="col-sm-6">
                                <a href="#" class="investors-stock-outer investors-stock-outer-secondary">
                                    <div class="investors-stock-title">
                                    <?php if ($position_name != '') { ?>
                                        <h3 class="h6"><?= $position_name; ?></h3>
                                    <?php } ?>
                                    <?php if ($stock_name != '') { ?>
                                        <span class="h3"><?= $stock_name; ?></span>
                                    <?php } ?>
                                    </div>
                                </a>
                            </div>
                        <?php
                        endwhile;
                        }
                    ?>
                    </div>
                </div>
            </div>
        </section>

        <?php 
            $finance_report_title = get_field('finance_report_title');
            $finance_report_content = get_field('finance_report_content');
            $other_finance_link = get_field('other_finance_link');
            $report_pdf_image = get_field('report_pdf_image');
            $year_list = array();
            $args = array(
                'post_type'=>'document',
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
            rsort($year_final);
        ?>
        <section class="investors-financial-report-block"  data-sec-id="financial-reports">
            <div class="container">
            <?php if ($finance_report_title != '') { ?>
                <h2 class="center-border"><?= $finance_report_title; ?></h2>
            <?php } ?>
                <?= $finance_report_content; ?>
                <label class="d-none" for="financialReportSelectYear">Year</label>
                <select class="form-control custom-dropdown" id="financialReportSelectYear">
                    <?php 
                        foreach ($year_final as $years) {
                            ?>
                                <option value="<?= $years; ?>"><?= $years; ?></option>
                            <?php
                        }
                    ?>
                </select>
                <div class="row" id="financialReport">
                    
                    <?php 
                        $args = array(
                            'post_type'=>'document',
                            'orderby'=> 'post_date', 
                            'order' => 'DESC',
                            'post_status' => 'publish',
                            'nopaging' => true,
                            'date_query' => array(
                                array(
                                    'year'  => $year_final[0],
                               ),
                           ),
                       );
                        $loop = new WP_Query($args);

                        if ($loop->have_posts()) {
                            while ($loop->have_posts()) : 
                                $loop -> the_post(); 
                                
                                $document_type = get_field('document_type');
                                $file_name = get_field('file_name');
                                $report_file = get_field('report_file');

                                if ($document_type == 'financereport') {
                            ?>

                                <div class="col-md-3 col-sm-6">
                                    <div class="card-info-wrapper" tabindex="0">
                                        <a href="<?= $report_file['url']; ?>" title="<?= $file_name; ?> PDF" target="_blank" class="card-info">
                                        <?php if ($file_name != '') { ?>
                                            <h3 class="h6"><?= $file_name; ?> </h3>
                                        <?php } ?>
                                        <?php if ($report_pdf_image != '') { ?>
                                            <em><img src="<?= $report_pdf_image['url']; ?>" alt="<?= $report_pdf_image['alt']; ?>" title="<?= $report_pdf_image['title']; ?>"></em>
                                        <?php } ?>
                                        </a>
                                    </div>
                                </div>

                            <?php 
                                }
                            endwhile;
                        }
                        wp_reset_postdata();
                    ?>
                    
                </div>
                <?= $other_finance_link; ?>
            </div>
        </section>

        <?php 
            $distribution_title = get_field('distribution_title');
            $distribution_content = get_field('distribution_content');
            $tax_info_title = get_field('tax_info_title');
            $tax_info_download_button_text = get_field('tax_info_download_button_text');
            $record_of_distribution__title = get_field('record_of_distribution__title');
            $text_for_total = get_field('text_for_total');
            $year_list_payment = array();
            if (have_rows('distribution_payment')) {
                while (have_rows('distribution_payment')): the_row(); 
                    if (get_row_layout() == 'column_section') {
                            
                        $year_of_record = get_sub_field('year_of_record');
                        array_push($year_list_payment, $year_of_record);
                    }
                endwhile;
            }
            rsort($year_list_payment);

            $year_list_historytax = array();
            if (have_rows('historical_tax_document')) {
                while (have_rows('historical_tax_document')): 
                    the_row();

                    $year_for_historical_tax = get_sub_field('year_for_historical_tax');
                    array_push($year_list_historytax, $year_for_historical_tax);
                endwhile;
            }
            rsort($year_list_historytax);
        ?>
        <section class="investors-distributions-block"  data-sec-id="distibutions">
            <div class="container">
            <?php if ($distribution_title != '') { ?>
                <h2 class="center-border"><?= $distribution_title; ?></h2>
            <?php } ?>
                <div class="card-distribute">
                    <div class="distribute-left">
                        <?= $distribution_content; ?>
                        <div class="content">
                        <?php if ($tax_info_title != '') { ?>
                            <h3 class="h6"><?= $tax_info_title ?></h3>
                        <?php } ?>
                            <label class="d-none" for="distributionsSelectYear">Year</label>
                            <select class="form-control custom-dropdown" id="distributionsSelectYear">
                                <option value="">Select year</option>
                                <?php 
                                    foreach ($year_list_historytax as $year_history) {
                                        ?>
                                            <option value="<?= $year_history; ?>"><?= $year_history; ?></option>
                                        <?php
                                    }
                                ?>
                            </select>
                            <?php 
                                if (have_rows('historical_tax_document')) {
                                    while (have_rows('historical_tax_document')): 
                                        the_row();
                                        $year_for_historical_tax = get_sub_field('year_for_historical_tax');            
                                        if ($year_for_historical_tax == $year_list_historytax[0]) {
                                            $document_historical_tax = get_sub_field('document_historical_tax');
                                        }
                                    endwhile;
                                }
                            ?>
                            <a href="<?= $document_historical_tax; ?>" class="btn md btn-outline-primary" id="download_history" target="_blank" title="<?= $tax_info_download_button_text ?>"><?= $tax_info_download_button_text ?></a>
                        </div>
                    </div>
                    <div class="distribute-right">
                        <div class="distribute-table-header">
                        <?php if ($record_of_distribution__title != '') { ?>
                            <h3 class="h4"><?= $record_of_distribution__title; ?></h3>
                        <?php } ?>
                            <label class="d-none" for="tableHeaderSelectYear">Year</label>
                            <select class="form-control custom-dropdown" id="tableHeaderSelectYear">
                            <?php 
                                foreach ($year_list_payment as $year_payment) {
                                    ?>
                                        <option value="<?= $year_payment; ?>"><?= $year_payment; ?></option>
                                    <?php
                                }
                            ?>
                            </select>
                        </div>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <?php 
                                            if (have_rows('payment_column_field_name')) {
                                            while (have_rows('payment_column_field_name')): the_row();

                                            $payment_column_name = get_sub_field('payment_column_name');
                                            
                                            ?>
                                            <th><?= $payment_column_name; ?></th>
                                            <?php 
                                                endwhile;
                                            }    
                                        ?>
                                    </tr>
                                </thead>
                                <tbody id="distibution_payment">

                                <?php 
                                    $total_amount = 0;
                                
                                    if (have_rows('distribution_payment')) {

                                        while (have_rows('distribution_payment')): the_row(); 

                                            if (get_row_layout() == 'column_section') {
                                                    
                                                $year_of_record = get_sub_field('year_of_record');
                                                $amount_symbol = get_sub_field('amount_symbol');
                                                $record_table = get_sub_field('record_table');

                                                foreach ($record_table as $col) {
                                                    if ($year_of_record == $year_list_payment[0]) {
                                                        $distribution_payment_file = get_sub_field('distribution_payment_file');
                                            ?>
                                            <tr>
                                                <td headers="recordDate totalUnit"><?= $col['record_date']; ?></td>
                                                <td headers="paymentDate blankTotal"><?= $col['payment_date']; ?></td>
                                                <td headers="distributionUnit totalValueUnit"><?= $amount_symbol.' '.$col['distribution']; ?></td>
                                            </tr>
                                        
                                            <?php 
                                                    $total_amount = $total_amount + $col['distribution'];
                                                    }
                                                }
                                            }
                                        endwhile;
                                    }
                                ?>
                                    
                                </tbody>
                                <tfoot id="distibution_payment_totle">
                                    <tr>
                                        <th id="totalUnit"><?= $text_for_total; ?></th>
                                        <th id="blankTotal"></th>
                                        <th id="totalValueUnit"><?= $amount_symbol.' '.$total_amount; ?></th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <div class="distribute-footer">
                            <a href="<?= $distribution_payment_file; ?>" class="btn md btn-outline-primary" id="download_distribution_payment" title="Download" target="_blank">Download</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php 
            $drip_title = get_field('drip_title');
            $drip_sub_title = get_field('drip_sub_title');
            $drip_content = get_field('drip_content');
            $drip_content_link = get_field('drip_content_link');
        ?>
        <section class="investors-drip-block"  data-sec-id="drip">
            <div class="container">
            <?php if ($drip_title != '') { ?>
                <h2 class="no-border"><?= $drip_title; ?>
            <?php } ?>
            <?php if ($drip_sub_title != '') { ?>
                    <span><?= $drip_sub_title; ?></span>
            <?php } ?>
                </h2>
            <?php if ($drip_content != '') { ?>
                <p class="h4"><?= $drip_content; ?></p>
            <?php } ?>
            <?php if ($drip_content_link != '') { ?>
                <p><?= $drip_content_link; ?></p>
            <?php } ?>
            </div>
        </section>

        <?php 
            $webcast_title = get_field('webcast_title');
            $web_cast_image = get_field('web_cast_image');
            $web_cast_play_button_image = get_field('web_cast_play_button_image');
            $web_cast_content = get_field('web_cast_content');
            $web_cast_report_title = get_field('webcast_report_title');
        ?>
        <section class="investors-webcasts-block"  data-sec-id="webcasts">
            <div class="container">
            <?php if ($webcast_title != '') { ?>
                <h2 class="center-border"><?= $webcast_title; ?></h2>
            <?php } ?>
                <div class="card-distribute">
                    <div class="distribute-left">
                    <?php if ($web_cast_image != '') { ?>
                        <em class="headphone-img"><img src="<?= $web_cast_image['url']; ?>" alt="<?= $web_cast_image['alt']; ?>" title="<?= $web_cast_image['title']; ?>"></em>
                    <?php } ?>
                        <?php 
                            $rows = get_field('web_cast_conference');
                            $max_dates = array();
                            foreach ($rows as $r){
                                $ddd = str_replace('/', '-', $r['web_cast_conference_date']);
                                $d = strtotime($ddd);
                                array_push($max_dates,$d);
                            }
                            $max_date = max($max_dates);
                            $maxdate = date('d/m/Y', $max_date);

                            if (have_rows('web_cast_conference')) {;
                                while (have_rows('web_cast_conference')): the_row();
                                
                                $web_cast_conference_date = get_sub_field('web_cast_conference_date');
                                $web_cast_conference_name = get_sub_field('web_cast_conference_name');
                                $web_cast_conference_file = get_sub_field('web_cast_conference_file');

                                    if ($maxdate == $web_cast_conference_date){
                                    ?>
                                    <span><?= $web_cast_conference_date; ?></span>
                                    <h3 class="h6"><?= $web_cast_conference_name; ?></h3>
                                    <a href="<?= $web_cast_conference_file['url']; ?>" class="play-img" title="Play" target="_blank">
                                        <?php if ($web_cast_play_button_image != '') { ?>
                                        <img src="<?= $web_cast_play_button_image['url']; ?>" alt="<?= $web_cast_play_button_image['alt']; ?>" title="<?= $web_cast_play_button_image['title']; ?>">
                                        <?php } ?>
                                    </a>
                                    <?php
                                    }
                                endwhile;
                            }
                        ?>
                    <?php if ($web_cast_content != '') { ?>
                        <p><?= $web_cast_content; ?></p>
                    <?php } ?>
                    </div>
                    <div class="distribute-right">
                        <div class="distribute-table-header">
                        <?php if ($web_cast_report_title != '') { ?>
                            <h3 class="h4"><?= $web_cast_report_title ?></h3>
                        <?php } ?>
                            <label class="d-none" for="webcastsSelectYear">Year</label>
                            <select class="form-control custom-dropdown" id="webcastsSelectYear">
                                <?php 
                                    foreach ($year_final as $years) {
                                        ?>
                                            <option value="<?= $years; ?>"><?= $years; ?></option>
                                        <?php
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="investors-webcasts-list" id="webcast">

                            <?php
                                $args = array(
                                    'post_type'=>'document',
                                    'post_status' => 'publish',
                                    'orderby'=> 'post_date', 
                                    'order' => 'DESC',
                                    'nopaging' => true,
                                    'date_query' => array(
                                        array(
                                            'year'  => $year_final[0],
                                       ),
                                   ),
                               );
                                $loop = new WP_Query($args);

                                if ($loop->have_posts()) {
                                    while ($loop->have_posts()) : 
                                        $loop -> the_post(); 
                                        
                                        $document_type = get_field('document_type');
                                        $file_name = get_field('file_name');
                                        $full_date = get_the_date();
                                        $month = date('m', strtotime($full_date));
                                        $date = date('d', strtotime($full_date));
                                        $year = date('Y', strtotime($full_date));
                                        $report_file = get_field('report_file');

                                        $whole_date = $date.'.'.$month.'.'.$year;

                                        if ($document_type == 'webcast') {
                                    ?>

                                        <a href="<?= $report_file['url']; ?>" title="" class="webcasts-list-outer" target="_blank">
                                            <h4 class="h6"><?= $whole_date; ?></h4>
                                            <p><?= $file_name; ?></p>
                                        </a>

                                    <?php 
                                        }
                                    endwhile;
                                }
                                wp_reset_postdata();
                            ?>

                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php 
            $investor_presentation_content = get_field('investor_presentation_content');
            $investor_presentation_title = get_field('investor_presentation_title');
            $all_presentation_button_text = get_field('all_presentation_button_text');
            $count = 1;
        ?>
        <section class="investors-presentations-block" data-sec-id="presentations">
            <div class="container">
            <?php if ($investor_presentation_title != '') { ?>
                <h2 class="center-border"><?= $investor_presentation_title; ?></h2>
            <?php } ?>
            <?php if ($investor_presentation_content != '') { ?>
                <p><?= $investor_presentation_content; ?></p>
            <?php } ?>
                <div class="row">

                    <?php 
                        $args = array(
                            'post_type'=>'document',
                            'post_status' => 'publish',
                            'orderby'=> 'post_date', 
                            'order' => 'DESC',
                            'nopaging' => true,
                       );
                        $loop = new WP_Query($args);

                        if ($loop->have_posts()) {
                            while ($loop->have_posts()) : 
                                $loop -> the_post(); 
                                
                                $document_type = get_field('document_type');
                                $file_name = get_field('file_name');
                                $full_date = get_the_date();
                                $month = date('m', strtotime($full_date));
                                $date = date('d', strtotime($full_date));
                                $year = date('Y', strtotime($full_date));
                                $report_file = get_field('report_file');

                                if (get_field('presentation_front_page')) {
                                    $presentation_front_page = get_field('presentation_front_page');
                                }

                                $whole_date = $date.'.'.$month.'.'.$year;

                                if ($document_type == 'presentation' && $count<=3) {
                            ?>

                            <div class="col-sm-4">
                                <a href="<?= $report_file['url']; ?>" class="card">
                                    <div class="thumb" style="background-image: url(<?= $presentation_front_page['url']; ?>);"></div>
                                    <?php if ($file_name != '') { ?>
                                    <h3 class="h6"><?= $file_name; ?>
                                    <?php } ?>
                                    <?php if ($whole_date != '') { ?>
                                        <span><?= $whole_date; ?></span>
                                    <?php } ?>
                                    </h3>
                                </a>
                            </div>

                            <?php 
                                $count++;
                                }
                            endwhile;
                        }
                        wp_reset_postdata();
                    ?>
                    
                </div>
                <a href="#" class="btn md btn-outline-primary" data-toggle="modal" data-target="#presentationsModal" title="<?= $all_presentation_button_text ?>"><?= $all_presentation_button_text ?></a>
            </div>
        </section>

        <?php 
            $analyst_title = get_field('analyst_title');
            $analyst_image = get_field('analyst_image');
            $analyst_content = get_field('analyst_content');
        ?>
        <section class="investors-analysts-block" data-sec-id="analysts">
            <div class="container">
                <?php if ($analyst_title != '') { ?>
                    <h2 class="center-border"><?= $analyst_title; ?></h2>
                <?php } ?>
                <?php if ($analyst_image != '') { ?>
                <em class="thumb"><img src="<?= $analyst_image['url']; ?>" alt="<?= $analyst_image['alt']; ?>" title="<?= $analyst_image['title']; ?>"></em>
                <?php } ?>
                <?php if ($analyst_content != '') { ?>
                    <p><?= $analyst_content; ?></p>
                <?php } ?>
                <div class="table-wrapper">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <?php 
                                        if (have_rows('analyst_form_column')) {
                                        while (have_rows('analyst_form_column')): the_row();
                                        $analyst_form_column_name = get_sub_field('analyst_form_column_name');
                                        ?>
                                        <th id="tbl<?= $analyst_form_column_name; ?>"><?= $analyst_form_column_name; ?></th>
                                        <?php 
                                            endwhile;
                                            wp_reset_postdata();
                                        }    
                                    ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    if (have_rows('analyst_form_data')) {
                                    while (have_rows('analyst_form_data')): the_row();

                                    $firm = get_sub_field('firm');
                                    $analyst_name = get_sub_field('analyst_name');
                                    $analyst_contact_no = get_sub_field('analyst_contact_no');
                                    $analyst_email = get_sub_field('analyst_email');
                                    ?>
                                    <tr>
                                        <td headers="tblFirm"><?= $firm; ?></td>
                                        <td headers="tblAnalyst"><?= $analyst_name; ?></td>
                                        <td headers="tblContact"><?= $analyst_contact_no;; ?></td>
                                        <td headers="tblAction">
                                            <a href="<?= $analyst_email['url']; ?>" title="<?= $analyst_email['title']; ?>"><?= $analyst_email['title']; ?></a>
                                        </td>
                                    </tr>
                                    <?php 
                                        endwhile;
                                    }    
                                ?>
                            </tbody>
                        </table>
                    </div>	
                </div>
            </div>
        </section>

        <?php 
            $investor_information_title = get_field('investor_information_title');
            $another_investor_information_heading = get_field('another_investor_information_heading');
            $investor_information_content = get_field('investor_information_content');
            $another_investor_information_link = get_field('another_investor_information_link');
            $investor_information_image = get_field('investor_information_image');
            $another_investor_information_content = get_field('another_investor_information_content');
        ?>
        <section class="investors-governance-block" data-sec-id="governance">
            <div class="container">
            <?php if ($investor_information_title != '') { ?>
                <h2 class="center-border"><?= $investor_information_title; ?></h2>
            <?php } ?>
                <?= $investor_information_content; ?>
                <div class="card">
                <?php if ($investor_information_image != '') { ?>
                    <img src="<?= $investor_information_image['url']; ?>" alt="<?= $investor_information_image['alt']; ?>" title="<?= $investor_information_image['title']; ?>">
                <?php } ?>
                </div>
            <?php if ($another_investor_information_heading != '') { ?>
                <p class="h4"><?= $another_investor_information_heading ?></p>
            <?php } ?>
            <?php if ($investor_information_content != '') { ?>
                <p><?= $investor_information_content; ?></p>
            <?php } ?>
            <?php if ($another_investor_information_link != '') { ?>
                <p><?= $another_investor_information_link; ?></p>
            <?php } ?>
            </div>
        </section>

    </main>
    <!-- End Main Content -->

    <?php 
        $presentation_menu_close_icon = get_field('presentation_menu_close_icon');
        $presentation_menu_pdf_icon = get_field('presentation_menu_pdf_icon');
        $all_presentation_model_title = get_field('all_presentation_model_title');
    ?>
    <!-- The Modal -->
	<div class="modal fade presentationsmodal" id="presentationsModal">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">

				<!-- Modal Header -->
				<div class="modal-header">
					<h2 class="h4 no-border modal-title"><?= $all_presentation_model_title; ?></h2>
					<button type="button" class="close" data-dismiss="modal">
                    <?php if ($presentation_menu_close_icon != '') { ?>
						<img src="<?= $presentation_menu_close_icon['url']; ?>" alt="<?= $presentation_menu_close_icon['alt']; ?>" title="<?= $presentation_menu_close_icon['title']; ?>">
                    <?php } ?>
					</button>
				</div>

				<!-- Modal body -->
				<div class="modal-body">
					<div class="form-group">
						<label class="d-none" for="presentationsModalYear">Year</label>
						<select class="form-control custom-dropdown" id="presentationsModalYear">
                            <?php 
                                foreach ($year_final as $years) {
                                    ?>
                                        <option value="<?= $years; ?>"><?= $years; ?></option>
                                    <?php
                                }
                            ?>
						</select>
					</div>
					<ul class="pdf-list" id="presentation">

                    <?php 
                        $args = array(
                            'post_type'=>'document',
                            'post_status' => 'publish',
                            'orderby'=> 'post_date', 
                            'order' => 'DESC',
                            'nopaging' => true,
                            'date_query' => array(
                                array(
                                    'year'  => $year_final[0],
                               ),
                           ),
                       );
                        $loop = new WP_Query($args);

                        if ($loop->have_posts()) {
                            while ($loop->have_posts()) : 
                                $loop -> the_post(); 
                                
                                $document_type = get_field('document_type');
                                $file_name = get_field('file_name');
                                $full_date = get_the_date();
                                $month = date('m', strtotime($full_date));
                                $date = date('d', strtotime($full_date));
                                $year = date('Y', strtotime($full_date));
                                $report_file = get_field('report_file');

                                $whole_date = $date.'.'.$month.'.'.$year;

                                if ($document_type == 'presentation') {
                            ?>

                                <li>
                                    <a href="<?= $report_file; ?>" class="card-info" target="_blank">
                                        <div class="left-content">
                                            <h3 class="h6"><?= $file_name; ?></h3>
                                            <span><?= $whole_date; ?></span>
                                        </div>
                                        <?php if ($presentation_menu_pdf_icon != '') { ?>
                                        <em><img src="<?= $presentation_menu_pdf_icon['url']; ?>" alt="<?= $presentation_menu_pdf_icon['alt']; ?>" title="<?= $presentation_menu_pdf_icon['title']; ?>"></em>
                                        <?php } ?>
                                    </a>
                                </li>

                            <?php 
                                }
                            endwhile;
                        }
                        wp_reset_postdata();
                    ?>
						
					</ul>
				</div>

			</div>
		</div>
	</div>

<?php 

get_footer();
?>