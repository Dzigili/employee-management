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
                    <h4 class="page-title">Funkcije</h4>
                    <div class="ml-auto text-right">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Pocetna</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><a href="{{route('designation')}}">Funkcije</a></li>
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
                            <form action="{{route('designation.store')}}" method="post" class="form-horizontal">
                                @csrf
                                <div class="card-body">
                                    <h4 class="card-title">Funkcije</h4>
                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Ime zaposlenog</label>
                                        <div class="col-sm-9">
                                            <select type="text" name="employee_name" class="form-control" id="fname">
                                                @foreach($users as $user)
                                                    @if($user->role === 'admin')
                                                        @continue
                                                    @endif
                                                    {{--<option value="{{$user->all}}" {{ old('user') ? 'selected' : '' }}>{{$user->all()}}</option>--}}
                                                    <option value="{{$user->id}}" {{ old('user') ? 'selected' : '' }}>{{$user->first_name}} {{$user->last_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Funkcija</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="designation" class="form-control" id="fname" placeholder="Unestite ime zaduzenja">
                                        </div>
                                    </div>
                                </div>
                                <div class="border-top">
                                    <div class="card-body">
                                        <button type="submit" class="btn btn-dark">Add</button>
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