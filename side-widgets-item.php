<?php
/**
 * Symnel Side Widgets for Single Item
 *
 * @package Osclass
 * @subpackage Symnel
 * @since Symnel 1.0
 */
?>
    <?php osc_run_hook( 'before-side-widgets-item' ); ?>

    <div class="widgets-block single-item-view-widgets-block">
      <?php osc_run_hook( 'before-inner-side-widgets-item' ); ?>
        <div class="publish-ads-block clearfix">
          <?php if ( osc_users_enabled() || ( !osc_users_enabled() && !osc_reg_user_post() ) ) { ?>
            <a href="<?php echo osc_item_post_url_in_category() ; ?>" class="btn btn-info btn-lg btn-block"><span class="glyphicon glyphicon-plus"></span> <?php _e( 'Post a Free Ad', 'symnel' ); ?></a>
          <?php } ?>
        </div>
      <?php osc_run_hook( 'after-inner-side-widgets-item' ); ?>
    </div>

    <?php osc_run_hook( 'after-side-widgets-item' ); ?>
