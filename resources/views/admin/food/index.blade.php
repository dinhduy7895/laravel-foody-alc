@extends('adminlte::layouts.app')

@section('htmlheader_title')
{{ trans('adminlte_lang::message.home') }}
@endsection 

@section('contentheader_title')
<a href="{{route('admin.food.index')}}"> Categories MANAGER </a>
@endsection


@section('main-content')

<div class="content-header">
    <div class="row">
        <h1 class="col-md-6 pull-left">Index</h1>
        <h1 class="col-md-6  pull-right">
            <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{{ route('admin.food.create') }}">Add New</a>
        </h1>
    </div>
</div>
<div class="container">

    <div class="header clearfix">
        <nav class="navbar">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>





                </div>
            </div>
        </nav>
    </div>
</div>
<div class="container-fluid spark-screen">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            <!-- Default box -->
            <div class="box">
                <table class=" table table-responsive table-bordered" id="cities-table">
                    <thead>
                    <th>User</th>
                    <th>Category</th>
                    <th>Name</th>
                    <th>content</th>
                    
                    <th class="text-center" colspan="3">Action</th>
                    </thead>
                    <thead>
                    <th>
                        <div class="" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control search" name="name" id="name" placeholder="Search for...">
                            </div>
                        </div>
                    </th>
                     <th>
                        <div class="" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control search" name="email" id="email" placeholder="Search for...">
                            </div>
                        </div>
                    </th>
                    </thead>
                    <tbody class="read">
                    @include('admin.food.table')
                    </tbody>

                </table>

            </div>

        </div>
    </div>
</div>
@endsection
