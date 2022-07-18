@extends('vaccins.index')
@section('users')
<header class="header">
    <div class="home-header  d-flex justify-content-center align-items-center flex-column ">
            <h3 class="text-uppercase text-white">Consultations</h3>
    </div>
</header>
<section class="container-fluid mb-5">
   <div class="row my-4">
    <div class="col-md-5 col-lg-4 col-10 mx-auto">
        <div class="card shadow">
            <div class="card-header">Send My Consultan</div>
            <div class="card-body">
                <form action="/consultations" method="post">
                    @csrf
                <div class="my-2">
                    <label for="select_disease" class="form-label">Do you have disease history</label>
                    <select name="select_disease" id="select_disease" class="form-select">
                        <option value="0">No</option>
                        <option value="1">Yes i have</option>
                    </select>
                </div>
                <div class="my-1 text-disease" style="display: none">
                    <textarea name="disease_history" id="disease_history" cols="10" rows="3" maxlength="10" class="form-control" placeholder="Describe you disease"></textarea>
                </div>
                <div class="my-2">
                    <label for="select_current" class="form-label">Do you have current symptoms</label>
                    <select name="select_current" id="select_current" class="form-select">
                        <option value="0">No</option>
                        <option value="1">Yes i have</option>
                    </select>
                </div>
                <div class="my-1 text-current" style="display: none">
                    <textarea name="current_symptoms" id="current_symptoms" cols="10" rows="3" maxlength="10" class="form-control" placeholder="Describe you current"></textarea>
                </div>
                <div class="my-2">
                    <button type="submit" class="btn btn-primary btn-sm">Send my consultan</button>
                </div>
                </form>
            </div>
        </div>
    </div>
  </div>    
</section>    

@endsection