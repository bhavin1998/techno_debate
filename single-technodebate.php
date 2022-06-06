<?php
/*
Template Name: Single TechnoDebate
*/ 
flush_rewrite_rules();
get_header();
?>
<?php 
/* The loop */ ?>
            <?php while ( have_posts() ) : the_post(); ?>
                <div class="main-post-div">
                    <div class="single-page-post-heading">
                        <h1><?php the_title(); ?></h1>
                    </div>
                    <div class="content-here">
                        <?php  the_content();  ?>
                    </div>
                    <div class="comment-section-here">
                        <?php //comments_template(); ?>
                    </div>
                </div>

            <?php endwhile; 
                        get_footer();
            ?>
