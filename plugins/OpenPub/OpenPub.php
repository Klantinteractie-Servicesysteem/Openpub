<?php

/**
 * OpenPub
 *
 * @package           OpenPub
 * @author            Conduction
 * @copyright         2022 Conduction
 * @license           GPL-2.0-or-later
 *
 * @wordpress-plugin
 * Plugin Name:       OpenPub
 * Plugin URI:        https://conduction.nl/openpub
 * Description:       A plugin for publishing posts in the pub standard
 * Version:           1.0.3
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Conduction
 * Author URI:        https://conduction.nl
 * Text Domain:       plugin-slug
 * License:           GPL v2 or later
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */

use KISS\OpenPub\Autoloader;
use KISS\OpenPub\Foundation\Plugin;

/**
 * If this file is called directly, abort.
 */
if (!defined('WPINC')) {
    die;
}

/**
 * Manual loaded file: the autoloader.
 */
require_once __DIR__ . '/autoloader.php';
$autoloader = new Autoloader();

/**
 * Begin execution of the plugin.
 */
$plugin = (new Plugin(__DIR__))->boot();

/**
 * Start session on init when there is none.
 */
add_action('init', function () {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
});

// this is awfull code
function kiss_openpub_post_type() {
    register_post_type('kiss_openpub_pub',
        array(
            'labels'      => array(
                'name'          => __('Publications', 'textdomain'),
                'singular_name' => __('Publication', 'textdomain'),
            ),
            //'rest_base' => '/owc/pdc/v1/items',
            'public'      => true,
            'has_archive' => true,
            'show_in_rest' => true,
            'supports' => array(
                'title',
                'editor',
                'author',
                'thumbnail',
                'excerpt',
                'comments',
                'revisions'
            )
        )
    );
}

add_action('init', 'kiss_openpub_post_type');
function kiss_openpub_taxonomie() {


    // The audiance fot publicaitons
    $labels = array(
        'name'              => _x( 'Audiences', 'taxonomy general name' ),
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
        'labels' => $labels,
        'public' => true,
        'show_in_rest' => true, // add support for Gutenberg editor
        'publicly_queryable' => true,
        'show_in_nav_menus' => true,
        'show_in_rest' => true,
        'show_ui' => true,
        'show_tagcloud' => true,
        'show_admin_column' => true,
        'hierarchical' => false, // make it hierarchical (like categories)
        'rewrite' => true,
        'query_var' => true
    );

    register_taxonomy( 'openpub-audience', [ 'kiss_openpub_pub' ], $args );

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
        'labels' => $labels,
        'public' => true,
        'show_in_rest' => true, // add support for Gutenberg editor
        'publicly_queryable' => true,
        'show_in_nav_menus' => true,
        'show_in_rest' => true,
        'show_ui' => true,
        'show_tagcloud' => true,
        'show_admin_column' => true,
        'hierarchical' => false, // make it hierarchical (like categories)
        'rewrite' => true,
        'query_var' => true
    );

    register_taxonomy( 'openpub-type', [ 'kiss_openpub_pub' ], $args );

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
        'labels' => $labels,
        'public' => true,
        'show_in_rest' => true, // add support for Gutenberg editor
        'publicly_queryable' => true,
        'show_in_nav_menus' => true,
        'show_in_rest' => true,
        'show_ui' => true,
        'show_tagcloud' => true,
        'show_admin_column' => true,
        'hierarchical' => false, // make it hierarchical (like categories)
        'rewrite' => true,
        'query_var' => true
    );

    register_taxonomy( 'openpub-usage', [ 'kiss_openpub_pub' ], $args );

    // When the show posts types
    $labels = array(
        'name'              => _x( 'Shows', 'taxonomy general name' ),
        'singular_name'     => _x( 'Shown on', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Shows' ),
        'all_items'         => __( 'All Shows' ),
        'parent_item'       => __( 'Parent Shows' ),
        'parent_item_colon' => __( 'Parent Shows:' ),
        'edit_item'         => __( 'Edit Shows' ),
        'update_item'       => __( 'Update Shows' ),
        'add_new_item'      => __( 'Add New Shows on' ),
        'new_item_name'     => __( 'New Show on  Name' ),
        'menu_name'         => __( 'Shows' ),
    );

    $args   = array(
        'labels' => $labels,
        'public' => true,
        'show_in_rest' => true, // add support for Gutenberg editor
        'publicly_queryable' => true,
        'show_in_nav_menus' => true,
        'show_in_rest' => true,
        'show_ui' => true,
        'show_tagcloud' => true,
        'show_admin_column' => true,
        'hierarchical' => false, // make it hierarchical (like categories)
        'rewrite' => true,
        'query_var' => true
    );

    register_taxonomy( 'openpub-show-on', [ 'kiss_openpub_pub' ], $args );


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
        'labels' => $labels,
        'public' => true,
        'show_in_rest' => true, // add support for Gutenberg editor
        'publicly_queryable' => true,
        'show_in_nav_menus' => true,
        'show_in_rest' => true,
        'show_ui' => true,
        'show_tagcloud' => true,
        'show_admin_column' => true,
        'hierarchical' => false, // make it hierarchical (like categories)
        'rewrite' => true,
        'query_var' => true
    );

    register_taxonomy( 'openpub_skill', [ 'kiss_openpub_pub'], $args );
}


add_action( 'init', 'kiss_openpub_taxonomie' );
