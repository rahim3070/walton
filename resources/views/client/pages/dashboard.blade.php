@extends('client.client_master')
@section('client_content')
<!-- Breadcrumb-->
<div class="row pt-2 pb-2">
    <div class="col-sm-12">
        <h4 class="page-title">Dashboard</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{URL::to('/')}}">Dashboard</a></li>
        </ol>
    </div>
</div>
<!-- End Breadcrumb-->

<div class="row">
    <div class="col-lg-3">
    </div>
    <div class="col-lg-6">
        <div class="card card-danger">
            <div class="card-body">
                <img src="{{URL::to('public/asset_client/images/happyfaceman.png')}}" class="card-img-top" alt="Happy Face Man"/>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
    </div>
</div>
@endsection