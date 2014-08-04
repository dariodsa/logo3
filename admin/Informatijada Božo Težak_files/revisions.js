app.controller("RevisionsController",function( $scope , ClientService , $routeParams , Menu ){
	
	Menu.set("RevisionsController");
	
	$scope.id_problem = $routeParams.id_problem;
	
	$scope.cs = ClientService;
	
	$scope.displayRevision = function( problem , revision ){	
		$scope.problem = problem;
		ClientService.getRevisionWithContents(revision).ready(function(revision){
			$scope.revision = revision;
			$("#revision_code").text( revision.contents );
			Prism.highlightAll();
		});
	};
	
	$scope.previewTestCases = function(problem,revision){
		$scope.testcase = ClientService.getTestCase(problem,revision);		
	}
	
	// console.log("we have a problem" , $scope.problem );

})