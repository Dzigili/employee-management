@extends('admin.layout.master')

@section('content')

    <div id="main-wrapper">

        @include('admin.includes.sidebar')
        <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Dodaj raspored</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('user')}}">Pocetna strana</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><a href="#">Raspored</a></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>


            <div class="container-fluid">
                <div class="jombotron">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <div class="panel panel-default">
                                {{--<div class="panel-heading" style="backgroumd:#2e6da4; color: orangered;">--}}
                                {{--Add event--}}
                                {{--</div>--}}
                                <div class="panel-body">

                                    <form method="post" action="{{url('calendar/store')}}">
                                        @csrf
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Ime zaposlenog</label>
                                            <div class="col-sm-9">
                                                <select type="text" name="title" class="form-control" id="title">
                                                    @foreach($users as $user)
                                                        @if($user->role === 'admin')
                                                            @continue
                                                        @endif
                                                        {{--<option value="{{$user->all}}" {{ old('user') ? 'selected' : '' }}>{{$user->all()}}</option>--}}
                                                        <option value="{{$user->first_name}} {{$user->last_name}}" {{ old('user') ? 'selected' : '' }}>{{$user->first_name}} {{$user->last_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="shift">Izaberi smenu</label>
                                                <div class="col-sm-9">
                                                    <select type="text" name="shift" class="form-control" id="shift">
                                                        @foreach($shifts as $shift)
                                                            {{--<option value="{{$user->all}}" {{ old('user') ? 'selected' : '' }}>{{$user->all()}}</option>--}}
                                                            <option value="{{$shift->id}}" {{ old('$shift') ? 'selected' : '' }}>{{$shift->shift}} {{$shift->start}} - {{$shift->end}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-9">
                                                <label for="exampleInputEmail1">Izaberi boju</label>
                                                <input type="color" class="form-control" name="color">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-9">
                                                <label>Datum</label>
                                                <input type="date" class="form-control" name="start_date"
                                                       id="">
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <footer class="footer text-center">

            </footer>
        </div>
    </div>

@endsection