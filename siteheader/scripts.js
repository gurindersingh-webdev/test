jQuery(document).ready(function () {
	jQuery('.block-siteheader-menutoggle').click(function (event) {
	event.preventDefault();

	if (jQuery(this).attr('aria-expanded') == 'true') {
		jQuery(this).attr('aria-expanded', 'false');
	} else {
		jQuery(this).attr('aria-expanded', 'true');
	}
		jQuery('.block-siteheader-nav').toggleClass('block-siteheader-nav-hidden');
	});

	jQuery('.mobile-close').on('click', function() {
		jQuery('.block-siteheader-nav').addClass('block-siteheader-nav-hidden');
		jQuery('.block-siteheader-menutoggle').attr('aria-expanded', false);
	});
});