<?php
/*
* This template for displaying the header
 */
?>

<!doctype html>
<html lang="<?php language_attributes(); ?>" class="no-js">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<!--header start-->
<header class="header-section <?php echo get_theme_mod('menu_position'); ?> ">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <a href="<?php echo home_url()?> ">
                    <img src="<?php echo get_theme_mod('main_logo'); ?>" alt="">
                </a>
            </div>
            <div class="col-md-9 d-flex align-items-center">
             <?php wp_nav_menu( array('theme_location' => 'main_menu' , 'menu_id' => 'nav') ); ?>
            </div>
        </div>
    </div>
</header>
<!--header start-->

<!--page content start-->
<section class="page-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php the_content(); ?>
            </div>
        </div>
    </div>
</section>
<!--page content end  -->


<!--footer start-->
<footer class="footer">
    <div class=" copyright-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p><?php echo get_theme_mod('copyright_section')?></p>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--footer end  -->
<?php wp_footer(); ?>
</body>
</html>
