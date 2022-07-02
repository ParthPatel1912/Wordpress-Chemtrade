<?php

// Template Name: Home Page
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package chemtrade
 */

get_header();
?>

<!-- Main Content -->
<main class="main-content">

    <!-- Hero Block -->
    <?php 
        $bannertext = get_field('banner_text');
    ?>
    <section class="home-hero-block">
        <div class="swiper-container home-hero-slider">
            <div class="swiper-wrapper">
                <div class="swiper-slide" style="background-image: url(<?= get_the_post_thumbnail_url(get_the_ID(),'full'); ?>);">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-5 col-lg-8 col-md-10">
                            <?php if ($bannertext != '') { ?>
                                <h1><?= $bannertext; ?></h1>
                            <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination home-hero-slider-pagination"></div>
        </div>
    </section>

    <!-- Chemtrade Info Block -->
    <?php 
        $content = get_field('content');
        $chemical_product_content = get_field('chemical_product_content');
    ?>
    <section class="home-chemtrade-info">
    <?php if ($content != '') { ?>
        <div class="container"><?= $content; ?></div>
    <?php } ?>
    </section>

    <!-- Chemical Products -->
    <section class="home-chemical-products">

        <div class="container">
            <?= $chemical_product_content; ?>
            <div class="row">
                <?php
                    $terms = get_terms(
                        array(
                            'taxonomy'   => 'type',
                            'hide_empty' => false,
                            'parent' => 0,
                        )
                    );
                    // Check if any term exists
                    if (! empty($terms) && is_array($terms)) {
                        // add links for each category
                        foreach ($terms as $term) { 
                            $image = get_field('image', 'type' .'_' .$term->term_id);
                            ?>
                            <div class="col-sm-4">
                                <div class="products-box"  style="background-image: url(<?= $image['url'] ?>);">
                                    <h3 class="h4"><?= $term->name; ?></h3>
                                    <a href="<?= esc_url(get_term_link($term)) ?>" class="btn btn-warning" title="Read more about Sulphur Products & Performance Chemicals">READ MORE</a>
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
        $product_applications_title = get_field('product_applications_title');
        $product_applications_content = get_field('product_applications_content');
        $product_applications_image = get_field('product_applications_image');
        $product_applications_service_heading = get_field('product_applications_service_heading');
        $product_applications_service = get_field('product_applications_service');
        $link_text = get_field('link_text');
        $link_text_title = get_field('link_text_title');
        $product_application_link = get_field('product_application_link');
    ?>
    <!-- Products Applications -->
    <section class="home-product-app-block">
        <div class="container">
            <div class="img-content">
            <?php if ($product_applications_title != '') { ?>
                <h2><?= $product_applications_title; ?></h2>
            <?php } ?>
            <?php if ($product_applications_content != '') { ?>
                <p><?= $product_applications_content; ?></p>
            <?php } ?>
            <?php if ($product_applications_image != '') { ?>
                <em><img src="<?= $product_applications_image['url']; ?>" alt="<?= $product_applications_image['alt']; ?>" title="<?= $product_applications_image['title']; ?>"></em>
            <?php } ?>
            </div>
            <div class="content">
            <?php if ($product_applications_service_heading != '') { ?>
                <h3 class="h5"><?= $product_applications_service_heading; ?></h3>
            <?php } ?>
            <?php if ($product_applications_service != '') { ?>
                <p><?= $product_applications_service; ?></p>
            <?php } ?>
            <?php if ($link_text != ''){ ?>
                <a class="h6 secondary" href="<?= $product_application_link; ?>" title="<?= $link_text_title; ?>"><?= $link_text; ?></a>
            <?php } ?>
            </div>
        </div>
    </section>

    <!-- Environmental, Social Block -->
    <?php 
        $responsible_care_title = get_field('responsible_care_title');
        $responsible_care_heading = get_field('responsible_care_heading');
        $responsible_care_image = get_field('responsible_care_image');
        $responsible_care_content = get_field('responsible_care_content');
    ?>
    <section class="home-social-block">
        <div class="container">
        <?php if ($responsible_care_title != '') { ?>
            <h2 class="no-border"><?= $responsible_care_title; ?></h2>
        <?php } ?>
            <div class="content-block">
                <div class="row">
                    <div class="col-md-5 img-box">
                        <div class="inner">
                        <?php if ($responsible_care_image != '') { ?>
                            <em><img src="<?= $responsible_care_image['url']; ?>" alt="<?= $responsible_care_image['alt']; ?>" title="<?= $responsible_care_image['title']; ?>"></em>
                        <?php } ?>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="content">
                        <?php if ($responsible_care_heading != '') { ?>
                            <h3 class="h4"><?= $responsible_care_heading; ?></h3>
                        <?php } ?>
                            <?= $responsible_care_content; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Investors Block -->
    <?php 
        $investor_banner_image = get_field('investor_banner_image');
        $investor_banner_image_text = get_field('investor_banner_image_text');
        $investor_title = get_field('investor_title');
        $investor_sub_title = get_field('investor_sub_title');
        $investor_content = get_field('investor_content');
    ?>
    <section class="home-investor-block">
        <div class="investor-left-contect" style="background-image: url(<?= $investor_banner_image['url']; ?>);">
            <?= $investor_banner_image_text; ?>
        </div>
        <div class="container">
            <div class="row">
                <div class="offset-md-6 col-md-6">
                    <div class="investor-right-contect">
                    <?php if ($investor_title != '') { ?>
                        <h2 class="no-border"><?= $investor_title; ?><em><?= $investor_sub_title; ?></em></h2>
                    <?php } ?>
                    <?php if ($investor_content != '') { ?>
                        <p><?= $investor_content; ?></p>
                    <?php } ?>
                        <ul class="investor-couter">

                        <?php 
                            if (have_rows('investor_price')) {
                                while (have_rows('investor_price')): the_row(); 
                                    $day_details = get_sub_field('day_details');
                                    $price_of_day = get_sub_field('price_of_day');
                                    ?>
                                    <li>
                                    <?php if ($day_details != '') { ?>
                                        <div class="h4"><?= $day_details; ?></div>
                                    <?php } ?>
                                    <?php if ($price_of_day != '') { ?>
                                        <div class="counted-value"><?= $price_of_day; ?></div>
                                    <?php } ?>
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
    </section>

    <?php 
        $opportunity_sub_title = get_field('opportunity_sub_title');
        $opportunity_content = get_field('opportunity_content');
        $opportunity_image = get_field('opportunity_image');
        $opportunity_link = get_field('opportunity_link');
        $opportunity_link_title = get_field('opportunity_link_title');
        $opportunity_link_url = get_field('opportunity_link_url');
    ?>
    <section class="home-opportunities">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-6">
                    <div class="content-block">                    
                        <h2 class="no-border">
                        <?php 
                            if (have_rows('opportunity_title')) {
                                while (have_rows('opportunity_title')): the_row(); 
                                    $opportunity_title_simple_text = get_sub_field('opportunity_title_simple_text');
                                    $opportunity_title_bold_text = get_sub_field('opportunity_title_bold_text');
                                    ?>
                                        <span><?= $opportunity_title_simple_text; ?> <strong><?= $opportunity_title_bold_text; ?></strong></span>
                                    <?php 
                                endwhile;
                            }
                        ?>
                        </h2>
                    <?php if ($opportunity_sub_title != '') { ?>
                        <h3 class="h6"><?= $opportunity_sub_title; ?></h3>
                    <?php } ?>
                        <?= $opportunity_content; ?>
                        <a href="<?= $opportunity_link_url; ?>" title="<?= $opportunity_link_title; ?>" class="secondary"><?= $opportunity_link; ?></a>
                    </div>
                </div>
                <div class="col-lg-7 col-md-6">
                    <div class="img-block">
                    <?php if ($opportunity_image != '') { ?>
                        <img src="<?= $opportunity_image['url']; ?>" alt="<?= $opportunity_image['alt']; ?>" title="<?= $opportunity_image['title']; ?>">
                    <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<!-- End Main Content -->	

<?php
get_footer();
?>