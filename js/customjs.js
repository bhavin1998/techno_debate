jQuery(document).on("click",)

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

	jQuery('input[name="syncFormat"]').change(function() { 
		var syncFormat = $('input[name="syncFormat"]:checked').val(); 
		jQuery('#sig').signature('option', 'syncFormat', syncFormat); 
		alert(jQuery('#sig').signature('option', 'syncFormat', syncFormat));
	}); 
});

jQuery(document).on("click","#svg",function(e){
	e.preventDefault();
	var sig = jQuery('#sig');
	// var testsvg = sig.signature('toSVG');
	var testsvg = sig.signature('getData', 'image');
	console.log(testsvg);
	alert(testsvg);
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

				jQuery("#signatureinputdata").val(data);
				jQuery("#svg").addClass("disabled");
				jQuery("#sig").addClass("disabled");
				// console.log(data);
			}
		});
	}
});

jQuery(document).on("click","#clear",function(e){
	e.preventDefault();
	alert("clearing...");
	jQuery("#svg").removeClass("disabled");
	jQuery("#sig").removeClass("disabled");
	jQuery("#signatureinputdata").removeAttr("value");
	jQuery("#signaturedata").empty();
});