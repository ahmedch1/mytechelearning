jQuery.noConflict();
(function($) {
	$(document).ready(function(){
		$('.lp-ctdrip__actions').click(function(){
			$(this).removeAttr("href").css("cursor","pointer");
			var driptype = $('input[name=_lp_content_drip_drip_type]:checked').val(),
				dataid = $(this).data('id'),
				dataurl = $(this).data('url');
			window.open(dataurl, '_blank');
		});
	});
})(jQuery)
