@extends('backend.layouts.app')
@section('content')
    <!-- START BREADCRUMB -->
    <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">School</li>
    </ul>
    <!-- END BREADCRUMB -->
    <div class="page-title">
        <h2><span class="fa fa-arrow-circle-o-left"></span>School</h2>
    </div>
    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">
        <div class="row">
            <div class="col-md-12">
                @include('_message')

                <div class="panel panel-default">

                    <div class="panel-heading ui-draggable-handle">
                        <h3 class="panel-title">School Search</h3>
                    </div>

                    <div class="panel-body ">

                        <form action="" method="get">

                            <div class="col-md-2">
                                <label for="">ID</label>
                                <input type="text" name="id" value="{{ Request::get('id') }}" class="form-control"
                                    placeholder="ID" id="">
                            </div>

                            <div class="col-md-2">
                                <label for="">School Name</label>
                                <input type="text" class="form-control" placeholder="School Name"
                                    value="{{ Request::get('name') }}" name="name" id="">
                            </div>

                            <div class="col-md-2">
                                <label for="">Email</label>
                                <input type="text" class="form-control" placeholder="Email"
                                    value="{{ Request::get('email') }}" name="email" id="">
                            </div>

                            <div class="col-md-2">
                                <label for="">Address</label>
                                <input type="text" class="form-control" placeholder="Address"
                                    value="{{ Request::get('address') }}" name="address" id="">
                            </div>

                            <div class="col-md-2">
                                <label for="">Status</label>
                                <select class="form-control" name="status" id="exampleFormControlSelect1">
                                    <option>Select Status</option>
                                    <option {{ Request::get('status') == '1' ? 'selected' : '' }} value="1">Active
                                    </option>
                                    <option {{ Request::get('status') == '100' ? 'selected' : '' }} value="100">
                                        InActive</option>
                                </select>
                            </div>

                            <div style="clear: both"></div>
                            <br>
                            <button type="submit" class="btn btn-info">Search</button>
                            <a href="{{ url('panel/school') }}" class="btn btn-success">Reset</a>

                        </form>
                    </div>


                </div>


                <div class="panel panel-default">

                    <div class="panel-heading ui-draggable-handle">
                        <h3 class="panel-title">School List</h3>
                        <a class="btn btn-lg btn-danger pull-right" href="{{ url('panel/school/create') }}">Create
                            School</a>
                    </div>

                    <div class="panel-body panel-body-table">

                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-actions">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Image</th>
                                        <th>name</th>
                                        <th>Email</th>
                                        <th>Address</th>
                                        <th>Status</th>
                                        <th>Created Date</th>
                                        <th>actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($getSchool as $value)
                                        <tr>
                                            <td>{{ $value->id }}</td>
                                            <td>
                                                @if (!empty($value->getProfile()))
                                                    <img style="width:80px;height: 50px; border-radius: 50%"
                                                        src="{{ $value->getProfile() }}" alt="">
                                                @endif
                                            </td>
                                            <td>{{ $value->name }}</td>
                                            <td>{{ $value->email }}</td>
                                            <td>{{ $value->address }}</td>
                                            <td>
                                                @if ($value->status == 1)
                                                    <span class="label label-success">Active</span>
                                                @else
                                                    <span class="label label-danger">Inactive</span>
                                                @endif
                                            </td>
                                            <td>{{ date('d-m-Y H:i A', strtotime($value->created_at)) }}</td>
                                            <td>
                                                <a href="{{ url('panel/school/edit/' . $value->id) }}"
                                                    class="btn btn-default btn-rounded btn-sm"><span
                                                        class="fa fa-pencil"></span></a>
                                                <a href="{{ url('panel/school/delete/' . $value->id) }}"
                                                    onclick="return confirm('Are you sure you want to delete?');"
                                                    class="btn btn-danger btn-rounded btn-sm">
                                                    <span class="fa fa-times"></span>
                                                </a>
                                                {{-- <a href="{{ url('panel/school/delete/'.$value->id') }}" class="btn btn-danger btn-rounded btn-sm"><span class="fa fa-times"></span></a> --}}
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="100%"> No Record Found</td>
                                        </tr>
                                    @endforelse


                                    {{-- @ifelse
                                    <tr>
                                        <td colspan="100%"> No Record Found</td>
                                    </tr> --}}
                                    {{-- @endforeach --}}
                                </tbody>
                            </table>
                        </div>

                    </div>


                </div>

            </div>

            <div class="pull-right">
                {{ $getSchool->appends(Illuminate\Support\Facades\Request::except('page'))->links() }}
            </div>
        </div>
    </div>
    <!-- END PAGE CONTENT WRAPPER -->
@endsection
