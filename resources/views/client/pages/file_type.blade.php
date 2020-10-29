@extends('client.client_master')
@section('client_content')
<script type="text/javascript">
    //Create a boolean variable to check for a valid Internet Explorer instance. 
    var xmlhttp = false;
    //Check if we are using IE.
    try {
        //If the Javascript version is greater than 5.
        xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
        //alert(xmlhttp);
        //alert ("You are using Microsoft Internet Explorer."); 
    } catch (e) {
        //alert(e);
        //If not, then use the older active x object.
        try {
            //If we are using Internet Explorer.
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            //alert ("You are using Microsoft Internet Explorer");
        } catch (E) {
            //Else we must be using a non-IE browser.
            xmlhttp = false;
        }
    }
    //alert(typeof XMLHttpRequest1221);
    //If we are using a non-IE browser, create a javascript instance of the object.
    if (!xmlhttp && typeof XMLHttpRequest != 'undefined') {
        xmlhttp = new XMLHttpRequest();
        //alert ("You are not using Microsoft Internet Explorer");
    }

    function makerequest_filetype(filetype, objID) {
        //var obj = document.getElementByld(objID): 
        serverPage = 'ajax-filetype-info-check/' + filetype;
        xmlhttp.open("GET", serverPage);
        xmlhttp.onreadystatechange = function ()
        {
            //alert(xmlhttp.readyState);
            //alert(xmlhttp status);
            if (xmlhttp.readyState === 4 && xmlhttp.status === 200)
            {
                //alert(xmlhtto responseText);
                document.getElementById(objID).innerHTML = xmlhttp.responseText;
                ////document.getElementByld(objcw).innerHTML = xmlhttp.responseText;

                if (xmlhttp.responseText === 'This File Type is Already Exists !!!')
                {
                    document.getElementById('submit_button').disabled = true;
                }

                if (xmlhttp.responseText === 'This File Type is Available')
                {
                    document.getElementById('submit_button').disabled = false;
                }
            }
        };
        xmlhttp.send(null);
    }
</script>

<!-- Breadcrumb-->
<div class="row pt-2 pb-2">
    <div class="col-sm-12">
        <h4 class="page-title">File Types</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{URL::to('/')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Client Navigation</li>
            <li class="breadcrumb-item active">Settings</li>
            <li class="breadcrumb-item" aria-current="page"><a href="{{URL::to('/filetype')}}">File Types</a></li>
        </ol>
    </div>
</div>
<!-- End Breadcrumb-->
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header"><i class="fa fa-table"></i> All File Types Info ...
                <div class="card-action">
                    <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#modal-animation-1">Add New</button>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="common-datatable" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Type</th>
                                <th>Last Update</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($types_info as $ft_info)
                            <tr>
                                <td><?php echo $ft_info->type ?></td>
                                <td><?php echo date('d/m Y', strtotime($ft_info->updated_at)) ?></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-animation-1" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content animated flipInX">
            <div class="modal-header">
                <h5 class="modal-title"> New Users</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form id="filetype-info" method="post">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">File Type (Without .)</label>
                        <div class="col-sm-9">
                            <input name="filetype" id="filetype" type="text" onblur="makerequest_filetype(this.value, 'res')" class="form-control" autocomplete="off" placeholder="File Size" onfocus="this.placeholder = ''" onblur="this.placeholder = 'File Size'" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <span id="res" style="color: red"></span>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                    <button type="submit" id="submit_button" class="btn btn-primary"><i class="fa fa-check-square-o"></i> Save</button>
                </div>
            </form>
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
        $('#modal-animation-1 form').on('submit', function (e) {
            if (!e.isDefaultPrevented()) {
                var filetype = $('#filetype').val();

                if (filetype) {
                    $.ajax({
                        url: "{{ route('save-filetype') }}",
                        type: "POST",
                        data: new FormData($("#modal-animation-1 form")[0]),
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function (data) {
                            $('#modal-animation-1').modal('hide');
                            Toast.fire({
                                icon: 'success',
                                title: 'Data stored successfully.'
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
                        title: 'File Type is Required.'
                    });
                }

                return false;
            }
        });
    });
</script>
@endsection