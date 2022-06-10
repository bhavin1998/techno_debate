<?php
/**
 * Plugin Name: Techno Debate
 * Description: This plugin provide functionality to make forum support in your site.
 * Version: 1.0
 * Author: Bhavin Gediya
 * Author URI: #
 */

ob_start();
error_reporting(0);
// flush_rewrite_rules(); 
// die (plugin_dir_path( __FILE__ ) . 'single-my_product.php');

// die (plugin_dir_path(__FILE__));


// die(plugin_url('1212.php',__FILE__))

/* Start Create custom plugin Techno Debate */
add_action( 'init', 'techno_debate_xyz' );
function techno_debate_xyz() {

    $labels = array(
        'name'                => __( 'My Questions' ),
        'singular_name'       => __( 'My Question'),
        'menu_name'           => __( 'My Questions'),
        'parent_item_colon'   => __( 'Parent My Question'),
        'all_items'           => __( 'All My Questions'),
        'view_item'           => __( 'View My Question'),
        'add_new_item'        => __( 'Add New My Question'),
        'add_new'             => __( 'Add New'),
        'edit_item'           => __( 'Edit My Question'),
        'update_item'         => __( 'Update My Question'),
        'search_items'        => __( 'Search My Question'),
        'not_found'           => __( 'Not Found'),
        'not_found_in_trash'  => __( 'Not found in Trash')
    );

    // register post type
    $args = array(
        'label'               => __( 'my_question'),
        'description'         => __( 'Best Crunchify My Products'),
        'labels'              => $labels,
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'revisions','comments'),
        'public'              => true,
        'hierarchical'        => false,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'has_archive'         => true,
        'can_export'          => true,
        'exclude_from_search' => false,
            'yarpp_support'       => true,
        'taxonomies' 	      => array('post_tag'),
        'publicly_queryable'  => true,
        'capability_type'     => 'page'
    );
    
    register_post_type( 'technodebate', $args );
}
/* End Create custom plugin Techno Debate */

/* Start adding custom js/css at front-end & back-end */

    function enqueueAdmin()
    {
        // wp_enqueue_script( 'jquerymin-script', 'http://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js', array( 'jquery' ),null,false );
        // wp_enqueue_script( 'jqueryui-script', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js', array( 'jquery' ),null,false );
        // wp_enqueue_script( 'signature-script', plugin_dir_path( __FILE__ ).'js/jquery.signature.js', array( 'jquery' ),null,false );
        // wp_enqueue_script( 'customjs-script', plugin_dir_path( __FILE__ ).'js/customjs.js', array( 'jquery' ),null,false );

        // wp_enqueue_style('jqueryui-style', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/south-street/jquery-ui.css', array(), '0.1.0', 'all');
        // wp_enqueue_style('style-signature', plugin_dir_path( __FILE__ ).'css/jquery.signature.css', array(), '0.1.0', 'all');
        // wp_enqueue_style('customstyle-signature',plugin_dir_path( __FILE__ ).'css/customcss.css', array(), '0.1.0', 'all');

        // wp_enqueue_script('very-descriptive-name', plugins_url('js/customjs.js', __FILE__), array('jquery'), '1.0', true);
    	// wp_enqueue_style('very-exciting-name', plugins_url('css/customcss.css', __FILE__), null, '1.0');
        
    }
    add_action('admin_enqueue_scripts', 'enqueueAdmin');

    function enqueuePublic()
    {
        // wp_enqueue_script('very-descriptive-name', plugins_url('js/customjs.js', __FILE__), array('jquery'), '1.0', true);
    	// wp_enqueue_style('very-exciting-name', plugins_url('css/customcss.css', __FILE__), null, '1.0');

        wp_enqueue_script( 'jquerymin-script', 'http://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js', array( 'jquery' ),null,false );
        wp_enqueue_script( 'jqueryui-script', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js', array( 'jquery' ),null,false );
        wp_enqueue_script( 'signature-script', plugin_dir_url( __FILE__ ).'js/jquery.signature.js', array( 'jquery' ),'1.0',false );
        wp_enqueue_script( 'customjs-script', plugin_dir_url( __FILE__ ).'js/customjs.js', array( 'jquery' ),'1.0',false );

        wp_enqueue_style('jqueryui-style', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/south-street/jquery-ui.css', array(), '0.1.0', 'all');
        wp_enqueue_style('style-signature', plugin_dir_url( __FILE__ ).'css/jquery.signature.css', array(), '0.1.0', 'all');
        wp_enqueue_style('customstyle-signature',plugin_dir_url( __FILE__ ).'css/customcss.css', array(), '0.1.0', 'all');
        
    }
    add_action('wp_enqueue_scripts', 'enqueuePublic');

    /* End adding custom js/css at front-end & back-end */

    /* Start Plugin Activation/Deactivation Hook */

    function myplugin_flush_rewrites() {
        techno_debate_xyz();
        flush_rewrite_rules();
    }
    register_activation_hook ( __FILE__, 'myplugin_flush_rewrites' );

    register_uninstall_hook( __FILE__, 'my_plugin_uninstall' );
    function my_plugin_uninstall() {
        // Uninstallation stuff here
       unregister_post_type( 'technodebate');
       flush_rewrite_rules();
    }

    /* End Plugin Activation/Deactivation Hook */

    /* Start creating single post template */

    add_filter( 'single_template', 'add_custom_single_template', 99 );

    function add_custom_single_template( $template ) {
        if ( get_post_type() == 'technodebate') {
        return plugin_dir_path( __FILE__ ) . 'single-technodebate.php';
        }
        return $template;
    }

    /* End creating single post template */

    /* Start create custom setting page on for custom posttype */

    if ( ! function_exists('rushhour_projects_admin_page') ) :

        add_action( 'admin_menu' , 'rushhour_projects_admin_page' );
        
        /**
         * Generate sub menu page for settings
         *
         * @uses rushhour_projects_options_display()
         */
        function rushhour_projects_admin_page()
        {
            add_submenu_page(
                'edit.php?post_type=technodebate',
                __('Options', 'technodebate'),
                __('Options', 'technodebate'),
                'manage_options',
                'projects_archive',
                'technodebate_options_display');
        }
        endif;

        function technodebate_options_display() { 
            ?>
            <div class="wrap">
                <h1><?php _e( 'Use below shortcodes', 'technodebate' ); ?></h1>
                <b>[display_technodebate_post]</b> : <span>Display all post at front-end site</span>
            </div>
            <div>
                <b>[create_technodebate_post]</b> : <span>Create post at front-end site</span>
            </div>
            <?php
        }

        /* End custom setting page on for custom posttype */

        /* Start display custom page shortcode */

        add_shortcode("display_technodebate_post","display_technodebate_post_func");
        function display_technodebate_post_func() {
            include('template-parts/technodebatepost.php');
        }

        add_shortcode("create_technodebate_post","create_technodebate_post_func");
        function create_technodebate_post_func(){
            include('template-parts/createtechnodebate.php');
        }
        /* End display custom page shortcode */

        add_shortcode("techno_digital_signature","techno_digital_signature_func1");
        function techno_digital_signature_func1(){
            include('template-parts/digitalsignaturecheck.php');
        }

        add_action( 'wp_ajax_nopriv_add_user_signaturedata', 'add_user_signature1' );
        add_action( 'wp_ajax_add_user_signaturedata', 'add_user_signature1' );

        function add_user_signature1() {
            // include('template-parts/digitalsignaturecheck.php');
            echo $_POST['svgdata'];
            // echo "signature avasssilable";
            die;
        }






