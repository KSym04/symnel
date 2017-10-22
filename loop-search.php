<?php
$loopClass = '';
$type = 'items';
if ( View::newInstance()->_exists( 'listType' ) ) {
    $type = View::newInstance()->_get( 'listType' );
}
if ( View::newInstance()->_exists( 'listClass' ) ) {
    $loopClass = View::newInstance()->_get( 'listClass' );
}
$i = 0;

if ( $type == 'latestItems' ) {
    while ( osc_has_latest_items() ) {
        $class = '';
        if ( $i%3 == 0 ) {
            $class = 'first';
        }
        symnel_draw_item( $class );
        if( $i == 2 ) { symnel_draw_sponsored(); }
        if( $i == 11 ) { symnel_draw_sponsored(); }
        $i++;
    }
} elseif ( $type == 'premiums' ) {
    while ( osc_has_premiums() ) {
        $class = '';
        if ( $i%3 == 0 ) {
            $class = 'first premium';
        }
        symnel_draw_item( $class, false, true );
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
        $admin = false;
        if ( View::newInstance()->_exists( "listAdmin" ) ) {
            $admin = true;
        }

        symnel_draw_item( $class, $admin );
        if( $i == 2 ) { symnel_draw_sponsored(); }
        if( $i == 11 ) { symnel_draw_sponsored(); }
    }
}
