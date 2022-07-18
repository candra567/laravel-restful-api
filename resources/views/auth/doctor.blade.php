<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box
        }
        body{
            background-color: rgba(206, 221, 235, 0.761);
        }
        .form-content{
            width: 100%;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            row-gap: 10px;
        }
        .alert{
            width: 30%;
            padding: 10px;
            border: 1px solid black;
        }
        .form-content fieldset{
            width: 30%;
            padding: 10px;
            background:linear-gradient(lightgreen,cyan);
        }
        .form-box{
            width: 100%;
            margin: 10px 0;
        }
        .form-box input{
            display: block;
            width: 100%;
            padding: 10px;
            outline: none;
        }
        .form-box button{
            width: 100%;
            padding: 10px;
            outline: none;
            background-color: rgb(255, 210, 127);
            border:none;
        }
        .form-box a{
            display: block;
            text-align: center
        }
        .alert-failed{
            border-left: 10px solid red;
        }
        @media screen and (max-width:699px){
         .alert,.form-content fieldset{
            width: 70%;
         }
        }
    </style>
</head>
<body>
    <div class="form-content">
        @if (session()->has('loginfailed'))
            <div class="alert alert-failed">
            <p>{{session()->get('loginfailed')}}</p>
            </div>
        @endif
        
       <fieldset>
        <legend>Login Doctor</legend>
        <form action="/login" method="post">
            @csrf
            <div class="form-box">
                <label for="id_card_doctor">ID CARD DOCTOR</label>
                <input type="number" name="id_card_doctor" id="id_card_doctor" required value="{{old('id_card_doctor')}}">
            </div>
            <div class="form-box">
                <label for="password_doctor">PASSWORD DOCTOR</label>
                <input type="password" name="password_doctor" id="password_doctor" required>
            </div>
            <div class="form-box">
                <button type="submit">LOGIN</button>
            </div>
        </form>
       </fieldset>    
    </div>
</body>
</html>