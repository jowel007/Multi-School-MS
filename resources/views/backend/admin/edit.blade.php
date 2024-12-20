@extends('backend.layouts.app')
@section('content')
    <!-- START BREADCRUMB -->
    <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">School</li>
    </ul>
    <!-- END BREADCRUMB -->
    <div class="page-title">
        <h2><span class="fa fa-arrow-circle-o-left"></span>Edit Admin</h2>
    </div>
    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">
        <div class="row">
            <div class="col-md-12">

                <form action="" method="POST" enctype="multipart/form-data" class="form-horizontal">
                    @csrf
                    <div class="panel panel-default">
                        <div class="panel-heading ui-draggable-handle">
                            <h3 class="panel-title"><strong>Edit Admin</strong></h3>

                        </div>

                        <div class="panel-body">

                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Name<span
                                        style="color: red">*</span></label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                        <input type="text" name="name" value="{{ $getRecord->name }}"
                                            class="form-control" required>
                                    </div>
                                    <div style="color: red;">{{ $errors->first('name') }}</div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Profile Picture</label>
                                <div class="col-md-6 col-xs-12">
                                    <input style="padding: 5px;" type="file" name="profile_pic" class="form-control">
                                    @if (!empty($getRecord->getAdminProfile()))
                                        <img style="width:80px;height: 50px; border-radius: 50%"
                                            src="{{ $getRecord->getAdminProfile() }}" alt="">
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Email<span
                                        style="color: red">*</span></label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                        <input type="email" name="email" value="{{ $getRecord->email }}"
                                            class="form-control" required>
                                    </div>
                                    <div style="color: red;">{{ $errors->first('email') }}</div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Password<span
                                        style="color: red"></span></label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-unlock-alt"></span></span>
                                        <input type="text" name="password" class="form-control">
                                    </div>
                                    (DO You Want to Change Password so please Enter OtherWish leave it unchanged)
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Address<span
                                        style="color: red">*</span></label>
                                <div class="col-md-6 col-xs-12">
                                    <textarea class="form-control" name="address" rows="5" required>{!! $getRecord->address !!}</textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Status<span
                                        style="color: red">*</span></label>
                                <div class="col-md-6 col-xs-12">
                                    <select class="form-control" name="status" required id="exampleFormControlSelect1">
                                        <option>Select Status</option>
                                        <option {{ $getRecord->status == 1 ? 'selected' : '' }} value="1">Active
                                        </option>
                                        <option {{ $getRecord->status == 0 ? 'selected' : '' }} value="0">InActive
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Role<span
                                        style="color: red">*</span></label>
                                <div class="col-md-6 col-xs-12">
                                    <select class="form-control" name="is_admin" required id="exampleFormControlSelect1">
                                        <option>Select Role</option>
                                        <option {{ $getRecord->is_admin == 1 ? 'selected' : '' }} value="1">Super Admin
                                        </option>
                                        <option {{ $getRecord->is_admin == 2 ? 'selected' : '' }} value="2">Admin
                                        </option>
                                    </select>
                                </div>
                            </div>





                        </div>
                        <div class="panel-footer">
                            <button class="btn btn-primary pull-right">Submit</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <!-- END PAGE CONTENT WRAPPER -->
@endsection
