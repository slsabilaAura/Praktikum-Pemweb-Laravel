@extends('layouts.main')
@section('title','SeminarKu')

    
    @section('container')
   
	<br>
	<br>
	<br>
	<br>
	<br>

    <section class="inner-page">
      <div class="container">
        <p>
        <div>
			<div>
			<h4>Edit Profile </h4>
			</div>
			<div style="padding-top: 20px">
				<form action="{{ route('profile.update', $user->id) }}" method="post" method="POST">
                @csrf
                <input type="hidden" name="_method" value="PUT">
				<div class="form-group mt-3">
					<label for="name">Nama Lengkap</label>
					<input type="text" name="name" class="form-control " value="{{ $user->name }}" id="name">
					<div class="invalid-feedback"></div>
				</div>
                <div class="form-group mt-3">
					<label for="email">Email</label>
					<input type="email" name="email" class="form-control " value="{{ $user->email}}" id="email">
					<div class="invalid-feedback"></div>
				</div>
               
                <div class="form-group mt-3">
					<label for="fakultas">Fakultas</label>
					<input type="text" name="fakultas" class="form-control " value="{{ $user->fakultas }}" id="fakultas">
					<div class="invalid-feedback"></div>
				</div>
				<div class="form-group mt-5">
					<a href="{{url('profile')}}" class="btn btn-danger">Kembali</a>
					<button type="submit" class="btn btn-primary">Simpan Perubahan</button>
					</div>
                    
            </form>
            @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                     @endif
				</div>
						<!--End: Modal Box-->
				</div>
                
        
        </p>
      </div>
    </section>

    @endsection