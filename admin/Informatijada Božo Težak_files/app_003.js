
app

.directive("ngClipboard",function(){
	return {
        restrict: "A",
        link: function (scope, element, attrs)
		{
			// console.log("ngClipboard",attrs);

			var client = new ZeroClipboard( element[0] );

			element.addClass( attrs.clipboardClass );

			client.on("aftercopy",function(){
				element.removeClass( attrs.clipboardClass );
			})
        }
    };
})

.directive("ngShowHover",function(){
	return {
        restrict: "A",
        link: function (scope, element, attrs)
		{

			var ref = element.closest( attrs.ngShowHover )

			ref
				.mouseenter(function(){
					element.show()
				})
				.mouseleave(function(){
					element.hide()
				})

			element.hide();

        }
    };
})

.directive("ngPopover",function( $compile ){
	return {
        restrict: "A",
        link: function (scope, element, attrs)
		{
			// console.log("ngClipboard",attrs);

			var ref = element.parent();

			ref.popover({
					html:'true',
					placement:'bottom',
					content:function() {
						 return $compile($( attrs.ngPopover ).html())(scope);
					 }
				});

			$(document).click(function(e){
				if ( $(e.target).hasClass("popover-content") || $(e.target).closest(".popover-content").length > 0  )
					return true;
				ref.popover("hide");
				// return false;
			});

			ref.click(function(e){
				ref.popover("show");

				if ( ! scope.$$phase )
					scope.$digest();

				e.stopPropagation();
				return false;

			});

        }
    };
})

.directive("ngNormSvg",function(api){
	return {
        restrict: "A",
        link: function (scope, element, attrs)
		{
	

			scope.$watch(attrs.ngNormSvg,function(id){
				api('/api').use('ScoreKeeper').callPost(attrs.method,{id_verification_result:id}).ready(function(r){
					element.css("width","800px");
					element.css("height","800px");
					element.css("overflow","hidden");
					element.css("position","absolute");
					element.css("left","0px");
					element.css("top","0px");
					element.html( r );
					var svg = element.find("svg");
					svg.css("width","1000px");
					svg.css("height","1000px");
				})
			});
        }
    };
})

// vraca detalje usporedbe za logo evaluaciju
.directive("ngNormComparer",function(api){

	return {
        restrict: "A",
        link: function (scope, element, attrs)
		{

			var id = null;
			var refresh = function(){
				element.html("...");
				api('/api').use('ScoreKeeper').callPost('getBestComparerDetails',{id_verification_result:id}).ready(function(r){
					element.html( r );
				})
			}
			scope.$watch(attrs.ngNormComparer,function(attrValue){
				id = attrValue;
				refresh();
			});

			element.dblclick(function(){

				refresh();
			});
        }
    };
})

.directive("ngTristate",function(){
	return {
        restrict: "A",

        link: function (scope, element, attrs)
		{

			attrs.$observe('ngTristate', function(val) {
				var value = attrs.ngTristate;

				element.removeClass();

				console.log("ngTristate",attrs.ngTristate,attrs);

				if ( value === null || value === "" || value === undefined )
				{
					element.addClass("fa fa-circle-thin")
					element.css("color","gray");
					return;
				}

				if ( parseInt(value) > 0  )
				{
					element.addClass("fa fa-check")
					element.css("color","green");
					return;
				}

				if ( parseInt(value) == 0 )
				{
					element.addClass("fa fa-times")
					element.css("color","red");
					return;
				}

			});



        }
    };
})

.directive("ngTooltip",function($compile){
    return {
        restrict: "AEC",
        link: function (scope, element, attrs)
		{
			element.tooltip({
				'title':attrs.ngTooltip
			});

        }
    };
})

.directive("ngTabLink",function(){
	return {
		restrict:'A',
		link:function(scope, element, attrs){
			element.click(function (e) {
			  e.preventDefault()
			  element.tab('show')
			})
		}
	}
})

.directive('ngVisible', function () {
    return function (scope, element, attr) {
        scope.$watch(attr.ngVisible, function (visible) {
            element.css('visibility', visible ? 'visible' : 'hidden');
        });
    };
})

