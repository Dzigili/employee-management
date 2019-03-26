@extends('admin.layout.master')

@section('content')

    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        @include('admin.includes.sidebar')
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Admin Manager</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><a href="{{route('user')}}">User</a></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    {{--<div class="col-md-2">--}}
                        {{--<a class="btn btn-lg btn-dark" href="{{route('user.create')}}">Create</a>--}}
                    {{--</div>--}}
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title m-b-0">Admin</h5>
                            </div>
                            <div class="table-responsive">
                                <table id="zero_config" class="table table-striped table-bordered">
                            {{--<table class="table table-hover">--}}
                                <thead>
                                <tr>
                                    <th>S.N</th>
                                    <th>leaves</th>
                                    <th>Username</th>
                                    <th>Image</th>
                                    <th>First name</th>
                                    <th>Last name</th>
                                    <th>Role</th>
                                    <th>Email</th>
                                    {{--<th>Status</th>--}}
                                    <th>Phone</th>
                                    {{--<th>Status</th>--}}
                                    <th>Address</th>
                                    <th>Gender</th>
                                    <th>Date of Birth</th>
                                    <th>Join date</th>
                                    <th>Job type</th>
                                    <th>City</th>
                                    <th>Age</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <th>{{$loop->index+1}}</th>
                                    <td>{{$user->leave->count()}}</td>
                                    <td>{{$user->username}}</td>
                                    <td><img src="{{ asset('uploads/gallery/' . $user->image) }}" width="80px" height="80px" alt="Image"> </td>
                                    <td>{{$user->first_name}}</td>
                                    <td>{{$user->last_name}}</td>
                                    <td>{{$user->role}}</td>
                                    <td>{{$user->email}}</td>
                                    {{--<td>--}}
                                        {{--@if($user->role == 1)--}}
                                            {{----}}
                                    {{--</td>--}}
                                    {{--<td class="hidden-480">--}}
                                        {{--@if($user->status == 1)--}}
                                            {{--<span class="label label-sm label-success">Active</span>--}}
                                            {{--@else--}}
                                            {{--<span class="label label-sm label-warning">Inactive</span>--}}
                                            {{--@endif--}}

                                    {{--</td>--}}
                                    <td>{{$user->phone}}</td>
                                    <td>{{$user->address}}</td>
                                    <td>{{$user->gender}}</td>
                                    <td>{{$user->dob}}</td>
                                    <td>{{$user->join_date}}</td>
                                    <td>{{$user->job_type}}</td>
                                    <td>{{$user->city}}</td>
                                    <td>{{$user->age}}</td>
                                    <td>
                                        <form action="{{route('user.delete',$user->id)}}" method="put">
                                            @csrf
                                            @method('DELETE')
                                             <a href="{{route('user.edit',$user->id)}}" class="btn btn-sm btn-dark">Edit</a>
                                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $users->links() }}
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center">
                All Rights Reserved by Khoz Informatics Pvt. Ltd. Designed and Developed by <a href="https://khozinfo.com/">Khozinfo</a>.
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>

    @endsection