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
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-12 d-flex no-block align-items-center">
                    <h4 class="page-title">City</h4>
                    <div class="ml-auto text-right">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><a href="{{route('shift')}}">Shift</a></li>
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
                        <form action="{{route('shift.update',$shift -> id)}}" method="post" class="form-horizontal">
                            @csrf
                            <div class="card-body">
                                <h4 class="card-title">Ime smene</h4>
                                <div class="form-group row">
                                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">Ime smene</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="shift" class="form-control" id="fname" value="{{$shift -> shift}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">Pocetak</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="start" class="form-control" id="start" placeholder="Unesi pocetaka smene u formatu 08:00" required value="{{$shift->start}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">Kraj smene</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="end" class="form-control" id="end" placeholder="Unesi rkaj smene u formatu 12:00" required value="{{$shift->end}}">
                                    </div>
                                </div>
                            </div>
                            <div class="border-top">
                                <div class="card-body">
                                    <button type="submit" class="btn btn-dark">Update</button>
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