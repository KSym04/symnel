<?php
/**
 * Symnel Main Functions
 *
 * @package Osclass
 * @subpackage Symnel
 * @since Symnel 1.0
 */

define( 'THEME_ENV', false );

/**
 * INCLUDES
 */
// Add DopeFramework
require 'framework/init.php';

// Install Settings and Admin Settings
define( 'SYMNEL_THEME_VERSION', '1.0.5' );
if ( !osc_get_preference( 'keyword_placeholder', 'symnel_theme' ) ) {
    osc_set_preference( 'keyword_placeholder', __( 'What are you looking for?', 'symnel' ), 'symnel_theme' );
}

if ( !osc_get_preference( 'browseAllCategories_txt', 'symnel_theme' ) ) {
    // Labels
    osc_set_preference( 'browseAllCategories_txt', __( '(Browse All Categories) Go to...', 'symnel' ), 'symnel_theme' );
    osc_set_preference( 'playSlideShow_txtgallery', __( 'Play Slideshow', 'symnel' ), 'symnel_theme' );
    osc_set_preference( 'pauseSlideShow_txtgallery', __( 'Pause Slideshow', 'symnel' ), 'symnel_theme' );
    osc_set_preference( 'prevPhoto_txtgallery', __( '&lsaquo; Prev Photo', 'symnel' ), 'symnel_theme' );
    osc_set_preference( 'nextPhoto_txtgallery', __( 'Next Photo &rsaquo;', 'symnel' ), 'symnel_theme' );
    osc_set_preference( 'nextLink_txtgallery', __( 'Next &rsaquo;', 'symnel' ), 'symnel_theme' );
    osc_set_preference( 'prevLink_txtgallery', __( '&lsaquo; Prev', 'symnel' ), 'symnel_theme' );
    osc_set_preference( 'searchRequiredKeyword_txt', __( 'Please type a keyword', 'symnel' ), 'symnel_theme' );
    osc_set_preference( 'commonForm_msgrequired', __( 'Ooops, what is your message?', 'symnel' ), 'symnel_theme' );
    osc_set_preference( 'commonForm_msgminlength', __( 'Oh, that is too short!', 'symnel' ), 'symnel_theme' );
    osc_set_preference( 'commonForm_emailrequired', __( 'Email is required', 'symnel' ), 'symnel_theme' );
    osc_set_preference( 'commonForm_emailvalid', __( 'Please enter a valid email', 'symnel' ), 'symnel_theme' );
    osc_set_preference( 'commonForm_namerequired', __( 'Please enter your name', 'symnel' ), 'symnel_theme' );
    osc_set_preference( 'commonForm_namelettersonly', __( 'No numbers or special symbols', 'symnel' ), 'symnel_theme' );
    osc_set_preference( 'commonForm_setpassword', __( 'Please set your password', 'symnel' ), 'symnel_theme' );
    osc_set_preference( 'commonForm_setpassword2required', __( 'Please confirm your password', 'symnel' ), 'symnel_theme' );
    osc_set_preference( 'commonForm_setpassword2equalto', __( 'Please match with your password', 'symnel' ), 'symnel_theme' );
    osc_set_preference( 'commonForm_loginregisteredemail', __( 'Please enter your registered email', 'symnel' ), 'symnel_theme' );
    osc_set_preference( 'commonForm_loginvalidemail', __( 'Please enter your valid registered email', 'symnel' ), 'symnel_theme' );
    osc_set_preference( 'commonForm_passwordrequired', __( 'Please enter your password', 'symnel' ), 'symnel_theme' );
    osc_set_preference( 'commonForm_passwordnew', __( 'Please enter your new password', 'symnel' ), 'symnel_theme' );
    osc_set_preference( 'commonForm_passwordnew2required', __( 'Please confirm your new password', 'symnel' ), 'symnel_theme' );
    osc_set_preference( 'commonForm_passwordnew2equalto', __( 'Please match with your new password', 'symnel' ), 'symnel_theme' );
    osc_set_preference( 'commonForm_categoryrequired', __( 'Please choose category', 'symnel' ), 'symnel_theme' );
    osc_set_preference( 'commonForm_pricerequired', __( 'Please specify item price', 'symnel' ), 'symnel_theme' );
    osc_set_preference( 'commonForm_pricepriceonly', __( 'Only number is accepted', 'symnel' ), 'symnel_theme' );
    osc_set_preference( 'reportForm_issue', __( 'Please select an issue type', 'symnel' ), 'symnel_theme' );
    osc_set_preference( 'commentForm_bodyrequired', __( 'Ooops, please write a comment', 'symnel' ), 'symnel_theme' );
}

