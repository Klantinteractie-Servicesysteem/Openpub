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
                'revisions'
            ),
            'capabilities' => array(
                'publish_posts' => 'publish_publications',
                'edit_posts' => 'edit_publications',
                'edit_others_posts' => 'edit_others_publications',
                'delete_posts' => 'delete_publications',
                'delete_others_posts' => 'delete_others_publications',
                'read_private_posts' => 'read_private_publications',
                'edit_post' => 'edit_publication',
                'delete_post' => 'delete_publication',
                'read_post' => 'read_publication'
            )
        )
    );
}

add_action('init', 'kiss_openpub_post_type');
function kiss_openpub_taxonomie() {
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
        'menu_name'         => __( 'Types' ),
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
        'hierarchical' => true, // make it hierarchical (like categories)
        'rewrite' => true,
        'query_var' => true,
        
    );

    register_taxonomy( 'openpub-type', [ 'kiss_openpub_pub' ], $args );

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
        'menu_name'         => __( 'Skills' ),
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
        'hierarchical' => true, // make it hierarchical (like categories)
        'rewrite' => true,
        'query_var' => true
    );

    register_taxonomy( 'openpub_skill', [ 'kiss_openpub_pub'], $args );
}

add_action( 'init', 'kiss_openpub_taxonomie' );


/**
 * Programatically fill Skills and Types
 */
function init_publication_types() {
    $publicationTypes = ["Nieuws", "Werkinstructie"];

    foreach ( $publicationTypes as $publicationType ) {
        wp_insert_term($publicationType, "openpub-type");
    }
}


add_action( 'init', 'init_publication_types' );

function init_publication_skills() {
    $publicationSkills = [
        "Afspraken", 
        "Afval",
        "Algemeen",
        "Belastingen",
        "Bouw en ruimtelijke ordening",
        "Burgerzaken",
        "Corona",
        "Groen",
        "KCC",
        "Milieu",
        "Openingstijden",
        "Overig",
        "Toeslagen",
        "Vergunningen",
        "Werk en inkomen",
        "Zon"
    ];

    foreach ( $publicationSkills as $publicationSkill ) {
        wp_insert_term($publicationSkill, "openpub_skill");
    }
}


add_action( 'init', 'init_publication_skills' );

/**
 * Create required user role for publication contributor
 */
remove_role('publication_contributor');

$role = add_role( 'publication_contributor', 'Publicatie bijdrager',
    array(
        'read' => true,
        'edit_published_posts' => true,
        'publish_posts' => true,
        'delete_published_posts' => true,
        'edit_posts'	 => true,
        'delete_posts' => true,

        'publish_publications' => true,
        'edit_publications' => true,
        'edit_others_publications' => true,
        'delete_publications' => true,
        'delete_others_publications' => true,
        'read_private_publications' => true,
        'edit_publication' => true,
        'delete_publication' => true,
        'read_publication' => true,
    )
);