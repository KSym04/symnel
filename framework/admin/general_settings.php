<?php
/**
 *
 *
 * @package    Osclass
 * @author     DopeThemes <hello@dopethemes.com>
 * @copyright  Copyright (c) DopeThemes 2014
 * @license    http://www.dopethemes.com/license/osclass
 * @link       http://www.dopethemes.com/
 */
?>

<?php if ( ( !defined( 'ABS_PATH' ) ) ) exit( 'ABS_PATH is not loaded. Direct access is not allowed.' ); ?>
<?php if ( !OC_ADMIN ) exit( 'User access is not allowed.' ); ?>
<style type="text/css" media="screen">
.admin-form-wrapper {
    width: 900px;
    position: relative;
}

.admin-form-inner {
    overflow: hidden;
}

.admin-form-left {
    float: left;
    display: inline-block;
    width: 550px;
}

.admin-form-right {
    position: absolute;
    right: 0;
    top: 0;
    width: 300px;
    display: inline-block;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
    padding: 0 10px 10px 18px;
    border: 1px solid #F9E98E;
    background-color: #FBF7AA;
    border-radius: 3px;
}

.donation-text {
    color: #a2844a;
    font-size: 13px;
}

.donation-text strong {
    display: block;
    margin-top: 20px;
}
</style>
<h2 class="render-title"><?php _e( 'General Settings', 'symnel' ); ?></h2>
<div class="admin-form-wrapper clearfix">
    <div class="admin-form-inner clearfix">

        <div class="admin-form-left">
            <form action="<?php echo osc_admin_render_theme_url('oc-content/themes/symnel/framework/admin/general_settings.php'); ?>" method="post" class="nocsrf">
                <input type="hidden" name="action_specific" value="settings" />
                <fieldset>
                    <div class="form-horizontal">
                        <div class="form-row">
                            <div class="form-label"><?php _e('Search placeholder', 'symnel'); ?></div>
                            <div class="form-controls"><input type="text" class="xlarge" name="keyword_placeholder" value="<?php echo osc_esc_html( osc_get_preference('keyword_placeholder', 'symnel_theme') ); ?>"></div>
                        </div>
                        <div class="form-row">
                            <div class="form-label"><?php _e('Terms URL', 'symnel'); ?></div>
                            <div class="form-controls"><input type="text" class="xlarge" name="terms_url" value="<?php echo osc_esc_html( osc_get_preference('terms_url', 'symnel_theme') ); ?>"></div>
                        </div>
                        <div class="form-row">
                            <div class="form-label"><?php _e('Privacy URL', 'symnel'); ?></div>
                            <div class="form-controls"><input type="text" class="xlarge" name="privacy_url" value="<?php echo osc_esc_html( osc_get_preference('privacy_url', 'symnel_theme') ); ?>"></div>
                        </div>
                        <div class="form-actions">
                            <input type="submit" value="<?php _e('Save changes', 'symnel'); ?>" class="btn btn-submit">
                        </div>
                    </div>
                </fieldset>
            </form>

        </div><!-- .admin-form-inner -->

    </div><!-- .admin-form-inner -->

            <div class="admin-form-right">
                <p class="donation-text">
                    <?php _e( 'If you found this theme useful, please donate any amount is appreciated and it would help making this theme even better and smarter. <strong>Thank you in advance for your generosity.</strong>', 'symnel' ); ?>
                </p>
                <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=VKTFEV75UBCTJ" target="_blank">
                    <img src="https://www.paypal.com/en_US/i/btn/x-click-but04.gif" />
                </a>
            </div>

</div><!-- .admin-form-wrapper -->
