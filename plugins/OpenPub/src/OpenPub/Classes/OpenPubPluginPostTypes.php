<?php

namespace KISS\OpenPub\Classes;

use KISS\OpenPub\Foundation\Plugin;

class OpenPubPluginPostTypes
{
    /** @var Plugin */
    protected $plugin;

    public function __construct(Plugin $plugin)
    {
        $this->plugin = $plugin;
        $this->add_posttype();
    }

    function kiss_openpub_post_type() {
        register_post_type('kiss_openpub_pub',
            array(
                'labels'      => array(
                    'name'          => __('Publications', 'textdomain'),
                    'singular_name' => __('Publication', 'textdomain'),
                ),
                'public'      => true,
                'has_archive' => true,
                'show_in_rest' => true,
                'supports' => array( 'title', 'editor', 'custom-fields' )
            )
        );

        register_post_type('kiss_openpub_cat',
            array(
                'labels'      => array(
                    'name'          => __('Catalogi', 'textdomain'),
                    'singular_name' => __('Catalogus', 'textdomain'),
                ),
                'public'      => true,
                'has_archive' => true,
                'show_in_rest' => true,
                'supports' => array( 'title', 'editor' )
            )
        );
    }

    private function add_posttype(): void
    {
        add_action('init', 'kiss_openpub_post_type');
    }

}
