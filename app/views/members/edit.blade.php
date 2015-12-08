@extends('layouts.adminform')

@section('form-title')
Edit Data Anggota
<div class="pull-right">
    <a href="{{ url('anggota/'.$member->slug) }}" target="_blank">Lihat Profil <i class="fa fa-chevron-circle-right fa-lg"></i></a>
</div>
@stop

@section('form-open')
{{ Form::model($member, array('class' => 'form form-bordered', 'method' => 'PATCH', 'route' => array('admin.members.update', $member->id), 'files' => true)) }}
@stop

@section('form-actions')
{{ link_to_route('admin.members.index', 'Cancel', null,array('class' => 'btn btn-default')) }}
<button type="submit" class="btn green"><i class="fa fa-check"></i> Save</button>
<a href="{{URL::to('admin/members/'.$member->id)}}" class="btn red" data-method="delete" data-confirm="Apakah Anda yakin ingin menghapus data ini?">Delete</a>
@stop

@section('form-left')
<div class="form-body form-horizontal">
	<div class="form-group">
		{{ Form::label('period', 'Periode:', array('class'=>'col-md-2 control-label')) }}
        <div class="col-sm-10">
        	{{ Form::select('period_id', $periods, Input::old('period_id'), array('class'=>'form-control')) }}
        </div>
    </div>
    <div class="form-group">
		{{ Form::label('area_id', 'Mewakili Provinsi', array('class'=>'col-md-2 control-label')) }}
        <div class="col-sm-10">
        	{{ Form::select('area_id', $areas, Input::old('area_id'), array('class'=>'form-control')) }}
		</div>
	</div>
	<h3 class="form-section">Biodata</h3>
    <div class="form-group">
        {{ Form::label('image', 'Foto Utama:', array('class'=>'col-md-2 control-label')) }}
        <div class="col-sm-10">
            @if($member->image)
                <p>{{ HTML::image( $member->image, NULL, array( 'style' => 'max-width:300px;','class' => 'img-responsive img-thumbnail') ) }}</p>
            @endif
            {{ Form::file('image') }}
        </div>
    </div>
    <div class="form-group">
		{{ Form::label('number', 'No. Anggota:', array('class'=>'col-md-2 control-label')) }}
        <div class="col-sm-10">
          {{ Form::text('number', Input::old('number'), array('class'=>'form-control', 'placeholder'=> $member->number)) }}
        </div>
    </div>
	<div class="form-group">
		{{ Form::label('name', 'Nama:', array('class'=>'col-md-2 control-label')) }}
        <div class="col-sm-10">
          {{ Form::text('name', Input::old('name'), array('class'=>'form-control', 'placeholder'=> $member->name)) }}
        </div>
    </div>
	<div class="form-group">
		{{ Form::label('pob', 'Tempat Lahir:', array('class'=>'col-md-2 control-label')) }}
        <div class="col-sm-10">
        	{{ Form::text('pob', Input::old('pob'), array('class'=>'form-control', 'placeholder'=> $member->pob)) }}
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('dob', 'Tanggal Lahir:', array('class'=>'col-md-2 control-label')) }}
        <div class="col-sm-10">
        	{{ Form::text('dob', Input::old('dob'), array('class'=>'form-control', 'placeholder'=> $member->dob)) }}
		</div>
	</div>
    <div class="form-group">
        {{ Form::label('title', 'Riwayat Pendidikan:', array('class'=>'col-md-2 control-label')) }}
        <div class="col-sm-10">
            <textarea name="riwayat_pendidikan" id="summernote_1">{{ $member->riwayat_pendidikan }}</textarea>
            <span class="help-block">Anda bisa menggunakan standar HTML syntax jika diperlukan</span>
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('title', 'Riwayat Pekerjaan:', array('class'=>'col-md-2 control-label')) }}
        <div class="col-sm-10">
            <textarea name="riwayat_pekerjaan" class="summernote">{{ $member->riwayat_pekerjaan }}</textarea>
            <span class="help-block">Anda bisa menggunakan standar HTML syntax jika diperlukan</span>
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('title', 'Riwayat Organisasi:', array('class'=>'col-md-2 control-label')) }}
        <div class="col-sm-10">
            <textarea name="riwayat_organisasi" class="summernote">{{ $member->riwayat_organisasi }}</textarea>
            <span class="help-block">Anda bisa menggunakan standar HTML syntax jika diperlukan</span>
        </div>
    </div>
