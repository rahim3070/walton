@extends('client.client_master')
@section('client_content')
<link href="{{URL::to('public/asset_client/filetree/default.css')}}" rel="stylesheet" type="text/css"/>
<script src="{{URL::to('public/asset_client/filetree/jquery-1.3.2.js')}}" type="text/javascript"></script>
<script src="{{URL::to('public/asset_client/filetree/php_file_tree_jquery.js')}}" type="text/javascript"></script>
<!-- Breadcrumb-->
<div class="row pt-2 pb-2">
    <div class="col-sm-12">
        <h4 class="page-title">Directory Tree</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{URL::to('/')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Client Navigation</li>
            <li class="breadcrumb-item active">Directory</li>
            <li class="breadcrumb-item" aria-current="page"><a href="{{URL::to('/file-tree')}}">Directory Tree</a></li>
        </ol>
    </div>
</div>
<!-- End Breadcrumb-->
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header"><i class="fa fa-table"></i> Directory Tree ...
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-2">
                    </div>
                    <div class="col-lg-8">
                        <div class="card card-danger">
                            <div class="card-body">
                                <h4>Browse ...</h4>
                                <br>
                                <ul class="php-file-tree">
                                    <li class="pft-directory">
                                        <a href="#">documents</a>
                                        <ul style="display: block;">
                                            <li class="pft-directory">
                                                <a href="#">excel docs</a>
                                                <ul style="display: block;">
                                                    <li class="pft-file ext-xls"><a href="javascript:alert('You clicked on demo/documents/excel docs/accounting.xls');">accounting.xls</a></li>
                                                    <li class="pft-file ext-xls"><a href="javascript:alert('You clicked on demo/documents/excel docs/ar.xls');">ar.xls</a></li>
                                                    <li class="pft-file ext-xls"><a href="javascript:alert('You clicked on demo/documents/excel docs/billing.xls');">billing.xls</a></li>
                                                    <li class="pft-file ext-xls"><a href="javascript:alert('You clicked on demo/documents/excel docs/math.xls');">math.xls</a></li>
                                                    <li class="pft-file ext-xls"><a href="javascript:alert('You clicked on demo/documents/excel docs/personal finances.xls');">personal finances.xls</a></li>
                                                </ul>
                                            </li>
                                            <li class="pft-directory">
                                                <a href="#">word documents</a>
                                                <ul style="display: block;">
                                                    <li class="pft-directory">
                                                        <a href="#">do it yourselfs</a>
                                                        <ul style="display: none;">
                                                            <li class="pft-file ext-doc"><a href="javascript:alert('You clicked on demo/documents/word documents/do it yourselfs/building a house.doc');">building a house.doc</a></li>
                                                            <li class="pft-file ext-doc"><a href="javascript:alert('You clicked on demo/documents/word documents/do it yourselfs/how to be a writer.doc');">how to be a writer.doc</a></li>
                                                            <li class="pft-file ext-doc"><a href="javascript:alert('You clicked on demo/documents/word documents/do it yourselfs/using styles.doc');">using styles.doc</a></li>
                                                            <li class="pft-file ext-doc"><a href="javascript:alert('You clicked on demo/documents/word documents/do it yourselfs/writing the perfect document.doc');">writing the perfect document.doc</a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="pft-file ext-doc"><a href="javascript:alert('You clicked on demo/documents/word documents/homework.doc');">homework.doc</a></li>
                                                    <li class="pft-file ext-doc"><a href="javascript:alert('You clicked on demo/documents/word documents/letter to autumn.doc');">letter to autumn.doc</a></li>
                                                    <li class="pft-file ext-doc"><a href="javascript:alert('You clicked on demo/documents/word documents/the parthenon.doc');">the parthenon.doc</a></li>
                                                </ul>
                                            </li>
                                            <li class="pft-file ext-ppt"><a href="javascript:alert('You clicked on demo/documents/my presentation.ppt');">my presentation.ppt</a></li>
                                            <li class="pft-file ext-txt"><a href="javascript:alert('You clicked on demo/documents/random_file.txt');">random_file.txt</a></li>
                                            <li class="pft-file ext-pdf"><a href="javascript:alert('You clicked on demo/documents/some_random_pdf.pdf');">some_random_pdf.pdf</a></li>
                                            <li class="pft-file ext-txt"><a href="javascript:alert('You clicked on demo/documents/to-do-list.txt');">to-do-list.txt</a></li>
                                            <li class="pft-file ext-sql"><a href="javascript:alert('You clicked on demo/documents/web-backup.sql');">web-backup.sql</a></li>
                                        </ul>
                                    </li>
                                    <li class="pft-directory">
                                        <a href="#">images</a>
                                        <ul style="display: block;">
                                            <li class="pft-directory">
                                                <a href="#">photos</a>
                                                <ul style="display: block;">
                                                    <li class="pft-directory">
                                                        <a href="#">family</a>
                                                        <ul style="display: block;">
                                                            <li class="pft-file ext-jpg"><a href="javascript:alert('You clicked on demo/images/photos/family/anna.jpg');">anna.jpg</a></li>
                                                            <li class="pft-file ext-jpg"><a href="javascript:alert('You clicked on demo/images/photos/family/aunt jemima.jpg');">aunt jemima.jpg</a></li>
                                                            <li class="pft-file ext-jpg"><a href="javascript:alert('You clicked on demo/images/photos/family/ben.jpg');">ben.jpg</a></li>
                                                            <li class="pft-file ext-jpg"><a href="javascript:alert('You clicked on demo/images/photos/family/billy.jpg');">billy.jpg</a></li>
                                                            <li class="pft-file ext-jpg"><a href="javascript:alert('You clicked on demo/images/photos/family/brian.jpg');">brian.jpg</a></li>
                                                            <li class="pft-file ext-jpg"><a href="javascript:alert('You clicked on demo/images/photos/family/grandma (christmas).jpg');">grandma (christmas).jpg</a></li>
                                                            <li class="pft-file ext-jpg"><a href="javascript:alert('You clicked on demo/images/photos/family/grandpa (christmas).jpg');">grandpa (christmas).jpg</a></li>
                                                            <li class="pft-file ext-jpg"><a href="javascript:alert('You clicked on demo/images/photos/family/jerry.jpg');">jerry.jpg</a></li>
                                                            <li class="pft-file ext-jpg"><a href="javascript:alert('You clicked on demo/images/photos/family/keith.jpg');">keith.jpg</a></li>
                                                            <li class="pft-file ext-jpg"><a href="javascript:alert('You clicked on demo/images/photos/family/steve.jpg');">steve.jpg</a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="pft-directory">
                                                        <a href="#">friends</a>
                                                        <ul style="display: block;">
                                                            <li class="pft-file ext-jpg"><a href="javascript:alert('You clicked on demo/images/photos/friends/becky.jpg');">becky.jpg</a></li>
                                                            <li class="pft-file ext-jpg"><a href="javascript:alert('You clicked on demo/images/photos/friends/dan.jpg');">dan.jpg</a></li>
                                                            <li class="pft-file ext-jpg"><a href="javascript:alert('You clicked on demo/images/photos/friends/eddie.jpg');">eddie.jpg</a></li>
                                                            <li class="pft-file ext-jpg"><a href="javascript:alert('You clicked on demo/images/photos/friends/elliot.jpg');">elliot.jpg</a></li>
                                                            <li class="pft-file ext-jpg"><a href="javascript:alert('You clicked on demo/images/photos/friends/fenway.jpg');">fenway.jpg</a></li>
                                                            <li class="pft-file ext-jpg"><a href="javascript:alert('You clicked on demo/images/photos/friends/gus.jpg');">gus.jpg</a></li>
                                                            <li class="pft-file ext-jpg"><a href="javascript:alert('You clicked on demo/images/photos/friends/jessica.jpg');">jessica.jpg</a></li>
                                                            <li class="pft-file ext-jpg"><a href="javascript:alert('You clicked on demo/images/photos/friends/rebecca.jpg');">rebecca.jpg</a></li>
                                                            <li class="pft-file ext-jpg"><a href="javascript:alert('You clicked on demo/images/photos/friends/robbie.jpg');">robbie.jpg</a></li>
                                                            <li class="pft-file ext-jpg"><a href="javascript:alert('You clicked on demo/images/photos/friends/sven.jpg');">sven.jpg</a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="pft-file ext-gif"><a href="javascript:alert('You clicked on demo/images/battletoads.gif');">battletoads.gif</a></li>
                                            <li class="pft-file ext-png"><a href="javascript:alert('You clicked on demo/images/box.png');">box.png</a></li>
                                            <li class="pft-file ext-png"><a href="javascript:alert('You clicked on demo/images/drop-shadow.png');">drop-shadow.png</a></li>
                                            <li class="pft-file ext-gif"><a href="javascript:alert('You clicked on demo/images/left_arrow.gif');">left_arrow.gif</a></li>
                                            <li class="pft-file ext-png"><a href="javascript:alert('You clicked on demo/images/my_image.png');">my_image.png</a></li>
                                            <li class="pft-file ext-gif"><a href="javascript:alert('You clicked on demo/images/right_arrow.gif');">right_arrow.gif</a></li>
                                        </ul>
                                    </li>
                                </ul>
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