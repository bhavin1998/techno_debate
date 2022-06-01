<?php

class Technodebate_admin {
    public function __construct()
    {
        add_action('admin_enqueue_scripts', array($this,'enqueueAdmin'));
        add_action( 'init', array($this,'techno_debate_xyz'));
        
    }

    public static function enqueueAdmin()
    {
        wp_enqueue_script('very-descriptive-name', plugins_url('js/books-post-editor.js', __FILE__), array('jquery'), '1.0', true);
    	wp_enqueue_style('very-exciting-name', plugins_url('css/books-post-editor.css', __FILE__), null, '1.0');
        
    }

    
}


// global $technodebate_admin;

// $technodebate_admin = new Technodebate_admin();
// $technodebate_admin->techno_debate();