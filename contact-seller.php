<?php
/**
 * Symnel Contact Seller
 *
 * @package Osclass
 * @subpackage Symnel
 * @since Symnel 1.0
 */

if ( osc_item_user_id() != null ) {
    $seller_name = '<a href="'.osc_user_public_profile_url( osc_item_user_id() ).'" title="'.osc_item_contact_name().'">'.osc_item_contact_name().'</a>';
} else {
    $seller_name = __( 'Seller', 'symnel' );
} ?>

<div class="contact-seller">
  <div id="contact" class="form-container form-vertical">
        <div id="contact" class="widget-box form-container form-vertical">
            <?php if ( osc_item_is_expired () ) { ?>
                <p class="alert alert-warning">
                    <?php _e( "The listing is expired. You can't contact the seller.", 'symnel' ); ?>
                </p>
            <?php } else if ( ( osc_logged_user_id() == osc_item_user_id() ) && osc_logged_user_id() != 0 ) { ?>
                <p class="alert alert-warning">
                    <?php _e( "It's your own listing, you can't use this contact form.", 'symnel' ); ?>
                </p>
            <?php } else if ( osc_reg_user_can_contact() && !osc_is_web_user_logged_in() ) { ?>
                <p class="alert alert-warning">
                    <?php _e( "You must log in or register a new account in order to contact the advertiser", 'symnel' ); ?>
                    <a href="<?php echo osc_user_login_url(); ?>" class="btn btn-default"><?php _e( 'Login', 'symnel' ); ?></a>
                    <a href="<?php echo osc_register_account_url(); ?>" class="btn btn-danger"><?php _e( 'SignUp', 'symnel' ); ?></a>
                </p>
            <?php } else { ?>
                <h4><?php _e( "Contact {$seller_name} <small>via Email</small>", 'symnel' ); ?></h4>
                <form action="<?php echo osc_base_url( true ); ?>" class="form-vertical" method="post" name="contact_form2" id="contact_form2" <?php if ( osc_item_attachment() ) { echo 'enctype="multipart/form-data"'; };?> >
                    <?php osc_prepare_user_info(); ?>
                    <input type="hidden" name="action" value="contact_post" />
                    <input type="hidden" name="page" value="item" />
                    <input type="hidden" name="id" value="<?php echo osc_item_id(); ?>" />
                    <div class="form-group">
                        <input id="yourName" type="text" name="yourName" value="" class="form-control" placeholder="Your Name*">
                    </div>
                    <div class="form-group">
                        <input id="yourEmail" type="text" name="yourEmail" value="" class="form-control" placeholder="Your Email*">
                    </div>
                    <div class="form-group">
                        <input id="phoneNumber" type="text" name="phoneNumber" value="" class="form-control" placeholder="Phone Number">
                    </div>
                    <div class="form-group">
                        <textarea id="message" name="message" placeholder="Message*" class="form-control"></textarea>
                    </div>

                    <?php if ( osc_item_attachment() ) { ?>
                        <div class="form-group">
                            <label class="form-label" for="attachment"><?php _e( 'Attachment', 'symnel' ); ?>:</label>
                            <div class="form-controls"><?php ContactForm::your_attachment(); ?></div>
                        </div>
                    <?php }; ?>

                    <div class="form-group">
                        <div class="form-controls">
                            <?php if ( osc_recaptcha_public_key() ) { ?>
                            <script type="text/javascript">
                                var RecaptchaOptions = {
                                    theme : 'custom',
                                    custom_theme_widget: 'recaptcha_widget'
                                };
                            </script>
                            <style type="text/css">
                                div#recaptcha_widget { margin: 0 0 15px; }
                                div#recaptcha_widget a { float: right; margin-top: 5px; }
                                div#recaptcha_widget, div#recaptcha_image > img { width: 100%; }
                                div#recaptcha_image > img { border: 1px solid #e5e5e5;  border-radius: 4px; }
                                div#recaptcha_image { width: 100% !important; }
                                .recaptcha_only_if_image { display: block; margin: 10px 0 5px; font-size: 11px; color: #777777;}
                            </style>
                            <div id="recaptcha_widget">
                                <div id="recaptcha_image"><img /></div>
                                <span class="recaptcha_only_if_image"><?php _e( 'Enter the words above', 'symnel' ); ?>:</span>
                                <input type="text" class="form-control input-sm" id="recaptcha_response_field" name="recaptcha_response_field" />
                                <a href="javascript:Recaptcha.showhelp()"><?php _e( 'Help', 'symnel' ); ?></a>
                            </div>
                            <?php } ?>
                            <?php osc_show_recaptcha(); ?>
                            <?php osc_run_hook( 'item_contact_form', osc_item_id() ); ?>
                            <button type="submit" class="btn btn-default"><?php _e( "Send", 'symnel' );?></button>
                        </div>
                    </div>
                </form>
            <?php } ?>
        </div>

  </div>
</div>
