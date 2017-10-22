<?php
/**
 * Symnel Side Widgets Form
 *
 * @package Osclass
 * @subpackage Symnel
 * @since Symnel 1.0
 */
?>
    <?php osc_run_hook( 'before-side-widgets-login' ); ?>

    <div class="widgets-block col-md-3">
      <?php osc_run_hook( 'before-inner-side-widgets-login' ); ?>
        <div class="publish-ads-block clearfix">
          <?php if ( osc_users_enabled() || ( !osc_users_enabled() && !osc_reg_user_post() ) ) { ?>
            <a href="<?php echo osc_item_post_url_in_category() ; ?>" class="btn btn-info btn-lg btn-block"><span class="glyphicon glyphicon-plus"></span> <?php _e( 'Post a Free Ad', 'symnel' ); ?></a>
          <?php } ?>
        </div>

        <?php if ( dtf_display_latest_searches( 10 ) != '' ) { ?>
        <div class="popular-search-sidebar-section clearfix">
          <?php echo  dtf_display_latest_searches( 10 ); ?>
        </div>
        <?php } ?>
      <?php osc_run_hook( 'after-inner-side-widgets-login' ); ?>
    </div>

    <?php osc_run_hook( 'after-side-widgets-login' ); ?>
