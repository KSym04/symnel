<?php
/**
 * DopeFramework Message Helpers
 *
 * @package    Osclass
 * @author     DopeThemes <hello@dopethemes.com>
 * @copyright  Copyright (c) DopeThemes 2014
 * @license    http://www.dopethemes.com/license/osclass
 * @link       http://www.dopethemes.com/
 */

/**
 * Shows all the pending flash messages in session and cleans up the array.
 *
 * @param $section
 * @param $class
 * @param $id
 * @return void
 */
function dtf_show_flash_message($section = 'pubMessages', $class = "flashmessage", $id = "flashmessage") {
    $messages = Session::newInstance()->_getMessage($section);
    if (is_array($messages)) {

            foreach ($messages as $message) {

                echo '<div id="flash_js"></div>';

                if (isset($message['msg']) && $message['msg'] != '') {
                    echo '<div id="' . $id . '" class="' . strtolower($class) . ' ' . strtolower($class) . '-' .$message['type'] . '"><button type="button" class="close" data-dismiss="alert">×</button>';
                    echo osc_apply_filter('flash_message_text', $message['msg']);
                    echo '</div>';
                } else if($message!='') {
                    echo '<div id="' . $id . '" class="' . $class . '">';
                    echo osc_apply_filter('flash_message_text', $message);
                    echo '</div>';
                } else {
                    echo '<div id="' . $id . '" class="' . $class . '" style="display:none;">';
                    echo osc_apply_filter('flash_message_text', '');
                    echo '</div>';
                }
            }
    }
    Session::newInstance()->_dropMessage($section);
}
