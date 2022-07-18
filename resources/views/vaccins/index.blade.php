<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vaksinasi Platform</title>
    <link rel="stylesheet" href="/bootstrap.css">
    <style>
        body{
            background-color: rgba(206, 221, 235, 0.761);
        }
        .header{
            height: 300px;
            width: 100%;
            background-image: url('/img/medical-personnel-was-vaccinated-covid19-patient_40876-2478.webp');
        }
        .home-header{
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.5)
        }
    </style>
</head>
<body>
    <nav class="container-fluid">
        <div class="row p-2 bg-info">
            <div class="col-md-6 d-flex justify-content-evenly">
                <ul class="nav">
                    <li class="nav-item"><a href="/home" class="text-dark nav-link">Home</a></li>
                    <li class="nav-item">
                        <form action="/logout" method="post">
                         @csrf
                         <button type="submit" class="btn btn-none" onclick="return(confirm('Anda akan keluar'))">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    @yield('users')
    <script>
        function toggleDisease(){
           if (this.value=="1") {
                document.querySelector('.text-disease').style.display='block';
                document.querySelector('#disease_history').required=true;
           } else {
            document.querySelector('.text-disease').style.display='none';
            document.querySelector('#disease_history').required=false;
           }
        }
        function toggleCurrent(){
           if (this.value=="1") {
                document.querySelector('.text-current').style.display='block';
                document.querySelector('#current_symptoms').required=true;

           } else {
            document.querySelector('.text-current').style.display='none';
            document.querySelector('#current_symptoms').required=false;

           }
        }
        let selectDisease=document.querySelector('#select_disease');
        let selectCurrent=document.querySelector('#select_current');
        selectDisease.onchange=toggleDisease;
        selectCurrent.onchange=toggleCurrent;
    </script>
</body>
</html>