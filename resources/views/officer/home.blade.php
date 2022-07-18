<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <link rel="stylesheet" href="/bootstrap.css">
</head>
<body>
    <nav class="container-fluid">
        <div class="row p-2 bg-success">
           <div class="col-md-6">
            <ul class="nav">
                <li class="nav-item"><a href="/logout" class="nav-link text-white">Logout</a></li>
            </ul>
           </div>
        </div>
    </nav>
    <main class="container-fluid">
       <div class="row mt-5">
          <div class="col-md-6 col-8 my-2">
            <ul class="list-group">
                <li class="list-group-item">Welcome Officer</li>
                <li class="list-group-item">Name {{session('name')}}</li>
            </ul>
          </div>
          <div class="col-md-11 mx-auto">
            <div class="card shadow my-2">
                <div class="card-header bg-info"><h5>Data Consultasi</h5></div>
                <div class="card-body table-responsive">
                    @if (count($consultations)==0)
                      <p class="text-center text-warning">Tidak ada data yang ditampilkan</p>
                    @else  
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name consultan</th>
                                <th>Number consultan</th>
                                <th>Disease History</th>
                                <th>Current Symptoms</th>
                                <th>Status consultations</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i=1;
                            @endphp
                            @foreach ($consultations as $consultan)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$consultan->name_users_vaksin}}</td>
                                <td>{{$consultan->number_consultations}}</td>
                                <td>{{$consultan->disease_history}}</td>
                                <td>{{$consultan->current_symptoms}}</td>
                                <td>{{$consultan->status_consultations}}</td>
                                <td>
                                    <form action="/dashboard" method="post">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="id_consultations" value="{{$consultan->id_consultations}}">
                                        <button type="submit" @if($consultan->status_consultations=='accepted') disabled @endif class="btn btn-primary btn-sm">Setujui</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                    @endif       
                </div>
            </div>
          </div>
       </div>
    </main>
</body>
</html>