.directive("ngFieldMeta",function( $rootScope ){
	return {
		restrict:'A',
		scope:{
			ngFieldMeta:"="
		},
		link:function(scope, element, attrs){
			var fieldMeta = scope.ngFieldMeta;
			for (var x in fieldMeta){
				if ( fieldMeta[x][0] == 'ForeignKey' ){
					var refEntity = fieldMeta[x][1][0];
					var refField = fieldMeta[x][1][1];
					// element.attr("href","#/structure/"+refEntity);
					element.addClass("foreign-key");
					scope.refEntity = refEntity;
					element.attr("href","#/structure/"+refEntity);
					element.append($("<i class='fa fa_arrow-right'></i>"));
					element.append($("<span> "+refEntity+"."+refField+" </span>"));
				}
			}

		}
	}
})

.directive("enumer", function ($parse) {
    return {
        restrict: "E",
		template:
			''
			+ '<span class="fa-stack enumer">'
			+ '<i class="fa fa-circle fa-stack-2x"></i>'
			+ '<i class="fa fa-inverse fa-stack-1x" style="color:green">{{model}}</i>'
			+ '</span>'
		,
		replace: true,
		scope: {
			model: "@",
		},
        link: function (scope, element, attrs)
		{

        }
    };
})

.directive("ngProgress", function ($parse) {
    return {
        restrict: "A",
		template:
			''
			+ '<div class="progress">'
			+	'<div class="progress-bar" role="progressbar" aria-valuenow="{{current}}" aria-valuemin="0" aria-valuemax="{{total}}" style="width: {{percent}}%;">'
			+    '<span class="sr-only">{{percent}}%</span>{{current}} / {{total}} | {{percent}}% '
			+  '</div>'
			+ '</div>'
		,
		replace: true,
		scope: {
			model: "=",
			current: "@",
			total: "@"
		},
        link: function (scope, element, attrs)
		{
			scope.$watch('current',function(){
				scope.percent = parseInt( 100 * scope.current*1 / scope.total*1 );
			});
			scope.$watch('total',function(){
				scope.percent = parseInt( 100 * scope.current*1 / scope.total*1 );
			});

        }
    };
})

.directive("ngProgressPartial", function ($parse , $compile) {
    return {
        restrict: "A",
		template:
			''
			+ '<div class="progress-bar {{ngProgressPartial}}" style="width: {{percent}}%">'
			+ '<span ng-transclude></span>'
			+ '</div>'
		,
		replace:true,
		transclude:true,
		scope: {
			model: "=",
			current: "@",
			total: "@",
			'ngProgressPartial': "@"
		},
        link: function (scope, element, attrs)
		{

			var refresh = function()
			{
				var p = (parseInt( 10000 * scope.current*1 / scope.total*1 ) || 0) / 100;
				scope.percent = Math.max( p , 0 );
			}

			scope.$watch('current',refresh);
			scope.$watch('total',refresh);

        }
    };
})

.directive("modalShow", function ($parse) {
    return {
        restrict: "A",
        link: function (scope, element, attrs) {

            //Hide or show the modal
            scope.showModal = function (visible, elem) {
                if (!elem)
                    elem = element;

                if (visible)
                    $(elem).modal("show");
                else
                    $(elem).modal("hide");
            }

            //Watch for changes to the modal-visible attribute
            scope.$watch(attrs.modalShow, function (newValue, oldValue) {
                scope.showModal(newValue, attrs.$$element);
            });

            //Update the visible value when the dialog is closed through UI actions (Ok, cancel, etc.)
            $(element).bind("hide.bs.modal", function () {
                $parse(attrs.modalShow).assign(scope, false);
                if (!scope.$$phase && !scope.$root.$$phase)
                    scope.$apply();
            });
        }

    };
})

.service('Menu', function( $rootScope ) {
    var  t = {
      controller:null,
	  set:function( controller ){
		t.controller = controller;
		if ( ! $rootScope.$$phase )
			$rootScope.$apply();
	  }
    };
	return t;
});


; // app
