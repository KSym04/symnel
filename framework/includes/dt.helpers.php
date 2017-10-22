<?php
/**
 *  DopeFramework Template Helpers
 *
 * @package    Osclass
 * @author     DopeThemes <hello@dopethemes.com>
 * @copyright  Copyright (c) DopeThemes 2014
 * @license    http://www.dopethemes.com/license/osclass
 * @link       http://www.dopethemes.com/
 */

/**
 * Get item title locale
 */
function dtf_item_title() {
    $title = osc_item_title();
    foreach ( osc_get_locales() as $locale ) {
        if ( Session::newInstance()->_getForm( 'title' ) != "" ) {
            $title_ = Session::newInstance()->_getForm( 'title' );
            if ( @$title_[$locale['pk_c_code']] != "" ) {
                $title = $title_[$locale['pk_c_code']];
            }
        }
    }
    return $title;
}

/**
 * Get item description locale
 */
function dtf_item_description() {
    $description = osc_item_description();
    foreach ( osc_get_locales() as $locale ) {
        if ( Session::newInstance()->_getForm( 'description' ) != "" ) {
            $description_ = Session::newInstance()->_getForm( 'description' );
            if ( @$description_[$locale['pk_c_code']] != "" ) {
                $description = $description_[$locale['pk_c_code']];
            }
        }
    }
    return $description;
}

/**
 * Get user current page section
 */
function dtf_user_current_section() {
    return Rewrite::newInstance()->get_section();
}

/**
 * Get username
 */
function dtf_get_username( $user_id = '' ) {
    $user = User::newInstance()->findByPrimaryKey( $user_id );
    return ( $user['s_username'] != '' ) ? $user['s_username'] : '';
}

/**
 * Get username if logged in
 */
function dtf_get_username_if_logged_in() {
    $user_key = Session::newInstance()->_get( "userId" );
    $user = User::newInstance()->findByPrimaryKey( $user_key );
    return ( $user['s_username'] != '' ) ? $user['s_username'] : '';
}

/**
 * Get latest searches
 */
function dtf_display_latest_searches( $limit = 20 ) {
    if ( osc_count_latest_searches() > 1 ) {
        $html = '<h4>'.__( "Latest Searches", 'symnel' ).'</h4>';
        $html .= '<ul>';
        $latest_searches = osc_get_latest_searches( $limit );
        $i = 0;
        foreach ( $latest_searches as $ls ) {
            if ( $i == $limit ) {
                break;
            }

            if ( strlen( $ls['s_search'] ) <= 30 || strlen( $ls['s_search'] ) >= 5 ) {
                    $html .= sprintf( '<li><a href="%s" title="%s">%s</a></li>',
                        osc_base_url().'index.php?sCategory=&sPattern='.urlencode( strtolower( $ls['s_search'] ) ).'&page=search',
                        $ls['s_search'],
                        $ls['s_search']
                    );
            }
            $i++;
        }
        $html .= '</ul>';
    }
    return $html;
}

/**
 * Sidebar functionalities
 */
function dtf_sidebar_category_search( $catId = null ) {
    $aCategories = array();
    if ( $catId==null ) {
        $aCategories[] = Category::newInstance()->findRootCategoriesEnabled();
    } else {
        // if parent category, only show parent categories
        $aCategories = Category::newInstance()->toRootTree( $catId );
        end( $aCategories );
        $cat = current( $aCategories );
        // if is parent of some category
        $childCategories = Category::newInstance()->findSubcategoriesEnabled( $cat['pk_i_id'] );
        if ( count( $childCategories ) > 0 ) {
            $aCategories[] = $childCategories;
        }
    }

    if ( count( $aCategories ) == 0 ) {
        return "";
    }

    dtf_print_sidebar_category_search( $aCategories, $catId );
}

/**
 * Sidebar category search
 */
function dtf_print_sidebar_category_search( $aCategories, $current_category = null, $i = 0 ) {
    $class = '';
    if ( !isset( $aCategories[$i] ) ) {
        return null;
    }

    if ( $i===0 ) {
        $class = 'class="category"';
    }

    $c   = $aCategories[$i];
    $i++;
    if ( !isset( $c['pk_i_id'] ) ) {
        echo '<ul '.$class.'>';
        if ( $i==1 ) {
            echo '<li><a href="'.osc_esc_html( osc_update_search_url( array( 'sCategory'=>null, 'iPage'=>null ) ) ).'">'.__( 'All categories', 'symnel' )."</a></li>";
        }
        foreach ( $c as $key => $value ) {
?>
            <li>
                <a id="cat_<?php echo osc_esc_html( $value['pk_i_id'] );?>" href="<?php echo osc_esc_html( osc_update_search_url( array( 'sCategory'=> $value['pk_i_id'], 'iPage'=>null ) ) ); ?>">
                <?php if ( isset( $current_category ) && $current_category == $value['pk_i_id'] ) { echo '<strong>'.$value['s_name'].'</strong>'; }
            else { echo $value['s_name']; } ?>
                </a>

            </li>
    <?php
        }
        if ( $i==1 ) {
            echo "</ul>";
        } else {
            echo "</ul>";
        }
    } else {
?>
    <ul <?php echo $class;?>>
        <?php if ( $i==1 ) { ?>
        <li><a href="<?php echo osc_esc_html( osc_update_search_url( array( 'sCategory'=>null, 'iPage'=>null ) ) ); ?>"><?php _e( 'All categories', 'symnel' ); ?></a></li>
        <?php } ?>
            <li>
                <a id="cat_<?php echo osc_esc_html( $c['pk_i_id'] );?>" href="<?php echo osc_esc_html( osc_update_search_url( array( 'sCategory'=> $c['pk_i_id'], 'iPage'=>null ) ) ); ?>">
                <?php if ( isset( $current_category ) && $current_category == $c['pk_i_id'] ) { echo '<strong>'.$c['s_name'].'</strong>'; }
        else { echo $c['s_name']; } ?>
                </a>
                <?php dtf_print_sidebar_category_search( $aCategories, $current_category, $i ); ?>
            </li>
        <?php if ( $i==1 ) { ?>
        <?php } ?>
    </ul>
<?php
    }
}