function symnel_theme_install() {
    osc_set_preference( 'keyword_placeholder', Params::getParam( 'keyword_placeholder' ), 'symnel_theme' );
    osc_set_preference( 'terms_url', Params::getParam( 'terms_url' ), 'symnel_theme' );
    osc_set_preference( 'privacy_url', Params::getParam( 'privacy_url' ), 'symnel_theme' );
    osc_set_preference( 'version', SYMNEL_THEME_VERSION, 'symnel_theme' );
    osc_set_preference( 'browseAllCategories_txt', __( '(Browse All Categories) Go to...', 'symnel' ), 'symnel_theme' );
    osc_set_preference( 'playSlideShow_txtgallery', __( 'Play Slideshow', 'symnel' ), 'symnel_theme' );
    osc_set_preference( 'pauseSlideShow_txtgallery', __( 'Pause Slideshow', 'symnel' ), 'symnel_theme' );
    osc_set_preference( 'prevPhoto_txtgallery', __( '&lsaquo; Prev Photo', 'symnel' ), 'symnel_theme' );
    osc_set_preference( 'nextPhoto_txtgallery', __( 'Next Photo &rsaquo;', 'symnel' ), 'symnel_theme' );
    osc_set_preference( 'nextLink_txtgallery', __( 'Next &rsaquo;', 'symnel' ), 'symnel_theme' );
    osc_set_preference( 'prevLink_txtgallery', __( '&lsaquo; Prev', 'symnel' ), 'symnel_theme' );
    osc_set_preference( 'searchRequiredKeyword_txt', __( 'Please type a keyword', 'symnel' ), 'symnel_theme' );
    osc_set_preference( 'commonForm_msgrequired', __( 'Ooops, what is your message?', 'symnel' ), 'symnel_theme' );
    osc_set_preference( 'commonForm_msgminlength', __( 'Oh, that is too short!', 'symnel' ), 'symnel_theme' );
    osc_set_preference( 'commonForm_emailrequired', __( 'Email is required', 'symnel' ), 'symnel_theme' );
    osc_set_preference( 'commonForm_emailvalid', __( 'Please enter a valid email', 'symnel' ), 'symnel_theme' );
    osc_set_preference( 'commonForm_namerequired', __( 'Please enter your name', 'symnel' ), 'symnel_theme' );
    osc_set_preference( 'commonForm_namelettersonly', __( 'No numbers or special symbols', 'symnel' ), 'symnel_theme' );
    osc_set_preference( 'commonForm_setpassword', __( 'Please set your password', 'symnel' ), 'symnel_theme' );
    osc_set_preference( 'commonForm_setpassword2required', __( 'Please confirm your password', 'symnel' ), 'symnel_theme' );
    osc_set_preference( 'commonForm_setpassword2equalto', __( 'Please match with your password', 'symnel' ), 'symnel_theme' );
    osc_set_preference( 'commonForm_loginregisteredemail', __( 'Please enter your registered email', 'symnel' ), 'symnel_theme' );
    osc_set_preference( 'commonForm_loginvalidemail', __( 'Please enter your valid registered email', 'symnel' ), 'symnel_theme' );
    osc_set_preference( 'commonForm_passwordrequired', __( 'Please enter your password', 'symnel' ), 'symnel_theme' );
    osc_set_preference( 'commonForm_passwordnew', __( 'Please enter your new password', 'symnel' ), 'symnel_theme' );
    osc_set_preference( 'commonForm_passwordnew2required', __( 'Please confirm your new password', 'symnel' ), 'symnel_theme' );
    osc_set_preference( 'commonForm_passwordnew2equalto', __( 'Please match with your new password', 'symnel' ), 'symnel_theme' );
    osc_set_preference( 'commonForm_categoryrequired', __( 'Please choose category', 'symnel' ), 'symnel_theme' );
    osc_set_preference( 'commonForm_pricerequired', __( 'Please specify item price', 'symnel' ), 'symnel_theme' );
    osc_set_preference( 'commonForm_pricepriceonly', __( 'Only number is accepted', 'symnel' ), 'symnel_theme' );
    osc_set_preference( 'reportForm_issue', __( 'Please select an issue type', 'symnel' ), 'symnel_theme' );
    osc_set_preference( 'commentForm_bodyrequired', __( 'Ooops, please write a comment', 'symnel' ), 'symnel_theme' );
    osc_reset_preferences();
}

function symnel_theme_update() {
    osc_reset_preferences();
}

function symnel_theme_check_install() {
    $current_version = osc_get_preference( 'version', 'symnel_theme' );
    if ( !$current_version ) {
        symnel_theme_install();
    } else if ( $current_version < SYMNEL_THEME_VERSION ) {
        symnel_theme_update();
    }
}

function symnel_theme_actions_admin() {
    switch ( Params::getParam( 'action_specific' ) ) {
    case( 'settings' ):
        osc_set_preference( 'keyword_placeholder', Params::getParam( 'keyword_placeholder' ), 'symnel_theme' );
        osc_set_preference( 'terms_url', Params::getParam( 'terms_url' ), 'symnel_theme' );
        osc_set_preference( 'privacy_url', Params::getParam( 'privacy_url' ), 'symnel_theme' );
        osc_add_flash_ok_message( __( 'Settings saved correctly.', 'symnel' ), 'admin' );
        osc_redirect_to( osc_admin_render_theme_url( 'oc-content/themes/symnel/framework/admin/general_settings.php' ) );
        break;
    }
}

