
app.factory('ClientApi',function( $http , $rootScope ) {


	var extendPromise = function( promise , params )
	{
		promise.params = params;
		promise.ready = function( usersCompleteCallback ) {
				
			promise.success(function( response , code ) {
				var response = $.xml2json( response );
					
				usersCompleteCallback( response , promise );				
				$rootScope.$emit( 'clientsuccess',response );
				 
			});
			return promise;
		}
		
		// serverside system error
		promise.error(function(data, status, headers, config){
			var type = "Unknown";			
			switch ( status ) {				
				case 500:
					type="API error";
					data = {
						message:$(data).find("message").text(),
						data:$(data).find("data").text()
					}
				break;
				case 505:
					type="Server error";
				break;
				case 0:
					type="Connection error";
				break;
			}
			
			$rootScope.$emit( 'clienterror' ,
				{ type:type , data:data, status:status, headers:headers, config:config }
			);	
		
			
			
		});
		
		return promise;
	
	}
	
	
	var apiConstructor  = function( endPoint , entityName )
	{

		var _api =  {
			
			endPoint:endPoint,
			
			entityName:entityName,
			
			use:function( entityName )
			{
				this[ entityName ] = new apiConstructor( endPoint , entityName );
				
				return this[ entityName ];
				
			},
			extend:function( methodName ) {
				var t = this;
				var method = this[ methodName ] = function( params ) {
					return t.call( methodName , params );
				};
				
				return t;
			},
			call:function( methodName , params ) {
				params = params || {};
				
				var promise = $http({
					url: this.endPoint + '/' + methodName 
					, 
					params: params 
					,
					method: 'GET'
				});
				
				return extendPromise( promise , params );
			}
		};
		
	
		return _api;
	
	}
	
	return apiConstructor;
});
