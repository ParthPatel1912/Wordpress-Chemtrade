<?php 

// Template Name: Location Page

get_header();
?>

    <!-- Main Content -->
    <main class="main-content">
        <!-- Main page header -->
        <section class="page-header no-sub-nav" style="background-image: url(<?= get_the_post_thumbnail_url(get_the_ID(),'full'); ?>);">
            <div class="container">
                <h1><?= get_the_title(); ?></h1>
            </div>
        </section>

        <?php 
            $map_filter_label = get_field('map_filter_label');
        ?>
        <section class="locationpage-inner">
            <div class="container">

                <!-- Locationpage-filter -->
                <div class="locationpage-details-block">
                    <div class="location-map-block">
                    <?php echo apply_shortcodes('[custom-mapping map_id="1978" height="400"]'); ?>
                        <div class="location-map-dropdown">
                            <?php if ($map_filter_label != '') { ?>
                                <label for="selectGeography"><?= $map_filter_label; ?></label>
                            <?php } ?>
                            <select class="form-control custom-dropdown" id="selectGeography">
                                <?php 
                                    $i = 0;
                                    if (have_rows('map_filter_list')) {
                                        while (have_rows('map_filter_list')): the_row();
                                            $map_filter_list_name = get_sub_field('map_filter_list_name');
                                            $str_length = 2;
                                            $str = substr("0000{$i}", -$str_length);
                                            ?>
                                            <?php if ($i == 0) { ?>
                                                <option value=""> <?= $map_filter_list_name; ?></option>
                                            <?php } else { ?>
                                                <option value=""><?= sprintf($str).'.'; ?> <?= $map_filter_list_name; ?></option>
                                            <?php } ?>
                                            <?php 
                                            $i++;
                                        endwhile;
                                    }
                                ?>
                            </select>
                        </div>
                    </div>

                    <?php 
                        $tab_navigation_title = get_field('tab_navigation_title');
                        $tab_navigation = get_field('tab_navigation');
                        $count_nav = count($tab_navigation);
                    ?>
                    <div class="location-details">
                        <div class="locationpage-filter-block">
                            <div class="locationpage-filter-inner">
                                <?php if ($tab_navigation_title != '') { ?>
                                    <label><?= $tab_navigation_title; ?></label>
                                <?php } ?>
                                <div class="locationpage-tab-wrapper">
                                    <ul class="nav locationpage-tab">
                                    <?php 
                                        $i = 1;
                                        if (have_rows('tab_navigation')) {
                                            while (have_rows('tab_navigation')): the_row();
                                                $tab_image = get_sub_field('tab_image');
                                                $tab_name = get_sub_field('tab_name');
                                                $tab_id = get_sub_field('tab_id');
                                                ?>
                                                    <li class="nav-item">
                                                        <?php 
                                                            if ($i == $count_nav) {
                                                                ?>
                                                                    <a class="nav-link active" data-toggle="tab" href="#<?= $tab_id; ?>">
                                                                <?php 
                                                            } else {
                                                                ?>
                                                                    <a class="nav-link" data-toggle="tab" href="#<?= $tab_id; ?>">
                                                                <?php 
                                                            }
                                                        ?>
                                                        <?php if ($tab_image != '') { ?>
                                                            <em><img src="<?= $tab_image['url']; ?>" alt="<?= $tab_image['alt']; ?>" title="<?= $tab_image['title']; ?>"></em>
                                                        <?php } ?>
                                                        <?php if ($tab_name != '') { ?>
                                                            <span><?= $tab_name; ?></span>
                                                        <?php } ?>
                                                        </a>
                                                    </li>
                                                <?php
                                                $i++; 
                                            endwhile;
                                        }
                                    ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <?php 
                            $address_tab = get_field('address_tab');
                            $count_tab_data = count($address_tab);
                        ?>
                        <div class="tab-content nicecscroll">
                            <?php 
                                $i = 1;
                                if (have_rows('address_tab')) {
                                    while (have_rows('address_tab')): the_row();
                                        $address_tab_title = get_sub_field('address_tab_title');
                                        $address_tab_id = get_sub_field('address_tab_id');
                                        $address_tab_details = get_sub_field('address_tab_details');
                                        ?>
                                            <?php 
                                                if ($i == $count_tab_data) {
                                                    ?>
                                                        <div class="tab-pane active" id="<?= $address_tab_id; ?>">
                                                    <?php 
                                                } else {
                                                    ?>
                                                        <div class="tab-pane fade" id="<?= $address_tab_id; ?>">
                                                    <?php 
                                                }
                                            ?>
                                                <h2 class="h3 no-border"><?= $address_tab_title; ?></h2>
                                                <?php if ($address_tab_details != '') { ?>
                                                    <?php foreach ($address_tab_details as $atd) { ?>
                                                        <div class="location-detailslist-block">
                                                            <?php if ($atd['address_tab_company_title'] != '') { ?>
                                                                <h3 class="h6"><?= $atd['address_tab_company_title']; ?></h3>
                                                            <?php } ?>
                                                            <?php if ($atd['address_tab_company_address'] != '') { ?>
                                                                <?php foreach ($atd['address_tab_company_address'] as $atca) { ?>
                                                                    <?php 
                                                                        if ($atca['address_tab_company_city_check'] == null) {
                                                                            ?>
                                                                                <ul class="location-detailslist">
                                                                                    <?php foreach ($atca['address_tab_company_details_address'] as $atcda) { ?>
                                                                                        <li>
                                                                                            <p>
                                                                                                <?php if ($atcda['address_bold_text'] != '') { ?>
                                                                                                    <strong><?= $atcda['address_bold_text']; ?></strong>
                                                                                                <?php } ?>
                                                                                                <?= $atcda['address_company_number']; ?>
                                                                                            </p>
                                                                                            <?php 
                                                                                                if ($atcda['company_department_text_blue'] != null) {
                                                                                                    ?>
                                                                                                    <?php if ($atcda['company_department_details'] != '') { ?>
                                                                                                        <span class="text-primary"><?= $atcda['company_department_details']; ?></span>
                                                                                                    <?php } ?>
                                                                                                    <?php 
                                                                                                } else { ?>
                                                                                                    <?php if ($atcda['company_department_detail_list'] == null) {
                                                                                                        ?>
                                                                                                        <span><?= $atcda['company_department_details']; ?></span>
                                                                                                    <?php
                                                                                                    } else{
                                                                                                        ?>
                                                                                                            <?= $atcda['company_department_detail_as_list']; ?>
                                                                                                        <?php
                                                                                                    } ?>
                                                                                                    <?php 
                                                                                                } 
                                                                                            ?>
                                                                                        </li>
                                                                                    <?php } ?>
                                                                                </ul>
                                                                            <?php 
                                                                        } else {
                                                                        ?>
                                                                            <div class="sub-detailslist-block">
                                                                                <h4><?= $atca['address_tab_company_city']; ?></h4>
                                                                                <ul class="location-detailslist">
                                                                                    <?php foreach ($atca['address_tab_company_details_address'] as $atcda) { ?>
                                                                                        <li>
                                                                                            <p>
                                                                                                <?php if ($atcda['address_bold_text'] != '') { ?>
                                                                                                    <strong><?= $atcda['address_bold_text']; ?></strong>
                                                                                                <?php } ?>
                                                                                                <?= $atcda['address_company_number']; ?>
                                                                                            </p>
                                                                                            <?php 
                                                                                                if ($atcda['company_department_text_blue'] != null) {
                                                                                                    ?>
                                                                                                    <span class="text-primary"><?= $atcda['company_department_details']; ?></span>
                                                                                                    <?php 
                                                                                                } else { ?>
                                                                                                    <?php if ($atcda['company_department_detail_list'] == null) {
                                                                                                        ?>
                                                                                                        <span><?= $atcda['company_department_details']; ?></span>
                                                                                                    <?php
                                                                                                    } else{
                                                                                                        ?>
                                                                                                            <?= $atcda['company_department_detail_as_list']; ?>
                                                                                                        <?php
                                                                                                    } ?>
                                                                                                    <?php 
                                                                                                } 
                                                                                            ?>
                                                                                        </li>
                                                                                    <?php } ?>
                                                                                </ul>
                                                                            </div>
                                                                        <?php
                                                                    }?>
                                                                <?php 
                                                                    } 
                                                                }
                                                            ?>
                                                        </div>
                                                    <?php } ?>
                                                <?php } ?>
                                            </div>
                                        <?php 
                                        $i++;
                                    endwhile;
                                }
                            ?>
                        </div>						
                    </div>
                </div>

                <?php 
                    $location_page_description_heading = get_field('location_page_description_heading');
                    $location_page_description_content = get_field('location_page_description_content');
                ?>
                <div class="locationpage-description-block">
                    <?php if ($location_page_description_heading != '') { ?>
                        <h2 class="h4 no-border"><?= $location_page_description_heading; ?></h2>
                    <?php } ?>
                    <?= $location_page_description_content; ?>
                </div>
            </div>
        </section>
    </main>
    <!-- End Main Content -->

<?php 

get_footer();
?>