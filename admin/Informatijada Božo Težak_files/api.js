app.service('Entity',function( ){

	// mock of api
	var callback = null;

	var store = {};

	return function( entity , _callback ) {

		if ( _callback )
			callback = _callback;


		if (  entity &&  ( ! (entity in store) ) )
			store[entity] = {};

		var t = {
			ById:function( id ){

				if ( ! ( id in store[ entity ] ) )
					store[ entity ][ id ] = {};

				if ( callback )
					callback( entity , id , function( r ){
						angular.extend( store[ entity ][ id ] , r );
					});

				return store[ entity ][ id ];
			},		
			store:function( item ){
				var id = item.id;
				store[ entity ][ id ] = item;
			}
		}

		return t;

	}

});



app.factory('api',function( $http , $rootScope , Entity ){




	var extendPromise = function( promise , params )
	{
		promise.params = params;
		promise.ready = function( usersCompleteCallback ) {
			promise.success(function( response ) {
				if ( response && response.status == 'success' )
				{
					usersCompleteCallback( response.result , promise );
					$rootScope.$emit('success',response.message);

				}
				else if ( ! response.status )
				{
					// server error
					$rootScope.$emit( 'error' ,
						{ type:"Server error" , data:response }
					);

				}
				else if ( response.status == 'error' )
				{
					// api error
					$rootScope.$emit( 'error' ,
						{ type:"API error" , data:response }
					);

				}

			});
			return promise;
		}

		// serverside system error
		promise.error(function(data, status, headers, config){
			$rootScope.$emit( 'error' ,
				{ type:'Server' , data:data, status:status, headers:headers, config:config }
			);
		});

		promise.withAutoStore = function( _api ){

			promise.ready(function(r){
				if ( (typeof r) == (typeof []) )
					for (var x in r)
						Entity( _api.entityName ).store( r[x] );
				else
					Entity( _api.entityName ).store( r )

			});

			return promise;
		}

		return promise;
	}


	var apiConstructor  = function( endPoint , entityName )
	{

		var _api = {

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

				var promise = $http.get(  this.endPoint + '/' + this.entityName + '/@' + methodName , {params: params} );

				return extendPromise( promise , params );
			},
			callPost:function( methodName , params ) {
				params = params || {};
				var promise = $http.post(  this.endPoint + '/' + this.entityName + '/@' + methodName , params );

				return extendPromise( promise , params );
			},

			find:function( params ){
				var params = params || {};

				var promise = $http({
					url:this.endPoint + '/' + this.entityName + '/@find?' + $.param( params ),
					method:'GET'
				});

				// store into Entity store for later use


				return extendPromise( promise , params ).withAutoStore( this );
			},

			findPrepend:function( params , obj , member , identifier ) {				
				var maxIdentifier = -1;
				for (var x in obj[member])
				{
					maxIdentifier = Math.max( maxIdentifier , obj[member][x][identifier] );
				}

				if (maxIdentifier > 0)
					params.gt = identifier + ',' + maxIdentifier;

				var promise = this.find(params);

				promise.ready(function(res){					
					for ( x = res.length - 1; x >= 0 ; x-- )
						obj[member].unshift( res[x] );
				});

				return promise;

			},

			fields:function(){
				return this.call('fields');
			},

			count:function( params ){
				return this.call('count' , params);
			},

			findFirst:function( filter  ){
				var params = filter || {};

				var promise = $http.get(  this.endPoint + '/' + this.entityName + '/@findFirst' , {params: params} );

				return extendPromise( promise , params ).withAutoStore( this );
			},

			findById:function( id ){
				var params = {};

				var promise = $http.get(  this.endPoint + '/' + this.entityName + '/' + id , {params: params} );

				return extendPromise( promise , params );
			},

			insert:function( params ) {
				params = params || {};
				var promise = $http.post(  this.endPoint + '/' + this.entityName + '/@insert' , params );

				return extendPromise( promise , params );
			},
			erase:function( id ) {
				var params = {};
				params.id = id;
				var promise = $http.post(  this.endPoint + '/' + this.entityName + '/@delete' , params );

				return extendPromise( promise , params );
			},
			update:function( params ) {
				params = params || {};
				var promise = $http.post(  this.endPoint + '/' + this.entityName + '/@update' , params );

				return extendPromise( promise , params );
			},
			commit:function( changeset ) {
				var promise = $http.post(  this.endPoint + '/' + this.entityName + '/@commit' , changeset );
				return extendPromise( promise , changeset );
			}

		};


		Entity( null , function( entity , id , resultCallback ){
			_api.use( entity ).findById( id ).ready( resultCallback );
		});


		return _api;

	}

	return apiConstructor;
});
