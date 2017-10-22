<?php
/**
 * Symnel Front Header
 *
 * @package Osclass
 * @subpackage Symnel
 * @since Symnel 1.0
 */
?>
<!DOCTYPE html>
<html lang="<?php echo str_replace( '_', '-', osc_current_user_locale() ); ?>">
    <head>
        <?php osc_current_web_theme_path( 'common/head.php' ) ; ?>
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
<?php osc_run_hook( 'before-content' ); ?>

<div class="top-wrapper-menu">
    <div class="top-wrapper-inner-menu">
        <div class="top-menu-section container">
            <div class="row">
                <div class="top-menu col-md-10">
                    <ul class="top-category-list clearfix">
                        <li>
                            <a href="<?php echo osc_base_url(); ?>">
                                <span class="glyphicon glyphicon-home"></span> <?php _e( 'Home', 'symnel' ); ?>
                            </a>
                        </li>

                        <?php osc_goto_first_category(); while ( osc_has_categories() ) { ?>
                        <li>
                            <a class="category <?php echo osc_category_slug(); ?>" href="<?php echo osc_search_category_url(); ?>">
                                <?php echo osc_category_name(); ?>
                            </a>
                            <?php if ( osc_count_subcategories() > 0 ) { ?>
                                    <ul class="sub-menu" style="display: none;">
                                        <?php while ( osc_has_subcategories() ) { ?>
                                        <li>
                                            <a class="category <?php echo osc_category_slug() ; ?>" href="<?php echo osc_search_category_url() ; ?>"><?php echo osc_category_name() ; ?></a>
                                        </li>
                                        <?php } ?>
                                    </ul>
                            <?php } ?>
                        </li>
                        <?php } ?>
                    </ul>
                    <div id="responsive-top-menu"></div>
                </div><!-- .top-menu -->
                <div class="top-options clearfix col-md-2">
                <?php if ( osc_users_enabled() ) { ?>
                    <?php if ( osc_is_web_user_logged_in() ) { ?>
                        <ul class="menu-dropit">
                            <li>
                                <strong>
                                    <a href="#"><?php echo sprintf( __( '%s', 'symnel' ), osc_logged_user_name() ); ?> <span class="caret"></span></a>
                                </strong>
                                <ul class="sub-menu">
                                    <li><a href="<?php echo osc_user_dashboard_url(); ?>"><?php _e( 'Ad Performance', 'symnel' ); ?></a></li>
                                    <li><a href="<?php echo osc_user_public_profile_url( osc_logged_user_id() ); ?>"><?php _e( 'Public Profile', 'symnel' ); ?></a></li>
                                    <li><a href="<?php echo osc_user_list_items_url(); ?>"><?php _e( 'Manage Your Ads', 'symnel' ); ?></a></li>
                                    <li><a href="<?php echo osc_user_profile_url(); ?>"><?php _e( 'Account Settings', 'symnel' ); ?></a></li>
                                    <li><a href="<?php echo osc_user_logout_url(); ?>"><?php _e( 'LogOut', 'symnel' ); ?></a></li>
                                </ul>
                            </li>
                        </ul>
                    <?php } else { ?>
                        <ul>
                            <li><a href="<?php echo osc_user_login_url(); ?>"><?php _e( 'Login', 'symnel' ) ; ?></a></li>
                        <?php if ( osc_user_registration_enabled() ) { ?>
                            <li><strong><a href="<?php echo osc_register_account_url() ; ?>"><?php _e( 'SignUp', 'symnel' ); ?></a></strong></li>
                        <?php }; ?>
                        </ul>
                    <?php } ?>
                <?php } ?>
                </div><!-- .top-options -->
            </div>
        </div><!-- .top-menu-section -->
    </div><!-- .top-wrapper-inner -->
</div><!-- top-wrapper -->

<div class="top-wrapper-search">
    <div class="top-wrapper-inner-search">
        <div class="top-search-section container">
            <div class="row">
                <div class="logo-block clearfix col-md-2">
                    <?php echo logo_header(); ?>
                    <div class="logo-options visible-portrait clearfix">
                    <?php if ( osc_users_enabled() ) { ?>
                        <?php if ( osc_is_web_user_logged_in() ) { ?>
                            <ul class="menu-dropit">
                                <li>
                                    <strong>
                                        <a href="#"><?php echo sprintf( __( '%s', 'symnel' ), osc_logged_user_name() ); ?> <span class="caret"></span></a>
                                    </strong>
                                    <ul class="sub-menu">
                                        <li><a href="<?php echo osc_user_dashboard_url(); ?>"><?php _e( 'Ad Performance', 'symnel' ); ?></a></li>
                                        <li><a href="<?php echo osc_user_public_profile_url( osc_logged_user_id() ); ?>"><?php _e( 'Public Profile', 'symnel' ); ?></a></li>
                                        <li><a href="<?php echo osc_user_list_items_url(); ?>"><?php _e( 'Manage Your Ads', 'symnel' ); ?></a></li>
                                        <li><a href="<?php echo osc_user_profile_url(); ?>"><?php _e( 'Account Settings', 'symnel' ); ?></a></li>
                                        <li><a href="<?php echo osc_user_logout_url(); ?>"><?php _e( 'LogOut', 'symnel' ); ?></a></li>
                                    </ul>
                                </li>
                            </ul>
                        <?php } else { ?>
                            <ul>
                                <li><a href="<?php echo osc_user_login_url(); ?>"><?php _e( 'Login', 'symnel' ) ; ?></a></li>
                            <?php if ( osc_user_registration_enabled() ) { ?>
                                <li><strong><a href="<?php echo osc_register_account_url() ; ?>"><?php _e( 'SignUp', 'symnel' ); ?></a></strong></li>
                            <?php }; ?>
                            </ul>
                        <?php } ?>
                    <?php } ?>
                    </div><!-- .top-options -->
                </div>
                <div class="search-block col-md-10">
                    <?php osc_current_web_theme_path( 'search-main.php' ); ?>
                    <?php osc_current_web_theme_path( 'search-main-mobile.php' ); ?>
                </div>
            </div>
        </div><!-- .top-search-section -->
    </div><!-- .top-wrapper-inner -->
</div><!-- top-wrapper -->

<div class="content-wrapper">
    <div class="content-wrapper-inner">
        <?php osc_run_hook( 'before-main' ); ?>
