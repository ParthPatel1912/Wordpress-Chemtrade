<?php 

// Template Name: Sitemap Page

get_header();
?>

    <!-- Main Content -->
    <main class="main-content">

        <!-- Main page header -->
        <section class="page-header cms-page-header no-sub-nav" >
            <div class="container">
                <h1><?= get_the_title(); ?></h1>
            </div>
        </section>

        <section class="cms-content-page cms-wrapper">
            <div class="container">                
                <!-- <p><a href="https://www.chemtradelogistics.com/" title="Home">Home</a></p>
                <p><a title="About Us" href="https://www.chemtradelogistics.com/about-us/">About Us</a></p>
                <ul><li><a href="https://www.chemtradelogistics.com/about-us/#about">About Chemtrade</a></li><li><a href="https://www.chemtradelogistics.com/about-us/#vision_journey">Vision &amp; Journey</a></li><li><a href="https://www.chemtradelogistics.com/about-us/#values_culture">Values &amp; Culture</a></li><li><a href="https://www.chemtradelogistics.com/about-us/#leadership">Leadership</a></li><li><a href="https://www.chemtradelogistics.com/about-us/#board_trustees">Board of Trustees</a></li></ul>
                <p><a href="https://www.chemtradelogistics.com/main/products/" title="Chemical Products">Chemical Products</a></p>
                <ul><li><a href="https://www.chemtradelogistics.com/main/products/sulphur-products-performance-chemicals-sppc/">Sulphur Products &amp; Performance Chemicals (SPPC)</a><ul><li><a href="https://www.chemtradelogistics.com/product/ammonium-sulphate/">Ammonium Sulphate</a></li><li><a href="https://www.chemtradelogistics.com/product/carbon-disulphide/">Carbon Disulphide (CS<sub>2</sub>)</a></li><li><a href="https://www.chemtradelogistics.com/product/emulsified-sulphur/">Emulsified Sulphur</a></li><li><a href="https://www.chemtradelogistics.com/product/hydrogen-sulphide/">Hydrogen Sulphide (H<sub>2</sub>S)</a></li><li><a href="https://www.chemtradelogistics.com/product/liquid-sulphur-dioxide/">Liquid Sulphur Dioxide (SO<sub>2</sub>)</a></li><li><a href="https://www.chemtradelogistics.com/product/merchant-acid/">Merchant Acid</a></li><li><a href="https://www.chemtradelogistics.com/product/molten-sulphur/">Molten Sulphur</a></li><li><a href="https://www.chemtradelogistics.com/product/prilled-sulphur/">Prilled Sulphur</a></li><li><a href="https://www.chemtradelogistics.com/product/regen-acid/">Regen Acid</a></li><li><a href="https://www.chemtradelogistics.com/product/sodium-bisulphite/">Sodium Bisulphite (SBS)</a></li><li><a href="https://www.chemtradelogistics.com/product/sodium-hydrosulphite/">Sodium Hydrosulphite (SHS)</a></li><li><a href="https://www.chemtradelogistics.com/product/ultrapure-acid/">UltraPure Acid</a></li><li><a href="https://www.chemtradelogistics.com/product/zinc-oxide/">Zinc Oxide</a></li></ul></li><li><a href="https://www.chemtradelogistics.com/products/water-solutions-specialty-chemicals/">Water Solutions &amp; Specialty Chemicals (WSSC)</a><ul><li><a href="https://www.chemtradelogistics.com/product/alclear/">Al<sup>+</sup>Clear®</a></li><li><a href="https://www.chemtradelogistics.com/product/aluminum-chloride/">Aluminum Chloride</a></li><li><a href="https://www.chemtradelogistics.com/product/aluminum-chlorohydrate-ach/">Aluminum Chlorohydrate (ACH)</a></li><li><a href="https://www.chemtradelogistics.com/product/aluminum-sulphate-alum/">Aluminum Sulphate (Alum)</a></li><li><a href="https://www.chemtradelogistics.com/product/ammonium-sulphate-liquid/">Ammonium Sulphate (Liquid)</a></li><li><a href="https://www.chemtradelogistics.com/product/calflo-calcium-hydroxide-slurry/">CAL~FLO® (Calcium Hydroxide Slurry)</a></li><li><a href="https://www.chemtradelogistics.com/product/citric-acid/">Citric Acid</a></li><li><a href="https://www.chemtradelogistics.com/product/copper-sulphate/">Copper Sulphate</a></li><li><a href="https://www.chemtradelogistics.com/product/ferric-sulphate/">Ferric Sulphate</a></li><li><a href="https://www.chemtradelogistics.com/product/phosphorus-pentasulphide/">Phosphorus Pentasulphide (P2S5)</a></li><li><a href="https://www.chemtradelogistics.com/product/polyaluminum-chloride-polyaluminum-chlorosulphate-pacl-pacs/">Polyaluminum Chloride (PACl)/Polyaluminum Chlorosulphate (PACS)</a></li><li><a href="https://www.chemtradelogistics.com/product/polyaluminum-silicate-sulphate-pass/">Polyaluminum Silicate Sulphate (PASS)</a></li><li><a href="https://www.chemtradelogistics.com/product/potassium-chloride-kci/">Potassium Chloride (KCI)</a></li><li><a href="https://www.chemtradelogistics.com/product/potassium-hydroxide-pellets/">Potassium Hydroxide Pellets</a></li><li><a href="https://www.chemtradelogistics.com/product/sodium-aluminate/">Sodium Aluminate</a></li><li><a href="https://www.chemtradelogistics.com/product/sodium-hydroxide-pellets/">Sodium Hydroxide Pellets</a></li><li><a href="https://www.chemtradelogistics.com/product/sodium-nitrite-food-grade/">Sodium Nitrite – Food Grade</a></li><li><a href="https://www.chemtradelogistics.com/product/sodium-nitrite-industrial-municipal/">Sodium Nitrite – Industrial/Municipal</a></li><li><a href="https://www.chemtradelogistics.com/product/vaccine-adjuvant/">Vaccine Adjuvant</a></li></ul></li><li><a href="https://www.chemtradelogistics.com/products/electrochemicals/">Electrochemicals Products (EC)</a><ul><li><a href="https://www.chemtradelogistics.com/product/caustic-soda/">Caustic Soda</a></li><li><a href="https://www.chemtradelogistics.com/product/chlorine/">Chlorine</a></li><li><a href="https://www.chemtradelogistics.com/product/hydrochloric-acid/">Hydrochloric Acid</a></li><li><a href="https://www.chemtradelogistics.com/product/sodium-chlorate/">Sodium Chlorate</a></li></ul></li><li><a href="https://www.chemtradelogistics.com/applications/">Product Applications</a></li><li><a href="https://www.chemtradelogistics.com/customer-terms-conditions/">Customer Terms &amp; Conditions</a></li><li><a href="https://www.chemtradelogistics.com/modalites-du-client/">Modalités du client</a></li><li><a href="https://www.chemtradelogistics.com/chemical-products/#product-safety-data">Safety Data Sheets</a></li></ul>
                <p><a title="Investor" href="https://www.chemtradelogistics.com/investors/">Investor</a></p>
                <ul><li><a href="https://www.chemtradelogistics.com/investors/#our-business">Our Business</a></li><li><a href="https://www.chemtradelogistics.com/investors/#latest-news">Latest News</a></li><li><a href="https://www.chemtradelogistics.com/investors/#stock-debenture">Stock &amp; Debenture</a></li><li><a href="https://www.chemtradelogistics.com/investors/#financial-reports">Financial Reports</a></li><li><a href="https://www.chemtradelogistics.com/investors/#distributions">Distributions</a></li><li><a href="https://www.chemtradelogistics.com/investors/#drip">DRIP</a></li><li><a href="https://www.chemtradelogistics.com/investors/#webcasts">Webcasts</a></li><li><a href="https://www.chemtradelogistics.com/investors/#presentations">Presentations</a></li><li><a href="https://www.chemtradelogistics.com/investors/#analysts">Analysts</a></li><li><a href="https://www.chemtradelogistics.com/investors/#governance">Governance</a></li></ul>
                <p><a title="Sustainability" href="https://www.chemtradelogistics.com/sustainability/">Sustainability</a></p>
                <ul id="block-17f07c94-2458-4f02-a87b-76d10ff9692c"><li><a href="https://www.chemtradelogistics.com/sustainability/#environmental-social-governance">Environmental, Social &amp; Governance</a></li><li><a href="https://www.chemtradelogistics.com/sustainability/#responsible-care">Responsible Care®</a></li><li><a href="https://www.chemtradelogistics.com/sustainability/#quality">Quality</a></li></ul>
                <p><a title="Careers" href="https://www.chemtradelogistics.com/careers/">Careers</a></p>
                <ul id="block-f86a138e-6f93-4d73-b6e8-6b104241e49b"><li><a href="https://www.chemtradelogistics.com/careers/#great-opportunities">Great Opportunities</a></li><li><a href="https://www.chemtradelogistics.com/careers/#employee-experience">Employee Experience</a></li><li><a href="https://www.chemtradelogistics.com/careers/#our-value">Our Values</a></li><li><a href="https://www.chemtradelogistics.com/careers/#great-people">Great People</a></li><li><a href="https://www.chemtradelogistics.com/careers/#competencies">Competencies</a></li><li><a href="https://www.chemtradelogistics.com/careers/#why-choose-chemtrade">Why Choose Chemtrade</a></li><li><a href="https://www.chemtradelogistics.com/careers/#diversity-commitment">Diversity Commitment</a></li><li><a href="https://www.chemtradelogistics.com/careers/#faqs">FAQ’s</a></li></ul>
                <p><a href="https://www.chemtradelogistics.com/news/" title="News">News</a></p>
                <p><a href="https://www.chemtradelogistics.com/locations/" title="Locations">Locations</a></p>
                <p><a href="https://www.chemtradelogistics.com/contact/" title="Contact">Contact</a></p>
                <p><a href="https://www.chemtradelogistics.com/sitemap/" title="Sitemap">Sitemap</a></p>
                <p><a href="https://www.chemtradelogistics.com/accessibility/" title="Accessibility">Accessibility</a></p>
                <ul><li><a title="Multi-Year Accessibility Plan" href="https://www.chemtradelogistics.com/multi-year-accessibility-plan/">Accessibility Plan</a></li><li><a title="Accessibility Policy" href="https://www.chemtradelogistics.com/accessibility-policy/">Accessibility Policy</a></li></ul>
                <p><a href="https://www.chemtradelogistics.com/legal-notice/" title="Legal Notice">Legal Notice</a></p> -->

                <!-- <?php 
                    $args = array(
                        'post_type' => 'page',
                        'post_status' => 'publish',
                    ); 
                    $pages = get_pages($args);

                    foreach ($pages as $page) {
                    $page_template = get_post_meta($page->ID);
                    ?>
                        <p><a href="<?php echo get_page_link( $page->ID ) ?>" title="<?= get_the_title($page->ID); ?>"><?= get_the_title($page->ID); ?></a></p>
                    <?php
                    }
                ?> -->

                <?php 
                    // wp_nav_menu(
                    //     array(
                    //         'theme_location' => 'header-2-menu',
                    //         'container' => '',
                    //     )
                    // );

                    wp_nav_menu(
                        array(
                            'theme_location' => 'header-1-menu',
                        )
                    );
                    wp_nav_menu(
                        array(
                            'theme_location' => 'footer-link',
                        )
                    );
                ?>
                <?php
                    $terms = get_terms(
                        array(
                            'taxonomy'   => 'type',
                            'hide_empty' => false,
                            'parent' => 0,
                       )
                   );
                    if (! empty($terms) && is_array($terms)) {
                        foreach ($terms as $term) { 
                            ?>
                                <ul><?=  $term->name; ?>
                                    <?php 
                                        if ($term->parent == 0) { 
                                            $args = array(
                                                'taxonomy' => 'type',
                                                'hide_empty' => 0,
                                                'child_of' => $term->term_id,
                                            );
                                            $sub_category = get_terms($args);                                    
                                            foreach ($sub_category as $sub) {
                                                $categories = $sub->name;
                                                $term_id = $sub -> term_id;
                                                ?>
                                                    <li>
                                                        <a href="<?= get_term_link($term_id); ?>" title="<?= $categories; ?>"><?= $categories; ?></a>
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
                                                           <ul>
                                                                <?php 
                                                                    if ($child_args->have_posts()) {
                                                                        while ($child_args->have_posts()) : 
                                                                        $child_args->the_post();
                                                                        ?>
                                                                        <li><a href="<?= get_permalink(); ?>" title="<?= get_the_title(); ?>"><?= get_the_title(); ?></a></li>
                                                                        <?php 
                                                                        endwhile;
                                                                    }
                                                                ?>
                                                           </ul>
                                                    </li>
                                                <?php 
                                            }
                                        }
                                        ?>
                                </ul>
                                <?php 
                        }
                    }            
                ?>
            </div>
        </section>


</main>
<!-- End Main Content -->
    </main>

<?php 

get_footer();
?>