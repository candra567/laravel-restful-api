@extends('vaccins.index')
@section('users')
<header class="header">
    <div class="home-header d-flex justify-content-center align-items-center flex-wrap flex-column">
         <h4 class="text-white">HOME PAGE</h4>
         <p class="text-white">Hello {{session('name')}}</p>
    </div>
</header>
<main class="mb-3 container-fluid">
    <section class="row my-2">
        <div class="col-md-4 my-2">
            <div class="card shadow">
                <div class="card-header bg-light ">Request Consultan</div>
                <div class="card-body">
                    @if (empty($first_consultations)||empty($seconds_consultations))
                    <a href="/consultations">+Request consultations</a>
                    @else
                        <p class="text-center text-success">Anda telah mengirim consultasi</p>
                    @endif
                </div>
            </div>
        </div>
        @if(empty($first_consultations)&&empty($seconds_consultations))
        <div class="col-md-4 my-2">
            <div class="alert alert-warning">Anda belum mengirim consultasi</div>
        </div>
        @endif
        @if (!empty($first_consultations))
        <div class="col-md-4 my-2">
            <div class="card shadow">
                <div class="card-header">First Consultations</div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <td>Status consultasi</td>
                            <td><span class=" p-1 rounded-pill text-white @if($first_consultations->status_consultations=='accepted') bg-info @else  bg-warning @endif">{{$first_consultations->status_consultations}}</span></td>
                        </tr>
                        <tr>
                            <td>Disease History</td>
                            <td>{{$first_consultations->disease_history}}</td>
                        </tr>
                        <tr>
                            <td>Current Symptoms</td>
                            <td>{{$first_consultations->current_symptoms}}</td>
                        </tr>
                        <tr>
                            <td>Doctor</td>
                            <td>{{$first_consultations->name_officer}}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        @endif
        @if (!empty($seconds_consultations))
        <div class="col-md-4 my-2">
            <div class="card shadow">
                <div class="card-header">Seconds Consultations</div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <td>Status consultasi</td>
                            <td><span class=" p-1 rounded-pill text-white @if($seconds_consultations->status_consultations=='accepted') bg-info @else  bg-warning @endif">{{$seconds_consultations->status_consultations}}</span></td>
                        </tr>
                        <tr>
                            <td>Disease History</td>
                            <td>{{$seconds_consultations->disease_history}}</td>
                        </tr>
                        <tr>
                            <td>Current Symptoms</td>
                            <td>{{$seconds_consultations->current_symptoms}}</td>
                        </tr>
                        <tr>
                            <td>Doctor</td>
                            <td>{{$seconds_consultations->name_officer}}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        @endif
    </section>
    <section class="row my-2">
        <hr>
        <div class="container-fluid">
            <div class="row">
                @if (!empty($first_consultations))
                <h4>Vaccinations</h4>
                    <div class="col-md-4 my-2">
                        <div class="card shadow">
                            <div class="card-header">First Vaccinations</div>
                            <div class="card-body">
                                @if ($first_consultations->status_consultations=='pending')
                                <p class="text-center bg-secondary  rounded-pill text-white rounded-pill">Can't register now because status is pending</p>
                                @elseif(!empty($first_vaccinations))
                                <p class="text-center bg-info rounded-pill text-white rounded-pill">Anda sudah mendaftar vaksin</p> 
                                @else
                                <a href="/spots">Register Vaccins</a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endif
                @if (!empty($first_vaccinations))
                <div class="col-md-4 my-2">
                    <div class="card shadow">
                        <div class="card-header">First Vaccinations</div>
                        <div class="card-body">
                            <table class="table">
                                <tr>
                                    <td>Dose vaccinations</td>
                                    <td>{{$first_vaccinations->dose_vaccinations}}</td>
                                </tr>
                                <tr>
                                    <td>Date vaccinations</td>
                                    <td>{{$first_vaccinations->date_vaccinations}}</td>
                                </tr>
                                <tr>
                                    <td>Location</td>
                                    <td>{{$first_vaccinations->name_hospital}}</td>
                                </tr>
                                <tr>
                                    <td>Doctor</td>
                                    <td>{{$first_vaccinations->name_doctor}}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </section>
    <section class="row mt-2 mb-5">
        @if (!empty($seconds_consultations)&&!empty($first_vaccinations))
        <hr>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Seconds Vaccinations</div>
                <div class="card-body">
                    @if ($seconds_consultations->status_consultations=='pending')
                    <p class="text-center bg-secondary  rounded-pill text-white rounded-pill">Can't register now because status is pending</p>
                    @elseif(!empty($seconds_vaccinations))
                    <p class="text-center bg-info rounded-pill text-white rounded-pill">Anda sudah mendaftar vaksin</p> 
                    @else
                    <a href="/spots">Register Vaccins</a>
                    @endif
                </div>
            </div>
        </div>
        @endif
        @if (!empty($seconds_vaccinations))
                <div class="col-md-4 my-2">
                    <div class="card shadow">
                        <div class="card-header">Seconds Vaccinations</div>
                        <div class="card-body">
                            <table class="table">
                                <tr>
                                    <td>Dose vaccinations</td>
                                    <td>{{$seconds_vaccinations->dose_vaccinations}}</td>
                                </tr>
                                <tr>
                                    <td>Date vaccinations</td>
                                    <td>{{$seconds_vaccinations->date_vaccinations}}</td>
                                </tr>
                                <tr>
                                    <td>Location</td>
                                    <td>{{$seconds_vaccinations->name_hospital}}</td>
                                </tr>
                                <tr>
                                    <td>Doctor</td>
                                    <td>{{$seconds_vaccinations->name_doctor}}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                @endif
    </section>
</main>
@endsection