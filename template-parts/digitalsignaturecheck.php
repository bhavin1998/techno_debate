<?php


// get_header();
?>
    <!-- <h1>jQuery UI Signatuwre</h1> -->
    <!-- <p>This page demonstrates the very basics of the
        <a href="http://keith-wood.name/signature.html">jQuery UI Signature plugin</a>.
        It contains the minimum requirements for using the plugin and
        can be used as the basis for your own experimentation.</p> -->
    <!-- <p>For more detail see the <a href="http://keith-wood.name/signatureRef.html">documentation reference</a> page.</p> -->
    <p>Your Digital Signature:</p>
    <div id="sig"></div>
    <div id="digitalsignbutton">
        <p>
            <!-- <button type="button" id="disable">Disable</button>  -->
            <button type="button" id="clear">Clear</button> 
            <button type="button" id="svg">Confirm</button>
            <label><input type="radio" name="syncFormat" value="PNG"> PNG</label>
            <input type="hidden" name="adminajax" id="adminajax" value="<?php echo admin_url( 'admin-ajax.php' ); ?>">
            <input type="hidden" name="signatureinputdata" id="signatureinputdata">
        </p>
    </div>
    <div hidden="hidden" id="signaturedata"></div>
    <!-- <dl>
        <dt>Github</dt><dd><a href="https://github.com/kbwood/signature">https://github.com/kbwood/signature</a></dd>
        <dt>Bower</dt><dd>kbw-signature</dd>
    </dl> -->

<?php
// get_footer();


