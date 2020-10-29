@extends('client.client_master')
@section('client_content')
<!-- Breadcrumb-->
<div class="row pt-2 pb-2">
    <div class="col-sm-12">
        <h4 class="page-title">Upload, Download, Preview</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{URL::to('/')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Client Navigation</li>
            <li class="breadcrumb-item" aria-current="page"><a href="{{URL::to('/up-down-pre')}}">Upload, Download, Preview</a></li>
        </ol>
    </div>
</div>
<!-- End Breadcrumb-->
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header"><i class="fa fa-table"></i> Upload, Download, Preview ...
                <h5 id="alert_msg" style="color:red; text-align: center; font-size: 13px;">
                    <?php
                    $alert = Session::get('alert');

                    if ($alert) {
                        echo $alert;
                        Session::put('alert', null);
                    }
                    ?>
                </h5>
                <div class="card-action">
                    <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#modal-animation-2">Add New</button>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    @foreach ($img_info as $v_info)
                    <div class="col-md-6 col-lg-3 col-xl-3">
                        <a href="{{URL::to($v_info->image_path)}}" data-fancybox="images" data-caption="{{$v_info->caption}}">
                            <img src="{{URL::to($v_info->image_path)}}" alt="lightbox" class="lightbox-thumb img-thumbnail">
                        </a>
                        <label><a href="{{URL::to('download-image/'.$v_info->id)}}"> Download</a></label>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-animation-2" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content animated rollIn">
            <div class="modal-header">
                <h5 class="modal-title"> Image Upload</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form id="filetype-info" method="post">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Image Caption</label>
                        <div class="col-sm-10">
                            <input name="img_size" id="img_size" value="{{$sizes_info->size}}" type="hidden" class="form-control" placeholder="Image Size" readonly>
                            <input name="img_type" id="img_type" value="{{$types_info->type}}" type="hidden" class="form-control" placeholder="Image Type" readonly>
                            <input name="img_caption" id="img_caption" type="text" class="form-control" placeholder="Image Caption" autocomplete="off" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Image (Max 5)</label>
                        <div class="col-sm-10 image-input">
                            <input name="product_image[]" id="product_image" type="file" class="form-control" accept="image/*" multiple="multiple" required>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
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

jQuery(document).ready(function () {
    var img_size = $('#img_size').val();
    var img_type = $('#img_type').val();

    jQuery('.image-input input').each(function () {
        $this = jQuery(this);
        $this.on('change', function () {
            var fsize = $this[0].files[0].size,
                    ftype = $this[0].files[0].type,
                    fname = $this[0].files[0].name,
                    fextension = fname.substring(fname.lastIndexOf('.') + 1);
            validExtensions = [img_type];
            
            if ($.inArray(fextension, validExtensions) == -1) {
                //alert("Please select " + img_type + " file.");
                Toast.fire({
                    icon: 'warning',
                    title: "Please select " + img_type + " file."
                });
                this.value = "";
                return false;
            } else {
//                if (fsize === img_size) {
//
//                } else {
//                    Toast.fire({
//                        icon: 'warning',
//                        title: "Please select less than " + formatFileSize(img_size) + " file."
//                    });
//                    this.value = "";
//                    return false;
//                }
            }
        });
    });
});

function formatFileSize(bytes, decimalPoint) {
    if (bytes == 0)
        return '0 Bytes';
    var k = 1000,
            dm = decimalPoint || 0,
            sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB'],
            i = Math.floor(Math.log(bytes) / Math.log(k));
    return parseFloat((bytes / Math.pow(k, i)).toFixed(dm)) + ' ' + sizes[i];
}
</script>

<script src="{{URL::to('public/asset_client/js/jquery.1.11.2.min.js')}}"></script>
<script type="text/javascript">
//Insert data by Ajax
$(function () {
    $('#modal-animation-2 form').on('submit', function (e) {
        if (!e.isDefaultPrevented()) {
            var img_caption = $('#img_caption').val();
            var product_image = $('#product_image').val();
            
            if (img_caption) {
                if (product_image) {
                    $.ajax({
                        url: "{{ route('save-image-info') }}",
                        type: "POST",
                        data: new FormData($("#modal-animation-2 form")[0]),
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function (data) {
                            $('#modal-animation-2').modal('hide');
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
                        title: 'Product Image is Required.'
                    });
                }
            } else {
                Toast.fire({
                    icon: 'warning',
                    title: 'Image Caption is Required.'
                });
            }

            return false;
        }
    });
});
</script>
@endsection