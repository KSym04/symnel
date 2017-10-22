<?php
/**
 * Symnel Register
 *
 * @package Osclass
 * @subpackage Symnel
 * @since Symnel 1.0
 */
// meta tag robots
osc_add_hook( 'header', 'dtf_follow_construct' );

// add login class on body tag
dtf_add_body_class( 'register' );

osc_add_filter( 'meta_title_filter', 'custom_meta_title' );
function custom_meta_title( $data ) {
  return __( sprintf( 'SignUp / %s', osc_page_title() ), 'symnel' );
}

// call header
osc_current_web_theme_path( 'header.php' ); ?>

<div class="container">
  <div class="row">

    <?php dtf_show_flash_message( 'pubMessages', 'alert alert-dismissable alert-warning' ); ?>

    <div class="form-block col-md-9">
        <?php echo dtf_get_breadcrumb(); ?>
        <form class="symnel-form form-horizontal" name="register" id="register" action="<?php echo osc_base_url( true ); ?>" method="post" role="form">
          <input type="hidden" name="page" value="register" />
          <input type="hidden" name="action" value="register_post" />
          <h1><?php _e( 'SignUp', 'symnel' ); ?></h1>
          <div class="form-group">
            <label for="s_name" class="col-sm-3 control-label"><?php _e( 'Name', 'symnel' ); ?></label>
            <div class="col-sm-9">
                <input id="s_name" type="text" name="s_name" value="" class="form-control" autocomplete="off">
            </div>
          </div>
          <div class="form-group">
            <label for="s_email" class="col-sm-3 control-label"><?php _e( 'Email', 'symnel' ); ?></label>
            <div class="col-sm-9">
                <input id="s_email" type="text" name="s_email" value="" class="form-control" autocomplete="off">
            </div>
          </div>
          <div class="form-group">
            <label for="s_password" class="col-sm-3 control-label"><?php _e( 'Password', 'symnel' ); ?></label>
            <div class="col-sm-9">
                <input id="s_password" type="password" name="s_password" value="" class="form-control" autocomplete="off">
            </div>
          </div>
          <div class="form-group">
            <label for="s_password2" class="col-sm-3 control-label"><?php _e( 'Repeat Password', 'symnel' ); ?></label>
            <div class="col-sm-9">
                <input id="s_password2" type="password" name="s_password2" value="" class="form-control" autocomplete="off">
                <?php if ( osc_recaptcha_public_key() ) { ?>
                <script type="text/javascript">
                  var RecaptchaOptions = {
                      theme : 'custom',
                      custom_theme_widget: 'recaptcha_widget'
                  };
                </script>
                <style type="text/css">
                  div#recaptcha_widget { margin: 10px 0 0; }
                  div#recaptcha_widget, div#recaptcha_image > img { width: 100%; }
                  div#recaptcha_image > img { border: 1px solid #e5e5e5;  border-radius: 4px; }
                  div#recaptcha_image { width: 100% !important; }
                  .recaptcha_only_if_image { display: block; margin: 10px 0 5px; font-size: 11px; color: #777777;}
                </style>
                <div id="recaptcha_widget">
                  <div id="recaptcha_image"><img /></div>
                  <span class="recaptcha_only_if_image"><?php _e( 'Enter the words above', 'symnel' ); ?>:</span>
                  <input type="text" class="form-control input-sm" id="recaptcha_response_field" name="recaptcha_response_field" />
                </div>
                <?php } ?>
                <?php osc_show_recaptcha( 'register' ); ?>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-3 col-sm-9">
              <span class="form-small-note"><?php _e( 'By clicking the button, you agree to our term', 'symnel' ); ?><br /></span>
              <span class="form-small-note"><a href="<?php echo osc_esc_html(__(osc_get_preference('terms_url', 'symnel_theme'), 'symnel')); ?>" target="_blank"><?php _e( 'Terms', 'symnel' ); ?></a></span>
              <span class="divider">&middot;</span>
              <span class="form-small-note"><a href="<?php echo osc_esc_html(__(osc_get_preference('privacy_url', 'symnel_theme'), 'symnel')); ?>" target="_blank"><?php _e( 'Privacy', 'symnel' ); ?></a></span>
            </div>
          </div>
          <?php osc_run_hook( 'user_register_form' ); ?>
          <div class="form-group">
            <div class="col-sm-offset-3 col-sm-9">
              <button type="submit" class="btn btn-default pull-left"><?php _e( 'SignUp', 'symnel' ); ?></button>
            </div>
          </div>
        </form>
    </div><!-- .form-block -->

    <?php osc_current_web_theme_path( 'side-widgets-login.php' ); ?>

  </div>
</div>

<?php osc_current_web_theme_path( 'footer-item.php' ); ?>
<?php osc_current_web_theme_path( 'footer.php' ); ?>
