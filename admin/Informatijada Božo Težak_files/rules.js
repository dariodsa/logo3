app.controller("RulesController",function( $scope , ClientService , Menu ){
	
	Menu.set('RulesController');
	
	$scope.userstate = ClientService.userstate;

	$scope.accept = function(){
		ClientService.acceptTerms();
	};

});