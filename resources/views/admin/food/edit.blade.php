@extends('adminlte::layouts.app')
@section('contentheader_title')
<a href="{{route('admin.food.index')}}"> Foods MANAGER </a>
@endsection
@section('main-content')
<section class="content-header">
    <div class="row">
        <h1 class="col-md-6 pull-left">Edit</h1>
    </div>
</section>
<div class="content">
    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="box box-primary">
        <div class="box-body">
            <div class="row">
                {!! Form::model( $food_edit,['route' => ['admin.food.update', $food_edit->id], 'method' => 'put','enctype'=>'multipart/form-data']) !!}
                {{ csrf_field() }}
                @include('admin.food.field')

                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection