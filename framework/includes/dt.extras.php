<?php
/**
 * DopeFramework Extra Functionality
 *
 * @package    Osclass
 * @author     DopeThemes <hello@dopethemes.com>
 * @copyright  Copyright (c) DopeThemes 2014
 * @license    http://www.dopethemes.com/license/osclass
 * @link       http://www.dopethemes.com/
 */

/**
 * Construct body class
 */
function dtf_add_body_class_construct( $classes ) {
    $dopeBodyClass = dopeBodyClass::newInstance();
    $classes = array_merge( $classes, $dopeBodyClass->get() );
    return $classes;
}

/**
 * Print the constructed body class
 */
function dtf_body_class( $echo = true ) {
    /**
     * Print body classes.
     *
     * @param string  $echo Optional parameter.
     * @return print string with all body classes concatenated
     */
    osc_add_filter( 'dtf_bodyClass', 'dtf_add_body_class_construct' );
    $classes = osc_apply_filter( 'dtf_bodyClass', array() );
    if ( $echo && count( $classes ) ) {
        echo 'class="'.implode( ' ', $classes ).'"';
    } else {
        return $classes;
    }
}

/**
 * Add class on body tag
 */
function dtf_add_body_class( $class ) {
    /**
     * Add new body class to body class array.
     *
     * @param string  $class required parameter.
     */
    $dopeBodyClass = dopeBodyClass::newInstance();
    $dopeBodyClass->add( $class );
}

/**
 * Search number
 */
function dtf_search_number() {
    $search_from = ( ( osc_search_page() * osc_default_results_per_page_at_search() ) + 1 );
    $search_to   = ( ( osc_search_page() + 1 ) * osc_default_results_per_page_at_search() );
    if ( $search_to > osc_search_total_items() ) {
        $search_to = osc_search_total_items();
    }

    return array(
        'from' => $search_from,
        'to'   => $search_to,
        'of'   => osc_search_total_items()
    );
}
