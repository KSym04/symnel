<?php
/**
 * DopeFramework Menu
 *
 * @package    Osclass
 * @author     DopeThemes <hello@dopethemes.com>
 * @copyright  Copyright (c) DopeThemes 2014
 * @license    http://www.dopethemes.com/license/osclass
 * @link       http://www.dopethemes.com/
 */

/**
 * Prints the user's account menu
 *
 * @param array $options array with options of the form array('name' => 'display name', 'url' => 'url of link')
 * @return void
 */
function dtf_sidebar_private_user_menu( $options = null, $current_section = '', $attach_search = false )
{
    if($options == null) {
        $options = array();
    }

    $options = osc_apply_filter('user_menu_filter', $options);

    echo '<script type="text/javascript">';
    echo '$(".nav.navbar-nav.side-nav > :first-child").addClass("first");';
    echo '$(".nav.navbar-nav.side-nav > :last-child").addClass("last");';
    echo '</script>';
    echo '<ul class="nav navbar-nav side-nav">';

    if( $attach_search )
        echo '<li>' . dtf_inner_search() . '</li>';

    $var_l = count($options);
    for($var_o = 0; $var_o < ($var_l-1); $var_o++) {
        $menu_state = ($options[$var_o]['id'] == $current_section) ? 'active' : '';
        echo '<li id="' . $options[$var_o]['id'] . '" class="' . $options[$var_o]['class'] . ' '. $menu_state .'" ><a href="' . $options[$var_o]['url'] . '" ><i class="' . $options[$var_o]['icon'] . '"></i> ' . $options[$var_o]['name'] . '</a></li>';
    }

    osc_run_hook('user_menu');

    $menu_state = ($options[$var_o]['id'] == $current_section) ? 'active' : '';
    echo '<li id="' . $options[$var_o]['id'] . '" class="' . $options[$var_l-1]['class'] . ' '. $menu_state .'" ><a href="' . $options[$var_o]['url'] . '" ><i class="' . $options[$var_o]['icon'] . '"></i> ' . $options[$var_l-1]['name'] . '</a></li>';

    echo '</ul>';
}


/**
 *  Inner Search
 */
function dtf_inner_search() {
    $html = '<form action="'.osc_base_url( true ).'" method="get" class="nocsrf">
        <div class="dopeninner-search">
            <div class="input-group custom-search-form">
                <input type="text" name="sPattern" class="form-control" placeholder="Search items...">
                <span class="input-group-btn">
                <button class="btn btn-default" type="submit">
                    <i class="fa fa-search"></i>
                </button>
                </span>
                <input type="hidden" name="page" value="search"/>
            </div>
        </div></form>';
    return $html;
}
