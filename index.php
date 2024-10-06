<!DOCTYPE html>
<html lang="<?php language_attributes(); ?>" class="no-js">

<head>
    <meta charset="<?php bloginfo('charset') ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>

<body class="<?php body_class(); ?>">
    <header id="header_area" class="<?= get_theme_mod('my_menu_position_setting'); ?>">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <a href="<?= get_home_url() ?>"><img src="<?php echo get_theme_mod('my_logo') ?>"></a>
                </div>
                <div class="col-md-9">
                    <?php 
                        wp_nav_menu(['theme_location' => 'main_menu', 'menu_id' => 'nav']);
                    ?>
                </div>
            </div>
        </div>
    </header>

    <section>
        <div id="section_area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <?= the_content(); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php wp_footer(); ?>
</body>

</html>