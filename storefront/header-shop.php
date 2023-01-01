<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package storefront
 */

?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link rel="stylesheet" href="<?php echo esc_url(home_url('/')); ?>wp-content/themes/storefront/assets/css/all.min.css">
    <link rel="stylesheet" href="<?php echo esc_url(home_url('/')); ?>wp-content/themes/storefront/assets/css/bootstrap.rtl.css">
    <link rel="stylesheet" href="<?php echo esc_url(home_url('/')); ?>wp-content/themes/storefront/assets/css/style.css">

<?php wp_head(); ?>
</head>

<body class="light">
    <header>
        <div class="container header-container p-lg-0">
            <div class="d-flex justify-content-between ul-margin-none align-items-center">
                <nav id="socialMenu" class="d-block d-md-block d-lg-none justify-content-between">
                    <ul>
                        <li>
                            <a href="#" id="navBars">
                                <i class="fas fa-bars" id="bars"></i>
                            </a>
                        </li>
                    </ul>
                </nav>
                <nav id="RightMenu" class="d-lg-flex d-md-none d-none justify-content-between align-items-stretch">
                    <?php
                    $args = array(
                        'container' => false,
                        'theme_location' => 'Right',
                        'items_wrap' => '<ul>%3$s</ul>',
                    );
                    wp_nav_menu($args);
                    ?>
                </nav>
                <nav class="d-lg-flex d-md-none d-none justify-content-between align-items-stretch">
                    <ul>
                        <li class="logo"><a href="#"><img src="<?php echo esc_url(home_url('/')); ?>wp-content/uploads/2020/08/زوسرو.png" alt="svg" class="nav-logo"></a></li>
                    </ul>
                </nav>
                <nav id="LeftMenu" class="d-lg-flex d-md-none d-none justify-content-between align-items-stretch">
                    <?php
                    $args = array(
                        'container' => false,
                        'theme_location' => 'Left',
                        'items_wrap' => '<ul>%3$s</ul>',
                    );
                    wp_nav_menu($args);
                    ?>
                </nav>
            </div>
        </div>
    </header>
    <header class="header d-lg-block d-md-none d-none">
        <div class="container header-container color-menu menu">
            <div class="ul-margin-none d-flex justify-content-between align-items-stretch">
                <nav id="mainMenu" class="d-flex justify-content-between align-items-stretch">
                        <?php
                        $args = array(
                            'container' => false,
                            'theme_location' => 'primary',
                            'items_wrap' => '<ul>%3$s</ul>',
                        );
                        wp_nav_menu($args);
                        ?>
                </nav>    
                <div class="d-flex search-nav-box">
                <div class="actions">
                    <div class="mode-checkbox">
                        <input type="checkbox" id="mode">
                        <div class="toggle"></div>
                        <label class="icon" for="mode"></label>
                    </div>
            

                    <!-- <input type="checkbox" name="color" id="color"> -->
                </div>    
                <div id="sunmoon">
                        <img src="https://zosrov.com/wp-content/uploads/2022/12/sunest-1.png" alt="sun" width="42px" id="sun">
                        <img src="https://zosrov.com/wp-content/uploads/2022/12/moonest-1.png" alt="sun" width="42px" id="moon" class="d-none">
                </div>
                <div>
                    <div class="position-relative search-form-nav d-flex justyfy-content-start align-items-center">
                        <?php
                           get_search_form();
                        ?>
                        <i class="fas fa-search"></i>
                    </div>



                </div>   
                </div> 
            </div>
        </div>
    </header>
    <header class="empty-gray">

    </header>