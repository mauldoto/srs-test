@extends('layouts.app')

@section('content')
<section class="py-5">
    <div class="container py-5">
      <div class="row d-flex justify-content-center align-items-center">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">

            @if ($errors->any())
            <div class="alert alert-danger d-flex align-items-center" role="alert">
                <div>
                    @foreach ($errors->all() as $err)
                        - {{ $err }} <br>
                    @endforeach
                </div>
            </div>
            @endif

          <div class="card shadow-2-strong" style="border-radius: 1rem;">
            <div class="card-body p-5 shadow" style="border-radius: 1rem;">
  
              <form action="{{ url('/login') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" value="{{old("email")}}">
                  </div>
                  <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleFormControlInput1" placeholder="password">
                  </div>
      
                  <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>
              </form>
  
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection