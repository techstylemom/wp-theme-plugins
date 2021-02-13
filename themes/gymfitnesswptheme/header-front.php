<!DOCTYPE html>
<html lang="en">
<head>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    
<header class="site-header">
    <div class="container header-grid">
        <div class="navigation-bar">
            <div class="logo">
            <a href="<?php echo home_url(); ?>">
                <img src="<?php echo get_template_directory_uri() . '/img/logo.svg' ?>" alt="">
            </a>
            </div> 
            <?php 
                $args = array(
                    'theme_location' => 'main-menu',
                    'container' => 'nav',
                    'container_class' => 'main-menu'
                );

                wp_nav_menu($args);
            ?>
        </div>

        <div class="tagline text-center">
            <h1><?php the_field('hero_tagline'); ?></h1>
            <p><?php the_field('hero_content'); ?></p>
        </div>
    </div>
    
</header>