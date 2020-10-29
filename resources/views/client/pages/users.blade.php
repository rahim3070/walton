@extends('client.client_master')
@section('client_content')
<!-- Breadcrumb-->
<div class="row pt-2 pb-2">
    <div class="col-sm-12">
        <h4 class="page-title">Users</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{URL::to('/')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Client Navigation</li>
            <li class="breadcrumb-item" aria-current="page"><a href="{{URL::to('/users')}}">Users</a></li>
        </ol>
    </div>
</div>
<!-- End Breadcrumb-->
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header"><i class="fa fa-table"></i> All Users Info ...
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="common-datatable" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Last Update</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users_info as $aui_info)
                            <tr>
                                <td><?php echo $aui_info->name ?></td>
                                <td><?php echo $aui_info->email ?></td>
                                <td><?php echo date('d/m Y', strtotime($aui_info->created_at)) ?></td>
                                <td>
                                    <?php if ($aui_info->status == 0) { ?>
                                        <span class="badge badge-secondary shadow-secondary m-1">In Active</span>
                                    <?php } else { ?>
                                        <span class="badge badge-primary shadow-primary m-1">Active</span>
                                    <?php } ?>
                                </td>
                                <td>
                                    <a appo-id="<?php echo $aui_info->id ?>" 
                                       p-name="<?php echo $aui_info->name ?>" 
                                       data-toggle="modal" data-target="#modal-animation-14" class="btn btn-outline-secondary waves-effect waves-light m-1" title="Edit"> <i class="fa fa-pencil" title="Edit"></i> </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div id="modal-animation-14" class="modal fade" data-backdrop="static">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content animated fadeInUp">
                                <div class="modal-header">
                                    <h5 class="modal-title">Update Users</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                </div>
                                <form id="auupdate-info" method="post">
                                    {{ csrf_field() }}
                                    <div class="modal-body m-3">                                    
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Name</label>
                                            <div class="col-sm-9">
                                                <input name="user_id" type="hidden" class="form-control" autocomplete="off" placeholder="Users ID" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Users ID'" readonly>
                                                <input name="p_name" type="text" class="form-control" autocomplete="off" placeholder="Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Name'" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{URL::to('public/asset_client/js/jquery.1.11.2.min.js')}}"></script>
<script type="text/javascript">
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 2000,
        timerProgressBar: true,
        onOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    });

    //Insert data by Ajax
    $(function () {
        $('#modal-animation-14 form').on('submit', function (e) {
            if (!e.isDefaultPrevented()) {
                $.ajax({
                    url: "{{ route('update-user') }}",
                    type: "POST",
                    data: new FormData($("#modal-animation-14 form")[0]),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function (data) {
                        $('#modal-animation-14').modal('hide');
                        Toast.fire({
                            icon: 'success',
                            title: 'Data updated successfully.'
                        });

                        setTimeout(function () {// wait for 5 secs(2)
                            location.reload(); // then reload the page.(3)
                        }, 3000);
                    },
                    error: function (data) {
                        Toast.fire({
                            icon: 'warning',
                            title: 'Something is wrong, please try again ...'
                        });
                    }
                });

                return false;
            }
        });
    });
</script>

<script src="{{URL::to('public/asset_client/js/jquery.2.1.1.min.js')}}"></script>
<script src="{{URL::to('public/asset_client/js/bootstrap.3.3.6.min.js')}}"></script>

<script type="text/javascript">
    $('#modal-animation-14').on('show.bs.modal', function (e) {
        // get information to update quickly to modal view as loading begins
        var opener = e.relatedTarget;//this holds the element who called the modal 

        //we get details from attributes
        var appoid = $(opener).attr('appo-id');
        var pname = $(opener).attr('p-name');
        
        //set what we got to our form
        $('#auupdate-info').find('[name="user_id"]').val(appoid);
        $('#auupdate-info').find('[name="p_name"]').val(pname);
    });
</script>
@endsection