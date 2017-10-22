<?php
/**
 * Symnel Login
 *
 * @package Osclass
 * @subpackage Symnel
 * @since Symnel 1.0
 */
// meta tag robots
osc_add_hook( 'header', 'dtf_follow_construct' );

// add login class on body tag
dtf_add_body_class( 'login' );

osc_add_filter( 'meta_title_filter', 'custom_meta_title' );
function custom_meta_title( $data ) {
  return __( sprintf( 'Login / %s', osc_page_title() ), 'symnel' );
}

// call header
osc_current_web_theme_path( 'header.php' ); ?>

<div class="container">
  <div class="row">

    <?php dtf_show_flash_message( 'pubMessages', 'alert alert-dismissable alert-warning' ); ?>

    <div class="form-block col-md-9">
        <?php echo dtf_get_breadcrumb(); ?>
        <form class="symnel-form form-horizontal" action="<?php echo osc_base_url( true ); ?>" name="login" id="login" method="post" role="form">
          <input type="hidden" name="page" value="login" />
          <input type="hidden" name="action" value="login_post" />
          <h1><?php _e( 'Login', 'symnel' ); ?></h1>
          <div class="form-group">
            <label for="email" class="col-sm-3 control-label"><?php _e( 'Email', 'symnel' ); ?></label>
            <div class="col-sm-9">
                <input id="email" type="text" name="email" value="" class="form-control" autocomplete="off">
            </div>
          </div>
          <div class="form-group">
            <label for="password" class="col-sm-3 control-label"><?php _e( 'Password', 'symnel' ); ?></label>
            <div class="col-sm-9">
              <input id="password" type="password" name="password" value="" class="form-control" autocomplete="off">
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-3 col-sm-9">
              <div class="checkbox">
                <label>
                    <input id="remember" type="checkbox" name="remember" value="1"> <?php _e( 'Remember me', 'symnel' ); ?>
                </label>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-3 col-sm-9">
              <button type="submit" class="btn btn-default"><?php _e( 'Login', 'symnel' ); ?></button>
              <a href="<?php echo osc_recover_user_password_url(); ?>"><?php _e( "Forgot password?", 'symnel' ); ?></a>
              <div class="form-note">
                <span><?php _e( 'New to ' . osc_page_title() . '?', 'symnel' ); ?></span>
                <a href="<?php echo osc_register_account_url(); ?>"><?php _e( "SignUp Now &raquo;", 'symnel' ); ?></a>
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
