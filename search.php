<?php
/**
 * Symnel Search
 *
 * @package Osclass
 * @subpackage Symnel
 * @since Symnel 1.0
 */

// meta tag robots
osc_add_hook( 'header', 'dtf_nofollow_construct' );

$listClass = '';
$buttonClass = '';

$category = __get( "category" );
if ( !isset( $category['pk_i_id'] ) ) {
  $category['pk_i_id'] = null;
}

dtf_add_body_class( 'search' );
osc_current_web_theme_path( 'header.php' );
osc_add_hook( 'footer', 'autocompleteCity' );
function autocompleteCity() { ?>
    <script type="text/javascript">
    jQuery(document).ready(function() {
        function log( message ) {
            jQuery( "<div/>" ).text( message ).prependTo( "#log" );
            jQuery( "#log" ).attr( "scrollTop", 0 );
        }
        jQuery( "#sCity" ).autocomplete({
            source: "<?php echo osc_base_url( true ); ?>?page=ajax&action=location",
            minLength: 2,
            select: function( event, ui ) {
                jQuery("#sRegion").attr("value", ui.item.region);
                log( ui.item ?
                    "<?php _e( 'Selected', 'symnel' ); ?>: " + ui.item.value + " aka " + ui.item.id :
                    "<?php _e( 'Nothing selected, input was', 'symnel' ); ?> " + this.value );
            }
        });
    });
    </script>
    <?php
}
dtf_show_flash_message( 'pubMessages', 'alert alert-dismissable alert-warning' ); ?>

<div class="container">
  <div class="row">

      <?php osc_current_web_theme_path( 'side-widgets-search.php' ); ?>

      <div class="listings-block search-wrapper-block col-md-10">
        <?php echo dtf_get_breadcrumb(); ?>

          <?php $i = 0; osc_get_premiums(); if(osc_count_premiums() > 0) { ?>
          <div class="search-list-header clearfix">
            <h1 class="pull-left"><?php _e( 'Recommended', 'symnel' ); ?></h1>
          </div>
          <ul class="search-loop-list premium-list-search-block clearfix">
          <?php
              View::newInstance()->_exportVariableToView("listType", 'premiums');
              View::newInstance()->_exportVariableToView("listClass",$listClass.' premium-list');
              osc_current_web_theme_path('loop-search-premium.php'); ?>
          </ul>
          <?php } ?>

        <div class="search-list-header clearfix">
          <?php if ( osc_count_items() == 0 ) { ?>
            <h1 class="pull-left"><?php echo ( search_title() != '' ) ? search_title() : __( 'No Result Found', 'symnel' ); ?></h1>
          <?php } else { ?>
          <h1 class="pull-left"><?php echo ( search_title() != '' ) ? search_title() : __( 'Search Results', 'symnel' ); ?></h1>
          <span class="counter-search"><?php
                $search_number = dtf_search_number();
                printf( __( '%1$d - %2$d of %3$d listings', 'symnel' ), $search_number['from'], $search_number['to'], $search_number['of'] );
              } ?></span>
                        <span class="pull-right extra-filter-options">
                          <!--     START sort by       -->
                          <span class="see_by">
                            <span><?php _e( 'Sort by', 'symnel' ); ?></span>
                            <?php
              $orders = osc_list_orders();
              $current = '';
              foreach ( $orders as $label => $params ) {
                $orderType = ( $params['iOrderType'] == 'asc' ) ? '0' : '1';
                if ( osc_search_order() == $params['sOrder'] && osc_search_order_type() == $orderType ) {
                  $current = $label;
                }
              }
              ?>
              <span class="btn-group">
                <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                  <?php echo $current; ?> <span class="caret"></span>
                </button>
              <?php $i = 0; ?>
              <ul class="dropdown-menu" role="menu">
                  <?php foreach ( $orders as $label => $params ) {
                        $orderType = ( $params['iOrderType'] == 'asc' ) ? '0' : '1'; ?>
                      <?php if ( osc_search_order() == $params['sOrder'] && osc_search_order_type() == $orderType ) { ?>
                          <li><a class="current" href="<?php echo osc_esc_html( osc_update_search_url( $params ) ); ?>"><?php echo $label; ?></a></li>
                      <?php } else { ?>
                          <li><a href="<?php echo osc_esc_html( osc_update_search_url( $params ) ); ?>"><?php echo $label; ?></a></li>
                      <?php } ?>
                      <?php $i++; ?>
                  <?php } ?>
                </ul>
                </span>
            </span>
            <!--     END sort by       -->
          </span>
        </div>
        <ul class="search-loop-list clearfix">
          <?php
            if ( osc_count_items() > 0 ) {
              View::newInstance()->_exportVariableToView( "listType", 'items' );
              View::newInstance()->_exportVariableToView( "listClass", $listClass );
              osc_current_web_theme_path( 'loop-search.php' );
            }
          ?>
        </ul>

        <?php if ( osc_count_items() == 0 ) { ?>
            <p class="alert alert-warning" ><?php printf( __( 'There are no results matching "%s"', 'symnel' ), osc_search_pattern() ) ; ?></p>
            <?php osc_run_hook( 'after-search-warning' ); ?>
        <?php } ?>

       <div class="paginate" >
            <?php echo osc_search_pagination(); ?>
       </div>
      </div>

      <?php osc_current_web_theme_path( 'side-widgets-search-mobile.php' ); ?>

  </div>
</div>

<?php osc_current_web_theme_path( 'footer-item.php' ); ?>
<?php osc_current_web_theme_path( 'footer.php' ); ?>
