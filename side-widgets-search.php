<?php
/**
 * Symnel Side Widgets for Search
 *
 * @package Osclass
 * @subpackage Symnel
 * @since Symnel 1.0
 */
?>

<div class="alert-block col-md-2">
        <div class="search-filter-block">
            <div class="filters">
                <form action="<?php echo osc_base_url( true ); ?>" method="get" class="nocsrf search-generic-form form-vertical">
                    <h4><?php _e( "Search Filter", 'symnel' ) ; ?></h4>
                    <input type="hidden" name="page" value="search"/>
                    <input type="hidden" name="sOrder" value="<?php echo osc_search_order(); ?>" />
                    <input type="hidden" name="iOrderType" value="<?php $allowedTypesForSorting = Search::getAllowedTypesForSorting() ; echo $allowedTypesForSorting[osc_search_order_type()]; ?>" />
                    <?php foreach ( osc_search_user() as $userId ) { ?>
                    <input type="hidden" name="sUser[]" value="<?php echo $userId; ?>"/>
                    <?php } ?>
                    <div class="form-group">
                        <input class="form-control input-sm" type="text" name="sPattern"  id="query" value="<?php echo osc_esc_html( osc_search_pattern() ); ?>" placeholder="<?php _e( 'Search here', 'symnel' ); ?>" />
                    </div>
                    <div class="form-group">
                        <h5 class="form-label"><?php _e( 'City', 'symnel' ); ?></h5>
                        <input class="form-control input-sm" type="text" id="sCity" name="sCity" value="<?php echo osc_esc_html( osc_search_city() ); ?>" />
                    </div>
                    <?php if ( osc_images_enabled_at_items() ) { ?>
                    <div class="form-group clearfix">
                        <h5 class="form-label"><?php _e( 'Show only', 'symnel' ) ; ?></h5>
                        <input type="checkbox" name="bPic" id="withPicture" value="1" <?php echo osc_search_has_pic() ? 'checked' : ''; ?> />
                        <label for="withPicture"><?php _e( 'ad with pictures', 'symnel' ) ; ?></label>
                    </div>
                    <?php } ?>
                    <?php if ( osc_price_enabled_at_items() ) { ?>
                    <div class="form-group clearfix">
                        <div class="price-slice">
                            <h5><?php _e( 'Price', 'symnel' ) ; ?></h5>
                            <div class="input-group input-group-sm">
                              <span class="input-group-addon"><?php _e( 'Min', 'symnel' ) ; ?></span>
                              <input class="input-sm form-control" type="text" id="priceMin" name="sPriceMin" value="<?php echo osc_esc_html( osc_search_price_min() ); ?>" />
                            </div>
                            <div class="input-group input-group-sm">
                              <span class="input-group-addon"><?php _e( 'Max', 'symnel' ) ; ?></span>
                              <input class="input-sm form-control" type="text" id="priceMax" name="sPriceMax" value="<?php echo osc_esc_html( osc_search_price_max() ); ?>" />
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    <div class="plugin-hooks">
                        <?php
                        if ( osc_search_category_id() ) {
                            osc_run_hook( 'search_form', osc_search_category_id() ) ;
                        } else {
                            osc_run_hook( 'search_form' ) ;
                        }
                        ?>
                    </div>
                    <?php
                    $aCategories = osc_search_category();
                    foreach ( $aCategories as $cat_id ) { ?>
                        <input type="hidden" name="sCategory[]" value="<?php echo osc_esc_html( $cat_id ); ?>"/>
                    <?php } ?>
                    <div class="form-group actions">
                        <button type="submit" class="btn btn-default btn-xs btn-block"><?php _e( 'Apply', 'symnel' ) ; ?></button>
                    </div>
                </form>
            </div>
        </div>
        <?php osc_alert_form(); ?>

    <?php if ( osc_count_items() >= 7  ) { ?>
        <?php osc_run_hook( 'after-alert-form' ); ?>
    <?php } ?>

</div>

