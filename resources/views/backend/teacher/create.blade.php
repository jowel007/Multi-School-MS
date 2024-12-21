@extends('backend.layouts.app')
@section('content')
    <!-- START BREADCRUMB -->
    <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">Teacher</li>
    </ul>
    <!-- END BREADCRUMB -->
    <div class="page-title">
        <h2><span class="fa fa-arrow-circle-o-left"></span>Create Teacher</h2>
    </div>
    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">
        <div class="row">
            <div class="col-md-12">

                <form action="{{ url('panel/teacher/add') }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                    @csrf
                    <div class="panel panel-default">
                        <div class="panel-heading ui-draggable-handle">
                            <h3 class="panel-title"><strong>Create Teacher</strong></h3>

                        </div>

                        <div class="panel-body">

                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">First Name<span style="color: red">*</span></label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                        <input type="text" name="name" class="form-control" required>
                                    </div>
                                    <div style="color: red;">{{ $errors->first('name') }}</div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Last Name<span style="color: red">*</span></label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                        <input type="text" name="last_name" class="form-control" required>
                                    </div>
                                    <div style="color: red;">{{ $errors->first('last_name') }}</div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Gender<span style="color: red">*</span></label>
                                <div class="col-md-6 col-xs-12">
                                    <select class="form-control" name="gender" required id="exampleFormControlSelect1">
                                        <option>Select Gender</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Date of Birth<span style="color: red">*</span></label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                        <input type="date" name="date_of_birth" class="form-control" required>
                                    </div>
                                    <div style="color: red;">{{ $errors->first('date_of_birth') }}</div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Date of Joining<span style="color: red">*</span></label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                        <input type="date" name="date_of_joining" class="form-control" required>
                                    </div>
                                    <div style="color: red;">{{ $errors->first('date_of_joining') }}</div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Mobile Number<span style="color: red">*</span></label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                        <input type="text" name="mobile_number" class="form-control" required>
                                    </div>
                                    <div style="color: red;">{{ $errors->first('mobile_number') }}</div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Marital Status<span style="color: red">*</span></label>
                                <div class="col-md-6 col-xs-12">
                                    <select class="form-control" name="marital_status" required id="exampleFormControlSelect1">
                                        <option>Select Gender</option>
                                        <option value="married">Married</option>
                                        <option value="unmarried">Unmarried</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Profile Picture</label>
                                <div class="col-md-6 col-xs-12">
                                    <input style="padding: 5px;" type="file" name="profile_pic" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Address<span style="color: red">*</span></label>
                                <div class="col-md-6 col-xs-12">
                                        <textarea name="address" class="form-control" required>{{ old('address') }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Permanent Address<span style="color: red">*</span></label>
                                <div class="col-md-6 col-xs-12">
                                        <textarea name="permanent_address" class="form-control" required>{{ old('permanent_address') }}</textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Qualification<span style="color: red"></span></label>
                                <div class="col-md-6 col-xs-12">
                                        <textarea  name="qualification" class="form-control" >{{ old('qualification') }}</textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Work Exprence<span style="color: red"></span></label>
                                <div class="col-md-6 col-xs-12">
                                        <textarea name="work_exprence" class="form-control"  >{{ old('work_exprence') }}</textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Note<span style="color: red"></span></label>
                                <div class="col-md-6 col-xs-12">
                                        <textarea name="note" class="form-control">{{ old('note') }}</textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Email<span style="color: red">*</span></label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                        <input type="email" name="email" class="form-control" required>
                                    </div>
                                    <div style="color: red;">{{ $errors->first('email') }}</div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Password<span style="color: red">*</span></label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-unlock-alt"></span></span>
                                        <input type="password" name="password" class="form-control" required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Status<span style="color: red">*</span></label>
                                <div class="col-md-6 col-xs-12">
                                    <select class="form-control" name="status" required id="exampleFormControlSelect1">
                                        <option>Select Status</option>
                                        <option value="1">Active</option>
                                        <option value="0">InActive</option>
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
