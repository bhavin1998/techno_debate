<?php

// get_header();
flush_rewrite_rules();
global $wp_query;
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

$args = array(
    'post_type' => 'technodebate',
    'post_status' => 'publish',
    'posts_per_page' => -1,
    'paged' => $paged
);
$arr_posts = new WP_Query( $args );

if ( $arr_posts->have_posts() ) :
    while ( $arr_posts->have_posts() ) :
        $arr_posts->the_post();
        ?>
        <!-- <h1> <?php echo the_title(); ?> </h1> -->
        <h3><a href=<?php echo get_permalink(); ?>><?php echo the_title(); ?></a></h3>
        <p> <?php echo the_content(); ?> </p>
        <?php
    endwhile;    
endif;



wp_reset_postdata();
// get_footer();
