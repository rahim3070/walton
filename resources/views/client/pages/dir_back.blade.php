@extends('client.client_master')
@section('client_content')
<!-- Breadcrumb-->
<div class="row pt-2 pb-2">
    <div class="col-sm-12">
        <h4 class="page-title">Directory go back and forward</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{URL::to('/')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Client Navigation</li>
            <li class="breadcrumb-item active">Directory</li>
            <li class="breadcrumb-item" aria-current="page"><a href="{{URL::to('/dir-back')}}">Directory go back and forward</a></li>
        </ol>
    </div>
</div>
<!-- End Breadcrumb-->
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header"><i class="fa fa-table"></i> Directory go back and forward ...
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-2">
                    </div>
                    <div class="col-lg-8">
                        <div class="card card-danger">
                            <div class="card-body">
                                <div class="alert alert-icon-warning alert-dismissible" role="alert">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <div class="alert-icon icon-part-warning">
                                        <i class="icon-exclamation"></i>
                                    </div>
                                    <div class="alert-message">
                                        <span><strong>Warning !!!</strong> <a href="javascript:void();" class="alert-link">I am not understand this option.</a></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection