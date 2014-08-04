'use strict';
	
app

.controller('UploadController', function ($scope, $rootScope, $fileUploader) {
	// Creates a uploader
	var uploader = $scope.uploader = $fileUploader.create({
		scope: $scope,
		url:  $scope.uploadURL || 'upload.php'
	});


	// ADDING FILTERS

	// Images only
	uploader.filters.push(function(item /*{File|HTMLInputElement}*/) {
		var type = uploader.isHTML5 ? item.type : '/' + item.value.slice(item.value.lastIndexOf('.') + 1);
		type = '|' + type.toLowerCase().slice(type.lastIndexOf('/') + 1) + '|';
		return '|jpg|png|jpeg|'.indexOf(type) !== -1;
	});


	// REGISTER HANDLERS

	uploader.bind('afteraddingfile', function (event, item) {
		console.info('After adding a file', item);
	});

	uploader.bind('afteraddingall', function (event, items) {
		console.info('After adding all files', items);
		uploader.uploadAll();
	});

	uploader.bind('beforeupload', function (event, item) {
		console.info('Before upload', item);
	});

	uploader.bind('progress', function (event, item, progress) {
		console.info('Progress: ' + progress, item);
	});

	uploader.bind('success', function (event, xhr, item, response) {
		console.info('Success', xhr, item, response);
	});

	uploader.bind('cancel', function (event, xhr, item) {
		console.info('Cancel', xhr, item);
	});

	uploader.bind('error', function (event, xhr, item, response) {
		console.info('Error', xhr, item, response);
	});

	uploader.bind('complete', function (event, xhr, item, response) {
		console.info('Complete', xhr, item, response);
		
		$rootScope.$emit('uploadComplete',{item:item,response:response});
	});

	uploader.bind('progressall', function (event, progress) {
		console.info('Total progress: ' + progress);
	});

	uploader.bind('completeall', function (event, items) {
		console.info('Complete all', items);
		$rootScope.$emit('uploadCompleteAll',{items:items});
		uploader.clearQueue();
	});
})