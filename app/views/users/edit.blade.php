@extends('layouts.adminform')

@section('form-title')
Edit Data Artikel
@stop

@section('form-open')
{{ Form::model($post, array('class' => 'form-bordered', 'method' => 'PATCH', 'route' => array('admin.posts.update', $post->id), 'files' => true)) }}
@stop

@section('form-actions')
{{ link_to_route('admin.posts.index', 'Cancel', null,array('class' => 'btn btn-default')) }}
<button type="submit" class="btn green"><i class="fa fa-check"></i> Save</button>
<a href="{{URL::to('admin/posts/'.$post->id)}}" class="btn red" data-method="delete" data-confirm="Apakah Anda yakin ingin menghapus data ini?">Delete</a>
@stop

@section('form-left')
<div class="form-body form-horizontal">
  <div class="form-group">
    {{ Form::label('category', 'Kategori:', array('class'=>'col-md-2 control-label')) }}
    <div class="col-sm-10">
      {{ Form::select('post_category_id', $postcategories, Input::old('post_category_id'), array('class'=>'form-control')) }}
    </div>
  </div>
  <div class="form-group">
    {{ Form::label('title', 'Judul:', array('class'=>'col-md-2 control-label')) }}
      <div class="col-sm-10">
        {{ Form::text('title', Input::old('title'), array('class'=>'form-control', 'placeholder'=> $post->title)) }}
        <span class="help-block">
          Link ke halaman ini: {{ url('posts') }}/{{ Form::text('slug', Input::old('slug')) }}
          <a href="{{ url('posts/'.$post->slug) }}" target="_blank">Lihat <i class="fa fa-chevron-circle-right"></i></a>
        </span>
      </div>
  </div>
  <div class="form-group">
    {{ Form::label('title', 'Konten:', array('class'=>'col-md-2 control-label')) }}
      <div class="col-sm-10">
        <textarea name="content" id="summernote_1">{{ $post->content }}</textarea>
        <span class="help-block">Anda bisa menggunakan standar HTML syntax jika diperlukan</span>
    </div>
  </div>
  <div class="form-group">
    {{ Form::label('image', 'Foto Utama:', array('class'=>'col-md-2 control-label')) }}
    <div class="col-sm-10">
      @if($post->image)
        <p>{{ HTML::image( $post->image, NULL, array( 'style' => 'max-width:300px;','class' => 'img-responsive img-thumbnail') ) }}</p>
      @endif
      {{ Form::file('image') }}
    </div>
  </div>
  <div class="form-group">
    {{ Form::label('excerpt', 'Ringkasan:', array('class'=>'col-md-2 control-label')) }}
    <div class="col-sm-10">
      {{ Form::text('excerpt', Input::old('excerpt'), array('class'=>'form-control', 'placeholder'=> $post->excerpt)) }}
      <span class="help-block">
        Ringkasan dari berita akan ditampilkan di halaman depan untuk memudahkan pembaca
      </span>
    </div>
  </div>
  @if (Session::get('documentmessage'))
  <div class="alert alert-success">
      <strong><i class="fa fa-check"></i> {{Session::get('documentmessage')}}</strong>
  </div>
  @endif
  <div class="form-group">
    {{ Form::label('document', 'Dokumen:', array('class'=>'col-md-2 control-label')) }}
      <div class="col-sm-10">
        {{ Form::file('documents[]', ['multiple' => true]) }}
        {{ Form::file('documents[]', ['multiple' => true]) }}
        {{ Form::file('documents[]', ['multiple' => true]) }}
        {{ Form::file('documents[]', ['multiple' => true]) }}
        {{ Form::file('documents[]', ['multiple' => true]) }}
        <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th>ID</th>
              <th>Judul</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
          @foreach($post->documents as $document)
            <tr>
              <td>{{$document->id}}</td>
              <td>{{$document->name}}</td>
              <td>
                <a href="{{URL::to('admin/documents/'.$document->id)}}" class="btn red" data-method="delete" data-confirm="Apakah Anda yakin ingin menghapus data ini?">Delete</a>
                  </td>
            </tr>
          @endforeach
          </tbody>
        </table>
      </div>
      </div>
  </div>
</div>
@stop

@section('form-right')
<div class="portlet light bordered">
  <div class="portlet-title">
    <div class="caption">
      <i class="fa fa-cogs"></i> Pengaturan
    </div>
  </div>
  <div class="portlet-body form">
    <div class="form-body">
      @include('includes.postmeta')
      </div>
    </div>
  </div>
</div>
@stop