
var serverOffset = 0;

(function() {
	Date.prototype.toYMDHis = Date_toYMDHis;
	function Date_toYMDHis() {
		var year, month, day;
		year = String(this.getFullYear());
		month = String(this.getMonth() + 1);
		if (month.length == 1) {
			month = "0" + month;
		}
		day = String(this.getDate());
		if (day.length == 1) {
			day = "0" + day;
		}
		return year + "-" + month + "-" + day + " " + this.toTimeString().split(' ')[0];
	}

	Date.nowOffset = Date_NowOffset;
	function Date_NowOffset( offset ){
		offset = offset || 0;
		return (new Date( Date.now() + offset ));
	};



	var localStartDate = new Date();


	$.ajax({
	   type: 'GET',
	   url:'/void.html',
	   data: null,
	   success: function(data, textStatus, request){
			var serverDate = new Date( request.getResponseHeader('Date') );
			var localEndDate = new Date();
			var travelTime = localEndDate - localStartDate ;

			serverOffset = localStartDate - serverDate - travelTime/2;
	   }
	  });

})();




app

.filter('since',function( ) {

	return function( time , omitPrefix )
	{

		var offset = serverOffset;

		if (!time)
			return "n/a";

		var d = new Date( time );
		var diff = Date.now() - offset - d.getTime();
		var prefix = "";

		if ( diff > 0)
		{
			prefix = "prije ";
		}
		else
		{
			prefix = "za ";
			diff *= -1;
		}

		if (omitPrefix)
			prefix = "";

		var seconds = parseInt(diff / 1000) % 60;
		var minutes = parseInt(diff / 1000 / 60) % 60;
		var hours = parseInt(diff / 1000 / 60 / 60) % 24;
		var days =  parseInt(diff / 1000 / 60 / 60 / 24) % 7;
		var weeks =  parseInt(diff / 1000 / 60 / 60 / 24 / 7);

		var out = "";

		if (weeks > 1)
			out += " " + weeks + "tj"
		else
			days += weeks*7;

		if (days > 0)
			out += " " + days + "d"

		if (hours > 0)
			out += " " + hours + "h";


		if ( days <= 1 ) {


			if (minutes > 0)
				out += " " + minutes + "min";

			if (minutes == 0 && seconds > 3)
				out += " " + seconds + "s";

		}

		if ( out == "" && seconds <= 3 )
			return "upravo sada";

		return prefix + out;
	}
})

.filter('toTime',function(){
	return function( totalSec ){
		var parts  = (totalSec+"").split(".");

		var hours = parseInt( totalSec / 3600 ) % 24;
		var minutes = parseInt( totalSec / 60 ) % 60;
		var secondsDec = totalSec % 60;
		var seconds = parseInt(totalSec) % 60;


		var result = (hours < 10 ? "0" + hours : hours) + ":"
			+ (minutes < 10 ? "0" + minutes : minutes) + ":"
			+ (seconds  < 10 ? "0" + seconds : seconds)
		;
		return result;
	};
})

.filter('toDate',function(){
	return function( YMD ){
		return (YMD) ? ( YMD.split('-').reverse().join(".") + "." ) : "";
	};
})

.filter('toGrade',function(){
	return function( schoolStartYear , useSuffix ){
		var d = new Date();

		var diff = d.getFullYear() - schoolStartYear;
		var month = d.getMonth();


		if ( month >= 9 )
			diff++;

		grade = diff;

		var suffix = ( diff > 8 ) ? 'SŠ' : 'OŠ' ;

		if ( grade > 8 )
			grade -= 8;

		var suffix = ( useSuffix ) ?  ". r. " + suffix : "";
		return grade + suffix ;


		// rujan 1996 1.r
		// svibanj 1997 1.r


	};
})

.filter('toInt',function(){
	return function( number ){
		return parseInt( number );
	};
})

.filter('toNetworkFile',function(){
	return function( localFile ){
		if ( ! (localFile && localFile.replace ) )
			return "";

		var file = localFile.replace('D:\\temp\\','');

		file = file.replace("\\","\/");

		return file;

	};
})

.filter('toBasename',function(){
	return function( filename )
	{
		return (filename && filename.split ) ? filename.split("\\").pop() : "";
	}
})

.filter('toDiacritic',function(){
	return function( str )
	{
		if (!str)
			return str;

		var str = str;
		str = str.replace('\u010d','č');
		str = str.replace('\u0107','ć');
		return str;
	}
})

.filter('phaseContext',function(){
	var phaseContext = {

		'WARMUP':'default',
		'FIRST_IN_PROGRESS':'info',
		'FIRST_TIMEOUT':'default',
		'SECOND_IN_PROGRESS':'info',
		'SECOND_TIMEOUT':'default',
		'LAST_IN_PROGRESS':'info',
		'BONUS_CASE_OFFER':'info',
		'SOLUTION_RECONSIDERATION':'warning',
		'REVIEW_AND_COMPLAINTS':'warning',
		'TEMPORARY_RESULTS':'warning',
	}
	return function ( phase, current ){

		if (!phase)
			return 'default';

		if ( current )
		{
			phase.phase_index*=1;
			current.phase_index*=1;

			if ( phase.phase_index  < current.phase_index )
				return 'success';

			if ( phase.phase_index == current.phase_index )
				return 'danger';

		}

		return phaseContext[ phase.phaseName ];


	}
})

