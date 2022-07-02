<?php

function infinite_scroll() {
    if (!empty($_POST)) {
        $paged = $_POST['page_no'];
        $news_page_id = $_POST['news_page_id'];
    }
    $icon_read_more = get_field('icon_read_more',$news_page_id);
    $posts_per_pages = get_field('posts_per_pages','options');
    $status = false;
    $message = '';
    ob_start();

    $args = array(
        'post_type'=>'news',
        'post_status' => 'publish',
        'orderby'=> 'post_date', 
        'order' => 'DESC',
        'posts_per_page' => $posts_per_pages,
        'paged' => $paged,
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
                            <a href="<?= get_permalink(); ?>" class="read-more-link" title="Read more">Read more
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
        $message = ob_get_clean();
        $status = true;
    }
    wp_send_json(['status' => $status, 'message' => $message]);
}
add_action('wp_ajax_infinite_scroll', 'infinite_scroll');
add_action('wp_ajax_nopriv_infinite_scroll', 'infinite_scroll');

function filter_month() {
    if (!empty($_POST)) {
        $selected_month = $_POST['month'];
        $selected_year = $_POST['year'];
        $news_page_id = $_POST['news_page_id'];
        $pagenumber = $_POST['pagenumber'];
    }
    $icon_read_more = get_field('icon_read_more',$news_page_id);
    $posts_per_pages = get_field('posts_per_pages','options');
    $status = false;
    $message = '';
    ob_start();

    if ($selected_month == 0) {
        $args = array(
            'post_type'=>'news',
            'post_status' => 'publish',
            'orderby'=> 'post_date', 
            'order' => 'DESC',
            'posts_per_page' => $posts_per_pages,
            'paged' => $pagenumber,
            'date_query' => array(
                array(
                    'year'  => $selected_year,
                    'month' => '',
                ),
            ),
        );
    }
    else{
        $args = array(
            'post_type'=>'news',
            'post_status' => 'publish',
            'orderby'=> 'post_date', 
            'order' => 'DESC',
            'posts_per_page' => $posts_per_pages,
            'paged' => $pagenumber,
            'date_query' => array(
                array(
                    'year'  => $selected_year,
                    'month' => $selected_month,
                ),
            ),
        );
    }
    $loop = new WP_Query($args);

    if ($loop->have_posts()) {
        while ($loop->have_posts()) : $loop -> the_post();            
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
                            <a href="<?= get_permalink(); ?>" class="read-more-link" title="Read more">Read more
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
        $message = ob_get_clean();
        $status = true;
    }
    wp_send_json(['status' => $status, 'message' => $message, 'max_page_number' => $loop->max_num_pages]);
}
add_action('wp_ajax_filter_month', 'filter_month');
add_action('wp_ajax_nopriv_filter_month', 'filter_month');

function financialReportSelectYear() {
    if (!empty($_POST)) {
        $financialReportSelectYear = $_POST['year'];
        $investor_page_id = $_POST['investor_page_id'];
    }
    $status = false;
    $message = '';
    ob_start();

    $args = array(
        'post_type'=>'document',
        'orderby'=> 'post_date', 
        'order' => 'DESC',
        'post_status' => 'publish',
        'nopaging' => true,
        'date_query' => array(
            array(
                'year'  => $financialReportSelectYear,
            ),
        ),
    );
    $loop = new WP_Query($args);

    if ($loop->have_posts()) {
        while ($loop->have_posts()) : $loop -> the_post();            
            $document_type = get_field('document_type');
            $file_name = get_field('file_name');
            $report_pdf_image = get_field('report_pdf_image',$investor_page_id);
            $report_file = get_field('report_file');
            if ($document_type == 'financereport') {
        ?>
            <div class="col-md-3 col-sm-6">
                <div class="card-info-wrapper" tabindex="0">
                    <a href="<?= $report_file['url']; ?>" title="<?= $file_name; ?> PDF" target="_blank" class="card-info">
                        <h3 class="h6"><?= $file_name; ?> </h3>
                        <?php if ($report_pdf_image != '') { ?>
                            <em><img src="<?= $report_pdf_image['url']; ?>" alt="<?= $report_pdf_image['alt']; ?>" title="<?= $report_pdf_image['title']; ?>"></em>
                        <?php } ?>
                    </a>
                </div>
            </div>
        <?php 
            }
        endwhile;
        $message = ob_get_clean();
        $status = true;
    }
    wp_send_json(['status' => $status, 'message' => $message]);
}
add_action('wp_ajax_financialReportSelectYear', 'financialReportSelectYear');
add_action('wp_ajax_nopriv_financialReportSelectYear', 'financialReportSelectYear');

