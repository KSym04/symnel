<?php
/**
 * Symnel Alert Form
 *
 * @package Osclass
 * @subpackage Symnel
 * @since Symnel 1.0
 */
?>

<script type="text/javascript">
jQuery(document).ready(function(){
    var alertForm = jQuery( "#sub_alert" );
    // Validation (Alert)
    alertForm.validate({
      rules: {
        alert_email: {
          required: true,
          email: true
        }
      },
      messages: {
        alert_email: {
          required: commonForm_emailrequired,
          email: commonForm_emailvalid
        }
      }
    });
    jQuery(".sub_button").click(function(){
        if( alertForm.valid() ) {
            jQuery.post('<?php echo osc_base_url( true ); ?>', {email:jQuery("#alert_email").val(), userid:jQuery("#alert_userId").val(), alert:jQuery("#alert").val(), page:"ajax", action:"alerts"},
                function(data){
                    if(data==1) { alert('<?php echo osc_esc_js( __( 'You have sucessfully subscribed to the alert', 'symnel' ) ); ?>'); }
                    else if(data==-1) { alert('<?php echo osc_esc_js( __( 'Invalid email address', 'symnel' ) ); ?>'); }
                    else { alert('<?php echo osc_esc_js( __( 'There was a problem with the alert', 'symnel' ) ); ?>'); };
                });
            return false;
        }
    });
});
</script>

<div class="alert_form alert alert-info">
    <h4><?php _e( 'Get an alert to this search', 'symnel' ); ?></h4>
    <form action="<?php echo osc_base_url( true ); ?>" method="post" name="sub_alert" id="sub_alert" class="nocsrf">
            <?php AlertForm::page_hidden(); ?>
            <?php AlertForm::alert_hidden(); ?>

            <?php if ( osc_is_web_user_logged_in() ) { ?>
                <?php AlertForm::user_id_hidden(); ?>
                <?php AlertForm::email_hidden(); ?>

            <?php } else { ?>
                <?php AlertForm::user_id_hidden(); ?>
                <input id="alert_email" type="text" name="alert_email" value="" class="input-sm" placeholder="Enter your email">

            <?php }; ?>
            <button type="submit" class="sub_button btn btn-danger btn-xs btn-block" ><?php _e( 'Subscribe now', 'symnel' ); ?>!</button>
    </form>
</div>
