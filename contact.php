<?php
/**
 * Symnel Contact Us
 *
 * @package Osclass
 * @subpackage Symnel
 * @since Symnel 1.0
 */
// meta tag robots
osc_add_hook( 'header', 'dtf_follow_construct' );

// add login class on body tag
dtf_add_body_class( 'contact-us' );

osc_add_filter( 'meta_title_filter', 'custom_meta_title' );
function custom_meta_title( $data ) {
  return __( sprintf( 'Contact Us / %s', osc_page_title() ), 'symnel' );
}

// call header
osc_current_web_theme_path( 'header.php' ); ?>

<div class="container">
  <div class="row">

    <?php dtf_show_flash_message( 'pubMessages', 'alert alert-dismissable alert-warning' ); ?>

    <div class="form-block col-md-9">
        <?php echo dtf_get_breadcrumb(); ?>
        <form class="symnel-form form-horizontal" action="<?php echo osc_base_url( true ); ?>" name="contact_form" id="contact_form" method="post" role="form">
          <input type="hidden" name="page" value="contact" />
          <input type="hidden" name="action" value="contact_post" />
          <h1><?php _e( 'Contact Us', 'symnel' ); ?></h1>
          <div class="form-group">
            <label for="yourName" class="col-sm-3 control-label"><?php _e( 'Your Name*', 'symnel' ); ?></label>
            <div class="col-sm-9">
                <input id="yourName" type="text" name="yourName" value="" class="form-control" autocomplete="off">
            </div>
          </div>
          <div class="form-group">
            <label for="yourEmail" class="col-sm-3 control-label"><?php _e( 'Your Email*', 'symnel' ); ?></label>
            <div class="col-sm-9">
                <input id="yourEmail" type="text" name="yourEmail" value="" class="form-control" autocomplete="off">
            </div>
          </div>
          <div class="form-group">
            <label for="subject" class="col-sm-3 control-label"><?php _e( 'Subject', 'symnel' ); ?></label>
            <div class="col-sm-9">
                <input id="subject" type="text" name="subject" value="" class="form-control" autocomplete="off">
            </div>
          </div>
          <div class="form-group">
            <label for="email" class="col-sm-3 control-label"><?php _e( 'Message*', 'symnel' ); ?></label>
            <div class="col-sm-9">
                <textarea id="message" name="message" class="form-control"></textarea>
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
                <?php osc_show_recaptcha(); ?>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-3 col-sm-9">
              <span class="form-small-note"><?php _e( 'Security reminder: Do not include private information (address, home phone) in this request. <strong>Never</strong> include your password.', 'symnel' ); ?></span>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-3 col-sm-9">
              <?php osc_run_hook( 'contact_form' ); ?>
              <button type="submit" class="btn btn-default"><?php _e( 'Submit', 'symnel' ); ?></button>
              <?php osc_run_hook( 'admin_contact_form' ); ?>
              <div class="form-note">
                <span><?php _e( '* required field', 'symnel' ); ?></span>
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
