@extends('layouts-admin.main-login')
@section('title','Register Admin SeminarKu')

    
@section('container')
<section class="">
  <!-- Jumbotron -->
  <div class="px-4 py-5 px-md-5 text-center text-lg-start" style="background-color: hsl(0, 0%, 96%)">
    <div class="container">
      <div class="row gx-lg-5 align-items-center">
        <div class="col-lg-6 mb-5 mb-lg-0">
          <h1 class="my-5 display-3 fw-bold ls-tight">
            Let's Get Your Experiences<br />
            <span class="text-primary">In SEMINARKU</span>
          </h1>
          
        </div>

        <div class="col-lg-6 mb-5 mb-lg-0">
          <div class="card">
            <div class="card-body py-5 px-md-5">
              <form action="/register-admin" method="POST">
                
        @csrf
                <!-- 2 column grid layout with text inputs for the first and last names -->
                <div class="row">
                  <div class="col-md-6 mb-4">
                    <div class="form-outline">
                        <label class="form-label" for="nama_admin">Nama Lengkap</label>
                      <input type="text" id="nama_admin" class="form-control @error('nama_admin') is-invalid @enderror" name="nama_admin" required value="{{old('nama_admin')}}"  />
                      @error('nama_admin')
                      <div  class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror
                    </div>
                  </div>
                  

                <div class="row">
                  <div class="col-md-6 mb-4">
                    <div class="form-outline">
                    <label class="form-label" for="email_admin">Email</label>
                      <input type="email" id="email_admin" class="form-control @error('email_admin') is-invalid @enderror" name ="email_admin" required value="{{old('email_admin')}}"  />
                      @error('email_admin')
                      <div  class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror
                    </div>
                  </div>
                  
                <div class="form-outline mb-4">
                    <label class="form-label" for="password">Password</label>
                  <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" required />
                  @error('password')
                      <div  class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror
                </div>

                
                
                <div>
                <button type="submit" class="btn btn-primary btn-block mb-4" style="width:100%;" >
                  Sign up
                </button>
                </div>
                

                <!-- Register buttons -->
                <div class="text-center">
                  <p>If you Have Account <a href="/login">Sign In</a> Here</p>
                  
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


@endsection