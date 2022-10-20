<?php

namespace KISS\OpenPub\Classes;

use KISS\OpenPub\Foundation\Plugin;

class OpenPubPluginTaxonomies
{
    /** @var Plugin */
    protected $plugin;

    public function __construct(Plugin $plugin)
    {
        $this->plugin = $plugin;
        $this->add_taxanomy();
    }
    function register_kiss_openpub_taxonomies() {
        // Type of publications
        $labels = array(
            'name'              => _x( 'Types', 'taxonomy general name' ),
            'singular_name'     => _x( 'Type', 'taxonomy singular name' ),
            'search_items'      => __( 'Search Types' ),
            'all_items'         => __( 'All Types' ),
            'parent_item'       => __( 'Parent Type' ),
            'parent_item_colon' => __( 'Parent Type:' ),
            'edit_item'         => __( 'Edit Type' ),
            'update_item'       => __( 'Update Type' ),
            'add_new_item'      => __( 'Add New Type' ),
            'new_item_name'     => __( 'New Types Name' ),
            'menu_name'         => __( 'Type' ),
        );

        $args   = array(
            'hierarchical'      => false, // make it hierarchical (like categories)
            'labels'            => $labels,
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => [ 'slug' => 'openpub-type' ],
        );

        register_taxonomy( 'openpub-type', [ 'post' ], $args );

        // Relevant skills for employees
        $labels = array(
            'name'              => _x( 'Skills', 'taxonomy general name' ),
            'singular_name'     => _x( 'Skill', 'taxonomy singular name' ),
            'search_items'      => __( 'Search Skills' ),
            'all_items'         => __( 'All Skills' ),
            'parent_item'       => __( 'Parent Skill' ),
            'parent_item_colon' => __( 'Parent Skill:' ),
            'edit_item'         => __( 'Edit Skill' ),
            'update_item'       => __( 'Update Skill' ),
            'add_new_item'      => __( 'Add New Skill' ),
            'new_item_name'     => __( 'New Skill Name' ),
            'menu_name'         => __( 'Skill' ),
        );
        $args   = array(
            'hierarchical'      => false, // make it hierarchical (like categories)
            'labels'            => $labels,
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => [ 'slug' => 'skill' ],
        );

        register_taxonomy( 'openpub_skill', [ 'post' ], $args );
    }

    private function add_taxanomy(): void
    {
        add_action( 'init', 'register_kiss_openpub_taxonomies' );
    }

}
