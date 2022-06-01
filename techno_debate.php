<?php
/**
 * Plugin Name: Techno Debate
 * Description: This plugin provide functionality to make forum support in your site.
 * Version: 1.0
 * Author: Bhavin Gediya
 * Author URI: #
 */

add_action( 'init', 'techno_debate_xyz' );
function techno_debate_xyz() {
    $labels = array(
        'name' => 'Techno Debates',
        'singular_name' => 'Techno Debate',
        'add_new' => 'Add New Artical',
        'add_new_item' => 'Add New Artical',
        'edit_item' => 'Edit Artical',
        'new_item' => 'New Artical',
        'all_items' => 'All Articals',
        'view_item' => 'View Articals',
        'search_items' => 'Search Techno Debates',
        'not_found' =>  'No Artical Found',
        'not_found_in_trash' => 'No Artical found in Trash', 
        'parent_item_colon' => '',
        'menu_name' => 'Techno Debates',
    );

    // register post type
    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'rewrite' => array('slug' => 'technodebate'),
        'query_var' => true,
        'menu_icon' => 'dashicons-randomize',
        'supports' => array(
            'title',
            'editor',
            'trackbacks',
            'comments',
            'revisions',
            'thumbnail',
            'author',
            'page-attributes'
        )
    );
    register_post_type( 'technodebate', $args );
}

    function enqueueAdmin()
    {
        wp_enqueue_script('very-descriptive-name', plugins_url('js/books-post-editor.js', __FILE__), array('jquery'), '1.0', true);
    	wp_enqueue_style('very-exciting-name', plugins_url('css/books-post-editor.css', __FILE__), null, '1.0');
        
    }
    add_action('admin_enqueue_scripts', 'enqueueAdmin');

    function enqueuePublic()
    {
        wp_enqueue_script('very-descriptive-name', plugins_url('js/books-post-editor.js', __FILE__), array('jquery'), '1.0', true);
    	wp_enqueue_style('very-exciting-name', plugins_url('css/books-post-editor.css', __FILE__), null, '1.0');
        
    }
    add_action('wp_enqueue_scripts', 'enqueuePublic');

function myplugin_flush_rewrites() {
    techno_debate_xyz();
    flush_rewrite_rules();
}
register_activation_hook ( __FILE__, 'myplugin_flush_rewrites' );

register_uninstall_hook( __FILE__, 'my_plugin_uninstall' );
function my_plugin_uninstall() {
        // Uninstallation stuff here
       unregister_post_type( 'technodebate');
  }




