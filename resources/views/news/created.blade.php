@extends('backend')
@section('content')
<div class="content">
    <div class="content-header">
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-columns" aria-hidden="true"></i><a href="#">Forms</a></li>
                <li><a>Advanced</a></li>
            </ul>
        </div>
    </div>
    <div class="row animated fadeInUp">
    <div class="col-sm-12">
        <h4 class="section-subtitle"><b>Create News</b></h4>
        <div class="panel">
            <div class="panel-content">
                <div class="row">
                    <div class="col-md-12">
                        {{Form::open(array('url'=> $GLOBALS['r_name'].'/news-store','method'=>'POST','class'=>'rejectApprove-form','enctype'=>"multipart/form-data"))}}
                            <div class="message-container alert alert-danger">
                                <ul></ul>
                            </div>
                            <div class="form-group">
                                <label for="username2" class=" control-label">Title<span class="required">*</span></label>
                                <input type="text" class="form-control" id="username2" name="title" required>
                            </div>
                            <div class="form-group">
                                <label for="email2" class=" control-label">Description<span class="required">*</span></label>
                                <textarea class="form-control"  name="description" required> </textarea>
                            </div>
                            <div class="form-group">
                                <label for="password2" class=" control-label">Meta Tilte<span class="required">*</span></label>
                                <input type="text" class="form-control" id="password2" name="meta_title" required>
                            </div>
                            <div class="form-group">
                                <label for="password2" class=" control-label">Meta Description<span class="required">*</span></label>
                                <input type="text" class="form-control" id="password2" name="meta_description" required>
                            </div>
                            <div class="form-group">
                                <label for="password2" class=" control-label">Images<span class="required">*</span></label>
                                <input type="file" class="form-control" name="images[]" multiple required>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                       {{Form::close()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>


@endsection
