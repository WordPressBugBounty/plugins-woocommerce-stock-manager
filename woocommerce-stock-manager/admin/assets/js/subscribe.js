// For Klawoo subscribe
jQuery(function () {
		jQuery(document).on( 'submit', 'form[name=wsm_klawoo_subscribe]', function (e) {
		e.preventDefault();
		var $form = jQuery(this);
		$form.find('#wsm_submit').prop('disabled', true);

		var formData = {};
		jQuery.each($form.serializeArray(), function() {
			formData[this.name] = this.value;
		});

		var data = {
			action : 'wsm_klawoo_subscribe',
			params : formData,
		};

		jQuery.post( ajaxurl, data, function( response ) {
			var result = jQuery(response);
			var msg = '';
			if ( result.find("h2").text() == "You\'re already subscribed!" || ( typeof response === 'string' && response.indexOf('subscribed') == -1 ) ) {
				msg = result.find("h2").text() || response;
			} else {
				msg = "<div class='wsm_success'>Thank you for subscribing!</div>";
			}
			jQuery("#wsm_promo_msg_content").hide().html(msg).fadeIn(300);
			setTimeout(function () {
				jQuery("#wsm_promo_msg").fadeOut(500);
			}, 2000);
		});
	});
});
