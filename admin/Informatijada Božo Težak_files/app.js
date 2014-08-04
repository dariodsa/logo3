
var app = angular.module( 'informatijada', ['TestRunnerApp','ngRoute','angularFileUpload'],
function( $routeProvider , $locationProvider ){

	$routeProvider
	  .when('/profile', {
        templateUrl: '/ngapp/view/profile.ngview.html',
        controller: 'ProfileController'
      })
	  .when('/sloagan', {
        templateUrl: '/ngapp/view/sloagan.ngview.html',
        controller: 'ProfileController'
      })
	  .when('/ready', {
        templateUrl: '/ngapp/view/ready.ngview.html',
        controller: 'ProfileController'
      })
	  
	   .when('/solutions', {
        templateUrl: '/ngapp/view/solutions.ngview.html',
        controller: 'SolutionsController'
      })
	  .when('/revisions/:id_problem', {
        templateUrl: '/ngapp/view/revisions.ngview.html',
        controller: 'RevisionsController',		
      })
	  .when('/messages', {
        templateUrl: '/ngapp/view/messages.ngview.html',
        controller: 'MessagesController'
      })
	  .when('/complaints', {
        templateUrl: '/ngapp/view/complaints.ngview.html',
        controller: 'ComplaintsController'
      })
	   .when('/rules', {
        templateUrl: '/ngapp/view/rules.ngview.html',
        controller: 'RulesController'
      })
	  
	  .otherwise({
        redirectTo: '/profile'
      });
	  
});
