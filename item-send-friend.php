<?php
/**
 * Symnel Send to a friend
 *
 * @package Osclass
 * @subpackage Symnel
 * @since Symnel 1.0
 */
// meta tag robots
osc_add_hook( 'header', 'dtf_follow_construct' );

// add login class on body tag
dtf_add_body_class( 'send-to-a-friend' );

osc_add_filter( 'meta_title_filter', 'custom_meta_title' );
function custom_meta_title( $data ) {
  return __( osc_item_title() . ' ' . osc_item_city() . ' / Send to a friend - ' . osc_page_title(), 'symnel' );
}

// call header
osc_current_web_theme_path( 'header.php' ); ?>

<div class="container">
  <div class="row">

    <div class="form-block col-md-9">
        <?php echo dtf_get_breadcrumb(); ?>
        <form class="symnel-form form-horizontal" action="<?php echo osc_base_url( true ); ?>" name="sendfriend" method="post" role="form">
          <input type="hidden" name="action" value="send_friend_post" />
          <input type="hidden" name="page" value="item" />
          <input type="hidden" name="id" value="<?php echo osc_item_id(); ?>" />
          <h1><?php _e( 'Send to a friend', 'symnel' ); ?></h1>
          <?php if ( osc_is_web_user_logged_in() ) { ?>
                <input type="hidden" name="yourName" value="<?php echo osc_esc_html( osc_logged_user_name() ); ?>" />
                <input type="hidden" name="yourEmail" value="<?php echo osc_logged_user_email();?>" />
          <?php } else { ?>
          <div class="form-group">
            <label for="yourName" class="col-sm-3 control-label"><?php _e( 'Your name*', 'symnel' ); ?></label>
            <div class="col-sm-9">
                <input id="yourName" type="text" name="yourName" value="" class="form-control" autocomplete="off">
            </div>
          </div>
          <div class="form-group">
            <label for="yourEmail" class="col-sm-3 control-label"><?php _e( 'Your email*', 'symnel' ); ?></label>
            <div class="col-sm-9">
                <input id="yourEmail" type="text" name="yourEmail" value="" class="form-control" autocomplete="off">
            </div>
          </div>
          <?php } ?>
          <div class="form-group">
            <label for="friendName" class="col-sm-3 control-label"><?php _e( "Your friend's name*", 'symnel' ); ?></label>
            <div class="col-sm-9">
                <input id="friendName" type="text" name="friendName" value="" class="form-control" autocomplete="off">
            </div>
          </div>
          <div class="form-group">
            <label for="friendEmail" class="col-sm-3 control-label"><?php _e( "Your friend's email*", 'symnel' ); ?></label>
            <div class="col-sm-9">
                <input id="friendEmail" type="text" name="friendEmail" value="" value="" class="form-control" autocomplete="off">
            </div>
          </div>
          <div class="form-group">
            <label for="subject" class="col-sm-3 control-label"><?php _e( 'Subject (optional)', 'symnel' ); ?></label>
            <div class="col-sm-9">
                <input id="subject" type="text" name="subject" value="" class="form-control" autocomplete="off">
            </div>
          </div>
          <div class="form-group">
            <label for="message" class="col-sm-3 control-label"><?php _e( 'Message*', 'symnel' ); ?></label>
            <div class="col-sm-9">
                <textarea id="message" name="message" class="form-control"></textarea>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-3 col-sm-9">
              <?php dtf_show_flash_message( 'pubMessages', 'alert alert-dismissable alert-danger', 'dope-backend-alert' ); ?>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-3 col-sm-9">
              <button type="submit" class="btn btn-default"><?php _e( 'Send', 'symnel' ); ?></button>
              <div class="form-note">
                <div><?php _e( '* required field', 'symnel' ); ?></div>
                <a href="<?php echo osc_item_url(); ?>"><?php _e( '&laquo; Back to item', 'symnel' ); ?></a>
              </div>
            </div>
          </div>
        </form>
    </div><!-- .form-block -->

    <?php osc_current_web_theme_path( 'side-widgets.php' ); ?>

  </div>
</div>

<?php osc_current_web_theme_path( 'footer.php' ); ?>
