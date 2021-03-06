@extends('admin.layout.master')

@section('content')

    <div id="main-wrapper">
    @include('admin.includes.sidebar')
        <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Slobodni dani</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Pocetna</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><a href="{{route('leave')}}">Slobodni dani</a></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <form action="{{route('leave.search')}}" method="GET" class="form-horizontal">
                                <div class="card-body">
                                    <h4 class="card-title">Pretraga</h4>
                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Pretraga</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="search" class="form-control" id="fname" placeholder="Tip (slava, bolovanje ...)">
                                        </div>
                                    </div>
                                </div>
                                <div class="border-top">
                                    <div class="card-body">
                                        <button type="submit" class="btn btn-success">Pretrazi</button>
                                        <a href="{{route('leave')}}" class="btn btn-md btn-danger">Obrisi pretragu</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-2">
                        @can('isEmployee')
                        <a class="btn btn-lg btn-dark" href="{{route('leave.create')}}">Zahtev za slobodan dan</a>
                        @endcan
                    </div>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Lista odsutnih</h5>
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th>Redni broj</th>
                                            <th>Ime i prezime</th>
                                            <th>Tip odsustva</th>
                                            <th>Od</th>
                                            <th>Do</th>
                                            <th>Broj sdana</th>
                                            <th>Razlog</th>
                                            <th>Status</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($leaves as $leave)
                                            <tr>
                                                <td>{{$loop -> index+1 }}</td>
                                                <td>{{$leave->users->first_name }} {{$leave->users->last_name}}</td>
                                                <td>{{$leave->leave_type}}</td>
                                                <td>{{$leave->date_from}}</td>
                                                <td>{{$leave->date_to}}</td>
                                                <td>{{$leave->days}}</td>
                                                <td>{{$leave->reason}}</td>

                                                        <td>
                                                            @if(Auth::user()->role=='admin')
                                                            {{--{{$leave->is_approved}}--}}
                                                            @if($leave->is_approved==0)
                                                                <form id="approve-leave-{{$leave->id}}" action="{{route('leave.approve',$leave->id)}}" method="POST">
                                                                    @csrf
                                                                    {{--<button type="button" onclick="approveLeave({{$leave->id}})" class="btn btn-sm btn-cyan" name="approve" value="1">Approve</button>--}}
                                                                    <button type="submit" onclick="return confirm('Are you sure want to approve leave?')" class="btn btn-sm btn-cyan" name="approve" value="1">Approve</button>
                                                                </form>
                                                                <form id="reject-leave-{{$leave->id}}" action="{{route('leave.approve',$leave->id)}}" method="POST">
                                                                    @csrf
                                                                    {{--<button type="button" onclick="rejectLeave({{$leave->id}})" class="btn btn-sm btn-danger" name="approve" value="2">Reject</button>--}}
                                                                    <button type="submit" onclick="return confirm('Are you sure want to reject leave?')" class="btn btn-sm btn-danger" name="approve" value="2">Reject</button>
                                                                </form>
                                                            @elseif($leave->is_approved==1)

                                                                <form action="{{route('leave.approve',$leave->id)}}" method="POST">
                                                                    @csrf
                                                                    <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure want to reject leave?')" type="submit" name="approve" value="2">Reject</button>
                                                                </form>
                                                            @else
                                                                <form action="{{route('leave.approve',$leave->id)}}" method="POST">
                                                                    @csrf
                                                                    <button class="btn btn-sm btn-cyan" onclick="return confirm('Are you sure want to approve leave?')" type="submit" name="approve" value="1">Approve</button>
                                                                </form>
                                                            @endif

                                                                {{--<a href="{{route('leave.approve',$leave->id)}}" class="btn btn-sm btn-cyan">Approve</a>--}}
                                                                {{--<a href="{{route('leave.pending',$leave->id)}}" class="btn btn-sm btn-warning">Pending</a>--}}
                                                                {{--<a href="{{route('leave.reject',$leave->id)}}" class="btn btn-sm btn-danger">Reject</a>--}}
                                                                @else
                                                                @if($leave->is_approved==0)
                                                                    <span class="badge badge-pill badge-warning">Na cekanju</span>
                                                                @elseif($leave->is_approved==1)
                                                                    <span class="badge badge-pill badge-success">Dozvoljen</span>
                                                                @else
                                                                    <span class="badge badge-pill badge-danger">Odbijen</span>
                                                                @endif
                                                            @endif
                                                </td>
                                            </tr>
                                        </tbody>
                                        @endforeach
                                    </table>
                                    {{ $leaves->links() }}
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <{{--sweetalert box for deleting start--}}
            {{--<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.28.8/dist/sweetalert2.all.min.js"></script>--}}

            {{--<script type="text/javascript">--}}
                {{--function rejectLeave(id)--}}

                {{--{--}}
                    {{--const swalWithBootstrapButtons = swal.mixin({--}}
                        {{--confirmButtonClass: 'btn btn-success',--}}
                        {{--cancelButtonClass: 'btn btn-danger',--}}
                        {{--buttonsStyling: false,--}}
                    {{--})--}}

                    {{--swalWithBootstrapButtons({--}}
                        {{--title: 'Are you sure?',--}}
                        {{--text: "You won't be able to do again this!",--}}
                        {{--type: 'warning',--}}
                        {{--showCancelButton: true,--}}
                        {{--confirmButtonText: 'Yes, reject it!',--}}
                        {{--cancelButtonText: 'No, cancel!',--}}
                        {{--reverseButtons: true--}}
                    {{--}).then((result) => {--}}
                        {{--if (result.value) {--}}
                            {{--event.preventDefault();--}}
                            {{--document.getElementById('reject-leave-'+id).submit();--}}
                        {{--} else if (--}}
                            {{--// Read more about handling dismissals--}}
                            {{--result.dismiss === swal.DismissReason.cancel--}}
                        {{--) {--}}
                            {{--swalWithBootstrapButtons(--}}
                                {{--'Cancelled',--}}
                                {{--'You have not cancel yet ! Your are safe :)',--}}
                                {{--'error'--}}
                            {{--)--}}
                        {{--}--}}
                    {{--})--}}
                {{--}--}}

            {{--</script>--}}
            {{--<script type="text/javascript">--}}
                {{--function approveLeave(id)--}}

                {{--{--}}
                    {{--const swalWithBootstrapButtons = swal.mixin({--}}
                        {{--confirmButtonClass: 'btn btn-success',--}}
                        {{--cancelButtonClass: 'btn btn-danger',--}}
                        {{--buttonsStyling: false,--}}
                    {{--})--}}

                    {{--swalWithBootstrapButtons({--}}
                        {{--title: 'Are you sure?',--}}
                        {{--text: "You want to approve leave!",--}}
                        {{--type: 'warning',--}}
                        {{--showCancelButton: true,--}}
                        {{--confirmButtonText: 'Yes, approve leave!',--}}
                        {{--cancelButtonText: 'No, cancel!',--}}
                        {{--reverseButtons: true--}}
                    {{--}).then((result) => {--}}
                        {{--if (result.value) {--}}
                            {{--event.preventDefault();--}}
                            {{--document.getElementById('approve-leave-'+id).submit();--}}
                        {{--} else if (--}}
                            {{--// Read more about handling dismissals--}}
                            {{--result.dismiss === swal.DismissReason.cancel--}}
                        {{--) {--}}
                            {{--swalWithBootstrapButtons(--}}
                                {{--'Cancelled',--}}
                                {{--'You are safe.You can approve later :)',--}}
                                {{--'error'--}}
                            {{--)--}}
                        {{--}--}}
                    {{--})--}}
                {{--}--}}

            {{--</script>--}}
            {{--sweetalert box for deleting end--}}
            <footer class="footer text-center">

            </footer>
        </div>
    </div>

@endsection