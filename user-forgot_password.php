<?php
/**
 * Symnel Recover Password
 *
 * @package Osclass
 * @subpackage Symnel
 * @since Symnel 1.0.2
 */
// meta tag robots
osc_add_hook( 'header', 'dtf_follow_construct' );

// add login class on body tag
dtf_add_body_class( 'recover-forgot-password' );

osc_add_filter( 'meta_title_filter', 'custom_meta_title' );
function custom_meta_title( $data ) {
  return __( sprintf( 'Recover Forgot Password / %s', osc_page_title() ), 'symnel' );
}

// call header
osc_current_web_theme_path( 'header.php' ); ?>

<div class="container">
  <div class="row">

    <?php dtf_show_flash_message( 'pubMessages', 'alert alert-dismissable alert-warning' ); ?>

    <div class="form-block col-md-9">
        <?php echo dtf_get_breadcrumb(); ?>
        <form class="symnel-form form-horizontal" action="<?php echo osc_base_url( true ); ?>" name="recover-forgot-password" id="recover-forgot-password" method="post" role="form">
          <input type="hidden" name="page" value="login" />
          <input type="hidden" name="action" value="forgot_post" />
          <input type="hidden" name="userId" value="<?php echo osc_esc_html(Params::getParam('userId')); ?>" />
          <input type="hidden" name="code" value="<?php echo osc_esc_html(Params::getParam('code')); ?>" />
          <h1><?php _e( 'Recover Forgot Password', 'symnel' ); ?></h1>
          <div class="form-group">
            <label for="new_password" class="col-sm-3 control-label"><?php _e( 'New Password', 'symnel' ); ?></label>
            <div class="col-sm-9">
                <input id="new_password" type="text" name="new_password" value="" class="form-control" autocomplete="off">
            </div>
          </div>
          <div class="form-group">
            <label for="new_password2" class="col-sm-3 control-label"><?php _e( 'Confirm New Password', 'symnel' ); ?></label>
            <div class="col-sm-9">
                <input id="new_password2" type="text" name="new_password2" value="" class="form-control" autocomplete="off">
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-3 col-sm-9">
              <button type="submit" class="btn btn-default"><?php _e( 'Change Password', 'symnel' ); ?></button>
            </div>
          </div>
        </form>
    </div><!-- .form-block -->

    <?php osc_current_web_theme_path( 'side-widgets-login.php' ); ?>

  </div>
</div>

<?php osc_current_web_theme_path( 'footer-item.php' ); ?>
<?php osc_current_web_theme_path( 'footer.php' ); ?>
