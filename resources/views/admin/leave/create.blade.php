@extends('admin.layout.master')

@section('content')

    @include('admin.includes.sidebar')

    <div class="page-wrapper">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
    @endif

            <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-12 d-flex no-block align-items-center">
                    <div class="ml-auto text-right">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Početna</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><a href="{{route('leave.create')}}">Zahtev za slobodne dane</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid">

            <div class="row">
                <div class="col-md-10">
                    <div class="card">
                        <form action="{{route('leave.store')}}" method="post" class="form-horizontal">
                            @csrf
                            <div class="card-body">
                                <h4 class="card-title">Zahtev za slobodan dan</h4>
                                <div class="form-group row">
                                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">Tip (slava, bolovanje ...)</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="leave_type" class="form-control" id="leave_type" placeholder="Tip">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="lname" class="col-sm-3 text-right control-label col-form-label">Od do</label>
                                    <div class="col-sm-4">
                                        <input type="date" min="{{date('Y-m-d')}}" name="date_from" class="form-control" id="FromDate">
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="date" name="date_to" class="form-control" id="ToDate">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">Broj dana</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="days" class="form-control" id="TotalDays" placeholder="Broj slobodnih dana" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">Razlog</label>
                                    <div class="col-sm-9">
                                        <textarea type="text" name="reason" class="form-control" placeholder="Razlog">
                                        </textarea></div>
                                </div>
                            </div>
                            <div class="border-top">
                                <div class="card-body">
                                    <button type="submit" class="btn btn-dark">Apply</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer text-center">

        </footer>

    </div>

@endsection

@section('js')
    <script>
        $("#ToDate").change(function () {
            var start = new Date($('#FromDate').val());
            var end = new Date($('#ToDate').val());

            var diff = new Date(end - start);
            var days=1;
            days = diff / 1000 / 60 / 60 / 24;

            // $('#TotalDays').val(days);
            if (days == NaN) {
                $('#TotalDays').val(0);
            } else {
                $('#TotalDays').val(days+1);
            }
        })

        $("#FromDate").change(function () {
            var start = new Date($('#FromDate').val());
            var end = new Date($('#ToDate').val());

            var diff = new Date(end - start);
            var days=1;
            days = diff / 1000 / 60 / 60 / 24;

            // $('#TotalDays').val(days);
            if (days == NaN) {
                $('#TotalDays').val(0);
            } else {
                $('#TotalDays').val(days+1);
            }
        })
    </script>
    @endsection