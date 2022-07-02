<?php 

// Template Name: about us Page
get_header();
?>

    <!-- Main Content -->
    <main class="main-content">

        <!-- Main page header -->
        <section class="page-header" style="background-image: url(<?= get_the_post_thumbnail_url(get_the_ID(),'full'); ?>);">
            <div class="container">
                <h1><?= get_the_title(); ?></h1>
            </div>
            <div class="page-nav-wrapper">
                <div class="container">
                    <ul class="page-navigation about-us-page">
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

        <!-- About chemtrade -->
        <?php 
            $about_chemtrade_heading = get_field('about_chemtrade_heading');
            $fact_figure_heading = get_field('fact_figure_heading');
            $some_facts = get_field('some_facts');
            $some_facts=str_ireplace('<ul>','',$some_facts);
            $some_facts=str_ireplace('</ul>','',$some_facts);
            $about_chemtrade_figure = get_field('about_chemtrade_figure');
        ?>
        <section class="about-chemtrade-block scrollspy-block" data-scrollspy="About Chemtrade" data-sec-id="about">
            <div class="container">
            <?php if ($about_chemtrade_heading != '') { ?>
                <h2 class="center-border h3"><?= $about_chemtrade_heading; ?></h2>
            <?php } ?>
                <div class="chemtrade-info">
                    <div class="left-content">
                    <?php if ($fact_figure_heading != '') { ?>
                        <h3 class="text-primary h5"><?= $fact_figure_heading; ?></h3>
                    <?php } ?>
                    <?php if ($some_facts!= '') { ?>
                        <ul class="square-bullets">
                            <?= $some_facts; ?>
                        </ul>
                    <?php } ?>
                    </div>
                    <?php if ($about_chemtrade_figure != '') { ?>
                        <div class="right-content" style="background-image: url(<?= $about_chemtrade_figure['url']; ?>);"></div>
                    <?php } ?>
                </div>
            </div>
        </section>

        <!-- Quotation -->
        <?php 
            $about_quotes = get_field('about_quotes');
        ?>
        <section class="about-quotes">
            <?php if ($about_quotes != '') { ?>
                <div class="container">
                    <blockquote class="h4"><?= $about_quotes; ?></blockquote>
                </div>
            <?php } ?>
        </section>

        <!-- About info -->
        <section class="about-info">
            <div class="container">
            <?php 
                if (have_rows('about_info')) {
                    while (have_rows('about_info')): the_row();
                        $info_title = get_sub_field('info_title');
                        $info_image = get_sub_field('info_image');
                        $info_content = get_sub_field('info_content');
                        ?>
                            <div class="info-inner">
                                <h4><em><img src="<?= $info_image['url']; ?>" alt="<?=$info_image['alt']; ?>" title="<?=$info_image['title']; ?>"></em><?= $info_title; ?></h4>
                                <?php if ($info_content != '') { ?>
                                <p class="h6"><?= $info_content; ?></p>
                                <?php } ?>
                            </div>
                        <?php
                    endwhile;
                }
            ?>
            </div>
        </section>

        <!-- Chemtrade vision -->
        <section class="about-vision scrollspy-block vision-secondary-block" data-scrollspy="Vision & Journey" data-sec-id="vision_journey">
            <div class="container">
                <h2 class="has-no-border h3">
                    <?php 
                        $i = 0;
                        $color = ['color-blue', 'color-green', 'color-orange'];
                        if (have_rows('vision_value_culture_title')) {
                            while (have_rows('vision_value_culture_title')): the_row();
                                $vision_value_culture_heading = get_sub_field('vision_value_culture_heading');
                                ?>
                                    <em class="<?= $color[$i]; ?>"><?= $vision_value_culture_heading; ?></em>
                                <?php
                                $i++;
                            endwhile;
                        }
                    ?>
                </h2>
                
                <?php 
                    $our_vision_heading = get_field('our_vision_heading');
                    $our_vision_sub_heading = get_field('our_vision_sub_heading');
                    $our_vision_title_image = get_field('our_vision_title_image');
                    $our_vision_content = get_field('our_vision_content');
                    $our_vision_content_image = get_field('our_vision_content_image');
                ?>
                <div class="about-info-block">
                    <div class="info-block-header">
                    <?php if ($our_vision_title_image != '') { ?>
                        <em><img src="<?= $our_vision_title_image['url']; ?>" alt="<?= $our_vision_title_image['alt']; ?>"></em>
                    <?php } ?>
                        <div class="block-header-detail">
                            <h3>
                                <?php if ($our_vision_heading != '') { ?>
                                    <span class="h4"><?= $our_vision_heading; ?></span>
                                <?php } ?>
                                <?= $our_vision_sub_heading; ?>
                            </h3>
                        </div>
                    </div>
                    <div class="info-block-body clearfix">
                        <?php if ($our_vision_content_image != '') { ?>
                            <em class="block-image"><img src="<?= $our_vision_content_image['url']; ?>" alt="<?= $our_vision_content_image['alt']; ?>"></em>
                        <?php } ?>
                        <?= $our_vision_content; ?>
                    </div>
                </div>

                <?php 
                    $our_value_heading = get_field('our_value_heading');
                    $our_value_sub_heading = get_field('our_value_sub_heading');
                    $our_value_title_image = get_field('our_value_title_image');
                    $our_value_content = get_field('our_value_content');
                    $value_sub_heading = get_field('value_sub_heading');
                ?>
                <div class="about-info-block has-values-block">
                    <div class="info-block-header">
                    <?php if ($our_value_title_image != '') { ?>
                        <em><img src="<?= $our_value_title_image['url']; ?>" alt="<?= $our_value_title_image['alt']; ?>"></em>
                    <?php } ?>
                        <div class="block-header-detail">
                            <h3>
                            <?php if ($our_value_heading != '') { ?>
                                <span class="h4"><?= $our_value_heading; ?></span>
                            <?php } ?>
                                <?= $our_value_sub_heading; ?>
                            </h3>
                        </div>
                    </div>
                    <div class="info-block-body">
                        <?= $our_value_content; ?>
                        <div class="info-box">
                        <?php if ($our_value_heading != '') { ?>
                            <h4><?php echo ucwords(strtolower($our_value_heading)); ?>: <em class="tag"><?= substr($our_value_sub_heading, 0, strpos($our_value_sub_heading,' ')); ?></em> <?= substr($our_value_sub_heading, strpos($our_value_sub_heading,' ')); ?></h4>
                        <?php } ?>
                        <?php if ($value_sub_heading != '') { ?>
                            <p class="mt-2"><?= $value_sub_heading; ?></p>
                        <?php } ?>
                            <ul class="info-listing">
                                <?php 
                                    if (have_rows('value_list_content_as_sub_content')) {
                                        while (have_rows('value_list_content_as_sub_content')): the_row();
                                            $value_list_content = get_sub_field('value_list_content');
                                            ?>
                                            <li><?= $value_list_content; ?></li>
                                            <?php 
                                        endwhile;
                                    }            
                                ?>
                            </ul>
                        </div>
                        
                        <?php 
                            if (have_rows('value_box_content')) {
                                while (have_rows('value_box_content')): the_row();
                                    $value_box_sub_heading = get_sub_field('value_box_sub_heading');
                                    $value_box_content = get_sub_field('value_box_content');
                                    $value_box_image = get_sub_field('value_box_image');
                                    ?>
                                    <div class="grey-box">
                                        <div class="box-name">
                                        <?php if ($value_box_sub_heading != '') { ?>
                                            <p><?= substr($value_box_sub_heading, 0, 1); ?></p>
                                        <?php } ?>
                                        <?php if ($value_box_sub_heading != '') { ?>
                                            <span><em><?= substr($value_box_sub_heading, 0, 1); ?></em><?= substr($value_box_sub_heading, 1); ?></span>
                                        <?php } ?>
                                        </div>
                                        <div class="box-detail-block">
                                            <?php if ($value_box_content != '') { ?>
                                                <div class="box-content">
                                                    <?= $value_box_content; ?>
                                                </div>
                                            <?php } ?>
                                            <?php if ($value_box_image != '') { ?>
                                            <em class="box-detail-image"><img src="<?= $value_box_image['url'] ?>" alt="<?= $value_box_image['alt'] ?>"></em>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <?php 
                                endwhile;
                            }            
                        ?>
                    </div>
                </div>

                <?php 
                    $our_culture_heading = get_field('our_culture_heading');
                    $our_culture_sub_heading = get_field('our_culture_sub_heading');
                    $our_culture_title_image = get_field('our_culture_title_image');
                    $our_culture_content = get_field('our_culture_content');
                    $culture_sub_heading = get_field('culture_sub_heading');
                ?>
                <div class="about-info-block has-culture-block">
                    <div class="info-block-header">
                    <?php if ($our_culture_title_image != '') { ?>
                        <em><img src="<?= $our_culture_title_image['url']; ?>" alt="<?= $our_culture_title_image['alt']; ?>"></em>
                    <?php } ?>
                        <div class="block-header-detail">
                            <h3>
                                <?php if ($our_culture_heading != '') { ?>
                                    <span class="h4"><?= $our_culture_heading; ?></span>
                                <?php } ?>
                                <?= $our_culture_sub_heading; ?>
                            </h3>
                        </div>
                    </div>
                    <div class="info-block-body">
                        <?= $our_culture_content; ?>
                            <div class="info-box">
                            <?php if ($our_culture_heading != '') { ?>
                                <h4><?php echo ucwords(strtolower($our_culture_heading)); ?>: <em class="tag orange"><?= substr($our_culture_sub_heading, 0, strpos($our_culture_sub_heading,' ')); ?></em> <?= substr($our_culture_sub_heading, strpos($our_culture_sub_heading,' ')); ?></h4>
                                <?php } ?>
                                <?php if ($culture_sub_heading != '') { ?>
                                    <p class="mt-2"><?= $culture_sub_heading; ?></p>
                                <?php } ?>
                                <ul class="info-listing">
                                    <?php 
                                        if (have_rows('culture_list_content_as_sub_content')) {
                                            while (have_rows('culture_list_content_as_sub_content')): the_row();
                                                $culture_list_content = get_sub_field('culture_list_content');
                                                ?>
                                                <li><?= $culture_list_content; ?></li>
                                                <?php 
                                            endwhile;
                                        }            
                                    ?>
                                </ul>
                            </div>

                            <?php 
                                if (have_rows('culture_box_content')) {
                                    while (have_rows('culture_box_content')): the_row();
                                        $culture_box_sub_heading = get_sub_field('culture_box_sub_heading');
                                        $culture_box_content = get_sub_field('culture_box_content');
                                        $culture_box_image = get_sub_field('culture_box_image');
                                        ?>
                                        <div class="grey-box">
                                            <div class="box-name orange">
                                                <?php if ($culture_box_sub_heading != '') { ?>
                                                    <p><?= substr($culture_box_sub_heading, 0, 1); ?></p>
                                                <?php } ?>
                                                <?php if ($culture_box_sub_heading != '') { ?>
                                                    <span><em><?= substr($culture_box_sub_heading, 0, 1); ?></em><?= substr($culture_box_sub_heading, 1); ?></span>
                                                <?php } ?>
                                            </div>
                                            <div class="box-detail-block">
                                                <?php if ($culture_box_content != '') { ?>
                                                    <div class="box-content">
                                                        <?= $culture_box_content; ?>
                                                    </div>
                                                <?php } ?>
                                                <?php if ($culture_box_image != '') { ?>
                                                    <em class="box-detail-image"><img src="<?= $culture_box_image['url'] ?>" alt="<?= $culture_box_image['alt'] ?>"></em>
                                                <?php } ?>
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

        <!-- Chemtrade journey -->
        <?php 
            $journey_small_letter_title = get_field('journey_small_letter_title');
            $journey_title = get_field('journey_title');
            $journey_content = get_field('journey_content');
        ?>
        <section class="about-vision scrollspy-block about-vision-secondary" data-scrollspy="Vision & Journey" data-sec-id="vision_journey">
            <div class="container">
                <div class="vision-info">
                    <div class="vision-header">
                    <?php if ($journey_small_letter_title != '') { ?>
                        <h3><span class="h4"><?= $journey_small_letter_title ;?></span><?= $journey_title; ?></h3>
                    <?php } ?>
                    </div>
                    <div class="vision-body">
                    <?php if ($journey_content != '') { ?>
                        <h4 class="h6"><?= $journey_content; ?></h4>
                    <?php } ?>
                        <div class="timeline-wrapper">
                        <?php 
                            if (have_rows('journey_news')) {
                                while (have_rows('journey_news')): the_row();
                                    $journey_news_date = get_sub_field('journey_news_date');
                                    $journey_news_image = get_sub_field('journey_news_image');
                                    $journey_news_content = get_sub_field('journey_news_content');
                                    $date = str_replace('/', '-', $journey_news_date);
                                    $month_final = date('M', strtotime($date));
                                    $year_final = date('Y', strtotime($date));
                                    ?>
                                    <div class="timeline-outer">
                                        <div class="year">
                                            <?php if ($year_final != '') { ?>
                                                <p><?= $year_final; ?> <span><?= $month_final; ?></span></p>
                                            <?php } ?>
                                        </div>
                                        <div class="timeline-right-info">
                                            <div class="thumb" style="background-image: url(<?= $journey_news_image['url']; ?>);">
                                            </div>
                                            <div class="timeline-info">
                                                <?= $journey_news_content; ?>
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
            </div>
        </section>	

        <!-- Chemtrade values -->
        <?php 
            $values_culture_title = get_field('values_culture_title');
            $values_culture_sub_title = get_field('values_culture_sub_title');
            $values_culture_sub_title=str_ireplace('<p>','',$values_culture_sub_title);
            $values_culture_sub_title=str_ireplace('</p>','',$values_culture_sub_title);
            $values_culture_content = get_field('values_culture_content');
            $value_image = get_field('value_image');
            $culture_image = get_field('culture_image');
        ?>
        <section class="about-values scrollspy-block" data-scrollspy="Values & Culture" data-sec-id="values_culture">
            <div class="container">
                <!-- <h2 class="center-border">Values & Culture</h2> -->
                <?php if ($values_culture_title != '') { ?>
                    <h2 class="center-border"><?= $values_culture_title; ?></h2>
                <?php } ?>
                <?php if ($values_culture_sub_title != '') { ?>
                    <h3 class="h4"><?= $values_culture_sub_title; ?></h3>
                <?php } ?>
                <p><?= $values_culture_content; ?></p>
                <div class="values-block">
                    <div class="values-wrapper" data-aos="fade-right">
                    <?php if ($value_image != '') { ?>
                        <div class="header-img">
                            <img src="<?= $value_image['url']; ?>" alt="<?= $value_image['alt']; ?>" title="<?= $value_image['title']; ?>">
                        </div>
                    <?php } ?>
                        <?php 
                            if (have_rows('value_content')) {
                                while (have_rows('value_content')): the_row();
                                    $values_heading = get_sub_field('values_heading');
                                    $values_content_image = get_sub_field('values_content_image');
                                    $values_content = get_sub_field('values_content');
                                    ?>
                                        <div class="values-info">
                                        <?php if ($values_content_image != '') { ?>
                                            <em><img src="<?= $values_content_image['url']; ?>" alt="<?= $values_content_image['alt']; ?>" title="<?= $values_content_image['title']; ?>"></em>
                                        <?php } ?>
                                            <div class="info-inner">
                                            <?php if ($values_heading != '') { ?>
                                                <h4 class="h6"><?= $values_heading; ?></h4>
                                            <?php } ?>
                                                <?= $values_content; ?>
                                            </div>
                                        </div>
                                    <?php 
                                endwhile;
                            }
                        ?>
                    </div>

                    <div class="values-wrapper reverse" data-aos="fade-left">
                    <?php if ($culture_image != '') { ?>
                        <div class="header-img">
                            <img src="<?= $culture_image['url']; ?>" alt="<?= $culture_image['alt']; ?>" title="<?= $culture_image['title']; ?>">
                        </div>
                    <?php } ?>
                        <?php 
                            if (have_rows('culture_content')) {
                                while (have_rows('culture_content')): the_row();
                                    $culture_heading = get_sub_field('culture_heading');
                                    $culture_image = get_sub_field('culture_image');
                                    $culture_content = get_sub_field('culture_content');
                                    ?>
                                        <div class="values-info">
                                        <?php if ($culture_image != '') { ?>
                                            <em><img src="<?= $culture_image['url']; ?>" alt="<?= $culture_image['alt']; ?>" title="<?= $culture_image['title']; ?>"></em>
                                        <?php } ?>
                                            <div class="info-inner">
                                            <?php if ($culture_heading != '') { ?>
                                                <h4 class="h6"><?= $culture_heading; ?></h4>
                                            <?php } ?>
                                                <?= $culture_content; ?>
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

        <!-- Leadership -->
        <?php 
            $leadership_title = get_field('leadership_title');
            $leadership_content = get_field('leadership_content');
            $leadership_profile_image = get_field('leadership_profile_image');
            $leadership_profile_close_image = get_field('leadership_profile_close_image');
        ?>
        <section class="about-leadership scrollspy-block" data-scrollspy="Leadership" data-sec-id="leadership">
            <div class="container">
            <?php if ($leadership_title != '') { ?>
                <h2 class="center-border"><?= $leadership_title; ?></h2>
            <?php } ?>
            <?php if ($leadership_content != '') { ?>
                <p class="h6"><?= $leadership_content; ?></p>
            <?php } ?>
                <ul class="profile-list">
                    <?php 
                        if (have_rows('leadership_profile')) {
                            while (have_rows('leadership_profile')): the_row();
                                $leadership_profile_heading = get_sub_field('leadership_profile_heading');
                                $leadership_profile_sub_heading = get_sub_field('leadership_profile_sub_heading');
                                $leadership_profile_content = get_sub_field('leadership_profile_content');
                                ?>
                                    <li>
                                        <div class="profile-box-wrapper">
                                            <div class="profile-box" tabindex="0">
                                            <?php if ($leadership_profile_image != '') { ?>
                                                <em style="background-image: url(<?= $leadership_profile_image['url']; ?>);"></em>
                                            <?php } ?>
                                            <?php if ($leadership_profile_heading != '') { ?>
                                                <h3 class="h6"><?= $leadership_profile_heading; ?></h3>
                                            <?php } ?>
                                                <?= $leadership_profile_sub_heading; ?>
                                            </div>
                                            <div class="profile-info">
                                                <a href="#" class="close">
                                                    <?php if ($leadership_profile_close_image != '') { ?>
                                                        <img src="<?= $leadership_profile_close_image['url']; ?>"
                                                        alt="<?= $leadership_profile_close_image['alt']; ?>"
                                                        title="<?= $leadership_profile_close_image['title']; ?>">
                                                    <?php } ?>
                                                    </a>
                                                <?= $leadership_profile_content; ?>
                                            </div>
                                        </div>
                                    </li>
                                <?php 
                            endwhile;
                        }
                    ?>
                </ul>
            </div>
        </section>

        <!-- Trustee -->
        <?php 
            $trustee_title = get_field('trustee_title');
            $trustee_content = get_field('trustee_content');
        ?>
        <section class="about-trustees-block scrollspy-block" data-scrollspy="Board of Trustees" data-sec-id="board_trustees">
            <div class="container">
            <?php if ($trustee_title != '') { ?>
                <h2 class="center-border"><?= $trustee_title; ?></h2>
            <?php } ?>
            <?php if ($trustee_content != '') { ?>
                <p class="h6"><?= $trustee_content; ?></p>
            <?php } ?>
                <ul class="profile-list">
                    <?php 
                        if (have_rows('trustee_profile')) {
                            while (have_rows('trustee_profile')): the_row();
                                $trustee_profile_heading = get_sub_field('trustee_profile_heading');
                                $trustee_profile_position = get_sub_field('trustee_profile_position');
                                $trustee_profile_content = get_sub_field('trustee_profile_content');
                                ?>
                                <li>
                                    <div class="profile-box-wrapper">
                                        <div class="profile-box" tabindex="0">
                                            <?php if ($leadership_profile_image != '') { ?>
                                            <em style="background-image: url(<?= $leadership_profile_image['url']; ?>);"></em>
                                            <?php } ?>
                                            <?php if ($trustee_profile_heading != '') { ?>
                                            <h3 class="h6"><?= $trustee_profile_heading; ?></h3>
                                            <?php } ?>
                                            <?= $trustee_profile_position; ?>
                                        </div>
                                        <div class="profile-info">
                                            <a href="#" class="close">
                                                <?php if ($leadership_profile_close_image != '') { ?>
                                                    <img src="<?= $leadership_profile_close_image['url']; ?>"
                                                        alt="<?= $leadership_profile_close_image['alt']; ?>"
                                                        title="<?= $leadership_profile_close_image['title']; ?>">
                                                <?php } ?>
                                            </a>
                                            <?= $trustee_profile_content; ?>
                                        </div>
                                    </div>
                                </li>
                                <?php 
                            endwhile;
                        }
                    ?>
                </ul>
            </div>
        </section>
    </main>
    <!-- End Main Content -->

<?php 

get_footer();
?>