</div>
@stop

@section('form-right')
<div class="portlet light bordered">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-cogs"></i> Fraksi
        </div>
    </div>
    <div class="portlet-body form">
        <div class="form-body">
            <div class="form-group">
            	{{ Form::label('fraction_id', 'Partai:', array('class'=>'control-label')) }}
                {{ Form::select('fraction_id', $fractions, Input::old('fraction_id'), array('class'=>'form-control')) }}
            </div>
            <div class="form-group">
            	{{ Form::label('fraction_position', 'Posisi:', array('class'=>'control-label')) }}
                {{ Form::select('fraction_position', array('0' => 'Anggota', '1' => 'Pimpinan'), Input::old('fraction_position'), array('class'=>'form-control')) }}
            </div>
            <div class="form-group">
            	{{ Form::label('fraction_order', 'Custom Order:', array('class'=>'control-label')) }}
                {{ Form::text('fraction_order', Input::old('fraction_order'), array('class'=>'form-control', 'placeholder'=> $member->fraction_order)) }}
                <span class="help-block">Urutan anggota akan ditampilkan dari angka yang terbesar hingga yang terkecil</span>
            </div>
        </div>
    </div>
</div>
<div class="portlet light bordered">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-cogs"></i> Badan / Organisasi
        </div>
    </div>
    <div class="portlet-body form">
        <div class="form-body">
            <div class="form-group">
                {{ Form::label('organization_id', 'Badan:', array('class'=>'control-label')) }}
                {{ Form::select('organization_id', $organizations, Input::old('organization_id'), array('class'=>'form-control')) }}
            </div>
            <div class="form-group">
                {{ Form::label('organization_position', 'Posisi:', array('class'=>'control-label')) }}
                {{ Form::select('organization_position', array('0' => 'Anggota', '1' => 'Pimpinan'), Input::old('organization_position'), array('class'=>'form-control')) }}
            </div>
            <div class="form-group">
                {{ Form::label('organization_subposition', 'Jabatan:', array('class'=>'control-label')) }}
                {{ Form::text('organization_subposition', Input::old('organization_subposition'), array('class'=>'form-control', 'placeholder'=> $member->organization_subposition)) }}
                <span class="help-block">Informasi jabatan akan ditampilkan di profil anggota</span>
            </div>
            <div class="form-group">
                {{ Form::label('organization_order', 'Custom Order:', array('class'=>'control-label')) }}
                {{ Form::text('organization_order', Input::old('organization_order'), array('class'=>'form-control', 'placeholder'=> $member->organization_order)) }}
                <span class="help-block">Urutan anggota akan ditampilkan dari angka yang terbesar hingga yang terkecil</span>
            </div>
        </div>
    </div>
</div>
<div class="portlet light bordered">
  <div class="portlet-title">
    <div class="caption">
      <i class="fa fa-cogs"></i> Pengaturan
    </div>
  </div>
  <div class="portlet-body form">
    <div class="form-body">
      <div class="form-group">
        {{ Form::label('created_at', 'Tanggal Pembuatan:', array('class'=>'control-label')) }}
        {{ Form::text('created_at', Input::old('created_at'), array('class'=>'form-control form_datetime', 'placeholder'=> $member->created_at)) }}
      </div>
      <div class="form-group">
        {{ Form::label('status', 'Status Data:', array('class'=>'control-label')) }}
        {{ Form::select('status', array('0' => 'Tidak Ditampilkan', '1' => 'Tampilkan'), Input::old('status'), array('class'=>'form-control')) }}
      </div>
      <div class="form-group">
        {{ Form::label('comment_status', 'Status Komentar:', array('class'=>'control-label')) }}
        {{ Form::select('comment_status', array('0' => 'Tidak Ditampilkan', '1' => 'Tampilkan'), Input::old('comment_status'), array('class'=>'form-control')) }}
      </div>
      <div class="form-group">
        {{ Form::label('social_status', 'Social Media Sharing:', array('class'=>'control-label')) }}
        {{ Form::select('social_status', array('0' => 'Tidak Ditampilkan', '1' => 'Tampilkan'), Input::old('social_status'), array('class'=>'form-control')) }}
      </div>
      <div class="form-group">
          {{ Form::label('menu_order', 'Urutan Menu:', array('class'=>'control-label')) }}
          {{ Form::text('menu_order', Input::old('menu_order'), array('class'=>'form-control')) }}
        </div>
    </div>
  </div>
</div>
@stop