<?php
/**
 * DopeFramework Breadbrumbs
 *
 * @package    Osclass
 * @author     DopeThemes <hello@dopethemes.com>
 * @copyright  Copyright (c) DopeThemes 2014
 * @license    http://www.dopethemes.com/license/osclass
 * @link       http://www.dopethemes.com/
 */

/**
 * Get language settings of breadcrumbs
 *
 * @return array
 */
function dtf_get_breadcrumb_lang() {
    $lang = array();
    $lang['item_add']               = __( 'Post Ad', 'symnel' );
    $lang['item_edit']              = __( 'Edit Ad', 'symnel' );
    $lang['item_send_friend']       = __( 'Send to a friend', 'symnel' );
    $lang['item_contact']           = __( 'Contact seller', 'symnel' );
    $lang['search']                 = __( 'Search results', 'symnel' );
    $lang['search_pattern']         = __( 'Search results: %s', 'symnel' );
    $lang['user_dashboard']         = __( 'Ad Performance', 'symnel' );
    $lang['user_dashboard_profile'] = __( "%s's profile", 'symnel' );
    $lang['user_account']           = __( 'Account', 'symnel' );
    $lang['user_items']             = __( 'Listings', 'symnel' );
    $lang['user_alerts']            = __( 'Alerts', 'symnel' );
    $lang['user_profile']           = __( 'Update account', 'symnel' );
    $lang['user_change_email']      = __( 'Change email', 'symnel' );
    $lang['user_change_username']   = __( 'Change username', 'symnel' );
    $lang['user_change_password']   = __( 'Change password', 'symnel' );
    $lang['login']                  = __( 'Login', 'symnel' );
    $lang['login_recover']          = __( 'Recover password', 'symnel' );
    $lang['login_forgot']           = __( 'Change password', 'symnel' );
    $lang['register']               = __( 'SignUp', 'symnel' );
    $lang['contact']                = __( 'Contact', 'symnel' );
    return $lang;
}

/**
 * Breadcrumb separator
 */
function dtf_get_breadcrumb( $separator = '' ) {
    $breadcrumb = osc_breadcrumb( $separator, false, dtf_get_breadcrumb_lang() );
    if ( !empty( $breadcrumb ) )
        return $breadcrumb;
}

/**
 * Breadcrumb category url
 */
function dtf_breadcrumbs_category_url( $category_id ) {
    $path = '' ;
    if ( osc_rewrite_enabled() ) {
        if ( $category_id != '' ) {
            $category = Category::newInstance()->hierarchy( $category_id ) ;
            $sanitized_category = "" ;
            for ( $i = count( $category ); $i > 0; $i-- ) {
                $sanitized_category .= $category[$i - 1]['s_slug'] . '/' ;
            }
            $path = osc_base_url() . $sanitized_category ;
        }
    } else {
        $path = sprintf( osc_base_url( true ) . '?page=search&sCategory=%d', $category_id ) ;
    }
    return rtrim( $path, "/" );
}

/**
 * Remove domain http
 */
function dtf_remove_domain_http( $domain ) {
    $bits = explode( '/', $domain );
    if ( $bits[0]=='http:' || $bits[0]=='https:' ) {
        return $bits[2];
    } else {
        return $bits[0];
    }
    unset( $bits );
}
