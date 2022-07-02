<?php 

// Template Name: Legal-notice Page

get_header();
?>

    <!-- Main Content -->
    <main class="main-content">

        <!-- Main page header -->
        <section class="page-header cms-page-header no-sub-nav">
            <div class="container">
                <h1><?= get_the_title(); ?></h1>
            </div>
        </section>

    <?php 
        $legal_notice_content = get_field('legal_notice_content');
    ?>
    <section class="cms-content-page cms-wrapper">
	    <div class="container">
            <?= $legal_notice_content; ?>

            <?php 
                if (have_rows('legal_notice_topic_wise')) {
                    while (have_rows('legal_notice_topic_wise')): the_row();
                        $legal_notice_topic_heading = get_sub_field('legal_notice_topic_heading');
                        $legal_notice_topic_content = get_sub_field('legal_notice_topic_content');
                        ?>
                            <h2 class="h5"><strong><?= $legal_notice_topic_heading; ?></strong></h2>
                            <?= $legal_notice_topic_content; ?>
                        <?php 
                    endwhile;
                }
            ?>
        </div>
    </section>
    </main>

<?php 

get_footer();
?>