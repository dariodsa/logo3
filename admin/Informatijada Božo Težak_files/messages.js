app.controller("MessagesController",function( $scope, ClientService , Menu ){
	
	Menu.set("MessagesController");
	
	$scope.cs = ClientService;
	
});