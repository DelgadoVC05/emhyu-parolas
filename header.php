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
<body <?php body_class(); ?> <?php wp_body_open(); ?>>
    <!-- Navigation -->
 
    <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container position-relative d-flex align-items-center justify-content-between">

     
          <a class="navbar-brand" href="<?php echo home_url(); ?>">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/new-logo.png" alt="Parolas Logo" width="90" height="60">
            </a>

              <nav id="navmenu" class="navmenu">

            <?php wp_nav_menu(
              array(
                'menu' => 'primary',
                'container' => 'true',
                'theme_location' => 'primary',
                'items_wrap' => '<ul>%3$s</ul>',   

              )

            ); ?>

       <button class="btn d-xl-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileMenu" aria-controls="mobileMenu">
          
       <i class="mobile-nav-toggle d-xl-none fa-solid fa-bars" style="color:var(--accent-color)"></i>
      </button>

      </nav>



    </div>
  </header>