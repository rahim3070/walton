@extends('client.client_master')
@section('client_content')
<!-- Breadcrumb-->
<div class="row pt-2 pb-2">
    <div class="col-sm-12">
        <h4 class="page-title">Create, Rename, Delete, Copy & Move File & Directory</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{URL::to('/')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Client Navigation</li>
            <li class="breadcrumb-item active">Directory</li>
            <li class="breadcrumb-item" aria-current="page"><a href="{{URL::to('/cre-ren-del')}}">Create, Rename, Delete, Copy & Move File & Directory</a></li>
        </ol>
    </div>
</div>
<!-- End Breadcrumb-->
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header"><i class="fa fa-table"></i> Create, Rename, Delete, Copy & Move File & Directory ...
                <h5 style="color:green; text-align: center; font-size: 13px;">
                    <?php
                    $alert = Session::get('msg');

                    if ($alert) {
                        echo $alert;
                        Session::put('msg', null);
                    }
                    ?>
                </h5>
                <h5 style="color:red; text-align: center; font-size: 13px;">
                    <?php
                    $alert = Session::get('alert');

                    if ($alert) {
                        echo $alert;
                        Session::put('alert', null);
                    }
                    ?>
                </h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card card-primary">
                            <div class="card-body">
                                <form id="create_dir" method="post">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label>Directory Path</label>
                                        <input id="dir_path" type="text" name="dir_path" class="form-control" placeholder="Give a Directory Path to Create" autocomplete="off" required>
                                    </div>
                                    <div class="form-footer">
                                        <button type="submit" class="btn btn-dark shadow-dark m-1"><i class="fa fa-check-square-o"></i> Create</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card card-danger">
                            <div class="card-body">
                                <form id="rename_dir" method="post">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label>Directory Path</label>
                                        <input id="dir_path1" type="text" name="dir_path1" class="form-control" placeholder="Give a Directory Path for Rename" autocomplete="off" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Rename Directory Path</label>
                                        <input id="dir_path2" type="text" name="dir_path2" class="form-control" placeholder="Give a Directory Path to Rename" autocomplete="off" required>
                                    </div>
                                    <div class="form-footer">
                                        <button type="submit" class="btn btn-dark shadow-dark m-1"><i class="fa fa-check-square-o"></i> Rename</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card card-success">
                            <div class="card-body">
                                <form id="delete_dir" method="post">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label>Directory Path</label>
                                        <input id="dir_path_del" type="text" name="dir_path_del" class="form-control" placeholder="Give a empty Directory Path for Delete" autocomplete="off" required>
                                    </div>
                                    <div class="form-footer">
                                        <button type="submit" class="btn btn-dark shadow-dark m-1"><i class="fa fa-check-square-o"></i> Delete</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card card-primary">
                            <div class="card-body">
                                <form id="copy_dir" method="post">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label>Source Directory Path</label>
                                        <input id="dir_path_src" type="text" name="dir_path_src" class="form-control" placeholder="Give a source Directory Path" autocomplete="off" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Destination Directory Path</label>
                                        <input id="dir_path_dest" type="text" name="dir_path_dest" class="form-control" placeholder="Give a destination Directory Path" autocomplete="off" required>
                                    </div>
                                    <div class="form-footer">
                                        <button type="submit" class="btn btn-dark shadow-dark m-1"><i class="fa fa-check-square-o"></i> Copy</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card card-danger">
                            <div class="card-body">
                                <form id="move_dir" method="post">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label>Source Directory Path</label>
                                        <input id="dir_path_src1" type="text" name="dir_path_src1" class="form-control" placeholder="Give a source Directory Path" autocomplete="off" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Destination Directory Path</label>
                                        <input id="dir_path_dest2" type="text" name="dir_path_dest2" class="form-control" placeholder="Give a destination Directory Path" autocomplete="off" required>
                                    </div>
                                    <div class="form-footer">
                                        <button type="submit" class="btn btn-dark shadow-dark m-1"><i class="fa fa-check-square-o"></i> Move</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
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
    $('#create_dir').on('submit', function (e) {
        if (!e.isDefaultPrevented()) {
            var dir_path = $('#dir_path').val();

            if (dir_path) {
                $.ajax({
                    url: "{{ route('create-dir-info') }}",
                    type: "POST",
                    data: new FormData($("#create_dir")[0]),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function (data) {
                        Toast.fire({
                            icon: 'success',
                            title: 'Wait Please.'
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
            } else {
                Toast.fire({
                    icon: 'warning',
                    title: 'Directory Path required.'
                });
            }

            return false;
        }
    });

    $('#rename_dir').on('submit', function (e) {
        if (!e.isDefaultPrevented()) {
            var dir_path1 = $('#dir_path1').val();
            var dir_path2 = $('#dir_path2').val();

            if (dir_path1) {
                if (dir_path2) {
                    $.ajax({
                        url: "{{ route('rename-dir-info') }}",
                        type: "POST",
                        data: new FormData($("#rename_dir")[0]),
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function (data) {
                            Toast.fire({
                                icon: 'success',
                                title: 'Wait Please.'
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
                } else {
                    Toast.fire({
                        icon: 'warning',
                        title: 'Rename Directory Path required.'
                    });
                }
            } else {
                Toast.fire({
                    icon: 'warning',
                    title: 'Directory Path required.'
                });
            }

            return false;
        }
    });

    $('#delete_dir').on('submit', function (e) {
        if (!e.isDefaultPrevented()) {
            var dir_path = $('#dir_path_del').val();

            if (dir_path) {
                $.ajax({
                    url: "{{ route('delete-dir-info') }}",
                    type: "POST",
                    data: new FormData($("#delete_dir")[0]),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function (data) {
                        Toast.fire({
                            icon: 'success',
                            title: 'Wait Please.'
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
            } else {
                Toast.fire({
                    icon: 'warning',
                    title: 'Directory Path required.'
                });
            }

            return false;
        }
    });
    
    $('#copy_dir').on('submit', function (e) {
        if (!e.isDefaultPrevented()) {
            var dir_path_src = $('#dir_path_src').val();
            var dir_path_dest = $('#dir_path_dest').val();

            if (dir_path_src) {
                if (dir_path_dest) {
                    $.ajax({
                        url: "{{ route('copy-dir-info') }}",
                        type: "POST",
                        data: new FormData($("#copy_dir")[0]),
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function (data) {
                            Toast.fire({
                                icon: 'success',
                                title: 'Wait Please.'
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
                } else {
                    Toast.fire({
                        icon: 'warning',
                        title: 'Destination Directory Path required.'
                    });
                }
            } else {
                Toast.fire({
                    icon: 'warning',
                    title: 'Source Directory Path required.'
                });
            }

            return false;
        }
    });
    
    $('#move_dir').on('submit', function (e) {
        if (!e.isDefaultPrevented()) {
            var dir_path_src = $('#dir_path_src1').val();
            var dir_path_dest = $('#dir_path_dest2').val();

            if (dir_path_src) {
                if (dir_path_dest) {
                    $.ajax({
                        url: "{{ route('move-dir-info') }}",
                        type: "POST",
                        data: new FormData($("#move_dir")[0]),
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function (data) {
                            Toast.fire({
                                icon: 'success',
                                title: 'Wait Please.'
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
                } else {
                    Toast.fire({
                        icon: 'warning',
                        title: 'Destination Directory Path required.'
                    });
                }
            } else {
                Toast.fire({
                    icon: 'warning',
                    title: 'Source Directory Path required.'
                });
            }

            return false;
        }
    });
});
</script>
@endsection