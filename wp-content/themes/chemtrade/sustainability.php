<?php 

// Template Name: Sustainability Page

get_header();
?>

    <!-- Main Content -->
    <main class="main-content sustainability-page">

        <!-- Main page header -->
        <section class="page-header" style="background-image: url(<?= get_the_post_thumbnail_url(get_the_ID(),'full'); ?>);">
            <div class="container">
                <h1><?= get_the_title(); ?></h1>
            </div>
            <div class="page-nav-wrapper">
                <div class="container">
                    <ul class="page-navigation sustainability-page">
                    <?php 
                        if (have_rows('page_navigation')) {
                            while (have_rows('page_navigation')): the_row();
                                $page_navigation_text = get_sub_field('page_navigation_text');
                                $page_navigation_data = get_sub_field('page_navigation_data');
                                ?>
                                <?php if ($page_navigation_data != '') { ?>
                                    <li data-title="<?= $page_navigation_data; ?>">
                                        <a href="#" title="<?= $page_navigation_text; ?>" class="scrollspy-link h6" data-title="<?= $page_navigation_data; ?>"><?= $page_navigation_text; ?></a>
                                    </li>
                                <?php } ?>
                                <?php 
                            endwhile;
                        }
                    ?>
                    </ul>
                </div>
            </div>
        </section>

        <!-- sustainability chemtrade -->
        <?php 
            $plant_title = get_field('plant_title');
            $plant_sub_title = get_field('plant_sub_title');
            $plant_content = get_field('plant_content');
            $plant_section_image = get_field('plant_section_image');
        ?>
        <section class="sustainability-info-block">
            <div class="container">
                <div class="card-info">
                    <div class="info">
                        <?php if ($plant_title != '') { ?>
                            <h2 class="no-border"><?= $plant_title; ?></h2>
                        <?php } ?>
                        <?php if ($plant_sub_title != '') { ?>
                        <p class="h4 text-success"><?= $plant_sub_title; ?></p>
                        <?php } ?>
                        <?php if ($plant_content != '') { ?>
                        <p class="h4"><?= $plant_content; ?></p>
                        <?php } ?>
                    </div>
                    <?php if ($plant_section_image != '') { ?>
                        <div class="thumb">
                            <img src="<?= $plant_section_image['url']; ?>"
                                alt="<?= $plant_section_image['alt']; ?>" title="<?= $plant_section_image['title']; ?>">
                        </div>
                    <?php } ?>
                </div>
            </div>
        </section>

        <?php 
            $environmental_title = get_field('environmental_title');
            $environmental_content = get_field('environmental_content');
            $esg_heading = get_field('esg_heading');
        ?>
        <section class="sustainability-environmental-block scrollspy-block" data-scrollspy="Environmental, Social & Governance" data-sec-id="Environmental-Social-Governance">
            <div class="container">
                <h2 class="h3"><?= $environmental_title; ?></h2>
                <p><?= $environmental_content; ?></p>
                <div class="sustainability-accordion">
                    <h3 class="h4"><?= $esg_heading; ?></h3>
                    <?php 
                        if (have_rows('esg_fields')) {
                            while (have_rows('esg_fields')): the_row();
                                $esg_title = get_sub_field('esg_title');
                                $esg_sub_title = get_sub_field('esg_sub_title');
                                $esg_content = get_sub_field('esg_content');
                                $esg_content_image = get_sub_field('esg_content_image');
                                $esg_extra_sub_heading = get_sub_field('esg_extra_sub_heading');
                                $esg_extra_content = get_sub_field('esg_extra_content');
                                $esg_read_more_link_text = get_sub_field('esg_read_more_link_text');
                                $esg_read_more_content = get_sub_field('esg_read_more_content');
                                $pdf_file_link_text = get_sub_field('pdf_file_link_text');
                                $pdf_file = get_sub_field('pdf_file');
                                ?>
                                <div class="esg-block">
                                    <div class="esg-header">
                                        <div class="esg-thumb">
                                            <?php if ($esg_content_image != '') { ?>
                                                <img src="<?= $esg_content_image['url']; ?>" alt="<?= $esg_content_image['alt']; ?>" title="<?= $esg_content_image['title']; ?>">
                                            <?php } ?>
                                        </div>
                                        <div class="esg-content">
                                            <?php if ($esg_title != '') { ?>
                                                <h4 class="h6"><?= $esg_title; ?></h4>
                                            <?php } ?>
                                            <?php if ($esg_sub_title != '') { ?>
                                                <h4 class="h6 gray-title"><?= $esg_sub_title; ?></h4>
                                            <?php } ?>
                                            <?php if ($esg_content != '') { ?>
                                                <p class="mb-4">
                                                    <?= $esg_content; ?>
                                                    <?php if ($esg_read_more_link_text != '') { ?>
                                                        <a class="secondary read-more" title="<?= $esg_read_more_link_text; ?>" href="#"><?= $esg_read_more_link_text; ?></a>
                                                    <?php } ?>
                                                </p>
                                            <?php } ?>
                                            
                                            <?php if ($esg_extra_sub_heading != '') { ?>
                                                <h4 class="h6 gray-title"><?= $esg_extra_sub_heading; ?></h4>
                                            <?php } ?>
                                            <?php if ($esg_extra_content) { ?>
                                                <p>
                                                    <?= $esg_extra_content; ?>
                                                    <?php if ($pdf_file != '') { ?>
                                                        <a href="<?= $pdf_file['url']; ?>" target="_blank" title="<?= $pdf_file_link_text; ?>" class="secondary"><?= $pdf_file_link_text; ?></a>
                                                    <?php } ?>
                                                </p>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="accordion-wrapper all-open">
                                        <?php 
                                            foreach ($esg_read_more_content as $ermc) {
                                            ?>
                                            <div class="accordion-block <?= $ermc['class_name']; ?>">
                                                <div class="title" tabindex="0">
                                                    <?php if ($ermc['main_heading'] != '') { ?>
                                                        <h4 class="h5">
                                                            <?= $ermc['main_heading']; ?>
                                                        </h4>
                                                    <?php } ?>
                                                </div>
                                                <div class="accordion-body">
                                                    <?php if ($ermc['sub_heading'] != '') { ?>
                                                        <h4 class="h6 mb-3">
                                                            <?= $ermc['sub_heading']; ?>
                                                        </h4>
                                                    <?php } ?>
                                                    
                                                    <?= $ermc['main_content']; ?>

                                                    <?php if ($ermc['content_class_name'] != '') { ?>
                                                        <div class="<?= $ermc['content_class_name']; ?>">
                                                            <?= $ermc['in_detail_content']; ?>
                                                        </div>
                                                    <?php } else { ?>
                                                        <?= $ermc['in_detail_content']; ?>
                                                    <?php } ?>

                                                    <?php if ($ermc['content_type'] == 'pdf info') { ?>
                                                        <div class="pdfs-info">
                                                            <?php 
                                                                foreach ($ermc['pdf_file_section'] as $pds) {
                                                                    ?>
                                                                    <?php if ($pds['main_title'] != '') { ?>
                                                                        <h4><?= $pds['main_title']; ?></h4>
                                                                    <?php } ?>
                                                                    <?php if ($pds['main_title_replated_pdf'] != '') { ?>
                                                                        <a href="<?= $pds['main_title_replated_pdf']['url']; ?>" title="<?= $pds['main_title_replated_pdf']['title']; ?>" class="secondary"><?= $pds['main_title_replated_pdf']['title']; ?></a>
                                                                    <?php } ?>
                                                                    <?php 
                                                                        foreach ($pds['sub_content'] as $pds_sc) {
                                                                            ?>
                                                                            <?php if ($pds_sc['sub_content_title'] != '') { ?>
                                                                                <h5 class="h6"><?= $pds_sc['sub_content_title']; ?></h5>
                                                                            <?php } ?>
                                                                            <div class="sub-content">
                                                                                <?php if ($pds_sc['sub_content_heading'] != '') { ?>
                                                                                    <h5 class="h6"><?= $pds_sc['sub_content_heading']; ?></h5>
                                                                                <?php } ?>
                                                                                <?php if ($pds_sc['sub_content_heading'] != '') { ?>
                                                                                    <ul class="square-bullets sub-square">
                                                                                        <?php 
                                                                                            foreach ($pds_sc['sub_content_file'] as $pds_sc_scf) {
                                                                                            ?>
                                                                                            <li><a href="<?= $pds_sc_scf['sub_content_pdf_file']['url']; ?>" title="<?= $pds_sc_scf['sub_content_pdf_file']['title']; ?>" class="secondary"><?= $pds_sc_scf['sub_content_pdf_file']['title']; ?> </a></li>
                                                                                            <?php 
                                                                                            }
                                                                                        ?>
                                                                                    </ul>
                                                                                    <?php 
                                                                                    } else if ($pds_sc['sub_content_title'] != '' && $pds_sc['sub_content_heading'] == '') {
                                                                                        ?>
                                                                                            <ul class="square-bullets sub-square">
                                                                                                <?php 
                                                                                                    foreach ($pds_sc['sub_content_file'] as $pds_sc_scf) {
                                                                                                    ?>
                                                                                                    <li><a href="<?= $pds_sc_scf['sub_content_pdf_file']['url']; ?>" title="<?= $pds_sc_scf['sub_content_pdf_file']['title']; ?>" class="secondary"><?= $pds_sc_scf['sub_content_pdf_file']['title']; ?> </a></li>
                                                                                                    <?php 
                                                                                                    }
                                                                                                ?>
                                                                                            </ul>
                                                                                        <?php 
                                                                                    } else {
                                                                                        ?>
                                                                                            <div class="pdf-links">
                                                                                                <?php 
                                                                                                foreach ($pds_sc['sub_content_file'] as $pds_sc_scf) {
                                                                                                ?>
                                                                                                    <a href="<?= $pds_sc_scf['sub_content_pdf_file']['url']; ?>" title="<?= $pds_sc_scf['sub_content_pdf_file']['title']; ?>" class="secondary"><?= $pds_sc_scf['sub_content_pdf_file']['title']; ?> </a>
                                                                                                <?php 
                                                                                                }
                                                                                                ?>
                                                                                            </div>
                                                                                        <?php 
                                                                                    }
                                                                                ?>
                                                                            </div>
                                                                        <?php 
                                                                        }
                                                                    ?>
                                                                    <?php 
                                                                }
                                                            ?>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <?php 
                                            }
                                        ?>
                                    </div>
                                </div>
                                <?php 
                            endwhile;
                        }
                    ?>
                </div>
            </div>
        </section>

        <?php 
            $responsible_care_title = get_field('responsible_care_title');
            $responsible_care_content = get_field('responsible_care_content');
            $responsible_care_image = get_field('responsible_care_image');
            $responsible_care_sub_content = get_field('responsible_care_sub_content');
            $responsible_care_addition_info_link_text = get_field('responsible_care_addition_info_link_text');
        ?>
        <section class="sustainability-responsible-care-block scrollspy-block" data-scrollspy="Responsible Care" data-sec-id="responsible-care">
            <div class="container">
                <?php if ($responsible_care_title != '') { ?>
                    <h2 class="h3"><?= $responsible_care_title; ?></h2>
                <?php } ?>
                <div class="sustainability-responsible-care-info">
                    <div class="responsible-left-content">
                        <?php if ($responsible_care_content != '') { ?>
                            <p class="h4"><?= $responsible_care_content; ?></p>
                        <?php } ?>
                    </div>
                    <div class="responsible-right-content">
                        <div class="card">
                            <?php if ($responsible_care_image != '') { ?>
                                <img src="<?= $responsible_care_image['url'] ?>" alt="<?= $responsible_care_image['alt'] ?>"
                                    title="<?= $responsible_care_image['title'] ?>">
                            <?php } ?>
                        </div>
                    </div>
                </div>

                <?= $responsible_care_sub_content; ?>
                
                <div class="collapse-links-block">
                    <?php if ($responsible_care_addition_info_link_text != '') { ?>
                        <a href="#" title="<?= $responsible_care_addition_info_link_text; ?>"
                            class="secondary collapse-link"><?= $responsible_care_addition_info_link_text; ?></a>
                        <?php } ?>
                    <ul class="square-bullets">
                    <?php 
                        if (have_rows('responsible_care_addition_info_file')) {
                            while (have_rows('responsible_care_addition_info_file')): the_row();
                                $additional_file_name = get_sub_field('additional_file_name');
                                $additional_file = get_sub_field('additional_file');
                                ?>
                                    <li>
                                        <?= $additional_file_name; ?>
                                        <?php
                                        foreach ($additional_file as $af) {
                                            ?>
                                                <a href="<?= $af['additional_pdf_file']['url']; ?>" class="additional-link"><?= $af['additional_file_language']; ?></a>
                                            <?php 
                                        }
                                        ?>
                                    </li>
                                <?php 
                            endwhile;                            
                        }
                    ?>
                    </ul>
                </div>
            </div>
        </section>

        <?php 
            $quality_title = get_field('quality_title');
            $quality_content = get_field('quality_content');
            $quality_blockquote = get_field('quality_blockquote');
            $quality_sub_content = get_field('quality_sub_content');
            $quality_image = get_field('quality_image');
            $quality_addition_info_link_text = get_field('quality_addition_info_link_text');
        ?>
        <section class="sustainability-quality-block scrollspy-block" data-scrollspy="Quality" data-sec-id="quality">
            <div class="container">
                <?php if ($quality_title != '') { ?>
                    <h2 class="h3"><?= $quality_title; ?></h2>
                <?php } ?>
                <div class="sustainability-quality-inner">
                    <div class="sustainability-quality-info">
                        <?= $quality_content; ?>
                        <?php if ($quality_blockquote != '') { ?>
                            <blockquote class="h4"><?= $quality_blockquote; ?></blockquote>
                        <?php } ?>
                        <?= $quality_sub_content; ?>
                        <div class="collapse-links-block">
                            <?php if ($quality_addition_info_link_text != '') { ?>
                                <a href="#" title="<?= $quality_addition_info_link_text; ?>"
                                    class="secondary collapse-link"><?= $quality_addition_info_link_text; ?></a>
                            <?php }?>
                            <ul class="square-bullets">
                            <?php 
                                if (have_rows('quality_addition_info_file')) {
                                    while (have_rows('quality_addition_info_file')): the_row();
                                        $quality_additional_file_name = get_sub_field('quality_additional_file_name');
                                        $quality_additional_file = get_sub_field('quality_additional_file');
                                        ?>
                                            <li>
                                                <?= $quality_additional_file_name; ?>
                                                <?php
                                                foreach ($quality_additional_file as $qaf) {
                                                    ?>
                                                        <a href="<?= $qaf['quality_additional_pdf_file']['url']; ?>" class="additional-link"><?= $qaf['quality_additional_file_language']; ?></a>
                                                    <?php 
                                                }
                                                ?>
                                            </li>
                                        <?php 
                                    endwhile;                            
                                }
                            ?>
                            </ul>
                        </div>
                    </div>
                    <div class="sustainability-quality-thumb">
                        <?php if ($quality_image != '') { ?>
                            <img src="<?= $quality_image['url']; ?>" alt="<?= $quality_image['alt']; ?>"
                                title="<?= $quality_image['title']; ?>">
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