function webcastsSelectYear() {
    if (!empty($_POST)) {
        $webcastsSelectYear = $_POST['year'];
    }
    $status = false;
    $message = '';
    ob_start();

    $args = array(
        'post_type'=>'document',
        'post_status' => 'publish',
        'orderby'=> 'post_date', 
        'order' => 'DESC',
        'nopaging' => true,
        'date_query' => array(
            array(
                'year'  => $webcastsSelectYear,
            ),
        ),
    );
    $loop = new WP_Query($args);

    if ($loop->have_posts()) {
        while ($loop->have_posts()) : $loop -> the_post();
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
        $message = ob_get_clean();
        $status = true;
    }
    wp_send_json(['status' => $status, 'message' => $message]);
}
add_action('wp_ajax_webcastsSelectYear', 'webcastsSelectYear');
add_action('wp_ajax_nopriv_webcastsSelectYear', 'webcastsSelectYear');

function presentationsModalYear() {
    if (!empty($_POST)) {
        $presentationsModalYear = $_POST['year'];
        $investor_page_id = $_POST['investor_page_id'];
    }
    $presentation_menu_pdf_icon = get_field('presentation_menu_pdf_icon',$investor_page_id);
    $status = false;
    $message = '';
    ob_start();

    $args = array(
        'post_type'=>'document',
        'post_status' => 'publish',
        'orderby'=> 'post_date', 
        'order' => 'DESC',
        'nopaging' => true,
        'date_query' => array(
            array(
                'year'  => $presentationsModalYear,
            ),
        ),
    );
    $loop = new WP_Query($args);
    if ($loop->have_posts()) {
        while ($loop->have_posts()) : $loop -> the_post();            
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
                <a href="<?= $report_file['url']; ?>" class="card-info" target="_blank">
                    <div class="left-content">
                        <h3 class="h6"><?= $file_name; ?></h3>
                        <span><?= $whole_date; ?></span>
                    </div>
                    <?php if ($presentation_menu_pdf_icon != '') { ?>
                    <em><img src="<?= $presentation_menu_pdf_icon['url']; ?>" alt="<?= $presentation_menu_pdf_icon['alt']; ?>"></em>
                    <?php } ?>
                </a>
            </li>
        <?php 
            }
        endwhile;
        $message = ob_get_clean();
        $status = true;
    }
    wp_send_json(['status' => $status, 'message' => $message]);
}
add_action('wp_ajax_presentationsModalYear', 'presentationsModalYear');
add_action('wp_ajax_nopriv_presentationsModalYear', 'presentationsModalYear');

function tableHeaderSelectYear() {
    if (!empty($_POST)) {
        $tableHeaderSelectYear = $_POST['year'];
        $investor_page_id = $_POST['investor_page_id'];
    }
    $text_for_total = get_field('text_for_total',$investor_page_id);
    $total_amount = 0;
    $status = false;
    $download = '';
    $total = '';
    $tabel_data = '';
    ob_start();                                

    if (have_rows('distribution_payment',$investor_page_id)) {
        while (have_rows('distribution_payment',$investor_page_id)): the_row();
            if (get_row_layout() == 'column_section') {                    
                $year_of_record = get_sub_field('year_of_record');
                if ($year_of_record == $tableHeaderSelectYear) {
                    $distribution_payment_file = get_sub_field('distribution_payment_file');
                    echo $distribution_payment_file;
                }
            }
        endwhile;
        $download = ob_get_clean();
    }

    ob_start();
    if (have_rows('distribution_payment',$investor_page_id)) {
        while (have_rows('distribution_payment',$investor_page_id)): the_row();
            if (get_row_layout() == 'column_section') {                    
                $year_of_record = get_sub_field('year_of_record');
                $amount_symbol = get_sub_field('amount_symbol');
                $record_table = get_sub_field('record_table');
                foreach ($record_table as $col) {
                    if ($year_of_record == $tableHeaderSelectYear) { 
                    $total_amount = $total_amount + $col['distribution'];
                    }
                }
            }
        endwhile;
    }
    ?>
        <tr>
            <th id="totalUnit"><?= $text_for_total; ?></th>
            <th id="blankTotal"></th>
            <th id="totalValueUnit"><?php echo $amount_symbol.' '.$total_amount; ?></th>
        </tr>
    <?php
    $total = ob_get_clean();

    ob_start();
    if (have_rows('distribution_payment',$investor_page_id)) {
        while (have_rows('distribution_payment',$investor_page_id)): the_row();
            if (get_row_layout() == 'column_section') {                    
                $year_of_record = get_sub_field('year_of_record');
                $amount_symbol = get_sub_field('amount_symbol');
                $record_table = get_sub_field('record_table');
                foreach ($record_table as $col) {
                    if ($year_of_record == $tableHeaderSelectYear) {
            ?>
            <tr>
                <td headers="recordDate totalUnit"><?= $col['record_date']; ?></td>
                <td headers="paymentDate blankTotal"><?= $col['payment_date']; ?></td>
                <td headers="distributionUnit totalValueUnit"><?php echo $amount_symbol.' '.$col['distribution']; ?></td>
            </tr>        
            <?php 
                    }
                }
            }
        endwhile;
        $tabel_data = ob_get_clean();
        $status = true;
    }
    wp_send_json(['status' => $status, 'download' => $download, 'total' => $total, 'table_data' => $tabel_data]);
}
add_action('wp_ajax_tableHeaderSelectYear', 'tableHeaderSelectYear');
add_action('wp_ajax_nopriv_tableHeaderSelectYear', 'tableHeaderSelectYear');

