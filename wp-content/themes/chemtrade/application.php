<?php 

// Template Name: Application Page
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
            $application_content = get_field('application_content');
            $application_product_heading = get_field('application_product_heading');
            $application_class = ['col-md-4 col-sm-6', 'col-md-4 col-sm-6', 'col-md-4 col-sm-6', 'col-sm-6', 'col-sm-6'];
        ?>
        <section class="application-inner">
            <div class="container">
                <?= $application_content; ?>
                <?php if ($application_product_heading != '') { ?>
                    <h2 class="h4 no-border"><?= $application_product_heading ?></h2>
                <?php } ?>
                <div class="row">
                    <?php 
                        $i = 0;
                        if (have_rows('application_product')) {
                            while (have_rows('application_product')): the_row();
                                $application_product_name = get_sub_field('application_product_name');
                                $application_product_content = get_sub_field('application_product_content');
                                $application_product_image = get_sub_field('application_product_image');
                                ?>
                                <div class=<?= $application_class[$i]; ?>>
                                    <div class="application-img-content-wrapper">
                                        <?php if ($application_product_name != '') { ?>
                                            <h3 class="h4"><?= $application_product_name; ?></h3>
                                        <?php } ?>
                                        <div class="application-img-content" style="background-image: url(<?= $application_product_image['url']; ?>);">
                                            <div class="application-content-wrapper nicecscroll-secondary">
                                                <div class="application-content">
                                                    <?php if ($application_product_content != '') { ?>
                                                        <p class="sm-text"><?= $application_product_content; ?></p>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php 
                                $i++;
                                if ($i == count($application_class)) {
                                    $i = 0;
                                }
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