<?php
/**
 * DopeFramework SEO
 *
 * @package    Osclass
 * @author     DopeThemes <hello@dopethemes.com>
 * @copyright  Copyright (c) DopeThemes 2014
 * @license    http://www.dopethemes.com/license/osclass
 * @link       http://www.dopethemes.com/
 */

/**
* Hook for header, meta tags robots nofollos
*/
function dtf_nofollow_construct() {
    echo PHP_EOL . '<meta name="robots" content="noindex, nofollow, noarchive" />' . PHP_EOL;
    echo '<meta name="googlebot" content="noindex, nofollow, noarchive" />' . PHP_EOL;
}

/**
* Hook for header, meta tags robots follow
*/
function dtf_follow_construct() {
    echo PHP_EOL . '<meta name="robots" content="index, follow" />' . PHP_EOL;
    echo '<meta name="googlebot" content="index, follow" />' . PHP_EOL;
}

