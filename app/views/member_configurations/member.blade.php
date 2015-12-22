@extends('layouts.member')

@section('content')
<div class="row">
	<div class="col-md-12">
		<h3 class="page-title">
			Member Configuration
		</h3>
		@if (Session::get('message'))
		<div class="alert alert-success">
		    <strong><i class="fa fa-check"></i> {{Session::get('message')}}</strong>
		</div>
		@endif

		{{Form::open(array('url' => 'member/configuration', 'method' => 'post'))}}

		<div class="table-responsive">
			<table class="table mpr_datatable">
				<tbody>
					@foreach ($member_configurations as $member_configuration)
					<tr>
						<td>{{Form::label('param_code', $member_configuration->param_code)}}</td>
						<td class="text-center">{{ Form::text($member_configuration->param_code, Input::old($member_configuration->param_code), array('class'=>'form-control', 'placeholder' => $member_configuration->param_value)) }}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
					<button type="submit" class="btn green"><i class="fa fa-check"></i> Save</button>
		</div>
	</div>
	{{ Form::close() }}

</div>
@stop