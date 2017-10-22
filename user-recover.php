<?php
/**
 * Symnel Recover Password
 *
 * @package Osclass
 * @subpackage Symnel
 * @since Symnel 1.0
 */
// meta tag robots
osc_add_hook( 'header', 'dtf_follow_construct' );

// add login class on body tag
dtf_add_body_class( 'recover-password' );

osc_add_filter( 'meta_title_filter', 'custom_meta_title' );
function custom_meta_title( $data ) {
  return __( sprintf( 'Recover Password / %s', osc_page_title() ), 'symnel' );
}

// call header
osc_current_web_theme_path( 'header.php' ); ?>

<div class="container">
  <div class="row">

    <?php dtf_show_flash_message( 'pubMessages', 'alert alert-dismissable alert-warning' ); ?>

    <div class="form-block col-md-9">
        <?php echo dtf_get_breadcrumb(); ?>
        <form class="symnel-form form-horizontal" action="<?php echo osc_base_url( true ); ?>" name="recover-password" id="recover-password" method="post" role="form">
          <input type="hidden" name="page" value="login" />
          <input type="hidden" name="action" value="recover_post" />
          <h1><?php _e( 'Forgot your password?', 'symnel' ); ?></h1>
          <div class="form-group">
            <label for="s_email" class="col-sm-3 control-label"><?php _e( 'Email', 'symnel' ); ?></label>
            <div class="col-sm-9">
                <input id="s_email" type="text" name="s_email" value="" class="form-control" autocomplete="off">
                <?php osc_show_recaptcha( 'recover_password' ); ?>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-3 col-sm-9">
              <button type="submit" class="btn btn-default"><?php _e( 'Send me a new password', 'symnel' ); ?></button>
              <div class="form-note">
                <span><?php _e( 'Need help?', 'symnel' ); ?></span>
                <a href="<?php echo osc_contact_url(); ?>"><?php _e( 'Please contact ' . osc_page_title() . ' Support', 'symnel' ); ?></a>
              </div>
            </div>
          </div>
        </form>
    </div><!-- .form-block -->

    <?php osc_current_web_theme_path( 'side-widgets-login.php' ); ?>

  </div>
</div>

<?php osc_current_web_theme_path( 'footer-item.php' ); ?>
<?php osc_current_web_theme_path( 'footer.php' ); ?>
