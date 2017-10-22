<?php
/**
 * Symnel Main Search
 *
 * @package Osclass
 * @subpackage Symnel
 * @since Symnel 1.0
 */
?>
<form id="main_search_form" name="main_search_form" action="<?php echo osc_base_url( true ); ?>" method="get" class="search search-desktop nocsrf">
  <div class="input-group input-group-lg">
    <div class="input-group-btn">
      <?php osc_categories_select( 'sCategory', null, __( 'Category', 'symnel' ) ) ; ?>
    </div>
    <input id="sPattern" name="sPattern" type="text" class="form-control" autocomplete="off" value="<?php echo osc_esc_html( osc_search_pattern() ); ?>" placeholder="<?php echo osc_esc_html(__(osc_get_preference('keyword_placeholder', 'symnel_theme'), 'symnel')); ?>" />
    <input type="hidden" name="page" value="search" />
    <div class="input-group-btn">
      <input type="submit" name="search" class="btn btn-danger" tabindex="-1" value="<?php _e( 'GO', 'symnel' ); ?>" />
      <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" tabindex="-1">
          <span class="caret"></span>
          <span class="sr-only"><?php _e( 'Toggle Download', 'symnel' ); ?></span>
      </button>
      <div class="dropdown-menu pull-right form-vertical" role="menu">
        <h5><?php _e( 'Advanced Search', 'symnel' ); ?></h5>
        <div class="form-group">
        <?php if ( osc_images_enabled_at_items() ) { ?>
        <div class="form-group clearfix">
            <span class="form-label"><?php _e( 'Show only', 'symnel' ) ; ?></span>
            <input type="checkbox" name="bPic" id="withPicture" value="1" <?php echo osc_search_has_pic() ? 'checked' : ''; ?> />
            <label for="withPicture"><?php _e( 'ad with pictures', 'symnel' ) ; ?></label>
        </div>
        <?php } ?>
        <?php if ( osc_price_enabled_at_items() ) { ?>
        <div class="form-group clearfix">
          <div class="price-slice">
                <span class="form-label"><?php _e( 'Price', 'symnel' ); ?></span>
                <div class="input-group input-group-sm">
                <span class="input-group-addon"><?php _e( 'Min', 'symnel' ) ; ?></span>
                <input class="input-sm form-control" type="text" id="priceMin" name="sPriceMin" value="<?php echo osc_esc_html( osc_search_price_min() ); ?>" autocomplete="off" />
              </div>
              <div class="input-group input-group-sm">
                <span class="input-group-addon"><?php _e( 'Max', 'symnel' ) ; ?></span>
                <input class="input-sm form-control" type="text" id="priceMax" name="sPriceMax" value="<?php echo osc_esc_html( osc_search_price_max() ); ?>" autocomplete="off" />
              </div>
            </div>
          </div>
          <?php } ?>
        </div>
      </div><!-- .dropdown-menu.pull-right.form-vertical -->
    </div>
  </div>
</form>
