jQuery(document).ready(function(){
    // jQuery(".technoform")[0].reset;
});

jQuery(function() {
	var sig = jQuery('#sig').signature();
	jQuery('#disable').click(function() {
		var disable = jQuery(this).text() === 'Disable';
		jQuery(this).text(disable ? 'Enable' : 'Disable');
		sig.signature(disable ? 'disable' : 'enable');
	});
	jQuery('#clear').click(function() {
		sig.signature('clear');
	});
	jQuery('#json').click(function() {
		alert(sig.signature('toJSON'));
	});
});

jQuery(document).on("click","#svg",function(e){
	e.preventDefault();
	var sig = jQuery('#sig').signature();
	var testsvg = sig.signature('toSVG');
	jQuery("#signaturedata").append(testsvg);
	if(jQuery("polyline").length == 0) {
		alert("ajax not call");
		jQuery("#signatureinputdata").removeAttr(value);
	}
	else {
		jQuery.ajax({
			type:"post",
			url: jQuery("#adminajax").val(),
			data: {
				action: "add_user_signaturedata",
				svgdata: testsvg.replace(/(\r\n|\n|\r)/gm, "")
			},
			success: function(data) {
				jQuery("#signatureinputdata").removeAttr("value");
				// alert ("ajax call");
				jQuery("#signatureinputdata").val(data);
				// console.log(data);
			}
		});
	}
});

jQuery(document).on("click","#clear",function(e){
	e.preventDefault();
	alert("clearing...");
	jQuery("#signatureinputdata").removeAttr("value");
	jQuery("#signaturedata").empty();
});