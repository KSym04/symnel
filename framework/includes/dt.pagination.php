<?php
/**
 * DopeFramework Pagination
 *
 * @package    Osclass
 * @author     DopeThemes <hello@dopethemes.com>
 * @copyright  Copyright (c) DopeThemes 2014
 * @license    http://www.dopethemes.com/license/osclass
 * @link       http://www.dopethemes.com/
 */

function dtf_pagination_items($extraParams = array(), $field = false)
{
    if(osc_is_public_profile()) {
        $url = osc_user_list_items_pub_profile_url('{PAGE}', $field);
        $first_url = osc_user_public_profile_url();;
    } elseif(osc_is_list_items()) {
        $url = osc_user_list_items_url('{PAGE}', $field);
        $first_url = osc_user_list_items_url();
    }
    $params = array('total'    => osc_search_total_pages(),
                    'selected' => osc_search_page(),
                    'url'      => $url,
                    'first_url' => $first_url
              );
    if(is_array($extraParams) && !empty($extraParams)) {
        foreach($extraParams as $key => $value) {
            $params[$key] = $value;
        }
    }
    $pagination = new dopePagination($params);
    return $pagination->doPagination();
}
