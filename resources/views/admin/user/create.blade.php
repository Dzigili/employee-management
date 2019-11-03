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
                    <h4 class="page-title">Menadzment zaposlenih</h4>
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
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-10">
                    <div class="card">
                        <form action="{{route('user.store')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                            @csrf
                            {{--@method('PUT')--}}
                            <div class="card-body">
                                <h4 class="card-title">Dodaj zaposlenog</h4>
                                <div class="form-group row">
                                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">Korisnicko ime</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="username" class="form-control" id="username" value="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="lname" class="col-sm-3 text-right control-label col-form-label">Ime</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="fname" class="form-control" id="fname" value="" >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="lname" class="col-sm-3 text-right control-label col-form-label">Prezime</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="lname" class="form-control" id="lname" value="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="lname" class="col-sm-3 text-right control-label col-form-label">Uloga</label>
                                    <div class="col-sm-9">
                                        {{--<select type="text" name="role" class="form-control" id="lname" value="{{$user->role}}">--}}
                                        <select type="text" name="role" class="form-control" id="lname">
                                            {{--<option value="admin">Admin</option>--}}
                                            {{--<option value="employee">Employee</option>--}}
                                            <option value="employee">zaposleni</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="lname" class="col-sm-3 text-right control-label col-form-label">Email</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="email" class="form-control" id="lname" value="">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-sm-3 text-right control-label col-form-label">Password</label>
                                    <div class="col-sm-9">
                                        <input type="password" name="password" class="form-control" id="password" value="">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="phone" class="col-sm-3 text-right control-label col-form-label">Telefon</label>
                                    <div class="col-sm-9">
                                        <input type="number" name="phone" class="form-control" id="phone" value="">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="address" class="col-sm-3 text-right control-label col-form-label">Adresa</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="address" class="form-control" id="address" value="">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="gender" class="col-sm-3 text-right control-label col-form-label">Pol</label>
                                    <div class="col-sm-9">
                                        <select type="text" name="gender" class="form-control" id="gender" value="">
                                            <option value="male">Musko</option>
                                            <option value="female">Zensko</option>
                                            <option value="other">Drugo</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="lname" class="col-sm-3 text-right control-label col-form-label">Datum rodjenja</label>
                                    <div class="col-sm-9">
                                        <input type="date" name="dob" class="form-control" id="dob" value="">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="joindate" class="col-sm-3 text-right control-label col-form-label">Pocetak rada</label>
                                    <div class="col-sm-9">
                                        <input type="date" name="join_date" class="form-control" id="join_date" value="">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="job type" class="col-sm-3 text-right control-label col-form-label">Tip zaposlenja</label>
                                    <div class="col-sm-9">
                                        <select type="text" name="job_type" class="form-control" id="job_type">
                                            <option>privremeno</option>
                                            <option>stalno</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="city" class="col-sm-3 text-right control-label col-form-label">Grad</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="city" class="form-control" id="city" value="">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="age" class="col-sm-3 text-right control-label col-form-label">Godine</label>
                                    <div class="col-sm-9">
                                        <input type="number" name="age" class="form-control" id="lname" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="border-top">
                                <div class="card-body">
                                    <button type="submit" class="btn btn-dark">Sacuvaj</button>
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