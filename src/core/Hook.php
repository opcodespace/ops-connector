<?php
namespace core;

class Hook{
    public static function init()
    {
        $self = new self;
        add_action( 'admin_menu', array( $self, 'add_auth_page' ) );
    }

    public function add_auth_page()
    {
        add_options_page(
            'Authorization', 
            'Auth Apps', 
            'manage_options', 
            'auth-apps',
            array( $this, 'authorization_page' )
        );
    }

    public function authorization_page()
    {
        echo "<h1>Authorize your applications.</h1>";
        
        do_action( 'authorization_buttons' );
    }

}

add_action('plugins_loaded', array('\core\Hook', 'init'));