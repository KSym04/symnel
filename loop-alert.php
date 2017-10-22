<?php
/**
 * Symnel Loop
 *
 * @package Osclass
 * @subpackage Symnel
 * @since Symnel 1.0
 */
$type = 'items'; ?>
<tbody>
<?php
$i = 0;
if ( $type == 'latestItems' ) {
    while ( osc_has_latest_items() ) {
        $class = '';
        if ( $i%3 == 0 ) {
            $class = 'first';
        }
        dtf_draw_item( $class );
        $i++;
    }
} elseif ( $type == 'premiums' ) {
    while ( osc_has_premiums() ) {
        $class = '';
        if ( $i%3 == 0 ) {
            $class = 'first';
        }
        dtf_draw_item( $class, false, true );
        $i++;
        if ( $i == 3 ) {
            break;
        }
    }
} else {
    while ( osc_has_items() ) {
        $i++;
        $class = false;
        if ( $i%4 == 0 ) {
            $class = 'last';
        }
        dtf_draw_item( $class );
    }
}
?>
</tbody>
