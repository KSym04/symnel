<?php
/**
 * Symnel Side Widgets Public Profile
 *
 * @package Osclass
 * @subpackage Symnel
 * @since Symnel 1.0
 */
?>
    <?php osc_run_hook( 'before-side-widgets-public-profile' ); ?>

    <div class="widgets-block col-md-3">
        <?php osc_run_hook( 'before-inner-side-widgets-public-profile' ); ?>
            <?php if ( osc_logged_user_id() !=  osc_user_id() ) { ?>
            <?php   if ( osc_reg_user_can_contact() && osc_is_web_user_logged_in() || !osc_reg_user_can_contact() ) { ?>
                <div id="contact" class="widget-box form-container">
                        <form class="contact-seller contact-seller-nomargin form-vertical" action="<?php echo osc_base_url( true ); ?>" method="post" name="contact_form" id="contact_form">
                            <input type="hidden" name="action" value="contact_post" />
                            <input type="hidden" name="page" value="user" />
                            <input type="hidden" name="id" value="<?php echo osc_user_id();?>" />
                            <h4><?php _e( "Contact Seller <small>via Email</small>", 'symnel' ); ?></h4>
                            <div class="form-group">
                                <input id="yourName" type="text" name="yourName" value="" class="form-control" placeholder="<?php _e( 'Your Name*', 'symnel' ); ?>">
                            </div>
                            <div class="form-group">
                                <input id="yourEmail" type="text" name="yourEmail" value="" class="form-control" placeholder="<?php _e( 'Your Email*', 'symnel' ); ?>">
                            </div>
                            <div class="form-group">
                                <input id="phoneNumber" type="text" name="phoneNumber" value="" class="form-control" placeholder="<?php _e( 'Phone Number', 'symnel' ); ?>">
                            </div>
                            <div class="form-group">
                                <textarea id="message" name="message" class="form-control" placeholder="<?php _e( 'Message*', 'symnel' ); ?>"></textarea>
                            </div>
                            <div class="form-group">
                                    <?php osc_run_hook( 'item_contact_form', osc_item_id() ); ?>
                                    <?php if ( osc_recaptcha_public_key() ) { ?>
                                    <script type="text/javascript">
                                      var RecaptchaOptions = {
                                          theme : 'custom',
                                          custom_theme_widget: 'recaptcha_widget'
                                      };
                                    </script>
                                    <style type="text/css">
                                      div#recaptcha_widget { margin: 10px 0 15px; }
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
                                    <button type="submit" class="btn btn-default btn-sm"><?php _e( "Send", 'symnel' );?></button>
                            </div>
                        </form>
                </div>
            <?php
                    }
                  }
            ?>

              <div class="publish-ads-block clearfix">
                <?php if ( osc_users_enabled() || ( !osc_users_enabled() && !osc_reg_user_post() ) ) { ?>
                  <a href="<?php echo osc_item_post_url_in_category() ; ?>" class="btn btn-info btn-lg btn-block">
                    <span class="glyphicon glyphicon-plus"></span> <?php _e( 'Post a Free Ad', 'symnel' ); ?>
                    </a>
                <?php } ?>
              </div>

              <?php if ( dtf_display_latest_searches( 10 ) != '' ) { ?>
              <div class="popular-search-sidebar-section clearfix">
                <?php echo  dtf_display_latest_searches( 10 ); ?>
              </div>
              <?php } ?>
        <?php osc_run_hook( 'after-inner-side-widgets-public-profile' ); ?>
    </div>

    <?php osc_run_hook( 'after-side-widgets-public-profile' ); ?>
