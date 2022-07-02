<?php 

// Template Name: Contact Page
get_header();
?>

    <!-- Main Content -->
    <main class="main-content ">
        <!-- Main page header -->
        <section class="page-header" style="background-image: url(<?= get_the_post_thumbnail_url(get_the_ID(),'full'); ?>);">
            <div class="container">
                <h1><?= get_the_title(); ?></h1>
            </div>
            <div class="hero-media-wrapper">
                <div class="container">
                    <ul class="social-media-nav">
                        <?php 
                            $data_delay = 0;
                            if (have_rows('social_media_logo','options')) {
                                while (have_rows('social_media_logo','options')): the_row();
                                    $social_media = get_sub_field('social_media','options');
                                    $social_media_logo_title = get_sub_field('social_media_logo_title','options');
                                    $social_media_link = get_sub_field('social_media_link','options');
                                ?>
                                <li data-aos="fade-up" data-aos-delay="<?= $data_delay; ?>">
                                    <a href="<?= $social_media_link; ?>" title="<?= $social_media_logo_title; ?>">
                                        <?php if ($social_media != '') { ?>                                        
                                        <img src="<?= $social_media['url']; ?>" alt="<?= $social_media['alt']; ?>">
                                        <?php } ?>
                                    </a>
                                </li>
                                <?php 
                                $data_delay = $data_delay + 200;
                                endwhile;
                            }
                        ?>
                    </ul>
                </div>
            </div>
        </section>

        <?php 
            $head_office_title_bold = get_field('head_office_title_bold');
            $head_office_title_light = get_field('head_office_title_light');
            $location_icon = get_field('location_icon');
            $head_company_address = get_field('head_company_address');
            $telephone_icon = get_field('telephone_icon');
            $fax_icon = get_field('fax_icon');
            $fax_bold_name = get_field('fax_bold_name');
            $fax_number = get_field('fax_number');
        ?>
        <section class="contact-head-office-block">
            <div class="container">
            <?php if ($head_office_title_bold != '') { ?>
                <h2 class="h3"><?= $head_office_title_bold; ?><span><?= $head_office_title_light; ?></span></h2>
            <?php } ?>
                <ul class="contact-list">
                    <li class="w-lg">
                    <?php if ($location_icon != '') { ?>
                        <em><img src="<?= $location_icon['url']; ?>" alt="<?= $location_icon['alt']; ?>" title="<?= $location_icon['title']; ?>"></em>
                    <?php } ?>
                    <?php if ($head_company_address != '') { ?>
                        <div class="right-contact">
                            <?= $head_company_address; ?>
                        </div>
                    <?php } ?>
                    </li>
                    <li>
                    <?php if ($telephone_icon != '') { ?>
                        <em><img src="<?= $telephone_icon['url']; ?>" alt="<?= $telephone_icon['alt']; ?>" title="<?= $telephone_icon['title']; ?>"></em>
                    <?php } ?>
                        <div class="right-contact">
                            <div class="right-contact-inner">
                            <?php 
                                if (have_rows('telephone_details')) {
                                    while (have_rows('telephone_details')): the_row();
                                        $telephone_phone_name_bold = get_sub_field('telephone_phone_name_bold');
                                        $telephone_number = get_sub_field('telephone_number');
                                        ?>
                                        <strong> <?= $telephone_phone_name_bold; ?> </strong>
									    <a href="tel:<?= $telephone_number; ?>" title="<?= $telephone_number; ?>"><?= $telephone_number; ?></a>
                                        <?php
                                    endwhile;
                                }
                            ?>
                            </div>
                        </div>
                    </li>
                    <li>
                    <?php if ($fax_icon != '') { ?>
                        <em><img src="<?= $fax_icon['url']; ?>" alt="<?= $fax_icon['alt']; ?>" title="<?= $fax_icon['title']; ?>"></em>
                    <?php } ?>
                    <?php if ($fax_bold_name != '') { ?>
                        <div class="right-contact">
                            <strong><?= $fax_bold_name; ?> </strong>
                            <a href="#" title="<?= $fax_number; ?>"><?= $fax_number; ?></a>
                        </div>
                    <?php } ?>
                    </li>
                </ul>
            </div>
        </section>

        <?php 
            $contact_field_title = get_field('contact_field_title');
            $tab_id = ['#InquiriesTab','#ProductInformationTab','#SalesTab','#InvestorContactTab','#ComplianceTab','#EmergencyTab'];
            $i = 0;
        ?>
        <section class="contact-tab-block">
            <div class="container">
                <h2 class="h4 no-border"><?= $contact_field_title; ?></h2>

                <!-- Nav tabs -->
                <div class="contact-tab-wrapper">
                    <ul class="nav contact-tab">
                        <?php 
                            if (have_rows('tab_details')) {
                                while (have_rows('tab_details')): the_row();
                                    $regular_image = get_sub_field('regular_image');
                                    $active_image = get_sub_field('active_image');
                                    $tab_name = get_sub_field('tab_name');
                                        if ($i == 0) {
                                    ?>
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="tab" href="<?= $tab_id[$i]; ?>" title="<?= $tab_name; ?>">
                                                <em class="img-icon">
                                                    <img src="<?= $regular_image['url']; ?>" alt="<?= $regular_image['alt']; ?>" title="<?= $regular_image['title']; ?>">
                                                    <img src="<?= $active_image['url']; ?>" alt="<?= $active_image['alt']; ?>" title="<?= $active_image['title']; ?>" class="overlap-img">
                                                </em>
                                                <span><?= $tab_name; ?></span>
                                            </a>
                                        </li>
                                    <?php
                                        } else {
                                            ?>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-toggle="tab" href="<?= $tab_id[$i]; ?>" title="<?= $tab_name; ?>">
                                                        <em class="img-icon">
                                                            <img src="<?= $regular_image['url']; ?>" alt="<?= $regular_image['alt']; ?>" title="<?= $regular_image['title']; ?>">
                                                            <img src="<?= $active_image['url']; ?>" alt="<?= $active_image['alt']; ?>" title="<?= $active_image['title']; ?>" class="overlap-img">
                                                        </em>
                                                        <span><?= $tab_name; ?></span>
                                                    </a>
                                                </li>
                                            <?php
                                        }
                                    $i++;
                                endwhile;
                            }
                        ?>
                    </ul>
                </div>

                <!-- Tab panes -->
                <div class="tab-content contact-tab-panel">
                    <?php 
                        $inquiry_heading = get_field('inquiry_heading');
                        $call_us_icon = get_field('call_us_icon');
                        $text_for_call = get_field('text_for_call');
                    ?>
                    <div class="tab-pane active" id="InquiriesTab">
                        <?php if ($inquiry_heading != '') { ?>
                            <h3 class="h4"><?= $inquiry_heading; ?></h3>
                        <?php } ?>
                        <?php echo apply_shortcodes( '[contact-form-7 id="1419" title="Contact inquiry"]' ); ?>
                        <div class="call-us-block">
                            <div class="img-content h4">
                            <?php if ($call_us_icon != '') { ?>
                                <em><img src="<?= $call_us_icon['url']; ?>" alt="<?= $call_us_icon['alt']; ?>" title="<?= $call_us_icon['title']; ?>"></em>
                            <?php } ?>
                                <?= $text_for_call; ?>
                            </div>
                            <div class="form-group">
                                <label for="productDropdown">Select Product</label>
                                <select class="form-control custom-dropdown" id="productDropdown" >
                                    <?php 
                                        $i = 0;
                                        $args = new WP_Query(array(
                                            'post_type' => 'product',
                                            'orderby' => 'title',
                                            'order' => 'ASC',
                                            'post_status' => 'publish',
                                            'nopaging' => true,
                                       ));
                                        if ($args->have_posts()) {
                                            while ($args->have_posts()) : $args->the_post();
                                                if ($i == 0) {
                                                    $product_id = get_the_ID();
                                                    $i++;
                                                }
                                            ?>
                                                <option value="<?= get_the_ID(); ?>"><?= get_the_title(); ?></option>
                                            <?php
                                            endwhile;
                                        }
                                        wp_reset_postdata();
                                    ?>
                                </select>
                            </div>
                            <?php 
                                $product_contact_number = get_field('contact_number_for_this_product',$product_id);
                            ?>
                            <span class="h4" id="contact_number"><?= $product_contact_number; ?></span>
                        </div>
                    </div>

                    <?php 
                        $product_information_heading = get_field('product_information_heading');
                    ?>
                    <div class="tab-pane fade" id="ProductInformationTab">
                        <?php if ($product_information_heading != '') { ?>
                            <h3 class="h4"><?= $product_information_heading; ?></h3>
                        <?php } ?>
                        <?php echo apply_shortcodes('[contact-form-7 id="1420" title="Contact product information"]'); ?>
                    </div>

                    <?php 
                        $sales_heading = get_field('sales_heading');
                        $sales_email_icon = get_field('sales_email_icon');
                        $sales_email = get_field('sales_email');
                        $sales_another_heading = get_field('sales_another_heading');
                    ?>
                    <div class="tab-pane fade sales-contact-tab" id="SalesTab">
                        <div class="sales-contact-info">
                        <?php if ($sales_heading != '') { ?>
                            <h3 class="h4"><?= $sales_heading; ?></h3>
                        <?php } ?>
                        <?php if ($sales_email != '') { ?>
                            <a href="mailto:<?= $sales_email; ?>" title="<?= $sales_email; ?>">
                                <?php if ($sales_email_icon != '') { ?>
                                <em><img src="<?= $sales_email_icon['url']; ?>" alt="<?= $sales_email_icon['alt']; ?>" title="<?= $sales_email_icon['title']; ?>"></em>
                                <?php } ?>
                                <?= $sales_email; ?>
                            </a>
                        <?php } ?>
                        </div>
                        <?php if ($sales_another_heading != '') { ?>
                        <h3 class="h4"><?= $sales_another_heading; ?></h3>
                        <?php } ?>
                        <?php 
                            if (have_rows('branch_contact_detail')) {
                                while (have_rows('branch_contact_detail')): the_row();
                                    $branch_office_name = get_sub_field('branch_office_name');
                                    $contact_icon = get_sub_field('contact_icon');
                                    $contact_number = get_sub_field('contact_number');
                                    $mail_icon = get_sub_field('mail_icon');
                                    $branch_email_address = get_sub_field('branch_email_address');
                                    ?>
                                        <div class="sales-contact-info">
                                        <?php if ($branch_office_name != '') { ?>
                                            <h4 class="h6"><?= $branch_office_name; ?></h4>
                                        <?php } ?>
                                            <div class="phone-numbers">
                                            <?php if ($contact_icon != '') { ?>
                                                <em><img src="<?= $contact_icon['url']; ?>" alt="<?= $contact_icon['alt']; ?>" title="<?= $contact_icon['title']; ?>"></em>
                                            <?php } ?>
                                                <div class="numbers">
                                                    <?php 
                                                        foreach ($contact_number as $cn){
                                                            ?>
                                                            <a href="tel:<?= $cn['phone_number']; ?>" title="<?= $cn['phone_number']; ?>"><?= $cn['phone_number']; ?></a>
                                                            <?php
                                                        }
                                                    ?>
                                                </div>
                                            </div>
                                            <?php if ($branch_email_address != '') { ?>
                                            <a href="mailto:<?= $branch_email_address; ?>" title="<?= $branch_email_address; ?>">
                                            <?php if ($mail_icon != '') { ?>
                                                <em><img src="<?= $mail_icon['url']; ?>" alt="<?= $mail_icon['alt']; ?>" title="<?= $mail_icon['title']; ?>"></em>
                                            <?php } ?>
                                                <?= $branch_email_address; ?>
                                            </a>
                                            <?php } ?>
                                        </div>
                                    <?php
                                endwhile;
                            }
                            ?>
                    </div>

                    <?php 
                        $agent_heading = get_field('agent_heading');
                        $agent_content = get_field('agent_content');
                        $company_name = get_field('company_name');
                        $telephone_title = get_field('telephone_title');
                        $telephone_number = get_field('telephone_number');
                        $fax_title = get_field('fax_title');
                        $company_fax_number = get_field('company_fax_number');
                        $company_site_url_text = get_field('company_site_url_text');
                        $company_site_url = get_field('company_site_url');
                    ?>
                    <div class="tab-pane fade" id="InvestorContactTab">
                        <div class="investor-contact-block">
                            <div class="investor-contact-left">
                            <?php 
                                if (have_rows('investor_details')) {
                                    while (have_rows('investor_details')): the_row();
                                        $investor_heading = get_sub_field('investor_heading');
                                        $investor_conent = get_sub_field('investor_conent');
                                        $investor_email_address = get_sub_field('investor_email_address');
                                        ?>
                                            <div class="info">
                                                <h3 class="h4"><?= $investor_heading; ?></h3>
                                                <p><?= $investor_conent; ?>
                                                    <a href="mailto:<?= $investor_email_address; ?>" title="<?= $investor_email_address; ?>"> <?= $investor_email_address; ?></a>
                                                </p>
                                            </div>
                                        <?php
                                    endwhile;
                                }
                                ?>
                            </div>
                            <div class="investor-contact-right">
                            <?php if ($agent_heading != '') { ?>
                                <h3 class="h4"><?= $agent_heading; ?></h3>
                            <?php } ?>
                                <p><?= $agent_content; ?></p>
                                <div class="investor-contact-services">
                                <?php if ($company_name != '') { ?>
                                    <h4 class="h6"><?= $company_name; ?></h4>
                                <?php } ?>
                                    <address>
                                    <?php 
                                        if (have_rows('company_address')) {
                                            while (have_rows('company_address')): the_row();
                                            $company_address_row = get_sub_field('company_address_row');
                                            ?>
                                                <span><?= $company_address_row; ?></span>
                                            <?php
                                            endwhile;
                                        }
                                    ?>
                                    </address>
                                    <p><?= $telephone_title; ?>
                                        <?php if ($telephone_number != '') { ?>
                                        <a href="tel:<?= $telephone_number; ?>" title="<?= $telephone_number; ?>"><?= $telephone_number; ?></a>
                                        <?php } ?>
                                    </p>
                                    <p><?= $fax_title; ?>
                                        <?php if ($company_fax_number != '') { ?>
                                        <a href="#" title="pl<?=$company_fax_number; ?>"><?=$company_fax_number; ?></a>
                                        <?php } ?>
                                    </p>
                                    <?php if ($company_site_url_text != '') { ?>
                                    <a href="<?= $company_site_url; ?>" title="<?= $company_site_url_text; ?>" target="_blank"> <?= $company_site_url_text; ?> </a>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php 
                        $compliance_title = get_field('compliance_title');
                        $compliance_content = get_field('compliance_content');
                    ?>
                    <div class="tab-pane fade compliance-contact-tab" id="ComplianceTab">
                        <?php if ($compliance_title != '') { ?>
                            <h4><?= $compliance_title; ?></h4>
                        <?php } ?>
                        <p><?= $compliance_content; ?></p>
                        <ul class="compliance-contact">
                            <?php 
                            $j = 1;
                                if (have_rows('compliance_company_details')) {
                                    while (have_rows('compliance_company_details')): the_row();
                                        $compliance_company_heading = get_sub_field('compliance_company_heading');
                                        $compliance_company_sub_heading = get_sub_field('compliance_company_sub_heading');
                                        $compliance_company_contact_number = get_sub_field('compliance_company_contact_number');
                                        $compliance_company_email = get_sub_field('compliance_company_email');
                                        $compliance_company_url_text = get_sub_field('compliance_company_url_text');
                                        $compliance_company_url = get_sub_field('compliance_company_url');
                                    ?>
                                        <li>
                                            <div class="index"><?= $j; ?></div>
                                            <?php if ($compliance_company_heading != '') { ?>
                                                <p class="h6"><?= $compliance_company_heading; ?> <span><?= $compliance_company_sub_heading; ?></span></p>
                                            <?php } ?>
                                            <?php if ($compliance_company_contact_number != '') { ?>
                                                <a href="tel:<?= $compliance_company_contact_number; ?>" title="<?= $compliance_company_contact_number; ?>"> <?= $compliance_company_contact_number; ?> </a>
                                            <?php } ?>
                                            <?php if ($compliance_company_url != '') { ?>
                                                <a href="<?= $compliance_company_url; ?>" title="<?= $compliance_company_url_text; ?>" class="site-link" target="_blank"><?= $compliance_company_url_text; ?></a>
                                            <?php } ?>
                                            <?php if ($compliance_company_email != '') { ?>
                                                <a href="mailto:<?= $compliance_company_email; ?>" title="<?= $compliance_company_email; ?>" class="site-link"><?= $compliance_company_email; ?></a>
                                            <?php } ?>
                                        </li>
                                    <?php 
                                    $j++;
                                    endwhile;
                                }
                            ?>
                        </ul>
                    </div>	

                    <?php 
                        $sds_title = get_field('sds_title');
                        $sds_content = get_field('sds_content');
                        $sds_sheet_url_text = get_field('sds_sheet_url_text');
                        $sds_sheet_url = get_field('sds_sheet_url');
                        $heading_for_emergency = get_field('heading_for_emergency');
                        $emergency_email_address = get_field('emergency_email_address');
                    ?>
                    <div class="tab-pane fade emergency-contact-info" id="EmergencyTab">
                        <?php if ($sds_title != '') { ?>
                            <h4 class="h6"><?= $sds_title; ?></h4>
                        <?php } ?>
                        <p><?= $sds_content; ?>
                            <?php if ($sds_sheet_url_text != '') { ?>
                            <a href="<?= $sds_sheet_url; ?>" title="<?= $sds_sheet_url_text; ?>" class="secondary" target="_blank"><?= $sds_sheet_url_text; ?></a>
                            <?php } ?>
                        </p>
                        <?php 
                            if (have_rows('country_list_for_emergency')) {
                                while (have_rows('country_list_for_emergency')): the_row();
                                    $country_name = get_sub_field('country_name');
                                    $emergency_content = get_sub_field('emergency_content');
                                    $emergency_contact_number = get_sub_field('emergency_contact_number');
                                    $another_emergency_detail = get_sub_field('another_emergency_detail');
                                    ?>
                                        <?php if ($country_name != '') { ?>
                                            <h4 class="h6"><?= $country_name; ?></h4>
                                        <?php } ?>
                                        <?php if ($emergency_content != '') { ?>
                                            <h4 class="text-warning h6"><?= $emergency_content; ?></h4>
                                        <?php } ?>
                                        <?php if ($emergency_contact_number != '') { ?>
                                            <a href="tel:<?= $emergency_contact_number; ?>" title="<?= $emergency_contact_number; ?>" class="h3"><?= $emergency_contact_number; ?></a>
                                        <?php } ?>
                                        <p><?= $another_emergency_detail; ?></p>
                                    <?php
                                endwhile;
                            }
                        ?>
                        <?php if ($heading_for_emergency != '') { ?>
                        <h4 class="h6 mt"><?= $heading_for_emergency; ?></h4>
                        <?php } ?>
                        <?php if ($emergency_email_address != '') { ?>
                        <a href="mailto:<?= $emergency_email_address; ?>" title="<?= $emergency_email_address; ?>" class="secondary"><?= $emergency_email_address; ?></a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!-- End Main Content -->

<?php 

get_footer();
?>