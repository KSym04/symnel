<?php
/**
 * Symnel Side Widgets Homepage
 *
 * @package Osclass
 * @subpackage Symnel
 * @since Symnel 1.0.2
 */
?>
    <?php osc_run_hook( 'before-side-widgets-homepage' ); ?>

    <div class="location-block clearfix col-md-2">
      <?php osc_run_hook( 'before-inner-side-widgets-homepage' ); ?>
        <h4><?php _e( "Shop by Location", 'symnel' ) ; ?></h4>
        <?php if (osc_count_list_regions() > 0) { ?>
            <ul>
              <?php while ( osc_has_list_regions() ) { ?>
                    <li><a href="<?php echo osc_list_region_url(); ?>"><?php echo osc_list_region_name() ; ?></a></li>
              <?php } ?>
            </ul>
        <?php } else { ?>
            <p class="alert alert-warning"><?php _e( "No item yet.", 'symnel' ) ; ?></p>
         <?php } ?>
       <?php osc_run_hook( 'after-inner-side-widgets-homepage' ); ?>
    </div>

    <?php osc_run_hook( 'after-side-widgets-homepage' ); ?>
