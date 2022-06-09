<?php


get_header();
?>
    <h1>jQuery UI Signatuwre</h1>
    <!-- <p>This page demonstrates the very basics of the
        <a href="http://keith-wood.name/signature.html">jQuery UI Signature plugin</a>.
        It contains the minimum requirements for using the plugin and
        can be used as the basis for your own experimentation.</p> -->
    <!-- <p>For more detail see the <a href="http://keith-wood.name/signatureRef.html">documentation reference</a> page.</p> -->
    <p>Default signature:</p>
    <div id="sig"></div>
    <p style="clear: both;">
        <button id="disable">Disable</button> 
        <button id="clear">Clear</button> 
        <!-- <button id="json">To JSON</button> -->
        <button id="svg">To SVG</button>
        <label><input type="radio" name="syncFormat" value="PNG"> PNG</label>
        <textarea name="mytext" id="mytext" cols="30" rows="10"></textarea>
        <input type="hidden" name="adminajax" id="adminajax" value="<?php echo admin_url( 'admin-ajax.php' ); ?>">
    </p>
    <div hidden="hidden" id="signaturedata"></div>
    <!-- <dl>
        <dt>Github</dt><dd><a href="https://github.com/kbwood/signature">https://github.com/kbwood/signature</a></dd>
        <dt>Bower</dt><dd>kbw-signature</dd>
    </dl> -->

<?php
get_footer();


