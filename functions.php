<?php

// die("funcyion");
// flush_rewrite_rules(); 


add_filter( 'single_template', 'add_custom_single_template', 99 );

  function add_custom_single_template( $template ) {
    if ( get_post_type() == 'post-type-name' ) {
      return plugin_dir_path( __FILE__ ) . 'path-to-page-template-inside-plugin.php';
    }

    return $template;
  }