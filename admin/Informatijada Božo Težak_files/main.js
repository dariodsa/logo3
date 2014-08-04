
app.controller('MainController', function( $rootScope , $scope , $sce , $location , api , ClientService , Menu ){

	$scope.menu = Menu;

	// link handling

	$scope.isActive = function (viewLocation)
	{
        return $location.path().indexOf(viewLocation) == 0;
    };

	$scope.options = [
		{'title':'Profil','url':'/profile','state_index_range':[0]},
		{'title':'Slogan','url':'/sloagan','state_index_range':[1]},
		{'title':'Spremnost','url':'/ready','state_index_range':[2]},
		{'title':'Zadaci / Rješenja','url':'/solutions','state_index_range':[3,4]},
		{'title':'Poruke','url':'/messages','state_index_range':[3,4]},
		{'title':'Žalbe','url':'/complaints','state_index_range':[4,5]},
		{'title':'Rezultati','url':'/results','state_index_range':[4,5]},
		{'title':'Pravila natjecanja','url':'/rules','state_index_range':[0,1,2,3,4,5,6,7]},
	];

	var stateLocationMap = {
		'PROFILE_REVIEW' :'/profile',
		'SLOAGAN_SELECTION':'/sloagan',
		'READY':'/ready',
		'SOLVING':'/solutions'
	};
	
	// $location.path('/messages');

	ClientService.onStateChange(function(current,next){
		console.log("State change registered", current,next);
		
		if ( next in stateLocationMap )
			$location.path( stateLocationMap[ next ] );
	});

	console.log( ClientService.advancingstate );

	


	// error handling
	$scope.error = null;

	$scope.cs = ClientService;

	$rootScope.clientHelperActive = false;

	$scope.setError = function( title , details )
	{
		$scope.error = {
			title: title,
			message: $sce.trustAsHtml( details )
		};
	}

	$scope.dismissError = function()
	{
		$scope.error = null;
	}

	$rootScope.$on('clienterror', function( e , p ) {
		console.log("client helper error!!");
		$rootScope.clientHelperChecked = true;
		
		if (p.status == 0)
			$rootScope.clientHelperActive = false;
	});
	
	// $rootScope.clientHelperTestMode = true;
	$rootScope.clientHelperChecked = false;

	$rootScope.identify = function(){
		$rootScope.clientHelperChecked = false;
		ClientService._clientapi.call('Identify').ready(function(r){
			$rootScope.clientHelperActive = true;
			$rootScope.clientHelperChecked = true;
		});
	};
	
	$rootScope.identify();
	
	
	$rootScope.$on('clientsuccess', function( e , message ) {
		$rootScope.clientHelperActive = true;
		$rootScope.clientHelperChecked = true;
		//console.log("client helper active...");
	});

	

	// message handling
	$scope.message = null;

	$scope.setMessage = function( message )
	{
		$scope.message = message;
	}

	$scope.dismissMessage = function()
	{
		$scope.message = null;
	}

	$rootScope.$on('success', function( e , message ) {
		$scope.setMessage( message );
	});


});
