
@extends('adminlte::layouts.app')

@section('htmlheader_title')
{{ trans('adminlte_lang::message.home') }}
@endsection
@section('contentheader_title')
<a href="{{route('admin.users.index')}}"> USERS MANAGER </a>
@endsection
@section('main-content')

<section class="content-header">
    <div class="row">
        <h1 class="col-md-6 pull-left">Create</h1> 
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
                <form action="{{route('admin.users.store')}}" method="post" >
                    {{ csrf_field() }}
                    @include('admin.users.field')
                </form>

            </div>
        </div>
    </div>
</div>
@endsection