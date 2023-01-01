<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package storefront
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

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
