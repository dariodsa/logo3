(function(){
	// debug pause
	// $(window).keydown(function(e) { if (e.keyCode == 27) debugger; });

	// window bluring
	function onBlur() {
		document.body.className = 'blurred';
	};
	function onFocus(){
		document.body.className = 'focused';
	};

	if (/*@cc_on!@*/false) { // check for Internet Explorer
		document.onfocusin = onFocus;
		document.onfocusout = onBlur;
	} else {
		window.onfocus = onFocus;
		window.onblur = onBlur;
	}

	angular.extendUpdate = function( a , b )
	{

		for ( var x in b )
		{
			if ( a[x] != b[x] ) {
				if (a[x])
					angular.extend( a[x] , b[x] )
				else
					a[x] = b[x]
			}
		}

	}

})();


app

.service('Iconized',function( $sce ){
	return function( map ){
		var map = map;
		return function( key , noIcon )
		{
			if ( !( key in map ) )
				return null;

			var item = map[key];
			var text = item[0];
			var icon = item[1];
			var color = item[2];

			if (noIcon)
				return text;

			var html =  "<i class='fa fa-lg fa-" + icon + "' style='color:"+color+"'></i> " + "<span>" + text + "</span>";
			return $sce.trustAsHtml( html );
		}

	};
})