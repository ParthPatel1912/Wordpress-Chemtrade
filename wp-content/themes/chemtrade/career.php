<?php 

// Template Name: Careers Page

get_header();
?>

    <!-- Main Content -->
    <main class="main-content career">

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
            $career_info_heading = get_field('career_info_heading');
            $career_info_content = get_field('career_info_content');
        ?>
        <section class="career-info-block" data-aos="fade-up" data-sec-id="great-opportunity">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="card-info">
                            <?php if ($career_info_heading != '') { ?>
                                <h2 class="h4 no-border"><?= $career_info_heading; ?></h2>
                            <?php } ?>
                            <?php if ($career_info_content != '') { ?>
                                <p><?= $career_info_content; ?></p>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <ul class="card-link-block">
                        <?php 
                            if (have_rows('career_opportunity')) {
                                while (have_rows('career_opportunity')): the_row();
                                    $career_opportunity_title = get_sub_field('career_opportunity_title');
                                    $career_opportunity_details = get_sub_field('career_opportunity_details');
                                    $career_opportunity_image = get_sub_field('career_opportunity_image');
                                    $career_opportunity_link = get_sub_field('career_opportunity_link');
                                    ?>
                                        <li>
                                            <a href="<?= $career_opportunity_link; ?>" class="card-link">
                                                <?php if ($career_opportunity_image != '') { ?>
                                                    <div class="left">
                                                        <em><img src="<?= $career_opportunity_image['url']; ?>" alt="<?= $career_opportunity_image['alt']; ?>" title="<?= $career_opportunity_image['title']; ?>"></em>
                                                    </div>
                                                <?php } ?>
                                                <div class="right">
                                                    <?php if ($career_opportunity_title != '') { ?>
                                                        <h3 class="h4"><?= $career_opportunity_title; ?> </h3>
                                                    <?php } ?>
                                                    <?php if ($career_opportunity_details != '') { ?>
                                                        <p><?= $career_opportunity_details; ?></p>
                                                    <?php } ?>
                                                </div>
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
        </section>

        <?php 
            $employee_experience_title = get_field('employee_experience_title');
            $employee_experience_image = get_field('employee_experience_image');
            $employee_experience_content = get_field('employee_experience_content');
        ?>
        <section class="career-employee-experience" data-sec-id="employee-experience">
            <div class="employee-header">
                <div class="container">
                    <?php if ($employee_experience_title != '') { ?>
                    <h2 class="no-border"><?= $employee_experience_title; ?></h2>
                    <?php } ?>
                </div>
            </div>
            <div class="employee-inner">
                <div class="container">
                    <?php if ($employee_experience_image != '') { ?>
                        <div class="employee-thumb-block">
                            <img src="<?= $employee_experience_image['url']; ?>" alt="<?= $employee_experience_image['alt']; ?>" title="<?= $employee_experience_image['title']; ?>">
                        </div>
                    <?php } ?>
                    <?php if ($employee_experience_content != '') { ?>
                        <p><?= $employee_experience_content; ?></p>
                    <?php } ?>
                    <div class="row">
                        <?php 
                            if (have_rows('employee_experience_career_list')) {
                                while (have_rows('employee_experience_career_list')): the_row();
                                    $employee_experience_career_list_title = get_sub_field('employee_experience_career_list_title');
                                    $employee_experience_career_list_content = get_sub_field('employee_experience_career_list_content');
                                    $employee_experience_career_list_image = get_sub_field('employee_experience_career_list_image');
                                    ?>
                                        <div class="col-md-6">
                                            <div class="career-list-wrapper">
                                                <div class="career-list-outer">
                                                    <?php if ($employee_experience_career_list_image != '') { ?>
                                                        <em class="career-img-block">
                                                            <img src="<?= $employee_experience_career_list_image['url']; ?>" alt="<?= $employee_experience_career_list_image['alt']; ?>" title="<?= $employee_experience_career_list_image['title']; ?>">
                                                        </em>
                                                    <?php } ?>
                                                    <?php if ($employee_experience_career_list_title != '') { ?>
                                                    <h3 class="h4"><?= $employee_experience_career_list_title; ?></h3>
                                                    <?php } ?>
                                                    <?php if ($employee_experience_career_list_content != '') { ?>
                                                    <p><?= $employee_experience_career_list_content; ?> </p>
                                                    <?php } ?>
                                                </div>
                                            </div>
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
            $vision_value_culture_title = get_field('vision_value_culture_title');
            $vision_value_culture_content = get_field('vision_value_culture_content');
            $vision_value_culture_link_text = get_field('vision_value_culture_link_text');
            $vision_value_culture_link_url = get_field('vision_value_culture_link_url');
        ?>
        <section class="career-value-block secondary-value-block" data-sec-id="our-value">
            <div class="container">
                <h2 class="has-no-border h3">
                    <?php 
                        $i = 0;
                        $color = ['color-blue', 'color-green', 'color-orange'];
                        foreach ($vision_value_culture_title as $vvct) {
                            ?>
                                <em class="<?= $color[$i]; ?>"><?= $vvct['vision_value_culture_heading']; ?></em>
                            <?php 
                            $i++;
                        }
                    ?>
                </h2>
                <p class="career-vision">
                    <?= $vision_value_culture_content; ?>
                    <?php if ($vision_value_culture_link_text != '') { ?>
                    <a href="<?= $vision_value_culture_link_url; ?>" class="secondary"><?= $vision_value_culture_link_text; ?></a>
                    <?php } ?>
                </p>
                <div class="career-block-wrapper">
                    <div class="career-vision-block">
                        <?php 
                            if (have_rows('vision_value_culture_block')) {
                                while (have_rows('vision_value_culture_block')): the_row();
                                    $block_image = get_sub_field('block_image');
                                    $block_title = get_sub_field('block_title');
                                    $block_class = get_sub_field('block_class');
                                    $block_content = get_sub_field('block_content');
                                    $block_single_multi_value = get_sub_field('block_single_multi_value');
                                    ?>
                                        <div class="main-block-outer <?= $block_class; ?>">
                                            <div class="main-block-inner">
                                                <?php if ($block_image != '') { ?>
                                                    <em class="block-icon">
                                                        <img src="<?= $block_image['url']; ?>" alt="<?= $block_image['alt']; ?>">
                                                    </em>
                                                <?php } ?>
                                                <div class="block-content">
                                                    <h3>
                                                        <?php if ($block_title != '') { ?>
                                                            <span class="h4"><?= $block_title; ?></span>
                                                        <?php } ?>
                                                        <?= $block_content; ?>
                                                        <?php if ($block_single_multi_value != '') { ?>
                                                            <?php 
                                                                foreach ($block_single_multi_value as $bsmv) {
                                                                    ?>
                                                                    <?php if ($bsmv['block_single_tag_value'] != '') { ?>
                                                                        <em class="has-single-tag"><?= substr($bsmv['block_single_tag_value'], 0, strpos($bsmv['block_single_tag_value'], ' ')); ?></em> <?= substr($bsmv['block_single_tag_value'],-1); ?>
                                                                    <?php } ?>
                                                                    <?php 
                                                                        foreach ($bsmv['block_multi_tag_value'] as $bsmv_bmtv) {
                                                                            ?>
                                                                            <?php if ($bsmv_bmtv['block_multi_tag_content_value'] != '') { ?>
                                                                                <em class="has-multi-tag"><?= trim($bsmv_bmtv['block_multi_tag_content_value']); ?></em>
                                                                            <?php } ?>
                                                                            <?php 
                                                                        }
                                                                    ?>
                                                                    <?php 
                                                                }
                                                            ?>
                                                        <?php } ?>
                                                    </h3>
                                                </div>
                                            </div>
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
            $we_looking_for_title = get_field('we_looking_for_title');
            $we_looking_for_content = get_field('we_looking_for_content');
            $we_looking_for_image = get_field('we_looking_for_image');
        ?>
        <section class="career-imgcontent-block" data-sec-id="great-people">
            <?php if ($we_looking_for_image != '') { ?>
                <div class="img-contect" style="background-image: url(<?= $we_looking_for_image['url']; ?>);"></div>
            <?php } ?>
            <div class="container">
                <div class="row">
                    <div class="offset-md-6 col-md-6">
                        <div class="right-contect">
                            <?php if ($we_looking_for_title != '') { ?>
                                <h2><?= $we_looking_for_title; ?></h2>
                            <?php } ?>
                            <?= $we_looking_for_content; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php 
            $characteristics_of_chemtrade_title = get_field('characteristics_of_chemtrade_title');
            $characteristics_of_chemtrade_content = get_field('characteristics_of_chemtrade_content');
        ?>
        <section class="characteristics-block" data-sec-id="competencies">
            <div class="container">
                <?php if ($characteristics_of_chemtrade_title != '') { ?>
                    <h2 class="center-border"><?= $characteristics_of_chemtrade_title; ?></h2>
                <?php } ?>
                <?php if ($characteristics_of_chemtrade_content != '') { ?>
                    <p><?= $characteristics_of_chemtrade_content; ?></p>
                <?php } ?>
                <ul class="delivering-list">
                    <?php 
                        $block_delay = 0;
                        if (have_rows('characteristics_of_chemtrade_deliver_list')) {
                            while (have_rows('characteristics_of_chemtrade_deliver_list')): the_row();
                                $deliver_list_image = get_sub_field('deliver_list_image');
                                $deliver_list_heading = get_sub_field('deliver_list_heading');
                                $deliver_list_content = get_sub_field('deliver_list_content');
                                ?>
                                <li data-aos="fade-up" data-aos-delay="<?= $block_delay; ?>">
                                    <?php if ($deliver_list_image != '') { ?>
                                        <div class="thumb">
                                            <img src="<?= $deliver_list_image['url']; ?>" alt="<?= $deliver_list_image['alt']; ?>" title="<?= $deliver_list_image['title']; ?>">
                                        </div>
                                    <?php } ?>
                                    <div class="card">
                                        <?php if ($deliver_list_heading != '') { ?>
                                            <h4 class="h6"><?= $deliver_list_heading; ?></h4>
                                        <?php } ?>
                                        <?php if ($deliver_list_content != '') { ?>
                                            <p><?= $deliver_list_content; ?></p>
                                        <?php } ?>
                                    </div>
                                </li>
                                <?php 
                                $block_delay = $block_delay + 250;
                            endwhile;
                        }        
                    ?>						
                </ul>
            </div>
        </section>

        <?php 
            $why_choose_chemtrade_title = get_field('why_choose_chemtrade_title');
            $why_choose_chemtrade_content = get_field('why_choose_chemtrade_content');
            $why_choose_chemtrade_image = get_field('why_choose_chemtrade_image');
        ?>
        <section class="career-imgcontent-block reverse" data-sec-id="why-choose-chemtrade">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="right-contect">
                            <?php if ($why_choose_chemtrade_title != '') { ?>
                            <h2><?= $why_choose_chemtrade_title; ?></h2>
                            <?php } ?>
                            <?= $why_choose_chemtrade_content; ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php if ($why_choose_chemtrade_image != '') { ?>
            <div class="img-contect" style="background-image: url(<?= $why_choose_chemtrade_image['url']; ?>);"></div>
            <?php } ?>
        </section>

        <section class="career-links-block">
            <div class="container">
                <ul class="card-link-block" data-aos="fade-up">
                    <?php 
                        if (have_rows('career_opportunity')) {
                            while (have_rows('career_opportunity')): the_row();
                                $career_opportunity_title = get_sub_field('career_opportunity_title');
                                $career_opportunity_details = get_sub_field('career_opportunity_details');
                                $career_opportunity_image = get_sub_field('career_opportunity_image');
                                $career_opportunity_link = get_sub_field('career_opportunity_link');
                                ?>
                                    <li>
                                        <a href="<?= $career_opportunity_link; ?>" class="card-link card-link-secondary">
                                            <?php if ($career_opportunity_image != '') { ?>
                                                <div class="left">
                                                    <em><img src="<?= $career_opportunity_image['url']; ?>" alt="<?= $career_opportunity_image['alt']; ?>" title="<?= $career_opportunity_image['title']; ?>"></em>
                                                </div>
                                            <?php } ?>
                                            <div class="right">
                                                <?php if ($career_opportunity_title != '') { ?>
                                                    <h3 class="h4"><?= $career_opportunity_title; ?> </h3>
                                                <?php } ?>
                                                <?php if ($career_opportunity_details != '') { ?>
                                                    <p><?= $career_opportunity_details; ?></p>
                                                <?php } ?>
                                            </div>
                                        </a>
                                    </li>
                                    <?php 
                            endwhile;
                        }
                    ?>
                </ul>
            </div>
        </section>

        <?php 
            $diversity_commitment_title = get_field('diversity_commitment_title');
            $diversity_commitment_content = get_field('diversity_commitment_content');
        ?>
        <section class="career-commitment-block" data-sec-id="diversity-commitment">
            <div class="container">
                <div class="card">
                    <div class="commitment">
                        <?php if ($diversity_commitment_title != '') { ?>
                        <h4><?= $diversity_commitment_title; ?></h4>
                        <?php } ?>
                        <?= $diversity_commitment_content; ?>
                    </div>
                </div>
            </div>
        </section>

        <?php 
            $faq_title = get_field('faq_title');
            $faq_content = get_field('faq_content');
        ?>
        <section class="faq-block" data-sec-id="faq">
            <div class="container">
                <?php if ($faq_title != '') { ?>
                <h2 class="center-border"><?= $faq_title; ?></h2>
                <?php } ?>
                <?= $faq_content; ?>
                <div class="accordion-wrapper">
                    <?php 
                        if (have_rows('faq_block')) {
                            while (have_rows('faq_block')): the_row();
                                $faq_block_question = get_sub_field('faq_block_question');
                                $faq_block_answer = get_sub_field('faq_block_answer');
                                ?>
                                    <div class="accordion-block" >
                                        <div class="title" tabindex="0">
                                            <?php if ($faq_block_question != '') { ?>
                                                <h3 class="h5"><?= $faq_block_question; ?></h3>
                                            <?php } ?>
                                        </div>	
                                        <div class="accordion-body">
                                            <?= $faq_block_answer; ?>
                                        </div>
                                    </div>
                                <?php 
                            endwhile;
                        }
                    ?>
                </div>
            </div>
        </section>
    </main>
    <!-- End Main Content -->

<?php 

get_footer();
?>