.filter('autoContext',function(){

	var contexts = [  'info' , 'warning' , 'danger' , 'success' ];
	var c = -1;
	var map = {};

	return function( value )
	{
		if (!(value in map))
			map[value] = ++c;

		return contexts[ map[value] % contexts.length ] ;
	};

})

.filter("sumFields",function(){
	return function( values , field , onlyPositive )
	{
		var total = 0.0;
		for ( var x in values )
		{
			var val = 1.0 * values[x][field];
			total += Math.max( val , (onlyPositive) ? 0 : val );
		}
		return total;
	}
})

.filter("machineFilter",function(){
	return function( values , filter , search )
	{

		var out = {};

		for (var x in values)
		{

			out[x] = values[x];

			if (!filter)
				continue;

			if (filter == 'all')
				continue;

			if (filter == 'active')
				if ( values[x].active )
					continue;

			if (filter == 'inactive')
				if ( !values[x].active )
					continue;

			if ( search )
				if ( values[x].name.indexOf( search) >= 0 )
					continue;

			delete out[x];
		}

		return out;

	}
})

.filter("objectLength",function(){
	return function( values )
	{

		var length = 0;

		for (var x in values)
			length++;

		return length;

	}
})

.filter('phaseDisplayName',function(){
	var map = {
		'PENDING':'Cekanje',

		'WARMUP':'Zagrijavanje',
		'FIRST_IN_PROGRESS':'RASPOLOVNICA',
		'FIRST_TIMEOUT':'Prva pauza',
		'SECOND_IN_PROGRESS':'DRUGI DIO',
		'SECOND_TIMEOUT':'Druga pauza',
		'LAST_IN_PROGRESS':'ZAVRŠNICA',
		'BONUS_CASE_OFFER':'BONUS CASE PONUDA',
		'SOLUTION_RECONSIDERATION':'Odabir rješenja',
		'REVIEW_AND_COMPLAINTS':'Pregled bodova i žalbe',
		'TEMPORARY_RESULTS':'Privremeni rezultati',
		'BONUS_CASE_PROGRESS':'Bonus case',

		'CONTEST_COMPLETE':'Natjecanje završeno'
	};
	return function( key ){	return map[ key ]; };
})

.filter('stateDisplay',function( Iconized ){
	return Iconized({
		'SENDING':['Slanje u tijeku','upload','gray'],
		'SUBMITTED':['Dostavljeno','code','blue'],
		'COMPILED':['Prihvaćeno','thumbs-up','green'],
		'REJECTED':['Odbijeno','bug','red'],
		'DELAYED':['Trenutno nedozvoljeno','stop','orange'],

		'EVALUATION_PENDING':['Čeka evaluaciju','clock-o','blue'],
		'EVALUATION_PROGRESS':['Evaluacija u tijeku','clock-o','orange'],
		'EVALUATION_COMPLETE':['Evaluacija završena','circle-o','green'],
		'EVALUATION_REJECTED':['Evaluacija odbijena','circle-o','red'],
	});
})

.filter('executionStatusDisplay',function( Iconized ){
	return Iconized({
		'OK':['Unutar ograničenja','thumbs-up','orange'],
		'TLE':['Vremensko ograničenje premašeno','clock-o','red'],
		'MLE':['Memorijsko ograničenje premašeno','exclamation-circle','red'],

	});
})

.filter('eventTypeDisplay',function( Iconized ){
	return Iconized({
		'USER_LOGIN_SUCCESS':['Prijavljen korisnik','user','gray'],
		'USER_LOGIN_FAILURE':['Pogrešna prijava','frown-o','red'],
		'USER_ADD_SOLUTION':['Poslano rješenje','code','blue'],
		'USER_ADD_TEST':['Stvoren test','code','purple'],
		'USER_TEST_SOLUTION':['Testirano rješenje','arrow-right','black'],
		'USER_ACCEPTED_BONUS_CASE':['Prihvatio BONUS CASE','thumbs-up','green'],
		'USER_REJECTED_BONUS_CASE':['Odbio BONUS CASE','thumbs-down','orange'],
		'USER_OPENED_BONUS_CASE':['Otvorio BONUS CASE','code','green'],

		'USER_STATE_CHANGE':['Natjecateljska akcija','user','green'],
		'USER_ACCEPT_TERMS':['Natjecatelj prihvatio pravila','user','orange'],
		'USER_LANGUAGE_SELECTION':['Natjecatelj odabrao jezik','code','green'],
		'USER_BIND_MACHINE':['Natjecatelj odabrao/promjenio računalo','desktop','blue'],

		'SOLUTION_ACCEPTED':['Rješenje prihvaćeno','thumbs-up','green'],
		'SOLUTION_REJECTED':['Rješenje odbačeno','bug','red'],

		'EXECUTION_SCHEDULED':['Čeka izvršenje','clock-o','blue'],
		'EXECUTION_COMPLETE':['Izvršeno','circle-o','orange'],
		'EXECUTION_ERROR':['Greška pri izvršenju','bug','red'],

		'EVALUATION_PARTIAL':['Evaluiran primjer','tint','orange'],
		'EVALUATION_PENDING':['Čeka evaluaciju','clock-o','blue'],
		'EVALUATION_PROGRESS':['Evaluacija u tijeku','clock-o','orange'],
		'EVALUATION_COMPLETE':['Evaluacija završena','circle-o','green'],
		'EVALUATION_REJECTED':['Evaluacija odbijena','circle-o','red'],

		'CONTEST_PHASE_CHANGE':['Faza natjecanja','clock-o','purple'],

	});
})

