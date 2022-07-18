@extends('vaccins.index')
@section('users')
<header class="header">
    <div class=" home-header d-flex justify-content-center align-items-center flex-column gap-y-2">
    </div>
</header>
<div class="container mt-3 mb-5">
   <div class="row">
    <div class="col-md-5 col-10 mx-auto">
        <div class="card shadow">
            <div class="card-header"><h3>{{$spots->name_hospital}}</h3></div>
            <div class="card-body">
                <p>Name doctor {{$spots->name_doctor}}</p>
                <form action="/joinvaccins" method="post">
                    @csrf
                        <label for="date" class="form-label">Date</label>
                        <input type="date" name="date" id="date" class="form-control" min="{{date('Y-m-d')}}" >
                        <input type="hidden" name="id_hospital" value="{{$spots->id_hospital}}">
                        <button type="submit" class="btn btn-info mt-2 mx-auto btn-sm d-block">Register Now</button>
                </form>
            </div>
        </div>
    </div>
   </div>
</div>
@endsection