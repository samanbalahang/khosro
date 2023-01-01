<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1,minimum-scale=1 ,user-scalable=no">
    <link rel="stylesheet" href="<?php echo esc_url(home_url('/')); ?>wp-content/themes/storefront/assets/css/all.min.css">
    <link rel="stylesheet" href="<?php echo esc_url(home_url('/')); ?>wp-content/themes/storefront/assets/css/bootstrap.rtl.css">
    <link rel="stylesheet" href="<?php echo esc_url(home_url('/')); ?>wp-content/themes/storefront/assets/css/swiper-bundle.min.css">
    <link rel="stylesheet" href="<?php echo esc_url(home_url('/')); ?>wp-content/themes/storefront/assets/css/style.css">
    <?php get_bloginfo("name"); ?>
    <?php wp_head(); ?>
</head>

<body <?php body_class("light"); ?>>
<section id="loader">
        <div>
        <div class="loading-container">
            <div class="box-loading">
                <div class="box"></div>
                <div class="box"></div>
                <div class="box"></div>
                <div class="box"></div>
                <div class="box"></div>
            </div>
        </div>
        <p class="text-wite">
            لطفا تا بارگذاری کامل سایت منتظر بمانید....
        </p>
        </div>
    </section>
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
                        <li class="logo"><a href="<?php echo esc_url(home_url('/')); ?>"><?= get_custom_logo() ?></a></li>
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
                <div class="d-flex search-nav-box align-items-center justify-content-between">
                    <!-- <div class="actions">
                        <div class="mode-checkbox">
                            <input type="checkbox" id="mode">
                            <div class="toggle"></div>
                            <label class="icon" for="mode"></label>
                        </div>
                

                        <input type="checkbox" name="color" id="color">
                    </div>    
                    <div id="sunmoon">
                            <img src="https://zosrov.com/wp-content/uploads/2022/12/sunest-1.png" alt="sun" width="42px" id="sun">
                            <img src="https://zosrov.com/wp-content/uploads/2022/12/moonest-1.png" alt="sun" width="42px" id="moon" class="d-none">
                    </div> -->
                    <div>
                        <div class="position-relative search-form-nav d-flex justyfy-content-start align-items-center">
                            <?php
                            get_search_form();
                            ?>
                            <p id="searchBtn">
                                <i class="fas fa-search"></i>
                            </p>
                        </div>



                    </div>

                    <div class="login signup d-flex align-items-center">

                        <?php
                        if (is_user_logged_in()) {
                        ?>
                            <div class="d-flex" id="nav-user-acount">
                                <div class="svgs">
                                   <i class="fas fa-user"></i>

                                </div>

                                <div class="svgs">
                                    <svg style="width: 20px; height: 20px; fill: var(--light);">
                                        <use xlink:href="#dropdown"></use>
                                    </svg>
                                </div>
                                <svg style="display: none;">
                                    <symbol id="dropdown" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <path d="M7 10l5 5 5-5H7z"></path>
                                    </symbol>
                                </svg>
                                <div class="user-acount-subs">
                                    <ul>
                                        <li>
                                            <?php
                                            global $current_user;
                                            // echo $current_user->user_login;
                                            echo $current_user->display_name . " عزیز خوش آمدید ";
                                            // wp_get_current_user();
                                            ?>
                                        </li>
                                        <li>
                                            <a href="">
                                                <!-- <i class="fas fa-user mx-1"></i> -->
                                                <span>تنظیمات اطلاعات فردی</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="">
                                                <!-- <i class="fas fa-cogs mx-1"></i> -->
                                                <span>تنظیمات اطلاع رسانی</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="">
                                                <!-- <i class="fas fa-user-headset mx-1"></i> -->
                                                <span>درخواست های من</span>
                                            </a>

                                        </li>
                                        <li>
                                            <a href="<?php echo esc_url(home_url('/')); ?>wp-login.php?action=logout&amp;_wpnonce=6f4264f3e1&amp;redirect_to=https%3A%2F%2Fzosrov.com%2F%3Floggedout%3Dtrue ">
                                                <!-- <i class="fas fa-sign-out mx-1"></i> -->
                                                <span>خروج</span>

                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                        <?php
                        } else {
                        ?>
                            <a href="<?php echo get_permalink(get_option('woocommerce_myaccount_page_id')); ?>" title="<?php _e('My Account', ''); ?>">

                                <div class="d-flex">
                                    <div class="svgs">
                                        <svg style="width: 24px; height: 24px; fill: var(--light);">
                                            <use xlink:href="#profileOff"></use>
                                        </svg>
                                    </div>
                                    <svg style="display: none;">
                                        <symbol id="profileOff" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                            <path fill-rule="evenodd" d="M12 2a5 5 0 015 5v1A5 5 0 017 8V7a5 5 0 015-5zm9.996 18.908C21.572 16.318 18.096 14 12 14c-6.095 0-9.572 2.318-9.996 6.908A1 1 0 003 22h18a1 1 0 00.996-1.092zM4.188 20c.728-2.677 3.231-4 7.812-4 4.58 0 7.084 1.323 7.812 4H4.188zM9 7a3 3 0 116 0v1a3 3 0 01-6 0V7z" clip-rule="evenodd"></path>
                                        </symbol>
                                    </svg>
                                </div>
                            </a>
                        <?php
                        }
                        ?>

                    </div>
                    <div class="seperatore">
                        |
                    </div>
                    <div class="cart">
                        <div class="basket" id="basket">
                            <p>
                                 <i class="fas fa-shopping-bag noti-icon"></i>
                            </p>
                            <!-- <a href="<?php // echo wc_get_cart_url(); ?>">
                                
                            </a>-->
                            <div class="user-acount-subs"> 
                                <ul>
                                    <li>
                                        سبد خرید شما
                                    </li>
                                   
                                    <?php
                                            global $woocommerce;
                                            $items = $woocommerce->cart->get_cart();

                                                foreach($items as $item => $values) { 
                                                    $_product =  wc_get_product( $values['data']->get_id()); 
                                                    $getProductDetail = wc_get_product( $values['product_id'] );
                                                    echo "
                                                    <li class='d-flex align-items-center '>
                                                    <div>";
                                                    echo $getProductDetail->get_image(); // accepts 2 arguments ( size, attr )
                                                    echo "</div><div>";
                                                    echo "<b>".$_product->get_title().'</b>  <br> تعداد: '.$values['quantity'].'<br>'; 
                                                    $price = get_post_meta($values['product_id'] , '_price', true);
                                                    echo "  قیمت: ".$price."<br></div></li>";
                                                } 
                                        ?>
                                    <!-- <li>
                                        <?php /*
                                            global $woocommerce;
                                            $items = $woocommerce->cart->get_cart();

                                                foreach($items as $item => $values) { 
                                                    $_product =  wc_get_product( $values['data']->get_id() );
                                                    //product image
                                                    $getProductDetail = wc_get_product( $values['product_id'] );
                                                    echo $getProductDetail->get_image(); // accepts 2 arguments ( size, attr )

                                                    echo "<b>".$_product->get_title() .'</b>  <br> Quantity: '.$values['quantity'].'<br>'; 
                                                    $price = get_post_meta($values['product_id'] , '_price', true);
                                                    echo "  Price: ".$price."<br>";
                                                    /*Regular Price and Sale Price//
                                                    echo "Regular Price: ".get_post_meta($values['product_id'] , '_regular_price', true)."<br>";
                                                    echo "Sale Price: ".get_post_meta($values['product_id'] , '_sale_price', true)."<br>";
                                                }
                                            */
                                        ?>
                                        </li> -->
                                        <li>
                                            جمع سبد خرید شما: 
                                            <br>
                                            <span>
                                                <?php

                                            global $woocommerce;
                                            echo  $woocommerce->cart->get_cart_total();
                                            ?>   

                                            </span>
                                        </li>
                                        <li>
                                            <div class="d-flex align-items-center">
                                                <a href="<?=wc_get_cart_url()?>" class="btn btn-success mx-1">
                                                    مشاهده سبد خرید
                                                </a>
                                                <a href="<?=wc_get_checkout_url()?>" class="btn btn-success mx-1">
                                                  تسویه حساب
                                                </a>
                                            </div>

                                        </li>
                                </ul>
                            </div>
                        </div>
          
                    </div>

                </div>
            </div>
        </div>
    </header>
    <header class="empty-gray">

    </header>