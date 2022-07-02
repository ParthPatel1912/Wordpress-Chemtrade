<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package chemtrade
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
        content="Meta descriptions may be included in search results to concisely summarize page content.">
    <?php wp_head(); ?>
</head>

<?php
    $custom_logo_id = get_theme_mod('custom_logo');
    $logo = wp_get_attachment_image_src($custom_logo_id,'full');
    $image_alt = get_post_meta($custom_logo_id, '_wp_attachment_image_alt', TRUE);
    if (has_custom_logo()) {
        $img = '<img src="'.esc_url($logo[0]).'" alt="'.$image_alt.'" >';
    } else {
        $img = '<h1>'.get_bloginfo('name').'</h1>';
    }
?>

<?php 
    $search_image_icon_in_block = get_field('search_image_icon_in_block','option');
    $close_image_icon_in_block = get_field('close_image_icon_in_block','option');
    $search_block_placeholder = get_field('search_block_placeholder','option');
?>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
    <div class="wrapper"> 
        <!-- search-block -->
		<div class="search-block">
			<div class="container">
				<form class="input-group" id="searchform" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <div class="input-group-prepend">
                        <a href="#" id="search-button">
                            <img src="<?= $search_image_icon_in_block['url']; ?>" alt="<?= $search_image_icon_in_block['alt']; ?>" title="<?= $search_image_icon_in_block['title']; ?>">
                        </a>
                    </div>
                    <label for="search" class="d-none"><?= $search_block_placeholder; ?></label>
                    <input type="text" class="form-control" placeholder="<?= $search_block_placeholder; ?>" id="search" name="s" id="search" />
                    <div class="input-group-append">
                        <a href="#" class="close-search-block"><img src="<?= $close_image_icon_in_block['url']; ?>" alt="<?= $close_image_icon_in_block['alt']; ?>" title="<?= $close_image_icon_in_block['title']; ?>"></a>
                    </div>
                </form>
			</div>
		</div>

        <!-- scroll top btn -->
        <div class="scrolltop-btn"></div>
        
        <!-- Start Header -->
        <header class="header">
            <div class="top-header">
                <div class="container">
                    <ul class="fontresize-list">
                        <li><a href="#" class="btn-decrease">A-</a></li>
                        <li><a href="#" class="btn-orig">A</a></li>
                        <li><a href="#" class="btn-increase">A+</a></li>
                    </ul>
                    <ul>
                    <?php 
                        wp_nav_menu(
                            array(
                                'theme_location' => 'header-1-menu',
                                'menu_class' => 'navigation'
                            )
                        );
                    ?>
                    </ul>
                </div>
            </div>
            <div class="bottom-header">
                <div class="container">
                    <a href="<?= site_url(); ?>" class="logo" title="<?= get_bloginfo('name'); ?>">
                        <?php echo $img; ?>
                    </a>

                    <!-- hamburger -->
                    <!-- <div class="hamburger">
                        <span class="line"></span>
                        <span class="line"></span>
                        <span class="line"></span>
                    </div> -->

                    <!-- Main Navigation -->
                    <!-- <nav class="main-navigation"> -->
                        <?php 
                            // wp_nav_menu(
                            //     array(
                            //         'theme_location' => 'header-2-menu',
                            //         'menu_class' => 'navigation',
                            //         'container' => ''
                            //     )
                            // );
                        ?>
                    <!-- </nav> -->
                    
                    <?php if (function_exists('max_mega_menu_is_enabled') && max_mega_menu_is_enabled('header-2-menu')) : ?>
                    <?php 
                        wp_nav_menu(array(
                                    'theme_location' => 'header-2-menu',
                                    'menu_class' => 'navigation',
                                    )
                                );
                    ?>
                    <?php endif; ?>

                    <!-- End Main Navigation -->
                </div>
            </div>
        </header>
        <!-- End Header -->
        <input type="hidden" value="<?= bloginfo('name'); ?>" hidden id="blog">
        <input type="hidden" value="&#8211;" hidden id="dash">