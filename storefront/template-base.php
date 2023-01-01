<?php

/**
 * The template for displaying custom Home width pages.
 *
 * Template Name: Base Home
 *
 * @package storefront
 */
get_header("base"); ?>
<style>
    html {
        margin-top: 0 !important;
    }

    html.adminislogin {
        margin-top: 33px !important;
    }

    h1,
    h2,
    h3,
    h4,
    h5,
    h6,
    p,
    a {
        font-family: 'zosrov' !important;
    }
</style>
<main>
    <section id="slider">
        <?php //add_revslider('food-recipe-carousel1'); 
        ?>
    </section>
    <section id="forth-hover" class="forth-hover">
        <div class="container main-container">
            <div class="row">
                <div class="col-12 col-md-main-9 p-lg-0">
                    <section id="product" class="product">
                        <div class="container-fluid">
                            <div class="row">
                                <?php

                                // since wordpress 4.5.0
                                // $args = array(
                                //     'taxonomy'   => "product_cat",
                                // );
                                // $product_categories = get_terms($args);

                                // foreach( $product_categories as $cat ) { echo $cat->name; }
                                ?>
                                <h2>
                                    <?php
                                    echo the_field("first-product-cat-name");
                                    ?>
                                </h2>
                                <div class="swiper-container mySwiperPerView">
                                    <div class="swiper-wrapper">
                                        <?php
                                        $firstProductCat = strval(get_field("first-product-cat"));
                                        $args = array(
                                            'post_type' => 'product',
                                            'product_cat_id' => '21',
                                            'posts_per_page' => 7,
                                            'tax_query'             => array(
                                                array(
                                                    'taxonomy'      => 'product_cat',
                                                    'field'         => 'slug', //This is optional, as it defaults to 'term_id'
                                                    'terms'         => $firstProductCat,
                                                ),
                                            )
                                        );
                                        $productsLoop = new WP_Query($args);
                                        
                                        if ($productsLoop->have_posts()) {
                                            $counter = 1;
                                            while ($productsLoop->have_posts()) : $productsLoop->the_post();
                                                $price = get_post_meta(get_the_ID(), '_regular_price', true);
                                                $wcprice = str_replace('&nbsp;', ' ', wc_price($price));
                                                $pricetxt = strval(strip_tags($wcprice));
                                                $theprice = explode(" ", $pricetxt);
                                                if ($theprice[0] == "0") {
                                                    $icon = esc_url(home_url('/')) . "wp-content/themes/storefront/assets/images/free.png";
                                                } else {
                                                    $icon = esc_url(home_url('/')) . "wp-content/themes/storefront/assets/images/primium.png";
                                                }
                                                // CAT
                                                $cats= get_the_terms($post->ID, 'product_cat');
                                                foreach ($cats as $key => $value) {
                                                    if(strval($value->name) == "ویدئویی"){
                                                        // echo "done";
                                                        $secicon = esc_url(home_url('/')) . "wp-content/themes/storefront/assets/images/video.png";
                                                    }
                                                    elseif (strval($value->name) == "صوتی"){
                                                        $secicon = esc_url(home_url('/')) . "wp-content/themes/storefront/assets/images/audio.png";
                                                    }
                                                                                                     
                                                    else{
                                                        // echo strval($value->name)."<br>";
                                                        // echo "ویدئویی";
                                                        $secicon = esc_url(home_url('/')) . "wp-content/themes/storefront/assets/images/txt.png";
                                                    }
                                                    if(strval($value->name) == "آموزشی"){
                                                        // echo "done";
                                                        $trdicon = esc_url(home_url('/')) . "wp-content/themes/storefront/assets/images/tuts.png";
                                                    }
                                                    elseif (strval($value->name) == "ابزار"){
                                                        $trdicon = esc_url(home_url('/')) . "wp-content/themes/storefront/assets/images/tools.png";
                                                    }                                                     
                                                    else{
                                                        // echo strval($value->name)."<br>";
                                                        // echo "ویدئویی";
                                                        $trdicon = esc_url(home_url('/')) . "wp-content/themes/storefront/assets/images/tools.png";
                                                    }
                                                   
                                                }
                                                echo "
                                            <div class='swiper-slide'>
                                             <a href='" . get_permalink() . "'>
                                               <div class='card mb-lg-4'>
                                                   <div class='img-container'>
                                                     <img src=\"" . get_the_post_thumbnail_url() . "\" alt=\"" . get_the_title() . "\">
                                                     <div class='cat-img-div'>
                                                        <img src=\"" . $trdicon . "\" alt='ایکون دسته بندی'>
                                                        <img src=\"" . $icon . "\" alt='ایکون دسته بندی'>
                                                        <img src=\"" . $secicon . "\" alt='ایکون دسته بندی'>
                                                  

                                                    
                                                     </div>
                                                  </div>
                                                 <div class='card-body'>
                                                    <div class='breadcrumbs'>
                                                       <p>
                                                            محصولات
                                                            <i class='fas fa-caret-left'></i>
                                                            " .

                                                    $firstProductCat
                                                    . "
                                                            <i class='fas fa-caret-left'></i>
                                                            " .
                                                    get_the_title()
                                                    . "
                                                        </p>
                                                    </div>
                                                       <h2>
                                                         " .
                                                    get_the_title()
                                                    . "
                                                       </h2>
                                                        <hr>
                                                        <p>" .
                                                    get_the_excerpt()
                                                    . "            
                                                        </p>
                                                 </div>
                                                 <div class='card-footer text-muted d-flex justify-content-end p-0 mt-auto'>
                                                    <a class='btn btn-dark price' href='" . get_permalink() . "'>
                                                    " .
                                                    wc_price($price)
                                                    . "
                                                    </a>
                                                 </div>
                                                </div>
                                             </a>
                                            </div>
                                       
                                        ";
                                            endwhile;
                                        }
                                        wp_reset_postdata();
                                        ?>

                                    </div><!-- swiper-wrapper -->
                                </div> <!-- swiper-container mySwiperPerView -->

                                <!-- sec -->
                                <h2>
                                    <?= the_field("sec-product-cat-name"); ?>
                                </h2>
                                <div class="swiper-container mySwiperPerView">
                                    <div class="swiper-wrapper">
                                        <?php
                                        $secProductCat = strval(get_field("sec-product-cat"));
                                        $args = array(
                                            'post_type' => 'product',
                                            'product_cat_id' => '21',
                                            'posts_per_page' => 7,
                                            'tax_query'             => array(
                                                array(
                                                    'taxonomy'      => 'product_cat',
                                                    'field'         => 'slug', //This is optional, as it defaults to 'term_id'
                                                    'terms'         => $secProductCat,
                                                ),
                                            )
                                        );
                                        $productsLoop = new WP_Query($args);
                                        if ($productsLoop->have_posts()) {
                                            $counter = 1;
                                            while ($productsLoop->have_posts()) : $productsLoop->the_post();
                                            $price = get_post_meta(get_the_ID(), '_regular_price', true);
                                            $wcprice = str_replace('&nbsp;', ' ', wc_price($price));
                                            $pricetxt = strval(strip_tags($wcprice));
                                            $theprice = explode(" ", $pricetxt);
                                            if ($theprice[0] == "0") {
                                                $icon = esc_url(home_url('/')) . "wp-content/themes/storefront/assets/images/free.png";
                                            } else {
                                                $icon = esc_url(home_url('/')) . "wp-content/themes/storefront/assets/images/primium.png";
                                            }
                                            // CAT
                                            $cats= get_the_terms($post->ID, 'product_cat');
                                            foreach ($cats as $key => $value) {
                                                if(strval($value->name) == "ویدئویی"){
                                                    // echo "done";
                                                    $secicon = esc_url(home_url('/')) . "wp-content/themes/storefront/assets/images/video.png";
                                                }
                                                elseif (strval($value->name) == "صوتی"){
                                                    $secicon = esc_url(home_url('/')) . "wp-content/themes/storefront/assets/images/audio.png";
                                                }                                                     
                                                else{
                                                    // echo strval($value->name)."<br>";
                                                    // echo "ویدئویی";
                                                    $secicon = esc_url(home_url('/')) . "wp-content/themes/storefront/assets/images/txt.png";
                                                }
                                                if(strval($value->name) == "آموزشی"){
                                                    // echo "done";
                                                    $trdicon = esc_url(home_url('/')) . "wp-content/themes/storefront/assets/images/tuts.png";
                                                }
                                                elseif (strval($value->name) == "ابزار"){
                                                    $trdicon = esc_url(home_url('/')) . "wp-content/themes/storefront/assets/images/tools.png";
                                                }                                                     
                                                else{
                                                    // echo strval($value->name)."<br>";
                                                    // echo "ویدئویی";
                                                    $trdicon = esc_url(home_url('/')) . "wp-content/themes/storefront/assets/images/tools.png";
                                                }
                                            }
                                            echo "
                                        <div class='swiper-slide'>
                                         <a href='" . get_permalink() . "'>
                                           <div class='card mb-lg-4'>
                                               <div class='img-container'>
                                                 <img src=\"" . get_the_post_thumbnail_url() . "\" alt=\"" . get_the_title() . "\">
                                                 <div class='cat-img-div'>
                                                    <img src=\"" . $trdicon . "\" alt='ایکون دسته بندی'>
                                                    <img src=\"" . $icon . "\" alt='ایکون دسته بندی'>
                                                    <img src=\"" . $secicon . "\" alt='ایکون دسته بندی'>
                                                  

                                                
                                                 </div>
                                              </div>
                                             <div class='card-body'>
                                                <div class='breadcrumbs'>
                                                   <p>
                                                        محصولات
                                                        <i class='fas fa-caret-left'></i>
                                                        " .

                                                $firstProductCat
                                                . "
                                                        <i class='fas fa-caret-left'></i>
                                                        " .
                                                get_the_title()
                                                . "
                                                    </p>
                                                </div>
                                                   <h2>
                                                     " .
                                                get_the_title()
                                                . "
                                                   </h2>
                                                    <hr>
                                                    <p>" .
                                                get_the_excerpt()
                                                . "            
                                                    </p>
                                             </div>
                                             <div class='card-footer text-muted d-flex justify-content-end p-0 mt-auto'>
                                                <a class='btn btn-dark price' href='" . get_permalink() . "'>
                                                " .
                                                wc_price($price)
                                                . "
                                                </a>
                                             </div>
                                            </div>
                                         </a>
                                        </div>
                                   
                                    ";
                                            endwhile;
                                        }
                                        wp_reset_postdata();
                                        ?>
                                    </div><!-- swiper-wrapper -->
                                </div> <!-- swiper-container mySwiperPerView -->


                                <!-- third -->
                                <h2>
                                    <?= the_field("third-product-cat-name"); ?>
                                </h2>
                                <div class="swiper-container mySwiperPerView">
                                    <div class="swiper-wrapper">
                                        <?php
                                        $thirdProductCat = strval(get_field("third-product-cat"));
                                        $args = array(
                                            'post_type' => 'product',
                                            'product_cat_id' => '21',
                                            'posts_per_page' => 7,
                                            'tax_query'             => array(
                                                array(
                                                    'taxonomy'      => 'product_cat',
                                                    'field'         => 'slug', //This is optional, as it defaults to 'term_id'
                                                    'terms'         => $thirdProductCat,
                                                ),
                                            )
                                        );
                                        $productsLoop = new WP_Query($args);
                                        if ($productsLoop->have_posts()) {
                                            $counter = 1;
                                            while ($productsLoop->have_posts()) : $productsLoop->the_post();
                                                  $price = get_post_meta(get_the_ID(), '_regular_price', true);
                                                $wcprice = str_replace('&nbsp;', ' ', wc_price($price));
                                                $pricetxt = strval(strip_tags($wcprice));
                                                $theprice = explode(" ", $pricetxt);
                                                if ($theprice[0] == "0") {
                                                    $icon = esc_url(home_url('/')) . "wp-content/themes/storefront/assets/images/free.png";
                                                } else {
                                                    $icon = esc_url(home_url('/')) . "wp-content/themes/storefront/assets/images/primium.png";
                                                }
                                                // CAT
                                                $cats= get_the_terms($post->ID, 'product_cat');
                                                foreach ($cats as $key => $value) {
                                                    if(strval($value->name) == "ویدئویی"){
                                                        // echo "done";
                                                        $secicon = esc_url(home_url('/')) . "wp-content/themes/storefront/assets/images/video.png";
                                                    }
                                                    elseif (strval($value->name) == "صوتی"){
                                                        $secicon = esc_url(home_url('/')) . "wp-content/themes/storefront/assets/images/audio.png";
                                                    }
                                                                                                     
                                                    else{
                                                        // echo strval($value->name)."<br>";
                                                        // echo "ویدئویی";
                                                        $secicon = esc_url(home_url('/')) . "wp-content/themes/storefront/assets/images/txt.png";
                                                    }
                                                    if(strval($value->name) == "آموزشی"){
                                                        // echo "done";
                                                        $trdicon = esc_url(home_url('/')) . "wp-content/themes/storefront/assets/images/tuts.png";
                                                    }
                                                    elseif (strval($value->name) == "ابزار"){
                                                        $trdicon = esc_url(home_url('/')) . "wp-content/themes/storefront/assets/images/tools.png";
                                                    }                                                     
                                                    else{
                                                        // echo strval($value->name)."<br>";
                                                        // echo "ویدئویی";
                                                        $trdicon = esc_url(home_url('/')) . "wp-content/themes/storefront/assets/images/tools.png";
                                                    }
                                                }
                                                echo "
                                            <div class='swiper-slide'>
                                             <a href='" . get_permalink() . "'>
                                               <div class='card mb-lg-4'>
                                                   <div class='img-container'>
                                                     <img src=\"" . get_the_post_thumbnail_url() . "\" alt=\"" . get_the_title() . "\">
                                                     <div class='cat-img-div'>
                                                        <img src=\"" . $trdicon . "\" alt='ایکون دسته بندی'>
                                                        <img src=\"" . $icon . "\" alt='ایکون دسته بندی'>
                                                        <img src=\"" . $secicon . "\" alt='ایکون دسته بندی'>

                                                    
                                                     </div>
                                                  </div>
                                                 <div class='card-body'>
                                                    <div class='breadcrumbs'>
                                                       <p>
                                                            محصولات
                                                            <i class='fas fa-caret-left'></i>
                                                            " .

                                                    $firstProductCat
                                                    . "
                                                            <i class='fas fa-caret-left'></i>
                                                            " .
                                                    get_the_title()
                                                    . "
                                                        </p>
                                                    </div>
                                                       <h2>
                                                         " .
                                                    get_the_title()
                                                    . "
                                                       </h2>
                                                        <hr>
                                                        <p>" .
                                                    get_the_excerpt()
                                                    . "            
                                                        </p>
                                                 </div>
                                                 <div class='card-footer text-muted d-flex justify-content-end p-0 mt-auto'>
                                                    <a class='btn btn-dark price' href='" . get_permalink() . "'>
                                                    " .
                                                    wc_price($price)
                                                    . "
                                                    </a>
                                                 </div>
                                                </div>
                                             </a>
                                            </div>
                                       
                                        ";
                                            endwhile;
                                        }
                                        wp_reset_postdata();
                                        ?>
                                    </div><!-- swiper-wrapper -->
                                </div> <!-- swiper-container mySwiperPerView -->

                                <!-- forth  -->
                                <h2>
                                    <?= the_field("forth-product-cat-name"); ?>
                                </h2>
                                <div class="swiper-container mySwiperPerView">
                                    <div class="swiper-wrapper">
                                        <?php
                                        $forthProductCat = strval(get_field("forth-product-cat"));
                                        $args = array(
                                            'post_type' => 'product',
                                            'product_cat_id' => '21',
                                            'posts_per_page' => 7,
                                            'tax_query'             => array(
                                                array(
                                                    'taxonomy'      => 'product_cat',
                                                    'field'         => 'slug', //This is optional, as it defaults to 'term_id'
                                                    'terms'         => $forthProductCat,
                                                ),
                                            )
                                        );
                                        $productsLoop = new WP_Query($args);
                                        if ($productsLoop->have_posts()) {
                                            $counter = 1;
                                            while ($productsLoop->have_posts()) : $productsLoop->the_post();
                                            $price = get_post_meta(get_the_ID(), '_regular_price', true);
                                            $wcprice = str_replace('&nbsp;', ' ', wc_price($price));
                                            $pricetxt = strval(strip_tags($wcprice));
                                            $theprice = explode(" ", $pricetxt);
                                            if ($theprice[0] == "0") {
                                                $icon = esc_url(home_url('/')) . "wp-content/themes/storefront/assets/images/free.png";
                                            } else {
                                                $icon = esc_url(home_url('/')) . "wp-content/themes/storefront/assets/images/primium.png";
                                            }
                                            // CAT
                                            $cats= get_the_terms($post->ID, 'product_cat');
                                            foreach ($cats as $key => $value) {
                                                if(strval($value->name) == "ویدئویی"){
                                                    // echo "done";
                                                    $secicon = esc_url(home_url('/')) . "wp-content/themes/storefront/assets/images/video.png";
                                                }
                                                elseif (strval($value->name) == "صوتی"){
                                                    $secicon = esc_url(home_url('/')) . "wp-content/themes/storefront/assets/images/audio.png";
                                                }
                                                                                                 
                                                else{
                                                    // echo strval($value->name)."<br>";
                                                    // echo "ویدئویی";
                                                    $secicon = esc_url(home_url('/')) . "wp-content/themes/storefront/assets/images/txt.png";
                                                }
                                                if(strval($value->name) == "آموزشی"){
                                                    // echo "done";
                                                    $trdicon = esc_url(home_url('/')) . "wp-content/themes/storefront/assets/images/tuts.png";
                                                }
                                                elseif (strval($value->name) == "ابزار"){
                                                    $trdicon = esc_url(home_url('/')) . "wp-content/themes/storefront/assets/images/tools.png";
                                                }                                                     
                                                else{
                                                    $trdicon = esc_url(home_url('/')) . "wp-content/themes/storefront/assets/images/tools.png";
                                                }
                                               
                                            }
                                            echo "
                                        <div class='swiper-slide'>
                                         <a href='" . get_permalink() . "'>
                                           <div class='card mb-lg-4'>
                                               <div class='img-container'>
                                                 <img src=\"" . get_the_post_thumbnail_url() . "\" alt=\"" . get_the_title() . "\">
                                                 <div class='cat-img-div'>
                                                    <img src=\"" . $trdicon . "\" alt='ایکون دسته بندی'>
                                                    <img src=\"" . $icon . "\" alt='ایکون دسته بندی'>
                                                    <img src=\"" . $secicon . "\" alt='ایکون دسته بندی'>

                                                
                                                 </div>
                                              </div>
                                             <div class='card-body'>
                                                <div class='breadcrumbs'>
                                                   <p>
                                                        محصولات
                                                        <i class='fas fa-caret-left'></i>
                                                        " .

                                                $firstProductCat
                                                . "
                                                        <i class='fas fa-caret-left'></i>
                                                        " .
                                                get_the_title()
                                                . "
                                                    </p>
                                                </div>
                                                   <h2>
                                                     " .
                                                get_the_title()
                                                . "
                                                   </h2>
                                                    <hr>
                                                    <p>" .
                                                get_the_excerpt()
                                                . "            
                                                    </p>
                                             </div>
                                             <div class='card-footer text-muted d-flex justify-content-end p-0 mt-auto'>
                                                <a class='btn btn-dark price' href='" . get_permalink() . "'>
                                                " .
                                                wc_price($price)
                                                . "
                                                </a>
                                             </div>
                                            </div>
                                         </a>
                                        </div>
                                   
                                    ";
                                            endwhile;
                                        }
                                        wp_reset_postdata();
                                        ?>
                                    </div><!-- swiper-wrapper -->
                                </div> <!-- swiper-container mySwiperPerView -->
                            </div>
                        </div>
                    </section>
                </div>
                <!-- Sidebar -->
                <div class="col-12 col-md-main-3">
                    <div id="secondary" class="main widget-area">
                        <div class="card">
                            <?php dynamic_sidebar('sidebar-1'); ?>
                        </div>
                        <div class="card">
                            <?php dynamic_sidebar('sidebar-2'); ?>
                        </div>


                        <div class="my-3">
                            <?php dynamic_sidebar('sidebar-3'); ?>
                        </div>

                        <div class="card">
                            <?php dynamic_sidebar('sidebar-4'); ?>
                        </div>

                        <div class="card news-sidebar">
                            <?php dynamic_sidebar('sidebar-5'); ?>        
                        </div>
                        <div class="card">
                            <?php dynamic_sidebar('sidebar-6'); ?>
                        </div>
                    </div><!-- #secondary -->
                </div>

            </div>
        </div>
    </section>
</main>
<?php
get_footer("base");