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
    function kiss_openpub_taxonomie() {


        // The audiance fot publicaitons
        $labels = array(
            'name'              => _x( 'Sudiences', 'taxonomy general name' ),
            'singular_name'     => _x( 'Audience', 'taxonomy singular name' ),
            'search_items'      => __( 'Search Audiences' ),
            'all_items'         => __( 'All Audiences' ),
            'parent_item'       => __( 'Parent Audience' ),
            'parent_item_colon' => __( 'Parent Audience:' ),
            'edit_item'         => __( 'Edit Audience' ),
            'update_item'       => __( 'Update Audience' ),
            'add_new_item'      => __( 'Add New Audience' ),
            'new_item_name'     => __( 'New Audience Name' ),
            'menu_name'         => __( 'Audience' ),
        );


        $args   = array(
            'hierarchical'      => false, // make it hierarchical (like categories)
            'labels'            => $labels,
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => [ 'slug' => 'openpub-audience' ],
        );

        register_taxonomy( 'openpub-audience', [ 'post' ], $args );

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

        // Usage
        $labels = array(
            'name'              => _x( 'Usages', 'taxonomy general name' ),
            'singular_name'     => _x( 'Usage', 'taxonomy singular name' ),
            'search_items'      => __( 'Search Usages' ),
            'all_items'         => __( 'All Usages' ),
            'parent_item'       => __( 'Parent Usage' ),
            'parent_item_colon' => __( 'Parent Usage:' ),
            'edit_item'         => __( 'Edit Usage' ),
            'update_item'       => __( 'Update Usage' ),
            'add_new_item'      => __( 'Add New Usage' ),
            'new_item_name'     => __( 'New Usage Name' ),
            'menu_name'         => __( 'Usage' ),
        );

        $args   = array(
            'hierarchical'      => false, // make it hierarchical (like categories)
            'labels'            => $labels,
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => [ 'slug' => 'openpub-usage' ],
        );

        register_taxonomy( 'openpub-usage', [ 'post' ], $args );

        // When the show posts types
        $labels = array(
            'name'              => _x( 'Shown on', 'taxonomy general name' ),
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
            'rewrite'           => [ 'slug' => 'openpub-show-on' ],
        );

        register_taxonomy( 'openpub-show-on', [ 'post' ], $args );


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
        add_action( 'init', 'kiss_openpub_taxonomie' );
    }

}
