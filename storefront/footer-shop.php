<?php

/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package storefront
 */

?>
</div>
<!--col-md-main-3 -->
</div>
<!--row -->
</div>
<!--main-container-->
</section>
<!--forth-hover-->
</main>
<footer>
    <section class="nav-mobile-div d-md-block d-lg-none">
    </section>
    <section id="bgblack"></section>
    <!-- <section id="pixel">
    <img src="https://zosrov.com/wp-content/uploads/2022/12/pixel.jpg" alt="">
</section> -->
    <div class="container main-container">
        <div class="row">
            <div class="col-12 col-md-3">
                <?php
                $args = array(
                    'container' => false,
                    'theme_location' => 'footer',
                    'items_wrap' => '<ul>%3$s</ul>',
                );
                wp_nav_menu($args);
                ?>
            </div>
            <div class="col-12 col-md-3">
                <?php
                $args = array(
                    'container' => false,
                    'theme_location' => 'footerAdA',
                    'items_wrap' => '<ul>%3$s</ul>',
                );
                wp_nav_menu($args);
                ?>
            </div>
            <div class="col-12 col-md-3">

                <?php
                $args = array(
                    'container' => false,
                    'theme_location' => 'footerAdB',
                    'items_wrap' => '<ul>%3$s</ul>',
                );
                wp_nav_menu($args);
                ?>
            </div>
            <div class="col-12 col-md-3">
                <div class="licenced">
                    <?php
                    $args = array(
                        'container' => false,
                        'theme_location' => 'license',
                        'items_wrap' => '<ul>%3$s</ul>',
                    );
                    wp_nav_menu($args);
                    ?>
                </div>
            </div>
        </div>
    </div>
    <section id="lastslogon">
        <p>
            تمامی حقوق برای
            <a href="<?php echo esc_url(home_url('/')); ?>">
                سایت زسرو
            </a>
            محفوظ می باشد و هر گونه کپی برداری از قالب و محتوای سایت شرعا حرام است
        </p>
    </section>
    <script src="<?php echo esc_url(home_url('/')); ?>wp-content/themes/storefront/assets/js/jquery-3.6.0.min.js"></script>
    <script src="<?php echo esc_url(home_url('/')); ?>wp-content/themes/storefront/assets/js/shopjs.js"></script>
    <?php do_action('storefront_after_footer'); ?>
    <?php wp_footer(); ?>

</footer>