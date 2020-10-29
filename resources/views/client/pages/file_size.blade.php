@extends('client.client_master')
@section('client_content')
<script type="text/javascript">
    function OnlyNumber(e) {  /* Code Address : http://www.ascii-code.com/ */
        var keyCode = (e.which) ? e.which : e.keyCode;
        var ret = ((keyCode >= 48 && keyCode <= 57) || keyCode == 8);
        document.getElementById("numeric").style.display = ret ? "none" : "inline";
        return ret;
    }
</script>

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

    function makerequest_filesize(filesize, objID) {
        //var obj = document.getElementByld(objID): 
        serverPage = 'ajax-filesize-info-check/' + filesize;
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

                if (xmlhttp.responseText === 'This File Size is Already Exists !!!')
                {
                    document.getElementById('submit_button').disabled = true;
                }

                if (xmlhttp.responseText === 'This File Size is Available')
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
        <h4 class="page-title">File Size</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{URL::to('/')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Client Navigation</li>
            <li class="breadcrumb-item active">Settings</li>
            <li class="breadcrumb-item" aria-current="page"><a href="{{URL::to('/filesize')}}">File Size</a></li>
        </ol>
    </div>
</div>
<!-- End Breadcrumb-->
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header"><i class="fa fa-table"></i> All File Size Info ...
                <div class="card-action">
                    <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#modal-animation-5">Add New</button>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="common-datatable" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Size</th>
                                <th>Last Update</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sizes_info as $fs_info)
                            <tr>
                                <td><?php echo $fs_info->size ?></td>
                                <td><?php echo date('d/m Y', strtotime($fs_info->updated_at)) ?></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-animation-5" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content animated rotateIn">
            <div class="modal-header">
                <h5 class="modal-title"> New Users</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form id="filesize-info" method="post">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">File Size (In Bytes)</label>
                        <div class="col-sm-9">
                            <input name="filesize" id="filesize" type="text" onblur="makerequest_filesize(this.value, 'res')" class="form-control" autocomplete="off" placeholder="File Size" onfocus="this.placeholder = ''" onblur="this.placeholder = 'File Size'" ondrop="return false;" onkeypress="return OnlyNumber(event);" onpaste="return false;" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <span id="numeric" style="color: Red; display: none">* Number Only</span>
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
        $('#modal-animation-5 form').on('submit', function (e) {
            if (!e.isDefaultPrevented()) {
                var filesize = $('#filesize').val();

                if (filesize) {
                    $.ajax({
                        url: "{{ route('save-filesize') }}",
                        type: "POST",
                        data: new FormData($("#modal-animation-5 form")[0]),
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function (data) {
                            $('#modal-animation-5').modal('hide');
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
                        title: 'File Size is Required.'
                    });
                }

                return false;
            }
        });
    });
</script>
@endsection