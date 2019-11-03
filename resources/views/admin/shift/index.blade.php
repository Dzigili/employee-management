@extends('admin.layout.master')

@section('content')

    <div id="main-wrapper">
    @include('admin.includes.sidebar')
        <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Smene</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Pocetna</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><a href="{{route('shift')}}">Smene</a></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-2">
                        <a class="btn btn-lg btn-dark" href="{{route('shift.create')}}">Dodaj smenu</a>
                    </div>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Lista smena</h5>
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th>Redni broj</th>
                                            <th>Ime</th>
                                            <th>Akcije</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($shifts as $shift)
                                            <tr>
                                                <td>{{$shift->id }}</td>
                                                <td>{{$shift->shift}} {{$shift->start}} - {{$shift->end}}</td>
                                                <td>
                                                    <form action="{{route('shift.delete',$shift->id)}}" method="put">
                                                        @csrf
                                                        @method('DELETE')
                                                        <a href="{{route('shift.edit',$shift->id)}}" class="btn btn-sm btn-dark">Izmeni</a>
                                                        <button type="submit" class="btn btn-sm btn-danger">Obrisi</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        </tbody>
                                        @endforeach
                                    </table>
                                    {{ $shifts->links() }}
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