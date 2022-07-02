<?php 

// Template Name: Chemical Product

get_header();
?>

<!-- Main Content -->
<main class="main-content">

    <!-- Main page header -->
    <section class="page-header no-sub-nav"
        style="background-image: url(<?= get_the_post_thumbnail_url(get_the_ID(),'full'); ?>);">
        <div class="container">
            <h1><?= get_the_title(); ?></h1>
        </div>
    </section>

    <!-- Chemtrade is Connections  -->
    <?php 
            $content_text_heading = get_field('content_text_heading');
            $content_text_1 = get_field('content_text_1');
            $content_text_2 = get_field('content_text_2');
            $thought_about_product = get_field('thought_about_product');
        ?>
    <section class="product-connection">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div class="inner-content">
                        <?php if ($content_text_heading != '') { ?>
                        <h2 class="h4 no-border"><?= $content_text_heading; ?></h2>
                        <?php } ?>
                        <?php if ($content_text_1 != '') { ?>
                        <p class="h6"><?= $content_text_1; ?></p>
                        <?php } ?>
                        <?php if ($content_text_2 != '') { ?>
                        <p class="h6"><?= $content_text_2; ?></p>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-md-5">
                    <?php if ($thought_about_product != '') { ?>
                    <blockquote class="secondary">
                        <?= $thought_about_product; ?>
                    </blockquote>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>

    <?php 
        $search_content = get_field('search_content');
        $image_search_content = get_field('image_search_content');
        $search_content_placeholder = get_field('search_content_placeholder');
    ?>
    <section class="product-search-block">
        <div class="container">
            <div class="search">
                <?php if ($search_content != '') { ?>
                <h3 class="h6 no-border"><?= $search_content; ?></h3>
                <?php } ?>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <button class="search-btn">
                        <?php if ($image_search_content != '') { ?>
                            <em><img src="<?= $image_search_content['url']; ?>" alt="<?= $image_search_content['alt']; ?>" title="<?= $image_search_content['title']; ?>"></em>
                        <?php } ?>
                        </button>
                    </div>
                    <label for="Searchproduct" class="d-none"><?= $search_content_placeholder; ?></label>
                    <input type="text" class="form-control" placeholder="<?= $search_content_placeholder; ?>..."
                        id="Searchproduct">
                </div>
            </div>
        </div>
    </section>

    <section class="products">
        <div class="container">
            <div class="row">
                <?php
                    $terms = get_terms(
                        array(
                            'taxonomy'   => 'type',
                            'hide_empty' => false,
                            'parent' => 0,
                       )
                   );
                    if (! empty($terms) && is_array($terms)) {
                        foreach ($terms as $term) { ?>
                    <?php
                        $image = get_field('image', 'type' .'_' .$term->term_id);
                        ?>
                <div class="col-md-4">
                    <div class="products-box secondary" style="background-image: url(<?= $image['url']; ?>);">
                        <div class="title-block">
                            <h2 class="h4 no-border"><?=  $term->name; ?></h2>
                        </div>
                    </div>
                    <div class="megamenu-body">
                        <div class="megamenu-wrapper secondary">
                            <?php 
                                if ($term->parent == 0) { 
                                    $args = array(
                                        'taxonomy' => 'type',
                                        'title_li' => '',
                                        'orderby' => 'date',
                                        'order' => 'ASC',
                                        'hide_empty' => 0,
                                        'child_of' => $term->term_id,
                                   );
                                    $sub_category = get_terms($args);                                    
                                    foreach ($sub_category as $sub) {
                                        $categories = $sub->name;
                                        $term_id = $sub -> term_id;
                                        ?>
                                        <ul class="menu-outer">
                                            <li class="has-submenu">
                                                <a href="<?= get_term_link($term_id); ?>" title="<?= $categories; ?>"><?= $categories; ?></a>
                                            </li>
                                            <?php
                                            $child_args = new WP_Query(array(
                                                'post_type' => 'product',
                                                'orderby' => 'title',
                                                'order' => 'ASC',
                                                'post_status' => 'publish',
                                                'nopaging' => true,
                                                'tax_query' => array(
                                                    array(
                                                        'taxonomy' => 'type',
                                                        'field' => 'term_id',
                                                        'terms' => $term_id
                                                   ),
                                               ),
                                           ));
                                            if ($child_args->have_posts()) {
                                                while ($child_args->have_posts()) : 
                                                $child_args->the_post();
                                                ?>
                                                    <ul class="submenu">
                                                        <li><a href="<?= get_permalink(); ?>" title="<?= get_the_title(); ?>"><?= get_the_title(); ?></a></li>
                                                    </ul>
                                                <?php
                                                endwhile;
                                                ?>
                                        </ul>
                                        <?php
                                        }
                                    }
                                    wp_reset_postdata();
                                }
                            ?>
                        </div>
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
        $responsible_care_heading = get_field('responsible_care_heading');
        $responsible_care_content = get_field('responsible_care_content');
        $responsible_care_image = get_field('responsible_care_image');
        $button_text = get_field('button_text');
        $responsible_cate_button_link = get_field('responsible_cate_button_link');
    ?>
    <section class="product-content">
        <div class="container">
            <div class="content-block">
                <div class="row">
                    <div class="col-md-5 img-box">
                        <div class="inner">
                        <?php if ($responsible_care_image != '') { ?>
                            <em><img src="<?= $responsible_care_image['url'] ?>" alt="<?= $responsible_care_image['alt'] ?>" title="<?= $responsible_care_image['title'] ?>"></em>
                        <?php } ?>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="content">
                            <?php if ($responsible_care_heading != '') { ?>
                            <h2 class="h4 no-border"><?= $responsible_care_heading; ?></h2>
                            <?php } ?>
                            <?= $responsible_care_content; ?>
                            <a href="<?= $responsible_cate_button_link; ?>" title="<?= $button_text; ?>" class="btn md btn-outline-primary"><?= $button_text; ?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php 
        $product_application_title = get_field('product_application_title');
        $product_application_contant = get_field('product_application_contant');
        $product_application_image = get_field('product_application_image');
        $product_application_button_text = get_field('product_application_button_text');
        $product_application_button_link = get_field('product_application_button_link');
    ?>
    <section class="product-application">
        <div class="container">
            <div class="img-content">
                <?php if ($product_application_title != '') { ?>
                <h2 class="h4 no-border"><?= $product_application_title; ?></h2>
                <?php } ?>
                <?php if ($product_application_contant != '') { ?>
                <p class="h6"><?= $product_application_contant; ?></p>
                <?php } ?>
                <?php if ($product_application_image != '') { ?>
                <em><img src="<?= $product_application_image['url'] ?>" alt="<?= $product_application_image['alt'] ?>" title="<?= $product_application_image['title'] ?>"></em>
                <?php } ?>
                <a href="<?= $product_application_button_link; ?>" title="<?= $product_application_button_text; ?>" class="btn md btn-outline-primary"><?= $product_application_button_text; ?></a>
            </div>
        </div>
    </section>

    <?php 
        $terms_conditions_heading = get_field('terms_conditions_heading');
    ?>
    <section class="product-terms-conditions">
        <div class="container">
            <?php if ($terms_conditions_heading != '') { ?>
            <h2 class="h4 no-border"><?= $terms_conditions_heading; ?></h2>
            <?php } ?>
            <ul class="btn-group-list">
                <?php 
                    if (have_rows('terms_conditions_button')) {
                        while (have_rows('terms_conditions_button')): the_row();
                            $terms_conditions_button_text = get_sub_field('terms_conditions_button_text');
                            $terms_conditions_button_link = get_sub_field('terms_conditions_button_link');
                            ?>
                            <li>
                                <a href="<?= $terms_conditions_button_link; ?>" title="<?= $terms_conditions_button_text; ?>" class="btn md btn-primary border"><?= $terms_conditions_button_text; ?></a>
                            </li>
                            <?php 
                        endwhile;
                    }
                ?>
            </ul>
        </div>
    </section>

    <?php 
        $safety_data_title = get_field('safety_data_title');
        $safety_data_content = get_field('safety_data_content');
        $emergency_line_content = get_field('emergency_line_content');
        $emergency_number = get_field('emergency_number');
        $sds_file_title = get_field('sds_file_title');
    ?>
    <section class="product-safety-data" id="product-safety-data">
        <div class="container">
            <?php if ($safety_data_title != '') { ?>
            <h2 class="h4 no-border"><?= $safety_data_title; ?></h2>
            <?php } ?>
            <?= $safety_data_content; ?>
            <?php if ($emergency_line_content != '') { ?>
            <p class="h6"><?= $emergency_line_content ?><span class="h4"><?= $emergency_number; ?></span></p>
            <?php } ?>
            <div class="file-download-block">
                <?php if ($sds_file_title != '') { ?>
                <h3 class="h6"><?= $sds_file_title; ?></h3>
                <?php } ?>
                <div class="links-wrapper">
                    <ul class="alphabet">
                        <?php 
                            $i = 0;
                            for ($x = ord('A'); $x <= ord('Z'); $x++) {
                                $class = '';
                                if ($i == 0) {
                                    $class = 'class="active"';
                                }
                                ?>
                                <li><a href="#" data-link="#<?= chr($x); ?>" <?= $class; ?>><?= chr($x); ?></a></li>
                                <?php
                                        $i++;
                            }
                        ?>
                    </ul>
                </div>

                <div class="tab-content">
                    <?php
                        $args = array(
                            'post_type'=>'sds',
                            'orderby'=>'title',
                            'order'=>'asc',
                            'post_status' => 'publish',
                            'nopaging' => true,
                       );
                        $loop = new WP_Query($args);
                        if ($loop->have_posts()) {
                            while ($loop->have_posts()) : 
                                $loop -> the_post();                                
                                for ($r = ord('A'); $r <= ord('Z'); $r++) {
                                        
                                    $get_title = get_the_title(); 
                                    $ltr_group = substr($get_title, 0, 1);

                                    if (chr($r) == $ltr_group) {
                                        if ($ltr_group == 'A') { ?>
                                            <ul data-content="#<?= chr($r); ?>" class="tab-panel" style="display:block">
                                            <?php 
                                        } 
                                        else{ 
                                            ?>
                                            <ul data-content="#<?= chr($r); ?>" class="tab-panel">
                                            <?php 
                                        } 
                                        ?>
                                        <li><?= $get_title; ?>
                                            <?php
                                            if (have_rows('sds_file')) {
                                                while (have_rows('sds_file')): the_row();            
                                                    $file_language = get_sub_field('file_language');
                                                    $file = get_sub_field('file');
                                                    if (trim($file_language) && $file != null) {
                                                        ?>
                                                            <a href="<?= $file['url'] ?>" target="_blank" title="<?= $file_language; ?>"><?= $file_language; ?></a>
                                                        <?php
                                                    }
                                                endwhile;
                                            }
                                            ?>
                                        </li>
                                        </ul>
                                        <?php
                                    }
                                }
                            endwhile;
                        }
                    ?>
                </div>
            </div>
        </div>
    </section>

</main>
<!-- End Main Content -->


<?php 
get_footer();
?>