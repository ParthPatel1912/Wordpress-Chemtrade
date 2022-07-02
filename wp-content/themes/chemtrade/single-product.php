<?php 

get_header();
?>
<?php 
    $product_id = get_the_ID();
    $terms = get_the_terms(get_the_ID(),'type');
    foreach ($terms as $term) {
        if ($term -> parent == 0) {
            $id = $term->term_taxonomy_id;
        }
    }
?>

    <main class="main-content">

        <?php 
            $banner_image = get_field('banner_image','type_'.$id);
            $page_title = get_field('page_title','type_'.$id);
            $page_sub_title = get_field('page_sub_title','type_'.$id);
        ?>
        <section class="page-header no-sub-nav" style="background-image: url(<?= $banner_image['url']; ?>);">
            <div class="container">
                <?php if ($page_title != '') { ?>
                <h1><?= $page_title; ?>
                    <span><?= $page_sub_title; ?></span>
                </h1>
                <?php } ?>
            </div>
        </section>

        <?php 
            $title_for_content = get_field('title_for_content','type_'.$id);
            $content_about_product = get_field('content_about_product','type_'.$id);
            $sub_content_heading = get_field('sub_content_heading','type_'.$id);
            $sub_content = get_field('sub_content','type_'.$id);
            $image_for_content = get_field('image_for_content','type_'.$id);
            $contact_button_text = get_field('contact_button_text','type_'.$id);
            $contact_form = get_field('contact_form','type_'.$id);
        ?>
        <section class="product-sppc-content">
            <div class="container">
                <div class="content-block reverse">
                    <div class="row">
                        <div class="col-lg-4 col-md-5 img-box">
                            <div class="bg-img" style="background-image: url(<?= $image_for_content['url']; ?>);"></div>
                        </div>
                        <div class="col-lg-8 col-md-7">
                            <div class="content">
                                <?php if ($title_for_content != '') { ?>
                                    <h2 class="h4 no-border"><?= $title_for_content; ?></h2>
                                <?php } ?>
                                <?= $content_about_product; ?>
                                <?php if ($sub_content_heading != '') { ?>
                                    <h3 class="h6"><?= $sub_content_heading; ?></h3>
                                <?php } ?>
                                <?= $sub_content; ?>
                                <a href="#" class="btn md btn-outline-primary" data-toggle="modal" data-target="#request-form-modal"><?= $contact_button_text; ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php 
            $list_for_product = get_field('list_for_product','type_'.$id);
        ?>
        <section class="products-details-block">
            <div class="container">
                <div class="details">
                    <h2 class="h4 no-border">Select Product</h2>
                    <div class="product-header-sm">
                        <h3 class="h5">Chlorine</h3>
                    </div>
                    <aside class="product-side-menu">
                        <?php 
                            $args = array(
                                'taxonomy' => 'type',
                                'title_li' => '',
                                'orderby' => 'date',
                                'order' => 'ASC',
                                'hide_empty' => 0,
                                'child_of' => $list_for_product,
                            );
                            $sub_category = get_terms($args);
                            ?>
                            <ul class="menu-outer">
                                <?php
                                    $i = 0;
                                    foreach ($sub_category as $sub) {
                                        $categories = $sub->name;
                                        $term_id = $sub -> term_id;
                                        ?>
                                            <li class="has-submenu">
                                                <?php if ($i == 0) { ?>
                                                    <a class="active" href="<?= get_term_link($term_id); ?>" title="<?= $categories; ?>"><?= $categories; ?></a>
                                                <?php 
                                                    $i = 1;
                                                    $termid = $term_id;
                                                    } else {
                                                        ?>
                                                            <a href="<?= get_term_link($term_id); ?>" title="<?= $categories; ?>"><?= $categories; ?></a>
                                                        <?php
                                                    }
                                                ?>
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
                                        ?>
                                        <ul class="submenu">
                                            <?php
                                                if ($child_args->have_posts()) {
                                                    while ($child_args->have_posts()) : 
                                                        $child_args->the_post();
                                                        ?>
                                                        <?php if ($product_id == get_the_ID()) { ?>
                                                            <li>
                                                                <a class="active" id="<?= get_the_ID(); ?>" href="<?= get_permalink(); ?>" title="<?= get_the_title(); ?>"><?= get_the_title(); ?></a>
                                                            </li>
                                                        <?php } else { ?>
                                                            <li>
                                                                <a id="<?= get_the_ID(); ?>" href="<?= get_permalink(); ?>" title="<?= get_the_title(); ?>"><?= get_the_title(); ?></a>
                                                            </li>
                                                        <?php } ?>
                                                        <?php
                                                    endwhile;
                                                }
                                            ?>
                                        </ul>
                                        <?php 
                                    }
                                ?>
                            </ul>
                            <?php
                            wp_reset_postdata();
                        ?>
                    </aside>
                    <?php 
                        $main_heading = get_field('main_heading', $product_id);
                        $another_heading = get_field('another_heading', $product_id);
                        $content_about_sds = get_field('content_about_sds', $product_id);
                        $title_for_documents = get_field('title_for_documents', $product_id);
                        $sds_link = get_field('sds_link', $product_id);
                        $sds_link_text = get_field('sds_link_text', $product_id);
                    ?>
                    <div class="product-content-wrapper cms-wrapper" id="product_data">
                        <?php if ($main_heading) { ?>
                            <h2 class="h4 no-border"><?php echo the_field('main_heading', $product_id); ?></h2>
                        <?php } ?>

                        <?php echo the_field('main_content', $product_id); ?>

                        <?php if ($another_heading) { ?>
                            <h2 class="h4 no-border"><?= the_field('another_heading', $product_id); ?></h2>
                        <?php } ?>

                        <?php echo the_field('another_content', $product_id); ?>

                        <?php
                            if (have_rows('sub_heading_with_content', $product_id)) {
                                while (have_rows('sub_heading_with_content', $product_id)): the_row();
                                    $sub_heading = get_sub_field('sub_heading');
                                    $sub_content_as_a_list = get_sub_field('sub_content_as_a_list');
                                    ?>
                                    <div class="product-info">
                                    <?php if ($sub_heading) { ?>
                                        <h3 class="h6"><?= $sub_heading; ?></h3>
                                    <?php } ?>
                                    <?php if ($sub_content_as_a_list) { ?>
                                        <ul class="square-bullets">
                                            <?= $sub_content_as_a_list; ?>
                                        </ul>
                                    <?php } ?>
                                    </div>
                                    <?php
                                endwhile;
                            }
                        ?>

                        <?php if ($title_for_documents) { ?>
                            <div class="documents">
                                <h3 class="h4"><?= the_field('title_for_documents', $product_id); ?></h3>
                                    <ul>
                                        <?php 
                                            if (have_rows('documents', $product_id)) {
                                                while (have_rows('documents', $product_id)): the_row();
                                                $document_file = get_sub_field('document_file');
                                                $document_file_image = get_sub_field('document_file_image');
                                                ?>
                                                    <li>
                                                        <a href="<?= $document_file['url']; ?>" class="document-layout" title="<?= $document_file['title']; ?>">
                                                        <?php if ($document_file_image != '') { ?>
                                                            <em><img src="<?= $document_file_image['url']; ?>" alt="<?= $document_file['alt']; ?>" title="<?= $document_file['title']; ?>"></em>
                                                        <?php } ?>
                                                            <?= $document_file['title']; ?>
                                                        </a>
                                                    </li>
                                                <?php
                                                endwhile;
                                            }
                                        ?>
                                    </ul>
                            </div>
                        <?php } ?>

                        <?php if ($content_about_sds) { ?>
                            <p class="h5"><?= the_field('content_about_sds', $product_id); ?> <a href="<?= the_field('sds_link', $product_id); ?>"><?= the_field('sds_link_text', $product_id); ?>.</a></p>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <div class="modal form fade" id="request-form-modal">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <?php echo apply_shortcodes('[contact-form-7 id="'.$contact_form.'"]'); ?>
            </div>
        </div>
    </div>

<?php 

get_footer();
?>