function distributionsSelectYear() {
    if (!empty($_POST)) {
        $distributionsSelectYear = $_POST['year'];
        $investor_page_id = $_POST['investor_page_id'];
    }
    $status = false;
    $message = '';
    ob_start();
    if (have_rows('historical_tax_document',$investor_page_id)) {
        while (have_rows('historical_tax_document',$investor_page_id)): 
            the_row();
            $year_for_historical_tax = get_sub_field('year_for_historical_tax');            
            if ($year_for_historical_tax == $distributionsSelectYear) {
                $document_historical_tax = get_sub_field('document_historical_tax');
            }
        endwhile;
    }
    echo $document_historical_tax;
    $message = ob_get_clean();
    $status = true;
    wp_send_json(['status' => $status, 'message' => $message]);
}
add_action('wp_ajax_distributionsSelectYear', 'distributionsSelectYear');
add_action('wp_ajax_nopriv_distributionsSelectYear', 'distributionsSelectYear');

function investor_send_mail() {
    $status = false;
    $message = '';
    ob_start();
    require 'mail.php';
    $message = ob_get_clean();
    $status = true;
    wp_send_json(['status' => $status, 'message' => $message]);
}
add_action('wp_ajax_investor_send_mail', 'investor_send_mail');
add_action('wp_ajax_nopriv_investor_send_mail', 'investor_send_mail');

function product_data() {
    if (!empty($_POST)) {
        $product_id = $_POST['product_id'];
    }
    $status = false;
    $message = '';
    ob_start();
    $main_heading = get_field('main_heading', $product_id);
    $another_heading = get_field('another_heading', $product_id);
    $content_about_sds = get_field('content_about_sds', $product_id);
    $title_for_documents = get_field('title_for_documents', $product_id);
    ?>
    <?php if ($main_heading) { ?>
        <h2 class="h4 no-border"><?php echo the_field('main_heading', $product_id); ?></h2>
    <?php } ?>
    <?php echo the_field('main_content', $product_id); ?>
    <?php if ($another_heading) { ?>
        <h2 class="h4 no-border"><?= the_field('another_heading', $product_id); ?></h2>
    <?php } ?>
    <?php echo the_field('another_content', $product_id); ?>
    <?php
        if (have_rows('sub_heading_with_content', $product_id)) {
            while (have_rows('sub_heading_with_content', $product_id)): the_row();
                $sub_heading = get_sub_field('sub_heading');
                $sub_content_as_a_list = get_sub_field('sub_content_as_a_list');                
                ?>
                <div class="product-info">
                    <h3 class="h6"><?= $sub_heading; ?></h3>
                    <ul class="square-bullets">
                        <?= $sub_content_as_a_list; ?>
                    </ul>
                </div>
                <?php
            endwhile;
        }
    ?>
    <?php if ($title_for_documents) { ?>
        <div class="documents">
            <h3 class="h4"><?= the_field('title_for_documents', $product_id); ?></h3>
                <ul>
                    <?php 
                        if (have_rows('documents', $product_id)) {
                            while (have_rows('documents', $product_id)): the_row();
                            $document_file = get_sub_field('document_file');
                            $document_file_image = get_sub_field('document_file_image');
                            ?>
                                <li>
                                    <a href="<?= $document_file['url']; ?>" class="document-layout" title="<?= $document_file['title']; ?>">
                                    <?php if ($document_file_image != '') { ?>
                                        <em><img src="<?= $document_file_image['url']; ?>" alt="<?= $document_file['alt']; ?>" title="<?= $document_file['title']; ?>"></em>
                                    <?php } ?>
                                        <?= $document_file['title']; ?>
                                    </a>
                                </li>
                            <?php
                            endwhile;
                        }
                    ?>
                </ul>
        </div>
    <?php } ?>
    <?php if ($content_about_sds) { ?>
        <p class="h5"><?= the_field('content_about_sds', $product_id); ?> <a href="<?= the_field('sds_link', $product_id); ?>"><?= the_field('sds_link_text', $product_id); ?>.</a></p>
    <?php } ?>
    <?php
    $message = ob_get_clean();
    $blog = get_the_title( $product_id );
    $status = true;
    wp_send_json(['status' => $status, 'message' => $message, 'title' => $blog]);
}
add_action('wp_ajax_product_data', 'product_data');
add_action('wp_ajax_nopriv_product_data', 'product_data');

