
app.controller('SolutionsController',function( $scope, $rootScope , ClientService , api , Menu ){	Menu.set('SolutionsController');	var _api = api('/api').use('Subcontest');	$scope.cs = ClientService;	$scope.displayFileContents = function( file ){		ClientService.getFileData( file );	};	$scope.currentFile = null;	$scope.files = ClientService._filemap;	ClientService.onFileData(function( filedata ){		$scope.currentFile = filedata;	});	$rootScope.$on("clienterror",function( x,  o ){		$scope.error = o;		console.log(x);	});	// for details
	$scope.revisionDetails = false;	$scope.revision = null;	$scope.problem = null;	$scope.previewRevisionDetails = function(problem,revision){
		$scope.revisionDetails = true;		$scope.problem = problem;		$scope.revision = revision;	}


	$scope.testcase = null;

	$scope.previewTestCases = function(problem,revision){
		$scope.testcase = ClientService.getTestCase(problem,revision);
		ClientService.runTests( $scope.testcase );
	}
});