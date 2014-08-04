
$(function(){
	$('a[rel=lightbox]').lightBox();
	
	
	// bootstrap tabs
	////////////////////////////////////////////////////////
	
	try {
	var url = document.location.toString();
	if (url.match('#'))
		$('.nav-tabs a[href=#'+url.split('#')[1]+']').tab('show') ;
		
	} catch (ex){
	
	}
	
	// Change hash for page-reload
	$('.nav-tabs a').on('shown', function (e) {
		window.location.hash = e.target.hash;
	})
	
	$('.nav-tabs a').click(function(e){	
		e.preventDefault();
		window.location.hash = $(this).attr("href");
		$(this).tab('show');
	});
	
});