/**
 * FUNCTIONS
 */
if ( !function_exists( 'dtf_draw_item' ) ) {
    function dtf_draw_item( $class = false, $admin = false, $premium = false ) {
        $filename = 'loop-single';
        if ( $premium ) {
            $filename .='-premium';
        }
        require WebThemes::newInstance()->getCurrentThemePath().$filename.'.php';
    }
}

if ( !function_exists( 'get_backend_sidebar_menu' ) ) {
    function get_backend_sidebar_menu() {
        $options   = array();
        $options[] = array(
            'name'  => __( 'Ad Performance', 'symnel' ),
            'url'   => osc_user_dashboard_url(),
            'icon'  => 'fa fa-dashboard',
            'id'    => 'dashboard',
            'class' => 'opt_dashboard'
        );
        $options[] = array(
            'name'  => __( 'All Listings', 'symnel' ),
            'url'   => osc_user_list_items_url(),
            'icon'  => 'fa fa-list',
            'id'    => 'items',
            'class' => 'opt_items'
        );
        $options[] = array(
            'name'  => __( 'Alerts', 'symnel' ),
            'url'   => osc_user_alerts_url(),
            'icon'  => 'fa fa-bell',
            'id'    => 'alerts',
            'class' => 'opt_alerts'
        );
        $options[] = array(
            'name'  => __( 'Post New Ads', 'symnel' ),
            'url'   => osc_item_post_url_in_category(),
            'icon'  => 'fa fa-plus',
            'id'    => 'item_add',
            'class' => 'opt_post_new_ads'
        );
        $options[] = array(
            'name'  => __( 'Account Settings', 'symnel' ),
            'url'   => osc_user_profile_url(),
            'icon'  => 'fa fa-gear',
            'id'    => 'profile',
            'class' => 'opt_profile'
        );
        $options[] = array(
            'name'  => __( 'Change Email', 'symnel' ),
            'url'   => osc_change_user_email_url(),
            'icon'  => 'fa entypo icon-mail',
            'id'    => 'change_email',
            'class' => 'opt_change_email'
        );
        $options[] = array(
            'name'  => __( 'Change Username', 'symnel' ),
            'url'   => osc_change_user_username_url(),
            'icon'  => 'fa entypo icon-vcard',
            'id'    => 'change_username',
            'class' => 'opt_change_username'
        );
        $options[] = array(
            'name'  => __( 'Change Password', 'symnel' ),
            'url'   => osc_change_user_password_url(),
            'icon'  => 'fa fa-lock',
            'id'    => 'change_password',
            'class' => 'opt_change_password'
        );

        return $options;
    }
}

/**
 * Get user all ads depend on status
 *
 * @return [int] - Total number of ads base on status
 */
function symnel_get_all_total_user_ads_status( $user_id = 0, $status = '', $special_condition = '' ) {
    return Item::newInstance()->findItemTypesByUserID( $user_id , 0, null, $status );
}

/**
 * Get user total active ad views
 *
 * @return [int] - Total number of views
 */
function symnel_get_all_total_ad_view_status( $user_id = 0, $status = '', $special_condition = '' ) {
    $view = array();
    $items = Item::newInstance()->findItemTypesByUserID( $user_id , 0, null, $status );
    if ( empty( $items ) ) {
        return '0';
    }

    foreach ( $items as $i ) {
        $views[] = $i['i_num_views'];
    }
    return array_sum( $views );
}

/**
 * Insert sponsored ads
 */
function symnel_draw_sponsored() { ?>
    <?php osc_run_hook( 'insert-after-two-result' ); ?>
<?php
}

/* logo header */
if ( !function_exists( 'logo_header' ) ) {
    function logo_header() {
        return '<a href="'.osc_base_url().'"><img src="'.osc_current_web_theme_url( 'assets/img/logo.png' ).'" alt="'.osc_page_title().'" /></a>';
    }
}
/* logo header */

/* search header */
if ( !function_exists( 'search_header' ) ) {
    function search_header() {
        return $html;
    }
}
/* search header */

/* draw front loop */
if ( !function_exists( 'symnel_draw_item' ) ) {
    function symnel_draw_item( $class = false, $admin = false, $premium = false ) {
        $filename = 'front-loop-single';
        if ( $premium ) {
            $filename .='-premium';
        }
        require WebThemes::newInstance()->getCurrentThemePath().$filename.'.php';
    }
}
/* draw front loop */

// Hooks
osc_add_hook( 'init_admin', 'symnel_theme_actions_admin' );
