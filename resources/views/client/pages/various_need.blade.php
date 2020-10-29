@extends('client.client_master')
@section('client_content')
<!-- Breadcrumb-->
<div class="row pt-2 pb-2">
    <div class="col-sm-12">
        <h4 class="page-title">Pagination, Searching, Sorting, Refresh</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{URL::to('/')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Client Navigation</li>
            <li class="breadcrumb-item" aria-current="page"><a href="{{URL::to('/various-need')}}">Pagination, Searching, Sorting, Refresh</a></li>
        </ol>
    </div>
</div>
<!-- End Breadcrumb-->
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header"><i class="fa fa-table"></i> Pagination, Searching, Sorting, Refresh ...
                <div class="row" style="margin-top: 15px;">
                    <div class="col-lg-4">
                        <form class="search-bar" action="{{ route('search-product') }}" method="get">
                            <input name="product" id="product" autocomplete="off" type="text" class="form-control" placeholder="Search ..." style="width: 260px;">
                            <a type="submit"><i class="icon-magnifier"></i></a>
                        </form>
                    </div>
                    <div class="col-lg-4">
                        <div class="btn-group float-sm-right">
                            <button type="button" class="btn btn-outline-primary waves-effect waves-light"><i class="fa fa-cog mr-1"></i> Sorting</button>
                            <button type="button" class="btn btn-outline-primary dropdown-toggle dropdown-toggle-split waves-effect waves-light" data-toggle="dropdown">
                                <span class="caret"></span>
                            </button>
                            <div class="dropdown-menu">
                                <a href="{{URL::to('/search-pro/'.'asc')}}" class="dropdown-item">Ascending</a>
                                <a href="{{URL::to('/search-pro/'.'desc')}}" class="dropdown-item">Descending</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card-action">
                            <a href="{{URL::to('/various-need')}}" class="btn btn-primary waves-effect waves-light"> Refresh</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <ul class="pagination">
                    {!! $all_products->links() !!}
                </ul>
                <br>
                <div class="row">
                    @foreach ($all_products as $v_info)
                    <div class="col-lg-4">
                        <div class="card card-primary">
                            <img src="{{URL::to($v_info->image_option)}}" class="card-img-top" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title text-primary">{{$v_info->product_name}}</h5>
                                <p class="card-text">{{$v_info->short_description}}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $(document).on('click', '.pagination a', function (event) {
            event.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            shop(page);
        });

        function shop(page)
        {
            $.ajax({
                url: "/shop?page=" + page,
                success: function (data)
                {
                    $('#shop_data').html(data);
                }
            });
        }
    });
</script>
@endsection