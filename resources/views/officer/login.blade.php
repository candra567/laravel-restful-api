<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="/bootstrap.css">
    <style>
        body{
            background-color: rgba(206, 221, 235, 0.761);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row d-flex align-items-center justify-content-center" style="height: 100vh">
             <div class="col-md-5 col-lg-4 col-9">
                @if (session()->has('loginfailed'))
                    <div class="alert alert-danger">{{session()->get('loginfailed')}}</div>
                @endif
                <div class="card shadow">
                    <div class="card-header bg-info">
                        <h5>Login Officer</h5>
                    </div>
                    <div class="card-body">
                        <img src="/img/flat-hand-drawn-doctor-injecting-vaccine-patient_23-2148855954.webp" width="70px" height="70px" class=" d-block mx-auto">
                        <form action="/officer" method="post">
                            @csrf
                            <div class="my-2">
                                <label for="id_card_officer" class="form-label">Id Card Officer</label>
                                <input type="number" name="id_card_officer" id="id_card_officer" class="form-control" required value="{{old('id_card_officer')}}">
                            </div>
                            <div class="my-2">
                                <label for="password_officer" class="form-label">Password Officer</label>
                                <input type="password" name="password_officer" id="password_officer" class="form-control" required>
                            </div>
                            <div class="my-2">
                                <button type="submit" class="btn btn-primary btn-sm">Login Now</button>
                            </div>             
                        </form>
                    </div>
                </div>
             </div>
        </div>
    </div>
</body>
</html>