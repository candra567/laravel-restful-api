@extends('vaccins.index')
@section('users')
<header class="header">
    <div class="home-header  d-flex justify-content-center align-items-center flex-column">
            <h3 class="text-uppercase text-white">Spots Vaccinations</h3>
    </div>
</header>
<section class="container-fluid">
    <h5 class="p-2">Vaccinations Spots</h5>
    <hr>
    <div class="row p-3">
        @foreach ($spots as $spot)
        <div class="col-md-4 col-6 my-2">
            <div class="card shadow">
                <div class="card-header">Vaccins Locations</div>
                <div class="card-body">
                    <p class="py-2">{{$spot->name_hospital}}</p>
                    <p>Doctor {{$spot->name_doctor}}</p>
                    <form action="/vaccinations" method="post">
                        @csrf
                        <input type="hidden" name="id_spots_vaccins" value="{{$spot->id_hospital}}">
                      <button type="submit"  class="btn btn-primary btn-sm">View detail</button>
                    </form>
                </div>
            </div>
         </div> 
        @endforeach
         
    </div>
</section>
@endsection