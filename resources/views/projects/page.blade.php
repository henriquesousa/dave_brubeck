@extends('layout.sbadmin')

@section('content')

<p>
  <ol class="breadcrumb">
    <li><a href="{!! route('dashboard.index') !!}">Dashboard</a></li>
    <li><a href="{!! route('project.index') !!}">Projetos</a></li>
    <li><a href="{!! route('project.show', ['id' => $project->id]) !!}">{{$project->name}}</a></li>
    <li class="active">{!! $section->name !!}</li>
    <li class="active">Nova Página</li>
  </ol>
</p>

<h1 class="page-header">
  <i class="fa fa-clipboard"></i>
  Nova Página <small>{!! $project->name !!}</small>
</h1>

@include('partials.alerts')

@if($page != null)
{!! Form::open(['url' => route('page.update', ['id' => $project->id, 'section_id' => $section->id, 'page_id' => $page->id]), 'id' => 'page-form']) !!}
@else
{!! Form::open(['url' => route('page.save', ['id' => $project->id, 'section_id' => $section->id]), 'id' => 'page-form']) !!}
@endif
<div class="row">
  <div class="col-md-12 text-right">
    @include('partials.daveBtnSalvar', ['label' => 'Salvar Página'])
  </div>
</div>

<div class="form-group">
  <label for="title" class="control-label">Título da Página</label>
  <input class="form-control" type="text" name="title" value="{!! $page != null ? $page->title : old('title') !!}" id="title">
</div>

<div class="row">
  <div class="col-md-6">
    <fieldset>
      <legend>Conteúdo da página</legend>
      <textarea name="content" class="form-control" id="content" rows="15">
        {!! $page != null ? $page->content : old('content') !!}
      </textarea>
    </fieldset>
  </div>
  <div class="col-md-6">
    <fieldset>
      <legend>Preview</legend>
      <div id="preview"></div>
    </fieldset>
  </div>
</div>

{!! Form::close() !!}

<p></p>

<p class="text-right">
  <a class="text-danger" href="{!! route('page.remove', ['project_id' => $project->id, 'page_id' => $page->id]) !!}">[remover página]</a>
</p>

@section('scripts')
@parent
<script src="/bower_components/markdown/lib/markdown.js"></script>
<script src="/js/project/project.js"></script>
@endsection

@endsection