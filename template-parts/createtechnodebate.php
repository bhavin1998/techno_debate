<?php
// flush_rewrite_rules();
?>

<?php 
get_header();
    if(isset($_POST['submitbtn']) && $_POST['signatureinputdata'] != null ) {
        global $user_ID;
        $technoTitle = $_POST['technotitle'];
        $technocontent = $_POST['technocontent'];

        $new_post = array(
            'post_title' => $technoTitle,
            'post_content' => $technocontent,
            'post_status' => 'publish',
            'post_date' => date('Y-m-d H:i:s'),
            'post_author' => $user_ID,
            'post_type' => 'technodebate',
        );
        $newpost = wp_insert_post($new_post);
        update_post_meta( $newpost, 'digital_sign_data', $_POST['signatureinputdata'] );
        wp_redirect( get_permalink($newpost) );
        exit;
    }
    else{

    }

?>

<form method="post" enctype="multipart/form-data" class="technoform" id="technoform">
    <div class="allformfield">
        <div><input type="text" name="technotitle" id="technotitle" placeholder="Enter Title" required></div>
        <div><textarea name="technocontent" id="technocontent" cols="30" rows="10" placeholder="Describe your Query & Question" required></textarea></div>
        <div><?php do_shortcode('[techno_digital_signature]'); ?></div>
        <div><input type="submit" name="submitbtn" value="POST"></div>
    </div>
</form>