@extends('adminlte::layouts.app')

@section('htmlheader_title')
{{ trans('adminlte_lang::message.home') }}
@endsection

@section('contentheader_title')
<a href="{{route('admin.category.index')}}"> Category MANAGER </a>
@endsection
@section('main-content')
<?php 

use App\Helpers\Util; 
    
?>
<section class="content-header">
    <div class="row">
        <h1 class="col-md-6 pull-left">Information</h1>
        <h1 class="col-md-6  pull-right">
            <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{{ route('admin.category.edit',[$user->id]) }}">Edit</a>
        </h1>
    </div>
</section>
<div class="content">
    <div class="box box-primary">
        <div class="box-body">
            <div class="row">
                @include('admin.category.show_info')
                <div class="col-sm-12">
                    <a href="{{ route('admin.category.index') }}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
