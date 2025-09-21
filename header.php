<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<?php if (is_user_logged_in()) { ?>
    <div><?php wp_admin_bar_render(); ?></div>
<?php } ?>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- Fonts -->

    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Amatic+SC:wght@400;700&display=swap" rel="stylesheet">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <header id="header" class="header d-flex align-items-center sticky-top">
        <div class="container position-relative d-flex align-items-center justify-content-between">

            <!-- Logo -->
            <a class="navbar-brand" href="<?php echo home_url(); ?>">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/new-logo.png" alt="Parolas Logo" width="90" height="60">
            </a>

            <!-- Desktop Menu -->
            <nav id="navmenu" class="navmenu d-none d-xl-block">
                <?php
                wp_nav_menu([
                    'menu' => 'primary',
                    'container' => false,
                    'theme_location' => 'primary',
                    'items_wrap' => '<ul>%3$s</ul>',
                ]);
                ?>
            </nav>

            <!-- Mobile Toggle Button -->
            <button class="btn d-xl-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileMenu" aria-controls="mobileMenu">
                <i class="fa-solid fa-bars" style="color:var(--accent-color)"></i>
            </button>
        </div>
    </header>

    <!-- Offcanvas Mobile Menu -->
    <div class="offcanvas offcanvas-start w-100" tabindex="-1" id="mobileMenu" aria-labelledby="mobileMenuLabel">
        <!-- Header with Logo and Close Button -->
        <div class="offcanvas-header border-bottom py-3 px-4">
            <a href="<?php echo esc_url(home_url('/')); ?>" class="navbar-brand d-flex align-items-center">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/new-logo.png" alt="<?php bloginfo('name'); ?>" height="40">
            </a>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>

        <!-- Body with Menu -->
        <div class="offcanvas-body px-4 pt-3 d-flex flex-column justify-content-between" style="height: 100%;">
            <div>
                <?php
                wp_nav_menu([
                    'menu'            => 'primary',
                    'theme_location'  => 'primary',
                    'container'       => false,
                    'menu_class'      => 'nav flex-column mobile-nav gap-2',
                    'items_wrap'      => '<ul class="%2$s">%3$s</ul>',
                    'fallback_cb'     => false,
                ]);
                ?>
            </div>

            <!-- Footer -->
            <div class="offcanvas-footer border-top pt-3 mt-3 small text-muted text-center">
                <p class="mb-1">&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All rights reserved.</p>
            </div>
        </div>
    </div>