function productDropdown() {
    if (!empty($_POST)) {
        $product_id = $_POST['product_id'];
    }
    $status = false;
    $message = '';
    ob_start();
    $contact_number_for_this_product = get_field('contact_number_for_this_product',$product_id);
    if ($contact_number_for_this_product != '') {
        echo $contact_number_for_this_product;
    }
    $message = ob_get_clean();
    $status = true;
    wp_send_json(['status' => $status, 'message' => $message]);
}
add_action('wp_ajax_productDropdown', 'productDropdown');
add_action('wp_ajax_nopriv_productDropdown', 'productDropdown');

function product_data_back() {
    if (!empty($_POST)) {
        $product_url_back = $_POST['product_url_back'];
    }
    $product_id = url_to_postid($product_url_back);
    $status = false;
    $message = '';
    ob_start();
    $main_heading = get_field('main_heading', $product_id);
    $another_heading = get_field('another_heading', $product_id);
    $content_about_sds = get_field('content_about_sds', $product_id);
    $title_for_documents = get_field('title_for_documents', $product_id);
    ?>
    <?php if ($main_heading) { ?>
        <h2 class="h4 no-border"><?php echo the_field('main_heading', $product_id); ?></h2>
    <?php } ?>
    <?php echo the_field('main_content', $product_id); ?>
    <?php if ($another_heading) { ?>
        <h2 class="h4 no-border"><?= the_field('another_heading', $product_id); ?></h2>
    <?php } ?>
    <?php echo the_field('another_content', $product_id); ?>
    <?php
        if (have_rows('sub_heading_with_content', $product_id)) {
            while (have_rows('sub_heading_with_content', $product_id)): the_row();
                $sub_heading = get_sub_field('sub_heading');
                $sub_content_as_a_list = get_sub_field('sub_content_as_a_list');                
                ?>
                <div class="product-info">
                    <h3 class="h6"><?= $sub_heading; ?></h3>
                    <ul class="square-bullets">
                        <?= $sub_content_as_a_list; ?>
                    </ul>
                </div>
                <?php
            endwhile;
        }
    ?>
    <?php if ($title_for_documents) { ?>
        <div class="documents">
            <h3 class="h4"><?= the_field('title_for_documents', $product_id); ?></h3>
                <ul>
                    <?php 
                        if (have_rows('documents', $product_id)) {
                            while (have_rows('documents', $product_id)): the_row();
                            $document_file = get_sub_field('document_file');
                            $document_file_image = get_sub_field('document_file_image');
                            ?>
                                <li>
                                    <a href="<?= $document_file['url']; ?>" class="document-layout" title="<?= $document_file['title']; ?>">
                                    <?php if ($document_file_image != '') { ?>
                                        <em><img src="<?= $document_file_image['url']; ?>" alt="<?= $document_file['alt']; ?>" title="<?= $document_file['title']; ?>"></em>
                                    <?php } ?>
                                        <?= $document_file['title']; ?>
                                    </a>
                                </li>
                            <?php
                            endwhile;
                        }
                    ?>
                </ul>
        </div>
    <?php } ?>
    <?php if ($content_about_sds) { ?>
        <p class="h5"><?= the_field('content_about_sds', $product_id); ?> <a href="<?= the_field('sds_link', $product_id); ?>"><?= the_field('sds_link_text', $product_id); ?>.</a></p>
    <?php } ?>
    <?php
    $message = ob_get_clean();
    $status = true;
    wp_send_json(['status' => $status, 'message' => $message, 'product_id' => $product_id]);
}
add_action('wp_ajax_product_data_back', 'product_data_back');
add_action('wp_ajax_nopriv_product_data_back', 'product_data_back');

?>