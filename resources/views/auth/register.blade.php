
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link rel="stylesheet" href="/bootstrap.css">
    <style>
         body{
            background-color: rgba(206, 221, 235, 0.761);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row align-items-center justify-content-center" style="min-height: 100vh">
          <div class="col-md-7 col-lg-6 col-11 py-3">
            @if (session()->has('registerfailed'))
                <div class="alert alert-danger">
                    {{session()->get('registerfailed')}}
                </div>
            @endif
            <div class="card shadow">
            <div class="card-header bg-info">
                <h5>Register Now</h5>
            </div>
            <div class="card-body">
                <form action="/register" method="post">
                    @csrf
                    <div class="row my-2">
                        <div class="col-6 my-1">
                            <label for="id_card_users" class="form-label">Id card user</label>
                            <input type="number" name="id_card_users" id="id_card_users" class="form-control" required value="{{old('id_card_users')}}">
                        </div>
                        <div class="col-6 my-1">
                            <label for="password_users" class="form-label">Password</label>
                            <input type="password" name="password_users" id="password_users" class="form-control" required>
                        </div>
                    </div>
                    <div class="row my-2">
                        <div class="col-6 my-1">
                            <label for="name_users" class="form-label">Name User</label>
                            <input type="text" name="name_users" id="name_users" class="form-control" required value="{{old('name_users')}}">
                        </div>
                        <div class="col-6 my-1">
                            <label for="gender_users_vaksin" class="form-label">Gender User</label>
                            <select name="gender_users" id="gender_user" class="form-select">
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>
                    </div>
                    <div class="row my-2">
                        <div class="col-6 my-1">
                            <label for="born_date_users" class="form-label">Born Date User</label>
                            <input type="date" name="born_date_users" class="form-control form-sm" id="born_date_users" required value="{{old('born_date_users')}}"  max="{{date('Y-m-d')}}" min="1945-12-30">
                        </div>
                        <div class="col-6 my-1">
                            <label for="regionals_users" class="form-label">Regional Users</label>
                        <select name="regionals_users" id="regionals_users" class="form-select form-sm">
                            @foreach ($regionals as $regional)
                            <option value="{{$regional->id_regionals}}">{{$regional->name_regionals}}</option>
                            @endforeach
                        </select>
                    </div>
                    </div>
                    <div class="my-2">
                        <button type="submit" class="btn btn-primary btn-sm">Register</button>
                    </div>
                    <div class="mb-4">
                        <a href="/" class="d-block text-center"><small>Login</small></a>
                    </div>
                </form>
            </div>
          </div>
          </div>
        </div>
    </div>
</body>
</html>