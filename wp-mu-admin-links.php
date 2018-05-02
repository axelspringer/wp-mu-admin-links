<?php

/**
 * Display links in the Admin Bar
 *
 * Use ASSE_ADMIN_LINKS as constant
 *
 * @param $wpAdminBar
 */
function customAdminToolbarLink( $wpAdminBar ) {
    if ( ! defined( 'ASSE_ADMIN_LINKS' )
         || ! defined( "WP_ENVIRONMENT" )
         || ! array_key_exists( WP_ENVIRONMENT, ASSE_ADMIN_LINKS )
    ) {
        return;
    }

    foreach ( ASSE_ADMIN_LINKS[ WP_ENVIRONMENT ] as $title => $href ) {
        $id   = 'asse-' . strtolower( $title ) . '-link';
        $args = array(
            'id'     => $id,
            'title'  => $title,
            'href'   => $href,
            'parent' => 'site-name',
            'meta'   => array(
                'class' => $id,
                'title' => $title
            )
        );
        $wpAdminBar->add_node( $args );
    }
}

add_action( 'admin_bar_menu', 'customAdminToolbarLink', 999 );