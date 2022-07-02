<?php 

get_header();
?>

<!-- Main Content -->
<main class="main-content">

    <!-- Main page header -->
    <?php 
        $single_news_banner_image = get_field('single_news_banner_image','option');
        $banner_image_title = get_field('banner_image_title','option');
    ?>
    <section class="page-header no-sub-nav" style="background-image: url(<?= $single_news_banner_image; ?>);">
        <div class="container">
        <?php if ($banner_image_title != ''){ ?>
            <h1><?= $banner_image_title; ?></h1>
        <?php } ?>
        </div>
    </section>

    <?php 
        $page_title = get_field('page_title','option');
        $back_button_link_page = get_field('back_button_link_page','option');        
        $back_button_text = get_field('back_button_text','option');
        $url = get_the_id();
        $fulldate = get_post_field('post_date',$url);        
        $month = date('M', strtotime($fulldate));
        $date = date('d', strtotime($fulldate));
        $year = date('Y', strtotime($fulldate));
        $post_title = get_post_field('post_title', $url);
        $post_content = get_post_field('post_content', $url);
    ?>
    <section class="news-detail-block">
        <div class="container">
            <div class="news-detail-header">
            <?php if ($page_title != ''){ ?>
                <h2 class="h3"><?= $page_title; ?></h2>
            <?php } ?>
                <a href="<?= $back_button_link_page; ?>" class="btn md btn-outline-primary"><?= $back_button_text; ?>
                </a>
            </div>
            <div class="news-detail-content">
                <div class="news-date-block">
                <?php if ($date != ''){ ?>
                    <div class="date">
                        <?= $date; ?>
                        <?php if ($month != ''){ ?>
                        <span class="month"><?= $month ?></span>
                        <?php } ?>
                    </div>
                <?php } ?>
                <?php if ($year != ''){ ?>
                    <span class="year"><?= $year; ?></span>
                <?php } ?>
                </div>
                <div class="inner cms-wrapper">
                <?php if ($page_title != ''){ ?>
                    <h3 class="h4">
                        <?= $page_title; ?>
                    </h3>
                <?php } ?>
                <?php if ($post_content != ''){ ?>
                    <div class="sm-cms-content">
                        <?= $post_content; ?>
                    </div>
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