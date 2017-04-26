@extends('adminlte::layouts.app')
@section('contentheader_title')
<a href="{{route('admin.users.index')}}"> USERS MANAGER </a>
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
                {!! Form::model( $user_edit,['route' => ['admin.users.update', $user_edit->id], 'method' => 'put']) !!}

                @include('admin.users.field')

                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection