@extends('layouts.newmember')

@section('customcss')
{{ HTML::style('packages/orgchart/jquery.orgchart.css') }}

<style type="text/css">
#orgChart{
    width: auto;
    height: auto;
}

#orgChartContainer{
    width: 1000px;
    height: 500px;
    overflow: auto;
    background: #eeeeee;
}

    </style>
@stop
@section('content')
<div class="row">
	<div class="col-md-12">
		<h2 class="page-header text-center">
		@if(Session::get(''))
			Member Structure
		</h2>
		<div id="orgChartContainer">
	    	<div id="orgChart"></div>
	    </div>
	    <div id="consoleOutput">
	    </div>
	</div>
</div>
@stop

@section('pagelevel-js')

{{ HTML::script('packages/orgchart/jquery.orgchart.js') }}
@stop
@section('customjs')
var basepath = document.location.origin;
var member = 0;
	$.getJSON( basepath+"/gnt-aops/public/ajax/gettree/"+member, function( json ) {
	  console.log( "JSON Data: " + json );
	    org_chart = $('#orgChart').orgChart({
	        data: json,
	        showControls: false,
	        allowEdit: false,
	        onClickNode: function(node){
	            log('Clicked node '+node.data.id);
	        }

	    });
	});

    // just for example purpose
    function log(text){
        $('#consoleOutput').append('<p>'+text+'</p>')
    }
@stop