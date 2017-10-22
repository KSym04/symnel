<?php
/**
 * @package    Osclass
 * @author     DopeThemes <hello@dopethemes.com>
 * @copyright  Copyright (c) DopeThemes 2014
 * @license    http://www.dopethemes.com/license/osclass
 * @link       http://www.dopethemes.com/
 */
?>
<!DOCTYPE html>
<html dir="ltr" lang="<?php echo str_replace('_', '-', osc_current_user_locale()); ?>">
    <head>
        <?php osc_current_web_theme_path('framework/backend/common/head.php'); ?>
        <script>
            // labels
            var browseAllCategories_txt = "<?php echo osc_esc_html(__(osc_get_preference('browseAllCategories_txt', 'symnel_theme'), 'symnel')); ?>";
            var playSlideShow_txtgallery = "<?php echo osc_esc_html(__(osc_get_preference('playSlideShow_txtgallery', 'symnel_theme'), 'symnel')); ?>";
            var pauseSlideShow_txtgallery = "<?php echo osc_esc_html(__(osc_get_preference('pauseSlideShow_txtgallery', 'symnel_theme'), 'symnel')); ?>";
            var prevPhoto_txtgallery = "<?php echo osc_esc_html(__(osc_get_preference('prevPhoto_txtgallery', 'symnel_theme'), 'symnel')); ?>";
            var nextPhoto_txtgallery = "<?php echo osc_esc_html(__(osc_get_preference('nextPhoto_txtgallery', 'symnel_theme'), 'symnel')); ?>";
            var nextLink_txtgallery = "<?php echo osc_esc_html(__(osc_get_preference('nextLink_txtgallery', 'symnel_theme'), 'symnel')); ?>";
            var prevLink_txtgallery = "<?php echo osc_esc_html(__(osc_get_preference('prevLink_txtgallery', 'symnel_theme'), 'symnel')); ?>";
            var searchRequiredKeyword_txt = "<?php echo osc_esc_html(__(osc_get_preference('searchRequiredKeyword_txt', 'symnel_theme'), 'symnel')); ?>";
            var commonForm_msgrequired = "<?php echo osc_esc_html(__(osc_get_preference('commonForm_msgrequired', 'symnel_theme'), 'symnel')); ?>";
            var commonForm_msgminlength = "<?php echo osc_esc_html(__(osc_get_preference('commonForm_msgminlength', 'symnel_theme'), 'symnel')); ?>";
            var commonForm_emailrequired = "<?php echo osc_esc_html(__(osc_get_preference('commonForm_emailrequired', 'symnel_theme'), 'symnel')); ?>";
            var commonForm_emailvalid = "<?php echo osc_esc_html(__(osc_get_preference('commonForm_emailvalid', 'symnel_theme'), 'symnel')); ?>";
            var commonForm_namerequired = "<?php echo osc_esc_html(__(osc_get_preference('commonForm_namerequired', 'symnel_theme'), 'symnel')); ?>";
            var commonForm_namelettersonly = "<?php echo osc_esc_html(__(osc_get_preference('commonForm_namelettersonly', 'symnel_theme'), 'symnel')); ?>";
            var commonForm_setpassword = "<?php echo osc_esc_html(__(osc_get_preference('commonForm_setpassword', 'symnel_theme'), 'symnel')); ?>";
            var commonForm_setpassword2required = "<?php echo osc_esc_html(__(osc_get_preference('commonForm_setpassword2required', 'symnel_theme'), 'symnel')); ?>";
            var commonForm_setpassword2equalto = "<?php echo osc_esc_html(__(osc_get_preference('commonForm_setpassword2equalto', 'symnel_theme'), 'symnel')); ?>";
            var commonForm_loginregisteredemail = "<?php echo osc_esc_html(__(osc_get_preference('commonForm_loginregisteredemail', 'symnel_theme'), 'symnel')); ?>";
            var commonForm_loginvalidemail = "<?php echo osc_esc_html(__(osc_get_preference('commonForm_loginvalidemail', 'symnel_theme'), 'symnel')); ?>";
            var commonForm_passwordrequired = "<?php echo osc_esc_html(__(osc_get_preference('commonForm_passwordrequired', 'symnel_theme'), 'symnel')); ?>";
            var commonForm_passwordnew = "<?php echo osc_esc_html(__(osc_get_preference('commonForm_passwordnew', 'symnel_theme'), 'symnel')); ?>";
            var commonForm_passwordnew2required = "<?php echo osc_esc_html(__(osc_get_preference('commonForm_passwordnew2required', 'symnel_theme'), 'symnel')); ?>";
            var commonForm_passwordnew2equalto = "<?php echo osc_esc_html(__(osc_get_preference('commonForm_passwordnew2equalto', 'symnel_theme'), 'symnel')); ?>";
            var commonForm_categoryrequired = "<?php echo osc_esc_html(__(osc_get_preference('commonForm_categoryrequired', 'symnel_theme'), 'symnel')); ?>";
            var commonForm_pricerequired = "<?php echo osc_esc_html(__(osc_get_preference('commonForm_pricerequired', 'symnel_theme'), 'symnel')); ?>";
            var commonForm_pricepriceonly = "<?php echo osc_esc_html(__(osc_get_preference('commonForm_pricepriceonly', 'symnel_theme'), 'symnel')); ?>";
            var reportForm_issue = "<?php echo osc_esc_html(__(osc_get_preference('reportForm_issue', 'symnel_theme'), 'symnel')); ?>";
            var commentForm_bodyrequired = "<?php echo osc_esc_html(__(osc_get_preference('commentForm_bodyrequired', 'symnel_theme'), 'symnel')); ?>";
        </script>
    </head>
<body <?php dtf_body_class(); ?>>
<?php osc_run_hook('before-content'); ?>
