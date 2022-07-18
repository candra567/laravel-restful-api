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
             <div class="col-md-4 col-9">
                @if (session()->has('loginfailed'))
                    <div class="alert alert-danger">{{session()->get('loginfailed')}}</div>
                @endif
                <div class="card shadow rounded">
                    <div class="card-header bg-info">
                        <h5>Login</h5>
                    </div>
                    <div class="card-body bg-light">
                        <img src="/img/cartoon-vaccination-campaign-illustration_52683-62384.webp" width="70px" height="70px" class=" d-block mx-auto">
                        <form action="/login" method="post">
                            @csrf
                            <div class="my-2">
                                <label for="id_card_users" class="form-label">Id Card User</label>
                                <input type="number" name="id_card_users" id="id_card_users" class="form-control" required value="{{old('id_card_users')}}">
                            </div>
                            <div class="my-2">
                                <label for="password_users" class="form-label">Password User</label>
                                <input type="password" name="password_users" id="password_users" class="form-control" required>
                            </div>
                            <div class="my-2">
                                <button type="submit" class="btn btn-primary btn-sm">Login Now</button>
                            </div>
                            <div class="mb-4">
                                <a href="/register" class="d-block text-center"><small> Register Now</small></a>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer">
                        <small class="text-center d-block">Masuk sebagai <a href="/officer">Officer</a></small>
                    </div>
                </div>
             </div>
        </div>
    </div>
</body>
</html>