app.controller("ComplaintsController",function( $scope , api , Menu ){
	
	Menu.set("ComplaintsController");
	
	var _api = api('/api').use('Subcontest');
	
	_api.call("getSubcontestsInProgress").ready(function( r ){

		$scope.rounds = r;		
		console.log(r);
		
		for (var x in r){
			r[x].problems
		}
	});
	
	
	
	
	


});